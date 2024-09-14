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

// const datePicker = document.getElementById('datePicker');

// // Add event listener to detect change and display the date
// datePicker.addEventListener('change', function() {
//   if (datePicker.value) {
//     datePicker.classList.remove('hide-text');
//     datePicker.classList.add('show-text');
//   } else {
//     datePicker.classList.remove('show-text');
//     datePicker.classList.add('hide-text');
//   }
// });