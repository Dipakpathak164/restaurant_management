<?php include('menu.php');?>
<?php
// Step 1: Domo API Credentials
$domo_api_key = "0b28240c8e7e6154b2c16e2b4ff9a5e68e52ee22511fa65e"; // Replace with your actual API key
$dashboard_id = "mO5vG"; // Replace with your actual Domo dashboard ID


// Step 2: Specify the Filter Field and Value
$filter_field = "Master Location"; // Replace with your dataset's column name for filtering
$filter_value = "Collective ​Coffee and ​Bakery"; // Replace with the specific value you want to filter by

// Step 3: Generate the Embed URL
$embed_url = "https://brdcrmbz-io.domo.com/embed/pages/private/" . $dashboard_id .
             "?key=" . $domo_api_key .
             "&filter=" . urlencode($filter_field) . "=" . urlencode($filter_value);

?>
<div class="content-page">

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid content-inner">
            <!-- end row -->
            <div class="card mb-3 dashboard-content dashboard-content-card h-100-ie">
               <h1>Dashboard</h1>
               <!-- Step 4: Embed the Dashboard in an Iframe -->
               <iframe src="<?= $embed_url ?>" width="100%" height="1600" frameborder="0"  marginheight="0" marginwidth="0" frameborder="0"></iframe>
                <!-- <iframe src="https://embed.domo.com/cards/vly0M" width="600" height="600" marginheight="0" marginwidth="0" frameborder="0"></iframe> -->
            </div>
            <!-- end row -->
            <!-- end row -->


        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->

</div>
<!-- END content-page -->