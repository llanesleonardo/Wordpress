
<?php if ( has_post_thumbnail() ) : ?>
    <div class="featured-image">
        <?php the_post_thumbnail('large',array('class' => 'img-fluid')); ?>
    </div>
<?php endif; ?>