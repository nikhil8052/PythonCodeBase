
mydict={"user1":"nikhil", "user2":"Moksh"}
val=input(" Enter the Key ")

flag=False  
for one in mydict.keys():
    if one==val :
        flag=True 
        break 
    
if flag==True :
    print(mydict[val])
else:
    print(" User does not exist ")