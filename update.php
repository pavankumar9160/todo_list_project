<?php
include 'connection.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Prepare UPDATE statement
    $sql = "UPDATE tasks SET title=?, description=? WHERE id=?";

    // Bind parameters and execute the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $title, $description, $id); // "ssi" indicates types of parameters: string, string, integer
    if ($stmt->execute()) {
        header('Location: index.php');
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    // Prepare SELECT statement
    $sql = "SELECT * FROM tasks WHERE id=?";

    // Bind parameter and execute the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // "i" indicates type of parameter: integer
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch task details
    $task = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
        <h1>Edit Task</h1>
        <form method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($task['title']); ?>">
            
            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo htmlspecialchars($task['description']); ?></textarea>
            
            <input type="submit" value="Update Task">
        </form>
    </div>
</body>
</html>