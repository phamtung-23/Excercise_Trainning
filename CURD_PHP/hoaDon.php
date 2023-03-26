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
  <title>Hoa Don</title>
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
          <a class="nav-link active" href="./hoaDon.php">HOA DON</a>
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
    <h3 class="text-center text-success p-3">DANH SACH HOA DON</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">So HD</th>
          <th scope="col">Ngay HD</th>
          <th scope="col">Ma KH</th>
          <th scope="col">Ma NV</th>
          <th scope="col">Trị gia</th>
          <th scope="col">Cong cu</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "select * from HOADON";
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
                    <th scope="row"><?= $row['SOHD']?></th>
                    <td><?= $row['NGHD']?></td>
                    <td><?= $row['MAKH']?></td>
                    <td><?= $row['MANV']?></td>
                    <td><?= $row['TRIGIA']?></td>
                    <td>
                      <button class="btn btn-primary">sửa</button>
                      <button class="btn btn-danger">xóa</button>
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


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
</body>
</html>