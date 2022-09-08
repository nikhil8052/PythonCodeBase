from Database import Database
import json 

db=Database("localhost","root","","neetjee")

r=db.select("SELECT ebra.eamcet_college_id as college_id,  ebra.eamcet_branch_id as branch_id , ebra.branch_rank_average as average_rank , eb.branch_name  FROM eamcet_branch_rank_avg ebra, eamcet_branches eb   where eb.id = ebra.eamcet_branch_id")

pre=0
cur=1500
priority=1
data=list()
data.append(r)



data=json.dumps(data,indent=4 ,default=str)
file=open("./datasets/branch_wise_rank.json","w")
file.write(data)
file.close()
print("done")
