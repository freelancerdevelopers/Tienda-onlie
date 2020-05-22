
/**
 * Autor:  ba3
 * Correo: lbatres@freelancerdevelopers.com
 * Majeador: 10.4.11-MariaDB
 * Creado: 14-abr-2020
 * Acutalizacion: 8-may-2020
 */
CREATE DATABASE tienda_freelancer CHARACTER SET utf8 COLLATE utf8_general_ci;
USE tienda_freelancer;

CREATE TABLE tienda_freelancer.TBL_Usuarios (
	id_usuario INT(255) auto_increment NOT NULL,
	nombre_usuario varchar(100) NOT NULL,
	email_usuario varchar(255) NOT NULL,
	password_usuario varchar(255) NOT NULL,
	rol_usuario varchar(20) NOT NULL,
	avatar_usuario varchar(100) NOT NULL,
	CONSTRAINT TBL_Usuarios_PK PRIMARY KEY (id_usuario)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci
COMMENT='Tabla de registro de usuarios';

INSERT INTO TBL_Usuarios (nombre_usuario, email_usuario, password_usuario, rol_usuario, avatar_usuario) VALUES('ADMINISTRATOR', 'admin', '$2y$04$uM1QrAQ4Cw8WltUCN.c3OerZv3Tpjz3qk.QzJ1Ls12gc0pZIGhP16', 'administrator', NULL);


CREATE TABLE tienda_freelancer.TBL_Categorias (
	id_categoria INT(255) auto_increment NOT NULL,
	nombre_categoria varchar(100) NOT NULL,
	CONSTRAINT TBL_Categorias_PK PRIMARY KEY (id_categoria)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci
COMMENT='Tabla de registro de categorias de productos';

INSERT INTO TBL_Categorias (nombre_categoria) VALUES('CATEGORIA UNO');


CREATE TABLE tienda_freelancer.TBL_Productos (
	id_producto INT(255) auto_increment NOT NULL,
	id_categoria INT(255) NOT NULL,
	nombre_producto varchar(100) NOT NULL,
	descripcion_producto TEXT NOT NULL,
	precio_producto FLOAT(100,2) NOT NULL,
	stock_producto INT(255) NOT NULL,
	oferta_producto varchar(10) NULL,
	imageb_producto varchar(255) NOT NULL,
	fecha_producto DATE,
	CONSTRAINT TBL_Productos_PK PRIMARY KEY (id_producto),
	CONSTRAINT TBL_Productos_FK FOREIGN KEY (id_categoria) REFERENCES tienda_freelancer.TBL_Categorias(id_categoria)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci
COMMENT='Tabla de registro de productos - extencion con  la tabla de categorias';

INSERT INTO TBL_Productos (id_categoria, nombre_producto, descripcion_producto, precio_producto, stock_producto, oferta_producto, imagen_producto, fecha_producto) 
VALUES(1, 'PRODUCTO UNO', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam placerat, ipsum eget lobortis facilisis, dui diam varius enim, eget efficitur enim urna at ligula. Curabitur eu sapien gravida, iaculis ligula non, pharetra ipsum. Etiam a lacus lacus. Nulla ut semper ante, quis viverra nisi. Aliquam nec elit et lectus molestie fermentum ac sed metus.', 100, 50, 20, 'gorra.png', '2020/04/14');


CREATE TABLE tienda_freelancer.TBL_Pedidos (
	id_pedido INT(255) auto_increment NOT NULL,
	id_usuario INT(255) NOT NULL,
	costo_pedido varchar(255) NOT NULL,
	ciudad_pedido varchar(255) NOT NULL,
	direccion_pedido varchar(100) NOT NULL,
	zip_pedido varchar(100) NOT NULL,
	estado_pedido varchar(100) NOT NULL,
	fecha_pedido DATE NOT NULL,
	hora_pedido TIME NOT NULL,
	imagen_producto varchar(255) NOT NULL,
	CONSTRAINT TBL_Pedidos_PK PRIMARY KEY (id_pedido),
	CONSTRAINT TBL_Pedidos_FK FOREIGN KEY (id_usuario) REFERENCES tienda_freelancer.TBL_Usuarios(id_usuario)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci
COMMENT='Tabla de registro de pedidos - extencion con tabla usuario';



CREATE TABLE tienda_freelancer.TBL_Rel_Pedidos_Productos (
	id_relacion_ped_pro int(255) auto_increment NOT NULL,
	id_pedido int(255) NOT NULL,
	id_producto int(255) NOT NULL,
	unidades_rel_ped_pro int(255) NOT NULL,
	CONSTRAINT TBL_Rel_Pedidos_Productos_PK PRIMARY KEY (id_relacion_ped_pro),
	CONSTRAINT TBL_Rel_Pedidos_Productos_FK FOREIGN KEY (id_pedido) REFERENCES tienda_freelancer.TBL_Pedidos(id_pedido),
	CONSTRAINT TBL_Rel_Pedidos_Productos_FK_1 FOREIGN KEY (id_producto) REFERENCES tienda_freelancer.TBL_Productos(id_producto)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci
COMMENT='Tabla pibote o temporal de registros relacion pedido productos uno a muchos';
