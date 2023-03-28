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
    }else if ($_POST['emp']=="SP"){
      $sql = "select MASP from SANPHAM where MASP LIKE 'SP%'";
      $stm = $conn -> prepare($sql);
      if (!$stm -> execute()) {
        echo 'error';
      }else{
        $result = $stm -> get_result();
        if ($result -> num_rows == 0) {
          $res['MASP'] = 'SP00';
        }else{
          while($row = $result->fetch_assoc()) {
            $res=$row;
          }
        }
      }
      echo json_encode($res);


    }else if ($_POST['emp']=="HD"){
      $sql = "select SOHD from HOADON ORDER BY SOHD ASC";
      $stm = $conn -> prepare($sql);
      if (!$stm -> execute()) {
        echo 'error';
      }else{
        $result = $stm -> get_result();
        if ($result -> num_rows == 0) {
          $res['SOHD'] = 1000;
        }else{
          while($row = $result->fetch_assoc()) {
            $res=$row;
          }
        }
      }
      echo json_encode($res);
    }else if ($_POST['emp']=="NAME_KH"){
        $res = array();
      $sql = "select MAKH,HOTEN from KHACHHANG ";
      $stm = $conn -> prepare($sql);
      if (!$stm -> execute()) {
        echo 'error';
      }else{
        $result = $stm -> get_result();
        if ($result -> num_rows == 0) {
          echo 'error';
        }else{
          while($row = $result->fetch_assoc()) {
            array_push($res,$row);
          }
        }
      }
      echo json_encode($res);
    }else if ($_POST['emp']=="NAME_NV"){
      $res = array();
    $sql = "select MANV,HOTEN from NHANVIEN ";
    $stm = $conn -> prepare($sql);
    if (!$stm -> execute()) {
      echo 'error';
    }else{
      $result = $stm -> get_result();
      if ($result -> num_rows == 0) {
        echo 'error';
      }else{
        while($row = $result->fetch_assoc()) {
          array_push($res,$row);
        }
      }
    }
    echo json_encode($res);
  }
  }
?>