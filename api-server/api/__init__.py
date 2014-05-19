from flask import Flask
from flask.ext.restful import Api
from flask.ext.sqlalchemy import SQLAlchemy

app = Flask(__name__)
app.config.from_object('config')
api = Api(app, prefix='/v1')
db = SQLAlchemy(app)

from api import models
from api import resources

