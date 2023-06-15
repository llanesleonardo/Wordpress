<?php
/**
 *  Content Map Template Part: content-map.php
 * 
 */
?>
<?php
wp_register_script( 'custom-maps-js',get_template_directory_uri().'/assets/js/mapScript.js',false, '1.0' , true); 
wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBD_wmqMe7SlCflb-Xbma73ED5ur3ybsK8&callback=myMap',array('custom-maps-js'), '1.0', true );
?>
<div id="main-content" class="container-fluid">
    <main class="py-5">
    <div class="container">
        <h1 class="text-center"><?php _e('My First Google Map','treselebasic') ?>
        </h1>
    <br>
        <div id="googleMap" class="googleMapClass" style="width:100%;height:400px;"></div>

    </div>