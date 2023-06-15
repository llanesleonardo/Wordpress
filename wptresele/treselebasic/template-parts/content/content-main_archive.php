<?php
/**
 *  Content Main Template Part: content-main.php
 * 
 */
?>
<div id="main-content" class="container-fluid">
    <main class="py-5">

<!--
    <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="..." class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>
-->
<?php 

if (have_posts()) {
    while(have_posts()){
        the_post(); 
    echo "<section class=' container main_title mt-3'>";
    echo '<div class="card mb-3">';
    echo '<div class="row g-0">';
    echo '<div class="col-4">';
    echo ' <img src="https://placehold.co/250x250" class="img-fluid rounded-start" alt="250x250">';
    echo "</div>";
    echo ' <div class="col-8">';
    echo ' <div class="card-body">';
    echo "<h5 class='card-title'>". the_title() ."</h5>";
    echo "<small>".edit_post_link()."</small>";
    echo "</section>";
    echo "<section class=' container main_content mt-3'>";
    echo '<p class="card-text">';
    echo "<div>". the_excerpt() ."</div>";
    echo "</p>";
    echo "</section>";  
    echo "</div>";
    echo "</div>";

    echo "</div>";
    echo "</div>";
    echo "</section>";
    echo "<br/>"; 
    }

}else{

    if ( is_404()) {
        get_template_part( 'template-parts/content/content','main_404' );
    }else{
    echo "Posts not found";
    }
}

?>