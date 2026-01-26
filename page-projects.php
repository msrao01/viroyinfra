<?php
/* Template Name: Projects Archive */
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

                <!-- Project Item 1 -->
                <div class="card border-0 shadow-sm mb-5 overflow-hidden" data-aos="fade-up">
                    <div class="row g-0 h-100">
                        <div class="col-md-6 overflow-hidden">
                            <a href="<?php echo home_url('/project/modern-luxury-villa'); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/modern-luxury-villa-large.svg" class="img-fluid h-100 object-fit-cover gallery-img" alt="Modern Luxury Villa" style="min-height: 350px;">
                            </a>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5">
                                <span class="badge bg-navy text-white mb-3">For Sale</span>
                                <h3 class="card-title font-playfair mb-2">Modern Luxury Villa</h3>
                                <p class="text-muted mb-4"><i class="bi bi-geo-alt-fill text-accent"></i> Beverly Hills, CA</p>

                                <div class="project-details mb-4">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <p class="mb-1 text-muted small text-uppercase">Project Size</p>
                                            <p class="fw-semibold">4,200 Sqft</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-1 text-muted small text-uppercase">Status</p>
                                            <p class="fw-semibold text-success">Under Construction</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-1 text-muted small text-uppercase">Units</p>
                                            <p class="fw-semibold">1 Unit (Single Family)</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-1 text-muted small text-uppercase">Type</p>
                                            <p class="fw-semibold">Residential</p>
                                        </div>
                                    </div>
                                </div>

                                <a href="<?php echo home_url('/project/modern-luxury-villa'); ?>" class="btn btn-accent rounded-pill px-4 text-white">View Project</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Item 2 -->
                <div class="card border-0 shadow-sm mb-5 overflow-hidden" data-aos="fade-up">
                    <div class="row g-0 h-100">
                        <div class="col-md-6 order-md-1 overflow-hidden">
                            <a href="<?php echo home_url('/project/city-heights'); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/city-heights-large.svg" class="img-fluid h-100 object-fit-cover gallery-img" alt="City Heights" style="min-height: 350px;">
                            </a>
                        </div>
                        <div class="col-md-6 d-flex align-items-center order-md-0">
                            <div class="card-body p-4 p-lg-5 text-md-end text-start">
                                <span class="badge bg-secondary text-white mb-3">Sold Out</span>
                                <h3 class="card-title font-playfair mb-2">City Heights</h3>
                                <p class="text-muted mb-4"><i class="bi bi-geo-alt-fill text-accent"></i> Downtown, NY</p>

                                <div class="project-details mb-4">
                                    <div class="row g-3 justify-content-md-end">
                                        <div class="col-6">
                                            <p class="mb-1 text-muted small text-uppercase">Project Size</p>
                                            <p class="fw-semibold">50,000 Sqft</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-1 text-muted small text-uppercase">Status</p>
                                            <p class="fw-semibold text-muted">Completed</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-1 text-muted small text-uppercase">Units</p>
                                            <p class="fw-semibold">40 Apartments</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-1 text-muted small text-uppercase">Type</p>
                                            <p class="fw-semibold">Mixed Use</p>
                                        </div>
                                    </div>
                                </div>

                                <a href="<?php echo home_url('/project/city-heights'); ?>" class="btn btn-outline-dark rounded-pill px-4">View Project</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Item 3 -->
                <div class="card border-0 shadow-sm mb-5 overflow-hidden" data-aos="fade-up">
                    <div class="row g-0 h-100">
                        <div class="col-md-6 overflow-hidden">
                            <a href="<?php echo home_url('/project/seaside-retreat'); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/seaside-retreat-large.svg" class="img-fluid h-100 object-fit-cover gallery-img" alt="Seaside Retreat" style="min-height: 350px;">
                            </a>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5">
                                <span class="badge bg-navy text-white mb-3">New Launch</span>
                                <h3 class="card-title font-playfair mb-2">Seaside Retreat</h3>
                                <p class="text-muted mb-4"><i class="bi bi-geo-alt-fill text-accent"></i> Miami, FL</p>

                                <div class="project-details mb-4">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <p class="mb-1 text-muted small text-uppercase">Project Size</p>
                                            <p class="fw-semibold">12,500 Sqft</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-1 text-muted small text-uppercase">Status</p>
                                            <p class="fw-semibold text-primary">Pre-Booking</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-1 text-muted small text-uppercase">Units</p>
                                            <p class="fw-semibold">12 Villas</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-1 text-muted small text-uppercase">Type</p>
                                            <p class="fw-semibold">Gated Community</p>
                                        </div>
                                    </div>
                                </div>

                                <a href="<?php echo home_url('/project/seaside-retreat'); ?>" class="btn btn-accent rounded-pill px-4 text-white">View Project</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>

<?php get_footer(); ?>
