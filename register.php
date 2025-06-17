<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($name) || empty($email) || empty($password)) {
        echo "Por favor, preencha todos os campos para finalizar seu cadastro.";
        exit;
    }

    // doublecheck email
    $stmt = $pdo->prepare("SELECT id FROM user WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        echo "Este email já está cadastrado.";
        exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $hash]);

        echo "Seu usuário foi cadastrado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao cadastrar seu usuário: " . $e->getMessage();
    }
} else {
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <title>Cadastre seu usuário</title>
    </head>
    <body>
        <h2>Cadastre seu usuário</h2>
        <form action="register.php" method="post">
            <label for="name">Nome:</label><br />
            <input type="text" id="name" name="name" required /><br /><br />

            <label for="email">Email:</label><br />
            <input type="email" id="email" name="email" required /><br /><br />

            <label for="password">Senha:</label><br />
            <input type="password" id="password" name="password" required /><br /><br />

            <button type="submit">Cadastrar</button>
        </form>
    </body>
    </html>
    <?php
}
