<?php
header('Content-Type: application/json');
include 'db.php';

if (!$conn) {
    echo json_encode([
        "success" => false,
        "message" => "Error de conexión con el servidor"
    ]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo json_encode([
        "success" => false,
        "message" => "Método no permitido"
    ]);
    exit;
}

if (!isset($_POST['nombre'], $_POST['correo'], $_POST['numero'], $_POST['asunto'])) {
    echo json_encode([
        "success" => false,
        "message" => "Faltan datos en el formulario"
    ]);
    exit;
}

$nombre = trim($_POST['nombre']);
$correo = trim($_POST['correo']);
$numero = trim($_POST['numero']);
$asunto = trim($_POST['asunto']);

if (empty($nombre) || empty($correo) || empty($numero) || empty($asunto)) {
    echo json_encode([
        "success" => false,
        "message" => "Todos los campos son obligatorios"
    ]);
    exit;
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        "success" => false,
        "message" => "Correo electrónico no válido"
    ]);
    exit;
}

$numero_limpio = preg_replace('/[^0-9]/', '', $numero);
if (strlen($numero_limpio) < 10) {
    echo json_encode([
        "success" => false,
        "message" => "El número debe tener al menos 10 dígitos"
    ]);
    exit;
}

$sql = "INSERT INTO contactos (nombre, correo, numero, asunto, fecha_registro) 
        VALUES (?, ?, ?, ?, NOW())";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode([
        "success" => false,
        "message" => "Error al preparar la consulta: " . $conn->error
    ]);
    exit;
}

$stmt->bind_param("ssss", $nombre, $correo, $numero, $asunto);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Tu mensaje ha sido enviado con éxito. Nos pondremos en contacto contigo pronto."
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Error al guardar el mensaje. Por favor, intente nuevamente."
    ]);
}

$stmt->close();
$conn->close();
?>