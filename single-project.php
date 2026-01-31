<?php
/* Template Name: Single Project */
get_header();
?>

    <!-- Hero Section / Carousel -->
    <section id="property-gallery" class="p-0">
        <div id="propertyCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#propertyCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#propertyCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#propertyCarousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/living-room.svg" class="d-block w-100 hero-img" alt="Living Room">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="display-4 font-playfair">Exquisite Living</h5>
                        <p class="lead">Where luxury meets comfort in Beverly Hills</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/kitchen.svg" class="d-block w-100 hero-img" alt="Kitchen">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="display-4 font-playfair">Gourmet Experience</h5>
                        <p class="lead">State-of-the-art culinary space</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/exterior.svg" class="d-block w-100 hero-img" alt="Exterior">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="display-4 font-playfair">Private Oasis</h5>
                        <p class="lead">Serene landscapes and outdoor luxury</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </section>

    <!-- Sticky Section Navigation -->
    <nav id="section-nav" class="navbar sticky-top">
        <div class="container justify-content-center">
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="#floor-plans">Floor Plans</a></li>
                <li class="nav-item"><a class="nav-link" href="#amenities">Amenities</a></li>
                <li class="nav-item"><a class="nav-link" href="#specs">Specs</a></li>
                <li class="nav-item"><a class="nav-link" href="#location">Location</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main id="main-content">
        <div class="container mt-5 pt-4">
            <div class="row">
                <div class="col-12">

                    <!-- Quick Info -->
                    <div class="mb-5 text-center" data-aos="fade-up">
                        <h1 class="display-4 font-playfair mb-3">Modern Luxury Villa</h1>
                        <p class="lead text-muted mb-2"><i class="bi bi-geo-alt-fill text-accent"></i> 123 Palm Avenue, Beverly Hills, CA 90210</p>
                        <h2 class="text-accent price-tag">$4,500,000</h2>
                    </div>

                    <!-- Key Stats -->
                    <div class="row text-center mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-md-3 col-4">
                            <div class="stat-item">
                                <i class="bi bi-door-open text-accent"></i>
                                <h5 class="mt-2">5 Beds</h5>
                            </div>
                        </div>
                        <div class="col-md-3 col-4">
                            <div class="stat-item">
                                <i class="bi bi-droplet text-accent"></i>
                                <h5 class="mt-2">4 Baths</h5>
                            </div>
                        </div>
                        <div class="col-md-3 col-4">
                            <div class="stat-item">
                                <i class="bi bi-aspect-ratio text-accent"></i>
                                <h5 class="mt-2">4,200 Sqft</h5>
                            </div>
                        </div>
                    </div>

                    <!-- 1. About the Project -->
                    <div id="about" class="section-spacer" data-aos="fade-up">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 text-center">
                                <h3 class="section-title">About the Project</h3>
                                <p class="lead-text">Experience the epitome of luxury living in this stunning modern villa located in the heart of Beverly Hills. This architectural masterpiece features an open floor plan, floor-to-ceiling windows, and top-of-the-line finishes throughout.</p>
                                <p class="text-muted">The gourmet kitchen is equipped with state-of-the-art appliances and a large island, perfect for entertaining. The master suite offers a private retreat with a spa-like bathroom and a walk-in closet. Outside, you'll find a sparkling pool, a spacious patio, and beautifully landscaped gardens.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Project Gallery -->
                    <div id="gallery" class="section-spacer" data-aos="fade-up">
                        <h3 class="section-title text-center">Project Gallery</h3>
                        <div class="row g-3">
                            <div class="col-md-8">
                                <div class="gallery-item overflow-hidden rounded shadow-sm h-100">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/project-view-1.svg" class="img-fluid w-100 h-100 object-fit-cover gallery-img cursor-pointer" alt="Gallery 1" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-src="<?php echo get_template_directory_uri(); ?>/img/project-view-1.svg">
                                </div>
                            </div>
                            <div class="col-md-4 d-flex flex-column gap-3">
                                <div class="gallery-item overflow-hidden rounded shadow-sm flex-grow-1">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/project-view-2.svg" class="img-fluid w-100 h-100 object-fit-cover gallery-img cursor-pointer" alt="Gallery 2" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-src="<?php echo get_template_directory_uri(); ?>/img/project-view-2.svg">
                                </div>
                                <div class="gallery-item overflow-hidden rounded shadow-sm flex-grow-1">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/project-view-3.svg" class="img-fluid w-100 h-100 object-fit-cover gallery-img cursor-pointer" alt="Gallery 3" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-src="<?php echo get_template_directory_uri(); ?>/img/project-view-3.svg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Floor Plans -->
                    <div id="floor-plans" class="section-spacer" data-aos="fade-up">
                        <h3 class="section-title text-center">Floor Plans</h3>
                        <?php
                        $floor_plans = get_post_meta(get_the_ID(), '_viroyinfra_floor_plans', true);
                        if (!empty($floor_plans)) {
                            viroyinfra_render_gallery($floor_plans);
                        } else {
                            // Fallback content or message can go here.
                            // For now, we display a placeholder message if no plans are uploaded.
                            echo '<p class="text-center text-muted">No floor plans available.</p>';
                        }
                        ?>
                    </div>

                    <!-- 4. Amenities (Card Style) -->
                    <div id="amenities" class="section-spacer">
                        <h3 class="section-title text-center" data-aos="fade-up">Amenities</h3>
                        <div class="row g-4">
                            <div class="col-xl-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="50">
                                <div class="amenity-card">
                                    <div class="icon-wrapper">
                                        <span class="material-icons">pool</span>
                                    </div>
                                    <h5>Swimming Pool</h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
                                <div class="amenity-card">
                                    <div class="icon-wrapper">
                                        <span class="material-icons">theaters</span>
                                    </div>
                                    <h5>Home Theater</h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="150">
                                <div class="amenity-card">
                                    <div class="icon-wrapper">
                                        <span class="material-icons">wine_bar</span>
                                    </div>
                                    <h5>Wine Cellar</h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="200">
                                <div class="amenity-card">
                                    <div class="icon-wrapper">
                                        <span class="material-icons">settings_remote</span>
                                    </div>
                                    <h5>Smart Home</h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="250">
                                <div class="amenity-card">
                                    <div class="icon-wrapper">
                                        <span class="material-icons">garage</span>
                                    </div>
                                    <h5>3-Car Garage</h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="300">
                                <div class="amenity-card">
                                    <div class="icon-wrapper">
                                        <span class="material-icons">outdoor_grill</span>
                                    </div>
                                    <h5>Outdoor Kitchen</h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="350">
                                <div class="amenity-card">
                                    <div class="icon-wrapper">
                                        <span class="material-icons">security</span>
                                    </div>
                                    <h5>Security System</h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="400">
                                <div class="amenity-card">
                                    <div class="icon-wrapper">
                                        <span class="material-icons">water</span>
                                    </div>
                                    <h5>Ocean View</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 5. Specification (Accordion Style) -->
                    <div id="specs" class="section-spacer">
                        <h3 class="section-title text-center" data-aos="fade-up">Specifications</h3>
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="row g-4">
                                    <!-- Column 1 -->
                                    <div class="col-md-6" data-aos="fade-right">
                                        <div class="accordion specs-accordion" id="specsAccordion1">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingStructure">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseStructure" aria-expanded="true" aria-controls="collapseStructure">
                                                        <span class="material-icons spec-icon">foundation</span> Structure
                                                    </button>
                                                </h2>
                                                <div id="collapseStructure" class="accordion-collapse collapse show" aria-labelledby="headingStructure" data-bs-parent="#specsAccordion1">
                                                    <div class="accordion-body">
                                                        RCC framed structure designed for seismic resistance. Solid block masonry walls for superior sound insulation.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFlooring">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFlooring" aria-expanded="false" aria-controls="collapseFlooring">
                                                        <span class="material-icons spec-icon">grid_view</span> Flooring
                                                    </button>
                                                </h2>
                                                <div id="collapseFlooring" class="accordion-collapse collapse" aria-labelledby="headingFlooring" data-bs-parent="#specsAccordion1">
                                                    <div class="accordion-body">
                                                        Premium Italian marble in living, dining, and foyer. Engineered wooden flooring in the master bedroom. Vitrified tiles in guest bedrooms.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingDoors">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDoors" aria-expanded="false" aria-controls="collapseDoors">
                                                        <span class="material-icons spec-icon">door_front</span> Doors
                                                    </button>
                                                </h2>
                                                <div id="collapseDoors" class="accordion-collapse collapse" aria-labelledby="headingDoors" data-bs-parent="#specsAccordion1">
                                                    <div class="accordion-body">
                                                        Main door: Teak wood frame with designer shutter. Internal doors: Hardwood frame with flush shutters and veneer finish.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingWindows">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWindows" aria-expanded="false" aria-controls="collapseWindows">
                                                        <span class="material-icons spec-icon">window</span> Windows
                                                    </button>
                                                </h2>
                                                <div id="collapseWindows" class="accordion-collapse collapse" aria-labelledby="headingWindows" data-bs-parent="#specsAccordion1">
                                                    <div class="accordion-body">
                                                        UPVC 3-track windows with mosquito mesh and soundproof double glazing. Granite window sills.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingKitchen">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKitchen" aria-expanded="false" aria-controls="collapseKitchen">
                                                        <span class="material-icons spec-icon">kitchen</span> Kitchen
                                                    </button>
                                                </h2>
                                                <div id="collapseKitchen" class="accordion-collapse collapse" aria-labelledby="headingKitchen" data-bs-parent="#specsAccordion1">
                                                    <div class="accordion-body">
                                                        Modular kitchen layout provision. Black granite platform with stainless steel sink and drainboard. Dado tiles up to 2 feet.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingUtility">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUtility" aria-expanded="false" aria-controls="collapseUtility">
                                                        <span class="material-icons spec-icon">local_laundry_service</span> Utility
                                                    </button>
                                                </h2>
                                                <div id="collapseUtility" class="accordion-collapse collapse" aria-labelledby="headingUtility" data-bs-parent="#specsAccordion1">
                                                    <div class="accordion-body">
                                                        Provision for washing machine and dishwasher. Anti-skid ceramic tile flooring.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column 2 -->
                                    <div class="col-md-6" data-aos="fade-left">
                                        <div class="accordion specs-accordion" id="specsAccordion2">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingElectrical">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseElectrical" aria-expanded="false" aria-controls="collapseElectrical">
                                                        <span class="material-icons spec-icon">tungsten</span> Electrical
                                                    </button>
                                                </h2>
                                                <div id="collapseElectrical" class="accordion-collapse collapse" aria-labelledby="headingElectrical" data-bs-parent="#specsAccordion2">
                                                    <div class="accordion-body">
                                                        Branded concealed copper wiring (Havells/Polycab). Modular switches (Legrand/Schneider). TV and telephone points in all rooms.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingPlumbing">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePlumbing" aria-expanded="false" aria-controls="collapsePlumbing">
                                                        <span class="material-icons spec-icon">plumbing</span> Plumbing & Sanitary
                                                    </button>
                                                </h2>
                                                <div id="collapsePlumbing" class="accordion-collapse collapse" aria-labelledby="headingPlumbing" data-bs-parent="#specsAccordion2">
                                                    <div class="accordion-body">
                                                        CPVC/UPVC piping. Wall-mounted EWCs and Counter-top washbasins. Fittings from Kohler, Grohe or equivalent.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingPaint">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePaint" aria-expanded="false" aria-controls="collapsePaint">
                                                        <span class="material-icons spec-icon">format_paint</span> Painting
                                                    </button>
                                                </h2>
                                                <div id="collapsePaint" class="accordion-collapse collapse" aria-labelledby="headingPaint" data-bs-parent="#specsAccordion2">
                                                    <div class="accordion-body">
                                                        Interior: Premium emulsion paint with putty finish. Exterior: Weather-proof textured paint.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingSecurity">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSecurity" aria-expanded="false" aria-controls="collapseSecurity">
                                                        <span class="material-icons spec-icon">security</span> Security
                                                    </button>
                                                </h2>
                                                <div id="collapseSecurity" class="accordion-collapse collapse" aria-labelledby="headingSecurity" data-bs-parent="#specsAccordion2">
                                                    <div class="accordion-body">
                                                        24/7 Security personnel. CCTV surveillance at strategic points. Video door phone for each villa.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingPower">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePower" aria-expanded="false" aria-controls="collapsePower">
                                                        <span class="material-icons spec-icon">bolt</span> Power Backup
                                                    </button>
                                                </h2>
                                                <div id="collapsePower" class="accordion-collapse collapse" aria-labelledby="headingPower" data-bs-parent="#specsAccordion2">
                                                    <div class="accordion-body">
                                                        100% DG power backup for lighting and fans in all rooms and common areas.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingLandscape">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLandscape" aria-expanded="false" aria-controls="collapseLandscape">
                                                        <span class="material-icons spec-icon">park</span> Landscaping
                                                    </button>
                                                </h2>
                                                <div id="collapseLandscape" class="accordion-collapse collapse" aria-labelledby="headingLandscape" data-bs-parent="#specsAccordion2">
                                                    <div class="accordion-body">
                                                        Professionally designed landscape gardens. Rainwater harvesting system. Automated irrigation system.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 6. Location -->
                    <div id="location" class="section-spacer" data-aos="fade-up">
                        <h3 class="section-title text-center">Location</h3>
                        <div class="row g-4">
                            <!-- Map Section (2/3) -->
                            <div class="col-lg-8">
                                <div class="ratio ratio-16x9 shadow-sm rounded overflow-hidden">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.733248043701!2d-118.40035638478913!3d34.072091980600556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bc04d6d147ab%3A0xd6c7c379fd081ed1!2sBeverly%20Hills%2C%20CA%2090210!5e0!3m2!1sen!2sus!4v1620123456789!5m2!1sen!2sus" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                            <!-- Highlights Section (1/3) -->
                            <div class="col-lg-4">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body">
                                        <h5 class="font-playfair mb-4">Highlights</h5>

                                        <div class="mb-4">
                                            <h6 class="fw-bold text-accent"><i class="bi bi-bezier2 me-2"></i>Connectivity</h6>
                                            <ul class="list-unstyled text-muted small ms-4">
                                                <li>Highway 101: 5 mins</li>
                                                <li>LAX Airport: 25 mins</li>
                                                <li>Metro Station: 10 mins</li>
                                            </ul>
                                        </div>

                                        <div class="mb-4">
                                            <h6 class="fw-bold text-accent"><i class="bi bi-hospital me-2"></i>Nearby Hospitals</h6>
                                            <ul class="list-unstyled text-muted small ms-4">
                                                <li>Cedar Sinai: 10 mins</li>
                                                <li>UCLA Medical: 15 mins</li>
                                            </ul>
                                        </div>

                                        <div class="mb-4">
                                            <h6 class="fw-bold text-accent"><i class="bi bi-book me-2"></i>Education</h6>
                                            <ul class="list-unstyled text-muted small ms-4">
                                                <li>Beverly Hills High: 5 mins</li>
                                                <li>UCLA Campus: 15 mins</li>
                                            </ul>
                                        </div>

                                        <div class="mb-0">
                                            <h6 class="fw-bold text-accent"><i class="bi bi-cart me-2"></i>Shopping</h6>
                                            <ul class="list-unstyled text-muted small ms-4">
                                                <li>Rodeo Drive: 5 mins</li>
                                                <li>The Grove: 15 mins</li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 8. Contact Us -->
                    <div id="contact" class="section-spacer">
                        <h3 class="section-title text-center" data-aos="fade-up">Contact Us</h3>
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="row g-4">
                                    <div class="col-lg-4" data-aos="fade-right">
                                        <!-- Agent Card -->
                                        <div class="card h-100 shadow-sm border-0 text-center p-4">
                                            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                                <div class="mb-4">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/img/agent.svg" class="rounded-circle shadow-sm border border-3 border-light" alt="Agent Photo">
                                                </div>
                                                <h4 class="card-title font-playfair mb-1">Jane Doe</h4>
                                                <p class="card-text text-muted mb-3">Senior Real Estate Agent</p>
                                                <div class="contact-info">
                                                    <p class="card-text mb-2"><i class="bi bi-telephone-fill text-accent me-2"></i> (555) 123-4567</p>
                                                    <p class="card-text"><i class="bi bi-envelope-fill text-accent me-2"></i> jane.doe@example.com</p>
                                                </div>
                                                <div class="mt-4">
                                                    <a href="#" class="btn btn-outline-dark btn-sm rounded-pill px-4">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8" data-aos="fade-left">
                                        <!-- Contact Form -->
                                        <div class="card h-100 shadow-sm border-0 overflow-hidden">
                                            <div class="card-header bg-navy text-white p-4">
                                                <h5 class="mb-0 font-playfair">Request a Quote</h5>
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
                                                        <label for="phone" class="form-label text-muted small text-uppercase">Phone</label>
                                                        <input type="tel" class="form-control form-control-lg" id="phone" placeholder="Your Phone Number">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="message" class="form-label text-muted small text-uppercase">Message</label>
                                                        <textarea class="form-control form-control-lg" id="message" rows="3" placeholder="I am interested in..."></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-accent w-100 py-3 text-uppercase fw-bold mt-2">Send Request</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-body p-0 position-relative">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 z-1 p-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    <img src="" class="img-fluid w-100 rounded shadow-sm" id="modalImage" alt="Enlarged View">
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
