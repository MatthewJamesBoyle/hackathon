import os
basedir = os.path.abspath(os.path.dirname(__file__))

HOST = "0.0.0.0"
PORT = "5000"
DEBUG = True

SQLALCHEMY_DATABASE_URI = "mysql://root@localhost/car"
