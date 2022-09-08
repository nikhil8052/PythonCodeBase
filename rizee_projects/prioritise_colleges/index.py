from database import cursor 
import json 

# globals 
obj=[]

q="select id, college_name from eamcet_colleges limit 0,1"

cursor.execute(q)
result=cursor.fetchall()
i=0
for r in result :
    print(i)
    i=i+1
    college_id=r[0]
    college_name=r[1]
    available_branches=list([])
    main_castes=list([])
    sub_castes=list([])

    q=f"SELECT eb.id,eb.branch_name FROM eamcet_students es ,eamcet_branches eb  WHERE eb.id=es.eamcet_branch_id and eamcet_college_id={college_id} GROUP by eb.id "
    cursor.execute(q)
    branchs=cursor.fetchall()

    for branch in branchs:
        available_branches.append(dict({"id":branch[0],"name":branch[1]}))

    q=f"SELECT  ec.id ,ec.main_caste  FROM eamcet_students es ,eamcet_branches eb , eamcet_caste ec  WHERE eb.id=es.eamcet_branch_id and eamcet_college_id={college_id} and ec.main_caste=es.caste_code GROUP by ec.id"
    cursor.execute(q)
    main_castes_result=cursor.fetchall()

    for main_caste in main_castes_result:
        main_castes.append(dict({"id":main_caste[0],"name":main_caste[1]}))


    q=f"SELECT esc.id, esc.name  FROM eamcet_students es ,eamcet_branches eb , eamcet_caste ec , eamcet_seat_category esc  where  es.eamcet_college_id={college_id} and esc.id=es.eamcet_seat_category_id  GROUP by esc.id"
    cursor.execute(q)
    sub_castes_result=cursor.fetchall()

    for sub_caste in sub_castes_result:
        sub_castes.append(dict({"id":sub_caste[0],"name":sub_caste[1]}))

   
    one=dict({"college_id":college_id,"college_name":college_name,"branches":available_branches,"main_castes":main_castes,"sub_castes":sub_castes})
    obj.append(one)



obj=json.dumps(obj)
    
file=open("college.json",'w')
file.write(obj)
file.close()

print("Done ")