<?php
/**
 *  Single Post Page: single.php
 * 
 */
?>
<?php get_header();?>
<?php 



if (have_posts()) {
    while(have_posts()){
        the_post(); 
        the_content();

      // Get the updated post meta data
$custom_meta_value = get_post_meta( get_the_ID(), '_my_custom_meta_key', true );

// Output the meta value
echo $custom_meta_value;
 
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