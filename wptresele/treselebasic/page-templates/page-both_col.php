<?php
/**
 * Template Name: BothCol Template
 * Template Post Type: post,page
 */
  
 ?>
 <?php get_header();?>
 <?php
    get_template_part( "template-parts/header/content","header_hero" );  
    ?>
    <?php 
     get_template_part( "template-parts/header/content","header_breadcrumb" ); 
    ?>
<div id="main-content-wrapper" class="row pb-5">
    <div class="col-3">
    <?php get_template_part( "template-parts/sidebars/content","sidebars_left" );  ?>
    </div>
    <div class="col-6">
    <?php 

    if (have_posts()) {
        get_template_part( 'template-parts/content/content','main' );

    /*  
    if (get_previous_post_link()) {
        previous_post_link();
    }

    if (get_next_post_link()) {
        next_post_link();
    }
    */

    if (is_page( 'contact' )) {
        get_template_part( 'template-parts/content/content','map' );
    }
    }else{
        echo "Post not found";
    }


    ?>
  
</div>
</div>
      <!-- MAIN END HERE-->
    <div class="col-3">
    <?php get_template_part( "template-parts/sidebars/content","sidebars_right" );  ?>
    </div>
<!--main-content-wrapper -->
</div>



<?php get_footer();?>