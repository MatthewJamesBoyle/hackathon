from api import app, db

class OrderDetails(db.Model):
  __tablename__ = "orderdetails"
  fleetid = db.Column(db.Integer, primary_key=True)
  previous_expected_delivery_dt = db.Column(db.DateTime)
  current_expected_delivery_dt = db.Column(db.DateTime)
  dealerid = db.Column(db.Integer)
  driverid = db.Column(db.Integer)
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

  def to_json(self):
    data = {
        'fleetid' : self.fleetid,
        'dealerid' : self.dealerid,
        'make' : self.make,
        'model': self.model
    }
    return data

class Driver(db.Model):
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
  
  @classmethod
  def check_credentials(self, username, password):
    tmp = Driver.query.filter_by(surname=username, pin=password).all()
    if len(tmp) > 0:
      return True, tmp[0]
    else:
      return False, None

  def to_json(self):
    return {
        "forename": self.forename,
        "surname": self.surname
    }


