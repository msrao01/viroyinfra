<?php
/* Template Name: Blog */
get_header();
?>

    <!-- Page Header -->
    <section class="page-header d-flex align-items-center justify-content-center" style="height: 40vh; background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('<?php echo get_template_directory_uri(); ?>/img/blog-bg.svg'); background-size: cover; background-position: center;">
        <div class="text-center text-white" data-aos="fade-up">
            <h1 class="display-3 font-playfair mb-3">Latest News</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>" class="text-white text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Blog</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <main id="main-content">
        <div class="container mt-5 pt-4">

            <div class="section-spacer" data-aos="fade-up">
                <div class="row g-4">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 6,
                        'paged'          => $paged
                    );
                    $blog_query = new WP_Query($args);

                    if ($blog_query->have_posts()) :
                        while ($blog_query->have_posts()) : $blog_query->the_post();
                            // Get thumbnail or fallback
                            $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                            if (!$thumbnail) {
                                $thumbnail = get_template_directory_uri() . '/img/blog-post-1.svg'; // Fallback
                            }
                    ?>
                    <!-- Blog Post Item -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo esc_url($thumbnail); ?>" class="card-img-top object-fit-cover" alt="<?php the_title_attribute(); ?>" style="height: 250px;">
                            </a>
                            <div class="card-body p-4">
                                <div class="text-accent small text-uppercase mb-2"><?php the_category(', '); ?></div>
                                <h5 class="font-playfair mb-3"><a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark"><?php the_title(); ?></a></h5>
                                <p class="text-muted small mb-4"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-link text-accent p-0 text-decoration-none fw-bold">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                            <div class="card-footer bg-white border-0 px-4 pb-4">
                                <small class="text-muted"><?php echo get_the_date(); ?></small>
                            </div>
                        </div>
                    </div>
                    <?php
                        endwhile;

                        // Pagination
                        echo '<div class="col-12 mt-5">';
                        echo '<nav aria-label="Page navigation">';
                        echo paginate_links(array(
                            'total' => $blog_query->max_num_pages,
                            'current' => $paged,
                            'format' => '?paged=%#%',
                            'type' => 'list',
                            'prev_text' => '<i class="bi bi-arrow-left"></i> Previous',
                            'next_text' => 'Next <i class="bi bi-arrow-right"></i>',
                            'mid_size' => 2
                        ));
                        echo '</nav>';
                        echo '</div>';

                        wp_reset_postdata();
                    else :
                        echo '<div class="col-12"><p class="text-center text-muted">No blog posts found.</p></div>';
                    endif;
                    ?>

                </div>
            </div>

        </div>
    </main>

<?php get_footer(); ?>
