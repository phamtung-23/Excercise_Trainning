
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Bảng cửu chương</title>
</head>

<body>
  <div class="container">
    <h3 class="text-center">Vẽ Tam Giác</h3>
    <form method="POST">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Số tầng:</label>
        <div class="col-sm-10">
          <input type="number" name="number" class="form-control" id="inputEmail3" placeholder="Nhập số tầng của tam giác...">
        </div>
      </div>
      <!-- <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
        </div>
      </div> -->
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submot" class="btn btn-success">Nhập</button>
        </div>
      </div>
    </form>
    <div class=" w-100 text-center">
      <?php
        $size = 0;
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if(isset($_POST["number"]) && $_POST["number"] >= 0){
            $size = $_POST["number"];
            for ($i = 0; $i < $size; $i++) {
                for ($j = 0; $j <= $i; $j++) {
                    echo "*";
                }
                echo "<br>";
            }
          }else{
            echo "Vui lòng không nhập số âm!";
          }
        }
      ?>
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
  </div>
</body>

</html>