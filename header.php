<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Main Navbar -->
    <?php
    $navbar_class = is_singular('project') ? 'position-absolute' : 'sticky-top bg-dark';
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark <?php echo $navbar_class; ?> w-100 main-navbar" style="z-index: 1030;">
        <div class="container">
            <!-- Mobile Logo (Visible < lg) -->
            <a class="navbar-brand d-lg-none" href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/img/VLv01L.png" alt="VIROY INFRA" height="40">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse w-100" id="navbarNav">
                <div class="row w-100 align-items-center m-0">
                    <!-- Column 1 (1/4): Logo (Desktop only) -->
                    <div class="col-lg-3 d-none d-lg-block text-start p-0">
                        <a class="navbar-brand m-0" href="<?php echo home_url(); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/VLv01L.png" alt="VIROY INFRA" height="40">
                        </a>
                    </div>

                    <!-- Column 2 (2/4): Menu -->
                    <div class="col-lg-6 text-center">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container'      => false,
                            'menu_class'     => 'navbar-nav justify-content-center',
                            'fallback_cb'    => false, // Fallback to manual if menu not set
                            'depth'          => 2,
                            // Note: A Custom Walker would be needed for the full Mega Menu experience.
                            // For this refactor, we are enabling the standard WP Menu which allows Dropdowns.
                        ));
                        ?>
                        <!-- Fallback Hardcoded Mega Menu (Only if no menu assigned) -->
                        <?php if ( ! has_nav_menu( 'primary' ) ) : ?>
                        <ul class="navbar-nav justify-content-center">
                            <li class="nav-item"><a class="nav-link <?php echo is_front_page() ? 'active' : ''; ?>" href="<?php echo home_url(); ?>"><?php _e('Home', 'viroyinfra'); ?></a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="propertiesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php _e('Properties', 'viroyinfra'); ?>
                                </a>
                                <div class="dropdown-menu mega-menu" aria-labelledby="propertiesDropdown">
                                    <div class="container">
                                        <div class="row">
                                            <!-- Dynamic Latest 2 Projects -->
                                            <?php
                                            $latest_projects = new WP_Query(array(
                                                'post_type' => 'project',
                                                'posts_per_page' => 2
                                            ));
                                            if ($latest_projects->have_posts()) :
                                                while ($latest_projects->have_posts()) : $latest_projects->the_post();
                                                    $thumb = get_the_post_thumbnail_url() ?: get_template_directory_uri() . '/img/modern-luxury-villa-thumb.svg';
                                            ?>
                                            <div class="col-md-3">
                                                <a href="<?php the_permalink(); ?>" class="text-decoration-none mega-menu-link">
                                                    <img src="<?php echo esc_url($thumb); ?>" class="img-fluid mega-menu-img mb-2" alt="<?php the_title(); ?>">
                                                    <h6 class="font-playfair text-dark"><?php the_title(); ?></h6>
                                                </a>
                                            </div>
                                            <?php
                                                endwhile;
                                                wp_reset_postdata();
                                            else:
                                            ?>
                                            <div class="col-md-12 text-center text-muted"><p><?php _e('No projects found.', 'viroyinfra'); ?></p></div>
                                            <?php endif; ?>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="font-playfair text-accent mb-3"><?php _e('Our Portfolio', 'viroyinfra'); ?></h6>
                                                        <p class="text-muted small"><?php _e('Explore our diverse portfolio of residential and commercial properties designed for modern living.', 'viroyinfra'); ?></p>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <a href="<?php echo get_post_type_archive_link('project'); ?>" class="btn btn-accent w-100 text-uppercase fw-bold"><?php _e('View All Projects', 'viroyinfra'); ?> <i class="bi bi-arrow-right ms-2"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo home_url('/about'); ?>"><?php _e('About us', 'viroyinfra'); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo home_url('/contact'); ?>"><?php _e('Contact Us', 'viroyinfra'); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php _e('Blog', 'viroyinfra'); ?></a></li>
                        </ul>
                        <?php endif; ?>
                    </div>

                    <!-- Column 3 (1/4): CTA Button -->
                    <div class="col-lg-3 text-lg-end text-center mt-3 mt-lg-0 p-0">
                        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-accent rounded-pill px-4 text-white"><?php _e('Contact Us', 'viroyinfra'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
