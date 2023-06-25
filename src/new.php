<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the title from the form data
    $title = $_POST['title'];

    // Validate the title
    if (empty($title)) {
        $error = 'Title is required';
    } else {
        // Load the existing todos from a file or database
        $todos = array(
            array('id' => 1, 'title' => 'Buy milk'),
            array('id' => 2, 'title' => 'Walk the dog'),
            array('id' => 3, 'title' => 'Do laundry'),
        );

        // Add the new todo to the array
        $todos[] = array('id' => count($todos) + 1, 'title' => $title);

        // Save the updated todos to a file or database
        // ...

        // Redirect back to the index page
        header('Location: index.php');
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Todo</title>
</head>
<body>
    <h1>New Todo</h1>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title">
        <button type="submit">Add</button>
    </form>
</body>
</html>