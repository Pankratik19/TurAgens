<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db_name = "travel_pre";

  $conn = new mysqli($servername,$username,$password,$db_name);

  if($conn)
  {
    echo "connected successfully";
  }
  else{
    echo "connection failed";
  }

?>