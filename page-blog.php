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

                    <!-- Blog Post 1 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/blog-post-1.svg" class="card-img-top object-fit-cover" alt="Blog 1" style="height: 250px;">
                            <div class="card-body p-4">
                                <div class="text-accent small text-uppercase mb-2">Real Estate Trends</div>
                                <h5 class="font-playfair mb-3"><a href="#" class="text-decoration-none text-dark">The Future of Luxury Living in 2024</a></h5>
                                <p class="text-muted small mb-4">Explore the emerging trends in high-end real estate, from sustainable architecture to smart home integration.</p>
                                <a href="#" class="btn btn-link text-accent p-0 text-decoration-none fw-bold">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                            <div class="card-footer bg-white border-0 px-4 pb-4">
                                <small class="text-muted">October 15, 2023</small>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Post 2 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/blog-post-2.svg" class="card-img-top object-fit-cover" alt="Blog 2" style="height: 250px;">
                            <div class="card-body p-4">
                                <div class="text-accent small text-uppercase mb-2">Interior Design</div>
                                <h5 class="font-playfair mb-3"><a href="#" class="text-decoration-none text-dark">Top 5 Interior Design Styles for Modern Villas</a></h5>
                                <p class="text-muted small mb-4">Discover how to transform your villa into a masterpiece with these timeless and contemporary design styles.</p>
                                <a href="#" class="btn btn-link text-accent p-0 text-decoration-none fw-bold">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                            <div class="card-footer bg-white border-0 px-4 pb-4">
                                <small class="text-muted">September 28, 2023</small>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Post 3 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/blog-post-3.svg" class="card-img-top object-fit-cover" alt="Blog 3" style="height: 250px;">
                            <div class="card-body p-4">
                                <div class="text-accent small text-uppercase mb-2">Investment</div>
                                <h5 class="font-playfair mb-3"><a href="#" class="text-decoration-none text-dark">Why Real Estate is the Best Long-term Investment</a></h5>
                                <p class="text-muted small mb-4">A comprehensive guide to understanding the value of property investment in the current economic climate.</p>
                                <a href="#" class="btn btn-link text-accent p-0 text-decoration-none fw-bold">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                            <div class="card-footer bg-white border-0 px-4 pb-4">
                                <small class="text-muted">September 10, 2023</small>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Post 4 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/blog-post-4.svg" class="card-img-top object-fit-cover" alt="Blog 4" style="height: 250px;">
                            <div class="card-body p-4">
                                <div class="text-accent small text-uppercase mb-2">Market Analysis</div>
                                <h5 class="font-playfair mb-3"><a href="#" class="text-decoration-none text-dark">Understanding the Housing Market Cycle</a></h5>
                                <p class="text-muted small mb-4">Key insights into how market cycles work and how to time your real estate purchases effectively.</p>
                                <a href="#" class="btn btn-link text-accent p-0 text-decoration-none fw-bold">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                            <div class="card-footer bg-white border-0 px-4 pb-4">
                                <small class="text-muted">August 22, 2023</small>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Post 5 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/blog-post-5.svg" class="card-img-top object-fit-cover" alt="Blog 5" style="height: 250px;">
                            <div class="card-body p-4">
                                <div class="text-accent small text-uppercase mb-2">Lifestyle</div>
                                <h5 class="font-playfair mb-3"><a href="#" class="text-decoration-none text-dark">Living Green: Sustainable Features for Your Home</a></h5>
                                <p class="text-muted small mb-4">How to incorporate eco-friendly features into your luxury home without compromising on style.</p>
                                <a href="#" class="btn btn-link text-accent p-0 text-decoration-none fw-bold">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                            <div class="card-footer bg-white border-0 px-4 pb-4">
                                <small class="text-muted">August 05, 2023</small>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Post 6 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/blog-post-6.svg" class="card-img-top object-fit-cover" alt="Blog 6" style="height: 250px;">
                            <div class="card-body p-4">
                                <div class="text-accent small text-uppercase mb-2">Construction</div>
                                <h5 class="font-playfair mb-3"><a href="#" class="text-decoration-none text-dark">The Art of Modern Construction</a></h5>
                                <p class="text-muted small mb-4">A behind-the-scenes look at the technologies and materials shaping today's skylines.</p>
                                <a href="#" class="btn btn-link text-accent p-0 text-decoration-none fw-bold">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                            <div class="card-footer bg-white border-0 px-4 pb-4">
                                <small class="text-muted">July 18, 2023</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>

<?php get_footer(); ?>
