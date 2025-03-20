<?php include('menu.php');?>

<div class="content-page">

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid  content-outer px-0">
            <div class="row">
                <div class="col-xl-12 px-md-0 d-flex justify-content-between align-items-center mb-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                   <li class="breadcrumb-item"><a href="<?php echo base_url() . 'dashboard/restaurants'?>
                   ">Restaurant</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Edit Restaurant</li>
                  </ol>
                </nav>
                </div>
            </div>
        </div>
        <div class="container-fluid content-inner px-2">
            <!-- end row -->
            <div class="card mb-3 dashboard-content dashboard-content-card h-100-ie">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="main-title float-left">Restaurant Information</h1>
                    </div>
                    <div class="col-md-12">
                         <form  id="addRestaurantForm" class="row mx-0 restaurant-form">
                            <div class="col-md-6">
                                <span style="color: red" class="add_error"></span>
                                <div class="form-group">
                                  <label>First Name <span class="mand_mark">*</span></label>
                                  <input type="text" class="form-control" name="restaurantName" id="restaurantName" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Last Name <span class="mand_mark">*</span></label>
                                  <input type="text" class="form-control" name="restaurantCode" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Email <span class="mand_mark">*</span></label>
                                  <input type="text" class="form-control" type="url" name="dashboardUrl" id="dashboardUrl" placeholder="example@example.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Phone Number <span class="mand_mark">*</span></label>
                                  <input  class="form-control" type="email" name="contactEmail" id="contactEmail" placeholder="(000) 000-0000">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-0">
                                  <label>Preferred Contact Method <span class="mand_mark">*</span></label>
                                </div>
                                <div class="radio-group">
                                    <label class="radio-label">
                                        <input type="radio" name="contactMethod" value="email" class="radio-input">
                                        <span class="custom-radio"></span> Email
                                    </label>
                            
                                    <label class="radio-label">
                                        <input type="radio" name="contactMethod" value="phone" class="radio-input">
                                        <span class="custom-radio"></span> Phone
                                    </label>
                            
                                    <label class="radio-label">
                                        <input type="radio" name="contactMethod" value="text" class="radio-input">
                                        <span class="custom-radio"></span> Text
                                    </label>
                            
                                    <label class="radio-label">
                                        <input type="radio" name="contactMethod" value="others" class="radio-input">
                                        <span class="custom-radio"></span> Others
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>If Other, Please Specify </label>
                                    <input  class="form-control" type="email" name="" id="">
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-0">
                                  <label>Do you own multiple restaurants? <span class="mand_mark">*</span></label>
                                </div>
                                <div class="radio-group">
                                    <label class="radio-label">
                                        <input type="radio" name="isMultipleRestaurant" value="yes" class="radio-input">
                                        <span class="custom-radio"></span> Yes
                                    </label>
                            
                                    <label class="radio-label">
                                        <input type="radio" name="isMultipleRestaurant" value="no" class="radio-input">
                                        <span class="custom-radio"></span> No
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-0">
                                  <label>Is Toast your Point of Sale? </label>
                                </div>
                                <div class="radio-group">
                                    <label class="radio-label">
                                        <input type="radio" name="isToast" value="yes" class="radio-input">
                                        <span class="custom-radio"></span> Yes
                                    </label>
                            
                                    <label class="radio-label">
                                        <input type="radio" name="isToast" value="no" class="radio-input">
                                        <span class="custom-radio"></span> No
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-3">
                                  <label>What is the name of your restaurant? <span class="mand_mark">*</span></label>
                                  <input type="text" class="form-control"  name="" id="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h3 class="bg-h3">Point of Sale (POS) Questions</h3>
                                    <label>If no, which platform do you use? </label>
                                    <input  class="form-control" type="" name="" id="">
                                 </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h3 class="bg-h3">SSH Information</h3>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-0">
                                    <label>Have your turned on the SSH Data Exports in Toast? <span class="mand_mark">*</span></label>
                                 </div>
                                 <div class="form-group">
                                    <div class="radio-group">
                                        <label class="radio-label">
                                            <input type="radio" name="isSSHOn" value="yes" class="radio-input">
                                            <span class="custom-radio"></span> Yes
                                        </label>
                                
                                        <label class="radio-label">
                                            <input type="radio" name="isSSHOn" value="no" class="radio-input">
                                            <span class="custom-radio"></span> No
                                        </label>
                                    </div>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-0">
                                  <label>Would you like us to help you turn those on?</label>
                                </div>
                                <div class="radio-group">
                                    <label class="radio-label">
                                        <input type="radio" name="turnOnSSH" value="yes" class="radio-input">
                                        <span class="custom-radio"></span> Yes
                                    </label>
                            
                                    <label class="radio-label">
                                        <input type="radio" name="turnOnSSH" value="no" class="radio-input">
                                        <span class="custom-radio"></span> No
                                    </label>
                            
                                    <label class="radio-label">
                                        <input type="radio" name="turnOnSSH" value="n_a" class="radio-input">
                                        <span class="custom-radio"></span> N/A
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h3 class="bg-h3">Revenue Targets</h3>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-0">
                                  <label>Do you have monthly forecast targets ($USD)?</label>
                                </div>
                                <div class="radio-group">
                                    <label class="radio-label">
                                        <input type="radio" name="monthlyForecast" value="yes" class="radio-input">
                                        <span class="custom-radio"></span> Yes
                                    </label>
                            
                                    <label class="radio-label">
                                        <input type="radio" name="monthlyForecast" value="no" class="radio-input">
                                        <span class="custom-radio"></span> No
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <h3 class="bg-h3">Revenue Targets Yes</h3>
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">January Target (current year)</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">February Target (current year)</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">March  Target (current year)</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">April Target (current year)</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">May Target (current year)</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">June Target (current year)</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">July Target (current year)</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">August Target (current year)</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">September Target (current year)</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">October Target (current year)</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">November Target (current year)</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">December Target (current year)</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h3 class="bg-h3">Labor Target</h3>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-0">
                                  <label>Do you have labor percentage targets (% of Revenue)?</label>
                                </div>
                                <div class="radio-group">
                                    <label class="radio-label">
                                        <input type="radio" name="laborTargetYes" value="yes" class="radio-input">
                                        <span class="custom-radio"></span> Yes
                                    </label>
                            
                                    <label class="radio-label">
                                        <input type="radio" name="laborTargetYes" value="no" class="radio-input">
                                        <span class="custom-radio"></span> No
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-3">
                                    <h3 class="bg-h3">Labor Targets Yes</h3>
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">What is your overall labor percentage target (% of Revenue)?</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">What is your Front of House (FOH) labor target?</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">What is your Back of House (BOH) labor target?</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-0">
                                  <label>Do you have any salaries you want to include in your labor target?</label>
                                </div>
                                <div class="radio-group">
                                    <label class="radio-label">
                                        <input type="radio" name="laborSalariedYes" value="yes" class="radio-input">
                                        <span class="custom-radio"></span> Yes
                                    </label>
                            
                                    <label class="radio-label">
                                        <input type="radio" name="laborSalariedYes" value="no" class="radio-input">
                                        <span class="custom-radio"></span> No
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-3">
                                    <h3 class="bg-h3">Salaried Labor Yes</h3>
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">What is your <strong>combined </strong>FOH salaried amount?</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">What is your <strong>combined </strong>BOH salaried amount?</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h3 class="bg-h3">Cost of Goods Sold (CoGS)</h3>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-0">
                                  <label>Do you have CoGS percent targets (% of Revenue)?</label>
                                </div>
                                <div class="radio-group">
                                    <label class="radio-label">
                                        <input type="radio" name="isCogsPercent" value="yes" class="radio-input">
                                        <span class="custom-radio"></span> Yes
                                    </label>
                            
                                    <label class="radio-label">
                                        <input type="radio" name="isCogsPercent" value="no" class="radio-input">
                                        <span class="custom-radio"></span> No
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-3">
                                    <h3 class="bg-h3">CoGS Yes</h3>
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">Food CoGS %</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">Pastry CoGS %</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">Beer CoGS %</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">Wine CoGS %</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">Liquor CoGS %</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">NA Bev/Coffee CoGS %</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">Smallware % (paper goods, silver or plasticware, etc.)</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-0">
                                <div class="form-group">
                                    <label class="mb-0">All other CoGS % (cleaning supplies, aprons, rags, etc.)</label>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="" id="" placeholder="e.g., 23">
                                </div>
                            </div>


                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn add_button">
                                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Update
                                    <span class="add_fa_spin_icon"></span>
                                </button>
                            </div>
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
<!-- END content-page -->
 
<script type="text/javascript">
  $("#editRestaurantForm").on('submit', function(e) {
    $('.update_error').html('');
    $('.update_fa_spin_icon').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>\n');
    $(".update_button").attr("disabled", true);
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: base_url + controller + '/updateRestaurant',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success: function(data) {
            if (data.status == 200) {
                show_snackbar(data.data); // Display success message
                setTimeout(function() {
                    window.location.href = base_url + controller + '/restaurants'; // Redirect to all restaurants
                }, 500);
            } else {
                $('.update_error').html(data.data); // Display error message
                $('.update_fa_spin_icon').html('');
                $(".update_button").attr("disabled", false);
            }
        }
    });
});

</script>
 

