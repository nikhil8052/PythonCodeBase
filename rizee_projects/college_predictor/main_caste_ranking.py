from Database import Database
import json 

db=Database("localhost","root","","neetjee")
data=dict()

main_castes=db.select("SELECT eamcet_caste_id as id  FROM `eamcet_reservation_rank_avg` group by eamcet_caste_id")

for m in main_castes : 
    print(m)
    data[m['id']]=list()


r=db.select("SELECT * FROM `eamcet_reservation_rank_avg` ")

for one in r : 
    data[one['eamcet_caste_id']].append(one)


data=json.dumps(data,indent=4 ,default=str)
file=open("./datasets/main_caste_rank.json","w")
file.write(data)
file.close()
print("done")
