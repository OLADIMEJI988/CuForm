<?php
session_start();

// Connect to database
$conn = mysqli_connect('localhost', 'sholanke', 'shinnely_JR1', 'appoint_supe');

// Check connection
if (!$conn) {
  die('Connection error: ' . mysqli_connect_error());
}

// Fetch the students from the database
$sql = "SELECT id, stud_name, matric_num FROM recommendation_of_supervisors WHERE comment IS NOT NULL";
$result = mysqli_query($conn, $sql);
$students = mysqli_fetch_all($result, MYSQLI_ASSOC);

$studentJs = json_encode($students);

$student_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Free result set and close the connection
mysqli_free_result($result);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PG Committee section</title>
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
    <p class="title">Pending Students</p>
    <div class="row mt-4">
      <p class="col-1">S/N</p>
      <p class="col-4">Student Name</p>
      <p class="col-3">Matric Number</p>
      <p class="col-3">Action</p>
    </div>

    <script>
      const studId = <?php echo $student_id ?>;
      const excludedStudents = JSON.parse(localStorage.getItem("excludedStudents"));

      let storedStudentList = JSON.parse(localStorage.getItem("modifiedStudentList"));
      const studentJs = <?php echo $studentJs ?>;
      let students;

      if(storedStudentList && storedStudentList.length > 0){
        students = storedStudentList;

        const poppedArray = JSON.parse(localStorage.getItem("attendedStudents")) || [];
        const serializeObject = (obj) => {
          const keys = Object.keys(obj).sort();
          return keys.map(key => `${key}:${obj[key]}`).join('|');
        };

        const serializedArray1 = new Set(poppedArray.map(serializeObject));
        console.log(serializedArray1);
        students = excludedStudents.filter(item => !serializedArray1.has(serializeObject(item)));
      } else {
        students = studentJs;
      }

      let attendedStudents = JSON.parse(localStorage.getItem("attendedStudents")) || [];

      if(studId > 0){   
        const modifiedStudentList = students.filter((item)=> {
          if(studId == item.id){
            attendedStudents.push(item);
            return false; 
          } else {
            return true;
          }
        });

        localStorage.setItem("attendedStudents", JSON.stringify(attendedStudents)); // Updating localStorage of attended students
        localStorage.setItem("modifiedStudentList", JSON.stringify(modifiedStudentList)); // Updating student list
        students = modifiedStudentList; // Updating students variable to reflect updated student list
      }

      const body = document.querySelector("body");   

      // Render attended students from the college PG committee section in the DOM
      if (studId == 0) {
        excludedStudents.map((student, index) => {
          const studentDiv = document.createElement("div");
          const numField = document.createElement("p");
          const actionLink = document.createElement("a");
          const action = document.createElement("button");
                
          actionLink.className = "col-3";
          actionLink.href =  `./collegeDeanEndorse.php?id=${student.id}`;
          action.className = "endorseBtn";
          action.textContent = "Click to endorse";
                
          numField.className = "col-1";
          studentDiv.className = "row mt-2 holder";
                
          const nameField = document.createElement("p");
          nameField.className = "stud-name-text col-4";
                
          const matricField = document.createElement("p");
          matricField.className = "stud-matric-text col-3";
                
          numField.textContent = ++index;
          nameField.textContent = student.stud_name;
          matricField.textContent = student.matric_num;

          actionLink.appendChild(action);
          studentDiv.appendChild(numField);
          studentDiv.appendChild(nameField);
          studentDiv.appendChild(matricField);
          studentDiv.appendChild(actionLink);
          body.append(studentDiv);
        });
      } else if (studId > 0) {
        students.map((student, index) => {
          const studentDiv = document.createElement("div");
          const numField = document.createElement("p");
          const actionLink = document.createElement("a");
          const action = document.createElement("button");
          
          actionLink.className = "col-3";
          actionLink.href =  `./collegeDeanEndorse.php?id=${student.id}`;
          action.className = "endorseBtn";
          action.textContent = "Click to endorse";
          
          numField.className = "col-1";
          studentDiv.className = "row mt-2 holder";
          
          const nameField = document.createElement("p");
          nameField.className = "stud-name-text col-4";
          
          const matricField = document.createElement("p");
          matricField.className = "stud-matric-text col-3";
          
          numField.textContent = ++index;
          nameField.textContent = student.stud_name;
          matricField.textContent = student.matric_num;

          actionLink.appendChild(action);
          studentDiv.appendChild(numField);
          studentDiv.appendChild(nameField);
          studentDiv.appendChild(matricField);
          studentDiv.appendChild(actionLink);
          body.append(studentDiv);
        });
      }

    </script>

    <script src="./form.js"></script>
  </body>
</html>