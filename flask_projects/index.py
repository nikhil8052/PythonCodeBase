from cProfile import label
from tkinter import Y
import matplotlib.pyplot as plt
import io 
from PIL import Image
from database import db_operations
def get_data(query):
    return db_operations.select(query)
    

# This will Build the grpah for the overall data 
def fun() :
    # Get data from Database for X and Y axis
    query='SELECT month(student_users.timestamp) as month , count(*) as count FROM student_users GROUP by month(student_users.timestamp)'
    arr=get_data(query)

    # Build the X-axis and Y-axis 
    yaxis=[]
    for one in arr :
        yaxis.append(one[1])
    yaxis.pop(0)
    yaxis.pop(0)
    x = ['jan','Feb', 'Mar', "Aprl", 'May', 'June', 'July', 'Aug', 'Sep','Oct','Nov','Dec']
    
    # set the Height and Width 
    f = plt.figure()
    f.set_figwidth(20)
    f.set_figheight(5)

    # Plot the Graph 
    plt.plot(x,yaxis,marker='*',label="Count")
    plt.plot()
    plt.grid()
    plt.xlabel("Months")
    plt.ylabel("Population")
    plt.title("Overall Students Graph ")
    plt.fill_between(x, yaxis, facecolor='b', alpha=0.6)
    plt.legend()
    
    img_buf = io.BytesIO()
    plt.savefig(img_buf, format='png')

    im = Image.open(img_buf)
    im=im.crop((180,0,1820,500))
    im.save('D:/xampp_php/htdocs/pageview_app/charts/images/overall/output.png')
    img_buf.close()


    

# // Build the NEET Chart 
def buildOverallChart():
    # Get data from Database for X and Y axis 
    query='SELECT month(student_users.timestamp) as month , count(*) as count FROM student_users GROUP by month(student_users.timestamp)'
    arr=get_data(query)

    # Build the X-axis and Y-axis 
    yaxis=[]
    yaxis1=[]
    yaxis2=[]
    yaxis3=[]
    for one in arr :
        yaxis.append(one[1])
        yaxis1.append(one[1]+one[1])
        yaxis2.append(one[1]+one[1]+7)
        yaxis3.append(one[1]+one[1]+34)
    yaxis.pop(0)
    yaxis.pop(0)
    yaxis1.pop(0)
    yaxis1.pop(0)
    yaxis2.pop(0)
    yaxis2.pop(0)
    yaxis3.pop(0)
    yaxis3.pop(0)
    x = ['jan','Feb', 'Mar', "Aprl", 'May', 'June', 'July', 'Aug', 'Sep','Oct','Nov','Dec']
    
    # set the Height and Width 
    f = plt.figure()
    f.set_figwidth(20)
    f.set_figheight(5)

    # Plot the Graph 
    plt.plot(x,yaxis,marker='o',color='y',label="NEET")
    plt.plot(x,yaxis1,marker='*',color='b',label="JEE")
    plt.plot(x,yaxis2,marker='*',color='c',label="AP-EMCET")
    plt.plot(x,yaxis3,marker='*',color='m',label="PASCAL")
    plt.fill_between(x, yaxis, facecolor='r', alpha=0.2)
    plt.fill_between(x, yaxis1, facecolor='purple', alpha=0.6)
    plt.fill_between(x, yaxis2, facecolor='c', alpha=0.6)
    plt.fill_between(x, yaxis3, facecolor='m', alpha=0.6)
    plt.plot()
    plt.grid()
    plt.xlabel("Months")
    plt.ylabel("Population")
    plt.title("All Exams Students Graph  ")
    plt.legend()
    
    img_buf = io.BytesIO()
    plt.savefig(img_buf, format='png')

    im = Image.open(img_buf)
    im=im.crop((180,0,1820,500))
    im.save('D:/xampp_php/htdocs/pageview_app/charts/images/overall/output.png')

    img_buf.close()
    # plt.savefig('D:/xampp_php/htdocs/pageview_app/charts/images/neet/neet.png')
    
    
# // Build the JEE Chart 
def buildJeeChart():
    # Get data from Database for X and Y axis 
    query='SELECT month(student_users.timestamp) as month , count(*) as count FROM student_users where exam_id in (2) GROUP by month(student_users.timestamp)'
    arr=get_data(query)

    # Build the X-axis and Y-axis 
    yaxis=[]
    for one in arr :
        yaxis.append(one[1])
    yaxis.pop(0)
    yaxis.pop(0)
    x = ['jan','Feb', 'Mar', "Aprl", 'May', 'June', 'July', 'Aug', 'Sep','Oct','Nov','Dec']
    
    # set the Height and Width 
    f = plt.figure()
    f.set_figwidth(20)
    f.set_figheight(5)

    # Plot the Graph 
    plt.plot(x,yaxis,marker='o',color='b',label="line H")
    plt.plot()
    plt.grid()
    plt.xlabel("Months")
    plt.ylabel("Population")
    plt.title("JEE Students Graph  ")
    # plt.fill_between(x, yaxis, facecolor='b', alpha=0.6)
    plt.legend()

    img_buf = io.BytesIO()
    plt.savefig(img_buf, format='png')

    im = Image.open(img_buf)
    im=im.crop((180,0,1820,500))
    im.save('D:/xampp_php/htdocs/pageview_app/charts/images/jee/jee.png')

    img_buf.close()

    # plt.savefig('D:/xampp_php/htdocs/pageview_app/charts/images/jee/jee.png')
    
    
# // Build the NEET Chart 
def buildNeetChart():
    # Get data from Database for X and Y axis 
    query='SELECT month(student_users.timestamp) as month , count(*) as count FROM student_users where exam_id in (1) GROUP by month(student_users.timestamp)'
    arr=get_data(query)

    # Build the X-axis and Y-axis 
    yaxis=[]
    for one in arr :
        yaxis.append(one[1])
    yaxis.pop(0)
    yaxis.pop(0)
    x = ['jan','Feb', 'Mar', "Aprl", 'May', 'June', 'July', 'Aug', 'Sep','Oct','Nov','Dec']
    
    # set the Height and Width 
    f = plt.figure()
    f.set_figwidth(20)
    f.set_figheight(5)

    # Plot the Graph 
    plt.plot(x,yaxis,marker='o',color='b',label="line H")
    plt.plot()
    plt.grid()
    plt.xlabel("Months")
    plt.ylabel("Population")
    plt.title("JEE Students Graph  ")
    # plt.fill_between(x, yaxis, facecolor='b', alpha=0.6)
    plt.legend()

    img_buf = io.BytesIO()
    plt.savefig(img_buf, format='png')

    im = Image.open(img_buf)
    im=im.crop((180,0,1820,500))
    im.save('D:/xampp_php/htdocs/pageview_app/charts/images/neet/neet.png')

    img_buf.close()

    # plt.savefig('D:/xampp_php/htdocs/pageview_app/charts/images/jee/jee.png')
    
    
# // Build the AP-EAMCET-MPC Chart 
def buildApEamcetMpcChart():
    # Get data from Database for X and Y axis 
    query='SELECT month(student_users.timestamp) as month , count(*) as count FROM student_users where exam_id in (2) GROUP by month(student_users.timestamp)'
    arr=get_data(query)

    # Build the X-axis and Y-axis 
    yaxis=[]
    for one in arr :
        yaxis.append(one[1])
    yaxis.pop(0)
    yaxis.pop(0)
    x = ['jan','Feb', 'Mar', "Aprl", 'May', 'June', 'July', 'Aug', 'Sep','Oct','Nov','Dec']
    
    # set the Height and Width 
    f = plt.figure()
    f.set_figwidth(20)
    f.set_figheight(5)

    # Plot the Graph 
    plt.plot(x,yaxis,marker='o',color='b',label="line H")
    plt.plot()
    plt.grid()
    plt.xlabel("Months")
    plt.ylabel("Population")
    plt.title("JEE Students Graph  ")
    # plt.fill_between(x, yaxis, facecolor='b', alpha=0.6)
    plt.legend()

    img_buf = io.BytesIO()
    plt.savefig(img_buf, format='png')

    im = Image.open(img_buf)
    im=im.crop((180,0,1820,500))
    im.save('D:/xampp_php/htdocs/pageview_app/charts/images/AP-EAMCET-MPC/AP-EAMCET-MPC.png')

    img_buf.close()

    # plt.savefig('D:/xampp_php/htdocs/pageview_app/charts/images/jee/jee.png')
    

fun()
buildOverallChart()
buildNeetChart()
buildJeeChart()
buildApEamcetMpcChart()
