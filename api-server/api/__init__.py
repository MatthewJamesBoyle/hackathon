from flask import Flask
from flask.ext.restful import Api
from flask.ext.sqlalchemy import SQLAlchemy
from flask.ext.restful.utils import cors
from flask.ext.httpauth import HTTPBasicAuth

app = Flask(__name__)
app.config.from_object('config')
api_endpoint = Api(app, prefix='/v1')
db = SQLAlchemy(app)
auth = HTTPBasicAuth()

from api import models
from api import resources
