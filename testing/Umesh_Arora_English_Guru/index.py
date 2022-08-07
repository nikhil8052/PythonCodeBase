
import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="neetjee"
)

mycursor = mydb.cursor()

mycursor.execute("select * from student_users where timestamp between 1577836800 and 1609459200 limit 0,10000")

myresult = mycursor.fetchall()
count=0
file=open("./umesh_arora_english_guru.txt",'w+')
for x in myresult:
  count=count+1 
  file.write(x[1]+" -->  " + x[3]+"-->" +x[4]+"  "+"\n")
  print(x)

print ( " All the users ")
print( count )



