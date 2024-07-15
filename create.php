<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO tasks (title, description) VALUES ('$title', '$description')";

    if ($conn->query($sql) === TRUE) {
       echo '<script>alert("Tak Added")</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<div class="container">
        <h1>Add New Task</h1>
        <form method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title">
            
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>
            
            <input type="submit" value="Add Task">
        </form>
        <a href="index.php" class="btn-view">View added Tasks</a>
    </div>
</html>