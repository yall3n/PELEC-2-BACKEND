<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>
    <h1>Add Item</h1>
    <form action="" method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" required><br>
        <label>Description:</label><br>
        <textarea name="description" required></textarea><br>
        <button type="submit" name="submit">Save</button>
</form>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $stmt = $conn->prepare("INSERT INTO items (name, description) VALUES (?, ?)");
    $stmt->execute([$name, $description]); 
    header("Location: index.php");
 }
 ?>
</body>
</html>