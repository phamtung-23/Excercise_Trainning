
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>convert String number</title>
</head>

<body>
  <div class="container">
    <h3 class="text-center text-success">Convert String number to number</h3>
    <form method="POST">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nhập chuổi chữ số:</label>
        <div class="col-sm-10">
          <input type="text" name="number" class="form-control" id="inputEmail3" placeholder="ví dụ: one;two;four;five">
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
    <div class=" w-100 text-center ">


      <?php

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if(isset($_POST["number"])){
            $string = ($_POST["number"]);
            $arr  = explode(';', $string);
            convert($arr);
          }else{
            echo "Vui lòng không nhập số âm!";
          }
        }

        function convert($arrayString){
          $numbers = array("zero"=>0, "one"=>1, "two"=>2, "three"=>3, "four"=>4, "five"=>5, "six"=>6, "seven"=>7, "eight"=>8, "nine"=>9);
          foreach ($arrayString as $stringNumber){
            foreach($numbers as $key => $value){
              if(htmlspecialchars(stripslashes(trim($stringNumber))) ==  $key){
                echo "$value";
              }
            }
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