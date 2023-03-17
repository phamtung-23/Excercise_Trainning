
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Find item in array</title>
</head>

<body>
  <div class="container">
    <h3 class="text-center text-success">Find item in array</h3>
    <form method="POST">
      <div class="form-group row">
        <label for="arrayInput" class="col-sm-2 col-form-label">Enter array:</label>
        <div class="col-sm-10">
          <input type="text" name="arrayInput" class="form-control" placeholder="ex: 23,34,56,78,34,....."  id="arrayInput">
        </div>
      </div>
      <div class="form-group row">
        <label for="numberFind" class="col-sm-2 col-form-label">Enter item to find in array:</label>
        <div class="col-sm-10">
          <input type="number" name="numberFind" class="form-control" placeholder="ex: 23"  id="numberFind">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-warning">Count</button>
        </div>
      </div>
    </form>
      <div class=" w-100 text-center ">
        <?php
          $stringInput = '';
          $find_item = 0;
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST["arrayInput"]) && isset($_POST["numberFind"])){
              $stringInput = ($_POST["arrayInput"]);
              $find_item = $_POST["numberFind"];

              echo "Input array: ".$stringInput."</br>";

              $arrInput = explode(',', $stringInput);
              
              echo "Number ".$find_item." appears: ".count_values($arrInput,$find_item)." times";
            }
          }  

          function count_values($array, $item_find){
            $count = 0;
            foreach($array as $item){
              if (strcmp($item, $item_find)==0){
                $count+=1;
              }
            }
            return $count;
          }
        ?>
      </div>
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
</body>
</html>