<?php
// connect to database
$conn = mysqli_connect('localhost', 'sholanke', 'shinnely_JR1', 'appoint_supe');

// check connection
if(!$conn){
  echo 'Connection error: ' . mysqli_connect_error();
}

// Handle AJAX request
if (isset($_POST['name'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    
    // Query for student information based on the given name
    $sql = "SELECT * FROM stud_info WHERE name = '$name' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $studInfo = mysqli_fetch_assoc($result);
        echo json_encode($studInfo);
    } else {
        echo json_encode(['error' => 'No student found with that name.']);
    }

    // Free result set and close connection for AJAX request
    mysqli_free_result($result);
    mysqli_close($conn);
    exit();
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
    <link rel="stylesheet" href="styles.css" />
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
    </style>
  </head>
  <body>
    <p class="title text-center">
      Recommendation for Appointment of Supervisors
    </p>
    <div class="form border mx-auto">
      <img class="logo" src="./img/CU_LOGO.jpg" alt="" />

      <form id="studentForm" action="index.php" method="POST">
        <div class="row">
          <!-- Name -->
          <div class="mb-3 col">
            <label for="name" class="form-label">Name</label>
            <input
              type="search"
              class="form-control"
              id="name"
              name="name"
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
            <label for="matric_num" class="form-label">Matriculation</label>
            <input
              type="text"
              class="form-control"
              id="matric_num"
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
        <div class="row">
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
          <input
            type="text"
            class="form-control"
            id="thesis"
            name="thesis"
            readonly
          />
        </div>

        <!--  -->
        <p class="recommendationTxt">Recommended Supervisors :</p>
        <!-- Supervisors -->
        <div>
          <div class="row">
            <!-- name of supervisor -->
            <div class="mb-3 col">
              <label for="supervisorName" class="form-label"
                >Name of Supervisor</label
              >
              <input type="text" class="form-control" id="supervisorName" />
            </div>
            <!-- rank -->
            <div class="mb-3 col">
              <label for="rank" class="form-label">Rank</label>
              <input type="text" class="form-control" id="rank" />
            </div>
            <!-- institutional affiliation -->
            <div class="mb-3 col">
              <label for="supervisorName" class="form-label"
                >Institutional Affiliation</label
              >
              <input type="text" class="form-control" id="supervisorName" />
            </div>
          </div>
          <!--  -->
          <div class="row">
            <!-- department -->
            <div class="mb-3 col">
              <label for="rank" class="form-label">Department</label>
              <input type="text" class="form-control" id="rank" />
            </div>
            <!-- qualifications -->
            <div class="mb-3 col">
              <label for="supervisorName" class="form-label"
                >Qualifications</label
              >
              <input type="text" class="form-control" id="supervisorName" />
            </div>
            <!-- area of specialisation -->
            <div class="mb-3 col">
              <label for="rank" class="form-label"
                >Area of Specialisation</label
              >
              <input type="text" class="form-control" id="rank" />
            </div>
          </div>
        </div>
        <!-- Co-supervisor -->
        <div>
          <div class="row">
            <!-- name of Co-Supervisor -->
            <div class="mb-3 col">
              <label for="coSupervisorName" class="form-label"
                >Name of Co-Supervisor</label
              >
              <input type="text" class="form-control" id="coSupervisorName" />
            </div>
            <!-- rank -->
            <div class="mb-3 col">
              <label for="rank" class="form-label">Rank</label>
              <input type="text" class="form-control" id="rank" />
            </div>
            <!-- institutional affiliation -->
            <div class="mb-3 col">
              <label for="supervisorName" class="form-label"
                >Institutional Affiliation</label
              >
              <input type="text" class="form-control" id="supervisorName" />
            </div>
          </div>
          <!--  -->
          <div class="row">
            <!-- department -->
            <div class="mb-3 col">
              <label for="rank" class="form-label">Department</label>
              <input type="text" class="form-control" id="rank" />
            </div>
            <!-- qualifications -->
            <div class="mb-3 col">
              <label for="supervisorName" class="form-label"
                >Qualifications</label
              >
              <input type="text" class="form-control" id="supervisorName" />
            </div>
            <!-- area of specialisation -->
            <div class="mb-3 col">
              <label for="rank" class="form-label"
                >Area of Specialisation</label
              >
              <input type="text" class="form-control" id="rank" />
            </div>
          </div>
        </div>

        <!-- Comment -->
        <p class="comment">Comment</p>
        <textarea
          class="commentSection"
          id="comments"
          name="comments"
          rows="4"
          cols="50"
          maxlength="20"
          oninput="updateCharCount()"
        ></textarea>
        <p class="char-counter" id="charCounter">20 characters remaining</p>

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
      document.getElementById("name").addEventListener("input", function () {
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
              clearFormFields();
            } else {
              populateFormFields(response);
              document.getElementById("error").textContent = "";
            }
          }
        };

        xhr.send("name=" + encodeURIComponent(name));
      });

      // Function to populate form fields with student data
      function populateFormFields(data) {
        document.getElementById("matric_num").value = data.matric_num || "";
        document.getElementById("programme").value = data.programme || "";
        document.getElementById("college").value = data.college || "";
        document.getElementById("degree").value = data.degree || "";
        document.getElementById("firstReg").value = data.first_reg_date || "";
        document.getElementById("recentReg").value = data.recent_reg_date || "";
        document.getElementById("approvalDate").value =
          data.senate_approval_date || "";
        document.getElementById("thesis").value = data.thesis || "";
      }

      // Function to clear form fields if no student is found
      function clearFormFields() {
        document.getElementById("matric_num").value = "";
        document.getElementById("programme").value = "";
        document.getElementById("college").value = "";
        document.getElementById("degree").value = "";
        document.getElementById("firstReg").value = "";
        document.getElementById("recentReg").value = "";
        document.getElementById("approvalDate").value = "";
        document.getElementById("thesis").value = "";
      }
    </script>

    <script src="./js/form.js"></script>
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
