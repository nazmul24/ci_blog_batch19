<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i> 
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Forms</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h2 style="color: green">
            <?php
            $message = $this->session->userdata('message');
            if ($message) {
                echo $message;
                $this->session->unset_userdata('message');
            }
            ?>
        </h2>
        <div class="box-content">
            <form name="edit_blog_form" class="form-horizontal" action="<?php echo base_url()?>Super_Admin/update_blog" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Blog Title </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $blog_info->blog_title?>" name="blog_title" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">                            
                            <input type="hidden" value="<?php echo $blog_info->blog_id?>" name="blog_id" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">                            
                        </div>
                    </div>                   
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Category Name</label>
                        <div class="controls">
                            <select id="selectError3" name="category_id">
                                <option value="">Select Category....</option>
                                <?php 
                                foreach ($all_published_category as $v_category)
                                {
                                ?>
                                <option value="<?php echo $v_category->category_id?>"><?php echo $v_category->category_name?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                              
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Blog Short Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="blog_short_description" id="textarea2" rows="3"><?php echo $blog_info->blog_short_description?></textarea>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Blog Long Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="blog_long_description" id="textarea2" rows="3"><?php echo $blog_info->blog_long_description?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="fileInput">Blog Image</label>
                        <div class="controls">
                            <input class="input-file uniform_on" name="blog_image" id="fileInput" type="file">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status</label>
                        <div class="controls">
                            <select id="selectError3" name="publication_status">
                                <option value="">Select Options</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>                 
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->

<script>
    document.forms['edit_blog_form'].elements['category_id'].value =<?php echo $blog_info->category_id; ?>;
    document.forms['edit_blog_form'].elements['publication_status'].value =<?php echo $blog_info->publication_status; ?>
</script>