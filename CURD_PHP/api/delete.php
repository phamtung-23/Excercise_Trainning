<?php
  include "../connectDB.php";

  
  if (isset($_POST['id'])){
    $res = array("status"=>false, "mes" => "");
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
  }
?>