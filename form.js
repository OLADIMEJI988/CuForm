$(document).ready(function () {
  $("#studName").select2({
    placeholder: "Select student name",
    allowClear: true,
  });

  $("#studName").on("select2:open", function () {
    $(".select2-search__field").attr("placeholder", "Search for a student");
  });
});

$(document).ready(function () {
  $("#supervisorName").select2({
    placeholder: "Select supervisor name",
    allowClear: true,
  });

  $("#supervisorName").on("select2:open", function () {
    $(".select2-search__field").attr("placeholder", "Search for a supervisor");
  });
});

$(document).ready(function () {
  $("#coSupervisorName").select2({
    placeholder: "Select co-supervisor name",
    allowClear: true,
  });

  $("#coSupervisorName").on("select2:open", function () {
    $(".select2-search__field").attr(
      "placeholder",
      "Search for a co-supervisor"
    );
  });
});

// Fetch and display student details when a name is selected
document.addEventListener("DOMContentLoaded", function () {
  // Initialize Select2 on the select element
  $("#studName").select2();

  // Add 'change' event listener to the select2 element
  $("#studName").on("change", function () {
    const selectedOption = $(this).find(":selected");
    const selectedName = selectedOption.text();
    const selectedValue = selectedOption.val();

    // If no student is selected, do nothing
    if (!selectedValue) {
      clearStudentFormFields();
      return;
    }

    // Send AJAX request to the PHP backend
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "get_details.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
      if (this.status === 200) {
        const response = JSON.parse(this.responseText);

        // Check for error in the response
        if (response.error) {
          document.getElementById("error").textContent = response.error;
          clearStudentFormFields();
        } else {
          populateStudentFormFields(response);
          document.getElementById("error").textContent = "";
        }
      }
    };

    // Send the selected student name to the server
    xhr.send("studName=" + encodeURIComponent(selectedName));
  });
});

// Fetch and display supervisor details when a name is selected
document.addEventListener("DOMContentLoaded", function () {
  // Initialize Select2 on the select element
  $("#supervisorName").select2();

  // Add 'change' event listener to the select2 element
  $("#supervisorName").on("change", function () {
    const selectedOption = $(this).find(":selected");
    const selectedName = selectedOption.text();
    const selectedValue = selectedOption.val();

    // If no supervisor is selected, do nothing
    if (!selectedValue) {
      clearSupervisorFormFields();
      return;
    }

    // Send AJAX request to the PHP backend
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "get_details.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
      if (this.status === 200) {
        const response = JSON.parse(this.responseText);

        // Check for error in the response
        if (response.supervisorError) {
          document.getElementById("supervisorError").textContent =
            response.supervisorError;
          clearSupervisorFormFields();
        } else {
          populateSupervisorFormFields(response); // Populate fields with data from server
          document.getElementById("supervisorError").textContent = "";
        }
      }
    };

    // Send the supervisor name to the server
    xhr.send("supervisorName=" + encodeURIComponent(selectedName));
  });
});

// Fetch and display co-supervisor details when a name is selected
document.addEventListener("DOMContentLoaded", function () {
  $("#coSupervisorName").select2();

  $("#coSupervisorName").on("change", function () {
    const selectedOption = $(this).find(":selected");
    const selectedName = selectedOption.text();
    const selectedValue = selectedOption.val();

    // If no co-supervisor is selected, clear fields
    if (!selectedValue) {
      clearCoSupervisorFormFields();
      return;
    }

    // Send AJAX request to the PHP backend
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "get_details.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
      if (this.status === 200) {
        const response = JSON.parse(this.responseText);

        // Check for error in the response
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

    // Send the co-supervisor name to the server
    xhr.send("coSupervisorName=" + encodeURIComponent(selectedName));
  });
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

// Function to populate supervisor fields with supervisor data
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

// Function to populate co-supervisor fields with co-supervisor data
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

// Function to clear student fields if no student is found / selected
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

// Function to clear supervisor fields if no supervisor is found / selected
function clearSupervisorFormFields(data) {
  document.getElementById("supervisorRank").value = "";
  document.getElementById("supervisorAffiliation").value = "";
  document.getElementById("supervisorDepartment").value = "";
  document.getElementById("supervisorQualification").value = "";
  document.getElementById("supervisorSpecialisation").value = "";
}

// Function to clear co-supervisor fields if no co-supervisor is found / selected
function clearCoSupervisorFormFields(data) {
  document.getElementById("coSupervisorRank").value = "";
  document.getElementById("coSupervisorAffiliation").value = "";
  document.getElementById("coSupervisorDepartment").value = "";
  document.getElementById("coSupervisorQualification").value = "";
  document.getElementById("coSupervisorSpecialisation").value = "";
}

// Functions to update the maximum character count
function updateMaxCount() {
  const textarea = document.getElementById("comments");
  const charCounter = document.getElementById("charCounter");
  const maxLength = textarea.maxLength;
  const currentLength = textarea.value.length;
  const remaining = maxLength - currentLength;

  charCounter.textContent = remaining + " characters remaining";
  charCounter.classList.toggle("warning", remaining < 50);
}

function updateCharCount() {
  const textarea = document.getElementById("hodComment");
  const charCounter = document.getElementById("charCounter");
  const maxLength = textarea.maxLength;
  const currentLength = textarea.value.length;
  const remaining = maxLength - currentLength;

  charCounter.textContent = remaining + " characters remaining";
  charCounter.classList.toggle("warning", remaining < 50);
}