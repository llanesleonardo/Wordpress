<?php
/**
 *  Header Default Page: header.php
 * 
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( "charset" ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://3lstrategy.com">
    <link rel="pingback" href="<?php bloginfo( "pingback_url" );?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <a class="skip-link screen-reader-text" href="#content"><?php _e("Skip content","treselebasic")?></a>
    <div id="backtop"></div>
        <header class="container-fluid">
            <?php 
            get_template_part( "template-parts/header/content","header_announcement" );
            get_template_part( "template-parts/header/content","header_nav" );       
            ?>


        </header>
        <?php 
//get_template_part( "template-parts/utils/content","blue_ribbon" );
?>
