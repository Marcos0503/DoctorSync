<?php
// URL de conexão vinda do Heroku
$dbUrl = "postgres://u1nb6mhl0m090a:pb977b537f4bcfabe1c8ae34101f55b12a544658af1291208cb7d1448ecd49c04@cfls9h51f4i86c.cluster-czrs8kj4isg7.us-east-1.rds.amazonaws.com:5432/dch9n98e2j25hm";

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
