<?php
/**
 *  Content Main Template Part: content-main.php
 * 
 */
?>
<div id="main-content" class="container-fluid">
    <main class="py-5">
<?php 



if (have_posts()) {
    while(have_posts()){
        the_post(); 
    echo "<section class=' container main_title mt-3'>";
    echo "<h1>". the_title() ."</h1>";
    echo "<small>".edit_post_link()."</small>";
    echo "</section>";
    echo "<section class='container text-center'>";
    get_template_part( "template-parts/utils/formats/image/content","format_image" );
    echo"</section>";
    echo "<section class=' container main_content mt-3'>";
    echo "<div>". the_content() ."</div>";
    echo "</section>";  
    echo "<br/>"; 
    }

}else{

    if ( is_404()) {
        get_template_part( 'template-parts/content/content','main_404' );
    }else{
    echo "Post not found";
    }
}

?>