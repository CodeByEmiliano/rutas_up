<?php
header('Content-Type: application/json');

// Cargar variables de entorno de Azure
$hostname = getenv('AZURE_RUTAS_HOSTNAME') ?: 'mysqlrutasupserve.mysql.database.azure.com';
$username = getenv('AZURE_RUTAS_USER') ?: 'usuariorutas';
$password = getenv('AZURE_RUTAS_PASSWORD') ?: 'rutas1234$';
$database = getenv('AZURE_RUTAS_DATABASE') ?: 'rutasinicio';
$port = getenv('AZURE_RUTAS_PORT') ?: 3306;

$db = mysqli_init();

mysqli_options($db, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, false);
mysqli_ssl_set($db, null, null, null, null, null);

if (!mysqli_real_connect($db, $hostname, $username, $password, $database, $port, null, MYSQLI_CLIENT_SSL)) {
    
    echo json_encode([
        'error' => 'Error de conexión SSL',
        'detalle' => mysqli_connect_error(),
        'codigo' => mysqli_connect_errno(),
    ]);
    exit;
}

$query = "SELECT * FROM equipo WHERE visible = 1 AND id != 3 ORDER BY RAND() LIMIT 3";
$result = $db->query($query);

if (!$result) {
    echo json_encode(['error' => 'Error en consulta: ' . $db->error]);
    $db->close();
    exit;
}

$equipo = [];
while ($miembro = $result->fetch_assoc()) {
    $equipo[] = $miembro;
}

echo json_encode($equipo);
$db->close();
?>