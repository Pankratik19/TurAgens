<?php
  require_once 'connection.php';
  $sql = "SELECT * FROM product";
  $all_product = $conn->query($sql);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Document</title>
</head>
<body>
    
    <?php include_once 'header.php'?>
    <main>
        <?php
          while($row=mysqli_fetch_assoc($all_product))
          {
        ?> 
        <div class="card">
            <div class="image">
             <a href="product.php?id=<?php echo $row['id']; ?>"><img src="images/<?php echo $row["img_one_name"]?>" alt="image"></a>   
            </div>
            <div class="caption">
                <div class="name">
                   <h2><?php echo $row["product_name"]?></h2>
                </div>
                <div class="destination">
                    <h3><?php echo $row["destination"]?></h3>
                </div>
                <div class="price">
                   <p><?php echo $row["price"]?> грн </p>
                </div>
            </div>
            <button class="add" onclick="window.location.href='product.php?id=<?php echo $row['id']; ?>'">Add to cart</button>
        </div>
         <?php
          }
        ?> 
    </main>
    <?php include_once 'footer.php'?>
    <div class="uud">
        <a class="img_upload" href="admin/upload.php"><img src="images/upload.png" alt=""></a>
       <a class="img_update" href="admin/update.php"><img src="images/update.png" alt=""></a>
       <a class="img_delete" href="admin/delete.php"><img src="images/delete.png" alt=""></a>
    </div>
</body>
</html>