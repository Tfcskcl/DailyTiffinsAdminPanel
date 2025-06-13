<?php
session_start();
include('config/dbcon.php'); // Ensure this file contains your database connection

header('Content-Type: application/json');

// Get the JSON data from the request
$data = json_decode(file_get_contents('php://input'), true);

// Check if the required fields are present
if (!isset($data['name'], $data['email'], $data['phone'])) {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit;
}

// Sanitize input data
$name = $con->real_escape_string($data['name']);
$email = $con->real_escape_string($data['email']);
$phone = $con->real_escape_string($data['phone']);

// Check for existing user
$sql = "SELECT * FROM users WHERE email = ? OR phone = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $email, $phone);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // User already exists
    echo json_encode(['success' => false, 'message' => 'User  already registered.']);
    exit;
}

// Insert new user into the database
$sql = "INSERT INTO users (name, email, phone) VALUES (?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("sss", $name, $email, $phone);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Registration successful!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to register user.']);
}

// Close the statement and connection
$stmt->close();
$con->close();
?>
