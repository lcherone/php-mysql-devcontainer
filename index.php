<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

// connect
try {
    $pdo = new PDO(
        sprintf("mysql:host=%s;dbname=%s;charset=utf8mb4", 
            getenv('DB_HOSTNAME'), 
            getenv('DB_DATABASE')
        ), 
        getenv('DB_USERNAME'), 
        getenv('DB_PASSWORD'), 
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
} catch (\PDOException $e) {
    exit('Error: '.$e->getMessage().' - Code: '.(int)$e->getCode());
}

$stmt = $pdo->prepare("SELECT some_column FROM example WHERE id = ?");
$stmt->execute([1]);
echo $stmt->fetch()['some_column'];