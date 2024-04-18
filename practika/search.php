<?php
  require_once 'connection.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    $search_term = mysqli_real_escape_string($conn, $_POST['search']);

    $sql = "SELECT * FROM product WHERE product_name LIKE '%$search_term%'";

    $result = $conn->query($sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="search.css">
    <title>Document</title>
</head>
<body>
      <?php
         include_once 'header.php';
      ?>
<main>
      <?php
       if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
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
                   <p><?php echo $row["price"]?></p>
                </div>
            </div>
            <button class="add" onclick="window.location.href='product.php?id=<?php echo $row['id']; ?>'">Add to cart</button>
        </div>
        <?php
        }
    }else {
        echo "Товарів не знайдено";
    }

    $conn->close();
        ?> 
    </main>
    <?php
      include_once 'footer.php';
    ?>
</body>
</html>