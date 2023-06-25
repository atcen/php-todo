<?php
// Include the database connection
require_once 'db.php';

// Load the todos from the database
$sql = 'SELECT * FROM todos';
$result = $conn->query($sql);

$todos = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $todos[] = $row;
    }
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the title from the form data
    $title = $_POST['title'];

    // Validate the title
    if (empty($title)) {
        $error = 'Title is required';
    } else {
        // Insert the new todo into the database
        $sql = "INSERT INTO todos (title) VALUES ('$title')";
        if ($conn->query($sql) === false) {
            $error = 'Error adding todo: ' . $conn->error;
        } else {
            // Get the ID of the new todo
            $id = $conn->insert_id;

            // Add the new todo to the array
            $todos[] = array('id' => $id, 'title' => $title);
        }
    }
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO</title>
</head>
<body>
    <h1>TODO List</h1>
    <ul>
        <?php foreach ($todos as $todo): ?>
            <li><?php echo $todo['title']; ?></li>
        <?php endforeach; ?>
    </ul>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title">
        <button type="submit">Add new item</button>
    </form>
</body>
</html>