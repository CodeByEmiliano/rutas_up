<?php
// Intentar cargar variables de entorno de Azure primero
$servername = getenv('AZURE_RUTAS_HOSTNAME') ?: "mysqlrutasupserve.mysql.database.azure.com";
$username = getenv('AZURE_RUTAS_USER') ?: "usuariorutas";
$password = getenv('AZURE_RUTAS_PASSWORD') ?: "rutas1234$";
$dbname = getenv('AZURE_RUTAS_DATABASE') ?: "rutasinicio";
$port = getenv('AZURE_RUTAS_PORT') ?: 3306;

$conn = mysqli_init();

mysqli_options($conn, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, false);
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

if (!mysqli_real_connect($conn, $servername, $username, $password, $dbname, $port, NULL, MYSQLI_CLIENT_SSL)) {
    error_log("Error conexión MySQL: " . mysqli_connect_error());
    $conn = false;
} else {
    $conn->set_charset("utf8mb4");
}
?>