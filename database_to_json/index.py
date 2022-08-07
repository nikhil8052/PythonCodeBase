from  Database import Database 
import json 


db=Database("localhost","root","","neetjee")
q="SELECT eb.branch_name ,ec.id as college_name,ec.location,s.state_name  ,eccs.main_caste,esc.name as caste_name, es.rank FROM eamcet_students es,eamcet_colleges ec,eamcet_branches eb,state s,eamcet_seat_category esc,eamcet_caste eccs where es.eamcet_college_id=ec.id  and es.eamcet_branch_id=eb.id and es.eamcet_seat_category_id=esc.id and ec.state=s.state_id and ec.estatus=1 and es.eamcet_caste_id=eccs.id group by es.eamcet_college_id,es.eamcet_branch_id,es.eamcet_caste_id,es.eamcet_seat_category_id "
result=db.select(q)
data=json.dumps(result)
# print(data)
file=open("eamcet_students.json",'w')
file.write(data)
file.close()
print("done")
