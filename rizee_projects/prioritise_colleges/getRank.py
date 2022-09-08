from database import cursor,db
import json 

file=open("college.json",'r')
obj=file.read()
file.close()

t=0
obj=json.loads(obj)
i=0
for one in obj :
    college_id=one['college_id']
    branches=one['branches']
    main_castes=one['main_castes']
    sub_castes=one['sub_castes']
 

    for branch in branches : 
        for main_caste in main_castes:
            for sub_caste in sub_castes :
               
                bi=branch['id']
                mi=main_caste['id']
                si=sub_caste['id']
                q=f"SELECT es.rank  FROM eamcet_students es ,eamcet_branches eb , eamcet_caste ec , eamcet_seat_category esc   WHERE eb.id=es.eamcet_branch_id  and esc.id=es.eamcet_seat_category_id and  ec.main_caste=es.caste_code and es.eamcet_college_id={college_id} and es.eamcet_branch_id={bi} and es.eamcet_caste_id ={mi} and es.eamcet_seat_category_id ={si}"
                cursor.execute(q)
                result=cursor.fetchall()
                if len(result)==0 :
                    pass
                else:
                    i=i+1
                    print(bi,si,mi)
                    rank_list=list()
                    for rank in result :
                        rank_list.append(rank[0])
                    average=round(sum(rank_list)/len(rank_list))
                    print(" len of result set ", len(result))
                    insert_query=f"insert into eamcet_reservation_rank_avg values({i},24,{college_id},{bi},{mi},{si},'2021',{average},'1')"
                    cursor.execute(insert_query)
                    db.commit()
                
            

                
            
        
print("done")

