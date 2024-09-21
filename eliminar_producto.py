from BD.conexion import DAO
import funciones

# Crear una instancia del DAO
dao = DAO()

# Listar productos
productos = dao.listarProductos()
if len(productos) > 0:
    codigoEliminar = funciones.pedirDatosEliminacion(productos)
    if codigoEliminar:
        dao.eliminarProducto(codigoEliminar)
    else:
        print("Producto no encontrado.")
else:
    print("No se encontraron productos.")

