<?php
/**
 * Projects Archive Template
 */
get_header();
?>

    <!-- Page Header -->
    <section class="page-header d-flex align-items-center justify-content-center" style="height: 40vh; background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('<?php echo get_template_directory_uri(); ?>/img/projects-bg.svg'); background-size: cover; background-position: center;">
        <div class="text-center text-white" data-aos="fade-up">
            <h1 class="display-3 font-playfair mb-3"><?php _e('Our Projects', 'viroyinfra'); ?></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>" class="text-white text-decoration-none"><?php _e('Home', 'viroyinfra'); ?></a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page"><?php _e('Projects', 'viroyinfra'); ?></li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <main id="main-content">
        <div class="container mt-5 pt-4">

            <!-- Projects Archive List -->
            <div class="section-spacer">
                <div class="row g-4 justify-content-center">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            get_template_part('template-parts/content', 'project');
                        endwhile;

                        // Pagination
                        the_posts_pagination(array(
                            'mid_size'  => 2,
                            'prev_text' => __('&laquo; Previous', 'viroyinfra'),
                            'next_text' => __('Next &raquo;', 'viroyinfra'),
                        ));
                    else :
                        echo '<p class="text-center">' . __('No projects found.', 'viroyinfra') . '</p>';
                    endif;
                    ?>
                </div>
            </div>

        </div>
    </main>

<?php get_footer(); ?>
