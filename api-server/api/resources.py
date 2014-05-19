from flask.ext.restful import abort, reqparse, Resource
from flask import request

from api import api, db
from api import models

class Main(Resource):
  def get(self):
    return {"version": "v0.0.1"}

class Order(Resource):
  def get(self):
    data = models.OrderDetails.query.all()
    data = [d.to_json() for d in data]
    return data

class Login(Resource):
  def post(self):
    payload = request.authorization
    exists = models.Driver.check_credentials(payload.username, payload.password)
    if exists:
      return models.Driver.query.filter_by(surname=payload.username, pin=payload.password).first().to_json()
    else:
      return "user not found", 200

api.add_resource(Main, "/")
api.add_resource(Order, "/order/")
api.add_resource(Login, "/login/")
