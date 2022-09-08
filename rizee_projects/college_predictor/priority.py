from distutils.command import sdist
import json 


file=open("dummy.json","r")
data=file.read()
file.close()

data =json.loads(data)

sd=data['1500']['data']

for one in sd :
    print(one['eamcet_college_id'])
