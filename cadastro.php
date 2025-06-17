<?php
// cadastro.php

// Configurações do banco
$host = "localhost";
$dbname = "project";
$user = "project";
$pass = "project123";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recebe os dados do formulário
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Validações simples
    if (!$nome || !$email || !$senha) {
        throw new Exception("Por favor, preencha todos os campos para finalizar o cadastro.");
    }

    // Verifica se o email já está cadastrado
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM user WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetchColumn() > 0) {
        throw new Exception("Este e-mail já está cadastrado.");
    }

    // Hash da senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Insere no banco
    $stmt = $pdo->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $email, $senhaHash]);

    header("Location: index.html?msg=Cadastro realizado com sucesso. Faça login!");
    exit;

} catch (Exception $e) {
    echo "<p>Erro: " . htmlspecialchars($e->getMessage()) . "</p>";
    echo '<p><a href="cadastro.html">Voltar ao cadastro</a></p>';
}
?>
