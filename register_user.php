<?php
session_start();
header('Content-Type: application/json');
include('config/dbcon.php');

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['name'], $data['email'], $data['phone'])) {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit;
}

$name = $con->real_escape_string(trim($data['name']));
$email = $con->real_escape_string(trim($data['email']));
$phone = $con->real_escape_string(trim($data['phone']));
$password = md5('123456');

$check_sql = "SELECT * FROM users WHERE email = ? OR phone = ?";
$stmt = $con->prepare($check_sql);
$stmt->bind_param("ss", $email, $phone);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'User already registered.']);
    exit;
}

$insert_sql = "INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)";
$stmt = $con->prepare($insert_sql);
$stmt->bind_param("ssss", $name, $email, $phone, $password);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Registration successful!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to register user.']);
}

$stmt->close();
$con->close();
?>
