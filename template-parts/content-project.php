<?php
/**
 * Template part for displaying project items
 *
 * @param array $args {
 *     @type int $i       Current item index (1-based).
 *     @type int $global_i Global item index for alternating layout.
 * }
 */

// Determine layout based on passed args or fallback
$global_i = isset($args['global_i']) ? $args['global_i'] : (isset($args['i']) ? $args['i'] : 1);
$is_even = ($global_i % 2 == 0);

// Layout classes
$img_col_order = $is_even ? 'order-md-1' : '';
$text_col_order = $is_even ? 'order-md-0' : '';
$text_align = $is_even ? 'text-md-end text-start' : '';

$thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
if (!$thumbnail) {
    $thumbnail = get_template_directory_uri() . '/img/modern-luxury-villa-large.svg';
}

// Get dynamic values
$location = get_post_meta(get_the_ID(), '_project_location', true);
$status_terms = get_the_terms(get_the_ID(), 'project_status');
$status = ($status_terms && !is_wp_error($status_terms)) ? $status_terms[0]->name : 'Available';
?>
<!-- Project Item -->
<div class="card border-0 shadow-sm mb-5 overflow-hidden project-item" data-aos="fade-up">
    <div class="row g-0 h-100">
        <div class="col-md-6 overflow-hidden <?php echo $img_col_order; ?>">
            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo esc_url($thumbnail); ?>" class="img-fluid h-100 object-fit-cover gallery-img" alt="<?php the_title_attribute(); ?>" style="min-height: 350px;">
            </a>
        </div>
        <div class="col-md-6 d-flex align-items-center <?php echo $text_col_order; ?>">
            <div class="card-body p-4 p-lg-5 <?php echo $text_align; ?>">
                <span class="badge bg-navy text-white mb-3">Featured</span>
                <h3 class="card-title font-playfair mb-2"><?php the_title(); ?></h3>
                <p class="text-muted mb-4"><i class="bi bi-geo-alt-fill text-accent"></i> <?php echo $location ? esc_html($location) : 'Location Info'; ?></p>

                <div class="project-details mb-4">
                    <div class="row g-3 <?php echo $is_even ? 'justify-content-md-end' : ''; ?>">
                        <div class="col-6">
                            <p class="mb-1 text-muted small text-uppercase">Description</p>
                            <p class="fw-semibold"><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
                        </div>
                        <div class="col-6">
                            <p class="mb-1 text-muted small text-uppercase">Status</p>
                            <p class="fw-semibold text-success"><?php echo esc_html($status); ?></p>
                        </div>
                    </div>
                </div>

                <a href="<?php the_permalink(); ?>" class="btn <?php echo $is_even ? 'btn-outline-dark' : 'btn-accent text-white'; ?> rounded-pill px-4">View Project</a>
            </div>
        </div>
    </div>
</div>
