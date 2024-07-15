<?php
include 'connection.php';

// Prepare the SQL statement
$sql = "SELECT * FROM tasks";
$stmt = $conn->prepare($sql);

// Execute the statement
$stmt->execute();

// Get result set
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
        <h1>To-Do List</h1>
        <a href="create.php" class="add-task">Add New Task</a>
        <ul>
            <?php while($row = $result->fetch_assoc()): ?>
                <li>
                    <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                    <a href="update.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete">Delete</a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>

<?php
// Close statement
$stmt->close();
$conn->close();
?>