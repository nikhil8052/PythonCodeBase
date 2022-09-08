from  Database import Database 
from datetime import datetime 


db=Database("localhost","root","","neetjee")
q="SELECT id,timestamp from student_users"
result=db.select(q)
i=1
tc=66611 
for t in result :
    timestamp=t['timestamp']
    if timestamp!='':
        timestamp=int(timestamp)
        d=datetime.fromtimestamp(timestamp)
        q=f"update student_users set date='{d}' where id='{t['id']}'"
        db.query(q)

    cp=int((i*100)/tc)
    print(str(cp)+"%")
    i=i+1



print("Done")