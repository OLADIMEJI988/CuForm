<?php
// Connect to database
$conn = mysqli_connect('localhost', 'sholanke', 'shinnely_JR1', 'appoint_supe');

// Check connection
if (!$conn) {
  die('Connection error: ' . mysqli_connect_error());
}

$sql = "SELECT id, stud_name, matric_num FROM recommendation_of_supervisors";
$result = mysqli_query($conn, $sql);
$students = mysqli_fetch_all($result, MYSQLI_ASSOC);
$count = 0;

mysqli_free_result($result);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HOD SECTION</title>
    <link
      rel="stylesheet"
      href="node_modules/bootstrap/dist/css/bootstrap.css"
    />
    <link rel="stylesheet" href="./styles.css" />
  </head>
  <body class="preview-page">
    <img class="preview-logo" src="./img/CU_LOGO.jpg" alt="" />
    <div class="text-center">
      <p>Recommendation for appointment of supervisors</p>
      <p>(Masters Degree)</p>
      <!-- <p class="title welcomeMsg">Welcome HOD</p> -->
    </div>
    <p class="title">Pending Students</p>
    <div class="row mt-4">
      <p class="col-1">S/N</p>
      <p class="col-4">Name</p>
      <p class="col-3">Matric Number</p>
      <p class="col-3">Action</p>
    </div>
      <?php foreach($students as $student){ ?>
        <?php $count++ ?>
       <?php echo ' <div class="row mt-2 holder">
                      <p class="col-1">'.$count.'</p>
                      <p class="stud-name-text col-4">'.$student['stud_name'].'</p>
                      <p class="stud-matric-text col-3">'.$student['matric_num'].'</p>
                      <a href="./endorse.php?id='.$student['id'].'" class="col-3"><button class="endorseBtn">Click here to Endorse</button></a>
                    </div>' ?>
        <?php } ?>
  </body>
</html>
