<?php
  include "../connectDB.php";


  if (isset($_POST['id']) && isset($_POST['loai'])){
    if ($_POST['loai'] == 'KH'){

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
    }else if ($_POST['loai'] == 'NV'){
      $idNV = $_POST['id'];
      $res = array();
  
      $sql = "select * from NHANVIEN where MANV = ?";
      $stm = $conn -> prepare($sql);
      $stm -> bind_param("s", $idNV);
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
    }else if ($_POST['loai'] == 'SP'){
      $idSP = $_POST['id'];
      $res = array();
  
      $sql = "select * from SANPHAM where MASP = ?";
      $stm = $conn -> prepare($sql);
      $stm -> bind_param("s", $idSP);
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
    }else if ($_POST['loai'] == 'HD'){
      $idSP = $_POST['id'];
      $res = array();
  
      $sql = "select * from HOADON where SOHD = ?";
      $stm = $conn -> prepare($sql);
      $stm -> bind_param("s", $idSP);
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