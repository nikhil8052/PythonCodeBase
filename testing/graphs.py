# importing the required module
import matplotlib.pyplot as plt
  
# x axis values
x = [2001,2002,2003,2004]
# corresponding y axis values
y = [1,4,3,4]
  
# plotting the points 
plt.plot(x, y)
  
# naming the x axis
plt.xlabel('x - axis')
# naming the y axis
plt.ylabel('y - axis')
  
# giving a title to my graph
plt.title('My first graph!')
  
# function to show the plot
plt.show()