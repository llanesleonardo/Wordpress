<?php
/**
 *  Search Result Page: search.php
 * 
 */
?>
<?php get_header();?>
<?php 



if (have_posts()) {
    while(have_posts()){
        the_post(); 
        the_content();
    }
   
if (get_previous_post_link()) {
    previous_post_link();
}

if (get_next_post_link()) {
    next_post_link();
}

}else{
    echo "Post not found";
}


?>

<?php get_footer();?>