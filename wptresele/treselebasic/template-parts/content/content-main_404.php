<?php
/**
 *  Content Main Template Part: content-main.php
 * 
 */
?>


<section id="error-404" class="container">
    <div>
        <h1 class="text-center"> Error 404 </h1>
        <div id="main-404-content" class="404-content">
            <p class="text-left"> <?php _e('Content not found.','treselebasic') ?></p>

            <p class="text-left"> <?php _e('It looks like nothing was found at this url. Maybe try a search','treselebasic') ?></p>
        </div>
    </div>
    <div class="my-5">
    <?php get_search_form(); ?>
    </div>
</section>

