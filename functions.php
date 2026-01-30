<?php
function viroyinfra_scripts() {
    // Styles
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0');
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css', array(), '1.10.0');
    // wp_enqueue_style('material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), null); // Removed in favor of Bootstrap Icons
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap', array(), null);
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1');
    wp_enqueue_style('viroyinfra-style', get_stylesheet_uri());

    // Scripts
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '5.3.0', true);
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true);

    // Load More JS
    wp_enqueue_script('viroyinfra-load-more', get_template_directory_uri() . '/js/load-more.js', array(), '1.0', true);
    wp_localize_script('viroyinfra-load-more', 'viroyinfra_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('load_more_projects_nonce')
    ));

    // Custom JS for AOS and Counters
    wp_add_inline_script('aos-js', '
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });

        // Counter Animation Logic (Generic for theme)
        document.addEventListener("DOMContentLoaded", () => {
            const counters = document.querySelectorAll(".counter-value");

            const animateCounter = (counter) => {
                const target = +counter.getAttribute("data-target");
                const duration = 2000;
                const increment = target / (duration / 16);

                let current = 0;

                const updateCount = () => {
                    current += increment;

                    if(current < target) {
                        counter.innerText = Math.ceil(current);
                        requestAnimationFrame(updateCount);
                    } else {
                        counter.innerText = target;
                    }
                };

                updateCount();
            };

            const observerOptions = { threshold: 0.5 };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if(entry.isIntersecting) {
                        const counter = entry.target;
                        animateCounter(counter);
                        observer.unobserve(counter);
                    }
                });
            }, observerOptions);

            counters.forEach(counter => {
                observer.observe(counter);
            });

            // Image Modal Logic for Project Page
            const imageModal = document.getElementById("imageModal");
            if(imageModal) {
                imageModal.addEventListener("show.bs.modal", function (event) {
                    const trigger = event.relatedTarget;
                    const src = trigger.getAttribute("data-bs-src");
                    const modalImage = imageModal.querySelector("#modalImage");
                    modalImage.src = src;
                });
            }
        });
    ');
}
add_action('wp_enqueue_scripts', 'viroyinfra_scripts');

function viroyinfra_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'viroyinfra'),
        'footer'  => __('Footer Menu', 'viroyinfra'),
    ));
}
add_action('after_setup_theme', 'viroyinfra_setup');

// Register Custom Post Type for Projects
function viroyinfra_register_project_cpt() {
    $labels = array(
        'name'                  => _x('Projects', 'Post Type General Name', 'viroyinfra'),
        'singular_name'         => _x('Project', 'Post Type Singular Name', 'viroyinfra'),
        'menu_name'             => __('Projects', 'viroyinfra'),
    );
    $args = array(
        'label'                 => __('Project', 'viroyinfra'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-building',
        'show_in_nav_menus'     => true,
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'projects'), // Keep a distinct slug, strip it via filter
    );
    register_post_type('project', $args);

    // Register Custom Taxonomies

    // Project Category
    register_taxonomy('project_category', 'project', array(
        'labels' => array(
            'name' => _x('Project Categories', 'taxonomy general name', 'viroyinfra'),
            'singular_name' => _x('Project Category', 'taxonomy singular name', 'viroyinfra'),
            'search_items' => __('Search Project Categories', 'viroyinfra'),
            'all_items' => __('All Project Categories', 'viroyinfra'),
            'parent_item' => __('Parent Project Category', 'viroyinfra'),
            'parent_item_colon' => __('Parent Project Category:', 'viroyinfra'),
            'edit_item' => __('Edit Project Category', 'viroyinfra'),
            'update_item' => __('Update Project Category', 'viroyinfra'),
            'add_new_item' => __('Add New Project Category', 'viroyinfra'),
            'new_item_name' => __('New Project Category Name', 'viroyinfra'),
            'menu_name' => __('Categories', 'viroyinfra'),
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'project-category'),
    ));

    // Project Status
    register_taxonomy('project_status', 'project', array(
        'labels' => array(
            'name' => _x('Project Statuses', 'taxonomy general name', 'viroyinfra'),
            'singular_name' => _x('Project Status', 'taxonomy singular name', 'viroyinfra'),
            'search_items' => __('Search Project Statuses', 'viroyinfra'),
            'all_items' => __('All Project Statuses', 'viroyinfra'),
            'parent_item' => __('Parent Project Status', 'viroyinfra'),
            'parent_item_colon' => __('Parent Project Status:', 'viroyinfra'),
            'edit_item' => __('Edit Project Status', 'viroyinfra'),
            'update_item' => __('Update Project Status', 'viroyinfra'),
            'add_new_item' => __('Add New Project Status', 'viroyinfra'),
            'new_item_name' => __('New Project Status Name', 'viroyinfra'),
            'menu_name' => __('Status', 'viroyinfra'),
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'project-status'),
    ));
}
add_action('init', 'viroyinfra_register_project_cpt');

// AJAX Load More Projects Handler
function viroyinfra_ajax_load_more_projects() {
    check_ajax_referer('load_more_projects_nonce', 'security');

    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
    $posts_per_page = 10;

    $args = array(
        'post_type'      => 'project',
        'posts_per_page' => $posts_per_page,
        'paged'          => $paged,
        'post_status'    => 'publish'
    );

    $project_query = new WP_Query($args);

    if ( $project_query->have_posts() ) :
        // Calculate global offset to maintain alternating layout
        // (paged - 1) * per_page + current_loop_index (1-based)
        $offset_base = ($paged - 1) * $posts_per_page;
        $i = 0;

        while ( $project_query->have_posts() ) : $project_query->the_post();
            $i++;
            $global_i = $offset_base + $i;
            get_template_part('template-parts/content', 'project', array('global_i' => $global_i));
        endwhile;
    endif;

    wp_reset_postdata();
    die();
}
add_action('wp_ajax_load_more_projects', 'viroyinfra_ajax_load_more_projects');
add_action('wp_ajax_nopriv_load_more_projects', 'viroyinfra_ajax_load_more_projects');

// Include Project Meta Boxes
require_once get_template_directory() . '/inc/project-meta.php';

// Include CPT Rewrite Logic
require_once get_template_directory() . '/inc/cpt-rewrite.php';
?>
