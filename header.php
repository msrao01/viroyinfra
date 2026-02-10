<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

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
                        <?php if (has_nav_menu('primary')) : ?>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu_class'     => 'navbar-nav justify-content-center',
                                'container'      => false,
                                'depth'          => 2,
                                // Note: Standard wp_nav_menu does not fully support Bootstrap 5 dropdowns without a Walker.
                                // For basic functionality, we use standard output.
                            ));
                            ?>
                        <?php else : ?>
                        <ul class="navbar-nav justify-content-center">
                            <li class="nav-item"><a class="nav-link <?php echo is_front_page() ? 'active' : ''; ?>" href="<?php echo home_url(); ?>">Home</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle <?php echo is_page_template('page-projects.php') || is_singular('project') ? 'active' : ''; ?>" href="<?php echo home_url('/properties'); ?>" id="propertiesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Properties
                                </a>
                                <div class="dropdown-menu mega-menu" aria-labelledby="propertiesDropdown">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <a href="<?php echo home_url('/project/luxury-villa'); ?>" class="text-decoration-none mega-menu-link">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/img/luxury-villa-menu.svg" class="img-fluid mega-menu-img mb-2" alt="Project 1">
                                                    <h6 class="font-playfair text-dark">Luxury Villa</h6>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="<?php echo home_url('/project/city-heights'); ?>" class="text-decoration-none mega-menu-link">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/img/city-heights-menu.svg" class="img-fluid mega-menu-img mb-2" alt="Project 2">
                                                    <h6 class="font-playfair text-dark">City Heights</h6>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="font-playfair text-accent mb-3">Completed Projects</h6>
                                                        <ul class="list-unstyled">
                                                            <li><a href="<?php echo home_url('/projects'); ?>" class="text-muted text-decoration-none hover-accent">Skyline Towers</a></li>
                                                            <li><a href="<?php echo home_url('/projects'); ?>" class="text-muted text-decoration-none hover-accent">Ocean Breeze</a></li>
                                                            <li><a href="<?php echo home_url('/projects'); ?>" class="text-muted text-decoration-none hover-accent">Green Valley</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-6">
                                                        <h6 class="font-playfair text-accent mb-3">Upcoming Projects</h6>
                                                        <ul class="list-unstyled">
                                                            <li><a href="<?php echo home_url('/projects'); ?>" class="text-muted text-decoration-none hover-accent">Sunset Boulevard</a></li>
                                                            <li><a href="<?php echo home_url('/projects'); ?>" class="text-muted text-decoration-none hover-accent">Royal Enclave</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <a href="<?php echo home_url('/projects'); ?>" class="btn btn-accent w-100 text-uppercase fw-bold">View All Projects <i class="bi bi-arrow-right ms-2"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item"><a class="nav-link <?php echo is_page('about') ? 'active' : ''; ?>" href="<?php echo home_url('/about'); ?>">About us</a></li>
                            <li class="nav-item"><a class="nav-link <?php echo is_page('contact') ? 'active' : ''; ?>" href="<?php echo home_url('/contact'); ?>">Contact Us</a></li>
                            <li class="nav-item"><a class="nav-link <?php echo is_home() ? 'active' : ''; ?>" href="<?php echo home_url('/blog'); ?>">Blog</a></li>
                        </ul>
                        <?php endif; ?>
                    </div>

                    <!-- Column 3 (1/4): CTA Button -->
                    <div class="col-lg-3 text-lg-end text-center mt-3 mt-lg-0 p-0">
                        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-accent rounded-pill px-4 text-white">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
