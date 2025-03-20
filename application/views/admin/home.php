<?php include('menu.php');?>
<?php
// Step 1: Domo API Credentials
$domo_api_key = "0b28240c8e7e6154b2c16e2b4ff9a5e68e52ee22511fa65e"; // Replace with your actual API key
$dashboard_id = "nxEKD"; // Replace with your actual Domo dashboard ID


$filter_field = "Master Location"; 
if(empty($user_all_location)){
    $filter_value = NULL;
}
else{
    $filter_value = array_column($user_all_location, 'location');
}


$domo_url = "https://embed.domo.com/embed/pages/nxEKD";
$domo_admin_url = "https://embed.domo.com/embed/pages/mO5vG";
$filter = urlencode(json_encode([
    [
        "column" => "Master Location",
        "operand" => "IN",
        "values" => $filter_value
    ]
]));

if($role_id == 1){
    $embed_url = $domo_admin_url . "?pfilters=" . $filter;
}
else{
    $embed_url = $domo_url . "?pfilters=" . $filter;
}


// Step 3: Generate the Embed URL
// $embed_url = "https://brdcrmbz-io.domo.com/embed/pages/private/" . $dashboard_id .
//              "?key=" . $domo_api_key .
//              "&filter=" . urlencode($filter_field) . "=" . urlencode($filter_value);

// $embed_url = "https://embed.domo.com/embed/pages/nxEKD"
// $embed_url = "https://embed.domo.com/embed/pages/nxEKD?pfilters=[{%22column%22:%22Location%22,%22operand%22:%22IN%22,%22values%22:[%22The Stables Kitchen & Beer Garden%22]}]"

?>
<div class="content-page">

<!-- Start content -->
<div class="content">
    <div class="container-fluid content-outer">
        <div class="row">
            <div class="col-xl-12 px-md-0">
                <div class="breadcrumb-holder pl-md-0 d-none">
                    <h1 class="main-title float-left">Dashboard</h1>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid content-inner">
        <!-- end row -->
        <div class="card mb-3 dashboard-content dashboard-content-card h-100-ie">

            <div class="row">
                <?php if ($role_id == 1) { ?>
                    <div class="col-md-12">
                        <h3>Dashboard</h3>
                        <div class="graphCard">
                            <div class="graphCardHeader d-flex justify-content-between align-items-center">
                                <iframe src="<?= $embed_url ?>&enableFilters=true&lockedFilters=Master%20Location" width="100%" height="1600" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>

                <?php } elseif ($role_id == 2) { ?>
                    <div class="col-md-12">
                        <div class="graphCard">
                            <h3>Dashboard</h3>
                            <div class="graphCardHeader d-flex justify-content-between align-items-center">
                                <iframe src="<?= $embed_url ?>&enableFilters=true&lockedFilters=Master%20Location" width="100%" height="1600" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>

                <?php } elseif ($role_id == 3) { ?>
                    <div class="col-md-12">
                        <h3>Dashboard</h3>
                        <div class="graphCard">
                            <div class="graphCardHeader d-flex justify-content-between align-items-center">
                                <iframe src="<?= $embed_url ?>&enableFilters=true&lockedFilters=Master%20Location" width="100%" height="1600" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- END container-fluid -->
</div>
<!-- END content -->
</div>
<!-- END content-page -->



<script src="<?php echo JS_PATH. 'moment.min.js' ?>"></script>
<script src="<?php echo PLUGIN_PATH ?>chart.js/Chart.min.js"></script>
<script src="<?php echo ASSETS_PATH ?>data/data_charts.js"></script>



<script>
        $(document).ready(function() {
        $('span[data-toggle="modal"]').click(function() {
            var companyId = $(this).data('company-id');

            $.ajax({
                url: '<?php echo base_url("Dashboard/get_restaurants_by_company_id"); ?>',  // Controller method to fetch restaurants
                type: 'GET',
                data: { company_id: companyId },  // Send the company ID in the request
                dataType: 'json',
                success: function(response) {
                    $('#viewLocations .modal-body').empty();
                    $('#viewLocations .modal-body').append('<h4 class="text-center">All Locations</h4>');
                    
                    if (response.length > 0) {
                        var restaurantList = '<ul>';
                        $.each(response, function(index, restaurant) {
                            restaurantList += '<li>' + restaurant.restaurant_name + '</li>';
                        });
                        restaurantList += '</ul>';

                        $('#viewLocations .modal-body').append(restaurantList);
                    } else {
                        $('#viewLocations .modal-body').append('<p>No restaurants found for this company.</p>');
                    }
                },
                error: function() {
                    alert('Error fetching locations.');
                }
            });
        });
    });
</script>
 