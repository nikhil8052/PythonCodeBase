import tabula 
import json 
# To hold the json data 
json_data=[]
# All the unique code of colleges 
unique_codes=set()
# read pdf and convert into the dataframe 
dfs=tabula.read_pdf("D:/python_projects/rizee_projects/emcet/p1.pdf",pages="all",multiple_tables=True)
# one page one dataframe 
for df in dfs:
    for row in df.index:
        data=df['Inst_\rcode'][row]
        data1=df['Institution Name'][row]
        one=dict({"id":i,"college_code":data,"college_name":data1})
        check=data in unique_codes
        if check==False :
            json_data.append(one)
            i=i+1
            unique_codes.add(data)
    
      

json=json.dumps(json_data)
file=open("D:/python_projects/rizee_projects/emcet/datasets/emcet_college_data.json","w")
file.write(json)
file.close()
print(unique_codes)
print("done")