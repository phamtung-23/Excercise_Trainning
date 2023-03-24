<?php
  // $host = "localhost"; // Host name
  // $username = "root"; // Mysql username
  // $password = ""; // Mysql password
  // $db_name = "football_wweb"; // Database name

  $host = "localhost"; // Host name
  $username = "tungpham"; // Mysql username
  $password = "cUXpdqeQFStgjnLH"; // Mysql password
  $db_name = "tungpham"; // Database name


  // Create connection
  $conn = new mysqli($host, $username, $password, $db_name);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  echo "<script>
        console.log('Connection database successful!!')</script>";
?>