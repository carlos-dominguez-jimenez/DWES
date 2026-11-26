CREATE DATABASE IF NOT EXISTS gestisimal CHARACTER SET utf8mb4;
USE gestisimal;

CREATE TABLE IF NOT EXISTS articulo (
    codigo VARCHAR(10) NOT NULL PRIMARY KEY,
    descripcion VARCHAR(100) NOT NULL,
    precio_compra DECIMAL(10,2) NOT NULL,
    precio_venta DECIMAL(10,2) NOT NULL,
    stock INT UNSIGNED NOT NULL DEFAULT 0
);

INSERT INTO articulo (codigo, descripcion, precio_compra, precio_venta, stock) VALUES
('h020', 'Barra acerro', 35.50, 45.50, 10),
('h007', 'Barra para cortinas', 10.20, 22.35, 15),
('h005', 'Caja tuercas', 21.00, 25.00, 12),
('h006', 'Estantería para la pared', 18.50, 32.00, 13);