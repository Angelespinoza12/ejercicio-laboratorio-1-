<?php
require_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
http_response_code(405);
echo json_encode(['error' => 'Método no permitido']);
exit();
}
$data = json_decode(file_get_contents('php://input'), true);
$tarjeta = $data['tarjeta'] ?? '';
$pin = $data['pin'] ?? '';
if (empty($tarjeta) || empty($pin)) {
http_response_code(400);
echo json_encode(['error' => 'Tarjeta y PIN requeridos']);
exit();
}
$pdo = getDB();
$stmt = $pdo->prepare("SELECT id, nombre, saldo, pin_hash FROM usuarios WHERE
tarjeta = ?");
$stmt->execute([$tarjeta]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
if ($usuario && password_verify($pin, $usuario['pin_hash'])) {
// Iniciar sesión
$_SESSION['usuario_id'] = $usuario['id'];
$_SESSION['usuario_nombre'] = $usuario['nombre'];
echo json_encode([
'success' => true,
'usuario' => [
'id' => $usuario['id'],
'nombre' => $usuario['nombre'],
'saldo' => $usuario['saldo']
]
]);
} else {
http_response_code(401);
echo json_encode(['error' => 'Tarjeta o PIN incorrectos']);
}
?>
