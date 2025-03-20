<?php include('menu.php');?>
<div class="content-page">
   <!-- Start content -->
   <div class="content">
      <div class="container-fluid  content-outer">
         <div class="row">
            <div class="col-xl-12 px-md-0 d-flex justify-content-between align-items-center mb-3">
               <div class="pl-md-0">
                  <h1 class="main-title float-left">All Locations</h1>
               </div>
            </div>
         </div>
      </div>
      <div class="container-fluid content-inner">
         <!-- end row -->
         <div class="card mb-3 dashboard-content dashboard-content-card h-100-ie">
            <div class="row">
               <div class="col-md-12">
                  <div class="table-responsive bg">
                     <table class="table">
                        <thead class="text-center">
                           <tr>
                              <!-- <th>Company Name</th> -->
                              <!-- <th>User Role</th> -->
                              <th>Restaurant Name</th>
                              <th>Location</th>
                              <th>Update On</th>
                              <th class="text-center">Action</th>
                           </tr>
                        </thead>
                        <?php if (empty($restaurants)): ?>
                    <tr>
                        <td colspan="9">No Expenses found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($restaurants as $restaurant): ?>
                        <tbody class="text-center">
                           <tr>
                              <td><?= $restaurant['restaurant_name']; ?></td>
                              <td>
                              <?= $restaurant['location']; ?>
                              </td>
                              <td>
                              <?= date('Y-m-d', $restaurant['update_time']); ?>                              </td>
                              <td class="text-center">
                                <a href="<?php echo base_url()?>Dashboard/edit_location_details/<?= $restaurant['restaurant_details_id']; ?>">
                                  <i class="fas fa-pencil-alt" title="Edit Location"></i>
                                </a>
                              </td>
                           </tr>
                        </tbody>
                        <?php endforeach; ?>
                                <?php endif; ?>
                     </table>
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
<!-- END content-page -->