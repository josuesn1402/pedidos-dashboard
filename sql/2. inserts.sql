USE db_pedidos;

-- Insertar datos en la tabla Cliente
INSERT INTO
  Cliente (
    IdCliente,
    NomCliente,
    RUC,
    DirCliente,
    TelCliente,
    Clave
  )
VALUES
  (
    'C00001',
    'Cliente Uno',
    '12345678901',
    'Direccion 1',
    '123456789',
    'clave1'
  ),
  (
    'C00002',
    'Cliente Dos',
    '12345678902',
    'Direccion 2',
    '123456789',
    'clave2'
  ),
  (
    'C00003',
    'Cliente Tres',
    '12345678903',
    'Direccion 3',
    '123456789',
    'clave3'
  ),
  (
    'C00004',
    'Cliente Cuatro',
    '12345678904',
    'Direccion 4',
    '123456789',
    'clave4'
  ),
  (
    'C00005',
    'Cliente Cinco',
    '12345678905',
    'Direccion 5',
    '123456789',
    'clave5'
  );

-- Insertar datos en la tabla Documento
INSERT INTO
  Documento (NomDocumento, Serie, ConDocumento)
VALUES
  ('Factura', 1, 1001),
  ('Boleta', 2, 1002),
  ('Nota de Crédito', 3, 1003),
  ('Nota de Débito', 4, 1004),
  ('Guía de Remisión', 5, 1005);

-- Insertar datos en la tabla Empleado
INSERT INTO
  Empleado (
    IdEmpleado,
    ApeEmpleado,
    NomEmpleado,
    DirEmpleado,
    TelEmpleado,
    Clave
  )
VALUES
  (
    'E00001',
    'Perez',
    'Juan',
    'Direccion A',
    '987654321',
    'claveA'
  ),
  (
    'E00002',
    'Garcia',
    'Maria',
    'Direccion B',
    '987654322',
    'claveB'
  ),
  (
    'E00003',
    'Lopez',
    'Carlos',
    'Direccion C',
    '987654323',
    'claveC'
  ),
  (
    'E00004',
    'Rodriguez',
    'Ana',
    'Direccion D',
    '987654324',
    'claveD'
  ),
  (
    'E00005',
    'Fernandez',
    'Luis',
    'Direccion E',
    '987654325',
    'claveE'
  );

-- Insertar datos en la tabla Categoria
INSERT INTO
  Categoria (NomCategoria, Prefijo, ConCategoria)
VALUES
  ('Electrónica', 'ELE', 101),
  ('Ropa', 'ROP', 102),
  ('Alimentos', 'ALI', 103),
  ('Juguetes', 'JUQ', 104),
  ('Libros', 'LIB', 105);

-- Insertar datos en la tabla Articulo
INSERT INTO
  Articulo (
    IdArticulo,
    IdCategoria,
    NomArticulo,
    PreArticulo,
    stock
  )
VALUES
  ('A000001', 1, 'Televisor', 1500.00, 10),
  ('A000002', 2, 'Camisa', 50.00, 50),
  ('A000003', 3, 'Arroz', 2.50, 100),
  ('A000004', 4, 'Muñeca', 30.00, 20),
  ('A000005', 5, 'Libro de Cocina', 35.00, 15);

-- Insertar datos en la tabla Pedido
INSERT INTO
  Pedido (
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
VALUES
  (
    1,
    1,
    'E00001',
    '0001',
    '2023-01-01 10:00:00',
    'C00001',
    100.00,
    90.00,
    10.00,
    18.00,
    108.00,
    1,
    1
  ),
  (
    2,
    2,
    'E00002',
    '0002',
    '2023-01-02 11:00:00',
    'C00002',
    200.00,
    180.00,
    20.00,
    36.00,
    216.00,
    1,
    1
  ),
  (
    3,
    3,
    'E00003',
    '0003',
    '2023-01-03 12:00:00',
    'C00003',
    300.00,
    270.00,
    30.00,
    54.00,
    324.00,
    1,
    1
  ),
  (
    4,
    4,
    'E00004',
    '0004',
    '2023-01-04 13:00:00',
    'C00004',
    400.00,
    360.00,
    40.00,
    72.00,
    432.00,
    1,
    1
  ),
  (
    5,
    5,
    'E00005',
    '0005',
    '2023-01-05 14:00:00',
    'C00005',
    500.00,
    450.00,
    50.00,
    90.00,
    540.00,
    1,
    1
  );

-- Insertar datos en la tabla DetallePedido
INSERT INTO
  DetallePedido (
    IdPedido,
    IdArticulo,
    Cantidad,
    PreVenta,
    SubTotal
  )
VALUES
  (1, 'A000001', 1, 1500.00, 1500.00),
  (2, 'A000002', 2, 50.00, 100.00),
  (3, 'A000003', 3, 2.50, 7.50),
  (4, 'A000004', 4, 30.00, 120.00),
  (5, 'A000005', 5, 35.00, 175.00);

-- Insertar datos en la tabla Promocion
INSERT INTO
  Promocion (MontoMin, MontoMax, Porcentaje)
VALUES
  (100.00, 200.00, 10),
  (200.01, 300.00, 15),
  (300.01, 400.00, 20),
  (400.01, 500.00, 25),
  (500.01, 600.00, 30);

-- Insertar datos en la tabla Parametro
INSERT INTO
  Parametro (Campo, Valor)
VALUES
  ('IVA', '18'),
  ('DESCUENTO_MAXIMO', '50'),
  ('DIAS_ENTREGA', '5'),
  ('HORARIO_ATENCION', '09:00-18:00'),
  ('MONEDA', 'USD');

INSERT INTO
  Usuario (NomUsuario, Correo, Clave)
VALUES
  ('user1', 'usuario1@example.com', '1234'),
  ('user2', 'usuario2@example.com', '1234'),
  ('user3', 'usuario3@example.com', '1234');