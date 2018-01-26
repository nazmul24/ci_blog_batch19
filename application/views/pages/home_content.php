<div class="post_section">
<?php
foreach ($all_published_blog as $v_blog)
{
?>
    <div class="post_date">
        30<span>Nov</span>
    </div>
    <div class="post_content">

        <h3><a href="<?php echo base_url();?>Welcome/blog_details/<?php echo $v_blog->blog_id?>"><?php echo $v_blog->blog_title?></a></h3>

        <strong>Author:</strong> <?php echo $v_blog->author_name?> | <strong>Category:</strong> <a href="<?php echo base_url()?>Welcome/category_blog/<?php echo $v_blog->category_id?>"><?php echo $v_blog->category_name;?></a>

        <a target="_parent" href="<?php echo base_url();?>Welcome/blog_details/<?php echo $v_blog->blog_id?>"><img src="<?php echo base_url().$v_blog->blog_image;?>" width="500px" alt="image" /></a>

        <p><?php echo $v_blog->blog_short_description?></p>
        <p><a href="blog_post.html">24 Comments</a> | <a href="<?php echo base_url()?>Welcome/blog_details/<?php echo $v_blog->blog_id?>">Continue reading...</a>                </p>
    </div>
    <div class="cleaner"></div>
<?php } ?>
</div>
