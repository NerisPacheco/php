
<?php
// --- Función de conexión MySQL con SSL ---
function getMySqlConnection() {
    $host = "10.0.1.4";
    $user = "npacheco8";
    $pass = "Neris2202#12";
    $db   = "";
    $port = 3306;
 
    $con = mysqli_init();
    mysqli_ssl_set($con, NULL, NULL, NULL, NULL, NULL);
    mysqli_real_connect(
        $con,
        $host,
        $user,
        $pass,
        $db,
        $port,
        NULL,
        MYSQLI_CLIENT_SSL
    );
 
    if (mysqli_connect_errno()) {
        die("<div class='message error'>❌ Error MySQL (SSL): " . mysqli_connect_error() . "</div>");
    }
else:
    echo("conexion exitosa! ")
    return $con;
}
?>