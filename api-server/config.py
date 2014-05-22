import os
basedir = os.path.abspath(os.path.dirname(__file__))

HOST = "0.0.0.0"
PORT = "5001"
DEBUG = True

SQLALCHEMY_DATABASE_URI = "mysql://root@127.0.0.1/car"
