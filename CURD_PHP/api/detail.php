<?php
  include "../connectDB.php";

  if (isset($_POST['id'])){
    $idKH = $_POST['id'];
    $res = array();

    $sql = "select * from KHACHHANG where MAKH = ?";
    $stm = $conn -> prepare($sql);
    $stm -> bind_param("s", $idKH);
    if (!$stm -> execute()) {
      echo 'error';
    }else{
      $result = $stm -> get_result();
      if ($result -> num_rows == 0) {
        echo 'error';
      }else{
        while($row = $result->fetch_assoc()) {
          $res=$row;
        }
      }
    }
    echo json_encode($res);
  }
?>