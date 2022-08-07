import requests 

r=requests.get("https://rizee.in/EAMCET/ADDMISSION_PROCESS/index.php",verify=False)
# print(r.content)
file=open("tem.txt","w")
file.write(str(r.content))
file.close()
print("Done ..")