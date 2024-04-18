<?php
  require_once 'connection.php';
  $sql_cart = "SELECT * FROM cart";
  $all_cart = $conn->query($sql_cart);
  $num_items = mysqli_num_rows($all_cart);
  $sql_total = "SELECT SUM(total) AS total_price FROM cart"; // Add an alias to the SUM(total) column
  $result = $conn->query($sql_total); // Execute the query
  $row = $result->fetch_assoc(); // Fetch the row
  $total_price = $row['total_price'];
  if($row['total_price'] == null ){
    $total_price = 0;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <title>Document</title>
</head>
<body>
<?php 
      include_once 'header.php';
    ?>
    <main>
        <h1>Кількість <?php echo $num_items; ?></h1>
    <hr>
        <?php
          while($row_cart=mysqli_fetch_assoc($all_cart))
          {
            $sql = "SELECT * FROM product WHERE id =" .$row_cart["product_id"];
            $all_product = $conn->query($sql);
            while($row=mysqli_fetch_assoc($all_product))
          {
        ?>
    <div class="card">
        <div class="images">
            <img src="images/<?php echo $row['img_one_name']; ?>" alt="image">
        </div>
        <div class="caption">
            <p class="product_name"><b>Назва</b> <br><br><?php echo $row["product_name"]?></p>
            <p class="price"><b>Ціна:</b> <br><br> <?php echo $row["price"]?>грн</p>
            <p class="total"><b>Сума</b> <br><br><b><?php echo $row_cart["total"]?>грн</b></p>
        </div>
        <form action="cart_remove.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $row_cart['id']; ?>">
        <button type="submit" class="remove" name="remove">Видалити</button>
        </form>
    </div>
        <?php
          }
        }
        ?>
        <h1 class="total_price" >Сума: <?php echo $total_price; ?> грн </h1>
    </main>
    
    <?php 
      include_once 'footer.php';
    ?>
</body>
</html>