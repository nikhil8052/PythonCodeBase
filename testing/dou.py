import mysql.connector

db = mysql.connector.connect(
  host='localhost',
  user='root',
  password='',
  database='bot'
)

# For getting the data (SELECT COMMAND )
def select(query):
    mycursor = db.cursor()
    mycursor.execute(query)
    result = mycursor.fetchall()
    db.commit()
    return result



q='''select * from action where action in ('welcome','Youtube Link') '''
result=select(q)
print(result[0][5])
print(result[1][4])