
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Sort array</title>
</head>

<body>
  <div class="container">
    <h3 class="text-center text-success">Sort array</h3>
  <!-- form nhận dữ liệu input -->
    <!-- <form method="POST">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nhập chuổi số:</label>
        <div class="col-sm-10">
          <input type="text" name="number" class="form-control" id="inputEmail3" placeholder="ví dụ: 1,2,3,4,5,...">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submot" class="btn btn-success">Thực hiện</button>
        </div>
      </div>
    </form> -->
    <div class=" w-100 text-center ">
<!-- handle chuỗi đầu vào -->
      <?php

        $array = array(
          "a"=>31,
          "b"=>41,
          "c"=>39,
          "d"=>40
        );
        echo "Input array: ";
        print_r($array);
        echo "</br> ";
        asort($array);
        echo "Ascending according to the value: ";
        print_r($array);
        echo "</br> ";
        ksort($array);
        echo "Ascending according to the key: ";
        print_r($array);
        echo "</br> ";
        arsort($array);
        echo "Descending according to the value: ";
        print_r($array);
        echo "</br> ";
        krsort($array);
        echo "Descending according to the key: ";
        print_r($array);
      ?>
    </div>


    <script src="https://code.jquebry.com/jquery-3.2.1.slim.min.js"
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