<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>
 <?php
 if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM items WHERE id = ?");
    $stmt->execute([$id]);

    $item = $stmt->fetch(PDO::FETCH_ASSOC);
 }
 if (isset($_POST['submit'])) {

    $name = $_POST['name']; 
    $description = $_POST['description'];
    $stmt = $conn->prepare("UPDATE items SET name = ?, description = ? WHERE id = ?");
    $stmt->execute([$name, $description, $id]);
    header("Location: index.php");
 }
 ?>
 <h1>Edit Item</h1>
 <form action="" method="POST">
    <label>Name:</label><br> 
    <input type="text" name="name" value="<?= $item['name'] ?>" required><br>
    <label>Description:</label><br>
    <textarea name="description" required><?= $item['description'] ?></textarea><br>
    <button type="submit" name="submit">Update</button>
</form>
</body>
</html>
