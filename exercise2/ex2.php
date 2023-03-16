
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Calculate day</title>
</head>

<body>
  <div class="container">
    <h3 class="text-center">Calculate day</h3>
    <h4 class="text-center">(MM/DD/YYYY)</h4>
    <form method="POST">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Select a start date:</label>
        <div class="col-sm-10">
          <input type="date" name="date" class="form-control" id="inputEmail3" required>
        </div>
      </div>
      <div class="form-group row">
          <label  class="col-sm-2 col-form-label" for="inputGroupSelect01">Options</label>
          <div class="col-sm-10">
            <select class="custom-select" id="inputGroupSelect01" name="options" required>
              <option value="+">addition</option>
              <option value="-">subtraction</option>
            </select>
          </div>
      </div>
      <div class="form-group row">
        <label for="number" class="col-sm-2 col-form-label">Enter the numbers to calculate:</label>
        <div class="col-sm-10">
          <input type="number" name="number" placeholder="ex: 12" class="form-control" id="number" required>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-success">Calculate</button>
        </div>
      </div>
    </form>
    <div class=" w-100 text-center">
      <!-- handle calculate number of day -->
      <?php
        $date = '';
        $option = '';
        $number = 0;

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if(isset($_POST["date"]) && isset($_POST["options"]) && isset($_POST["number"])){
            
            if ($_POST["number"] < 0){
              echo "Please enter a positive number!";
            }else{
              $date = new DateTime($_POST["date"]);
              $option = ($_POST["options"]);
              $number = ($_POST["number"]);
              $next_day = date('d-m-y', strtotime($_POST["date"] . " $option$number day"));

              echo "Input: ".$date->format("d-m-yy").$option.$number."days"."</br>";
              echo "Ouput: ".$next_day;
            }
            // $result = date_diff( $dateEnd,$dateStart)->format('%d')+1;
            // // $result = $dateEnd->diff($dateStart);
            // echo $result." days";
            
          }else{
            echo "Error!!!!";
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