from BD.conexion import DAO
import funciones

# Crear una instancia del DAO
dao = DAO()

# Listar los productos actuales
productos = dao.listarProductos()
if len(productos) > 0:
    producto = funciones.pedirDatosActualizacion(productos)
    if producto:
        dao.actualizarProducto(producto)
    else:
        print("Producto no encontrado.")
else:
    print("No se encontraron productos.")
