<?php
header('Content-Type: application/json; charset=utf-8');

$host = 'localhost';
$user = 'project';
$password = 'project123';
$dbname = 'project';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Erro no banco de dados.']);
    exit;
}

$email = $_POST['email'] ?? '';
$senha = $_POST['password'] ?? '';

if (empty($email) || empty($senha)) {
    echo json_encode(['success' => false, 'message' => 'Preencha todos os campos.']);
    exit;
}

$stmt = $conn->prepare('SELECT senha_hash FROM user WHERE email = ? LIMIT 1');
if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Erro na consulta ao banco.']);
    exit;
}

$stmt->bind_param('s', $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    echo json_encode(['success' => false, 'message' => 'Usuário não encontrado.']);
    $stmt->close();
    $conn->close();
    exit;
}

$stmt->bind_result($senha_hash);
$stmt->fetch();

if (password_verify($senha, $senha_hash)) {
    echo json_encode(['success' => true, 'message' => 'Login realizado com sucesso!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Senha incorreta.']);
}

$stmt->close();
$conn->close();
