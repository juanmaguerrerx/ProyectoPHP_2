CREATE TABLE `empleados` (
    `dni` VARCHAR(255) NOT NULL PRIMARY KEY, `nombre_empleado` VARCHAR(255) NOT NULL, `correo` VARCHAR(255) NOT NULL, `telefono` BIGINT NOT NULL, `direccion` VARCHAR(255) NOT NULL, `fecha_alta` DATE DEFAULT NOW(), `admin` TINYINT(1) NOT NULL DEFAULT '0'
);

CREATE TABLE `paises` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `iso` CHAR(2) NULL, `nombre` VARCHAR(80) NULL
);

CREATE TABLE `cuotas` (
    `cif_cliente` VARCHAR(255) NOT NULL, `concepto` VARCHAR(255) NOT NULL, `fecha_emision` DATE NOT NULL, `importe` DOUBLE(8, 2) NOT NULL, `pagada` TINYINT(1) NOT NULL DEFAULT '0', `fecha_pago` DATE NULL, `notas` VARCHAR(255), FOREIGN KEY (`cif_cliente`) REFERENCES `clientes` (`cif`)
);

CREATE TABLE `clientes` (
    `cif` VARCHAR(255) NOT NULL PRIMARY KEY, `nombre` VARCHAR(255) NOT NULL, `telefono` BIGINT NOT NULL, `correo` VARCHAR(255) NOT NULL, `cuenta_corriente` VARCHAR(255) NOT NULL, `pais` INT NOT NULL, `moneda` VARCHAR(255) NOT NULL, `importe_mensual` BIGINT NULL, CONSTRAINT `clientes_pais_foreign` FOREIGN KEY (`pais`) REFERENCES `paises` (`id`)
);

-- DATOS ALEATORIOS

INSERT INTO
    `clientes` (
        `cif`, `nombre`, `telefono`, `correo`, `cuenta_corriente`, `pais`, `moneda`, `importe_mensual`
    )
VALUES (
        'CIF1', 'Cliente1', 123456789, 'cliente1@example.com', 'ES12345678901234567890', 73, 'EUR', 1000
    ),
    (
        'CIF2', 'Cliente2', 987654321, 'cliente2@example.com', 'ES09876543210987654321', 112, 'USD', 1500
    ),
    (
        'CIF3', 'Cliente3', 456789012, 'cliente3@example.com', 'ES34567890123456789012', 155, 'GBP', 1200
    ),
    (
        'CIF4', 'Cliente4', 789012345, 'cliente4@example.com', 'ES56789012345678901234', 20, 'JPY', 2000
    ),
    (
        'CIF5', 'Cliente5', 234567890, 'cliente5@example.com', 'ES67890123456789012345', 56, 'CAD', 1800
    );

INSERT INTO `empleados` 
    (`dni`, `nombre_empleado`, `correo`, `telefono`, `direccion`, `fecha_alta`, `admin`)
VALUES
    ('12345678A', 'Empleado1', 'empleado1@example.com', 123456789, 'Dirección1', '', 0),
    ('23456789B', 'Empleado2', 'empleado2@example.com', 987654321, 'Dirección2', '', 1),
    ('34567890C', 'Empleado3', 'empleado3@example.com', 456789012, 'Dirección3', '', 0),
    ('45678901D', 'Empleado4', 'empleado4@example.com', 789012345, 'Dirección4', '2024-01-30', 0),
    ('56789012E', 'Empleado5', 'empleado5@example.com', 234567890, 'Dirección5', '2024-01-29', 1);


-- Insertar 5 cuotas aleatorias
INSERT INTO `cuotas` (`cif_cliente`, `concepto`, `fecha_emision`, `importe`, `pagada`, `fecha_pago`, `notas`)
VALUES
    ('CIF123456', 'Cuota Mensual', '2024-01-01', 500.00, 0, NULL, 'Primera cuota'),
    ('CIF987654', 'Cuota Anual', '2024-02-15', 1200.00, 0, NULL, 'Cuota anual de mantenimiento'),
    ('CIF789012', 'Cuota Trimestral', '2024-03-10', 800.00, 1, '2024-03-20', 'Cuota trimestral pagada'),
    ('CIF345678', 'Cuota Mensual', '2024-04-05', 600.00, 0, NULL, 'Cuota mensual pendiente'),
    ('CIF123789', 'Cuota Anual', '2024-05-20', 1500.00, 0, NULL, 'Cuota anual de servicios');

