<?php include('menu.php');?>

<div class="content-page">

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid  content-outer">
            <div class="row">
                <div class="col-xl-12 px-md-0 d-flex justify-content-between align-items-center mb-3">
                    <div class="pl-md-0">
                        <h1 class="main-title float-left">All Users</h1>
                    </div>
                    <button data-toggle="modal" data-target="#addUser" class="btn">
                        <i class="fa fa-plus"></i> Add User
                    </button>
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
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <!-- <th>DOMO URL</th> -->
                                        <th>Status</th>
                                        <th>Update On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                           
                                <?php if (empty($users)): ?>
                    <tr>
                        <td colspan="9">No Users found.</td>
                    </tr>
                <?php else: ?>
                   
                    <?php foreach ($users as $user): ?>
                                <tbody class="text-center">
                                    <tr>
                                        <!-- <td><?= $user['first_name']; ?></td> -->
                                        <!-- <td>Users</td> -->
                                        <td><?= $user['first_name']; ?></td>
                                        <td>
                                        <?= $user['phone']; ?>
                                        </td>
                                        <td><?= $user['email']; ?></td>
                                    
                                        <td class="<?= $user['active'] == 1 ? 'text-success' : 'text-danger'; ?>">
    <b><?= $user['active'] == 1 ? 'Enabled' : 'Disabled'; ?></b>
</td>

                                        <td>
                                        <?= date('Y-m-d ', $user['created_on']); ?>
                                        </td>
                                        <td>
                                            <!-- <span data-toggle="modal" data-target="#resetPassword"
                                                class="icon-edit-delete editText cursor-pointer">
                                                <i class="fas fa-key text-success" title="Reset Password"></i>
                                            </span>&nbsp; -->
                                            <span data-toggle="modal" data-target="#editUser" title="Edit User" class="icon-edit-delete editText" data-user-id="<?= $user['id']; ?>">
    <i class="fas fa-pencil-alt" title="Edit User"></i>
</span>&nbsp;
                                            <span class="icon-edit-delete deleteText">
                    <i class="fas fa-ban text-danger cursor-pointer" 
                       title="Disable User" 
                       data-toggle="modal" 
                       data-target="#deleteUser"
                       onclick="setDeleteUserData(<?= $user['id']; ?>, '<?= $user['first_name']; ?>')">
                    </i>
                </span>
                                        </td>
                                    </tr>
                                   
                                    <?php endforeach; ?>
                <?php endif; ?>
                                </tbody>
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

<!-- Add Users -->
<div class="modal fade custom-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="modal_add_user" aria-hidden="true" id="addUser">
    <div class="modal-dialog modal-lg h-auto">
        <div class="modal-content modal-content-customize">
            <div class="modal-header">
                <h5 class="modal-title p-2">Add User</h5>
                <button type="button" class="close modal_close_btn" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="addCategoryForm"  action="<?php echo base_url('Dashboard/add_user'); ?>" method="POST" >
    <div class="row">
    <div class="col-md-6">
                            <span style="color: red" class="add_error"></span>
                            <div class="form-group">
                                <label>First Name<a style="color: red">*</a></label>
                                <input type="text" name="f_name" maxlength="32" required class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name<a style="color: red">*</a></label>
                                <input type="text" name="l_name" maxlength="32" required class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email<a style="color: red">*</a></label>
                                <input type="text" name="email" maxlength="32" required class="form-control"
                                    id="exampleInputPassword1" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone<a style="color: red">*</a></label>
                                <input type="text" name="phone" maxlength="32" required class="form-control"
                                    id="exampleInputPassword1" value="">
                            </div>
                        </div>
                       

       
        <div class="col-md-6">
    <div class="form-group">
        <label for="restaurant_id">Select Restaurant<a style="color: red">*</a></label>
        <select name="restaurant" id="restaurant_id" class="form-control" required>
            <option value="">Please select a restaurant</option>
        </select>
    </div>
</div>
<div class="col-md-6">
                            <!-- <div class="form-group">
                                <label>Domo Url</label>
                                <input type="text" name="url" maxlength="32" required class="form-control"
                                    id="exampleInputPassword1" value="">
                            </div> -->
                        </div>


     

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




<!-- Edit User Modal -->
<div class="modal fade custom-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="modal_add_user" aria-hidden="true" id="editUser">
    <div class="modal-dialog modal-lg h-auto">
        <div class="modal-content modal-content-customize">
            <div class="modal-header">
                <h5 class="modal-title p-2">Edit User</h5>
                <button type="button" class="close modal_close_btn" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" action="<?php echo base_url('Dashboard/edit_user'); ?>" method="POST">
                    <input type="hidden" name="user_id" id="edit_user_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name<a style="color: red">*</a></label>
                                <input type="text" name="first_name" id="edit_first_name" maxlength="32" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name<a style="color: red">*</a></label>
                                <input type="text" name="last_name" id="edit_last_name" maxlength="32" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email<a style="color: red">*</a></label>
                                <input type="text" name="email" id="edit_email" maxlength="32" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone<a style="color: red">*</a></label>
                                <input type="text" name="phone" id="edit_phone" maxlength="32" required class="form-control">
                            </div>
                        </div>
                        
                       
                        
                        <div class="col-12" style="margin-top:3%">
                            <button type="submit" id="submit" class="btn add_button" style="float: right;">
                                <i class="fa fa-sync pr-2" aria-hidden="true"></i>
                                Update<span class="add_fa_spin_icon"></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--delete User-->
<div class="modal fade custom-modal" id="deleteUser" data-backdrop="static" data-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="modal_add_user" aria-hidden="true">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content modal-content-customize">
            <div class="modal-header header-delete modal_header-blue">
                <h5 class="modal-title p-2">Delete User</h5>
                <button type="button" class="close close_model" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background: none;">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <span style="color: red" class="update_error"></span>
                            <div class="col-12 d-flex justify-content-center">
                                <h4 class="text-center">Are you sure, you want to delete <b class="category_name"></b>
                                    user?</h4>
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

<!-- Reset Password -->
<div class="modal fade custom-modal" id="resetPassword" data-backdrop="static" data-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="modal_add_user" aria-hidden="true">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content modal-content-customize">
            <div class="modal-header header-delete modal_header-blue">
                <h5 class="modal-title p-2">Reset Password</h5>
                <button type="button" class="close close_model" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background: none;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>New Password<a style="color: red">*</a></label>
                            <input type="text" name="" required class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Confirm Password<a style="color: red">*</a></label>
                            <input type="text" name="" required class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="button" class="btn  add_button"><i class="fa fa-lock pr-2" aria-hidden="true"></i>
                            Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Disable User-->
<div class="modal fade custom-modal" id="deleteUser" data-backdrop="static" data-keyboard="false" tabindex="-1"
     role="dialog" aria-labelledby="modal_add_user" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content modal-content-customize">
            <div class="modal-header header-delete modal_header-blue">
                <h5 class="modal-title p-2">Delete User</h5>
                <button type="button" class="close close_model" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background: none;">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <span style="color: red" class="update_error"></span>
                            <div class="col-12 d-flex justify-content-center">
                                <h4 class="text-center">Are you sure, you want to deactivate <b class="category_name"></b>
                                    user?</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="button" onclick="deactivateUser();" class="btn btn-success btn-gradient-blue">Yes</button>
                        <button type="button" class="btn btn-danger role_close" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // Get elements For Add User Restaurant Selection
    const selectBox = document.getElementById("select-box");
    const optionsList = document.getElementById("options-list");
    const checkboxes = optionsList.querySelectorAll("input[type='checkbox']");
    const selectedOptionsSpan = document.getElementById("selected-options");
    const hiddenInput = document.getElementById("selectedValues");

    // Show/Hide dropdown
    selectBox.addEventListener("click", function () {
        optionsList.classList.toggle("show");
    });

    // Close dropdown when clicking outside
    document.addEventListener("click", function (event) {
        if (!event.target.closest(".custom_select")) {
            optionsList.classList.remove("show");
        }
    });

    // Update selected values
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            let selectedValues = [];
            checkboxes.forEach(cb => {
                if (cb.checked) {
                    selectedValues.push(cb.value);
                }
            });

            // Update visible text
            selectedOptionsSpan.textContent = selectedValues.length > 0 ? selectedValues.join(', ') : 'Select Restaurant';

            // Store values in hidden input
            hiddenInput.value = selectedValues.join(',');
        });
    });

    // Get elements For Edit User Restaurant Selection
    const EditselectBox = document.getElementById("edit-select-box");
    const EditoptionsList = document.getElementById("edit-options-list");
    const ediCheckboxes = EditoptionsList.querySelectorAll("input[type='checkbox']");
    const EditSelectedOptionsSpan = document.getElementById("edit-selected-options");
    const EditHiddenInput = document.getElementById("editSelectedValues");

    // Show/Hide dropdown for Edit
    EditselectBox.addEventListener("click", function () {
        EditoptionsList.classList.toggle("show");
    });

    // Close dropdown when clicking outside
    document.addEventListener("click", function (event) {
        if (!event.target.closest(".custom--select")) {
            EditoptionsList.classList.remove("show");
        }
    });

    // Update selected values for Edit
    ediCheckboxes.forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            let editSelectedValues = [];
            ediCheckboxes.forEach(cb => {
                if (cb.checked) {
                    editSelectedValues.push(cb.value);
                }
            });

            // FIXED: Use correct variable editSelectedValues instead of selectedValues
            EditSelectedOptionsSpan.textContent = editSelectedValues.length > 0 ? editSelectedValues.join(', ') : 'Select Restaurant';

            // Store values in hidden input
            EditHiddenInput.value = editSelectedValues.join(',');
        });
    });
</script>

<script>
$('#company_id').change(function() {
    var company_id = $(this).val();
    console.log('Company ID selected: ' + company_id); // Check selected value
    if (company_id) {
        $.ajax({
            url: "<?= base_url('Dashboard/get_restaurants'); ?>",
            type: "POST",
            data: { company_id: company_id },
            success: function(response) {
                var data = JSON.parse(response);
                var restaurantSelect = $('#restaurant_id');
                restaurantSelect.empty(); // Clear the current options

                // Add a default "Please select" option
                restaurantSelect.append('<option value="">Please select a restaurant</option>');

                if (data.length > 0) {
                    // Populate the restaurant dropdown with fetched data
                    data.forEach(function(restaurant) {
                        restaurantSelect.append('<option value="' + restaurant.restaurant_id + '">' + restaurant.restaurant_name + '</option>');
                    });
                } else {
                    // Add a "No restaurants available" option if no data is found
                    restaurantSelect.append('<option value="">No restaurants available</option>');
                }
            }
        });
    } else {
        $('#restaurant_id').empty(); // Clear the restaurant list if no company selected
        $('#restaurant_id').append('<option value="">Please select a restaurant</option>');
    }
});

</script>


<script>

$(document).ready(function() {
    // Triggered when the modal is opened
    $('#addUser').on('shown.bs.modal', function() {
        // Make an Ajax request to fetch the restaurants
        $.ajax({
            url: '<?php echo base_url('Dashboard/get_restaurants'); ?>',  // URL of the controller method
            type: 'GET',  // Use GET request to fetch data
            dataType: 'json',
            success: function(response) {
                // Empty the restaurant select dropdown before adding new options
                $('#restaurant_id').empty();
                $('#restaurant_id').append('<option value="">Please select a restaurant</option>');  // Default option

                // Check if the response has data
                if (response.length > 0) {
                    // Loop through the response array and append each restaurant to the dropdown
                    $.each(response, function(index, restaurant) {
                        $('#restaurant_id').append('<option value="' + restaurant.restaurant_details_id + '">' + restaurant.restaurant_name + '</option>');
                    });
                } else {
                    // If no restaurants found, show a message in the dropdown
                    $('#restaurant_id').append('<option value="">No restaurants found</option>');
                }
            },
            error: function() {
                // Handle any errors (e.g., network issues)
                alert('Error fetching restaurants.');
            }
        });
    });
});

function setDeleteUserData(user_id, user_name) {

    document.querySelector('.category_name').textContent = user_name;


    var url = '<?= base_url('Dashboard/deactivate_user/'); ?>' + user_id;
    document.querySelector('.btn-success').setAttribute('onclick', 'deactivateUser(' + user_id + ')');
}


function deactivateUser(user_id) {
    console.log("Deactivating User ID: " + user_id);
    $.ajax({
        url: '<?= base_url('Dashboard/deactivate_user/'); ?>' + user_id,
        type: 'POST',
        success: function(response) {
            $('#deleteUser').modal('hide');
            
            location.reload();  
            
        },
        error: function(error) {
            alert('There was an error deactivating the user. Please try again.');
        }
    });
}

$(document).ready(function() {
    $(document).on('click', function (event) {
        if (!$(event.target).closest('#deleteUser').length && !$(event.target).closest('.deleteText').length) {
            $('#deleteUser').modal('hide');
        }
    });
});


$(document).ready(function() {
    $('.editText').on('click', function() {
        var user_id = $(this).data('user-id'); // Get user ID from data attribute

        $.ajax({
            url: '<?= base_url('Dashboard/get_user_by_id'); ?>',
            type: 'GET',
            data: { user_id: user_id },
            success: function(response) {
                var user_data = JSON.parse(response); // Parse the returned user data

                // Set form fields based on user data
                $('#edit_user_id').val(user_data.id);
                $('#edit_first_name').val(user_data.first_name);
                $('#edit_last_name').val(user_data.last_name);
                $('#edit_email').val(user_data.email);
                $('#edit_phone').val(user_data.phone);
                $('#edit_designation').val(user_data.designation);
                $('#edit_company_id').val(user_data.company_id);

                console.log(user_data.comp_restaurant_id)
                fetchRestaurants(user_data.company_id, user_data.comp_restaurant_id); // Fetch restaurants with user data's restaurant ID

                $('#editUser').modal('show'); 
            }
        });
    });

    // Function to fetch restaurants and set the selected restaurant
    function fetchRestaurants( selected_restaurant_id) {
        if (company_id) {
            $.ajax({
                url: "<?= base_url('Dashboard/get_restaurants'); ?>",
                type: "POST",
                data: { company_id: company_id },
                success: function(response) {
                    var data = JSON.parse(response);
                    var restaurantSelect = $('#edit_restaurant_id');
                    restaurantSelect.empty(); // Clear the restaurant options

                    restaurantSelect.append('<option value="">Please select a restaurant</option>'); // Default option

                    if (data.length > 0) {
                        // Populate the restaurant dropdown with fetched data
                        data.forEach(function(restaurant) {
                            var selected = (restaurant.comp_restaurant_id == selected_restaurant_id) ? 'selected' : ''; // Check if it should be selected
                            restaurantSelect.append('<option value="' + restaurant.comp_restaurant_id + '" ' + selected + '>' + restaurant.restaurant_name + '</option>');
                        });
                    } else {
                        // Add a "No restaurants available" option if no data is found
                        restaurantSelect.append('<option value="">No restaurants available</option>');
                    }
                }
            });
        } else {
            $('#edit_restaurant_id').empty(); // Clear the restaurant list if no company selected
            $('#edit_restaurant_id').append('<option value="">Please select a restaurant</option>');
        }
    }

    // Handle company change in the edit modal
    $('#edit_company_id').change(function() {
        var company_id = $(this).val();
        if (company_id) {
            fetchRestaurants(company_id); // Fetch and update restaurant options for the selected company
        } else {
            $('#edit_restaurant_id').empty(); // Clear restaurant list if no company selected
            $('#edit_restaurant_id').append('<option value="">Please select a restaurant</option>');
        }
    });

    // Handle form submission
    $('#editUserForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        var formData = $(this).serialize(); // Serialize form data

        // Debug: Check the serialized form data
        console.log(formData);

        $.ajax({
            url: '<?= base_url('Dashboard/edit_user'); ?>',
            type: 'POST',
            data: formData, 
            success: function(response) {
                $('#editUser').modal('hide'); 
            },
            error: function(error) {
                alert('There was an error updating the user. Please try again.'); // Handle error case
            }
        });
    });
});






</script>
