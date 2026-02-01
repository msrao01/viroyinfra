<?php
/**
 * The template for displaying 404 pages (not found)
 */
get_header();
?>

<main id="main-content" class="py-5">
    <div class="container text-center section-spacer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="display-1 fw-bold text-accent">404</h1>
                <h2 class="mb-4 font-playfair"><?php _e( 'Page Not Found', 'viroyinfra' ); ?></h2>
                <p class="lead mb-5"><?php _e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'viroyinfra' ); ?></p>

                <a href="<?php echo home_url(); ?>" class="btn btn-navy rounded-pill px-5 py-3 text-white">
                    <i class="bi bi-house-door-fill me-2"></i> <?php _e( 'Back to Home', 'viroyinfra' ); ?>
                </a>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
