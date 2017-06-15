import psycopg2

url = "http://localhost:9000/cupon"

def insertarCupones(listaCuponesJSON):
    conection = psycopg2.connect(database="dbqjfpfpk5ksi6", user="fjdtkmiwlzjgqe",
                                 password="6b593cf608e20ec57be011b53924e43af6c8c9d28f3edecfbb445ebe8c06c199",
                                 host="ec2-184-73-167-43.compute-1.amazonaws.com", port="5432")
    objQuery = conection.cursor()
    for cupon in listaCuponesJSON:
        print("id: " + str(cupon["id"]))
        print("Imagen: " + cupon["imagen"])
        print("Informacion: " + cupon["informacion"])
        print("Precio Actual: " + str(cupon["precioActual"]))
        print("Descuento: " + str(cupon["descuento"]))
        print("Finaliza: " + cupon["finaliza"])
        print("Tipo: " + cupon["tipo"])
        print("Precio Original: " + str(cupon["precioOriginal"]))
        print("Lugar: " + cupon["lugar"])
        print("Periodo De Uso: " + cupon["periodoDeUso"])
        print("Horario: " + cupon["horario"])
        print("Como Llegar: " + cupon["comoLlegar"])
        objQuery.execute(
            'INSERT INTO coupons (information, image, expiration_date, type, discount, original_price, current_price, city, address, schedule, use_interval) VALUES(%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s);',
            (cupon["informacion"], cupon["imagen"], cupon["finaliza"], cupon["tipo"], cupon["descuento"],
             cupon["precioOriginal"], cupon["precioActual"], cupon["lugar"], cupon["comoLlegar"], cupon["horario"],
             cupon["periodoDeUso"]))

    conection.commit()
    objQuery.close()
    conection.close()

def insertarPromo(listaPromoJSON):
    conection = psycopg2.connect(database="d8uqfr9b0s558k", user="almadmldqqdyxj",
                                 password="908fadd1cc02984877396b7cdf9593f83a484a43ba7563b852bfd80f3facd8f8",
                                 host="ec2-54-225-107-107.compute-1.amazonaws.com", port="5432")
    objQuery = conection.cursor()
    for promo in listaPromoJSON:
        print("id: " + str(promo["id"]))
        print("Imagen: " + promo["imagen"])
        print("Precio Final: " + promo["precioFinal"])
        print("Titulo: " + promo["titulo"])
        print("Valor General: " + promo["valorGeneral"])
        print("Ahorro Final: " + promo["ahorroFinal"])
        print("Pagina Web: " + promo["paginaWeb"])
        print("Ubicación: " + promo["ubication"])
        print("Descripción General: " + promo["descripcionGeneral"])
        print("Descripción Del Establecimineto: " + promo["descriptionEstablecimineto"])
        print("Descuento Aplicado: " + promo["descuentoAplicado"])
        objQuery.execute(
            'INSERT INTO bookTable (title, description, secondary_description, image, web_page, original_price, current_price, saving, discount, address) VALUES(%s, %s, %s, %s, %s, %s, %s, %s, %s, %s);',
            (promo["titulo"], promo["descripcionGeneral"], promo["descriptionEstablecimineto"], promo["imagen"], promo["paginaWeb"], promo["valorGeneral"], promo["precioFinal"], promo["ahorroFinal"],promo["descuentoAplicado"], promo["ubication"]))
    conection.commit()
    objQuery.close()
    conection.close()


"""def conectionDB():
        conection = psycopg2.connect(database="d8uqfr9b0s558k", user="almadmldqqdyxj", password="908fadd1cc02984877396b7cdf9593f83a484a43ba7563b852bfd80f3facd8f8", host="ec2-54-225-107-107.compute-1.amazonaws.com", port="5432")
        objQuery = conection.cursor()
        objQuery.execute(
                'INSERT INTO bookTable (Author, Name, Price, nPages, Bookbinding, Editorial, Language, ISBN) VALUES(%s, %s, %s, %s, %s, %s, %s, %s);',
                (book[0], book[1], price, nPages, book[4], book[5], book[6], book[7]))
        
        conection.commit()
        objQuery.close()
        conection.close() 
        """