<?php
/* Template Name: Contact Us */
get_header();
?>

    <!-- Page Header -->
    <section class="page-header d-flex align-items-center justify-content-center" style="height: 40vh; background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('<?php echo get_template_directory_uri(); ?>/img/contact-bg.svg'); background-size: cover; background-position: center;">
        <div class="text-center text-white" data-aos="fade-up">
            <h1 class="display-3 font-playfair mb-3">Contact Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>" class="text-white text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <main id="main-content">
        <div class="container mt-5 pt-4">

            <div class="section-spacer" data-aos="fade-up">
                <div class="row g-5">
                    <!-- Contact Info & Map -->
                    <div class="col-lg-5">
                        <h3 class="section-title mb-4">Get in Touch</h3>
                        <p class="text-muted mb-5">Have a question or want to schedule a visit? We'd love to hear from you. Reach out to us using the form or visit our office.</p>

                        <div class="d-flex mb-4">
                            <div class="text-accent me-4">
                                <i class="bi bi-geo-alt-fill fs-3"></i>
                            </div>
                            <div>
                                <h5 class="font-playfair">Office Address</h5>
                                <p class="text-muted small">123 Real Estate Blvd,<br>Beverly Hills, CA 90210</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="text-accent me-4">
                                <i class="bi bi-telephone-fill fs-3"></i>
                            </div>
                            <div>
                                <h5 class="font-playfair">Phone Number</h5>
                                <p class="text-muted small">+1 (555) 123-4567<br>+1 (555) 987-6543</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="text-accent me-4">
                                <i class="bi bi-envelope-fill fs-3"></i>
                            </div>
                            <div>
                                <h5 class="font-playfair">Email Address</h5>
                                <p class="text-muted small">info@viroyinfra.com<br>support@viroyinfra.com</p>
                            </div>
                        </div>

                        <!-- Map -->
                        <div class="mt-5 rounded overflow-hidden shadow-sm" style="height: 300px;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.733248043701!2d-118.40035638478913!3d34.072091980600556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bc04d6d147ab%3A0xd6c7c379fd081ed1!2sBeverly%20Hills%2C%20CA%2090210!5e0!3m2!1sen!2sus!4v1620123456789!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>

                    </div>

                    <!-- Contact Form -->
                    <div class="col-lg-7">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-5">
                                <h4 class="font-playfair mb-4">Send us a Message</h4>
                                <form>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="name" class="form-label text-muted small text-uppercase">Name</label>
                                            <input type="text" class="form-control form-control-lg" id="name" placeholder="Your Name">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label text-muted small text-uppercase">Email</label>
                                            <input type="email" class="form-control form-control-lg" id="email" placeholder="Your Email">
                                        </div>
                                        <div class="col-12">
                                            <label for="subject" class="form-label text-muted small text-uppercase">Subject</label>
                                            <input type="text" class="form-control form-control-lg" id="subject" placeholder="Inquiry about...">
                                        </div>
                                        <div class="col-12">
                                            <label for="message" class="form-label text-muted small text-uppercase">Message</label>
                                            <textarea class="form-control form-control-lg" id="message" rows="6" placeholder="How can we help you?"></textarea>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-accent w-100 py-3 text-uppercase fw-bold">Send Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

<?php get_footer(); ?>
