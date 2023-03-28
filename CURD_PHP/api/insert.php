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
  }else if($_POST['dispatch'] == 'SP'){
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['dvt']) && isset($_POST['gia'])&& isset($_POST['nuocSX'])){
      $newID = $_POST['id'];
      $newName = $_POST['name'];
      $newDVT = $_POST['dvt'];
      $newNuocSX = $_POST['nuocSX'];
      $newGia = $_POST['gia'];

      $sql = "insert into SANPHAM values (?,?,?,?,?)";
      $stm = $conn -> prepare($sql);
      $stm -> bind_param("sssss", $newID,$newName,$newDVT,$newNuocSX, $newGia);
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
  }else if($_POST['dispatch'] == 'HD'){
    if (isset($_POST['SOHD']) && isset($_POST['NGHD']) && isset($_POST['MAKH']) && isset($_POST['MANV'])&& isset($_POST['gia'])){
      $SOHD = $_POST['SOHD'];
      $NGHD = $_POST['NGHD'];
      $MAKH = $_POST['MAKH'];
      $MANV = $_POST['MANV'];
      $gia = $_POST['gia'];

      $sql = "insert into HOADON values (?,?,?,?,?)";
      $stm = $conn -> prepare($sql);
      $stm -> bind_param("sssss", $SOHD,$NGHD,$MAKH,$MANV,$gia);
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