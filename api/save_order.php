<?php
// save_order.php

// Include database connection file
include('dbcon.php');

// Set the content type to JSON
header('Content-Type: application/json');

// Get order data from request
$orderData = json_decode(file_get_contents('php://input'), true);

// Prepare SQL statement to insert order data
$sql = "INSERT INTO orders (id, items, total, date, status) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $orderData['id'], json_encode($orderData['items']), $orderData['total'], $orderData['date'], $orderData['status']);

// Execute the statement
if ($stmt->execute()) {
    echo json_encode(['message' => 'Order saved successfully']);
} else {
    echo json_encode(['error' => 'Failed to save order']);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
