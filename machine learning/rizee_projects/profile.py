import pandas as pd 
from pandas_profiling import ProfileReport 

df=pd.read_json("D:/python_projects/datasets/eamcet_students.json")
pr=ProfileReport(df)
pr.to_file(output_file="index.html")