<?php include('menu.php');?>

<div class="content-page">

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid  content-outer px-0">
            <div class="row">
                <div class="col-xl-12 px-md-0 d-flex justify-content-between align-items-center mb-3">
                    <div class="pl-md-0">
                        <h1 class="main-title float-left">Restaurant Onboarding</h1>
                    </div>
                    <!-- <a href="<?php echo base_url() . 'Dashboard/add_restaurant_onboarding'?>" class="btn">
                      <i class="fa fa-plus"></i> Add 
                    </a> -->
                </div>
                <div class="col-md-5 pl-md-0">
                    <div class="form-group position-relative">
                        <input type="text" class="form-control search_input" placeholder="Search">
                        <i class="fa fa-search searchBtn"></i>
                        <button class="filter_btn">
                           Filter
                           <i class="fa fa-filter"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-7 text-right pr-md-0">
                    <!-- <button class="btn btn_csv_download">
                        <i class="fa fa-download"></i> Download CSV
                    </button> -->
                </div>
            </div>
        </div>
        <div class="container-fluid content-inner px-2">
            <!-- end row -->
            <div class="card mb-3 dashboard-content dashboard-content-card h-100-ie">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive bg pl-0">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th class="td_xlxx sticky-col d-flex align-items-center">
                                          <div class="inner_th_flex d-flex align-items-center">
                                             <p class="mb-0">
                                             Submission Date 
                                             </p>
                                             <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                              </span>
                                          </div>    
                                        </th>
                                        <th class="td_xlxx">
                                          <div class="inner_th_flex d-flex align-items-center">
                                            <p class="mb-0">
                                              Name
                                            </p>
                                            <span class="d-inline-flex flex-column">
                                             <i class="fa fa-chevron-up"></i>
                                             <i class="fa fa-chevron-down"></i>
                                            </span>
                                          </div>
                                        </th>
                                        <th class="td_xlxx">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                Email
                                                </p>
                                                <span class="d-inline-flex flex-column">
                                                   <i class="fa fa-chevron-up"></i>
                                                   <i class="fa fa-chevron-down"></i>
                                                </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx">
                                           <div class="inner_th_flex d-flex align-items-center">
                                             <p class="mb-0">
                                                Phone Number
                                              </p>
                                              <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                             </span>
                                           </div>
                                        </th>
                                        <th class="td_xlxx">
                                           <div class="inner_th_flex d-flex align-items-center">
                                             <p class="mb-0">
Prefered contact method                                             </p>
                                              <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                             </span>
                                           </div>
                                        </th>
                                        <th class="td_xlxx">
                                           <div class="inner_th_flex d-flex align-items-center">
                                             <p class="mb-0">
No. of Restaurant                                              </p>
                                              <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                             </span>
                                           </div>
                                        </th>
                                        <!-- <th class="td_xlxx" title="Preferred Contact Method">
                                           <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                Preferred Contac... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                             </span>
                                           </div>
                                       </th>
                                        <th class="td_xlxx" title="If Other, Please Specify">
                                            <div class="inner_th_flex d-flex align-items-center">
                                              <p class="mb-0">
                                                If Other, Please S... <i class="fa fa-info-circle"></i>
                                              </p>
                                              <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                              </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="What is the name of your restaurant?">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                What is the name of... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                              </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="Do you own multiple restaurants?">
                                            <div class="inner_th_flex d-flex align-items-center">
                                                <p class="mb-0">
                                                   Do you own multiple... <i class="fa fa-info-circle"></i>
                                                </p>
                                                <span class="d-inline-flex flex-column">
                                                   <i class="fa fa-chevron-up"></i>
                                                   <i class="fa fa-chevron-down"></i>
                                                </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="Is Toast your Point of Sale?">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                Is Toast your Point... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="If no, which platform do you use?">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                If no, which platfo... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="Have your turned on the SSH Data Exports in Toast?">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                Have your turned o... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="Smallware % (paper goods, silver or plasticware, etc.)">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                Smallware % (paper... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                   
                                        <th class="td_xlxx" title="January Target (current year)">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                January Target (c... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="February Target (current year)">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                February Target (c... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="March Target (current year)">
                                            <div class="inner_th_flex d-flex align-items-center">
                                              <p class="mb-0">
                                                March Target (c... <i class="fa fa-info-circle"></i>
                                              </p>
                                              <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="April Target (current year)">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                April Target (c... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="May Target (current year)">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                May Target (c... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="June Target (current year)">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                June Target (c... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="July Target (current year)">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                July Target (c... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="August Target (current year)">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                August Target (c... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="September Target (current year)">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                September Target (c... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="October Target (current year)">
                                            <div class="inner_th_flex d-flex align-items-center">
                                              <p class="mb-0">
                                                October Target (c... <i class="fa fa-info-circle"></i>
                                              </p>
                                              <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="November Target (current year)">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                November Target (c... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="December Target (current year)">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                December Target (c... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="What is your overall labor percentage target (% of Revenue)?">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                What is your overal... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="What is your Front of House (FOH) labor target?">
                                            <div class="inner_th_flex d-flex align-items-center">
                                              <p class="mb-0">
                                                What is your Front... <i class="fa fa-info-circle"></i>
                                              </p>
                                              <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="What is your Back of House (BOH) labor target?">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                What is your Back o... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="What is your  combined BOH salaried amount?">
                                            <div class="inner_th_flex d-flex align-items-center">
                                              <p class="mb-0">
                                                What is your <strong>combi </strong>... <i class="fa fa-info-circle"></i>
                                              </p>
                                              <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="What is your  combined FOH salaried amount?">
                                            <div  class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                What is your <strong>combi </strong>... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx">
                                            <div class="inner_th_flex d-flex align-items-center">
                                              <p class="mb-0">
                                                Food CoGS %
                                              </p>
                                              <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx">
                                            <div class="inner_th_flex d-flex align-items-center">
                                             <p class="mb-0">
                                                Pastry CoGS %
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                Beer CoGS %
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0">
                                                Wine CoGS %
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx">
                                            <div class="inner_th_flex d-flex align-items-center">
                                             <p class="mb-0">
                                                Liquor CoGS %
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx">
                                            <div class="inner_th_flex d-flex align-items-center">
                                             <p class="mb-0">
                                                NA Bev/Coffee CoGS %
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="All other CoGS % (cleaning supplies, aprons, rags, etc.)">
                                            <div class="inner_th_flex d-flex align-items-center">
                                              <p class="mb-0">
                                                All other CoGS % (cle... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                               </span>
                                            </div>
                                        </th> -->
                                        <!-- <th>Status</th> -->
                                        <th class="td_lg text-center">Action</th>
                                    </tr>
                                </thead>
                                <!-- <tbody class="allRestaurants text-center">

                                </tbody> -->
                                <?php if (empty($onboardings)): ?>
                    <tr>
                        <td colspan="9">No Onboardings found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($onboardings as $onboarding): ?>
                                <tbody>
                                    <tr>
                              
                                    <td class="sticky-col"><?= date('Y-m-d', $onboarding->update_time); ?></td>
                                    <td><?= $onboarding->first_name; ?></td>
                                    <td><?= $onboarding->email; ?></td>
                                    <td><?= $onboarding->phone_number; ?></td>
                                    <td><?= $onboarding->preferred_contact_method; ?></td>

                                    <td><?= $onboarding->restaurant_count; ?></td>
                                    <td class="text-center">
                                    <span class="cursor-pointer" 
      data-toggle="modal" 
      data-target="#approvedRestaurant" 
      class="cursor-pointer" 
      title="Approve Restaurant"
      data-onboarding-id="<?= $onboarding->comp_onboarding_id; ?>">
    <img src="<?php echo IMAGE_PATH?>mark.png" alt="mark" width="18">
</span>&nbsp;&nbsp;

                <!-- <a href="<?php echo base_url()?>Dashboard/edit_restaurant_onboarding/<?= $onboarding->comp_onboarding_id; ?>" class="icon-edit-delete editText mx-2">
                    <i class="fas fa-pencil-alt" title="Edit Restaurant" aria-hidden="true"></i>
                </a> -->
                <span class="icon-edit-delete deleteText">
                    <i class="fas fa-trash" title="Delete Restaurant" data-toggle="modal" 
                       data-target="#deleteRestaurant" 
                       data-restaurant-id="<?= $onboarding->comp_onboarding_id; ?>" 
                       data-restaurant-name="<?= $onboarding->first_name; ?>"
                       onclick="setDeleteRestaurantData(this)"></i>
                </span>
            </td>





                                         <!-- <td>
                                            <p>
                                                Yes
                                            </p>
                                         </td>
                                         <td>
                                            <p>
                                                No
                                            </p>
                                         </td>
                                         <td>
                                            <p>
                                                Yes
                                            </p>
                                         </td>
                                         <td>
                                            <p>
                                                Yes
                                            </p>
                                         </td>
                                         <td>
                                            <p>
                                                N/A
                                            </p>
                                         </td> -->
                                         
                                    </tr>
                                  
                                </tbody>
                                <?php endforeach; ?>
                                <?php endif; ?>
                              
                            </table>
                            <div id="pagination"></div>
                        </div>

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
<!--delete Category-->
<div class="modal fade custom-modal" id="deleteRestaurant" data-backdrop="static" data-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="modal_add_user" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content modal-content-customize">
            <div class="modal-header header-delete modal_header-blue">
                <h5 class="modal-title p-2">Delete Restaurant</h5>
                <button type="button" class="close close_model" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background: none;">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <span style="color: red" class="update_error"></span>
                            <div class="col-12 d-flex justify-content-center">
                                <h4 class="text-center">Are you sure, you want to delete <b class="restaurant_name"></b> Restaurant?</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="button" onclick="removeRestaurant();" class="btn btn-success">Yes</button>
                        <button type="button" class="btn btn-danger role_close" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Approved Company-->
<div class="modal fade custom-modal" id="approvedRestaurant" data-backdrop="static" data-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="modal_add_user" aria-hidden="true">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content modal-content-customize">
            <div class="modal-header header-delete modal_header-blue">
                <h5 class="modal-title p-2">Approve Restaurant Onboarding</h5>
                <button type="button" class="close close_model" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background: none;">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <span style="color: red" class="update_error"></span>
                            <div class="col-12 d-flex justify-content-center">
                                <h4 class="text-center">Are you sure, you want to Approve <b class="category_name"></b>
                                    restuarant?</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="button" onclick="removeCategory();"
                            class="btn btn-success btn-gradient-blue">Yes</button>
                        <button type="button" class="btn btn-danger role_close" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hidden input for storing restaurant ID -->
<input type="hidden" id="deleteRestaurantId">


<!-- END content-page -->
<script type="text/javascript">
    var controller = 'Dashboard';
    var base_url = '<?php echo site_url(); ?>'; // Ensure "url_helper" is loaded to use this function

    var page = 1;
    // Fetch all restaurants (similar to all_category)
    function all_restaurants() {
        let limit = $('#limit').val();
        let searchData = $('#searchData').val();

        $.ajax({
            'url': base_url + controller + '/allRestaurants/',
            'type': 'POST',
            'dataType': 'json',
            data: {
                'limit': limit,
                'searchData': searchData,
            },
            'success': function (data) {
                if (data.status == 200) {
                    $('#pagination').html(data.pagination);
                    $('.allRestaurants').html(data.data); // Update restaurant table content
                    document.getElementById("main_body").style.pointerEvents = 'all';
                    $("#example").DataTable({
                        bDestroy: true,
                        aaSorting: [
                            [1, "desc"]
                        ]
                    });
                }
            }
        });
    }
    all_restaurants();

    /*Remove Restaurant Alert*/
    function delete_restaurant_alert(restaurant_id) {
        get_restaurant_id = restaurant_id;
        $.ajax({
            'url': base_url + controller + '/delete_restaurant_alert/' + restaurant_id,
            'type': 'POST', //the way you want to send data to your URL
            'dataType': "json",
            'success': function (data) { //probably this request will return anything, it'll be put in var "data"
                $('.restaurant_name').html(data);
            }
        });
    }

    /*Remove Restaurant*/
    function removeRestaurant() {
        $.ajax({
            'url': base_url + controller + '/removeRestaurant/',
            'type': 'POST', //the way you want to send data to your URL
            'dataType': "json",
            data: 'restaurant_id=' + get_restaurant_id,
            'success': function (data) { //probably this request will return anything, it'll be put in var "data"
                if (data.status == 200) {

                    show_snackbar(data.data);
                    $('.close_model').click();
                    all_restaurants();

                } else {
                    show_snackbar_error(data.data);
                }

            }
        });
    }
</script>

<script type="text/javascript">
    function setDeleteRestaurantData(element) {
        // Get restaurant data from the clicked element
        var restaurantId = $(element).data('restaurant-id');
        var restaurantName = $(element).data('restaurant-name');

        // Set the restaurant ID and Name in the modal
        $('#deleteRestaurantId').val(restaurantId);  // hidden input field for restaurant ID
        $('.restaurant_name').text(restaurantName);  // Display the restaurant name in the modal
    }
</script>
<script type="text/javascript">
    function removeRestaurant() {
        var restaurantId = $('#deleteRestaurantId').val();

        $.ajax({
            url:  base_url + controller + '/deactivate_restaurant_onboarding/',
            method: "POST",
            data: { restaurant_id: restaurantId },
            dataType: "json", 
            success: function(response) {
                if (response.success) {
                    location.reload();
                } else {
                  console.log(response)
                    alert('Failed to deactivate the restaurant');
                }
            }
        });
    }
</script>

<script>
   $('#approvedRestaurant').on('show.bs.modal', function (e) {
    // Get the onboarding ID from the button that triggered the modal
    var onboardingId = $(e.relatedTarget).data('onboarding-id');
    console.log(onboardingId);  // Ensure this prints the correct ID

    // Set the category name dynamically inside the modal
    $('.category_name').text(onboardingId);

    // Save the onboarding ID in a variable for later use
    $(this).data('onboarding-id', onboardingId);
});

function removeCategory() {
    var onboardingId = $('#approvedRestaurant').data('onboarding-id');  // Get the onboarding ID from modal data
    console.log(onboardingId);  // Verify if the ID is available

    if (onboardingId) {
        // Send AJAX request to the server
        $.ajax({
            url: "<?php echo base_url('Dashboard/approve_restaurant_onboarding'); ?>",
            type: "POST",
            data: {
                onboarding_id: onboardingId
            },
            success: function(response) {
                console.log(response);
                $('#approvedRestaurant').modal('hide');  
                window.location.reload();

            },
            error: function(error) {
                console.log(error);
            }
        });
    } else {
        console.log('onboardingId is undefined');
    }
}


</script>

