<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Tables</a></li>
</ul>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h2 style="color: green">
                <?php
                $message = $this->session->userdata('message');
                if ($message) {
                    echo $message;
                    $this->session->unset_userdata('message');
                }
                ?>
            </h2>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Blog ID</th>
                        <th>Blog Title</th>
                        <!--<th>Role</th>-->
                        <th>Publication Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php
                    foreach ($all_blog_category as $v_category)
                    {
                    ?>
                    <tr>
                        <td><?php echo $v_category->blog_id;?></td>
                        <td class="center"><?php echo $v_category->blog_title;?></td>
                        <!--<td class="center">Member</td>-->
                        <td class="center">
                            <?php if($v_category->publication_status == 1) { ?>
                            <span class="label label-success">Published</span>
                            <?php }else{?>
                            <span class="label label-warning">Unpublished</span>
                            <?php } ?>
                        </td>
                        <td class="center">
                            <?php if($v_category->publication_status == 1) { ?>
                            <a class="btn btn-success" href="<?php echo base_url(); ?>Super_Admin/unpublished_blog/<?php echo $v_category->blog_id; ?>" title="Unpublished">
                                <i class="halflings-icon white arrow-down"></i>  
                            </a>
                            <?php }else{?>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Super_Admin/published_blog/<?php echo $v_category->blog_id; ?>" title="Published">
                                <i class="halflings-icon white arrow-up"></i>  
                            </a>
                            <?php } ?>
                            <a class="btn btn-info" href="<?php echo base_url(); ?>Super_Admin/edit_blog/<?php echo $v_category->blog_id; ?>">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Super_Admin/delete_blog/<?php echo $v_category->blog_id; ?>" onclick="return check_delete();">
                                <i class="halflings-icon white trash"></i> 
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->

