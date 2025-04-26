<?php
// Configuración de la base de datos en Azure
$host = "tudbserver.mysql.database.azure.com";  // Nombre del servidor Azure MySQL
$dbname = "nombre_bd";                           // Nombre de la base de datos
$username = "tu_usuario@tudbserver";             // Usuario de base de datos con el formato <usuario>@<servidor>
$password = "tu_contraseña";                    // Contraseña de la base de datos

try {
    // Crear una nueva conexión PDO, forzando SSL sin especificar certificados
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $username, $password, [
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,  // No verificar el certificado del servidor
        PDO::MYSQL_ATTR_SSL_KEY => null,                     // No especificar clave del cliente
        PDO::MYSQL_ATTR_SSL_CERT => null,                    // No especificar certificado del cliente
        PDO::MYSQL_ATTR_SSL_CA => null,                      // No especificar el certificado CA
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION         // Modo de error
    ]);

    echo "Conexión exitosa a la base de datos en Azure con SSL (sin certificados explícitos).";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
