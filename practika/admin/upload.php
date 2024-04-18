<?php
  require_once 'connection.php';

  if(isset($_POST["submit"]))
  {
    $productname = $_POST["productname"];
    $destination = $_POST["destination"];
    $information = $_POST["information"];
    $price = $_POST["price"];
    $imageOnename = addslashes ($_FILES["imageOne"]["name"]);
    $imageTwoname = addslashes ($_FILES["imageTwo"]["name"]);
    $imageThreename = addslashes ($_FILES["imageThree"]["name"]);
    $imageOne = base64_encode (addslashes (file_get_contents($_FILES["imageOne"]["tmp_name"] )));
    $imageTwo = base64_encode (addslashes (file_get_contents($_FILES["imageTwo"]["tmp_name"] )));
    $imageThree = base64_encode (addslashes (file_get_contents($_FILES["imageThree"]["tmp_name"] )));

    if($productname!="" && $destination!="" && $information!="" && $price!="")
    {
      $sql = "INSERT INTO product (product_name,destination,information,price,img_one,img_two,img_three,img_one_name,img_two_name,img_three_name)
      VALUES ('$productname','$destination','$information','$price','$imageOne','$imageTwo','$imageThree','$imageOnename','$imageTwoname','$imageThreename')";
      $result = $conn->query($sql);

      if ($result) 
      {
           echo '<script>alert("Product uploaded successfully")</script>';
      } 
      else 
      {
        //echo '<script>alert("Product uploading fail")</script>';
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
    }
    else{
      echo'<script>alert("please fill in all the fields")</script>';
    }

  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="upload.css">
    <title>Document</title>
</head>
<body>
    
<section id="upload_container">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="text" id="productname" name="productname" placeholder="Product Name" required >
            <input type="text" id="destination" name="destination" placeholder="Destination" required >
            <input type="text" id="information" name="information" placeholder="Information" required >
            <input type="number" id="price" name="price" placeholder="Price" required >
            <input type="file" id="imageOne" name="imageOne" placeholder="Image 1" required >
            <input type="file" id="imageTwo" name="imageTwo" placeholder="Image 2" required >
            <input type="file" id="imageThree" name="imageThree" placeholder="Image 3" required >
            <input type="submit" value="Upload" name="submit">

        </form>
    </section>
</body>
</html>