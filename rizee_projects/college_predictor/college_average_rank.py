from Database import Database
import json 

db=Database("localhost","root","","neetjee")

r=db.select("SELECT eamcet_college_id as college_id, sum(branch_rank_average) as sum  , count(*) as no  FROM `eamcet_branch_rank_avg` group by eamcet_college_id")

pre=0
cur=1500
priority=1
data=list()

for one in r :
    average=one['sum']/one['no']
    college_id=one['college_id']
    data.append(dict({"college_id":college_id,"overall_average":average}))

    


data=json.dumps(data,indent=4 ,default=str)
file=open("overall_college_average.json","w")
file.write(data)
file.close()
print("done")
