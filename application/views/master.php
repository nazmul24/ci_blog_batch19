<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<meta name="keywords" content="Red Blog Theme, Free CSS Templates" />
<meta name="description" content="Red Blog Theme - Free CSS Templates by templatemo.com" />
<link href="<?php echo base_url();?>asset/templatemo_style.css" rel="stylesheet" type="text/css" />

<!--////// CHOOSE ONE OF THE 3 PIROBOX STYLES  \\\\\\\-->
<link href="<?php echo base_url();?>asset/css_pirobox/white/style.css" media="screen" title="shadow" rel="stylesheet" type="text/css" />
<!--<link href="css_pirobox/white/style.css" media="screen" title="white" rel="stylesheet" type="text/css" />
<link href="css_pirobox/black/style.css" media="screen" title="black" rel="stylesheet" type="text/css" />-->
<!--////// END  \\\\\\\-->

<!--////// INCLUDE THE JS AND PIROBOX OPTION IN YOUR HEADER  \\\\\\\-->
<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/piroBox.1_2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$().piroBox({
			my_speed: 600, //animation speed
			bg_alpha: 0.5, //background opacity
			radius: 4, //caption rounded corner
			scrollImage : false, // true == image follows the page, false == image remains in the same open position
			pirobox_next : 'piro_next', // Nav buttons -> piro_next == inside piroBox , piro_next_out == outside piroBox
			pirobox_prev : 'piro_prev',// Nav buttons -> piro_prev == inside piroBox , piro_prev_out == outside piroBox
			close_all : '.piro_close',// add class .piro_overlay(with comma)if you want overlay click close piroBox
			slideShow : 'slideshow', // just delete slideshow between '' if you don't want it.
			slideSpeed : 4 //slideshow duration in seconds(3 to 6 Recommended)
	});
});
</script>
<!--////// END  \\\\\\\-->

</head>
<body>

<div id="templatemo_top_wrapper">
	<div id="templatemo_top">
    
        <div id="templatemo_menu">
                    
            <ul>
                <li><a href="<?php echo base_url();?>welcome/index" class="current">Home</a></li>
                <li><a href="<?php echo base_url();?>welcome/portfolio">Portfolio</a></li>
                <li><a href="<?php echo base_url();?>welcome/services">Services</a></li>
                <li><a href="<?php echo base_url();?>welcome/contact">Contact Us</a></li>
            </ul>    	
        
        </div> <!-- end of templatemo_menu -->
        
        <div id="twitter">
        	<a href="#">follow us <br />
        	on twitter</a>
        </div>
        
  </div>
</div>

<div id="templatemo_header_wrapper">
	<div id="templatemo_header">
    
    	<div id="site_title">
            <h1><a href="http://www.templatemo.com" target="_parent"><strong>Red Blog</strong><span>Free Blog Template in HTML CSS</span></a></h1>
        </div>
    
    </div>
</div>

<div id="templatemo_main_wrapper">
	<div id="templatemo_main">
		<div id="templatemo_main_top">
        
        	<div id="templatemo_content">
        
    		<?php echo $maincontent;?>
        
       	  </div>
            
          
          <div id="templatemo_sidebar">
            	
                <h4>Categories</h4>
                <ul class="templatemo_list">
                    <?php 
                    $all_published_category=$this->Super_Admin_Model->get_all_published_category();
                    foreach ($all_published_category as $v_category)
                    {
                    ?>
                    <li><a href="<?php echo base_url()?>Welcome/category_blog/<?php echo $v_category->category_id?>"><?php echo $v_category->category_name?></a></li>
                    <?php } ?>
                </ul>
                
                <div class="cleaner_h40"></div>
                <?php
                if(isset($friends))
                {    
                ?>
                
                <h4>Popular Blog</h4>
                <ul class="templatemo_list">
                    <?php
                    $popular_blog=$this->Welcome_Model->popular_blog();
                    foreach ($popular_blog as $v_blog)
                    {
                    ?>
                    <li><a href="<?php echo base_url();?>Welcome/blog_details/<?php echo $v_blog->blog_id?>" target="_parent"><?php echo $v_blog->blog_title?> (<?php echo $v_blog->hit_count ?>)</a></li>
                <?php } ?>
                </ul>
                
                <h4>Latest Blog</h4>
                <ul class="templatemo_list">
                    <?php
                    $latest_blog=$this->Welcome_Model->latest_blog();
                    foreach ($latest_blog as $v_blog)
                    {
                    ?>
                    <li><a href="<?php echo base_url();?>Welcome/blog_details/<?php echo $v_blog->blog_id?>" target="_parent"><?php echo $v_blog->blog_title?></a></li>
                <?php } ?>
                </ul>
                <?php } ?>
                <div id="ads">
                	<a href="#"><img src="<?php echo base_url();?>asset/images/templatemo_200x100_banner.jpg" alt="banner 1" /></a>
                    
                    <a href="#"><img src="<?php echo base_url();?>asset/images/templatemo_200x100_banner.jpg" alt="banner 2" /></a>
                </div>
                
            </div>
        
        	<div class="cleaner"></div>
            
        </div>
        
    </div>
    
    <div id="templatemo_main_bottom"></div>
    
</div>

<div id="templatemo_footer">

    Copyright © 2048 <a href="index.html">Your Company Name</a> | 
    <a href="http://www.iwebsitetemplate.com" target="_parent">Website Templates</a> by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
    
</div>

<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>