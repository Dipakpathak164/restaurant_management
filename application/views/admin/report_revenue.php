<?php include('menu.php');?>
<div class="content-page">
   <!-- Start content -->
   <div class="content">
      <div class="container-fluid content-inner px-2">
         <div class="card mb-3 dashboard-content dashboard-content-card h-100-ie">
            <div class="row">
               <div class="col-md-8 mx-auto quest_form_outer">
                  <!-- <form action="" class="question_form row"> -->
                  <form action="<?= base_url('Dashboard/save_expense') ?>" method="post" enctype="multipart/form-data" class="question_form row">
                     <div class="col-md-12">
                        <h1 class="mb-4">Report Revenue and Cost for Period</h1>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group mb-4">
                           <label>What Restaurant is this report for? <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" value="The Stables Kitchen & Beer Garden" placeholder="">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Email <span class="text-danger">*</span></label>
                           <input type="text" name="email" class="form-control" value="danielr@takeflightrg.com" readonly>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <label for="datePicker">What is the date range for this report?<span
                            class="text-danger">*</span></label>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                              <p class="mb-2 inner_para">Beginning Date</p>
                           <div class="input-group date" id="datepicker">
                              <input type="text" class="form-control" name="expense_date" placeholder="DD/MM/YYYY">
                              <div class="input-group-append">
                                 <span class="input-group-text">
                                    <i class="fa fa-calendar"></i> <!-- Font Awesome icon -->
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <p class="mb-2 inner_para">Ending Date</p>
                           <div class="input-group date" id="datepicker3">
                              <input type="text" class="form-control" name="expense_date" placeholder="DD/MM/YYYY">
                              <div class="input-group-append">
                                 <span class="input-group-text">
                                    <i class="fa fa-calendar"></i> <!-- Font Awesome icon -->
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Revenue for period </label>
                           <input type="text" name="" class="form-control" >
                        </div>
                     </div>
                     <div class="col-md-12">
                        <hr>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>FOH labor for period</label>
                           <input type="text" name="" class="form-control" >
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>BOH labor for period</label>
                           <input type="text" name="" class="form-control" >
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Total other labor for period </label>
                           <input type="text" name="" class="form-control" >
                        </div>
                     </div>
                     <div class="col-md-12">
                        <hr>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Revenue from food sales</label>
                           <input type="text" name="" class="form-control" >
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Revenue from beer sales</label>
                           <input type="text" name="" class="form-control" >
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Revenue from liquor sales</label>
                           <input type="text" name="" class="form-control" >
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Revenue from wine sales</label>
                           <input type="text" name="" class="form-control" >
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Revenue from NA beverage sales</label>
                           <input type="text" name="" class="form-control" >
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Revenue from other sales</label>
                           <input type="text" name="" class="form-control" >
                        </div>
                     </div>
                     <div class="col-md-12">
                        <hr>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Total guests</label>
                           <input type="text" name="" class="form-control" >
                        </div>
                     </div>
                     <div class="col-md-12 text-center">
                        <a href="<?php echo base_url()?>Dashboard/report_an_expense_list" class="btn btn-border">
                        <i class="fa fa-close"></i> Cancel
                        </a>
                        <button class="btn btn-primary ml-md-3">
                        Submit
                        </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- END container-fluid -->
   </div>
   <!-- END content -->
</div>