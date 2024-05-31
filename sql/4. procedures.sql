USE db_pedidos;

-- Eliminar procedimientos si ya existen
DROP PROCEDURE IF EXISTS SeleccionarClientes;
DROP PROCEDURE IF EXISTS SeleccionarDocumentos;
DROP PROCEDURE IF EXISTS SeleccionarEmpleados;
DROP PROCEDURE IF EXISTS SeleccionarArticulos;
DROP PROCEDURE IF EXISTS SeleccionarCategorias;
DROP PROCEDURE IF EXISTS SeleccionarDetallePedidos;
DROP PROCEDURE IF EXISTS SeleccionarPedidos;
DROP PROCEDURE IF EXISTS InsertarPedido;
DROP PROCEDURE IF EXISTS ModificarPedido;
DROP PROCEDURE IF EXISTS EliminarPedido;

DELIMITER $$

-- Procedimiento para seleccionar todos los clientes
CREATE PROCEDURE SeleccionarClientes()
BEGIN
  SELECT * FROM Cliente;
END $$

-- Procedimiento para seleccionar todos los documentos
CREATE PROCEDURE SeleccionarDocumentos()
BEGIN
  SELECT * FROM Documento;
END $$

-- Procedimiento para seleccionar todos los empleados
CREATE PROCEDURE SeleccionarEmpleados()
BEGIN
  SELECT * FROM Empleado;
END $$

-- Procedimiento para seleccionar todos los artículos
CREATE PROCEDURE SeleccionarArticulos()
BEGIN
  SELECT * FROM Articulo;
END $$

-- Procedimiento para seleccionar todas las categorías
CREATE PROCEDURE SeleccionarCategorias()
BEGIN
  SELECT * FROM Categoria;
END $$

-- Procedimiento para seleccionar todos los detalles de pedidos
CREATE PROCEDURE SeleccionarDetallePedidos()
BEGIN
  SELECT * FROM DetallePedido;
END $$

-- Procedimiento para seleccionar todos los pedidos
CREATE PROCEDURE SeleccionarPedidos()
BEGIN
  SELECT IdPedido, IdDocumento, IdEmpleado, NumDocumento, Fecha, Importe, Estado FROM Pedido;
END $$

-- Procedimiento para insertar un nuevo pedido
CREATE PROCEDURE InsertarPedido(
  IN p_IdPedido INT,
  IN p_IdDocumento TINYINT UNSIGNED,
  IN p_IdEmpleado CHAR(6),
  IN p_NumDocumento VARCHAR(15),
  IN p_Fecha DATETIME,
  IN p_IdCliente CHAR(6),
  IN p_Importe DECIMAL(10, 2),
  IN p_Subtotal DECIMAL(10, 2),
  IN p_Descuento DECIMAL(10, 2),
  IN p_IGV DECIMAL(10, 2),
  IN p_Total DECIMAL(10, 2),
  IN p_Delivery TINYINT UNSIGNED,
  IN p_Estado TINYINT UNSIGNED
)
BEGIN
  INSERT INTO Pedido (
  IdPedido,
  IdDocumento,
  IdEmpleado,
  NumDocumento,
  Fecha,
  IdCliente,
  Importe,
  Subtotal,
  Descuento,
  IGV,
  Total,
  Delivery,
  Estado
  )
  VALUES (
  p_IdPedido,
  p_IdDocumento,
  p_IdEmpleado,
  p_NumDocumento,
  p_Fecha,
  p_IdCliente,
  p_Importe,
  p_Subtotal,
  p_Descuento,
  p_IGV,
  p_Total,
  p_Delivery,
  p_Estado
  );
END $$

-- Procedimiento para modificar un pedido existente
CREATE PROCEDURE ModificarPedido(
  IN p_IdPedido INT,
  IN p_IdDocumento TINYINT UNSIGNED,
  IN p_IdEmpleado CHAR(6),
  IN p_NumDocumento VARCHAR(15),
  IN p_Fecha DATETIME,
  IN p_IdCliente CHAR(6),
  IN p_Importe DECIMAL(10, 2),
  IN p_Subtotal DECIMAL(10, 2),
  IN p_Descuento DECIMAL(10, 2),
  IN p_IGV DECIMAL(10, 2),
  IN p_Total DECIMAL(10, 2),
  IN p_Delivery TINYINT UNSIGNED,
  IN p_Estado TINYINT UNSIGNED
)
BEGIN
  UPDATE Pedido
  SET
  IdDocumento = p_IdDocumento,
  IdEmpleado = p_IdEmpleado,
  NumDocumento = p_NumDocumento,
  Fecha = p_Fecha,
  IdCliente = p_IdCliente,
  Importe = p_Importe,
  Subtotal = p_Subtotal,
  Descuento = p_Descuento,
  IGV = p_IGV,
  Total = p_Total,
  Delivery = p_Delivery,
  Estado = p_Estado
  WHERE IdPedido = p_IdPedido;
END $$

-- Procedimiento para eliminar un pedido existente
CREATE PROCEDURE EliminarPedido(IN p_IdPedido INT)
BEGIN
  DELETE FROM Pedido WHERE IdPedido = p_IdPedido;
END $$

DELIMITER ;
