<?php
/**
 *  Category Default Page: category.php
 * 
 */
?>

<?php
/**
 *  Search Result Page: search.php
 * 
 */
?>
<?php get_header();?>
<?php 
     get_template_part( "template-parts/header/content","header_breadcrumb" ); 
    ?>
    
<div id="main-content-wrapper" class="row pb-5">
    <?php 


if (have_posts()) {
    
    get_template_part( 'template-parts/content/content', 'main_archive');

}else{
    echo "Post not found";
}


?>
</div>
<?php get_footer();?>