<?php
/**
 *  Front Page: front-page.php
 * 
 */
?>
<?php get_header();?>
<?php 

get_template_part( "template-parts/utils/formats/gallery/content","format_gallery" );
echo "<br>";

get_template_part( "template-parts/utils/formats/audio/content","format_audio" );
echo "<br>";

get_template_part( "template-parts/utils/formats/video/content","format_video" );
echo "<br>";
?>