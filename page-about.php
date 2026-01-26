<?php
/* Template Name: About Us */
get_header();
?>

    <!-- Page Header -->
    <section class="page-header d-flex align-items-center justify-content-center" style="height: 40vh; background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('<?php echo get_template_directory_uri(); ?>/img/about-bg.svg'); background-size: cover; background-position: center;">
        <div class="text-center text-white" data-aos="fade-up">
            <h1 class="display-3 font-playfair mb-3">About Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>" class="text-white text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <main id="main-content">
        <div class="container mt-5 pt-4">

            <!-- About Content -->
            <div class="section-spacer" data-aos="fade-up">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/our-mission.svg" class="img-fluid rounded shadow-sm" alt="About Image">
                    </div>
                    <div class="col-lg-6">
                        <h3 class="section-title mb-4">Who We Are</h3>
                        <p class="lead text-muted mb-4">Viroy Infra is a premier real estate development company dedicated to creating sustainable, luxurious, and innovative living spaces.</p>
                        <p class="text-muted mb-4">Founded with a vision to redefine urban living, we combine architectural excellence with environmental responsibility. Our team of experts works tirelessly to deliver projects that not only meet but exceed our clients' expectations.</p>
                        <p class="text-muted">From residential complexes to commercial hubs, every Viroy Infra project is a testament to quality, integrity, and trust.</p>
                    </div>
                </div>
            </div>

            <!-- Counters -->
            <div class="section-spacer bg-light rounded px-4" data-aos="fade-up">
                <div class="row g-4 justify-content-center text-center">
                    <div class="col-md-4">
                        <h2 class="display-4 font-playfair text-accent mb-0"><span class="counter-value" data-target="15">0</span>+</h2>
                        <p class="text-muted text-uppercase small letter-spacing-1 mt-2">Years of Experience</p>
                    </div>
                    <div class="col-md-4">
                        <h2 class="display-4 font-playfair text-accent mb-0"><span class="counter-value" data-target="50">0</span>+</h2>
                        <p class="text-muted text-uppercase small letter-spacing-1 mt-2">Projects Completed</p>
                    </div>
                    <div class="col-md-4">
                        <h2 class="display-4 font-playfair text-accent mb-0"><span class="counter-value" data-target="1200">0</span>+</h2>
                        <p class="text-muted text-uppercase small letter-spacing-1 mt-2">Happy Families</p>
                    </div>
                </div>
            </div>

            <!-- Team Section -->
            <div class="section-spacer" data-aos="fade-up">
                <div class="text-center mb-5">
                    <h3 class="section-title">Meet Our Team</h3>
                    <p class="text-muted">The experts behind our success</p>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-4 col-sm-6">
                        <div class="card border-0 text-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/team-1.svg" class="card-img-top rounded mb-3 object-fit-cover" alt="Team 1">
                            <div class="card-body p-0">
                                <h5 class="font-playfair mb-1">John Smith</h5>
                                <p class="text-muted small">Founder & CEO</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="card border-0 text-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/team-2.svg" class="card-img-top rounded mb-3 object-fit-cover" alt="Team 2">
                            <div class="card-body p-0">
                                <h5 class="font-playfair mb-1">Sarah Johnson</h5>
                                <p class="text-muted small">Head Architect</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="card border-0 text-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/team-3.svg" class="card-img-top rounded mb-3 object-fit-cover" alt="Team 3">
                            <div class="card-body p-0">
                                <h5 class="font-playfair mb-1">Michael Brown</h5>
                                <p class="text-muted small">Project Manager</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

<?php get_footer(); ?>
