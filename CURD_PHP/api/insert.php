<?php
  include "../connectDB.php";

  extract($_POST);

  if (isset($_POST['id'])&&isset($_POST['name'])&&isset($_POST['diaChi'])&&isset($_POST['sdt'])&&isset($_POST['ngaySinh'])&&isset($_POST['ngayDK'])&&isset($_POST['doanhSo'])&&isset($_POST['typeKH'])){
    $newID = $_POST['id'];
    $newName = $_POST['name'];
    $newDchi = $_POST['diaChi'];
    $newSDT = $_POST['sdt'];
    $newNgSinh = $_POST['ngaySinh'];
    $newNgDK = $_POST['ngayDK'];
    $newDS = $_POST['doanhSo'];
    $newLoaiKH = $_POST['typeKH'];



    $sql = "insert into KHACHHANG values (?,?,?,?,?,?,?,?)";
    $stm = $conn -> prepare($sql);
    $stm -> bind_param("ssssssis", $newID,$newName,$newDchi,$newSDT,$newNgSinh,$newNgDK,$newDS,$newLoaiKH);
    if (!$stm -> execute()) {
      echo 'error';
    }else{
      echo 'success';
    }
  }
?>