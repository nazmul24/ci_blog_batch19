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
                        <th>Comments ID</th>
                        <th>Name</th>
                        <th>Comments</th>
                        <th>Publication Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php
                    foreach ($all_comments as $v_comments)
                    {
                    ?>
                    <tr>
                        <td><?php echo $v_comments->comments_id;?></td>
                        <td class="center"><?php echo $v_comments->comments_author_name;?></td>
                        <td class="center"><?php echo $v_comments->comments;?></td>
                        <td class="center">
                            <?php if($v_comments->publication_status == 1) { ?>
                            <span class="label label-success">Published</span>
                            <?php }else{?>
                            <span class="label label-warning">Unpublished</span>
                            <?php } ?>
                        </td>
                        <td class="center">
                            <?php if($v_comments->publication_status == 1) { ?>
                            <a class="btn btn-success" href="<?php echo base_url(); ?>Super_Admin/unpublished_comments/<?php echo $v_comments->comments_id; ?>" title="Unpublished">
                                <i class="halflings-icon white arrow-down"></i>  
                            </a>
                            <?php }else{?>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Super_Admin/published_comments/<?php echo $v_comments->comments_id; ?>" title="Published">
                                <i class="halflings-icon white arrow-up"></i>  
                            </a>
                            <?php } ?>
                            
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->

