<?php
$config = include('config/database.php');
$dsn = "{$config['driver']}:host={$config['host']};dbname={$config['database']};options='--client_encoding=UTF8'";

try {
    $pdo = new PDO($dsn, $config['user'], $config['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
    exit;
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $query = "SELECT * FROM usuarios WHERE nombre = :nombre";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nombre', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $query = "SELECT * FROM perfiles WHERE id = :perfil_id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':perfil_id', $user['perfil']);
            $stmt->execute();
            $perfil = $stmt->fetch(PDO::FETCH_ASSOC);

            $_SESSION['username'] = $username;
            $_SESSION['perfil'] = $perfil;
            header("Location: dashboard.php");
            exit;
        } else {
            $_SESSION['error'] = "Nombre de usuario o contraseña incorrectos.";
            header("Location: index.php");
            exit;
        }
    } catch (PDOException $e) {
        echo 'Error de consulta: ' . $e->getMessage();
    }
}
?>


