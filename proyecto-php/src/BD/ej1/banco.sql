CREATE DATABASE IF NOT EXISTS banco CHARACTER SET utf8 COLLATE utf8_general_ci;
USE banco;

CREATE TABLE IF NOT EXISTS cliente (
    dni VARCHAR(9) NOT NULL PRIMARY KEY,
    nombre VARCHAR(60) NOT NULL,
    direccion VARCHAR(100),
    telefono VARCHAR(15)
);

INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES
('11111111A', 'Ana López', 'C/ Sierpes 10, Sevilla', '600111222'),
('22222222B', 'Luis Pérez', 'Av. de la Constitución 5, Sevilla', '600333444'),
('33333333C', 'Marta Ruiz', 'C/ Betis 21, Sevilla', '600555666');
