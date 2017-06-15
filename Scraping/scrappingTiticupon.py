from bs4 import BeautifulSoup
import urllib.request
import conexion
import psycopg2


cuponesJSON = []

def craerJSON(id ,imagen, informacion, precioActual, descuento, finaliza, tipo, precioOriginal, lugar, periodoDeUso, horario, comoLlegar):
    cuponJSON = {"id":id, "imagen":imagen, "informacion":informacion, "precioActual":precioActual, "descuento":descuento, "finaliza":finaliza,
                 "tipo":tipo, "precioOriginal":precioOriginal, "lugar":lugar, "periodoDeUso":periodoDeUso, "horario":horario, "comoLlegar":comoLlegar}
    return cuponJSON

def scrappingTitiCupon(url):
    source = urllib.request.urlopen(url).read()
    soup = BeautifulSoup(source, 'html.parser')

    cuponInfo = soup.find('div', attrs={"class": "price-data-wrapper"})
    precioOriginal = cuponInfo.find('h4', attrs={"class":"normal-price"}).get_text()

    cuponInfo = soup.find('ul', attrs={"class": "item-info"})
    li = cuponInfo.findAll('li')
    count = 1
    for i in li:
        if(count == 1):
            lugar = i.get_text()
            lugar = lugar.replace("Provincia: ", "").strip()
        elif(count == 2):
            periodoDeUso = i.find('span', attrs={"class":"redeem"}).get_text()
        elif(count == 3):
            horario = i.get_text()
            horario = horario.replace("Horario de servicio al cliente:", "").strip()
        else:
            comoLlegar = i.get_text()
            comoLlegar = comoLlegar.replace("Cómo llegar:", "").strip()
        count+=1
    return precioOriginal, lugar, periodoDeUso, horario, comoLlegar




def scrappingTiti():

    source = urllib.request.urlopen('https://www.titicupon.com/').read()
    soup = BeautifulSoup(source, 'html.parser')
    cuponSquares = soup.find_all('div', attrs={"class": "grid-item"})
    count = 0
    for cuponSquare in cuponSquares:
        count+=1

        imagen = cuponSquare.find('img', attrs={"class": "imagecache imagecache-coupon-slider-responsive"})['src']

        informacion = cuponSquare.find('h4', attrs={"class":"product-title"}).get_text()
        informacion = informacion.strip()

        precioActual = cuponSquare.find('span', attrs={"class":"max-price"}).get_text()

        descuento = cuponSquare.find('span', attrs={"class":"ahorro-small"}).get_text()

        finaliza = cuponSquare.find('span', attrs={"class":"date-display-single"}).get_text()

        tipo = cuponSquare.find('h5', attrs={"class":"tag-icon"}).get_text()
        tipo = tipo.strip()

        id = count

        URL = cuponSquare.find('div', attrs={"class": "btn-wrapper"})

        a = "https://www.titicupon.com"
        a = a + URL.find('a')['href']

        scrappingTitiCupon(a)
        precioOriginal, lugar, periodoDeUso, horario, comoLlegar = scrappingTitiCupon(a)
        precioOriginal = precioOriginal.replace("₡","")
        precioOriginal = precioOriginal.replace(",","")
        precioOriginal = int(precioOriginal)
        precioActual = precioActual.replace("₡", "")
        precioActual = precioActual.replace(",", "")
        precioActual = int(precioActual)
        descuento = descuento.replace("Ahorre ","")
        descuento = descuento.replace("%", "")
        descuento = int(descuento)
        cupon = craerJSON(id, imagen, informacion, precioActual, descuento, finaliza, tipo, precioOriginal, lugar, periodoDeUso, horario, comoLlegar)

        cuponesJSON.append(cupon)

        if(count == 40):
           break


def getCuponesJSON():
    scrappingTiti()
    print("Fuaaaaaaaaaaaaaaaaaaa....................")
    conexion.insertarCupones(cuponesJSON)

getCuponesJSON()