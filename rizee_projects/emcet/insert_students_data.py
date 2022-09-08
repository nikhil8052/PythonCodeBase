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
file=open("./datasets/emcet_students_data.json","r")
data=file.read()
data=json.loads(data)
file.close()
i=0

# get all the branch code 
q="select * from branch_codes"
branches={}
cursor.execute(q)
result=cursor.fetchall()
for r in result :
    branches[r[1]]=r[0]


for one in data :
    college_code=one['college_code']
    college_name=one['college_name']
    candidate_name=one['candidate_name']
    branch_code=one['branch_code']
    branch_id=branches[branch_code]
    gender=one['gender']
    region=one['region']
    caste_code=one['caste_code']
    seat_category=one['seat_category']
    rank=one['rank']
    roll_no=one['roll_no']
    i=i+1
    print(branch_id , branch_code)
    # sql=f"insert into emcet_students values({id},'{candidate_name}','{roll_no}','{college_name}','{college_code}','{branch_code}','{gender}','{region}','{caste_code}','{seat_category}','{rank}')"
    sql=f"update emcet_students set branch_id={branch_id} where roll_no='{roll_no}'"
    print(sql)
    cursor.execute(sql)


db.commit()