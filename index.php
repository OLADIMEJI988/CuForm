<?php 

// $studName = "David";
// $age = 30;
// define("NAME", "David");

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
  </head>
  <body>
    <p class="title text-center">
      Recommendation for appointment of supervisors
    </p>
    <div class="form border mx-auto">
      <img class="logo" src="./img/CU_LOGO.jpg" alt="" />
      <form>
        <div class="row">
          <!-- Name -->
          <div class="mb-3 col">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" />
          </div>
          <!-- Matric -->
          <div class="mb-3 col">
            <label for="exampleInputEmail1" class="form-label"
              >Matriculation</label
            >
            <input type="text" class="form-control" id="matric_num" />
          </div>
        </div>
        <!--  -->
        <div class="row">
          <!-- Programme -->
          <div class="mb-3 col">
            <label for="exampleInputEmail1" class="form-label"
              >Programme/Department</label
            >
            <input type="text" class="form-control" id="programme" />
          </div>
          <!-- College -->
          <div class="mb-3 col">
            <label for="exampleInputEmail1" class="form-label">College</label>
            <input type="text" class="form-control" id="college" />
          </div>
        </div>
        <!-- Degree in view -->
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label"
            >Degree in view</label
          >
          <input type="text" class="form-control" id="college" />
        </div>
        <!-- DATES -->
        <div class="row">
          <div class="mb-3 col">
            <label for="datePicker" class="form-label-date"
              >Date of First Registration</label
            >
            <input type="date" class="form-control hide-text" id="datePicker" />
          </div>
          <!--  -->
          <div class="mb-3 col">
            <label for="datePicker" class="form-label-date"
              >Date of Most Recent Registration</label
            >
            <input type="date" class="form-control" id="datePicker" />
          </div>
          <!--  -->
          <div class="mb-3 col">
            <label for="datePicker" class="form-label-date"
              >Date of Senate Approval of Coursework Result</label
            >
            <input type="date" class="form-control" id="datePicker" />
          </div>
        </div>
        <!-- Title of Thesis -->
        <div class="mb-3 col">
          <label for="thesis" class="form-label"
            >Proposed Title of Thesis</label
          >
          <input type="text" class="form-control" id="thesis" />
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
          </div>
          <!--  -->
          <div class="row">
            <!-- institutional affiliation -->
            <div class="mb-3 col">
              <label for="supervisorName" class="form-label"
                >Institutional Affiliation</label
              >
              <input type="text" class="form-control" id="supervisorName" />
            </div>
            <!-- department -->
            <div class="mb-3 col">
              <label for="rank" class="form-label">Department</label>
              <input type="text" class="form-control" id="rank" />
            </div>
          </div>
          <!--  -->
          <div class="row">
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
          </div>
          <!--  -->
          <div class="row">
            <!-- institutional affiliation -->
            <div class="mb-3 col">
              <label for="supervisorName" class="form-label"
                >Institutional Affiliation</label
              >
              <input type="text" class="form-control" id="supervisorName" />
            </div>
            <!-- department -->
            <div class="mb-3 col">
              <label for="rank" class="form-label">Department</label>
              <input type="text" class="form-control" id="rank" />
            </div>
          </div>
          <!--  -->
          <div class="row">
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
        <!-- comment -->
        <p class="comment">Comment</p>
        <textarea
          class="commentSection"
          id="comments"
          name="comments"
          rows="4"
          cols="50"
        ></textarea>

        <!-- submit button -->
        <div class="btnContainer">
          <button type="submit" class="btn">Submit</button>
        </div>
      </form>
    </div>

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
