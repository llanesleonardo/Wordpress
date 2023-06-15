<?php
/**
 *  404 Error Default Page: 404.php
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
<?php 

get_template_part( 'template-parts/content/content','main' );

?>

<?php get_footer();?>