<?php
require_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
http_response_code(405);
echo json_encode(['error' => 'Método no permitido']);
exit();
}
// Destruir la sesión
session_destroy();
echo json_encode(['success' => true]);
?>