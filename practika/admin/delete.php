<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'connection.php';

    $name = $_POST['namee'];
 
    $name = $conn->real_escape_string($name);

    if (is_numeric($name)) {
        $sql = "DELETE FROM product WHERE id = '$name'"; 
    } else {
        $sql = "DELETE FROM product WHERE product_name = '$name'"; 
    }

    if ($conn->query($sql) === TRUE) {
        echo " row deleted succesfully";
    } else {
        echo " delete attempt error " . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="delete.css">
    <title>Document</title>
</head>
<body>
<div class="main">
    <form action="delete.php" method="post">
        <label for="namee">Enter Name or ID to delete row: </label> 
        <input type="text" name="namee" id="namee"><br>
        <input type="submit" value="Select" id="btn">
    </form>
</div>
</body>
</html>