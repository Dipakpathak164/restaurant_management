<style type="text/css">
@media only screen and (max-width : 740px) {
    #example {
        overflow-x: scroll;
        max-width: 50%;
        display: block;
    }
}
</style>
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
                                <li class="breadcrumb-item active font-weight-bold">Add New Blog</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid content-inner content-inner-w px-3 mb-3">
            <?php $error_message = $this->session->flashdata('error_message');
                        if($error_message){ echo $error_message; }  ?>
                    <form id="newBlogAdd" action="<?php echo base_url();?>dashboard/addBlog" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-9 col-xs-12">

                                <div class="row">
                                    <div class="col-lg-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="blogTitle">Blog Title</label>
                                            <input type="text" name="blogTitle" class="form-control" id="blogTitle"
                                                onkeyup="copyUrl();">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="blogUrl">Blog Url</label>
                                            <input type="text" name="blogUrl" class="form-control" id="blogUrl">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="blogUrl">Blog Seo Description</label>
                                            <input type="text" name="blogSeoDesp" class="form-control" id="blogSeoDesp">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="blogUrl">Description</label>
                                            <textarea name="blogDescription" class="form-control"
                                                id="blogDescription"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-3 col-xs-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="blogCategory" id="blogCategory">
                                        <?php if($category){ ?>
                                        <?php foreach ($category as $categorys){ ?>
                                        <option value="<?php echo $categorys->category_id ;?>">
                                            <?php echo $categorys->category_name ;?></option>
                                        <?php } }else{ ?>
                                        <option value="">No Category</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="blogPublish" id="blogPublish">
                                       <option value="<?php echo ACTIVATE;?>">Publish</option>
                                        <option value="<?php echo DRAFT;?>">Draft</option>
                                    </select>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Comment Show</label>
                                    <select class="form-control" name="commentPublish" id="commentPublish">
                                        <option value="<?php echo DRAFT;?>">No</option>
                                        <option value="<?php echo ACTIVATE;?>">Yes</option>
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label>Upload Image</label> <br>
                                    <p class="mb-0">Dimensions</p>
                                    
                                    <input type="file" name="blogFile" class="add-file" id="blogFile"
                                        accept="image/x-png,image/gif,image/jpeg" onchange="previewImage()"
                                        style="width: 100%">
                                    <img src="" id="blogImage" width="50%" height="50%"
                                        style="display: none;margin-top: 5%;">
                                </div>
                                <div class="form-group">
                                    <span class="add_error"></span>
                                    <button type="button" name="cancel" class="btn btn-danger" id="cancel"
                                        onclick="cancelBlog();">Cancel</button>
                                    <button type="submit" name="submit" class="btn btn-success add_button"
                                        id="submit">Save<span class="add_fa_spin_icon"></span></button>
                                </div>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</div>






<!--on ready calls-->
<script>
var controller = 'Admin';
var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function ?>';

/*Ck Editor */
$(document).ready(function() {
    CKEDITOR.replace('blogDescription');
    $('#blogDescription').ckeditor();
});

/*Cancel Button*/
function cancelBlog() {
    window.location.reload();
}

/*Copy url per title*/
var finalUrl = '';

function copyUrl() {
    var blogTitle = $('#blogTitle').val();
    if (blogTitle != '') {
        var finalUrl = base_url + blogTitle;
        var urls = blogTitle.replace(/\s+/g, '-');
        var finalUrl = urls;
    } else {
        var finalUrl = '';
        finalUrl = '';
    }
    $('#blogUrl').val(finalUrl);
}


function previewImage() {
    $('#blogImage').css('display', 'block');
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("blogFile").files[0]);
    oFReader.onload = function(oFREvent) {
        document.getElementById("blogImage").src = oFREvent.target.result;
    };
}
</script>