<?php
get_header();
?>

    <!-- Page Header -->
    <section class="page-header d-flex align-items-center justify-content-center" style="height: 40vh; background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('<?php echo get_template_directory_uri(); ?>/img/index-bg.svg'); background-size: cover; background-position: center;">
        <div class="text-center text-white" data-aos="fade-up">
            <h1 class="display-3 font-playfair mb-3"><?php the_title(); ?></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>" class="text-white text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page"><?php the_title(); ?></li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <main id="main-content">
        <div class="container mt-5 pt-4">
            <div class="section-spacer" data-aos="fade-up">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                else :
                    echo '<p>No content found</p>';
                endif;
                ?>
            </div>
        </div>
    </main>

<?php get_footer(); ?>
