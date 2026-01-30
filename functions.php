<?php
function viroyinfra_scripts() {
    // Styles
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0');
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css', array(), '1.10.0');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap', array(), null);
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1');
    wp_enqueue_style('viroyinfra-style', get_stylesheet_uri());

    // Scripts
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '5.3.0', true);
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true);

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
        'rewrite'               => array('slug' => 'projects'),
    );
    register_post_type('project', $args);
}
add_action('init', 'viroyinfra_register_project_cpt');
?>
