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
  document.getElementById("studName").addEventListener("input", function () {
    const name = this.value;
    if (name.trim() === "") return;
  
    // Send AJAX request to PHP backend
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "get_details.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
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
      xhr.open("POST", "get_details.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
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
      xhr.open("POST", "get_details.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
      xhr.onload = function () {
        if (this.status === 200) {
          const response = JSON.parse(this.responseText);
  
          //Check for error in response
          if (response.coSupervisorError) {
            document.getElementById("coSupervisorError").textContent =
              response.coSupervisorError;
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
    document.getElementById("approvalDate").value =
      data.senate_approval_date || "";
    document.getElementById("thesis").value = data.thesis || "";
  }
  
  // Function to populate supervisor form fields with supervisor data
  function populateSupervisorFormFields(data) {
    document.getElementById("supervisorRank").value = data.rank || "";
    document.getElementById("supervisorAffiliation").value =
      data.institutional_affiliation || "";
    document.getElementById("supervisorDepartment").value = data.department || "";
    document.getElementById("supervisorQualification").value =
      data.qualifications || "";
    document.getElementById("supervisorSpecialisation").value =
      data.area_of_specialisation || "";
  }
  
  // Function to populate co-supervisor form fields with co-supervisor data
  function populateCoSupervisorFormFields(data) {
    document.getElementById("coSupervisorRank").value = data.rank || "";
    document.getElementById("coSupervisorAffiliation").value =
      data.institutional_affiliation || "";
    document.getElementById("coSupervisorDepartment").value =
      data.department || "";
    document.getElementById("coSupervisorQualification").value =
      data.qualifications || "";
    document.getElementById("coSupervisorSpecialisation").value =
      data.area_of_specialisation || "";
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
  