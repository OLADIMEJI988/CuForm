<?php
// Connect to database
$conn = mysqli_connect('localhost', 'sholanke', 'shinnely_JR1', 'appoint_supe');

// Check connection
if (!$conn) {
  die('Connection error: ' . mysqli_connect_error());
}

// Handle AJAX request for student info
if (isset($_POST['studName']) && empty($_POST['supervisorName']) && empty($_POST['coSupervisorName'])) {
  $name = mysqli_real_escape_string($conn, $_POST['studName']);
    
  // Query for student information based on the given name
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
    
  // Query for supervisor information based on the given name
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
    
  // Query for co-supervisor information based on the given name
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

  // Prepare the SQL query to insert data into the recommendation_of_supervisors table
  $sqlInsert = "INSERT INTO recommendation_of_supervisors 
                (stud_name, matric_num, programme, college, degree, first_reg_date, recent_reg_date, senate_approval_date, thesis_title, supervisor_name, supervisor_rank, supervisor_institutional_affiliation, supervisor_department, supervisor_qualifications, supervisor_area_of_specialisation, co_supervisor_name, co_supervisor_rank, co_supervisor_institutional_affiliation, co_supervisor_department, co_supervisor_qualifications, co_supervisor_area_of_specialisation, comment)
                VALUES 
                ('$studName', '$studMatricNum', '$studProgramme', '$studCollege', '$studDegree', '$firstReg', '$recentReg', '$approvalDate', '$studThesis', '$supervisorName', '$supervisorRank', '$supervisorAffiliation', '$supervisorDepartment', '$supervisorQualification', '$supervisorSpecialisation', '$coSupervisorName', '$coSupervisorRank', '$coSupervisorAffiliation', '$coSupervisorDepartment', '$coSupervisorQualification', '$coSupervisorSpecialisation', '$comments')";

 $message = 'Submitted successfully!';

  // Execute the query and check for success
  if (mysqli_query($conn, $sqlInsert)) {
    // alert success message ($message)
  } else {
    echo 'Error: ' . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="node_modules/bootstrap/dist/css/bootstrap.css"
    />
    <link rel="stylesheet" href="./styles.css" />
    <style>
      .char-counter {
        font-size: 14px;
        color: #555;
      }
      .char-counter.warning {
        color: red;
      }
      .error {
        color: red;
      }
      .supervisorError {
        color: red;
        font-size: 13px;
        opacity: 0.8;
      }
      .coSupervisorError {
        color: red;
        font-size: 13px;
        opacity: 0.8;
      }
    </style>
  </head>
  <body>
    <!-- generate the alert success message -->
   <?php if (isset($message)): ?>
      <script>
        alert('<?php echo $message; ?>');
      </script>
    <?php endif; ?>
    <!-- alert ends -->

    <div class="title">
     <p>
       Recommendation for Appointment of Supervisors
     </p>
    </div>

    <div class="form border mx-auto">
      <img class="logo" src="./img/CU_LOGO.jpg" alt="" />

      <form id="dataForm" action="index.php" method="POST">
        <div class="row">
          <!-- Name -->
          <div class="mb-3 col">
            <label for="studName" class="form-label">Name</label>
            <input
              type="text"
              class="form-control"
              id="studName"
              name="studName"
              list="search-options"
            />
            <datalist id="search-options">
              <option value="Adebayo Okeke"></option>
              <option value="Ngozi Adichie"></option>
              <option value="Ibrahim Mohammed"></option>
              <option value="Sholanke Oladimeji"></option>
            </datalist>

            <p class="error" id="error"></p>
          </div>

          <!-- Matric -->
          <div class="mb-3 col">
            <label for="matricNum" class="form-label">Matriculation</label>
            <input
              type="text"
              class="form-control"
              id="matricNum"
              name="matricNum"
              readonly
            />
          </div>
        </div>

        <div class="row">
          <!-- Programme -->
          <div class="mb-3 col">
            <label for="programme" class="form-label"
              >Programme/Department</label
            >
            <input
              type="text"
              class="form-control"
              id="programme"
              name="programme"
              readonly
            />
          </div>

          <!-- College -->
          <div class="mb-3 col">
            <label for="college" class="form-label">College</label>
            <input
              type="text"
              class="form-control"
              id="college"
              name="college"
              readonly
            />
          </div>
        </div>

        <!-- Degree in view -->
        <div class="mb-3">
          <label for="degree" class="form-label">Degree in view</label>
          <input
            type="text"
            class="form-control"
            id="degree"
            name="degree"
            readonly
          />
        </div>

        <!-- DATES -->
        <div class="row dates-container">
          <div class="mb-3 col">
            <label for="firstReg" class="form-label-date"
              >Date of First Registration</label
            >
            <input
              type="date"
              class="form-control"
              id="firstReg"
              name="firstReg"
              readonly
            />
          </div>

          <div class="mb-3 col">
            <label for="recentReg" class="form-label-date"
              >Date of Most Recent Registration</label
            >
            <input
              type="date"
              class="form-control"
              id="recentReg"
              name="recentReg"
              readonly
            />
          </div>

          <div class="mb-3 col">
            <label for="approvalDate" class="form-label-date"
              >Date of Senate Approval</label
            >
            <input
              type="date"
              class="form-control"
              id="approvalDate"
              name="approvalDate"
              readonly
            />
          </div>
        </div>

        <!-- Thesis -->
        <div class="mb-3">
          <label for="thesis" class="form-label"
            >Proposed Title of Thesis</label
          >
          <input type="text" class="form-control" id="thesis" name="thesis" />
        </div>

        <!--  -->
        <p class="recommendationTxt">Recommended Supervisors :</p>
        <!-- Supervisors -->
        <div class="supe">
          <div class="row">
            <!-- name of supervisor -->
            <div class="mb-3 col">
              <label for="supervisorName" class="form-label"
                >Name of Supervisor</label
              >
              <input
                type="text"
                class="form-control"
                id="supervisorName"
                name="supervisorName"
                list="search-option"
              />

              <datalist id="search-option">
                <option value="Dr. Chinedu Okafor"></option>
                <option value="Prof. Funke Adeyemi"></option>
                <option value="Dr. Ibrahim Yusuf"></option>
                <option value="Dr. Ngozi Eze"></option>
                <option value="Sholanke Oladimeji"></option>
              </datalist>

              <p class="supervisorError" id="supervisorError"></p>
            </div>
            <!-- rank -->
            <div class="mb-3 col">
              <label for="supervisorRank" class="form-label">Rank</label>
              <input
                type="text"
                class="form-control"
                id="supervisorRank"
                name="supervisorRank"
                readonly
              />
            </div>
            <!-- institutional affiliation -->
            <div class="mb-3 col">
              <label for="supervisorAffiliation" class="form-label"
                >Institutional Affiliation</label
              >
              <input
                type="text"
                class="form-control"
                id="supervisorAffiliation"
                name="supervisorAffiliation"
                readonly
              />
            </div>
          </div>
          <!--  -->
          <div class="row">
            <!-- department -->
            <div class="mb-3 col">
              <label for="supervisorDepartment" class="form-label"
                >Department</label
              >
              <input
                type="text"
                class="form-control"
                id="supervisorDepartment"
                name="supervisorDepartment"
                readonly
              />
            </div>
            <!-- qualifications -->
            <div class="mb-3 col">
              <label for="supervisorQualification" class="form-label"
                >Qualifications</label
              >
              <input
                type="text"
                class="form-control"
                id="supervisorQualification"
                name="supervisorQualification"
                readonly
              />
            </div>
            <!-- area of specialisation -->
            <div class="mb-3 col">
              <label for="supervisorSpecialisation" class="form-label"
                >Area of Specialisation</label
              >
              <input
                type="text"
                class="form-control"
                id="supervisorSpecialisation"
                name="supervisorSpecialisation"
                readonly
              />
            </div>
          </div>
        </div>

        <!-- Co-supervisor -->
        <div class="coSupe">
          <div class="row">
            <!-- name of Co-Supervisor -->
            <div class="mb-3 col">
              <label for="coSupervisorName" class="form-label"
                >Name of Co-Supervisor</label
              >
              <input
                type="text"
                class="form-control"
                id="coSupervisorName"
                name="coSupervisorName"
                list="searchOption"
              />
              <datalist id="searchOption">
                <option value="Sholanke Oladimeji"></option>
                <option value="Dr. Ifeanyi Nwankwo"></option>
                <option value="Prof. Amina Bello"></option>
                <option value="Dr. John Adeyemi"></option>
                <option value="Dr. Funmi Akintunde"></option>
              </datalist>

              <p class="coSupervisorError" id="coSupervisorError"></p>
            </div>
            <!-- rank -->
            <div class="mb-3 col">
              <label for="coSupervisorRank" class="form-label">Rank</label>
              <input
                type="text"
                class="form-control"
                id="coSupervisorRank"
                name="coSupervisorRank"
                readonly
              />
            </div>
            <!-- institutional affiliation -->
            <div class="mb-3 col">
              <label for="coSupervisorAffiliation" class="form-label"
                >Institutional Affiliation</label
              >
              <input
                type="text"
                class="form-control"
                id="coSupervisorAffiliation"
                name="coSupervisorAffiliation"
                readonly
              />
            </div>
          </div>
          <!--  -->
          <div class="row">
            <!-- department -->
            <div class="mb-3 col">
              <label for="coSupervisorDepartment" class="form-label"
                >Department</label
              >
              <input
                type="text"
                class="form-control"
                id="coSupervisorDepartment"
                name="coSupervisorDepartment"
                readonly
              />
            </div>
            <!-- qualifications -->
            <div class="mb-3 col">
              <label for="coSupervisorQualification" class="form-label"
                >Qualifications</label
              >
              <input
                type="text"
                class="form-control"
                id="coSupervisorQualification"
                name="coSupervisorQualification"
                readonly
              />
            </div>
            <!-- area of specialisation -->
            <div class="mb-3 col">
              <label for="coSupervisorSpecialisation" class="form-label"
                >Area of Specialisation</label
              >
              <input
                type="text"
                class="form-control"
                id="coSupervisorSpecialisation"
                name="coSupervisorSpecialisation"
                readonly
              />
            </div>
          </div>
        </div>

        <!-- Comment -->
        <div class="comment-container">
          <label for="comments" class="commentTxt">Comment</label>
          <textarea
            class="commentSection"
            id="comments"
            name="comments"
            rows="4"
            cols="80"
            maxlength="20"
            oninput="updateCharCount()"
          ></textarea>
          <p class="char-counter" id="charCounter">20 characters remaining</p>
        </div>

        <!-- Submit button -->
        <div class="btnContainer">
          <button type="submit" class="btn">Submit</button>
        </div>
      </form>
    </div>

    <script>
      // Function to update the character counter
      function updateCharCount() {
        const textarea = document.getElementById("comments");
        const charCounter = document.getElementById("charCounter");
        const maxLength = textarea.maxLength;
        const currentLength = textarea.value.length;
        const remaining = maxLength - currentLength;

        charCounter.textContent = remaining + " characters remaining";
        charCounter.classList.toggle("warning", remaining < 8);
      }

      // AJAX function to fetch student details when the name is entered
      document
        .getElementById("studName")
        .addEventListener("input", function () {
          const name = this.value;
          if (name.trim() === "") return;

          // Send AJAX request to PHP backend
          const xhr = new XMLHttpRequest();
          xhr.open("POST", "index.php", true);
          xhr.setRequestHeader(
            "Content-type",
            "application/x-www-form-urlencoded"
          );

          xhr.onload = function () {
            if (this.status === 200) {
              const response = JSON.parse(this.responseText);

              // Check for error in response
              if (response.error) {
                document.getElementById("error").textContent = response.error;
                clearStudentFormFields();
              } else {
                populateStudentFormFields(response);
                document.getElementById("error").textContent = "";
              }
            }
          };

          xhr.send("studName=" + encodeURIComponent(name));
        });

      // AJAX function to fetch supervisor details when the name is entered
      document
        .getElementById("supervisorName")
        .addEventListener("input", function () {
          const name = this.value;
          if (name.trim() === "") return;

          // Send AJAX request to PHP backend
          const xhr = new XMLHttpRequest();
          xhr.open("POST", "index.php", true);
          xhr.setRequestHeader(
            "Content-type",
            "application/x-www-form-urlencoded"
          );

          xhr.onload = function () {
            if (this.status === 200) {
              const response = JSON.parse(this.responseText);

              //Check for error in response
              if (response.supervisorError) {
                document.getElementById("supervisorError").textContent =
                  response.supervisorError;
                clearSupervisorFormFields();
              } else {
                populateSupervisorFormFields(response);
                document.getElementById("supervisorError").textContent = "";
              }
            }
          };

          xhr.send("supervisorName=" + encodeURIComponent(name));
        });

      // AJAX function to fetch co-supervisor details when the name is entered
      document
        .getElementById("coSupervisorName")
        .addEventListener("input", function () {
          const name = this.value;
          if (name.trim() === "") return;

          // Send AJAX request to PHP backend
          const xhr = new XMLHttpRequest();
          xhr.open("POST", "index.php", true);
          xhr.setRequestHeader(
            "Content-type",
            "application/x-www-form-urlencoded"
          );

          xhr.onload = function () {
            if (this.status === 200) {
              const response = JSON.parse(this.responseText);

              //Check for error in response
              if (response.coSupervisorError) {
                document.getElementById("coSupervisorError").textContent = response.coSupervisorError;
                clearCoSupervisorFormFields();
              } else {
                populateCoSupervisorFormFields(response);
                document.getElementById("coSupervisorError").textContent = "";
              }
            }
          };

          xhr.send("coSupervisorName=" + encodeURIComponent(name));
        });

      // Function to populate student fields with student data
      function populateStudentFormFields(data) {
        document.getElementById("matricNum").value = data.matric_num || "";
        document.getElementById("programme").value = data.programme || "";
        document.getElementById("college").value = data.college || "";
        document.getElementById("degree").value = data.degree || "";
        document.getElementById("firstReg").value = data.first_reg_date || "";
        document.getElementById("recentReg").value = data.recent_reg_date || "";
        document.getElementById("approvalDate").value = data.senate_approval_date || "";
        document.getElementById("thesis").value = data.thesis || "";
      }

      // Function to populate supervisor form fields with supervisor data
      function populateSupervisorFormFields(data) {
        document.getElementById("supervisorRank").value = data.rank || "";
        document.getElementById("supervisorAffiliation").value = data.institutional_affiliation || "";
        document.getElementById("supervisorDepartment").value = data.department || "";
        document.getElementById("supervisorQualification").value = data.qualifications || "";
        document.getElementById("supervisorSpecialisation").value = data.area_of_specialisation || "";
      }

      // Function to populate co-supervisor form fields with co-supervisor data
      function populateCoSupervisorFormFields(data) {
        document.getElementById("coSupervisorRank").value = data.rank || "";
        document.getElementById("coSupervisorAffiliation").value = data.institutional_affiliation || "";
        document.getElementById("coSupervisorDepartment").value = data.department || "";
        document.getElementById("coSupervisorQualification").value = data.qualifications || "";
        document.getElementById("coSupervisorSpecialisation").value = data.area_of_specialisation || "";
      }

      // Function to clear student form fields if no student is found
      function clearStudentFormFields() {
        document.getElementById("matricNum").value = "";
        document.getElementById("programme").value = "";
        document.getElementById("college").value = "";
        document.getElementById("degree").value = "";
        document.getElementById("firstReg").value = "";
        document.getElementById("recentReg").value = "";
        document.getElementById("approvalDate").value = "";
        document.getElementById("thesis").value = "";
      }

      // Function to clear supervisor form fields if no supervisor is found
      function clearSupervisorFormFields(data) {
        document.getElementById("supervisorRank").value = "";
        document.getElementById("supervisorAffiliation").value = "";
        document.getElementById("supervisorDepartment").value = "";
        document.getElementById("supervisorQualification").value = "";
        document.getElementById("supervisorSpecialisation").value = "";
      }

      // Function to clear co-supervisor form fields if no co-supervisor is found
      function clearCoSupervisorFormFields(data) {
        document.getElementById("coSupervisorRank").value = "";
        document.getElementById("coSupervisorAffiliation").value = "";
        document.getElementById("coSupervisorDepartment").value = "";
        document.getElementById("coSupervisorQualification").value = "";
        document.getElementById("coSupervisorSpecialisation").value = "";
      }
    </script>

    <!--  -->
    <script src="./js/jquery-3.7.1.js"></script>
    <!--  -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <!--  -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
