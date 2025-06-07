<?php
$host = "dpg-d11r6kk9c44c73fkvp7g-a";
$port = "5432";
$db = "sushi_db_nf3t";
$user = "sushi_db_nf3t_user";
$pass = "7WfqHYvqdtjEy1QGW7yBp4fIdtCtrwb9";

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit();
}
?>
