<?php
include 'connection.php';

$id = $_GET['id'];

// Prepare DELETE statement with a placeholder for the ID
$sql = "DELETE FROM tasks WHERE id=?";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the ID parameter
$stmt->bind_param("i", $id); // "i" indicates the type of parameter: integer

// Execute the statement
if ($stmt->execute()) {
    header('Location: index.php');
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement
$stmt->close();

// Close the database connection
$conn->close();
?>