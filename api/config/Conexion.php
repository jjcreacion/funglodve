<?php 
class Conexion {
    public static function getConnection() {
        $config = include('database.php');
        $dsn = "{$config['driver']}:host={$config['host']};dbname={$config['database']};options='--client_encoding=UTF8'";
        try {
            $pdo = new PDO($dsn, $config['user'], $config['pass']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
        }
    }
}
?>
