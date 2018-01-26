<div class="post_section">
    <h3 style="color: green">
        <?php
        $message = $this->session->userdata('message');
        if ($message) {
            echo $message;
            $this->session->unset_userdata('message');
        }
        ?>
    </h3>
    <div class="post_date">
        30<span>Nov</span>
    </div>
    <div class="post_content">

        <h3><a href="#"><?php echo $blog_info->blog_title ?></a></h3>

        <strong>Author:</strong> <?php echo $blog_info->author_name ?> | <strong>Category:</strong> <a href="#"><?php echo $blog_info->category_name; ?></a>

        <a target="_parent"><img src="<?php echo base_url() . $blog_info->blog_image; ?>" width="500px" alt="image" /></a>

        <p><?php echo $blog_info->blog_long_description ?></p>

    </div>
    <div class="cleaner"></div>

</div>

<div>
    <h3>Comments <span style="color: #ff3333">(<?php echo count($published_comments)?>)</span></h3>
    <hr/>
    <table align="center" border="1" width="600px">
        <?php
        //$published_comments = $this->Welcome_Model->select_comments_by_blog_id($blog_info->blog_id);

        foreach ($published_comments as $v_comments) {
            ?>
            <tr>
                <td style="color:#ff3333; padding: 35px;"><?php echo $v_comments->comments_author_name; ?></td>
                <td style="text-align: justify"><?php echo $v_comments->comments; ?></td>
                <td style="padding-left: 10px"><?php echo $v_comments->comments_date_time; ?></td>
            </tr>
        <?php } ?>
    </table>
    <h3 style="margin-top: 30px">Post Your Comments</h3>   
    <hr/>
    <form action="<?php echo base_url() ?>Welcome/save_comments" method="post">
        <table border="0" align="center" width="500px">
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="comments_author_name" size="40">
                    <input type="hidden" name="blog_id" value="<?php echo $blog_info->blog_id ?>">
                </td>
            </tr>
            <tr>
                <td>Email Address</td>
                <td>
                    <input type="email" name="email_address" size="40">
                </td>
            </tr>
            <tr>
                <td>Comments</td>
                <td>
                    <textarea name="comments" rows="5" cols="30"></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btn" value="Post Comments">
                </td>
            </tr>
        </table>
    </form>
</div>