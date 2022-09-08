import mysql.connector

class Database:
    # Constructor 
    def __init__(self , host , user , password , database ):
        self.host=host 
        self.user=user
        self.password = password 
        self.database=database 
        self.__connect()


    # Get the info 
    def info(self):
        info={"host":self.host, "user":self.user,"password":self.password , "database":self.database }
        return info

    #Connect to database 
    def __connect(self):
        self.db=mysql.connector.connect(
            host=self.host,
            user=self.user,
            password=self.password,
            database=self.database
        )

    # Select Data from database 
    def select(self,q):
        self.cursor=self.db.cursor(dictionary=True)

        self.cursor.execute(q)
        return self.cursor.fetchall()

         






