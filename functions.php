<?php
function viroyinfra_scripts() {
    // Styles
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0');
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css', array(), '1.10.0');
    wp_enqueue_style('material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), null);
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

// Include Custom Meta
require_once get_template_directory() . '/inc/project-meta.php';

/**
 * Render Gallery Function
 *
 * Renders a grid or carousel gallery based on the number of images.
 *
 * @param array|string $image_ids Array or comma-separated list of attachment IDs.
 * @param array $args Configuration arguments.
 */
function viroyinfra_render_gallery($image_ids, $args = []) {
    if (empty($image_ids)) {
        return;
    }

    $defaults = [
        'images_per_slide' => 2,
        'grid_threshold'   => 2,
        'carousel_id'      => 'floorPlanCarousel' . uniqid(),
        'aos_animation'    => 'fade-up',
        'modal_target'     => '#imageModal',
        'col_class'        => 'col-md-6'
    ];
    $args = wp_parse_args($args, $defaults);

    // Ensure ids are array
    if (!is_array($image_ids)) {
        $image_ids = explode(',', $image_ids);
    }
    $image_ids = array_filter($image_ids); // clean empty
    $count = count($image_ids);

    if ($count == 0) return;

    // Grid Layout
    if ($count <= $args['grid_threshold']) {
        echo '<div class="row g-4 justify-content-center">';
        foreach ($image_ids as $index => $id) {
            $img_url = wp_get_attachment_image_url($id, 'large');
            $img_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
            $title = get_the_title($id);

            // Calculate delay for AOS
            $delay = ($index + 1) * 100;

            echo '<div class="' . esc_attr($args['col_class']) . '" data-aos="' . esc_attr($args['aos_animation']) . '" data-aos-delay="' . $delay . '">';
            echo '  <div class="card plan-card border-0 shadow-sm h-100 cursor-pointer" data-bs-toggle="modal" data-bs-target="' . esc_attr($args['modal_target']) . '" data-bs-src="' . esc_url($img_url) . '">';
            echo '      <div class="overflow-hidden rounded-top gallery-image-container">';
            echo '          <img src="' . esc_url($img_url) . '" class="card-img-top gallery-img object-fit-contain" alt="' . esc_attr($img_alt) . '">';
            echo '      </div>';
            echo '      <div class="card-body text-center py-4">';
            echo '          <h5 class="card-title font-playfair">' . esc_html($title) . '</h5>';
            echo '          <p class="text-muted small mb-0">Click to enlarge</p>';
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
        }
        echo '</div>';
    }
    // Carousel Layout
    else {
        echo '<div id="' . esc_attr($args['carousel_id']) . '" class="carousel slide" data-bs-ride="carousel">';
        echo '<div class="carousel-inner">';

        $chunks = array_chunk($image_ids, $args['images_per_slide']);
        foreach ($chunks as $index => $chunk) {
            $active_class = ($index === 0) ? 'active' : '';
            echo '<div class="carousel-item ' . $active_class . '">';
            echo '<div class="row g-4 justify-content-center">';

            foreach ($chunk as $chunk_index => $id) {
                $img_url = wp_get_attachment_image_url($id, 'large');
                $img_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
                $title = get_the_title($id);

                echo '<div class="' . esc_attr($args['col_class']) . '">';
                echo '  <div class="card plan-card border-0 shadow-sm h-100 cursor-pointer" data-bs-toggle="modal" data-bs-target="' . esc_attr($args['modal_target']) . '" data-bs-src="' . esc_url($img_url) . '">';
                echo '      <div class="overflow-hidden rounded-top gallery-image-container">';
                echo '          <img src="' . esc_url($img_url) . '" class="card-img-top gallery-img object-fit-contain" alt="' . esc_attr($img_alt) . '">';
                echo '      </div>';
                echo '      <div class="card-body text-center py-4">';
                echo '          <h5 class="card-title font-playfair">' . esc_html($title) . '</h5>';
                echo '          <p class="text-muted small mb-0">Click to enlarge</p>';
                echo '      </div>';
                echo '  </div>';
                echo '</div>';
            }

            echo '</div>'; // End row
            echo '</div>'; // End carousel-item
        }

        echo '</div>'; // End carousel-inner

        // Controls
        // Only show if there is more than 1 chunk (slide)
        if (count($chunks) > 1) {
            echo '<button class="carousel-control-prev" type="button" data-bs-target="#' . esc_attr($args['carousel_id']) . '" data-bs-slide="prev" style="width: 5%;">';
            echo '<span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>';
            echo '<span class="visually-hidden">Previous</span>';
            echo '</button>';
            echo '<button class="carousel-control-next" type="button" data-bs-target="#' . esc_attr($args['carousel_id']) . '" data-bs-slide="next" style="width: 5%;">';
            echo '<span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>';
            echo '<span class="visually-hidden">Next</span>';
            echo '</button>';
        }

        echo '</div>'; // End carousel
    }
}
?>
