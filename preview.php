<?php

include 'get_details.php'; 

// Check if the form data is set in the session
if (isset($_SESSION['form_data'])) {
  $formData = $_SESSION['form_data'];

  // Display just the student's name and matric using the provided HTML structure
  echo '<div class="studDetails">
        <div class="studNamePreview">
          <p>Name of student :</p>
          <p>' . htmlspecialchars($formData['studName']) . '</p>
        </div>
        <div class="matricPreview">
          <p>Matriculation Number :</p>
          <p>' . htmlspecialchars($formData['studMatricNum']) . '</p>
        </div>
        </div>';

  // Clear the session after displaying the data
  unset($_SESSION['form_data']);
} else {
  echo 'No form data found.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      rel="stylesheet"
      href="node_modules/bootstrap/dist/css/bootstrap.css"
    />
    <link rel="stylesheet" href="./styles.css" />
</head>
<body>
    
</body>
</html>
