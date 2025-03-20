<?php include('menu.php');?>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid content-inner px-2">
            <div class="row">
                <div class="col-md-10 mx-auto px-md-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-2">
                          <li class="breadcrumb-item"><a href="<?php echo base_url()?>Dashboard/view_locations">All Locations</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                      </nav>
                </div>
            </div>
            <!-- end row -->
            <div class="card mb-3 dashboard-content dashboard-content-card h-100-ie">
                <div class="row">
                    <div class="col-md-10 mx-auto quest_form_outer">
                        <form action="<?php echo base_url()?>Dashboard/update_location_details" class="row mx-0 question_form" method="post">
                            <input type="hidden" name="restaurant_details_id" value="<?php echo $restaurant['restaurant_details_id']; ?>">
                            <div class="col-md-12 position-relative">
                                <h1 class="mb-4">Restaurant Information</h1>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Restaurant Name</label>
                                    <input type="text" class="form-control" name="restaurant_name" value="<?php echo $restaurant['restaurant_name']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" class="form-control" name="restaurant_location" value="<?php echo $restaurant['location']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label class="mb-0">
                                        <h3 class="font-sub">Revenue Targets</h3>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>January Target (current year)</label>
                                <input type="text" name="revenue_jan_target" class="form-control" value="<?php echo $restaurant['revenue_jan_target']; ?>" placeholder="e.g., 23">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>February Target (current year)</label>
                                <input type="text" name="revenue_feb_target" class="form-control" value="<?php echo $restaurant['revenue_feb_target']; ?>" placeholder="e.g., 23">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>March Target (current year)</label>
                                <input type="text" name="revenue_mar_target" class="form-control" value="<?php echo $restaurant['revenue_mar_target']; ?>" placeholder="e.g., 23">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>April Target (current year)</label>
                                <input type="text" name="revenue_apr_target" class="form-control" value="<?php echo $restaurant['revenue_apr_target']; ?>" placeholder="e.g., 23">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>May Target (current year)</label>
                                <input type="text" name="revenue_may_target" class="form-control" value="<?php echo $restaurant['revenue_may_target']; ?>" placeholder="e.g., 23">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>June Target (current year)</label>
                                <input type="text" name="revenue_jun_target" class="form-control" value="<?php echo $restaurant['revenue_jun_target']; ?>" placeholder="e.g., 23">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>July Target (current year)</label>
                                <input type="text" name="revenue_jul_target" class="form-control" value="<?php echo $restaurant['revenue_jul_target']; ?>" placeholder="e.g., 23">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>August Target (current year)</label>
                                <input type="text" name="revenue_aug_target" class="form-control" value="<?php echo $restaurant['revenue_aug_target']; ?>" placeholder="e.g., 23">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>September Target (current year)</label>
                                <input type="text" name="revenue_sep_target" class="form-control" value="<?php echo $restaurant['revenue_sep_target']; ?>" placeholder="e.g., 23">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>October Target (current year)</label>
                                <input type="text" name="revenue_oct_target" class="form-control" value="<?php echo $restaurant['revenue_oct_target']; ?>" placeholder="e.g., 23">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>November Target (current year)</label>
                                <input type="text" name="revenue_nov_target" class="form-control" value="<?php echo $restaurant['revenue_nov_target']; ?>" placeholder="e.g., 23">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>December Target (current year)</label>
                                <input type="text" name="revenue_dec_target" class="form-control" value="<?php echo $restaurant['revenue_dec_target']; ?>" placeholder="e.g., 23">
                            </div>
                            <div class="col-md-12 mb-2">
                                <h3 class="font-sub">Labor Target</h3>
                            </div>
                            <div class="col-md-12">
                                <label title="If you don't, an industry standard will be used but may not be accurate for your restaurant. This can be adjusted later.">
                                    Do you have labor percentage targets (% of Revenue)? <i class="fa fa-info-circle"></i>
                                </label>
                                <div class="radio-group">
                                    <label class="radio-label">
                                        <input type="radio" name="editLaborTarget" value="yes" class="radio-input" onclick="toggleLaborDetails()" <?php echo ($restaurant['labor_perct_target'] !== NULL) ? 'checked' : ''; ?>>
                                        <span class="custom-radio"></span> Yes
                                    </label>
                                    <label class="radio-label">
                                        <input type="radio" name="editLaborTarget" value="no" class="radio-input" onclick="toggleLaborDetails()" <?php echo ($restaurant['labor_perct_target'] === NULL) ? 'checked' : ''; ?>>
                                        <span class="custom-radio"></span> No
                                    </label>
                                </div>
                            </div>
                            <div id="laborDetails" class="w-100" style="display: <?php echo ($restaurant['labor_perct_target'] !== NULL) ? 'block' : 'none'; ?>;">
                                <div class="row mx-0">
                                    <div class="col-md-6 mb-3">
                                        <label class="min-height-label">What is your overall labor percentage target (% of Revenue)?</label>
                                        <input type="text" name="labor_perct_target" class="form-control" value="<?php echo $restaurant['labor_perct_target']; ?>" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="min-height-label">What is your Front of House (FOH) labor target?</label>
                                        <input type="text" name="foh_labor" class="form-control" value="<?php echo $restaurant['foh_labor']; ?>" />
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="">What is your Back of House (BOH) labor target?</label>
                                        <input type="text" name="boh_labor" class="form-control" value="<?php echo $restaurant['boh_labor']; ?>" />
                                    </div>
                                    <div class="col-md-12">
                                        <label>Do you have any salaries you want to include in your labor target?</label>
                                        <div class="radio-group mb-0">
                                            <label class="radio-label">
                                                <input type="radio" name="editSalaryInclude" value="yes" class="radio-input" onclick="toggleSalaryFields()" <?php echo ($restaurant['salary_include'] === 'yes') ? 'checked' : ''; ?>>
                                                <span class="custom-radio"></span> Yes
                                            </label>
                                            <label class="radio-label">
                                                <input type="radio" name="editSalaryInclude" value="no" class="radio-input" onclick="toggleSalaryFields()" <?php echo ($restaurant['salary_include'] === 'no') ? 'checked' : ''; ?>>
                                                <span class="custom-radio"></span> No
                                            </label>
                                            <div id="editSalaryDetails" class="w-100" style="display: <?php echo ($restaurant['salary_include'] === 'yes') ? 'block' : 'none'; ?>;">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label>What is your combined FOH salaried amount?</label>
                                                        <input type="text" name="foh_amount" class="form-control" value="<?php echo $restaurant['foh_amount']; ?>" />
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>What is your combined BOH salaried amount?</label>
                                                        <input type="text" name="boh_amount" class="form-control" value="<?php echo $restaurant['boh_amount']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-2">
                                    <h3 class="font-sub">Cost of Goods Sold (CoGS)</h3>
                                </div>
                                <label title="If you don't, an industry standard will be used but may not be accurate for your restaurant. This can be adjusted later.">Do you have CoGS percent targets (% of Revenue)? <i class="fa fa-info-circle"></i></label>
                                <div class="radio-group mb-0">
                                <label class="radio-label">
                                                <input type="radio" name="editCogsTarget" value="yes" class="radio-input" onclick="toggleSalaryFields()" <?php echo ($restaurant['cogs_target'] === 'yes') ? 'checked' : ''; ?>>
                                                <span class="custom-radio"></span> Yes
                                            </label>
                                            <label class="radio-label">
                                                <input type="radio" name="editCogsTarget" value="no" class="radio-input" onclick="toggleSalaryFields()" <?php echo ($restaurant['cogs_target'] === 'no') ? 'checked' : ''; ?>>
                                                <span class="custom-radio"></span> No
                                            </label>
                                    <!-- <label class="radio-label">
                                        <input type="radio" name="editCogsTarget" value="yes" class="radio-input" onclick="toggleCogsFields()" <?php echo ($restaurant['cogs_target'] !== 'yes') ? 'checked' : ''; ?>>
                                        <span class="custom-radio"></span> Yes
                                    </label>
                                    <label class="radio-label">
                                        <input type="radio" name="editCogsTarget" value="no" class="radio-input" onclick="toggleCogsFields()" <?php echo ($restaurant['cogs_target'] === 'no') ? 'checked' : ''; ?>>
                                        <span class="custom-radio"></span> No
                                    </label> -->
                                </div>
                            </div>
                            <div id="editCogsDetails" class="hidden w-100" style="display: <?php echo ($restaurant['food_cogs'] !== NULL) ? 'block' : 'none'; ?>;">
                                <div class="row mx-0">
                                    <div class="col-md-6 mb-3">
                                        <label>Food CoGS %</label>
                                        <input type="text" name="food_cogs" class="form-control" value="<?php echo $restaurant['food_cogs']; ?>" placeholder="e.g., 23" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Pastry CoGS %</label>
                                        <input type="text" name="pastry_cogs" placeholder="e.g., 23" class="form-control" value="<?php echo $restaurant['pastry_cogs']; ?>" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Beer CoGS %</label>
                                        <input type="text" name="beer_cogs" placeholder="e.g., 23" class="form-control" value="<?php echo $restaurant['beer_cogs']; ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Wine CoGS %</label>
                                        <input type="text" name="wine_cogs" placeholder="e.g., 23" class="form-control" value="<?php echo $restaurant['wine_cogs']; ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Liquor CoGS %</label>
                                        <input type="text" name="liquor_cogs" placeholder="e.g., 23" class="form-control" value="<?php echo $restaurant['liquor_cogs']; ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">NA Bev/Coffee CoGS %</label>
                                        <input type="text" name="bev_coffee_cogs" placeholder="e.g., 23" class="form-control" value="<?php echo $restaurant['bev_coffee_cogs']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Smallware % (paper goods, silver or plasticware, etc.)</label>
                                        <input type="text" name="smallware_cogs" placeholder="e.g., 23" class="form-control" value="<?php echo $restaurant['smallware_cogs']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">All other CoGS % (cleaning supplies, aprons, rags, etc.)</label>
                                        <input type="text" name="other_cogs" placeholder="e.g., 23" class="form-control" value="<?php echo $restaurant['other_cogs']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-12 mt-3">
                                <label>
                                    Is Toast your Point of Sale?
                                </label>
                                <div class="radio-group">
                                    <label class="radio-label">
                                        <input type="radio" name="edittoastoption" value="yes" class="radio-input" onclick="editToastOption()">
                                        <span class="custom-radio"></span> Yes
                                    </label>
                                    <label class="radio-label">
                                        <input type="radio" name="edittoastoption" value="no" class="radio-input" onclick="editToastOption()">
                                        <span class="custom-radio"></span> No
                                    </label>
                                </div>
                            </div>
                            <div id="yesTostDetails" class="w-100" style="display: none;">
                                <div class="row mx-0">
                                    <div class="col-md-12 mb-3">
                                        <label title="Toast Home > Reports > Settings > Data Exports > Enabled">Have you turned on the SSH Data Exports in Toast? <span class="text-danger">*</span> <i class="fa fa-info-circle"></i></label>
                                        <div class="radio-group">
                                            <label class="radio-label">
                                                <input type="radio" name="turnedToastYes" value="yes" class="radio-input">
                                                <span class="custom-radio"></span> Yes
                                            </label>
                                            <label class="radio-label">
                                                <input type="radio" name="turnedToastYes" value="no" class="radio-input">
                                                <span class="custom-radio"></span> No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Would you like us to help you turn those on?</label>
                                        <div class="radio-group">
                                            <label class="radio-label">
                                                <input type="radio" name="likeToTurnToast" value="yes" class="radio-input">
                                                <span class="custom-radio"></span> Yes
                                            </label>
                                            <label class="radio-label">
                                                <input type="radio" name="likeToTurnToast" value="no" class="radio-input">
                                                <span class="custom-radio"></span> No
                                            </label>
                                            <label class="radio-label">
                                                <input type="radio" name="likeToTurnToast" value="na" class="radio-input">
                                                <span class="custom-radio"></span> N/A
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="noTostDetails" class="w-100" style="display: none;">
                                <div class="row mx-0">
                                    <div class="col-md-6 mb-3">
                                        <label class="min-height-label">If no, which platform do you use?</label>
                                        <input type="text" name="" class="form-control" />
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="<?php echo base_url()?>Dashboard/customers" class="btn btn-border">
                                    <i class="fa fa-close"></i> Cancel
                                </a>
                                <button class="btn ml-md-3 btn-primary">
                                    <i class="fa fa-sync"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function toggleLaborDetails() {
        let laborYes = document.querySelector('input[name="editLaborTarget"][value="yes"]').checked;
        document.getElementById("laborDetails").style.display = laborYes ? "block" : "none";
    }

    function toggleSalaryFields() {
        let salaryYes = document.querySelector('input[name="editSalaryInclude"][value="yes"]').checked;
        document.getElementById("editSalaryDetails").style.display = salaryYes ? "block" : "none";
    }

    function toggleCogsFields() {
        let cogsYes = document.querySelector('input[name="editCogsTarget"][value="yes"]').checked;
        document.getElementById("editCogsDetails").style.display = cogsYes ? "block" : "none";
    }

    // function editToastOption() {
    //     let selectedValue = document.querySelector('input[name="edittoastoption"]:checked').value;
    //     if (selectedValue === "yes") {
    //         document.getElementById("yesTostDetails").style.display = "block";
    //         document.getElementById("noTostDetails").style.display = "none";
    //     } else if (selectedValue === "no") {
    //         document.getElementById("yesTostDetails").style.display = "none";
    //         document.getElementById("noTostDetails").style.display = "block";
    //     }
    // }
</script>