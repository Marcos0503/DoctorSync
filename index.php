<?php
// URL de conexão vinda do Heroku
$dbUrl = "postgres://u6lm5jg8b9ahf:p52ccce63eb68ae09437539ed2ffcb5e636214ef5c99f8037b4c89b035fc403ce@c8m0261h0c7idk.cluster-czrs8kj4isg7.us-east-1.rds.amazonaws.com:5432/d94cr7oamtoh3";

// Parse da URL
$db = parse_url($dbUrl);

// Parâmetros da conexão
$host = $db['host'];
$port = $db['port'];
$user = $db['user'];
$pass = $db['pass'];
$dbname = ltrim($db['path'], '/');

// Tentar conectar ao banco de dados
try {
    // Conexão usando PDO (Postgres)
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    // Configurações adicionais de PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão com o banco de dados bem-sucedida!";
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>
