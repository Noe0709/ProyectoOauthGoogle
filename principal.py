from BD.conexion import DAO
import funciones


def menuPrincipal():
    continuar = True
    while continuar:
        opcionCorrecta = False
        while not opcionCorrecta:
            print("==================== MEN� PRINCIPAL ====================")
            print("1.- Listar productos")
            print("2.- Registrar producto")
            print("3.- Actualizar producto")
            print("4.- Eliminar producto")
            print("5.- Salir")
            print("========================================================")
            opcion = int(input("Seleccione una opci�n: "))

            if opcion < 1 or opcion > 5:
                print("Opci�n incorrecta, ingrese nuevamente...")
            elif opcion == 5:
                continuar = False
                print("�Gracias por usar este sistema!")
                break
            else:
                opcionCorrecta = True
                ejecutarOpcion(opcion)


def ejecutarOpcion(opcion):
    dao = DAO()

    if opcion == 1:
        try:
            productos = dao.listarProductos()
            if len(productos) > 0:
                funciones.listarProductos(productos)
            else:
                print("No se encontraron productos...")
        except:
            print("Ocurri� un error al listar los productos...")
    elif opcion == 2:
        producto = funciones.pedirDatosRegistro()
        try:
            dao.registrarProducto(producto)
        except:
            print("Ocurri� un error al registrar el producto...")
    elif opcion == 3:
        try:
            productos = dao.listarProductos()
            if len(productos) > 0:
                producto = funciones.pedirDatosActualizacion(productos)
                if producto:
                    dao.actualizarProducto(producto)
                else:
                    print("ID del producto a actualizar no encontrado...\n")
            else:
                print("No se encontraron productos...")
        except:
            print("Ocurri� un error al actualizar el producto...")
    elif opcion == 4:
        try:
            productos = dao.listarProductos()
            if len(productos) > 0:
                idEliminar = funciones.pedirDatosEliminacion(productos)
                if not(idEliminar == ""):
                    dao.eliminarProducto(idEliminar)
                else:
                    print("ID del producto no encontrado...\n")
            else:
                print("No se encontraron productos...")
        except:
            print("Ocurri� un error al eliminar el producto...")
    else:
        print("Opci�n no v�lida...")


menuPrincipal()
