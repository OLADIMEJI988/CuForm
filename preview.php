<?php

include 'get_details.php'; 

// Check if the form data is set in the session
if (isset($_SESSION['form_data'])) {
  $formData = $_SESSION['form_data'];

  echo '<img class="preview-logo" src="./img/CU_LOGO.jpg" alt="" />
       <div class="text-center">
         <p>Recommendation for appointment of supervisors preview</p>
         <p>(Masters Degree)</p>
       </div>
       <div class="formPreview">
          <p class="text-center title">Student Details</p>
          <div class="studDetails">
            <div class="studNamePreview">
              <p>Name of student</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['studName']) . '</p>
            </div>

            <div class="matricPreview">
              <p>Matriculation Number</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['studMatricNum']) . '</p>
            </div>

            <div class="programmePreview">
              <p>Programme</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['studProgramme']) . '</p>
            </div>

            <div class="collegePreview">
              <p>College</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['studCollege']) . '</p>
            </div>

            <div class="degreePreview">
              <p>Degree in View</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['studDegree']) . '</p>
            </div>

            <div class="firstRegPreview">
              <p>Date of First Registration</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['firstReg']) . '</p>
            </div>

            <div class="recentRegPreview">
              <p>Date of Most Recent Registration</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['recentReg']) . '</p>
            </div>

            <div class="senateApprovalPreview">
              <p>Date of Senate Approval of Courework Result</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['approvalDate']) . '</p>
            </div>

            <div class="thesisPreview">
              <p>Proposed Title of Thesis</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['studThesis']) . '</p>
            </div>
          </div>
       </div>
      
       <div class="formPreview mt-5">
          <p class="text-center title">Supervisor(s) Details</p>
          <div class="supervisorDetails">
            <div class="supervisorNamePreview">
              <p>Name of Supervisor</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['supervisorName']) . '</p>
            </div>

            <div class="supervisorRankPreview">
              <p>Rank</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['supervisorRank']) . '</p>
            </div>

            <div class="supervisorAffiliationPreview">
              <p>Institutional Affiliation</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['supervisorAffiliation']) . '</p>
            </div>

            <div class="supervisorDepartmentPreview">
              <p>Department</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['supervisorDepartment']) . '</p>
            </div>

            <div class="supervisorSpecialiasationPreview">
              <p>Area of Specialisation</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['supervisorSpecialisation']) . '</p>
            </div>

            <div class="supervisorQualificationPreview">
              <p>Qualifications</p>
              <p class="span">:</p>
              <p class="quali">' . htmlspecialchars($formData['supervisorQualification']) . '</p>
            </div>
          </div>

          <div class="coSupervisorDetails mt-4">
            <div class="coSupeNamePreview">
              <p>Name of Co-supervisor</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['coSupervisorName']) . '</p>
            </div>

            <div class="coSupeRankPreview">
              <p>Rank</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['coSupervisorRank']) . '</p>
            </div>

            <div class="coSupeAffiliationPreview">
              <p>Institutional Affiliation</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['coSupervisorAffiliation']) . '</p>
            </div>

            <div class="coSupeDepartmentPreview">
              <p>Department</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['coSupervisorDepartment']) . '</p>
            </div>

            <div class="coSupeSpecialisationPreview">
              <p>Area of Specialisation</p>
              <p class="span">:</p>
              <p>' . htmlspecialchars($formData['coSupervisorSpecialisation']) . '</p>
            </div>

            <div class="coSupeQualificationPreview">
              <p>Qualifications</p>
              <p class="span">:</p>
              <p class="quali">' . htmlspecialchars($formData['coSupervisorQualification']) . '</p>
            </div>
          </div>
       </div>
       
       <div class="commentPreview mt-5">
          <p class="text-center title">
            Coordinator Departmental PG Committee Comment
          </p>
          <p class="text-center">' . htmlspecialchars($formData['comments']) . '</p>
       </div>';

  // Clear the session after displaying the form data
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
<body class="preview-page">
    
</body>
</html>
