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
sql="select branch_code as code from emcet_students GROUP by branch_code "
cursor.execute(sql)
result=cursor.fetchall()
print(type(result))
id=0
for one in result :
    print(one)
    sql=f"insert into branch_codes values('{id}','{one[0]}')"
    cursor.execute(sql)
    id=id+1


db.commit()
print(" Done ")