<?php
/**
 *  Content Social Template Part: content-social.php
 * 
 */
?>

<?php 
    $socialList = array(
        'fb' => array(
            'name' => 'Facebook',
            'link' => '',
            'rel' => 'Facebook',
            'iconImg' => 'http://localhost:8888/wp-content/uploads/2023/05/facebook.png',
            'class' => 'footer-social-img'
        ),
        'insta' => array(
            'name' => 'Instagram',
            'link' => '',
            'rel' => 'Instagram',
            'iconImg' => 'http://localhost:8888/wp-content/uploads/2023/05/instagram.png',
            'class' => 'footer-social-img'
        ),
        'in' => array(
            'name' => 'LinkedIn',
            'link' => '',
            'rel' => 'LinkedIn',
            'iconImg' => 'http://localhost:8888/wp-content/uploads/2023/05/linkedin.png',
            'class' => 'footer-social-img'
        ),
        'yt' => array(
            'name' => 'Youtube',
            'link' => '',
            'rel' => 'Youtube',
            'iconImg' => 'http://localhost:8888/wp-content/uploads/2023/05/youtube.png',
            'class' => 'footer-social-img'
        )

    );

?>
<div id="social" class="social-container--white container py-5">
    <div class="row">
        <div class="col">
            <ul class="social_list d-flex flex-row justify-content-center align-items-center">
                <li class="social_list_item px-3" ><a href='"<?php echo $socialList['fb']['link'] ?>"'><img class=<?php echo $socialList['fb']['class']?> src=<?php echo $socialList['fb']['iconImg'] ?>> </a></li>
                <li class="social_list_item px-3" ><a href='"<?php echo $socialList['insta']['link'] ?>"'><img class=<?php echo $socialList['insta']['class']?> src=<?php echo $socialList['insta']['iconImg'] ?>> </a></li>
                <li class="social_list_item px-3" ><a href='"<?php echo $socialList['in']['link'] ?>"'><img class=<?php echo $socialList['in']['class']?> src=<?php echo $socialList['in']['iconImg'] ?>></a></li>
                <li class="social_list_item px-3" ><a href='"<?php echo $socialList['yt']['link'] ?>"'><img class=<?php echo $socialList['yt']['class']?> src=<?php echo $socialList['yt']['iconImg'] ?>> </a></li>
            </ul>
        </div>
    </div>
</div>