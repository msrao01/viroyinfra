<?php get_header(); ?>

    <!-- Hero Section -->
    <section id="home" class="p-0">
        <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/hero-welcome.svg" class="d-block w-100 hero-img" alt="Viroy Infra">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="display-4 font-playfair">Building Dreams</h5>
                        <p class="lead">Premium real estate solutions for the modern world</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/hero-featured.svg" class="d-block w-100 hero-img" alt="Featured Project">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="display-4 font-playfair">Featured Project</h5>
                        <p class="lead">Discover our latest masterpiece in modern living</p>
                        <a href="<?php echo home_url('/project/featured'); ?>" class="btn btn-accent rounded-pill px-4 mt-3">View Project</a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Main Content -->
    <main id="main-content">
        <div class="container mt-5 pt-4">

            <!-- About Us Section -->
            <div id="about" class="section-spacer" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h3 class="section-title">About Us</h3>
                        <p class="lead-text">Viroy Infra is a premier real estate development company dedicated to creating sustainable, luxurious, and innovative living spaces. With a commitment to quality and excellence, we transform landscapes into thriving communities.</p>
                        <p class="text-muted mb-5">Our portfolio spans residential, commercial, and mixed-use projects, each designed with meticulous attention to detail and a focus on customer satisfaction.</p>

                        <!-- Counters -->
                        <div class="row g-4 justify-content-center mt-4">
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm py-4 h-100">
                                    <div class="card-body">
                                        <h2 class="display-4 font-playfair text-accent mb-0"><span class="counter-value" data-target="15">0</span>+</h2>
                                        <p class="text-muted text-uppercase small letter-spacing-1 mt-2">Years of Experience</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm py-4 h-100">
                                    <div class="card-body">
                                        <h2 class="display-4 font-playfair text-accent mb-0"><span class="counter-value" data-target="50">0</span>+</h2>
                                        <p class="text-muted text-uppercase small letter-spacing-1 mt-2">Projects Completed</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm py-4 h-100">
                                    <div class="card-body">
                                        <h2 class="display-4 font-playfair text-accent mb-0"><span class="counter-value" data-target="1200">0</span>+</h2>
                                        <p class="text-muted text-uppercase small letter-spacing-1 mt-2">Happy Families</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Featured Projects Section -->
            <div id="featured" class="section-spacer">
                <h3 class="section-title text-center" data-aos="fade-up"><?php _e('Featured Projects', 'viroyinfra'); ?></h3>
                <div class="row g-4 justify-content-center">
                    <?php
                    $args = array(
                        'post_type' => 'project',
                        'posts_per_page' => 3,
                    );
                    $projects_query = new WP_Query($args);

                    if ($projects_query->have_posts()) :
                        while ($projects_query->have_posts()) : $projects_query->the_post();
                            get_template_part('template-parts/content', 'project');
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p class="text-center text-muted">' . __('No projects found.', 'viroyinfra') . '</p>';
                    endif;
                    ?>
                </div>
            </div>

            <!-- Contact Us Section (Reused) -->
            <div id="contact" class="section-spacer">
                <h3 class="section-title text-center" data-aos="fade-up">Contact Us</h3>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row g-4">
                            <div class="col-lg-4" data-aos="fade-right">
                                <!-- Contact Info -->
                                <div class="card h-100 shadow-sm border-0 text-center p-4">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <div class="mb-4 text-accent">
                                            <i class="bi bi-building fs-1"></i>
                                        </div>
                                        <h4 class="card-title font-playfair mb-3">Head Office</h4>
                                        <div class="contact-info">
                                            <p class="card-text mb-2"><i class="bi bi-geo-alt-fill text-accent me-2"></i> 100 Real Estate Blvd, City, Country</p>
                                            <p class="card-text mb-2"><i class="bi bi-telephone-fill text-accent me-2"></i> (123) 456-7890</p>
                                            <p class="card-text"><i class="bi bi-envelope-fill text-accent me-2"></i> info@viroyinfra.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8" data-aos="fade-left">
                                <!-- Contact Form -->
                                <div class="card h-100 shadow-sm border-0 overflow-hidden">
                                    <div class="card-header bg-navy text-white p-4">
                                        <h5 class="mb-0 font-playfair">Get in Touch</h5>
                                    </div>
                                    <div class="card-body p-4">
                                        <form>
                                            <div class="mb-3">
                                                <label for="name" class="form-label text-muted small text-uppercase">Name</label>
                                                <input type="text" class="form-control form-control-lg" id="name" placeholder="Your Name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label text-muted small text-uppercase">Email</label>
                                                <input type="email" class="form-control form-control-lg" id="email" placeholder="Your Email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="message" class="form-label text-muted small text-uppercase">Message</label>
                                                <textarea class="form-control form-control-lg" id="message" rows="3" placeholder="How can we help you?"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-accent w-100 py-3 text-uppercase fw-bold mt-2">Send Message</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

<?php get_footer(); ?>
