<?php
if (!function_exists("treselebasic_setup")) {
    function treselebasic_setup(){
        /**
         *  * First setup defaults and register theme supports
         *  * This setup has to be before the init hook
         */

        // Helps other websites to subscribe your posts
        add_theme_support( 'automatic_feed_links');
        
        // Default textdomain for theme's translations
        load_theme_textdomain( "treselebasic",get_template_directory()."/languages");
        

        // Adds post formats, WP know how to display each format, you can customize it
        add_theme_support( "post-formats", array('aside','gallery','quote','image','video','audio','standard') );
        
           // * Display post thumbnails with the_post_thumbnail() function  Feature image
           add_theme_support("post-thumbnails",array('post','page')); 


           add_theme_support('custom-background');
           add_theme_support('html5',array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ));
           //add_editor_style();
           add_theme_support('wp-block-styles');
           add_theme_support( 'align-wide' );
        // Register one or more nav menus in the theme
        /**
         *  To display the menu you have t ouse wp_nav_menu(array(theme_locations=> "location"))
        */
        $args_custom_logo = array(
            'width' => 100,
            'height' => 100,
            'flex-width' => true,
            'flex-height' => true,
            'header-text' => array('site-title','site-description'),
            'unlink-homepage-logo' => false
        );
        add_theme_support("custom-logo", $args_custom_logo);
        
        


        if ( ! isset ( $content_width) ) {
            $content_width = 800;
        }

        $args = array(
            'default-image'=>"",
            'default-text-color' => '000',
            'width' => 1000,
            'height' => 250,
            'flex-width' => true,
            'flex-height' => true
        );
        add_theme_support( 'custom-header', $args );
    }

    add_action( "after_setup_theme", "treselebasic_setup");
   

    function treselebasic_register_nav_menu(){
        register_nav_menus(array(
            "primary" => __('Primary Menu Logout', "treselebasic"),
            "secondary" => __('Secondary Menu', "treselebasic"),
            "primary-logout" => __('Primary Login Menu', "treselebasic"),
         ));
    }
    
    add_action('after_setup_theme' ,'treselebasic_register_nav_menu');


    function add_additional_class_on_li($classes,$item,$args){
        if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
        }
        if (isset($args->add_active_class) && in_array('current-menu-item',$classes)) {
            $classes[] = $args->add_active_class;
        }
        return $classes;
    }

    add_filter( 'nav_menu_css_class', "add_additional_class_on_li",1,3 );


    function add_anchor_classes($attr,$item,$args){
        if (isset($args->add_link_class)) {
            $attr['class'] = $args->add_link_class;
        }

        return $attr;
    }

    add_filter( 'nav_menu_link_attributes','add_anchor_classes', 10, 3 );



    function treselebasic_load_script(){
        wp_register_style( 'bootstrap-css', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css", false, "5.3.0", "all" );
        wp_register_style('product_sans','https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400&display=swap','','1.0.0','all');
    
        wp_enqueue_style( 'style', get_stylesheet_uri(),array('bootstrap-css','product_sans'),'1.0','all');
        wp_enqueue_script('bootstrap-script','https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js',false, '1.0',true);
        wp_enqueue_script( 'script', get_template_directory_uri()."/assets/js/scripts.js", false, '1.0',true );
    
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
           }
    
    }
    
    add_action('wp_enqueue_scripts','treselebasic_load_script');


    function add_logo(){
        $custom_logo_id = get_theme_mod( 'custom_logo');
        $logo = wp_get_attachment_image_src( $custom_logo_id, 'thumbnail');
        if (has_custom_logo()) {
         echo "<img src='".esc_url($logo[0])."' alt='". get_bloginfo( 'name')."'>";
        }else{
         echo "<h1>".get_bloginfo('name')."</h1>";
        }
    }



    function treselebasic_widgets_init() {
        register_sidebar( array(
            'name'          => esc_html__( 'Footer 1', 'treselebasic' ),
            'id'            => 'footer-1',
            'description'   => esc_html__( 'Add widgets here.', 'treselebasic' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
            'class' => 'custom_sidebar'
        ) );
    
        register_sidebar( array(
            'name'          => esc_html__( 'Footer 2', 'treselebasic' ),
            'id'            => 'footer-2',
            'description'   => esc_html__( 'Add widgets here.', 'treselebasic' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
            'class' => 'custom_sidebar'
        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Footer 3', 'treselebasic' ),
            'id'            => 'footer-3',
            'description'   => esc_html__( 'Add widgets here.', 'treselebasic' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
            'class' => 'custom_sidebar'
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer 4', 'treselebasic' ),
            'id'            => 'footer-4',
            'description'   => esc_html__( 'Add widgets here.', 'treselebasic' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
            'class' => 'custom_sidebar'
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Sidebar Right 1', 'treselebasic' ),
            'id'            => 'sidebar-right-1',
            'description'   => esc_html__( 'Add widgets here.', 'treselebasic' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
            'class' => 'custom_sidebar'
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Sidebar Right 2', 'treselebasic' ),
            'id'            => 'sidebar-right-2',
            'description'   => esc_html__( 'Add widgets here.', 'treselebasic' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
            'class' => 'custom_sidebar'
        ) );


        register_sidebar( array(
            'name'          => esc_html__( 'Sidebar Left 1', 'treselebasic' ),
            'id'            => 'sidebar-left-1',
            'description'   => esc_html__( 'Add widgets here.', 'treselebasic' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
            'class' => 'custom_sidebar'
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Sidebar Left 2', 'treselebasic' ),
            'id'            => 'sidebar-left-2',
            'description'   => esc_html__( 'Add widgets here.', 'treselebasic' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
            'class' => 'custom_sidebar'
        ) );
    }
    add_action( 'widgets_init', 'treselebasic_widgets_init' );
    

/*
    function tresele_is_user_logged_in(){
        if (is_user_logged_in()) {
            echo "<br> Welcome, registered user !";
    
        }else{
            echo "<br> Welcome, visitor!";
            
        }
    }

    add_action('wp_head','tresele_is_user_logged_in');
*/

function my_custom_css_output() {
    echo '<style type="text/css" id="custom-theme-css">' .
    get_theme_mod( 'custom_theme_css', '' ) . '</style>';
  }
  add_action( 'wp_head', 'my_custom_css_output');
  

add_action('customize_register','my_customize_register');

function my_customize_register($wp_customize){
  //  $wp_customize->add_panel();
   // $wp_customize->get_panel();

  //  $wp_customize->add_section();
   // $wp_customize->get_section();
    
   //  $wp_customize->add_setting();
    //$wp_customize->get_setting();

  //  $wp_customize->add_control();
  //  $wp_customize->get_control();

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_control', array(
    'label' => __( 'Accent Color', 'treselebasic' ),
    'section' => 'footer',
  ) ) );
  $wp_customize->add_section( 'footer' , array(
    'title' => 'footer name',
    'panel' => 'menus',
  ) );
  $wp_customize->add_panel( 'menus', array(
    'title' => __( 'Menus' ),
    'description' => '', // Include html tags such as <p>.
    'priority' => 160, // Mixed with top-level-section hierarchy.
  ) );

  
  

  
}


/*
function my_save_post_action( $post_id, $post, $update ) {
    // Your custom code here
    if ( $post->post_type === 'post' ) {
        // This is a post of type 'post'
        // Add custom meta data to the post
        update_post_meta( $post_id, '_my_custom_meta_key', 'My custom meta value' );
    }
}
add_action( 'save_post', 'my_save_post_action', 10, 3 );
*/

// Define the dashboard widget content
function my_dashboard_widget() {
    echo '<p>This is my custom dashboard widget.</p>';
}

// Add the dashboard widget to the dashboard
function add_my_dashboard_widget() {
    wp_add_dashboard_widget( 'my_dashboard_widget', 'My Custom Widget', 'my_dashboard_widget' );
}

// Register the dashboard widget
add_action( 'wp_dashboard_setup', 'add_my_dashboard_widget' );


function add_custom_login_error_message(){
    return "Wrong credentials – Sit back, relax and think about your login information for a minute and when you are sure, try again.";
  }
  
  add_filter( "login_errors", "add_custom_login_error_message" );




  function custom_login_logo() {
   // $logo_url = get_stylesheet_directory_uri() . '/path/to/your/logo.png';
   $logo_url = "http://localhost:8888/wp-content/uploads/2023/05/logonew.png";
    ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo $logo_url; ?>) !important;
            background-size: contain;
            width: 100%;
            height: 80px;
        }
    </style>
    <?php
}
add_action( 'login_enqueue_scripts', 'custom_login_logo' );

function custom_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'custom_login_logo_url' );



function my_custom_menu_item( $items, $args ) {
    // Check if the menu is the primary navigation menu
    if ( $args->theme_location == 'primary' ) {
        // Add a custom link to the end of the menu
        $items .= '<li><a href="https://example.com">Custom Link</a></li>';
    }

    return $items;
}
add_filter( 'wp_nav_menu_items', 'my_custom_menu_item', 10, 2 );



function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
    if (is_single()) {
        echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
        the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

 

    // function that runs when shortcode is called
    function wpb_demo_shortcode() { 
      
    // Things that you want to do.
    $message = 'Hello world!'; 
      
    // Output needs to be return
    return $message;
    }
    // register shortcode
    add_shortcode('greeting', 'wpb_demo_shortcode');include 'custom-shortcodes.php';
}
?>