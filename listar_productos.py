from BD.conexion import DAO
import funciones

# Crear una instancia del DAO para interactuar con la base de datos
dao = DAO()

# Listar productos
productos = dao.listarProductos()

# Mostrar productos usando la función predefinida
if len(productos) > 0:
    funciones.listarProductos(productos)
else:
    print("No se encontraron productos.")
