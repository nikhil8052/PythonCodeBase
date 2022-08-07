from fpdf import FPDF 
import random 


pdf=FPDF()

pdf.add_page()

pdf.set_font("Arial",size=12)

# create a cell
pdf.cell(0, 12, txt = "Your Todo List ",
         ln = 1, align = 'C',border=1)
 
pdf.cell(0,12,txt="This is the first line ",ln=1,align="L")

name =random.randint(1000,9999)
name=f"{name}"+".pdf"

pdf.add_page()

pdf.output(name)  