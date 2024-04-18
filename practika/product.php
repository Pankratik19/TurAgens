<?php //окремий товар
require_once 'connection.php';

$product_id = $_GET['id'];
$sql = "SELECT * FROM product WHERE id = $product_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} 
else 
{
    echo "Товар не знайдено";
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="product.css">
    <title>Document</title>
</head>
<body>
<script src="js/images.js"></script>
<?php include_once 'header.php'?>
<main>
        <div class="card">
            
            <div class="image_main">
                 <img id="mainImage" src="images/<?php echo $row['img_one_name']; ?>" alt="image"> 
              
            </div>
            <div class="image_side">
                 <img src="images/<?php echo $row['img_one_name']; ?>" alt="image" onclick="changeMainImage(this)"> 
                 <img src="images/<?php echo $row['img_two_name']; ?>" alt="image" onclick="changeMainImage(this)">
                <img src="images/<?php echo $row['img_three_name']; ?>" alt="image" onclick="changeMainImage(this)"> 
               
            </div>
            <div class="caption">
    
                <p class="product_name"><?php echo $row['product_name']; ?></p>
                <p class="destination">Країна призначення:<?php echo $row['destination']; ?></p>
                <p class="information"><?php echo $row['information']; ?>.</p> 
                <p class="price">Ціна: <?php echo $row['price']; ?> грн</p>
                <form id="cartForm" action="add_to_cart.php" method="post">
                     <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                     <input type="hidden" name="total" id="total" value="<?php echo $row['price']; ?>">
                     <button form="cartForm" type="submit" class="add">Додати в кошик</button>
                </form>

            </div>
                
           
        </div>
</main>
<?php include_once 'footer.php'?>
</body>
</html>