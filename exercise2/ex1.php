
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Calculate number of day</title>
</head>

<body>
  <div class="container">
    <h3 class="text-center">Calculate number of day</h3>
    <h4 class="text-center">(MM/DD/YYYY)</h4>
    <form method="POST">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Form</label>
        <div class="col-sm-10">
          <input type="date" name="dateStart" class="form-control" id="inputEmail3">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">To</label>
        <div class="col-sm-10">
          <input type="date" name="dateEnd" class="form-control" id="inputEmail3">
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
        $dateStart = '';
        $dateEnd = '';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if(isset($_POST["dateStart"]) && isset($_POST["dateEnd"])){
            $dateStart = new DateTime($_POST["dateStart"]);
            $dateEnd = new DateTime($_POST["dateEnd"]);
            $result = date_diff( $dateEnd,$dateStart)->format('%d')+1;
            // $result = $dateEnd->diff($dateStart);
            echo $result." days";
          }else{
            echo 'error1';
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