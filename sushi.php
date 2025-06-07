<?php
header("Content-Type: application/json");
include("conection.php");

try {
    $data = json_decode(file_get_contents("php://input"), true);

    $campos_obligatorios = [
        'idCliente', 'nombre', 'apellido_paterno', 'apellido_materno',
        'sexo', 'edad', 'celular', 'email', 'zona', 'metodo_pago', 'contrasena'
    ];

    foreach ($campos_obligatorios as $campo) {
        if (empty($data[$campo])) {
            echo json_encode(["status" => "error", "message" => "Campo requerido faltante: $campo"]);
            exit();
        }
    }

    $sql = "INSERT INTO tbl_clientes (
                id_cliente, nombre, apellido_paterno, apellido_materno,
                sexo, edad, celular, email, zona, metodo_pago, contrasena
            ) VALUES (
                :id_cliente, :nombre, :apellido_paterno, :apellido_materno,
                :sexo, :edad, :celular, :email, :zona, :metodo_pago, :contrasena
            )";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':id_cliente'        => $data['idCliente'],
        ':nombre'            => $data['nombre'],
        ':apellido_paterno'  => $data['apellido_paterno'],
        ':apellido_materno'  => $data['apellido_materno'],
        ':sexo'              => $data['sexo'],
        ':edad'              => $data['edad'],
        ':celular'           => $data['celular'],
        ':email'             => $data['email'],
        ':zona'              => $data['zona'],
        ':metodo_pago'       => $data['metodo_pago'],
        ':contrasena'        => password_hash($data['contrasena'], PASSWORD_DEFAULT)
    ]);

    echo json_encode(["status" => "success", "message" => "Cliente registrado exitosamente"]);
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => "Error al registrar el cliente: " . $e->getMessage()]);
}
?>
