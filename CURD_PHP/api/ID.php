<?php
  include "../connectDB.php";
  $res = array();
  
  if (isset($_POST['getID'])){
    if ($_POST['emp']=="KH"){
      $sql = "select MAKH from KHACHHANG";
      $stm = $conn -> prepare($sql);
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


    }else if ($_POST['emp']=="NV"){
      $sql = "select MANV from NHANVIEN";
      $stm = $conn -> prepare($sql);
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
  }
?>