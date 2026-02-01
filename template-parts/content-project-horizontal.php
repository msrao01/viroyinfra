<?php
/**
 * Template Part for Project Loop Item (Horizontal Layout)
 */
$thumbnail_url = get_the_post_thumbnail_url() ?: get_template_directory_uri() . '/img/modern-luxury-villa-large.svg';

// Get Terms
$status = get_the_terms(get_the_ID(), 'project_status');
$status_name = !empty($status) && !is_wp_error($status) ? $status[0]->name : 'Active';

$category = get_the_terms(get_the_ID(), 'project_category');
$cat_name = !empty($category) && !is_wp_error($category) ? $category[0]->name : 'Residential';

// Get Meta
$location = get_post_meta(get_the_ID(), '_viroyinfra_location', true) ?: 'Location Info';

// Alternating Logic: Use global counter or check current post index
global $wp_query;
$index = $wp_query->current_post;
$order_class = ($index % 2 !== 0) ? 'order-md-1' : ''; // Image order
$text_order_class = ($index % 2 !== 0) ? 'order-md-0 text-md-end text-start' : ''; // Text order
$badge_class = ($index % 2 !== 0) ? 'bg-secondary' : 'bg-navy'; // Just to vary styling like original
?>

<div class="card border-0 shadow-sm mb-5 overflow-hidden" data-aos="fade-up">
    <div class="row g-0 h-100">
        <div class="col-md-6 overflow-hidden <?php echo esc_attr($order_class); ?>">
            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo esc_url($thumbnail_url); ?>" class="img-fluid h-100 object-fit-cover gallery-img" alt="<?php the_title(); ?>" style="min-height: 350px; width: 100%;">
            </a>
        </div>
        <div class="col-md-6 d-flex align-items-center <?php echo esc_attr($text_order_class); ?>">
            <div class="card-body p-4 p-lg-5">
                <span class="badge <?php echo esc_attr($badge_class); ?> text-white mb-3"><?php echo esc_html($status_name); ?></span>
                <h3 class="card-title font-playfair mb-2"><a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark"><?php the_title(); ?></a></h3>
                <p class="text-muted mb-4"><i class="bi bi-geo-alt-fill text-accent"></i> <?php echo esc_html($location); ?></p>

                <div class="project-details mb-4">
                    <div class="row g-3 <?php echo ($index % 2 !== 0) ? 'justify-content-md-end' : ''; ?>">
                        <div class="col-6">
                            <p class="mb-1 text-muted small text-uppercase"><?php _e('Category', 'viroyinfra'); ?></p>
                            <p class="fw-semibold"><?php echo esc_html($cat_name); ?></p>
                        </div>
                        <!-- Add other dynamic details if available, otherwise simplified -->
                    </div>
                </div>

                <a href="<?php the_permalink(); ?>" class="btn <?php echo ($index % 2 !== 0) ? 'btn-outline-dark' : 'btn-accent text-white'; ?> rounded-pill px-4"><?php _e('View Project', 'viroyinfra'); ?></a>
            </div>
        </div>
    </div>
</div>
