<?php include('menu.php');?>

<div class="content-page">

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid content-inner px-2">
            <!-- end row -->
            <div class="card mb-3 dashboard-content dashboard-content-card h-100-ie">
                <div class="row">
                    <div class="col-md-10 mx-auto quest_form_outer">
                    <form action="<?php echo base_url('Dashboard/update_restaurant_onboarding/' . $onboarding['company_onboarding_id']); ?>" class="question_form" method="post">
                <div class="row">
                    <div class="col-md-12 position-relative">
                        <h1>Onboarding Questionnaire</h1>
                        <h4 id="progress-counter" class="">Step 1 / 3</h4>
                        <hr>
                    </div>
                </div>
                <!-- Step 1: Basic Information -->
                <div class="step w-100" id="step-1">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name <span class="text-danger">*</span></label>
                                <input type="text" name="quest_fname" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name <span class="text-danger">*</span></label>
                                <input type="text" name="quest_lname" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="text" name="quest_email" class="form-control"
                                    placeholder="example@example.com" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number <span class="text-danger">*</span></label>
                                <input type="text" name="quest_phone" class="form-control" placeholder="(000) 000-0000"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <label>
                                    Preferred Contact Method <span class="text-danger">*</span>
                                </label>
                                <div class="radio-group mb-0">
                                    <label class="radio-label">
                                        <input type="radio" name="contactMethod" value="phone" class="radio-input"
                                            required>
                                        <span class="custom-radio"></span> Phone
                                    </label>
                                    <label class="radio-label">
                                        <input type="radio" name="contactMethod" value="email" class="radio-input"
                                            required>
                                        <span class="custom-radio"></span> Email
                                    </label>
                                    <label class="radio-label">
                                        <input type="radio" name="contactMethod" value="text" class="radio-input"
                                            required>
                                        <span class="custom-radio"></span> Text
                                    </label>
                                    <label class="radio-label">
                                        <input type="radio" name="contactMethod" value="other" class="radio-input"
                                            required>
                                        <span class="custom-radio"></span> Other
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" id="otherContactDiv" style="display: none;">
                            <div class="form-group">
                                <label>If Other, Please Specify</label>
                                <input type="text" name="other_contact_method" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-primary next-step">Next <i class="fa fa-chevron-right"  ></i></button>
                        </div>
                    </div>
                </div>
                <!-- Step 2: Restaurant Details -->
                <div class="step w-100" id="step-2" style="display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>What is the name of the company?</label>
                                <input type="text" class="form-control" name="company_name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>How many restaurants does it represent?</label>
                                <input type="number" class="form-control" id="restaurant_count" min="1" required>
                            </div>
                        </div>


                        <div id="restaurant_details" class="row mx-0"></div>

                        <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-secondary prev-step"><i class="fa fa-angle-double-left"></i> Back</button>
                            <button type="button" class="btn btn-primary next-step" id="nextStep2"
                                style="display: none;">Next <i class="fa fa-chevron-right" ></i></button>
                        </div>
                    </div>
                </div>
                <!--  -->
                <!-- Step 3: Forecast Details -->
                <div class="step" id="step-3" style="display: none;">
                    <div class="row">
                        <div class="col-md-12 form-group mb-0">
                            <label>Is Toast your Point of Sale?</label>
                            <div class="radio-group mb-0">
                                <label class="radio-label">
                                    <input type="radio" name="isToast" value="yes" class="radio-input" onclick="toggleFields()">
                                    <span class="custom-radio"></span> Yes
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="isToast" value="no" class="radio-input" onclick="toggleFields()">
                                    <span class="custom-radio"></span> No
                                </label>
                            </div>
                        </div>
        
                        <!-- If Toast is "Yes" -->
                        <div id="toastDetails" class="hidden col-md-12">
                            <div class="form-group">
                                <label title="Toast Home > Reports > Settings > Data Exports > Enabled">Have you turned on the SSH Data Exports in Toast? <span
                                        class="text-danger">*</span> <i class="fa fa-info-circle"></i></label>
                                <div class="radio-group">
                                    <label class="radio-label">
                                        <input type="radio" name="sshDataExport" value="yes" class="radio-input">
                                        <span class="custom-radio"></span> Yes
                                    </label>
                                    <label class="radio-label">
                                        <input type="radio" name="sshDataExport" value="no" class="radio-input">
                                        <span class="custom-radio"></span> No
                                    </label>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label>Would you like us to help you turn those on?</label>
                                <div class="radio-group">
                                    <label class="radio-label">
                                        <input type="radio" name="helpTurnOn" value="yes" class="radio-input">
                                        <span class="custom-radio"></span> Yes
                                    </label>
                                    <label class="radio-label">
                                        <input type="radio" name="helpTurnOn" value="no" class="radio-input">
                                        <span class="custom-radio"></span> No
                                    </label>
                                    <label class="radio-label">
                                        <input type="radio" name="helpTurnOn" value="na" class="radio-input">
                                        <span class="custom-radio"></span> N/A
                                    </label>
                                </div>
                            </div>
                        </div>
        
                        <!-- If Toast is "No" -->
                        <div id="noToastDetails" class="hidden col-md-12 mb-3">
                            <label>If no, which platform do you use?</label>
                            <input type="text" name="other_platform"  class="form-control">
                        </div>

                        <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-secondary prev-step"><i class="fa fa-angle-double-left"></i> Back</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-sync" ></i> Update</button>
                            <a href="<?php echo base_url()?>Dashboard/restaurant_onboarding" class="btn btn-danger">
                                <i class="fa fa-close"></i> Cancel 
                            </a>
                        </div>
                    </div>
                </div>
                <!-- / -->

            </form>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- end row -->


        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->

</div>
<script>
    document.querySelectorAll('input[name="contactMethod"]').forEach((radio) => {
        radio.addEventListener("change", function () {
            let otherDiv = document.getElementById("otherContactDiv");
            if (this.value === "other") {
                otherDiv.style.display = "block"; // Show input field
            } else {
                otherDiv.style.display = "none"; // Hide input field
            }
        });
    });
</script>
<!-- JavaScript for Form Handling -->
<script>
    let currentStep = 1;
const totalSteps = 3;

// Step descriptions for progress counter
const stepDescriptions = {
    1: "Basic Details",
    2: "Restaurant Information",
    3: "Toast Information"
};

// Function to update progress counter with step description
function updateProgress() {
    let stepText = stepDescriptions[currentStep] || "";
    document.getElementById('progress-counter').innerText = `Step ${currentStep} / ${totalSteps}: ${stepText}`;
}

// Next Step Functionality
document.querySelectorAll('.next-step').forEach(button => {
    button.addEventListener('click', () => {
        document.getElementById(`step-${currentStep}`).style.display = 'none';
        currentStep++;
        document.getElementById(`step-${currentStep}`).style.display = 'block';
        updateProgress();
    });
});

// Previous Step Functionality
document.querySelectorAll('.prev-step').forEach(button => {
    button.addEventListener('click', () => {
        document.getElementById(`step-${currentStep}`).style.display = 'none';
        currentStep--;
        document.getElementById(`step-${currentStep}`).style.display = 'block';
        updateProgress();
    });
});

// Show/Hide "Add Details" Button based on Input Value
document.getElementById('restaurant_count').addEventListener('input', function () {
    let count = parseInt(this.value);
    let addDetailsBtn = document.getElementById('addDetailsBtn');
    addDetailsBtn.style.display = count > 0 ? 'inline-block' : 'none';
});

// Initialize progress on page load
updateProgress();



    document.getElementById('restaurant_count').addEventListener('input', function() {
        generateRestaurantFields();
    });

       function generateRestaurantFields() {
        let count = parseInt(document.getElementById('restaurant_count').value);
        let container = document.getElementById('restaurant_details');
        container.innerHTML = ''; // Clear previous fields

        if (isNaN(count) || count < 1) return; // Prevent invalid input

        for (let i = 1; i <= count; i++) {
            let html = `
            <div class="col-md-12">
   <h5><b>Add Restaurant ${i} Details</b></h5>
</div>
<div class="col-md-6">
   <div class="form-group">
      <label>Restaurant Name</label>
      <input type="text" class="form-control" name="restaurant_name_${i}" required>
   </div>
</div>
<div class="col-md-6">
   <div class="form-group">
      <label>Location</label>
      <input type="text" class="form-control" name="restaurant_location_${i}" required>
   </div>
</div>
<div class="col-md-12">
   <div class="form-group">
      <label>
         <h3>Revenue Targets</h3>
      </label>
   </div>
</div>
<div class="col-md-6 mb-3">
   <label>January Target (current year)</label>
   <input type="text" name="revenue_jan_target" class="form-control" placeholder="e.g., 23">
</div>
<div class="col-md-6 mb-3">
   <label>February Target (current year)</label>
   <input type="text" name="revenue_feb_target" class="form-control" placeholder="e.g., 23">
</div>
<div class="col-md-6 mb-3">
   <label>March Target (current year)</label>
   <input type="text" name="revenue_march_target" class="form-control" placeholder="e.g., 23">
</div>
<div class="col-md-6 mb-3">
   <label>April Target (current year)</label>
   <input type="text" name="revenue_apr_target" class="form-control" placeholder="e.g., 23">
</div>
<div class="col-md-6 mb-3">
   <label>May Target (current year)</label>
   <input type="text" name="revenue_may_target" class="form-control" placeholder="e.g., 23">
</div>
<div class="col-md-6 mb-3">
   <label>June Target (current year)</label>
   <input type="text" name="revenue_jun_target" class="form-control" placeholder="e.g., 23">
</div>
<div class="col-md-6 mb-3">
   <label>July Target (current year)</label>
   <input type="text" name="revenue_july_target" class="form-control" placeholder="e.g., 23">
</div>
<div class="col-md-6 mb-3">
   <label>August Target (current year)</label>
   <input type="text" name="revenue_aug_target" class="form-control" placeholder="e.g., 23">
</div>
<div class="col-md-6 mb-3">
   <label>September Target (current year)</label>
   <input type="text" name="revenue_sep_target" class="form-control" placeholder="e.g., 23">
</div>
<div class="col-md-6 mb-3">
   <label>October Target (current year)</label>
   <input type="text" name="revenue_oct_target" class="form-control" placeholder="e.g., 23">
</div>
<div class="col-md-6 mb-3">
   <label>November Target (current year)</label>
   <input type="text" name="revenue_nov_target" class="form-control" placeholder="e.g., 23">
</div>
<div class="col-md-6 mb-3">
   <label>December Target (current year)</label>
   <input type="text" name="revenue_dec_target" class="form-control" placeholder="e.g., 23">
</div>
<div class="col-md-12">
   <h3>Labor Target</h3>
</div>
<!-- Labor Target Section -->
<div class="col-md-12 mt-3">
   <label title="If you don't, an industry standard will be used but may not be accurate for your restaurant. This can be adjusted later.">
   Do you have labor percentage targets (% of Revenue)? <i class="fa fa-info-circle"></i>
   </label>
   <div class="radio-group">
      <label class="radio-label">
      <input type="radio" name="laborTarget_${i}" value="yes" class="radio-input" 
         onclick="toggleLaborDetails(${i})">
      <span class="custom-radio"></span> Yes
      </label>
      <label class="radio-label">
      <input type="radio" name="laborTarget_${i}" value="no" class="radio-input"
         onclick="toggleLaborDetails(${i})">
      <span class="custom-radio"></span> No
      </label>
   </div>
</div>
<div id="laborDetails_${i}" class="hidden w-100" style="display: none;">
   <div class="row mx-0">
      <div class="col-md-6 mb-3">
         <label class="min-height-label">What is your overall labor percentage target (% of Revenue)?</label>
         <input type="text" name="labor_perct_target_${i}" class="form-control" />
      </div>
      <div class="col-md-6 mb-3">
         <label class="min-height-label">What is your Front of House (FOH) labor target?</label>
         <input type="text" name="foh_labor_${i}" class="form-control" />
      </div>
      <div class="col-md-12 mb-3">
         <label class="">What is your Back of House (BOH) labor target?</label>
         <input type="text" name="boh_labor_${i}" class="form-control" />
      </div>
      <!-- Inside your generateRestaurantFields() function -->
      <div class="col-md-12">
         <label>Do you have any salaries you want to include in your labor target?</label>
         <div class="radio-group mb-0">
            <label class="radio-label">
            <input type="radio" name="salaryInclude_${i}" value="yes" class="radio-input"
               onclick="toggleSalaryFields(${i})">
            <span class="custom-radio"></span> Yes
            </label>
            <label class="radio-label">
            <input type="radio" name="salaryInclude_${i}" value="no" class="radio-input"
               onclick="toggleSalaryFields(${i})">
            <span class="custom-radio"></span> No
            </label>
         </div>
      </div>
   </div>
</div>
<!-- Salary Details (Shown if "Yes") -->
<div id="salaryDetails_${i}" class="hidden w-100" style="display: none;">
   <div class="row mx-0">
      <div class="col-md-6 mb-3">
         <label>What is your combined FOH salaried amount?</label>
         <input type="text" name="foh_amount_${i}" id="fohSalary_${i}" class="form-control" />
      </div>
      <div class="col-md-6 mb-3">
         <label>What is your combined BOH salaried amount?</label>
         <input type="text" name="boh_amount_${i}" id="bohSalary_${i}" class="form-control" />
      </div>
   </div>
</div>
<div class="col-md-12">
   <h3>Cost of Goods Sold (CoGS)</h3>
   <label title="If you don't, an industry standard will be used but may not be accurate for your restaurant. This can be adjusted later.">Do you have CoGS percent targets (% of Revenue)? <i class="fa fa-info-circle"></i></label>
   <div class="radio-group mb-0">
      <label class="radio-label">
      <input type="radio" name="cogsTarget_${i}" value="yes" class="radio-input"
         onclick="toggleCogsFields(${i})">
      <span class="custom-radio"></span> Yes
      </label>
      <label class="radio-label">
      <input type="radio" name="cogsTarget_${i}" value="no" class="radio-input" onclick="toggleCogsFields(${i})">
      <span class="custom-radio"></span> No
      </label>
   </div>
</div>
<!-- CoGS Details (Shown if "Yes") -->
<div id="cogsDetails_${i}" class="hidden w-100">
   <div class="row mx-0">
      <div class="col-md-6 mb-3">
         <label>Food CoGS %</label>
         <input type="text" name="food_cogs_${i}" id="foodCogs_${i}" class="form-control" placeholder="e.g., 23"/>
      </div>
      <div class="col-md-6 mb-3">
         <label>Pastry CoGS %</label>
         <input type="text" name="pastry_cogs_${i}" placeholder="e.g., 23" id="pastryCogs_${i}" class="form-control" />
      </div>
      <div class="col-md-6 mb-3">
         <label for="">Beer CoGS %</label>
         <input type="text" name="beer_cogs_${i}" placeholder="e.g., 23" class="form-control">
      </div>
      <div class="col-md-6 mb-3">
         <label for="">Wine CoGS %</label>
         <input type="text" name="wine_cogs_${i}" placeholder="e.g., 23" class="form-control">
      </div>
      <div class="col-md-6 mb-3">
         <label for="">Liquor CoGS %</label>
         <input type="text" name="liquor_cogs_${i}" placeholder="e.g., 23" class="form-control">
      </div>
      <div class="col-md-6 mb-3">
         <label for="">NA Bev/Coffee CoGS %</label>
         <input type="text" name="bev_coffee_cogs_${i}"  placeholder="e.g., 23" class="form-control">
      </div>
      <div class="col-md-6">
         <label for="">Smallware % (paper goods, silver or plasticware, etc.)</label>
         <input type="text" name="smallware_cogs_${i}" placeholder="e.g., 23" class="form-control">
      </div>
      <div class="col-md-6">
         <label for="">All other CoGS % (cleaning supplies, aprons, rags, etc.)</label>
         <input type="text" name="other_cogs_${i}" placeholder="e.g., 23" class="form-control">
      </div>
   </div>
</div>
<div class="col-md-12">   
    <hr> 
</div>           `;
            container.innerHTML += html;
        }

        // Show Next button after adding restaurant details
        document.getElementById('nextStep2').style.display = 'inline-block';
    }

    function toggleLaborDetails(index) {
        let laborYes = document.querySelector(`input[name="laborTarget_${index}"]:checked`)?.value === "yes";
        document.getElementById(`laborDetails_${index}`).style.display = laborYes ? "block" : "none";
    }

    function toggleSalaryFields(index) {
    let salaryYes = document.querySelector(`input[name="salaryInclude_${index}"]:checked`)?.value === "yes";
    document.getElementById(`salaryDetails_${index}`).style.display = salaryYes ? "block" : "none";
    }

    function toggleCogsFields(index) {
            let cogsYes = document.querySelector(`input[name="cogsTarget_${index}"]:checked`)?.value === "yes";
            document.getElementById(`cogsDetails_${index}`).style.display = cogsYes ? "block" : "none";
        }

    function toggleFields() {
            document.getElementById("toastDetails").style.display = document.querySelector('input[name="isToast"]:checked').value === "yes" ? "block" : "none";
            document.getElementById("noToastDetails").style.display = document.querySelector('input[name="isToast"]:checked').value === "no" ? "block" : "none";
        }

</script>