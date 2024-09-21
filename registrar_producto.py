from BD.conexion import DAO
import funciones

# Crear una instancia del DAO
dao = DAO()

# Pedir los datos del producto al usuario (simulamos la entrada desde PHP con variables)
nombre = input("Ingrese el nombre del producto: ")
precio = float(input("Ingrese el precio del producto: "))
cantidad = int(input("Ingrese la cantidad del producto: "))

# Crear el producto como tupla (nombre, precio, cantidad)
producto = (nombre, precio, cantidad)

# Registrar producto en la base de datos
dao.registrarProducto(producto)
