<div id="nav_wrapper" class="row">
                <div class="col">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">
                                <?php 
                                    add_logo();
                                ?></a> <!-- LOGO -->
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <?php  
                          //  wp_die(var_dump(get_registered_nav_menus(  )));
                            wp_nav_menu( 
                                array(
                                    'theme_location'=> is_user_logged_in() ? 'primary' : 'primary-logout',
                                   // 'menu' => 'primary',
                                    'container' => 'div',
                                    'container_class' => 'collapse navbar-collapse',
                                    'menu_class' => "navbar-nav me-auto mb-2 mb-lg-0",
                                    'container_id' => 'navbarSupportedContent',
                                    'add_li_class' => 'nav-item',
                                    'add_link_class' => 'nav-link',
                                    'add_active_class' => 'active'
                                    ) 
                                ); 
                            ?>
                                <?php get_search_form() ?>
                            </div>
                        </nav>
                     </div>
                </div>