<div class="footer-nav-widgets-wrapper header-footer-group">
    <div class="footer-inner section-inner">
        <div class="row">
            <div class="col-md-2">
                <p>Connect with us</p>
            </div>
            <div class="col-md-2">
                <ul class="social-menu footer-social reset-list-style social-icons fill-children-current-color">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'social',
                            'container'       => '',
                            'container_class' => '',
                            'items_wrap'      => '%3$s',
                            'menu_id'         => '',
                            'menu_class'      => '',
                            'depth'           => 1,
                            'link_before'     => '<span class="screen-reader-text">',
                            'link_after'      => '</span>',
                            'fallback_cb'     => '',
                        )
                    );
                    ?>

                </ul><!-- .footer-social -->
            </div>
            <div class="col-md-3">
                <?php dynamic_sidebar('sidebar-2'); ?>
            </div>
            <div class="col-md-3">
                <?php dynamic_sidebar('sidebar-1'); ?>
            </div>
            <div class="col-md-3">
                <?php dynamic_sidebar('sidebar-3'); ?>
            </div>
        </div>
    </div>
</div>