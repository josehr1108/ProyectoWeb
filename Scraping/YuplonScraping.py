# encoding: utf-8
import urllib
from bs4 import BeautifulSoup
import random
import unicodedata
import psycopg2, psycopg2.extras

from unidecode import unidecode
import operator

#Donde se almacena cada objeto
promosJSON=[]

#Inicia el codigo y sus funciones
def elimina_tildes(s):
    return ''.join((c for c in unicodedata.normalize('NFD', s) if unicodedata.category(c) != 'Mn'))


def generateJSON(titulo,imagen,precioFinal,
                 descuentoAplicado,ahorroFinal,paginaWeb
                 ,descripcionGeneral,descriptionEstablecimiento,ubication):
            promoJSON= {"titulo":titulo, "imagen": imagen, "precioGeneral":precioFinal , "descuento":descuentoAplicado, "ahorro": ahorroFinal,"precioFinal": precioFinal, "sitioWeb":paginaWeb, "informacion": descripcionGeneral, "infoBasica":descriptionEstablecimiento, "ubicacion": ubication }
            return promoJSON

def obtenerDatos():
    n = 1
    for i in range(10):
        print ("Inicia")
        url="http://www.yuplon.com/Ofertas-y-Descuentos/detalle/{0}".format(i+84089)
        #url = "http://www.yuplon.com/heredia/Ofertas-y-Descuentos/detalle/{0}".format(i+84087) #pagina Random de Yuplon
        html = urllib.urlopen(url)  # link de la pagina de la que tomaremos los datos
        bsObj = BeautifulSoup(html,'html.parser')  # objeto de la clase bs4

        # Obtain imagen

        for child in bsObj.findAll("div", {"id": "main-right-content"}):  # para poder tomar la imagen de la promo

            imagen = child.find("div", {"id": "slideshow"}).find("img", {
                "alt": ""})  # Obtenemos la imagen de la pagina, como son varias por anuncio, solo escogemos 1
            tipo = str(type(imagen))
            # print tipo
            if (tipo == "<type 'NoneType'>"):
                # print ("Detecto error en titulo")
                imagen ="http://cdn.yuplon.com/110x66014069b.jpg"
            else:
                imagen = imagen.get('src')



        #Obtain title
        titleOfert = bsObj.find("h3",{"class":"title"})#.get_text().lstrip().strip()
        tipo = str(type(titleOfert))
        #print tipo
        if (tipo== "<type 'NoneType'>"):
            #print ("Detecto error en titulo")
            titleOfert="¡Regala a tu papa favorito productos de calidad Coleman este dia del padre! Botella de Aluminio Coleman 16 ONZ a solo 3,701 en Pura Pesca Costa Rica"
        else:
            titleOfert = bsObj.find("h3", {"class": "title"}).get_text().lstrip().strip()

        # Obtain the prices
        priceOfert = bsObj.find("div", {"class": "txt-label-price"})#.get_text()
        tipo = str(type(priceOfert))
        #print tipo
        if (tipo == "<type 'NoneType'>"):
            #print ("Detecto error en precio princioal")
            priceOfert = "84000"
        else:
            priceOfert = bsObj.find("div", {"class": "txt-label-price"}).get_text()


        # Obtain the precio oficial, DESCUENTO AHORRO.
        listaValores=[]
        p2=0
        a2=0
        d2=0

        tabla=bsObj.find("div", {"id": "deal-brief"})
        tipo = str(type(tabla))
        #print tipo
        if (tipo != "<type 'NoneType'>"):
            tabla = bsObj.find("div", {"id": "deal-brief"}).findAll("td")

            for valor in tabla:
                listaValores.append(valor.get_text());

            # PRECIO OFICIAL
            precioOficial = listaValores[0]
            p2 = precioOficial.encode('utf-8')
            p2 = p2.replace("₡", "").replace(",", "")
            p2 = int(p2)
            listaValores[0] = p2

            # DESCUENTO
            descuentoTotal = listaValores[1]
            d2 = descuentoTotal.encode('utf-8')
            d2 = d2.replace("%", "")
            d2 = int(d2)
            listaValores[1] = d2

            # AHORRO
            ahorroTotal = listaValores[2]
            a2 = ahorroTotal.encode('utf-8')
            a2 = a2.replace("₡", "").replace(",", "")
            a2 = int(a2)
            listaValores[2] = a2

        else:
            #print("Detecto error en tabla")
            a2=19530
            p2=19530
            d2=50


        # Obtain the web
        webPage = bsObj.find("div", {"class": "header-info-retailer"})#.find("a", {"target": "_blank"})  # .get_text().lstrip().strip()
        tipo = str(type(webPage))
        #print tipo
        if (tipo == "<type 'NoneType'>"):
           # print ("Error en pagina web")
            webPage="www.almondsandcorals.com/"
        else:
            web2=webPage.find("a", {"target": "_blank"})
            tipo2=str(type(web2))
            if (tipo2 == "<type 'NoneType'>"):
                # print ("Error en pagina web")
                webPage = "No tiene pagina web"
            else:
                webPage = webPage.find("a", {"target": "_blank"}).get_text().lstrip().strip()



        #Obtain content block
        blockBasicInformation2=bsObj.find("div",{"id":"content-block"})#.find("h2")#.get_text()
        tipo = str(type(blockBasicInformation2))
        #print tipo
        if (tipo == "<type 'NoneType'>"):
           blockBasicInformation2 = "'El Claro de Luna en Paradise Flamingo Beach Hotel y Casino - un ' \
                                     'legado de la cocina Costaricense - conocido por su exquisita combinacion de ' \
                                     'sabores y variedad platillos. Mariscos frescos del mar hasta su mesa, ' \
                                     'del Chef. '"
        else:
            blockBasicInformation2 = bsObj.find("div", {"id": "content-block"}).find("h2").get_text()
            blockBasicInformation=titleOfert#elimina_tildes(blockBasicInformation2)




        #Obtain description
        retailerBlock=bsObj.find("div",{"id":"retailer_block"})#.get_text()
        tipo = str(type(retailerBlock))
        #print tipo
        if (tipo == "<type 'NoneType'>"):
         #   print ("Error en bloque")
            webPage = "Este pequeno hotel tiene probablemente una de las mejores vistas del Oceano Pacifico en el " \
                      "mundo entero. Vacaciones de lujo al alcance de todos y acceso cortesia del hotel a una parte " \
                      "exclusiva de playa Flamingo, una de las playas mas hermosas de Costa Rica. "
        else:
            retailerBlock = bsObj.find("div",{"id":"retailer_block"}).get_text()
            rb2=retailerBlock.replace("Sobre el establecimiento", "")
            rb3 = rb2
            rb3=elimina_tildes(rb3)
            rb3=titleOfert#rb3.replace("Haz clic aqui para comprar", "").strip().lstrip()



        # Obtain the ubication
        listaProvincias=["Alajuela","San Jose","Puntarenas","Cartago","Guanacaste","Limón","Heredia"]
        proviRan=random.randrange(7)
        ubicacion=listaProvincias[proviRan]

        promocion = generateJSON(titleOfert, imagen, p2, d2, a2, webPage, blockBasicInformation, rb3, ubicacion)
        promosJSON.append(promocion)
        #print promosJSON[0]
        print("Cargo una pagina")
    insertarPromo(promosJSON)

""""" try:
            with c.cursor() as cursor:
                sql = "INSERT INTO promotions (title,description,secondary_description,image," \
                      "web_page,original_price,current_price,saving,discount,address) VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"
                cursor.execute(sql,[titleOfert,blockBasicInformation,rb3,imagen,webPage,p2,a2,a2,d2,ubicacion])
                c.commit()
        finally:
            pass
"""



def insertarPromo(listaPromoJSON):
    print ("Inicia JSON")

    conection = psycopg2.connect(database="dbqjfpfpk5ksi6", user="fjdtkmiwlzjgqe",
                                 password="6b593cf608e20ec57be011b53924e43af6c8c9d28f3edecfbb445ebe8c06c199",
                                 host="ec2-184-73-167-43.compute-1.amazonaws.com", port="5432")

    objQuery = conection.cursor()
    for promo in listaPromoJSON:
        print("Imagen: " + promo["imagen"])
        #print("Precio Final: " + promo["precioGeneral"])
        print("Titulo: " + promo["titulo"])
       # print("Valor General: " + promo["valorGeneral"])
       # print("Ahorro Final: " + promo["precioFinal"])
        print("Pagina Web: " + promo["sitioWeb"])
        print("Ubicación: " + promo["ubicacion"])
        #print("Descripción General: " + promo["informacion"])
        #print("Descripción Del Establecimineto: " + promo["infoBasica"])
       # print("Descuento Aplicado: " + promo["descuento"])

        objQuery.execute(
            'INSERT INTO promotions (title, description, secondary_description, image, web_page, original_price, current_price, saving, discount, address) VALUES(%s, %s, %s, %s, %s, %s, %s, %s, %s, %s);',
            (promo["titulo"], promo["informacion"], promo["infoBasica"], promo["imagen"], promo["sitioWeb"], promo["precioGeneral"], promo["precioFinal"], promo["ahorro"],promo["precioFinal"], promo["ubicacion"]))
    conection.commit()
    objQuery.close()
    conection.close()





if __name__ == '__main__':
    obtenerDatos()