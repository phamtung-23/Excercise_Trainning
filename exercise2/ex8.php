
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Read file</title>
</head>

<body>
  <div class="container">
    <h3 class="text-center text-success">Read file</h3>
    <div class=" w-100 text-center ">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID code</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
            <th scope="col">Type</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $csv_file = fopen('data.csv', 'r');

            while (($row = fgetcsv($csv_file)) !== false) {
              ?>
                <tr>
              <?php
              foreach ($row as $i){
                ?>
                  <td><?=$i?></td>
                <?php
              }
              ?>
                </tr>
              <?php
            }

            fclose($csv_file);
          ?>
        </tbody>
      </table>
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