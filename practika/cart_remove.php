<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

require_once 'connection.php';

if(isset($_POST['remove'])) {

    $product_id = $_POST['product_id'];

    
    $sql_delete = "DELETE FROM cart WHERE id = $product_id";

    if ($conn->query($sql_delete) === TRUE) {
       // echo "Record deleted successfully";
       header("Location: cart.php");
       exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
?>

</body>
</html>