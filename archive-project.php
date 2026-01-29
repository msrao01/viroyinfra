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
                <?php
                if ( have_posts() ) :
                    $i = 0;
                    while ( have_posts() ) : the_post();
                        $i++;
                        $is_even = ($i % 2 == 0);

                        // Layout classes
                        $row_class = $is_even ? '' : ''; // Currently both are same row structure, but col order changes
                        $img_col_order = $is_even ? 'order-md-1' : '';
                        $text_col_order = $is_even ? 'order-md-0' : '';
                        $text_align = $is_even ? 'text-md-end text-start' : '';

                        $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        if (!$thumbnail) {
                            $thumbnail = get_template_directory_uri() . '/img/modern-luxury-villa-large.svg';
                        }
                ?>
                <!-- Project Item <?php echo $i; ?> -->
                <div class="card border-0 shadow-sm mb-5 overflow-hidden" data-aos="fade-up">
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
                                <p class="text-muted mb-4"><i class="bi bi-geo-alt-fill text-accent"></i> Location Info</p>

                                <div class="project-details mb-4">
                                    <div class="row g-3 <?php echo $is_even ? 'justify-content-md-end' : ''; ?>">
                                        <div class="col-6">
                                            <p class="mb-1 text-muted small text-uppercase">Description</p>
                                            <p class="fw-semibold"><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
                                        </div>
                                        <!-- Placeholder stats since we don't have custom fields -->
                                        <div class="col-6">
                                            <p class="mb-1 text-muted small text-uppercase">Status</p>
                                            <p class="fw-semibold text-success">Available</p>
                                        </div>
                                    </div>
                                </div>

                                <a href="<?php the_permalink(); ?>" class="btn <?php echo $is_even ? 'btn-outline-dark' : 'btn-accent text-white'; ?> rounded-pill px-4">View Project</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    endwhile;

                    // Pagination
                    the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => '<i class="bi bi-arrow-left"></i> Previous',
                        'next_text' => 'Next <i class="bi bi-arrow-right"></i>',
                    ));

                else :
                    echo '<p class="text-center text-muted">No projects found.</p>';
                endif;
                ?>

            </div>

        </div>
    </main>

<?php get_footer(); ?>
