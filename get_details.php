<?php
session_start();

// Connect to database
$conn = mysqli_connect('localhost', 'sholanke', 'shinnely_JR1', 'appoint_supe');

// Check connection
if (!$conn) {
  die('Connection error: ' . mysqli_connect_error());
}

// Handle AJAX request for student info
if (isset($_POST['studName']) && empty($_POST['supervisorName']) && empty($_POST['coSupervisorName'])) {
  $name = mysqli_real_escape_string($conn, $_POST['studName']);
    
  // Query for student info based on the selected name
  $sqlStudents = "SELECT * FROM stud_info WHERE name = '$name' LIMIT 1";
  $studentResult = mysqli_query($conn, $sqlStudents);

  if (mysqli_num_rows($studentResult) > 0) {
    $studInfo = mysqli_fetch_assoc($studentResult);
    echo json_encode($studInfo);
  } else {
    echo json_encode(['error' => 'No student found with that name.']);
  }

  // Free result set and close connection for AJAX request
  mysqli_free_result($studentResult);
  mysqli_close($conn);
  exit();
}

// Handle AJAX request for supervisor info
if (isset($_POST['supervisorName']) && empty($_POST['studName']) && empty($_POST['coSupervisorName'])) {
  $name = mysqli_real_escape_string($conn, $_POST['supervisorName']);
    
  // Query for supervisor info based on the selected name
  $sqlSupervisors = "SELECT * FROM supervisors_info WHERE name = '$name' LIMIT 1";
  $supervisorResult = mysqli_query($conn, $sqlSupervisors);

  if (mysqli_num_rows($supervisorResult) > 0) {
    $supervisorInfo = mysqli_fetch_assoc($supervisorResult);
    echo json_encode($supervisorInfo);
  } else {
    echo json_encode(['supervisorError' => 'No supervisor found with that name.']);
  }

  // Free result set and close connection for AJAX request
  mysqli_free_result($supervisorResult);
  mysqli_close($conn);
  exit();
}

// Handle AJAX request for co-supervisor info
if (isset($_POST['coSupervisorName']) && empty($_POST['studName']) && empty($_POST['supervisorName'])) {
  $name = mysqli_real_escape_string($conn, $_POST['coSupervisorName']);
    
  // Query for co-supervisor info based on the selected name
  $sqlCoSupervisors = "SELECT * FROM co_supervisors_info WHERE name = '$name' LIMIT 1";
  $coSupervisorResult = mysqli_query($conn, $sqlCoSupervisors);

  if (mysqli_num_rows($coSupervisorResult) > 0) {
    $coSupervisorInfo = mysqli_fetch_assoc($coSupervisorResult);
    echo json_encode($coSupervisorInfo);
  } else {
    echo json_encode(['coSupervisorError' => 'No co-supervisor found with that name.']);
  }

  // Free result set and close connection for AJAX request
  mysqli_free_result($coSupervisorResult);
  mysqli_close($conn);
  exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve and sanitize data from the form
  $studName = mysqli_real_escape_string($conn, $_POST['studName']);
  $studMatricNum = mysqli_real_escape_string($conn, $_POST['matricNum']);
  $studProgramme = mysqli_real_escape_string($conn, $_POST['programme']);
  $studCollege = mysqli_real_escape_string($conn, $_POST['college']);
  $studDegree = mysqli_real_escape_string($conn, $_POST['degree']);
  $firstReg = mysqli_real_escape_string($conn, $_POST['firstReg']);
  $recentReg = mysqli_real_escape_string($conn, $_POST['recentReg']);
  $approvalDate = mysqli_real_escape_string($conn, $_POST['approvalDate']);
  $studThesis = mysqli_real_escape_string($conn, $_POST['thesis']);
  $supervisorName = mysqli_real_escape_string($conn, $_POST['supervisorName']);
  $supervisorRank = mysqli_real_escape_string($conn, $_POST['supervisorRank']);
  $supervisorAffiliation = mysqli_real_escape_string($conn, $_POST['supervisorAffiliation']);
  $supervisorDepartment = mysqli_real_escape_string($conn, $_POST['supervisorDepartment']);
  $supervisorQualification = mysqli_real_escape_string($conn, $_POST['supervisorQualification']);
  $supervisorSpecialisation = mysqli_real_escape_string($conn, $_POST['supervisorSpecialisation']);
  $coSupervisorName = mysqli_real_escape_string($conn, $_POST['coSupervisorName']);
  $coSupervisorRank = mysqli_real_escape_string($conn, $_POST['coSupervisorRank']);
  $coSupervisorAffiliation = mysqli_real_escape_string($conn, $_POST['coSupervisorAffiliation']);
  $coSupervisorDepartment = mysqli_real_escape_string($conn, $_POST['coSupervisorDepartment']);
  $coSupervisorQualification = mysqli_real_escape_string($conn, $_POST['coSupervisorQualification']);
  $coSupervisorSpecialisation = mysqli_real_escape_string($conn, $_POST['coSupervisorSpecialisation']);
  $comments = mysqli_real_escape_string($conn, $_POST['comments']);
  
    // Store form data to be displayed in the preview page 
    $_SESSION['form_data'] = [
      'studName' => $studName,
      'studMatricNum' => $studMatricNum,
      'studProgramme' => $studProgramme,
      'studCollege' => $studCollege,
      'studDegree' => $studDegree,
      'firstReg' => $firstReg,
      'recentReg' => $recentReg,
      'approvalDate' => $approvalDate,
      'studThesis' => $studThesis,
      'supervisorName' => $supervisorName,
      'supervisorRank' => $supervisorRank,
      'supervisorAffiliation' => $supervisorAffiliation,
      'supervisorDepartment' => $supervisorDepartment,
      'supervisorQualification' => $supervisorQualification,
      'supervisorSpecialisation' => $supervisorSpecialisation,
      'coSupervisorName' => $coSupervisorName,
      'coSupervisorRank' => $coSupervisorRank,
      'coSupervisorAffiliation' => $coSupervisorAffiliation,
      'coSupervisorDepartment' => $coSupervisorDepartment,
      'coSupervisorQualification' => $coSupervisorQualification,
      'coSupervisorSpecialisation' => $coSupervisorSpecialisation,
      'comments' => $comments
    ];

  // Prepare the SQL query to insert data into the recommendation_of_supervisors table
  $sqlInsert = "INSERT INTO recommendation_of_supervisors 
                (stud_name, matric_num, programme, college, degree, first_reg_date, recent_reg_date, senate_approval_date, thesis_title, supervisor_name, supervisor_rank, supervisor_institutional_affiliation, supervisor_department, supervisor_qualifications, supervisor_area_of_specialisation, co_supervisor_name, co_supervisor_rank, co_supervisor_institutional_affiliation, co_supervisor_department, co_supervisor_qualifications, co_supervisor_area_of_specialisation, comment)
                VALUES 
                ('$studName', '$studMatricNum', '$studProgramme', '$studCollege', '$studDegree', '$firstReg', '$recentReg', '$approvalDate', '$studThesis', '$supervisorName', '$supervisorRank', '$supervisorAffiliation', '$supervisorDepartment', '$supervisorQualification', '$supervisorSpecialisation', '$coSupervisorName', '$coSupervisorRank', '$coSupervisorAffiliation', '$coSupervisorDepartment', '$coSupervisorQualification', '$coSupervisorSpecialisation', '$comments')";


// Execute the query and check for success
  if (mysqli_query($conn, $sqlInsert)) {
    // If successful, show success message and then redirect
    echo "<script>
            alert('Form submitted successfully!');
            window.location.href = 'preview.php';
          </script>";
    exit();
  } else {
    echo 'Error: ' . mysqli_error($conn);
    // If not successful, show error message and then redirect
    echo "<script>
            alert('There was an error submitting the form. Please try again.');
            window.location.href = 'index.php';
          </script>";
    exit();
  }

 // Close the database connection
  mysqli_close($conn);
}
?>
