from sre_constants import BRANCH
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
# load collage name and code 
file=open("./datasets/emcet_college_data.json","r")
data=file.read()
data=json.loads(data)
file.close()
id=0


    

for one in data :
    code=one['college_code']
    name=one['college_name']
    arr=name.split(",")
    colg_name=arr[0]
    district=arr[1]
    sql=f"insert into college_codes (id,college_code,college_name,district,state,exam_id) values({id},'{code}','{colg_name}','{district}','','6')"
    print(sql)
    cursor.execute(sql)
    id=id+1


db.commit()
print(" Done ")