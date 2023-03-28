<?php
  include "../connectDB.php";

  
  if (isset($_POST['id']) && isset($_POST['type'])){
    $res = array("status"=>false, "mes" => "");
    if ($_POST['type']=='KH'){
      $maKH = $_POST['id'];
  
      $sql = "delete from KHACHHANG where MAKH = ?";
      $stm = $conn -> prepare($sql);
      $stm -> bind_param("s",$maKH);
      if (!$stm -> execute()) {
        $res["status"] = false;
        $res["mes"] = "Something wrong or related to foreign key!";
        echo json_encode($res);
      }else{
        $res["status"] = true;
        $res["mes"] = "Delete successful!";
        echo json_encode($res);
      }
    }else if($_POST['type']=='NV'){
      $maNV = $_POST['id'];
  
      $sql = "delete from NHANVIEN where MANV = ?";
      $stm = $conn -> prepare($sql);
      $stm -> bind_param("s",$maNV);
      if (!$stm -> execute()) {
        $res["status"] = false;
        $res["mes"] = "Something wrong or related to foreign key!";
        echo json_encode($res);
      }else{
        $res["status"] = true;
        $res["mes"] = "Delete successful!";
        echo json_encode($res);
      }
    }else if($_POST['type']=='SP'){
      $maSP = $_POST['id'];
  
      $sql = "delete from SANPHAM where MASP = ?";
      $stm = $conn -> prepare($sql);
      $stm -> bind_param("s",$maSP);
      if (!$stm -> execute()) {
        $res["status"] = false;
        $res["mes"] = "Something wrong or related to foreign key!";
        echo json_encode($res);
      }else{
        $res["status"] = true;
        $res["mes"] = "Delete successful!";
        echo json_encode($res);
      }
    }else if($_POST['type']=='HD'){
      $maHD = $_POST['id'];
  
      $sql = "delete from HOADON where SOHD = ?";
      $stm = $conn -> prepare($sql);
      $stm -> bind_param("i",$maHD);
      if (!$stm -> execute()) {
        $res["status"] = false;
        $res["mes"] = "Something wrong or related to foreign key!";
        echo json_encode($res);
      }else{
        $res["status"] = true;
        $res["mes"] = "Delete successful!";
        echo json_encode($res);
      }
    }
  }
?>