<?php
  include "../connectDB.php";

  extract($_POST);

if ($_POST['dispatch']=='KH'){
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
}else if ($_POST['dispatch']=='NV'){
  if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['sdt']) && isset($_POST['ngayVL'])){
    $newID = $_POST['id'];
    $newName = $_POST['name'];
    $newSDT = $_POST['sdt'];
    $newNgVL = $_POST['ngayVL'];

    $res = array("status"=>false, "mes" => "");

    $sql = "update NHANVIEN set HOTEN = ?, SODT = ?, NGVL = ? where MANV = ?";
    $stm = $conn -> prepare($sql);
    $stm -> bind_param("ssss",$newName, $newSDT,$newNgVL, $newID);
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
}else if ($_POST['dispatch']=='SP'){
  if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['dvt']) && isset($_POST['nuocSX'])&& isset($_POST['gia'])){
    $newID = $_POST['id'];
    $newName = $_POST['name'];
    $newDVT = $_POST['dvt'];
    $newNuocSX = $_POST['nuocSX'];
    $newGia = $_POST['gia'];

    $res = array("status"=>false, "mes" => "");

    $sql = "update SANPHAM set TENSP = ?, DVT = ?, NUOCSX = ?, GIA = ? where MASP = ?";
    $stm = $conn -> prepare($sql);
    $stm -> bind_param("sssss",$newName, $newDVT,$newNuocSX,$newGia, $newID);
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
}else if ($_POST['dispatch']=='HD'){
  if (isset($_POST['SOHD']) && isset($_POST['NGHD']) && isset($_POST['MAKH']) && isset($_POST['MANV'])&& isset($_POST['gia'])){
    $SOHD = $_POST['SOHD'];
    $NGHD = $_POST['NGHD'];
    $MAKH = $_POST['MAKH'];
    $MANV = $_POST['MANV'];
    $gia = $_POST['gia'];

    $res = array("status"=>false, "mes" => "");

    $sql = "update HOADON set NGHD = ?, MAKH = ?, MANV = ?, TRIGIA = ? where SOHD = ?";
    $stm = $conn -> prepare($sql);
    $stm -> bind_param("sssii",$NGHD,$MAKH,$MANV,$gia,$SOHD);
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
}
?>