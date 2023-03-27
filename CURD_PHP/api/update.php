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

    $res = array("status"=>false, "mes" => "");

    $sql = "update KHACHHANG set HOTEN = ?, DCHI = ?, SODT = ?, NGSINH = ?, NGDK = ?, DOANHSO = ?, LOAIKH = ? where MAKH = ?";
    $stm = $conn -> prepare($sql);
    $stm -> bind_param("sssssiss",$newName,$newDchi,$newSDT,$newNgSinh,$newNgDK,$newDS,$newLoaiKH, $newID);
    if (!$stm -> execute()) {
      $res["status"] = false;
      $res["mes"] = "Something wrong!";
      echo json_encode($res);
    }else{
      $res["status"] = true;
      $res["mes"] = "Update successful!";
      echo json_encode($res);
    }
  }
?>