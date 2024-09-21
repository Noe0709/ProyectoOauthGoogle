import mysql.connector
from mysql.connector import Error

class DAO():

    def __init__(self):
        try:
            self.conexion = mysql.connector.connect(
                host='localhost',
                port=3306,
                user='root',
                password='123456',
                db='productos' #'productos_db' 
            )
        except Error as ex:
            print(f"Error al intentar la conexión: {ex}")

    def listarProductos(self):
        if self.conexion.is_connected():
            try:
                cursor = self.conexion.cursor()
                cursor.execute("SELECT * FROM productos ORDER BY nombre ASC")
                resultados = cursor.fetchall()
                return resultados
            except Error as ex:
                print(f"Error al intentar la conexión: {ex}")

    def registrarProducto(self, producto):
        if self.conexion.is_connected():
            try:
                cursor = self.conexion.cursor()
                sql = "INSERT INTO productos (nombre, precio, cantidad) VALUES (%s, %s, %s)"
                cursor.execute(sql, producto)
                self.conexion.commit()
                print("¡Producto registrado!")
            except Error as ex:
                print(f"Error al intentar la conexión: {ex}")

    def actualizarProducto(self, producto):
        if self.conexion.is_connected():
            try:
                cursor = self.conexion.cursor()
                sql = "UPDATE productos SET nombre = %s, precio = %s, cantidad = %s WHERE id = %s"
                cursor.execute(sql, producto)
                self.conexion.commit()
                print("¡Producto actualizado!")
            except Error as ex:
                print(f"Error al intentar la conexión: {ex}")

    def eliminarProducto(self, idProducto):
        if self.conexion.is_connected():
            try:
                cursor = self.conexion.cursor()
                sql = "DELETE FROM productos WHERE id = %s"
                cursor.execute(sql, (idProducto,))
                self.conexion.commit()
                print("¡Producto eliminado!")
            except Error as ex:
                print(f"Error al intentar la conexión: {ex}")
