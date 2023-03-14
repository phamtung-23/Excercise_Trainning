
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Remove duplicate element</title>
</head>

<body>
  <div class="container">
    <h3 class="text-center text-success">Remove duplicate element of 2 array</h3>
    <!-- form nhận dữ liệu input -->
    <form method="POST">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nhập chuổi số 1:</label>
        <div class="col-sm-10">
          <input type="text" name="string1" class="form-control" id="inputEmail3" placeholder="ví dụ: 1,2,3,4,5">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nhập chuổi số 2:</label>
        <div class="col-sm-10">
          <input type="text" name="string2" class="form-control" id="inputEmail3" placeholder="ví dụ: 1,2,3,4,5">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submot" class="btn btn-success">Thực hiện</button>
        </div>
      </div>
    </form>
    <div class=" w-100 text-center ">
      <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if(isset($_POST["string2"])&&isset($_POST["string1"])){
            $string1 = ($_POST["string1"]);
            $string2 = ($_POST["string2"]);
            // in input
            echo "Input 1: ".$string1."</br>";
            echo "Input 2: ".$string2."</br>";
            $arr1  = explode(',', $string1);
            $arr2  = explode(',', $string2);
            // gọi hàm remove
            Remove($arr1,$arr2);
          }else{
            echo "Vui lòng nhập đầy đủ!";
          }
        }
        function Remove( $arr1, $arr2 ) {

         $different_element1 =  array_diff($arr1, $arr2);
         $different_element2 =  array_diff($arr2, $arr1);

         $result = array_merge($different_element1,$different_element2);
         print_r( $result);
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