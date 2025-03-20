<style type="text/css">
@media only screen and (max-width : 740px) {
    #example {
        overflow-x: scroll;
        max-width: 50%;
        display: block;
    }
}
</style>
<!-- start:wrapper -->
<div id="wrapper">

    <?php include('menu.php');?>
    <div class="content-page">
        <div class="content">
        <div class="container-fluid  content-outer">
                <div class="row">
                <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <ol class="breadcrumb float-left">
                                <li class="breadcrumb-item font-weight-bold">Blogs</li>
                                <li class="breadcrumb-item active font-weight-bold">Edit Blog</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- start:main -->
            <div class="container-fluid content-inner">
                <div id="main">
                    
                    <!-- start:dynamic data table -->
                    <div class="row">
                        <div class="col-lg-12 px-1">
                            <section class="panel">
                            <?php 
                            $success_message = $this->session->flashdata('success_message');
                            if($success_message) {
                                echo $success_message;
                            } 
                            $this->session->unset_userdata('success_message');
                            ?>
                                <?php $error_message = $this->session->flashdata('error_message');
                        if($error_message){ echo $error_message; }  ?>
                                <form id="editBlog" action="<?php echo base_url();?>Dashboard/updateBlog" method="post"
                                    enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-9 col-xs-12">

                                            <div class="row">
                                                <div class="col-lg-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="blogTitle">Blog Title</label>
                                                        <input type="text" name="blogTitle" class="form-control"
                                                            id="blogTitle" value="<?php echo $blog[0]->blog_title;?>"
                                                            onkeyup="copyUrl();">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="blogUrl">Blog Url</label>
                                                        <input type="text" name="blogUrl" class="form-control"
                                                            value="<?php echo $blog[0]->blog_url;?>" id="blogUrl">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="blogUrl">Blog Seo Description</label>
                                                        <input type="text" name="blogSeoDesp" class="form-control"
                                                            value="<?php echo $blog[0]->seo_description;?>"
                                                            id="blogSeoDesp">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="blogUrl">Description</label>
                                                        <textarea name="blogDescription" class="form-control"
                                                            id="blogDescription"><?php echo $blog[0]->blog_description;?> </textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-3 col-xs-12">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select class="form-control" name="blogCategory" id="blogCategory"">
                                        <?php if($category){ ?>
                                            <?php foreach ($category as $categorys){
                                                if($blog[0]->category_id==$categorys->category_id){
                                                    $status='selected';
                                                }else{
                                                    $status='';
                                                }
                                                ?>
                                                <option value=" <?php echo $categorys->category_id ;?>"
                                                    <?php echo $status;?>><?php echo $categorys->category_name ;?>
                                                    </option>
                                                    <?php } }else{ ?>
                                                    <option value="">No Category</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="blogPublish" id="blogPublish">
                                                    <option value="<?php echo DRAFT;?>"
                                                        <?php if($blog[0]->is_active==2){ echo "selected";}?>>Draft
                                                    </option>
                                                    <option value="<?php echo ACTIVATE;?>"
                                                        <?php if($blog[0]->is_active==1){ echo "selected";}?>>Publish
                                                    </option>
                                                </select>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label>Comment Show</label>
                                                <select class="form-control" name="commentPublish" id="commentPublish">
                                                    <option value="<?php echo DRAFT;?>"
                                                        <?php if($blog[0]->comment_publish==2){ echo "selected";}?>>
                                                        Draft
                                                    </option>
                                                    <option value="<?php echo ACTIVATE;?>"
                                                        <?php if($blog[0]->comment_publish==1){ echo "selected";}?>>
                                                        Publish
                                                    </option>

                                                </select>
                                            </div> -->
                                            <div class="form-group">
                                                <label>Upload File</label>
                                                <input type="file" name="blogFile" class="add-file" id="blogFile"
                                                    accept="image/x-png,image/gif,image/jpeg" onchange="previewImage()"
                                                    style="width: 100%">
                                                <?php
                                    if($blog[0]->blog_image){
                                        $blog_image=IMAGE_BLOG_PATH.$blog[0]->blog_image;
                                        $display='block';
                                    }else{
                                        $blog_image='';
                                         $display='none';
                                    }
                                    ?>
                                                <img src="<?php echo $blog_image;?>" id="blogImage" width="50%"
                                                    height="50%"
                                                    style="display: <?php echo $display;?>;margin-top: 5%;">
                                            </div>
                                            <div class="form-group">
                                                <span class="add_error"></span>
                                                <button type="button" name="cancel" class="btn btn-danger" id="cancel"
                                                    onclick="cancelBlog();">Cancel</button>
                                                <button type="submit" name="submit" class="btn primaryBtn mb-2 mb-md-auto btn-color-hover"
                                                    id="submit">Update<span class="add_fa_spin_icon"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </section>
                        </div>
                    </div>
                    <!-- end:dynamic data table -->

                </div>
            </div>
            <!-- end:main -->

        </div>
    </div>


</div>


<!--on ready calls-->
<script>
var controller = 'Dashboard';
var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function ?>';

$(document).ready(function(){
    setTimeout(function() {
    $('.blogUrlAlredy').hide()
}, 4000);
});
$(document).ready(function(){
    setTimeout(function() {
    $('.blogWrong').hide()
}, 4000);
});
$(document).ready(function(){
    setTimeout(function() {
    $('.blogUpdatedSuccess').hide()
}, 4000);
});

/*Ck Editor */
$(document).ready(function() {
    CKEDITOR.replace('blogDescription');
    $('#blogDescription').ckeditor();
});

/*Cancel Button*/
function cancelBlog() {
    window.location.reload();
}

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