    <!-- Footer -->
    <footer class="bg-navy text-white py-5 mt-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/VLv01L.png" alt="VIROY INFRA" class="mb-3" height="50">
                    <p class="text-white-50"><?php _e('Helping you find the perfect place to call home. Luxury properties, exceptional service.', 'viroyinfra'); ?></p>
                </div>
                <div class="col-md-4">
                    <h5 class="font-playfair mb-3 text-accent"><?php _e('Links', 'viroyinfra'); ?></h5>
                    <?php
                    if (has_nav_menu('footer')) {
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'container'      => false,
                            'menu_class'     => 'list-unstyled',
                            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'link_before'    => '',
                            'link_after'     => '',
                            // Add classes to LI or A via filters if needed, but for simple list:
                        ));
                    } else {
                        // Fallback
                        ?>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="<?php echo home_url(); ?>" class="text-white-50 text-decoration-none hover-white"><?php _e('Home', 'viroyinfra'); ?></a></li>
                            <li class="mb-2"><a href="<?php echo get_post_type_archive_link('project'); ?>" class="text-white-50 text-decoration-none hover-white"><?php _e('Properties', 'viroyinfra'); ?></a></li>
                            <li class="mb-2"><a href="<?php echo home_url('/about'); ?>" class="text-white-50 text-decoration-none hover-white"><?php _e('About Us', 'viroyinfra'); ?></a></li>
                            <li class="mb-2"><a href="<?php echo home_url('/contact'); ?>" class="text-white-50 text-decoration-none hover-white"><?php _e('Contact Us', 'viroyinfra'); ?></a></li>
                            <li class="mb-2"><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="text-white-50 text-decoration-none hover-white"><?php _e('Blog', 'viroyinfra'); ?></a></li>
                        </ul>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-md-4">
                    <h5 class="font-playfair mb-3 text-accent"><?php _e('Connect', 'viroyinfra'); ?></h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white social-icon"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#" class="text-white social-icon"><i class="bi bi-twitter fs-5"></i></a>
                        <a href="#" class="text-white social-icon"><i class="bi bi-instagram fs-5"></i></a>
                        <a href="#" class="text-white social-icon"><i class="bi bi-linkedin fs-5"></i></a>
                    </div>
                </div>
            </div>
            <hr class="border-secondary my-4">
            <div class="text-center text-white-50">
                <small>&copy; <?php echo date('Y'); ?> <?php _e('Viroy Infra. All rights reserved.', 'viroyinfra'); ?></small>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
