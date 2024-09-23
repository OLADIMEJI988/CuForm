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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
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
    <div class="form border mx-auto">
      <img class="logo" src="./img/CU_LOGO.jpg" alt="" />

      <p class="text-center title">
        Recommendation for Appointment of Supervisors
      </p>

      <form id="dataForm" action="get_details.php" method="POST">
        <div class="row g-3">
          <!-- Name -->
          <div class="col-5">
            <label for="studName" class="form-label">Name</label>
            <!-- <input
              type="text"
              class="form-control"
              id="studName"
              name="studName"
              list="search-options"
              placeholder="Select student name"
            /> -->
            
             <div class="form-control">
               <select id="studName" style="width: 100%;">
                 <option value="">Select student</option>
                 <option value="1" class="dropdown-items">Adebayo Okeke</option>
                 <option value="2" class="dropdown-items">Ngozi Adichie</option>
                 <option value="3" class="dropdown-items">Ibrahim Mohammed</option>
                 <option value="4" class="dropdown-items">Sholanke Oladimeji</option>
               </select>
             </div>

            <p class="error" id="error"></p>
          </div>

          <!-- Matric -->
          <div class="col-3">
            <label for="matricNum" class="form-label">Matriculation</label>
            <input
              type="text"
              class="form-control"
              id="matricNum"
              name="matricNum"
              readonly
            />
          </div>
          <!-- Programme -->
          <div class="col-4">
            <label for="programme" class="form-label">Programme</label>
            <input
              type="text"
              class="form-control"
              id="programme"
              name="programme"
              readonly
            />
          </div>
        </div>

        <div class="row g-3">
          <!-- College -->
          <div class="col-6">
            <label for="college" class="form-label">College</label>
            <input
              type="text"
              class="form-control"
              id="college"
              name="college"
              readonly
            />
          </div>

          <!-- Degree in view -->
          <div class="col-6">
            <label for="degree" class="form-label">Degree in view</label>
            <input
              type="text"
              class="form-control"
              id="degree"
              name="degree"
              readonly
            />
          </div>
        </div>

        <!-- DATES -->
        <div class="row g-3 my-2">
          <div class="col">
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

          <div class="col">
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

          <div class="col">
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
        <div class="thesis my-4">
          <label for="thesis" class="form-label thesis_txt"
            >Proposed Title of Thesis :</label
          >
          <input
            type="text"
            class="form-control"
            id="thesis"
            name="thesis"
            placeholder="Input Title of Thesis"
          />
        </div>

        <!--  -->
        <p class="recommendationTxt mt-5">Recommended Supervisors</p>
        <!-- Supervisors -->
        <div>
          <div class="row g-3">
            <!-- name of supervisor -->
            <div class="col">
              <label for="supervisorName" class="form-label"
                >Name of Supervisor</label
              >
              <input
                type="text"
                class="form-control"
                id="supervisorName"
                name="supervisorName"
                list="search-option"
                placeholder="Select supervisor name"
              />

              <datalist id="search-option">
                <option value="Dr. Chinedu Okafor"></option>
                <option value="Prof. Funke Adeyemi"></option>
                <option value="Dr. Ibrahim Yusuf"></option>
                <option value="Dr. Ngozi Eze"></option>
                <option value="Sholanke Oladimeji"></option>
              </datalist>

              <!-- <div class="dropdown-box">
                <div class="supeSelected-item form-control">
                  <input
                    type="text"
                    placeholder="Select supervisor name"
                    id="supervisorName"
                    name="supervisorName"
                    readonly
                  />
                </div>

                <div class="dropdown-content">
                  <div class="search-input">
                    <input type="text" placeholder="Search" />
                  </div>
                  <ul id="dropdownList">
                    <li class="dropdown-item active">Select from below</li>
                    <li class="dropdown-item">Dr. Chinedu Okafor"</li>
                    <li class="dropdown-item">Prof. Funke Adeyemi</li>
                    <li class="dropdown-item">Dr. Ibrahim Yusuf</li>
                    <li class="dropdown-item">Dr. Ngozi Eze</li>
                    <li class="dropdown-item">Sholanke Oladimeji</li>
                  </ul>
                </div>
              </div> -->

              <p class="supervisorError" id="supervisorError"></p>
            </div>
            <!-- rank -->
            <div class="col-3">
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
            <div class="col">
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

          <div class="row g-3">
            <!-- department -->
            <div class="col">
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
            <!-- area of specialisation -->
            <div class="col">
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
          <!-- qualifications -->
          <div class="mb-3 col qual">
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
        </div>

        <!-- Co-supervisor -->
        <div class="coSupe">
          <div class="row g-3">
            <!-- name of Co-Supervisor -->
            <div class="col">
              <label for="coSupervisorName" class="form-label"
                >Name of Co-supervisor</label
              >
              <div class="dropdown-box">
                <div class="selected-item form-control">
                  <input
                    type="text"
                    placeholder="Select co-supervisor name"
                    id="coSupervisorName"
                    name="coSupervisorName"
                    readonly
                  />
                </div>

                <div class="dropdown-content">
                  <div class="search-input">
                    <input type="text" placeholder="Search" />
                  </div>
                  <ul id="dropdownList">
                    <li class="dropdown-item active">Sholanke Oladimeji</li>
                    <li class="dropdown-item">Dr. Ifeanyi Nwankwo</li>
                    <li class="dropdown-item">Prof. Amina Bello</li>
                    <li class="dropdown-item">Dr. John Adeyemi</li>
                    <li class="dropdown-item">Dr. Funmi Akintunde</li>
                  </ul>
                </div>
              </div>
              <p class="coSupervisorError" id="coSupervisorError"></p>
            </div>
            <!-- rank -->
            <div class="col-3">
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
            <div class="col">
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
          <div class="row g-3">
            <!-- department -->
            <div class="col">
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
            <!-- area of specialisation -->
            <div class="col">
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
          <!-- qualifications -->
          <div class="mb-3 col qual">
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
        </div>

        <!-- Comment -->
        <div class="comment-container">
          <label for="comments" class="commentTxt">Comment</label>
          <textarea
            class="commentSection"
            id="comments"
            name="comments"
            rows="4"
            cols="70"
            maxlength="20"
            oninput="updateCharCount()"
            placeholder="Leave your remark here...."
          ></textarea>
          <p class="char-counter" id="charCounter">20 characters remaining</p>
        </div>

        <!-- Submit button -->
        <div class="btnContainer">
          <button type="submit" class="btn">Submit</button>
        </div>
      </form>
    </div>

    <!-- JQUERY -->
    <!-- <script src="./js/jquery-3.7.1.js"></script> -->
    <!-- POPPER JS -->
    <!-- <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script> -->
    <!-- BOOTSTRAP JS -->
    <!-- <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
      $(document).ready(function(){
        $('#studName').select2({
          placeholder: "Select student name",
          allowClear: true
        });
      });
    </script>

    <script type="module" src="./form.js"></script>

  </body>
</html>
