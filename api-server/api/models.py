from api import app, db

class OrderDetails(db.Model):
  __tablename__ = "orderdetails"

  fleetid = db.Column(db.Integer, primary_key=True,)
  previous_expected_delivery_dt = db.Column(db.DateTime)
  current_expected_delivery_dt = db.Column(db.DateTime)
  dealerid = db.Column(db.Integer)
  driverid = db.Column(db.Integer, db.ForeignKey("driver.driverid"))
  address1 = db.Column(db.String(100))
  address2 = db.Column(db.String(100))
  county = db.Column(db.String(30))
  country = db.Column(db.String(20))
  postcode = db.Column(db.String(10))
  make = db.Column(db.String(10))
  model = db.Column(db.String(10))
  spec = db.Column(db.String(50))
  reason = db.Column(db.String(200))
  actual_delivery_dt = db.Column(db.DateTime)
  status = db.relationship("Status", backref="OrderDetails")

  def to_json(self):
    data = {
        "id" : self.fleetid,
        'fleetid' : self.fleetid,
        'dealerid' : self.dealerid,
        'make' : self.make,
        'model': self.model,
        "driver": self.driver.to_json(),
        "status": [s.to_json() for s in self.status],
        "delivery_date": str(self.current_expected_delivery_dt)
    }
    return data

class Driver(db.Model):
  __tablename__ = "driver"

  driverid = db.Column(db.Integer, primary_key=True)
  forename = db.Column(db.String(20))
  surname = db.Column(db.String(20))
  mobile = db.Column(db.String(10))
  email = db.Column(db.String(200))
  business = db.Column(db.String(60))
  address1 = db.Column(db.String(50))
  address2 = db.Column(db.String(50))
  county = db.Column(db.String(50))
  country = db.Column(db.String(50))
  country = db.Column(db.String(10))
  pin = db.Column(db.String(8))
  orders = db.relationship("OrderDetails", backref="driver")

  @classmethod
  def check_credentials(self, username, password=None):
    kwargs = {"surname": username, "pin": password}
    if password == None:
      del kwargs["pin"]
    tmp = Driver.query.filter_by(**kwargs).first()
    if tmp != None:
      return tmp.pin
    else:
      return None

  def to_json(self, latest=False):
    data = {
        "forename": self.forename,
        "surname": self.surname,
    }
    if latest == True:
      data["latest_order_id"] = self.orders[-1].fleetid
    return data

  def __repr__(self):
    return "<Driver '{} {}'>".format(self.forename, self.surname)

class Status(db.Model):
  __tablename__ = "status"
  
  statusid = db.Column(db.Integer, primary_key=True)
  fleetid = db.Column(db.Integer, db.ForeignKey("orderdetails.fleetid"))
  status = db.Column(db.String(10))
  date = db.Column(db.DateTime)
  comment = db.Column(db.String(200))
  visibility = db.Column(db.String(1))

  def to_json(self):
    return {
        "id" : self.fleetid,
        "status": self.status,
        "date" : str(self.date)
    }
