<?php
/**
 * Template Part for Project Loop Item
 */
$thumbnail_url = get_the_post_thumbnail_url() ?: get_template_directory_uri() . '/img/modern-luxury-villa-thumb.svg';

// Get Terms
$status = get_the_terms(get_the_ID(), 'project_status');
$status_name = !empty($status) && !is_wp_error($status) ? $status[0]->name : 'Active';

$category = get_the_terms(get_the_ID(), 'project_category');
$cat_name = !empty($category) && !is_wp_error($category) ? $category[0]->name : 'Residential';

// Get Meta
$location = get_post_meta(get_the_ID(), '_viroyinfra_location', true) ?: 'Location Info';
// Assuming we might have size/units meta, otherwise hardcoded fallback or generic for now since they weren't in the original spec explicitly beyond "Project Details" meta box.
// Let's use custom fields if they existed, or just generic placeholders if not requested yet. The user asked for "Description, Location, Galleries".
// I'll stick to what we have.
?>
<div class="col-md-4" data-aos="fade-up">
    <div class="card h-100 border-0 shadow-sm project-card">
        <div class="overflow-hidden rounded-top position-relative">
            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo esc_url($thumbnail_url); ?>" loading="lazy" class="card-img-top gallery-img object-fit-cover" alt="<?php the_title(); ?>" style="height: 250px;">
            </a>
            <div class="position-absolute top-0 end-0 m-3">
                <span class="badge bg-navy text-white p-2"><?php echo esc_html($status_name); ?></span>
            </div>
        </div>
        <div class="card-body p-4 text-center">
            <h5 class="card-title font-playfair mb-2"><a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark"><?php the_title(); ?></a></h5>
            <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-accent"></i> <?php echo esc_html($location); ?></p>
            <p class="card-text text-muted mb-4"><?php echo get_the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-outline-dark btn-sm rounded-pill px-4"><?php _e('View Details', 'viroyinfra'); ?></a>
        </div>
    </div>
</div>
