<?php
get_header();
?>

    <!-- Page Header -->
    <section class="page-header d-flex align-items-center justify-content-center" style="height: 40vh; background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('<?php echo get_template_directory_uri(); ?>/img/projects-bg.svg'); background-size: cover; background-position: center;">
        <div class="text-center text-white" data-aos="fade-up">
            <h1 class="display-3 font-playfair mb-3">Our Projects</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>" class="text-white text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Projects</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <main id="main-content">
        <div class="container mt-5 pt-4">

            <!-- Projects Archive List -->
            <div class="section-spacer">
                <div id="project-list">
                    <?php
                    if ( have_posts() ) :
                        $i = 0;
                        while ( have_posts() ) : the_post();
                            $i++;
                            get_template_part('template-parts/content', 'project', array('global_i' => $i));
                        endwhile;
                    else :
                        echo '<p class="text-center text-muted">No projects found.</p>';
                    endif;
                    ?>
                </div>

                <?php if ( $wp_query->max_num_pages > 1 ) : ?>
                    <div class="text-center mt-5">
                        <button id="load-more-projects" class="btn btn-outline-dark rounded-pill px-5 py-3 text-uppercase fw-bold" data-page="1" data-max="<?php echo $wp_query->max_num_pages; ?>">
                            Load More Projects <i class="bi bi-arrow-down ms-2"></i>
                        </button>
                    </div>
                <?php endif; ?>

            </div>

        </div>
    </main>

<?php get_footer(); ?>
