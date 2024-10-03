<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'sholanke', 'shinnely_JR1', 'appoint_supe');

// Check connection
if (!$conn) {
  die('Connection error: ' . mysqli_connect_error());
}

// Initialize variables
$studName = "";
$formData = [];

// Get student ID from the URL
$student_id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : null;

if ($student_id) {
  // Fetch student details based on the ID
  $sql = "SELECT stud_name, matric_num, programme, college, degree, first_reg_date, recent_reg_date, senate_approval_date, thesis_title, supervisor_name,
          supervisor_rank, supervisor_institutional_affiliation, supervisor_department, supervisor_qualifications, supervisor_area_of_specialisation, 
          co_supervisor_name, co_supervisor_rank, co_supervisor_institutional_affiliation, co_supervisor_department, co_supervisor_area_of_specialisation, co_supervisor_qualifications, comment FROM recommendation_of_supervisors WHERE id = $student_id";
  
  $result = mysqli_query($conn, $sql);

  // If a student is found, store the details in $formData
  if ($result && mysqli_num_rows($result) > 0) {
    $formData = mysqli_fetch_assoc($result);
    $studName = $formData['stud_name'];
  } else {
    echo 'No student found with this ID.';
  }

  mysqli_free_result($result);
}

// Close the connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="./styles.css" />
    <style>
      .char-counter.warning {
        color: red;
      }
    </style>
  </head>
  <body class="preview-page">
    <img class="preview-logo" src="./img/CU_LOGO.jpg" alt="" />
    <div class="text-center">
      <p>Recommendation for appointment of supervisors</p>
      <p>(Masters Degree)</p>
    </div>

    <!-- Student Details Section -->
    <div class="formPreview">
      <p class="text-center title">Student Details</p>
      <div class="studDetails">
        <div class="studNamePreview">
          <p>Name of student</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['stud_name']); ?></p>
        </div>
        <div class="matricPreview">
          <p>Matriculation Number</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['matric_num']); ?></p>
        </div>
        <div class="programmePreview">
          <p>Programme</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['programme']); ?></p>
        </div>
        <div class="collegePreview">
          <p>College</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['college']); ?></p>
        </div>
        <div class="degreePreview">
          <p>Degree in View</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['degree']); ?></p>
        </div>
        <div class="firstRegPreview">
          <p>Date of First Registration</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['first_reg_date']); ?></p>
        </div>
        <div class="recentRegPreview">
          <p>Date of Most Recent Registration</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['recent_reg_date']); ?></p>
        </div>
        <div class="senateApprovalPreview">
          <p>Date of Senate Approval of Courework Result</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['senate_approval_date']); ?></p>
        </div>
        <div class="thesisPreview">
          <p>Proposed Title of Thesis</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['thesis_title']); ?></p>
        </div>
      </div>
    </div>

    <!-- Supervisor Details Section -->
    <div class="formPreview mt-5">
      <p class="text-center title">Supervisor(s) Details</p>
      <div class="supervisorDetails">
        <div class="supervisorNamePreview">
          <p>Name of Supervisor</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['supervisor_name']); ?></p>
        </div>
        <div class="supervisorRankPreview">
          <p>Rank</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['supervisor_rank']); ?></p>
        </div>
        <div class="supervisorAffiliationPreview">
          <p>Institutional Affiliation</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['supervisor_institutional_affiliation']); ?></p>
        </div>
        <div class="supervisorDepartmentPreview">
          <p>Department</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['supervisor_department']); ?></p>
        </div>
        <div class="supervisorSpecialiasationPreview">
          <p>Area of Specialisation</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['supervisor_area_of_specialisation']); ?></p>
        </div>
        <div class="supervisorQualificationPreview">
          <p>Qualifications</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['supervisor_qualifications']); ?></p>
        </div>
      </div>

      <!-- Co-supervisor details Section -->
      <div class="coSupervisorDetails mt-4">
        <div class="coSupeNamePreview">
          <p>Name of Co-supervisor</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['co_supervisor_name']); ?></p>
        </div>
        <div class="coSupeRankPreview">
          <p>Rank</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['co_supervisor_rank']); ?></p>
        </div>
        <div class="coSupeAffiliationPreview">
          <p>Institutional Affiliation</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['co_supervisor_institutional_affiliation']); ?></p>
        </div>
        <div class="coSupeDepartmentPreview">
          <p>Department</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['co_supervisor_department']); ?></p>
        </div>
        <div class="coSupeSpecialisationPreview">
          <p>Area of Specialisation</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['co_supervisor_area_of_specialisation']); ?></p>
        </div>
        <div class="coSupeQualificationPreview">
          <p>Qualifications</p>
          <p class="span">:</p>
          <p><?php echo htmlspecialchars($formData['co_supervisor_qualifications']); ?></p>
        </div>
      </div>
    </div>

    <!-- Comment Section -->
    <div class="commentPreview mt-5">
      <p class="text-center title">Comment by Coordinator Departmental PG Committee</p>
      <p class="text-center"><?php echo htmlspecialchars($formData['comment']); ?></p>
    </div>

    <!-- Comment -->
    <div class="comment-container">
      <label for="comments" class="commentTxt">Comment</label>
      <textarea
        class="commentSection"
        id="hodComment"
        name="hodComment"
        rows="4"
        cols="70"
        maxlength="200"
        oninput="updateCharCount()"
        placeholder="Leave your remark here...."
      ></textarea>
      <p class="char-counter" id="charCounter">200 characters remaining</p>
    </div>

    <script src="./form.js"></script>
  </body>
</html>