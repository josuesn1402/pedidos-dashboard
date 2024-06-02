-- Eliminar la base de datos si ya existe
DROP DATABASE IF EXISTS db_pedidos;

-- Crear la base de datos
CREATE DATABASE db_pedidos;

USE db_pedidos;

-- Crear tabla Cliente
CREATE TABLE
  Cliente (
    IdCliente CHAR(6) NOT NULL,
    NomCliente VARCHAR(50) NOT NULL,
    RUC CHAR(11) NOT NULL,
    DirCliente VARCHAR(60) NOT NULL,
    TelCliente VARCHAR(20) NULL,
    Clave VARCHAR(10) NULL,
    PRIMARY KEY (IdCliente)
  );

-- Crear tabla Documento
CREATE TABLE
  Documento (
    IdDocumento TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
    NomDocumento VARCHAR(20) NULL,
    Serie TINYINT UNSIGNED NOT NULL,
    ConDocumento INT NOT NULL,
    PRIMARY KEY (IdDocumento)
  );

-- Crear tabla Empleado
CREATE TABLE
  Empleado (
    IdEmpleado CHAR(6) NOT NULL,
    ApeEmpleado VARCHAR(30) NOT NULL,
    NomEmpleado VARCHAR(30) NOT NULL,
    DirEmpleado VARCHAR(60) NULL,
    TelEmpleado VARCHAR(20) NULL,
    Clave VARCHAR(10) NOT NULL,
    PRIMARY KEY (IdEmpleado)
  );

-- Crear tabla Categoria
CREATE TABLE
  Categoria (
    IdCategoria TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
    NomCategoria VARCHAR(25) NOT NULL,
    Prefijo CHAR(3) NOT NULL,
    ConCategoria INT NOT NULL,
    PRIMARY KEY (IdCategoria)
  );

-- Crear tabla Articulo
CREATE TABLE
  Articulo (
    IdArticulo CHAR(8) NOT NULL,
    IdCategoria TINYINT UNSIGNED NOT NULL,
    NomArticulo VARCHAR(50) NOT NULL,
    PreArticulo NUMERIC(10, 2) NOT NULL,
    stock INT NOT NULL,
    PRIMARY KEY (IdArticulo),
    FOREIGN KEY (IdCategoria) REFERENCES Categoria (IdCategoria)
  );

-- Crear tabla Pedido
CREATE TABLE Pedido (
    IdPedido INT AUTO_INCREMENT PRIMARY KEY,
    IdDocumento TINYINT UNSIGNED NOT NULL,
    IdEmpleado CHAR(6) NOT NULL,
    NumDocumento VARCHAR(15) NOT NULL,
    Fecha DATETIME NOT NULL,
    IdCliente CHAR(6) NOT NULL,
    Importe NUMERIC(10, 2) NOT NULL,
    Subtotal NUMERIC(10, 2) NOT NULL,
    Descuento NUMERIC(10, 2) NULL,
    IGV NUMERIC(10, 2) NOT NULL,
    Total NUMERIC(10, 2) NOT NULL,
    Delivery TINYINT UNSIGNED NOT NULL,
    Estado TINYINT UNSIGNED NOT NULL,
    FOREIGN KEY (IdDocumento) REFERENCES Documento (IdDocumento),
    FOREIGN KEY (IdEmpleado) REFERENCES Empleado (IdEmpleado),
    FOREIGN KEY (IdCliente) REFERENCES Cliente (IdCliente)
);

-- Crear tabla DetallePedido
CREATE TABLE
  DetallePedido (
    IdPedido INT NOT NULL,
    IdArticulo CHAR(8) NOT NULL,
    Cantidad SMALLINT UNSIGNED NOT NULL,
    PreVenta NUMERIC(10, 2) NOT NULL,
    SubTotal NUMERIC(10, 2) NOT NULL,
    PRIMARY KEY (IdPedido, IdArticulo),
    FOREIGN KEY (IdPedido) REFERENCES Pedido (IdPedido),
    FOREIGN KEY (IdArticulo) REFERENCES Articulo (IdArticulo)
  );

-- Crear tabla Promocion
CREATE TABLE
  Promocion (
    IdPromocion TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
    MontoMin NUMERIC(10, 2) NOT NULL,
    MontoMax NUMERIC(10, 2) NOT NULL,
    Porcentaje TINYINT UNSIGNED NOT NULL,
    PRIMARY KEY (IdPromocion)
  );

-- Crear tabla Parametro
CREATE TABLE
  Parametro (
    Campo VARCHAR(20) NOT NULL,
    Valor VARCHAR(20) NOT NULL,
    PRIMARY KEY (Campo)
  );

-- Crear tabla Usuario
CREATE TABLE
  Usuario (
    IdUsuario INT AUTO_INCREMENT PRIMARY KEY,
    NomUsuario VARCHAR(50) NOT NULL,
    Correo VARCHAR(50) NOT NULL,
    Clave VARCHAR(10) NOT NULL
  );
