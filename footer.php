    <!-- Footer -->
    <footer class="bg-navy text-white py-5 mt-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/VLv01L.png" alt="VIROY INFRA" class="mb-3" height="50">
                    <p class="text-white-50">Helping you find the perfect place to call home. Luxury properties, exceptional service.</p>
                </div>
                <div class="col-md-4">
                    <h5 class="font-playfair mb-3 text-accent">Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="<?php echo home_url(); ?>" class="text-white-50 text-decoration-none hover-white">Home</a></li>
                        <li class="mb-2"><a href="<?php echo home_url('/projects'); ?>" class="text-white-50 text-decoration-none hover-white">Properties</a></li>
                        <li class="mb-2"><a href="<?php echo home_url('/about'); ?>" class="text-white-50 text-decoration-none hover-white">About Us</a></li>
                        <li class="mb-2"><a href="<?php echo home_url('/contact'); ?>" class="text-white-50 text-decoration-none hover-white">Contact Us</a></li>
                        <li class="mb-2"><a href="<?php echo home_url('/blog'); ?>" class="text-white-50 text-decoration-none hover-white">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="font-playfair mb-3 text-accent">Connect</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white social-icon"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#" class="text-white social-icon"><i class="bi bi-twitter fs-5"></i></a>
                        <a href="#" class="text-white social-icon"><i class="bi bi-instagram fs-5"></i></a>
                        <a href="#" class="text-white social-icon"><i class="bi bi-linkedin fs-5"></i></a>
                    </div>
                </div>
            </div>
            <hr class="border-secondary my-4">
            <div class="text-center text-white-50">
                <small>&copy; <?php echo date('Y'); ?> Dream Home Real Estate. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
