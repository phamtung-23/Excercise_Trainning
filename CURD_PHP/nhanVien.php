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
  <title>Nhan Vien</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
          <a class="nav-link" href="./index.php">KHACH HANG</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./nhanVien.php">NHAN VIEN</a>
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
    <h3 class="text-center text-success p-3">DANH SÁCH NHÂN VIÊN</h3>
    <div class="w-100 d-flex justify-content-end">
      <button class='btn btn-success m-2 btnAddNV' data-toggle="modal" data-target="#exampleModalAdd" ><i class="fas fa-user-plus pr-2"></i> Thêm mới</button>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Ma NV</th>
          <th scope="col">Họ tên</th>
          <th scope="col">SDT</th>
          <th scope="col">Ngày vào làm</th>
          <th scope="col" class="text-center">Công cụ</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "select * from NHANVIEN";
          $stm = $conn -> prepare($sql);
          // $stm -> bind_param("s", $otp);
          if (!$stm -> execute()) {
            echo "<script>
                    Swal.fire({
                      position:top,
                      icon: 'error',
                      title: 'Error system!',
                      showConfirmButton: false,
                      timer: 1500
                    })
                  </script>";
          }else{
            $result = $stm -> get_result();
            if ($result -> num_rows == 0) {
              echo "<script>
                    Swal.fire({
                      position:top,
                      icon: 'error',
                      title: 'Don't find to data!',
                      showConfirmButton: false,
                      timer: 1500
                    })
                  </script>";
            }else{
              while($row = $result->fetch_assoc()) {
                ?>
                  <tr>
                    <th scope="row"><?= $row['MANV']?></th>
                    <td><?= $row['HOTEN']?></td>
                    <td><?= $row['SODT']?></td>
                    <td><?= $row['NGVL']?></td>
                    <td class="d-flex justify-content-center">
                      <button class="btn btn-primary mr-3 btnEditNV" data-toggle="modal" data-target="#editModalNV" data-id=<?= $row['MANV']?>><i class="fas fa-edit pr-2"></i> sửa</button>
                      <button class="btn btn-danger btnDeleteNV" data-toggle="modal" data-target="#deleteModalNV" data-id=<?= $row['MANV']?>><i class="fas fa-trash-alt pr-2"></i> xóa</button>
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
            <label for="recipient-name" class="col-form-label">Mã Nhân viên:</label>
            <input type="text" class="form-control" disabled id="NV-id">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Họ tên:</label>
            <input type="text" class="form-control" id="NV-name"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">SDT:</label>
            <input type="text" class="form-control" id="NV-phone"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Ngày vào làm:</label>
            <input type="date" class="form-control" id="NV-ngvl"></input>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="button" onclick="addNV()" class="btn btn-primary">Thêm</button>
      </div>
    </div>
  </div>
</div>

<!-- model edit  -->
<div class="modal fade" id="editModalNV" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin nhân viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mã Nhân viên:</label>
            <input type="text" class="form-control" disabled id="editNV-id">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Họ tên:</label>
            <input type="text" class="form-control" id="editNV-name"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">SDT:</label>
            <input type="text" class="form-control" id="editNV-phone"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Ngày vào làm:</label>
            <input type="date" class="form-control" id="editNV-ngvl"></input>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="button" onclick="updateNV()" class="btn btn-primary">Cập nhật</button>
      </div>
    </div>
  </div>
</div>

<!-- model delete -->
<div class="modal fade" id="deleteModalNV" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <label for="recipient-name" class="col-form-label">Nhân viên có mã:</label>
            <input type="text" id="input_manv" class="form-control" disabled>
          </div>
        </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-danger" onclick="deleteID('NV')">Xác nhận</button>
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
  <script src="./js/main.js"></script>
</body>
</html>