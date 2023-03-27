<?php
   include "connectDB.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles.css">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Khach Hang</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
</head>
<body>
<div class="">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">DASHBOARD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link active" href="./index.php">KHACH HANG</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./nhanVien.php">NHAN VIEN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./hoaDon.php">HOA DON</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./sanPham.php">SAN PHAM</a>
        </li>
      </ul>
      <!-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> -->
    </div>
  </nav>
  <div class="container-fluid">
    <h3 class="text-center text-success p-3">DANH SÁCH KHÁCH HÀNG</h3>
    <div class="w-100 d-flex justify-content-end">
      <button class='btn btn-success m-2 btnAddKH' data-toggle="modal" data-target="#exampleModalAdd" ><i class="fas fa-user-plus pr-2"></i> Thêm mới</button>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Ma KH</th>
          <th scope="col">Họ tên</th>
          <th scope="col">Địa chỉ</th>
          <th scope="col">SDT</th>
          <th scope="col">ngày sinh</th>
          <th scope="col">ngày  DK</th>
          <th scope="col">Doanh số</th>
          <th scope="col">Loại KH</th>
          <th scope="col">Công cụ</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "select * from KHACHHANG";
          $stm = $conn -> prepare($sql);
          // $stm -> bind_param("s", $otp);
          if (!$stm -> execute()) {
            echo "<script>console.log('error')</script>";
          }else{
            $result = $stm -> get_result();
            if ($result -> num_rows == 0) {
              echo "<script>console.log('empty data!')</script>";
            }else{
              while($row = $result->fetch_assoc()) {
                ?>
                  <tr>
                    <th scope="row"><?= $row['MAKH']?></th>
                    <td><?= $row['HOTEN']?></td>
                    <td><?= $row['DCHI']?></td>
                    <td><?= $row['SODT']?></td>
                    <td><?= $row['NGSINH']?></td>
                    <td><?= $row['NGDK']?></td>
                    <td><?= $row['DOANHSO']?></td>
                    <td><?= $row['LOAIKH']?></td>
                    <td>
                      <button class="btn btn-primary btnEdit"  data-toggle="modal" data-target="#exampleModal" data-id=<?= $row['MAKH']?>><i class="fas fa-edit pr-2"></i>sửa</button>
                      <button class="btn btn-danger btnDelete_KH" data-toggle="modal" data-target="#deleteModal" data-id=<?= $row['MAKH']?> ><i class="fas fa-trash-alt pr-2"></i>xóa</button>
                    </td>
                  </tr>
                <?php
              }
            }
          }
        ?>
       
      </tbody>
    </table>
  </div>
</div>


<!-- model add  -->
<div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Khách hàng mới</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mã KH:</label>
            <input type="text" class="form-control" disabled id="add-id">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Họ tên:</label>
            <input type="text" class="form-control" id="add-name"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Địa chỉ:</label>
            <input type="text" class="form-control" id="add-address"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">SDT:</label>
            <input type="text" class="form-control" id="add-phone"></input>
          </div>
          
          <div class="form-group">
            <label for="message-text" class="col-form-label">Ngày sinh:</label>
            <input type="date" class="form-control" id="add-birth"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Ngày ĐK:</label>
            <input type="date" class="form-control" id="add-DK"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Doanh số:</label>
            <input type="number" class="form-control" id="add-DS"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Loại KH:</label>
            <input type="text" class="form-control" id="add-typeKH"></input>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="button" onclick="addKH()" class="btn btn-primary">Thêm</button>
      </div>
    </div>
  </div>
</div>

<!-- model edit  -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mã KH:</label>
            <input type="text" class="form-control" id="recipient-id" disabled>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Họ tên:</label>
            <input type="text" class="form-control" id="input-name"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Địa chỉ:</label>
            <input type="text" class="form-control" id="input-address"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">SDT:</label>
            <input type="text" class="form-control" id="input-phone"></input>
          </div>
          
          <div class="form-group">
            <label for="message-text" class="col-form-label">Ngày sinh:</label>
            <input type="date" class="form-control" id="input-birth"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Ngày ĐK:</label>
            <input type="date" class="form-control" id="input-DK"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Doanh số:</label>
            <input type="number" class="form-control" id="input-DS"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Loại KH:</label>
            <input type="text" class="form-control" id="input-typeKH"></input>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-primary" onclick="updateKH()"  >Cập nhật</button>
      </div>
    </div>
  </div>
</div>


<!-- model delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn xóa?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Khách hàng có mã:</label>
            <input type="text" id="input_makh" class="form-control" disabled>
          </div>
        </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-danger" onclick="deleteKH()">Xác nhận</button>
      </div>
    </div>
  </div>
</div>
 

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
 <script src="js/main.js"></script>

</body>
</html>