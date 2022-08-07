str='<p>Hello,i am nikhil </p> '

str=str.replace('<p>','')
str=str.replace('</p>','')
str=str[:10]
print(str)