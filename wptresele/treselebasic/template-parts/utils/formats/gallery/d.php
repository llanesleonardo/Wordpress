<?php
//init the meta box
add_action( 'after_setup_theme', 'custom_postimage_setup' );

function custom_postimage_setup(){
    add_action( 'add_meta_boxes', 'custom_postimage_meta_box' );
    add_action( 'save_post', 'custom_postimage_meta_box_save' );
}

function custom_postimage_meta_box(){

    //on which post types should the box appear?
    $post_types = array('post','page','th-templates');
    foreach($post_types as $pt){
        add_meta_box('custom_postimage_meta_box',__( 'More Featured Images', 'yourdomain'),'custom_postimage_meta_box_func',$pt,'side','low');
    }
}


function custom_postimage_meta_box_func($post){

    //an array with all the images (ba meta key). The same array has to be in custom_postimage_meta_box_save($post_id) as well.
    $meta_keys = array('featured_image_2','featured_image_3','featured_image_4','featured_image_5','featured_image_6', 'featured_image_7');

    foreach($meta_keys as $index => $meta_key){
        $image_meta_val = get_post_meta( $post->ID, $meta_key, true);
        $image_array = $image_meta_val ? wp_get_attachment_image_src( $image_meta_val , 'large') : '';
        ?>
        <div class="custom_postimage_wrapper" style="margin-bottom:20px;" id="<?php echo $meta_key; ?>_container">

            <div class="editor-post-featured-image__container" id="<?php echo $meta_key; ?>_wrapper" style="display:<?php echo ($image_meta_val?'block':'none'); ?>;">

                <input type="hidden" name="<?php echo $meta_key; ?>" id="<?php echo $meta_key; ?>" value="<?php echo $image_meta_val; ?>" />

                <button type="button" onclick="custom_postimage_add_image('<?php echo $meta_key; ?>');" aria-label="Edit or update the image" aria-describedby="editor-post-featured-image-11-describedby" class="components-button editor-post-featured-image__preview">
                    <div class="components-responsive-wrapper">
                        <span id="<?php echo $meta_key; ?>_padding" ></span>
                        <img id="<?php echo $meta_key; ?>_img" src="<?php echo $image_array?$image_array[0]:''; ?>" width="<?php echo $image_array?$image_array[1]:''; ?>" height="<?php echo $image_array?$image_array[2]:''; ?>" alt="" class="components-responsive-wrapper__content" data-meta_image_id="<?php echo $image_array?$meta_key:0; ?>"/>
                    </div>
                </button>

                <button type="button" style="margin-top:1em; display:block;" class="replaceimage components-button is-secondary" onclick="custom_postimage_add_image('<?php echo $meta_key; ?>');"><?php _e('Replace Image ' .$index+2,'waas-hero'); ?></button>

                <button type="button" class="removeimage components-button is-link is-destructive" style="margin-top:1em; display:block;" onclick="custom_postimage_remove_image('<?php echo $meta_key; ?>');"><?php _e('Remove featured image '.$index+2,'yourdomain'); ?></button>

            </div>

            <button type="button" style="display:<?php echo ($image_meta_val?'none':'block'); ?>;" class="addimage components-button is-secondary" onclick="custom_postimage_add_image('<?php echo $meta_key; ?>');"><?php _e('Add Image ' .$index+2,'waas-hero'); ?></button>


        </div>
        <hr style="border-bottom: 2px solid #f0f0f0;" />
    <?php } ?>
    <script>

    window.onload = function() {
        var images = document.querySelectorAll('[data-meta_image_id]');
        images.forEach(setImgPadding);

        //adjust padding wrapper
        function setImgPadding(img) {
            var meta_id = img.dataset.meta_image_id
            if(meta_id == 0) return;
            jQuery('#'+meta_id+'_padding').css('height', img.scrollHeight);
        }
    }

    function custom_postimage_add_image(key){

        var $wrapper = jQuery('#'+key+'_wrapper');

        custom_postimage_uploader = wp.media.frames.file_frame = wp.media({
            title: '<?php _e('select image','yourdomain'); ?>',
            button: {
                text: '<?php _e('select image','yourdomain'); ?>'
            },
            multiple: false
        });
        custom_postimage_uploader.on('select', function() {

            var attachment = custom_postimage_uploader.state().get('selection').first().toJSON();

            //set input with new img id
            $wrapper.find('input#'+key).val(attachment['id']);


            //remove old image and old height property
            var pad = document.getElementById(key+'_padding').style.removeProperty('height');
            $wrapper.find('img').remove();

            //create new image
            var img = document.createElement("img");
            img.id = attachment['id']+'_img';
            img.src = attachment['url'];
            img.width = attachment['width'];
            img.height = attachment['height'];
            img.dataset.meta_image_id = key;

            document.getElementById(key+'_padding').appendChild(img)

            $wrapper.show();

            var $container = jQuery('#'+key+'_container');
            $container.find('button.addimage').hide();

        });
        custom_postimage_uploader.on('open', function(){
            var selection = custom_postimage_uploader.state().get('selection');
            var selected = $wrapper.find('input#'+key).val();
            if(selected){
                selection.add(wp.media.attachment(selected));
            }
        });
        custom_postimage_uploader.open();
        return false;
    }

    function custom_postimage_remove_image(key){
        var $wrapper = jQuery('#'+key+'_wrapper');
        $wrapper.find('input#'+key).val('');
        $wrapper.hide();
        var $container = jQuery('#'+key+'_container');
        $container.find('button.addimage').show();
        return false;
    }
    </script>
    <?php
    wp_nonce_field( 'custom_postimage_meta_box', 'custom_postimage_meta_box_nonce' );
}

function custom_postimage_meta_box_save($post_id){

    if ( ! current_user_can( 'edit_posts', $post_id ) ){ return 'not permitted'; }

    if (isset( $_POST['custom_postimage_meta_box_nonce'] ) && wp_verify_nonce($_POST['custom_postimage_meta_box_nonce'],'custom_postimage_meta_box' )){
        //same array as in custom_postimage_meta_box_func($post)
        $meta_keys = array('featured_image_2','featured_image_3','featured_image_4','featured_image_5','featured_image_6', 'featured_image_7');
        foreach($meta_keys as $meta_key){
            if(isset($_POST[$meta_key]) && intval($_POST[$meta_key])!=''){
                update_post_meta( $post_id, $meta_key, intval($_POST[$meta_key]));
            }else{
                update_post_meta( $post_id, $meta_key, '');
            }
        }
    }
}