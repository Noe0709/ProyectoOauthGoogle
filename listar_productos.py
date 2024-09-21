from BD.conexion import DAO
import funciones

# Crear una instancia del DAO para interactuar con la base de datos
dao = DAO()

# Listar productos
productos = dao.listarProductos()

# Mostrar productos usando la función predefinida
print("hola mundo")
if len(productos) > 0:
    funciones.listarProductos(productos)

else:
    raise ValueError("No se encontraron productos.")
