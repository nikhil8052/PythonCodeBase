from unittest import result
from mysql import connector
import json

db=connector.connect(
    host="localhost",
    user="root",
    password="",
    database="neetjee"
)

if(db!=None ):
    print(" Connected ")


cursor=db.cursor()
sql="select seat_category as code from emcet_students GROUP by seat_category "
cursor.execute(sql)
result=cursor.fetchall()
print(type(result))
for one in result :
    print(one)
    sql=f"insert into emcet_seat_category values('','{one[0]}')"
    cursor.execute(sql)


db.commit()
print(" Done ")