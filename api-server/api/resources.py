from flask.ext.restful import abort, reqparse, Resource
from flask import request
from flask.ext.restful.utils import cors

from api import api_endpoint, db, auth
from api import models

@auth.get_password
def get_password(user):
  password = models.Driver.check_credentials(user)
  print password
  return password

class Main(Resource):
  def get(self):
    return {"version": "v0.0.1"}

class Order(Resource):
  decorators = [auth.login_required]
  def get(self, order_id=None):
    data = models.OrderDetails.query.all()
    data = [d.to_json() for d in data]
    return data

class Login(Resource):
  def post(self):
    payload = request.authorization
    exists = models.Driver.check_credentials(payload.username, payload.password)
    if exists:
      User = models.Driver.query.filter_by(surname=payload.username).first()
      return User.to_json(), 200, {"Access-Control-Allow-Origin": "*"}
    else:
      return "user not found", 400, {"Access-Control-Allow-Origin": "*"}
  
  def options(self):
    return { "Allow" : "GET,POST,PUT,OPTIONS"}, 200, \
        { "Access-Control-Allow-Origin" : "*",
            "Access-Control-Allow-Headers": "X-Requested-With, Content-Type, Authorization",
            "Access-Control-Allow-Methods": "POST, OPTIONS"}

api_endpoint.add_resource(Main, "/")
api_endpoint.add_resource(Order, "/order/<int:order_id>", "/order/")
api_endpoint.add_resource(Login, "/login/")
