
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $product_id = $_POST['product_id'];
        $total = $_POST['total'];
        $sql = "INSERT INTO cart (product_id,total) VALUES ('$product_id','$total')";
        if ($conn->query($sql) === TRUE) {
            //echo "Product added to cart successfully.";
            header("Location: cart.php");
        exit();

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    $conn->close();
    ?>
</body>
</html>