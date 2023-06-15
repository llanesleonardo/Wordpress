<?php
/**
 *  Archive Default Page: archive.php
 * 
 */
?>


<?php get_header();?>
<?php 



if (have_posts()) {
   
   get_template_part( 'template-parts/content/content', 'main_archive');

}else{
    echo "Post not found";
}


?>

<?php get_footer();?>