<?php
$config = include('../config/database.php');
$dsn = "{$config['driver']}:host={$config['host']};dbname={$config['database']};options='--client_encoding=UTF8'";

try {
    $pdo = new PDO($dsn, $config['user'], $config['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
    exit;
}

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$input = file_get_contents("php://input");
$request = json_decode($input, true);

$start = isset($request['start']) ? (int)$request['start'] : 0;
$length = isset($request['length']) ? (int)$request['length'] : 10;
$search = isset($request['search']['value']) ? $request['search']['value'] : '';

// Número total de registros
$totalQuery = $pdo->query("SELECT COUNT(*) FROM glorias");
$total = $totalQuery->fetchColumn();

// Número de registros filtrados
$filterQuery = $pdo->prepare("SELECT COUNT(*) FROM glorias WHERE CONCAT(nombre, ' ', apellido) LIKE :search OR cedula LIKE :search");
$searchParam = "%$search%";
$filterQuery->bindParam(':search', $searchParam, PDO::PARAM_STR);
$filterQuery->execute();
$filteredTotal = $filterQuery->fetchColumn();

// Recuperar datos filtrados
$dataQuery = $pdo->prepare("SELECT id, cedula, CONCAT(nombre, ' ', apellido) AS nombre_completo FROM glorias WHERE CONCAT(nombre, ' ', apellido) LIKE :search OR cedula LIKE :search ORDER BY nombre LIMIT :length OFFSET :start");
$dataQuery->bindParam(':search', $searchParam, PDO::PARAM_STR);
$dataQuery->bindParam(':start', $start, PDO::PARAM_INT);
$dataQuery->bindParam(':length', $length, PDO::PARAM_INT);
$dataQuery->execute();

$data = $dataQuery->fetchAll(PDO::FETCH_ASSOC);

$response = [
    "draw" => isset($request['draw']) ? intval($request['draw']) : 0,
    "recordsTotal" => $total,
    "recordsFiltered" => $filteredTotal,
    "data" => $data
];

echo json_encode($response);
?>
