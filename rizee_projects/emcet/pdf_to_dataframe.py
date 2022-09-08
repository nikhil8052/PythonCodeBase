import tabula 
df = tabula.read_pdf("p1.pdf", pages='1')
print(df)
print(df['Roll_No'])
print("Done")