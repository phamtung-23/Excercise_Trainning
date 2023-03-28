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
  <title>San Pham</title>
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
          <a class="nav-link" href="./nhanVien.php">NHAN VIEN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./hoaDon.php">HOA DON</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./sanPham.php">SAN PHAM</a>
        </li>
      </ul>
      <!-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> -->
    </div>
  </nav>
  <div class="container-fluid">
    <h3 class="text-center text-success p-3">DANH SACH SAN PHAM</h3>
    <div class="w-100 d-flex justify-content-end">
      <button class='btn btn-success m-2 btnAddSP' data-toggle="modal" data-target="#SPModalAdd" ><i class="fas fa-user-plus pr-2"></i> Thêm mới</button>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Ma SP</th>
          <th scope="col">Ten SP</th>
          <th scope="col">DVT</th>
          <th scope="col">Nuoc SX</th>
          <th scope="col">Gia</th>
          <th scope="col">Cong cu</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "select * from SANPHAM";
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
                    <th scope="row"><?= $row['MASP']?></th>
                    <td><?= $row['TENSP']?></td>
                    <td><?= $row['DVT']?></td>
                    <td><?= $row['NUOCSX']?></td>
                    <td><?= $row['GIA']?></td>
                    <td>
                      <button class="btn btn-primary btnEditSP" data-toggle="modal" data-target="#SPModalEdit" data-id=<?= $row['MASP']?> ><i class="fas fa-edit pr-2"></i>sửa</button>
                      <button class="btn btn-danger btnDeleteSP" data-toggle="modal" data-target="#SPModalDelete" data-id=<?= $row['MASP']?> ><i class="fas fa-trash-alt pr-2"></i>xóa</button>
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
<!-- modal add new sản phẩm -->
<div class="modal fade" id="SPModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm mới</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Ma SP: </label>
            <input type="text" class="form-control" id="SP-ID" disabled></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Tên SP:</label>
            <input type="text" class="form-control" id="SP-name"></input>
          </div>
          <div class="form-group">
            <label for="SP-DVT" class="col-form-label">Đơn vị tính:</label>
            <select class="form-control" name='DVT' id='SP-DVT'>
              <option value="cay">Cay</option>
              <option value="hop">Hop</option>
              <option value="cai">Cai</option>
              <option value="quyen">Quyen</option>
              <option value="chuc">Chuc</option>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Nước SX:</label>
            <input type="text" class="form-control" id="SP-nuocSX"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Giá: </label>
            <input type="text" class="form-control" id="SP-gia"></input>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="button" onclick="addSP()" class="btn btn-primary">Thêm</button>
      </div>
    </div>
  </div>
</div>

<!-- modal edit sản phẩm -->
<div class="modal fade" id="SPModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Ma SP: </label>
            <input type="text" class="form-control" id="editSP-ID" disabled></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Tên SP:</label>
            <input type="text" class="form-control" id="editSP-name"></input>
          </div>
          <div class="form-group">
            <label for="editSP-DVT" class="col-form-label">Đơn vị tính:</label>
            <select class="form-control" name='DVT' id='editSP-DVT'>
              <option value="cay">Cay</option>
              <option value="hop">Hop</option>
              <option value="cai">Cai</option>
              <option value="quyen">Quyen</option>
              <option value="chuc">Chuc</option>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Nước SX:</label>
            <input type="text" class="form-control" id="editSP-nuocSX"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Giá: </label>
            <input type="text" class="form-control" id="editSP-gia"></input>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="button" onclick="updateSP()" class="btn btn-primary">Cập nhật</button>
      </div>
    </div>
  </div>
</div>


<!-- model delete -->
<div class="modal fade" id="SPModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <label for="recipient-name" class="col-form-label">Sản phẩm có mã:</label>
            <input type="text" id="input_masp" class="form-control" disabled>
          </div>
        </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-danger" onclick="deleteID('SP')">Xác nhận</button>
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