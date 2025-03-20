<style type="text/css">
@media only screen and (max-width : 740px) {
    #example {
        overflow-x: scroll;
        max-width: 100%;
        display: block;
    }
}
</style>
<!-- start:wrapper -->
<?php include('menu.php');?>
<div class="content-page">
    <div class="content">
        <div id="main">
            <div class="container-fluid  content-outer">
                <div class="row">
                    <div class="col-xl-12 mb-3 px-md-0">
                        <div class="breadcrumb-holder pl-0">
                            <ol class="breadcrumb float-left">
                                <li class="breadcrumb-item font-weight-bold">Blogs</li>
                                <li class="breadcrumb-item active font-weight-bold">Category</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid content-inner content-inner-w px-3 mb-3">
                <!-- start:dynamic data table -->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="adv-table">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                            <button class="btn primaryBtn mb-2 mb-md-auto btn-color-hover" style="margin-top: 25px"
                                                data-toggle="modal" data-target="#addCategory">
                                                <i class="fa fa-plus" aria-hidden="true"></i> Add Category
                                            </button>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                                            <div class="form-group">
                                            <label for="exampleInputPassword1" class="mb-0">Search</label>
                                                <input type="text" placeholder="Search by Category Name"
                                                    name="searchData" id="searchData" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-7 col-lg-3 col-xl-3 add-btn-new btn-searchclear" style="margin-top: 25px">
                                            <button type="button" title="Search" onclick="all_category();"
                                                class="btn btn-suggestEdit"><i class="fa fa-search text-white"></i>
                                            </button>
                                            <button type="button" title="Clear" onclick="cancelSearch()"
                                                class="btn btn-danger btn-admin-search ml-1 searchkeyword">Clear</button>
                                        </div>
                                        <div class="col-12 col-md-5 col-lg-3 col-xl-2 ml-auto">
                                            <div class="form-group">
                                                <label class="mb-0 d-none d-md-inline-block position-ab">Show Per
                                                    Page</label>
                                                <select class="form-control" name="limit" id="limit"
                                                    onchange="allBlogs();">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                    <option value="150">150</option>
                                                    <option value="200">200</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered bg-white table-hover" id="example">
                            <thead>
                                <tr>
                                    <th>SL. NO</th>
                                    <th>CATEGORY NAME</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody class="allCategory">

                            </tbody>
                        </table>
                        <div id="pagination"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- end:main -->
<!-- add new Category-->
<div class="modal fade custom-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="modal_add_user" aria-hidden="true" id="addCategory">
    <div class="modal-dialog modal-lg h-auto">
        <div class="modal-content modal-content-customize">
            <div class="modal-header">
                <h5 class="modal-title p-2">Add Category</h5>
                <button type="button" class="close modal_close_btn" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addCategoryForm">
                    <div class="row">
                        <div class="col-12">
                            <span style="color: red" class="add_error"></span>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Category Name<a style="color: red">*</a></label>
                                <input type="text" name="categoryName" maxlength="32" required class="form-control"
                                    id="exampleInputPassword1" value="">
                            </div>
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
<!--End add new Category-->
<div class="modal fade custom-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="modal_add_user" aria-hidden="true" id="editCategory">
    <div class="modal-dialog modal-lg h-auto">
        <div class="modal-content modal-content-customize">
            <div class="modal-header">
                <h5 class="modal-title p-2">Edit Category</h5>
                <button type="button" class="close modal_close_btn" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editCategoryForm">
                    <div class="col-sm-12 col-xs-12">
                        <span style="color: red" class="update_error"></span>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category Name<a style="color: red">*</a></label>
                            <input type="hidden" name="categoryId" required class="form-control categoryId"
                                id="exampleInputPassword1" value="">
                            <input type="text" name="categoryName" maxlength="32" required
                                class="form-control categoryName" id="exampleInputPassword1" value="">
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-12" style="margin-top: 3%">

                        <button type="submit" id="submit" class="btn update_button" style="float: right;"> <i
                                class="fa fa-pencil-square-o" aria-hidden="true"></i> Update<span
                                class="update_fa_spin_icon"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--delete Category-->
<div class="modal fade custom-modal" id="deleteCategory" data-backdrop="static" data-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="modal_add_user" aria-hidden="true">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content modal-content-customize">
            <div class="modal-header header-delete modal_header-blue">
                <h5 class="modal-title p-2">Edit Category</h5>
                <button type="button" class="close close_model" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background: none;">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <span style="color: red" class="update_error"></span>
                            <div class="col-12 d-flex justify-content-center">
                                <h4 class="text-center">Are you sure, you want to delete <b class="category_name"></b>
                                    category?</h4>
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
<!--on ready calls-->
<script type="text/javascript">
var controller = 'Dashboard';
var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function ?>';

var page = 1;

function all_category() {

    limit = $('#limit').val();
    searchData = $('#searchData').val();

    $.ajax({
        'url': base_url + controller + '/allCategory/',
        'type': 'POST', //the way you want to send data to your URL
        'dataType': "json",
        data: {
            'limit': limit,
            'searchData': searchData,
        },
        'success': function(data) { //probably this request will return anything, it'll be put in var "data"
            if (data.status == 200) {
                $('#pagination').html(data.pagination);
                $('.allCategory').html(data.data);
                document.getElementById("main_body").style.pointerEvents = 'all';
                $("#example").DataTable({
                    "bDestroy": true,
                    "aaSorting": [
                        [1, "desc"]
                    ]
                });
            }
        }
    });
}
all_category();
/*add Category*/
$("#addCategoryForm").on('submit', function(e) {
    $('.add_error').html('');

    $('.add_fa_spin_icon').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>\n');
    $(".add_button").attr("disabled", true);
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: base_url + controller + '/addCategory',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        'dataType': "json",
        success: function(data) {
            if (data.status == 200) {

                show_snackbar(data.data);
                setTimeout(function() {
                    location.reload();
                }, 500);
            } else {
                $('.add_error').html(data.data);
                $('.add_fa_spin_icon').html('');
                $(".add_button").attr("disabled", false);
            }
        }
    });
});

/*update Department*/
$("#editCategoryForm").on('submit', function(e) {
    $('.update_error').html('');
    $('.update_fa_spin_icon').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>\n');
    $(".update_button").attr("disabled", true);
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: base_url + controller + '/updateCategory',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        'dataType': "json",
        success: function(data) {
            if (data.status == 200) {

                show_snackbar(data.data);
                setTimeout(function() {
                    location.reload();
                }, 500);
            } else {
                $('.update_error').html(data.data);
                $('.update_fa_spin_icon').html('');
                $(".update_button").attr("disabled", false);
            }
        }
    });
});

/*set category id in input box for edit*/
function editCategory(id) {

    $.ajax({
        'url': base_url + controller + '/editCategory/',
        'type': 'POST', //the way you want to send data to your URL
        'dataType': "json",
        data: 'categoryId=' + id,
        'success': function(data) { //probably this request will return anything, it'll be put in var "data"
            if (data.status == 200) {
                $('.categoryId').val(data.data[0].category_id);
                $('.categoryName').val(data.data[0].category_name);

            } else {
                show_snackbar_error(data.data);
            }
        }
    });
}

/*Remove Category*/
function delete_blog_category_alert(category_id) {
    get_category_id = category_id;
    $.ajax({
        'url': base_url + controller + '/delete_blog_category_alert/' + category_id,
        'type': 'POST', //the way you want to send data to your URL
        'dataType': "json",
        'success': function(data) { //probably this request will return anything, it'll be put in var "data"
            $('.category_name').html(data);
        }
    });
}

/*Remove Category*/
function removeCategory() {
    $.ajax({
        'url': base_url + controller + '/removeCategory/',
        'type': 'POST', //the way you want to send data to your URL
        'dataType': "json",
        data: 'categoryId=' + get_category_id,
        'success': function(data) { //probably this request will return anything, it'll be put in var "data"
            if (data.status == 200) {

                show_snackbar(data.data);
                $('.close_model').click();
                all_category();

            } else {
                show_snackbar_error(data.data);
            }

        }
    });
}

function cancelSearch() {
    page = 1;
    $('#searchData').val('');
    all_category();
}
</script>