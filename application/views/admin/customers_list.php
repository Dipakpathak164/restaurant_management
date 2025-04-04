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
                              
                                    <td class="sticky-col"><?= date('Y-m-d', $onboarding->creation_time); ?></td>
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
