
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Average temperature</title>
</head>

<body>
  <div class="container">
    <h3 class="text-center">Average temperature</h3>
    <h4 class="text-center">(*c)</h4>
    <form method="POST">
      <div class="form-group row">
        <label for="temperature" class="col-sm-2 col-form-label">Enter temperature:</label>
        <div class="col-sm-10">
          <input type="text" name="temperature" class="form-control" placeholder="ex: 23,34,56,78,34,....."  id="temperature">
        </div>
      </div>
      
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-danger">Calculate</button>
        </div>
      </div>
    </form>
    <div class=" w-100 text-center">
      <!-- handle calculate number of day -->
      <?php
        $stringTemperature = '';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if(isset($_POST["temperature"])){
            $stringTemperature = ($_POST["temperature"]);
            echo "Input array: ".$stringTemperature."</br>";
            $arrTemperature = explode(',', $stringTemperature);

            if (count($arrTemperature)<5){
              echo "<div class='alert alert-danger'>Please enter more than 5 element!</div>";
            }else{
              // calculate average temperature
              $averageTemperature =array_sum($arrTemperature) / count($arrTemperature);
              echo "Average temperature: ".$averageTemperature."*C </br>";
              // sort array according to value ascending
              sort($arrTemperature);
              // get 5 elements lowest value
              $fiveValueLowest = array_slice($arrTemperature,0,5);
              echo "List five lowest value temperature: ".implode(", ", $fiveValueLowest)."</br>";
               // get 5 elements highest value
              $fiveValueLowest = array_slice($arrTemperature,count($arrTemperature)-5,count($arrTemperature)-1);
              echo "List five Highest value temperature: ".implode(", ", $fiveValueLowest);
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