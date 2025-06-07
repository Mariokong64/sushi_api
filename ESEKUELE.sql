CREATE TABLE tbl_clientes (
    id_cliente VARCHAR PRIMARY KEY,
    nombre VARCHAR NOT NULL,
    apellido_paterno VARCHAR NOT NULL,
    apellido_materno VARCHAR NOT NULL,
    sexo VARCHAR NOT NULL,
    edad INTEGER NOT NULL,
    celular VARCHAR,
    email VARCHAR NOT NULL,
    zona VARCHAR NOT NULL,
    metodo_pago VARCHAR NOT NULL,
    contrasena TEXT NOT NULL
);
