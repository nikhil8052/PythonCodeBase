import mysql.connector

host='34.74.241.2'
user='rspace'
password='Rsp@2019'

db = mysql.connector.connect(
  host=host,
  user=user,
  password=password,
  database='bot'
)

if db!=None:
  print(" Oh your Ip has been added .")
else:
  print(" Your IP has not been added .")