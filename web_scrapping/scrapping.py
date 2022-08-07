import requests
 
# Making a GET request
r = requests.post('https://eapcet-sche1.aptonline.in/EAPCET/collegeWiseAllotedReport.do?mode=getExcelData&course=SVIT&college=ECE', verify=False, stream=True)
# r = requests.get('https://eapcet-sche1.aptonline.in/EAPCET/collegeWiseAllotedReport.xls', verify=False)



print(r)
 
with open('./metadata.pdf', 'wb') as f:
    f.write(r.content)

# print content of request
print(r.content)

# https://eapcet-sche1.aptonline.in/EAPCET/collegeWiseAllotedReport.do?mode=getExcelData&course=SVIT&college=ECE