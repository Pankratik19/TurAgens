<?php 
require_once 'connection.php';
$id = $_POST['idd'];

if(isset($_POST["submit"]))
{
  $id = $_POST['idd'];
  $productname = isset($_POST["productname"]) ? $_POST["productname"] : "";
  $destination = isset($_POST["destination"]) ? $_POST["destination"] : "";
  $information = isset($_POST["information"]) ? $_POST["information"] : "";
  $price = isset($_POST["price"]) ? $_POST["price"] : "";
  $imageOnename = isset($_FILES["imageOne"]["name"]) ? addslashes($_FILES["imageOne"]["name"]) : "";
  $imageTwoname = isset($_FILES["imageTwo"]["name"]) ? addslashes($_FILES["imageTwo"]["name"]) : "";
  $imageThreename = isset($_FILES["imageThree"]["name"]) ? addslashes($_FILES["imageThree"]["name"]) : "";
  $imageOne = "";
if (isset($_FILES["imageOne"]["tmp_name"]) && file_exists($_FILES["imageOne"]["tmp_name"])) {
    $imageOne = base64_encode(addslashes(file_get_contents($_FILES["imageOne"]["tmp_name"])));
}

$imageTwo = "";
if (isset($_FILES["imageTwo"]["tmp_name"]) && file_exists($_FILES["imageTwo"]["tmp_name"])) {
    $imageTwo = base64_encode(addslashes(file_get_contents($_FILES["imageTwo"]["tmp_name"])));
}

$imageThree = "";
if (isset($_FILES["imageThree"]["tmp_name"]) && file_exists($_FILES["imageThree"]["tmp_name"])) {
    $imageThree = base64_encode(addslashes(file_get_contents($_FILES["imageThree"]["tmp_name"])));
}

  if ($id !="") {
    $sql = "UPDATE product SET ";
    $updates = array();

    if ($productname != ""){
      $updates[] = "product_name = '$productname'";
    }
    if ($destination != ""){
      $updates[] = "destination = '$destination'";
    }
    if ($information != ""){
      $updates[] = "information = '$information'";
    }
    if ($price != ""){
      $updates[] = "price = '$price'";
    }
    if ($imageOnename != "" && file_exists($_FILES["imageOne"]["tmp_name"])){
      $updates[] = "img_one = '$imageOne'";
    }
    if ($imageTwoname != "" && file_exists($_FILES["imageTwo"]["tmp_name"])){
      $updates[] = "img_two = '$imageTwo'";
    }
    if ($imageThreename != "" && file_exists($_FILES["imageThree"]["tmp_name"])){
      $updates[] = "img_three = '$imageThree'";
    }

    $sql .= implode(", ", $updates);
    $sql .= " WHERE id = $id";

    if ($conn->query($sql) === TRUE) 
    {
        echo "Record edited successfully";
    } 
    else 
    {
        echo "Error editing record: " . $conn->error;
    }
  }

  $conn -> close();
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
        <form action="update.php" method="post" enctype="multipart/form-data">
            <input type="text" id="idd" name="idd"placeholder="id змінюваного запису:" required>
            <input type="text" id="productname" name="productname" placeholder="Product Name"  >
            <input type="text" id="destination" name="destination" placeholder="Destination"  >
            <input type="text" id="information" name="information" placeholder="Information"  >
            <input type="number" id="price" name="price" placeholder="Price"  >
            <input type="file" id="imageOne" name="imageOne" placeholder="Image 1"  >
            <input type="file" id="imageTwo" name="imageTwo" placeholder="Image 2"  >
            <input type="file" id="imageThree" name="imageThree" placeholder="Image 3"  >
            <input type="submit" value="Update" name="submit">


        </form>
    </section>
</body>
</html>