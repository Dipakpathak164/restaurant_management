<style type="text/css">

    @media only screen and (max-width : 740px) {
        #example {
            overflow-x: scroll;
            max-width:100%;
            display: block;
        }
    }
</style>
 <?php include('menu.php');?>
<!-- start:wrapper -->
<div class="content-page">
    <!-- start:main -->
    <div class="content">
        <div id="main">
            <!-- start:breadcrumb -->
          <div class="container-fluid  content-outer">
            <div class="row">
                <div class="col-xl-12 mb-3 px-md-0">
                    <div class="breadcrumb-holder pl-0">
                        <ol class="breadcrumb float-left pl-0">
                            <li class="breadcrumb-item font-weight-semi active">
                              <a href="#">
                                Blogs
                               </a>
                           </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
          </div>
            <!-- end:breadcrumb -->
          <div class="container-fluid content-inner content-inner-w px-3 mb-3">
            <!-- start:dynamic data table -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="panel-body">

                            <div class="adv-table">
                                <div class="row">

                                    <div class="col-md-2 col-xs-12">
                                        <a href="<?php echo base_url();?>Dashboard/newBlog" title="Add New" class="btn btn-warning btn-drop" style="margin-top: 25px">Add New Blog</a>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Search</label>
                                            <input type="text"  name="searchData" id="searchData" class="form-control" onkeyup="allBlogs();" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-12" style="float: right">
                                        <div class="form-group">
                                            <label>Show Per Page</label>
                                            <select class="form-control" name="limit" id="limit" onchange="allBlogs();">
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
                                <div class="table-responsive">
                                    <table class="display table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th style="cursor: default">Sl. No</th>
                                            <th style="cursor: default">Image</th>
                                            <th style="cursor: default">Title</th>
                                            <th style="cursor: default">Author</th>
                                            <th style="cursor: default">Update Date Time</th>
                                            <th style="cursor: default">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="allList">

                                        </tbody>
                                    </table>
                                </div>
                                <div id="pagination"></div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- end:dynamic data table -->
           </div>
        </div>
    </div>
    <!-- end:main -->

</div>


<!--Blog Delete modal-->
<div class="modal custom-modal fade" id="blog_delete_modal" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title p-2">Delete Blog</h5>
            <button type="button" class="close close_model" data-dismiss="modal">×</button>     
            </div>
            <div class="modal-body" style="background: none;">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="col-lg-12 col-sm-12 col-xs-12" style="display: -webkit-box">
                                    <h4 class="text-center">Are you sure, you want to delete <b class="blog_name"></b>
                                    </h4>
                                </div>
                                <div class="col-lg-12 col-sm-6 col-xs-12" style="padding-top: 22px">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="button" onclick="removeBlog();" data-dismiss="modal"
                                                class="btn">Yes</button>
                                            <button type="button" class="close_blog btn btn-danger"
                                                data-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
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
    var page =1;

    /*Blog List*/
    function allBlogs(){
        limit=$('#limit').val();
        searchStatus=$('#searchStatus').val();
        searchData=$('#searchData').val();

        $.ajax({
            'url': base_url + controller + '/blogAjaxList/'+page,
            'type': 'POST', //the way you want to send data to your URL
            'dataType': "json",
            data:{
                'limit':limit,
                'searchStatus':searchStatus,
                'searchData':searchData,
            },
            'success': function (data) { //probably this request will return anything, it'll be put in var "data"
                if(data.status == 200) {
                    $('#pagination').html(data.pagination);
                    $('.allList').html(data.data);

                }else{
                    $('#pagination').html('');
                    $('.allList').html(data.data);
                }

            }
        });

    }
    allBlogs();
 
    /* alert for Blogs name*/
function blog_name_alert(blog_id) {
    blogId = blog_id;
    $.ajax({
        'url': base_url + controller + '/blog_name_alert/' + blog_id,
        'type': 'POST', //the way you want to send data to your URL
        'dataType': "json",
        'success': function(data) { //probably this request will return anything, it'll be put in var "data"
            $('.blog_name').html(data);
        }
    });
}

/*Remove Blog*/
function removeBlog() {
    var closeModal = document.querySelector(".close_blog");
    $.ajax({
        'url': base_url + controller + '/removeBlog/',
        'type': 'POST', //the way you want to send data to your URL
        'dataType': "json",
        data: 'blog_id=' + blogId,
        'success': function(data) { //probably this request will return anything, it'll be put in var "data"
            if (data.status == 200) {
                show_snackbar(data.data);
                allBlogs();
                closeModal.click();
            } else {
                show_snackbar_error(data.data);
            }
        }
    });
}


    /*Blog Pagination */
    $(document).on("click", ".pagination li a", function(event){
        event.preventDefault();
        page = $(this).data("ci-pagination-page");
        allBlogs();
    });
</script>

