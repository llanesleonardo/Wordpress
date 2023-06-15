<?php
/**
 * Template Name: TwoColR Template
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
<div class="row">
<div class="col-9">
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
<div class="col-3">
<?php get_template_part( "template-parts/sidebars/content","sidebars_right" );  ?>
</div>
</div>



<?php get_footer();?>