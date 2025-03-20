<?php include('menu.php');?>

<div class="content-page">

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid  content-outer px-0">
            <div class="row">
                <div class="col-xl-12 px-md-0 d-flex justify-content-between align-items-center mb-3">
                    <div class="pl-md-0">
                        <h1 class="main-title float-left">All Restaurant Onboarded</h1>
                    </div>
                    <!-- <button data class="btn" data-toggle="modal" data-target="#addCompany">
                        <i class="fa fa-plus"></i> Add Company
                    </button> -->
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
                                        <th class="td_xlxx">Restaurant Id </th>
                                        <th class="td_xlxx">Restaurant Name </th>
                                        <th class="td_xlxxl">Primary Contact Email</th>
                                        <th class="td_xlxx">Primary Contact Phone</th>
                                        <th>Locations</th>
                                        <th class="td_xlxx">Status</th>

                                        
                                        <th class="td_xlxx">Update Time</th>
                                        <th class="td_lg text-center">Action</th>
                                    </tr>
                                </thead>
                                <!-- <tbody class="allRestaurants text-center">

                                </tbody> -->
                               
                                <?php if (empty($customers)): ?>
                    <tr>
                        <td colspan="9">No Company found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($customers as $company): ?>

                   
                                <tbody class="text-center">
    <tr>
        <td><?= $company->comp_onboarding_id; ?></td>
        <td><?= $company->company_name; ?></td>
        <td><?= $company->email; ?></td>
        <td><?= $company->phone_number; ?></td>
        <!-- <td><?= $company->update_time; ?></td> -->

        <td class="text-success">
        <!-- <span data-toggle="modal" data-target="#viewLocations" class="cursor-pointer" data-company-id="<?= $company->comp_onboarding_id
; ?>">
    View <i class="fa fa-eye"></i>
</span> -->
   <a href="<?php echo base_url()?>Dashboard/view_restaurants/<?= $company->comp_onboarding_id; ?>" class="text-success">
      View <i class="fa fa-eye"></i>
   </a>

                                        </td>
                                        <td class="<?= $company->is_active == 1 ? 'text-success' : 'text-danger'; ?>">
                                        <b><?= $company->is_active == 1 ? 'Enabled' : 'Disabled'; ?></b></td>
                                       <td>                                      
                                        <?= date('Y-m-d H:i:s', $company->update_time); ?>
                                        </td>
                                        <td class="text-center">
                                        <!-- <span title="Edit Company" data-toggle="modal" 
      data-target="#editCompany" 
      class="icon-edit-delete editText" 
      data-company-id="<?= $company->first_name; ?>"> 
    <i class="fas fa-pencil-alt" title="Edit Company" aria-hidden="true"></i>
</span> -->
<!-- &nbsp;&nbsp; -->
                                                    <span class="icon-edit-delete deleteText">
                    <i class="fas fa-trash" title="Delete Company" data-toggle="modal"
                    data-target="#deleteCompany" aria-hidden="true"
                    onclick="setDeleteCompanyData(<?= $company->comp_onboarding_id; ?>, '<?= $company->company_name ; ?>')">
                    </i>
                </span>
                                        

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

<!-- Add Compnay -->

    <div class="modal fade custom-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="modal_add_user" aria-hidden="true" id="addCompany">
    <div class="modal-dialog modal-lg h-auto">
        <div class="modal-content modal-content-customize">
            <div class="modal-header">
                <h5 class="modal-title p-2">Add Company</h5>
                <button type="button" class="close modal_close_btn" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addCategoryForm">
                    <div class="row">
                        <div class="col-md-6">
                            <span style="color: red" class="add_error"></span>
                            <div class="form-group">
                                <label>Company Name<a style="color: red">*</a></label>
                                <input type="text" name="comp_name" maxlength="32" required class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Primary Contact Email<a style="color: red">*</a></label>
                                <input type="email" name="comp_email" maxlength="128" required class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Primary Contact Phone<a style="color: red">*</a></label>
                                <input type="text" name="comp_phone" maxlength="32" required class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Country<a style="color: red">*</a></label>
                                <select name="comp_country_id" id="country_id" class="form-control">
                                    <option value="">Select Country</option>
                                    <?php 
                                        if (!empty($country_data)) {
                                            foreach ($country_data as $country) {
                                                echo '<option value="' . $country->country_id . '">' . $country->long_name . '</option>';
                                            }
                                        } else {
                                            echo '<option value="">No countries available</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Add Restaurant <a style="color: red">*</a></label>
                                <span class="add_more_restaurant btn">
                                    <i class="fa fa-plus"></i> Add Restaurant
                                </span>
                            </div>
                        </div>

                        <!-- Container to hold dynamically added restaurants -->
                        <div class="col-md-12" id="restaurantContainer"></div>

                        <div class="col-12" style="margin-top:3%">
                            <button type="submit" id="submit" class="btn add_button" style="float: right;"><i
                                    class="fa fa-plus pr-2" aria-hidden="true"></i>
                                Add<span class="add_fa_spin_icon"></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Edit Compnay -->
<div class="modal fade custom-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
     aria-labelledby="modal_add_user" aria-hidden="true" id="editCompany">
    <div class="modal-dialog modal-lg h-auto">
        <div class="modal-content modal-content-customize">
            <div class="modal-header">
                <h5 class="modal-title p-2">Edit Company</h5>
                <button type="button" class="close modal_close_btn" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editCompanyForm" >
                    <div class="row">
                        <div class="col-md-6">
                            <span style="color: red" class="add_error"></span>
                            <div class="form-group">
                                <label>Company Name<a style="color: red">*</a></label>
                                <input type="text" id="editCompName" name="comp_name" maxlength="32" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Primary Contact Email<a style="color: red">*</a></label>
                                <input type="email" id="editCompEmail" name="comp_email" maxlength="128" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Primary Contact Phone<a style="color: red">*</a></label>
                                <input type="text" id="editCompPhone" name="comp_phone" maxlength="32" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Country<a style="color: red">*</a></label>
                                <select name="comp_country_id" id="editCompCountry" class="form-control">
                                    <option value="">Select Country</option>
                                    <?php 
                                        if (!empty($country_data)) {
                                            foreach ($country_data as $country) {
                                                echo '<option value="' . $country->country_id . '">' . $country->long_name . '</option>';
                                            }
                                        } else {
                                            echo '<option value="">No countries available</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Update Restaurant <a style="color: red">*</a></label>
                                <span class="update_more_restaurant btn">
                                    <i class="fa fa-plus"></i>
                                </span>
                            </div>
                        </div>
                        <!-- Container to hold dynamically added restaurants -->
                        <div class="col-md-12" id="updateRestaurantContainer"></div>

                        <div class="col-12" style="margin-top:3%">
                            <button type="submit" id="submit" class="btn add_button" style="float: right;">
                                <i class="fa fa-sync pr-2" aria-hidden="true"></i> Update
                                <span class="add_fa_spin_icon"></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--delete Company-->
<div class="modal fade custom-modal" id="deleteCompany" data-backdrop="static" data-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="modal_add_user" aria-hidden="true">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content modal-content-customize">
            <div class="modal-header header-delete modal_header-blue">
                <h5 class="modal-title p-2">Delete Company</h5>
                <button type="button" class="close close_model" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background: none;">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <span style="color: red" class="update_error"></span>
                            <div class="col-12 d-flex justify-content-center">
                                <h4 class="text-center">Are you sure, you want to delete <b class="category_name"></b>
                                    company?</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="button" class="btn btn-border role_close" data-dismiss="modal">No</button>
                        <button type="button" onclick="removeCategory();"
                            class="btn btn-success btn-gradient-blue">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--List of Locations-->
<div class="modal fade custom-modal" id="viewLocations" data-backdrop="static" data-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="modal_add_user" aria-hidden="true">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content modal-content-customize">
            <div class="modal-header header-delete modal_header-blue">
                <h5 class="modal-title p-2">Locations</h5>
                <button type="button" class="close close_model" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background: none;">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <span style="color: red" class="update_error"></span>
                            <div class="col-12 d-flex">
                                <h4 class="text-center">All Locations</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>


document.querySelector('.add_more_restaurant').addEventListener('click', function() {
    const container = document.getElementById('restaurantContainer');

    // Create a new restaurant entry
    const restaurantDiv = document.createElement('div');
    restaurantDiv.classList.add('restaurant-entry', 'row', 'position-relative');

    // Dynamically create a unique entry for restaurant data (this does not use Date.now())
    restaurantDiv.innerHTML = `
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="restaurant_name[]" class="form-control" placeholder="Restaurant Name" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="restaurant_url[]" class="form-control" placeholder="DOMO Dashboard Url" required>
            </div>
        </div>
        <div class="col-md-4">
            <input type="radio" name="restaurant_status_${container.children.length}[]" value="activate" required>
            <label>Activate</label>
            <input type="radio" name="restaurant_status_${container.children.length}[]" value="deactivate" required>
            <label>Deactivate</label>
        </div>
        <i class="fa fa-trash delete-restaurant"></i>
    `;

    container.appendChild(restaurantDiv);

    // Add event listener for delete button
    restaurantDiv.querySelector('.delete-restaurant').addEventListener('click', function() {
        container.removeChild(restaurantDiv);
    });
});

document.getElementById('addCategoryForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // Validate all restaurant fields
    const restaurantNames = document.querySelectorAll('input[name="restaurant_name[]"]');
    const restaurantUrls = document.querySelectorAll('input[name="restaurant_url[]"]');
    const restaurantStatuses = document.querySelectorAll('input[type="radio"]'); // All radio buttons

    let isValid = true;
    let errorMessage = ''; // Collecting error messages

    for (let i = 0; i < restaurantNames.length; i++) {
        if (!restaurantNames[i].value) {
            isValid = false;
            errorMessage += `Restaurant #${i + 1} Name is required.\n`;
        }
        if (!restaurantUrls[i].value) {
            isValid = false;
            errorMessage += `Restaurant #${i + 1} URL is required.\n`;
        }
        
        // Check if at least one radio button is selected (for status)
        const statusGroup = document.getElementsByName(`restaurant_status_${i}[]`);
        if (![...statusGroup].some(radio => radio.checked)) {
            isValid = false;
            errorMessage += `Restaurant #${i + 1} Status is required.\n`;
        }
    }

    if (!isValid) {
        alert(errorMessage);
        return; // Prevent submission if validation fails
    }

    // Prepare form data
    const formData = new FormData(this);

    // Add dynamic restaurant data manually
    const restaurantData = {
        names: [],
        urls: [],
        statuses: []
    };

    restaurantNames.forEach(name => restaurantData.names.push(name.value));
    restaurantUrls.forEach(url => restaurantData.urls.push(url.value));
    restaurantStatuses.forEach(status => {
        if (status.checked) {
            restaurantData.statuses.push(status.value);
        }
    });

    // Append restaurant data to FormData
    formData.append('restaurant_names', JSON.stringify(restaurantData.names));
    formData.append('restaurant_urls', JSON.stringify(restaurantData.urls));
    formData.append('restaurant_statuses', JSON.stringify(restaurantData.statuses));

    // Make an AJAX request to submit the form
    fetch('add_company', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 200) {
            location.reload(); 
            $('#addCompany').modal('hide');
        } else {
            alert(data.data); // Error message
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while submitting the form.');
    });
});






















document.querySelector('.update_more_restaurant').addEventListener('click', function() {
    const container = document.getElementById('updateRestaurantContainer');

    // Create a new restaurant entry
    const restaurantDiv = document.createElement('div');
    restaurantDiv.classList.add('update-restaurant-entry', 'row', 'position-relative');

    restaurantDiv.innerHTML = `
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Restaurant Name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="DOMO Dashboard Url">
            </div>
        </div>
        <div class="col-md-4">
            <input type="radio" name="status_${Date.now()}" value="activate">
            <label>Activate</label>
            <input type="radio" name="status_${Date.now()}" value="deactivate">
            <label>Deactivate</label>
        </div>
        <i class="fa fa-trash delete-update-restaurant"></i>
    `;

    container.appendChild(restaurantDiv);

    // Add event listener for delete button
    restaurantDiv.querySelector('.delete-update-restaurant').addEventListener('click', function() {
        container.removeChild(restaurantDiv);
    });
});
</script>

<script>
function setDeleteCompanyData(company_id, company_name) {
    document.querySelector('.category_name').textContent = company_name;

    var url = '<?= base_url('Dashboard/deactivate_company/'); ?>' + company_id;

    document.querySelector('.btn-success').setAttribute('onclick', 'deactivateCompany(' + company_id + ')');
}

function deactivateCompany(company_id) {
    // console.log(company_id)
    $.ajax({
        url: '<?= base_url('Dashboard/deactivate_company/'); ?>' + company_id,
        type: 'POST',
        success: function(response) {
            $('#deleteCompany').modal('hide');


            location.reload(); 
             },
        error: function(error) {
            alert('There was an error deactivating the company. Please try again.');
        }
    });
}

$(document).ready(function() {
    // Close the modal when clicking outside it
    $(document).on('click', function (event) {
        if (!$(event.target).closest('#deleteCompany').length && !$(event.target).closest('.deleteText').length) {
            $('#deleteCompany').modal('hide');
        }
    });
});

</script>


<script>


$(document).on('click', '.editText', function () {
    var companyId = $(this).data('company-id'); // Get the company ID from the data attribute
    console.log("Company ID:", companyId); // Debugging: Check the company ID

    // Fetch company details
    $.ajax({
        url: '<?= base_url("Dashboard/get_company_details"); ?>',  
        type: 'GET',
        data: { company_id: companyId },
        success: function(response) {
            var data = JSON.parse(response); // Parse the JSON response

            var company = data.company; // Company data
            var restaurants = data.restaurants; // Restaurant data

            // Populate the company fields in the edit modal
            $('#editCompName').val(company.company_name);
            $('#editCompEmail').val(company.company_email);
            $('#editCompPhone').val(company.company_phone);
            $('#editCompCountry').val(company.company_country_id);

            // Clear the restaurant container before populating
            $('#updateRestaurantContainer').empty();

            // Populate the restaurant fields
            if (restaurants && restaurants.length > 0) {
                $.each(restaurants, function(index, restaurant) {
                    var isActive = restaurant.is_published == 1;
                    var restaurantHtml = `
                        <div class="restaurant-entry row position-relative" data-restaurant-id="${restaurant.comp_restaurant_id}">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="restaurant_name[]" class="form-control" placeholder="Restaurant Name" value="${restaurant.restaurant_name}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="restaurant_url[]" class="form-control" placeholder="DOMO Dashboard Url" value="${restaurant.restaurant_url}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="restaurant_status_${index}" value="activate" ${isActive ? 'checked' : ''} required>
                                <label>Activate</label>
                                <input type="radio" name="restaurant_status_${index}" value="deactivate" ${!isActive ? 'checked' : ''} required>
                                <label>Deactivate</label>
                            </div>
                            <i class="fa fa-trash delete-update-restaurant" title="Delete Restaurant"></i>
                        </div>
                    `;
                    $('#updateRestaurantContainer').append(restaurantHtml);
                });
            } else {
                $('#updateRestaurantContainer').html('<p>No restaurants found for this company.</p>');
            }

            // Show the edit modal
            $('#editCompany').modal('show');

            // Make sure companyId is available when submitting the form
            $('#editCompanyForm').data('companyId', companyId); // Store the companyId on the form element
        },
        error: function(error) {
            console.error('Error fetching company details:', error);
            alert('An error occurred while fetching company details. Please try again.');
        }
    });
});

// Form submission with companyId
$('#editCompanyForm').submit(function(e) {
    e.preventDefault(); // Prevent default form submission

    var companyId = $(this).data('companyId'); // Retrieve companyId from the form data
    if (!companyId) {
        alert("Company ID is missing");
        return;
    }

    var formData = $(this).serialize(); // Serialize the form data

    // Collect restaurant data
    var restaurants = [];
    $('.restaurant-entry').each(function(index) {
        var restaurantName = $(this).find('input[name="restaurant_name[]"]').val();
        var restaurantUrl = $(this).find('input[name="restaurant_url[]"]').val();
        var restaurantStatus = $(this).find('input[name="restaurant_status_' + index + '"]:checked').val();
        var restaurantId = $(this).data('restaurant-id') || null; // Use the restaurant ID if it exists, else null


        if (restaurantName && restaurantUrl) {
            restaurants.push({
                id: restaurantId, // Use restaurant_id if exists (for updating existing restaurants)
                name: restaurantName,
                url: restaurantUrl,
                status: restaurantStatus
            });
        }
    });

    formData += '&restaurants=' + JSON.stringify(restaurants); // Add the restaurant data to the form data
    formData += '&company_id=' + companyId; // Add the company ID to the form data

    // Perform the AJAX call to submit the data
    console.log(formData); // Log form data to check its structure

    $.ajax({
        url: '<?= base_url("Dashboard/edit_customer"); ?>',
        type: 'POST',
        data: formData,
        success: function(response) {
            var data = JSON.parse(response); // Assuming JSON response

            if (data.status == 'success') {
                // Show success message
                // alert('Company and restaurants updated successfully!');
                location.reload(); // Reload page to reflect changes
            } else {
                // Show error message
                alert('Error updating company and restaurants.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error in updating company and restaurants:', error);
            alert('An error occurred. Please try again.');
        }
    });
});






$(document).on('click', '.delete-update-restaurant', function() {
    var restaurantEntry = $(this).closest('.restaurant-entry');
    var restaurantId = restaurantEntry.data('restaurant-id');  // Get the restaurant_id
  if (confirm('Are you sure you want to deactivate this restaurant?')) {
        // Send an AJAX request to deactivate the restaurant
        $.ajax({
            url: '<?= base_url("Dashboard/deactivate_restaurant"); ?>', // Backend URL
            type: 'POST',
            data: { 
                restaurant_id: restaurantId // Send restaurant_id to the backend
            },
            success: function(response) {
                var data = JSON.parse(response);

                if (data.status === 'success') {
                    // Remove the restaurant from the UI
                    restaurantEntry.remove();
                    alert('Restaurant deactivated successfully!');
                } else {
                    alert('Error deactivating restaurant. Please try again.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error deactivating restaurant:', error);
                alert('An error occurred. Please try again.');
            }
        });
    }
});










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
