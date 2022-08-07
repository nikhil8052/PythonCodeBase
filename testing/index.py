from calendar import month


letter =  ''' Hey! #  
you ur seleted conguratulation
from nikhil  
'''
name = input("enter your name\n")
date=input("please enter the date ")
t=date[0:2]+'-'
k=date[3:5]+'-'
o=date[6:10]
letter = letter.replace("#",name)
letter = letter.replace("##",date)
print (letter)
print(t+k+o)
# date=input("please enter the date")
# t=date[0:2]+'-'
# k=date[3:]+'-'
# o=date[7:]+'-'
# print (t+k+o)



# print(f''' Hi {input( Please enter your name ")} your date is this {input(" Please enter the date")}''')
12345678