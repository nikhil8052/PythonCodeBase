import mysql.connector



db=mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="neetjee" 
)


cursor=db.cursor()
