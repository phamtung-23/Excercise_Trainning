<?php
  include "../connectDB.php";

  extract($_POST);
  $res = array("status"=>false, "mes" => "");
  if($_POST['dispatch'] == 'KH'){
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
  }else if($_POST['dispatch'] == 'NV'){
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['sdt']) && isset($_POST['ngayVL'])){
      $newID = $_POST['id'];
      $newName = $_POST['name'];
      $newSDT = $_POST['sdt'];
      $newNgayVL = $_POST['ngayVL'];

      $sql = "insert into NHANVIEN values (?,?,?,?)";
      $stm = $conn -> prepare($sql);
      $stm -> bind_param("ssss", $newID,$newName,$newSDT,$newNgayVL);
      if (!$stm -> execute()) {
        $res["status"] = false;
        $res["mes"] = "Something wrong!";
        echo json_encode($res);
      }else{
        $res["status"] = true;
        $res["mes"] = "Add successful!";
        echo json_encode($res);
      }

    }
  }
  
?>