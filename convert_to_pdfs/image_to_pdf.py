import img2pdf
from PIL import Image 


img =Image.open("./userprofile.jpg")
pdf_b=img2pdf.convert(img.filename)
file=open("d1.pdf","wb")
file.write(pdf_b)
file.write(pdf_b)
file.close()
img.close()