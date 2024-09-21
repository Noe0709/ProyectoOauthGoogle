def listarProductos(productos):
    print("\nProductos: \n")
    contador = 1
    for prod in productos:
        datos = "{0}. ID_Producto: {1} | Descripcion: {2} | Costo: {3} | Precio_Venta: {4}"
        print(datos.format(contador, prod[0], prod[1], prod[2], prod[3]))
        contador = contador + 1
    print(" ")


def pedirDatosRegistro():
    idCorrecto = False
    while not idCorrecto:
        ID_Producto = input("Ingrese ID del producto (6 caracteres): ")
        if len(ID_Producto) == 6:
            idCorrecto = True
        else:
            print("ID incorrecto: Debe tener 6 caracteres.")

    Descripcion = input("Ingrese la descripción del producto: ")

    costoCorrecto = False
    while not costoCorrecto:
        Costo = input("Ingrese el costo del producto: ")
        try:
            Costo = float(Costo)
            if Costo > 0:
                costoCorrecto = True
            else:
                print("El costo debe ser mayor a 0.")
        except ValueError:
            print("Costo incorrecto: Debe ser un número.")

    precioCorrecto = False
    while not precioCorrecto:
        Precio_Venta = input("Ingrese el precio de venta: ")
        try:
            Precio_Venta = float(Precio_Venta)
            if Precio_Venta > 0:
                precioCorrecto = True
            else:
                print("El precio de venta debe ser mayor a 0.")
        except ValueError:
            print("Precio de venta incorrecto: Debe ser un número.")

    producto = (ID_Producto, Descripcion, Costo, Precio_Venta)
    return producto


def pedirDatosActualizacion(productos):
    listarProductos(productos)
    existeID = False
    ID_Producto = input("Ingrese el ID del producto a editar: ")
    for prod in productos:
        if prod[0] == ID_Producto:
            existeID = True
            break

    if existeID:
        Descripcion = input("Ingrese la nueva descripción: ")

        costoCorrecto = False
        while not costoCorrecto:
            Costo = input("Ingrese el nuevo costo: ")
            try:
                Costo = float(Costo)
                if Costo > 0:
                    costoCorrecto = True
                else:
                    print("El costo debe ser mayor a 0.")
            except ValueError:
                print("Costo incorrecto: Debe ser un número.")

        precioCorrecto = False
        while not precioCorrecto:
            Precio_Venta = input("Ingrese el nuevo precio de venta: ")
            try:
                Precio_Venta = float(Precio_Venta)
                if Precio_Venta > 0:
                    precioCorrecto = True
                else:
                    print("El precio de venta debe ser mayor a 0.")
            except ValueError:
                print("Precio de venta incorrecto: Debe ser un número.")

        producto = (ID_Producto, Descripcion, Costo, Precio_Venta)
    else:
        producto = None

    return producto


def pedirDatosEliminacion(productos):
    listarProductos(productos)
    existeID = False
    ID_Producto = input("Ingrese el ID del producto a eliminar: ")
    for prod in productos:
        if prod[0] == ID_Producto:
            existeID = True
            break

    if not existeID:
        ID_Producto = ""

    return ID_Producto
