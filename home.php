<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Home - Bem-vindo</title>
</head>
<body>
  <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
  <p>Você está logado!</p>
  <p><a href="logout.php">Sair</a></p>
</body>
</html>
