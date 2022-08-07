from PIL import Image

ll=Image.open(r'D:/xampp_php/htdocs/pageview_app/charts/images/neet/neet.png')

k=ll.crop((180,0,1820,500))
k.save('love.png')