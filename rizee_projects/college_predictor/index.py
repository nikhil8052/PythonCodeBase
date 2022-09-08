from Database import Database
import json 

db=Database("localhost","root","","neetjee")

r=db.select(" select * from eamcet_students")

pre=0
cur=1500
priority=1
data=dict()
for i in range(0,20):
    q=f'select * from eamcet_students where rank between {pre} and {cur}'
    r=db.select(q)
    data[cur]=dict({'college_Priority':priority, "data":r})
    pre=cur
    cur=cur+1500
    priority=priority+1

data=json.dumps(data)
file=open("dummy.json","w")
file.write(data)
file.close()
print("done")
