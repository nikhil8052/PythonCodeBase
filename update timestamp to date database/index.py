from  Database import Database 
import json 


db=Database("localhost","root","","neetjee")
q="SELECT * from student_users "
result=db.select(q)
data=json.dumps(result)
# print(data)
file=open("../datasets/all_exam_counts.json",'w')
file.write(data)
file.close()
print("done")
