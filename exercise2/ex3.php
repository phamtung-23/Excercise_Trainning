
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Calculate</title>
</head>

<body>
  <div class="container">
    <h3 class="text-center">Calculate the number day of month</h3>
    <h4 class="text-center">(MM/DD/YYYY)</h4>
    <form method="POST">
      <div class="form-group row">
        <label for="year" class="col-sm-2 col-form-label">Enter year:</label>
        <div class="col-sm-10">
          <input type="number" name="year" class="form-control" placeholder="ex: 2023"  id="year">
        </div>
      </div>
      <div class="form-group row">
        <label for="month" class="col-sm-2 col-form-label">Enter month:</label>
        <div class="col-sm-10">
          <select class="custom-select" id="month" name="month" required>
            <?php
              for ($i = 1; $i<=12; $i++){
                echo "<option value='$i'>$i</option>";
              }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-success">Get</button>
        </div>
      </div>
    </form>
    <div class=" w-100 text-center">
      <!-- handle calculate number of day -->
      <?php
        $year = '';
        $month = '';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if(isset($_POST["month"]) && isset($_POST["year"])){
            $year = ($_POST["year"]);
            $month = ($_POST["month"]);
            
            if (strlen($year)==4){
              $result = date('t', strtotime("$year-$month-01"));
              echo $result." days";

            }else{
              echo "Please enter correct year!";
            }
          }else{
            echo 'Something wrong!';
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