<?php
// Add Meta Boxes
function viroyinfra_add_meta_boxes() {
    add_meta_box(
        'project_details_meta',
        __('Project Details', 'viroyinfra'),
        'viroyinfra_project_details_callback',
        'project',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'viroyinfra_add_meta_boxes');

// Meta Box Callback
function viroyinfra_project_details_callback($post) {
    wp_nonce_field('viroyinfra_save_project_details', 'viroyinfra_project_details_nonce');

    $location = get_post_meta($post->ID, '_project_location', true);
    $description = get_post_meta($post->ID, '_project_description', true);
    $gallery = get_post_meta($post->ID, '_project_gallery', true);
    $floor_plans = get_post_meta($post->ID, '_floor_plans_gallery', true);

    ?>
    <p>
        <label for="project_location"><strong><?php _e('Location', 'viroyinfra'); ?></strong></label><br>
        <input type="text" id="project_location" name="project_location" value="<?php echo esc_attr($location); ?>" class="widefat">
    </p>

    <p>
        <label for="project_description"><strong><?php _e('Extra Description / Overview', 'viroyinfra'); ?></strong></label><br>
        <textarea id="project_description" name="project_description" class="widefat" rows="5"><?php echo esc_textarea($description); ?></textarea>
    </p>

    <p>
        <label for="project_gallery"><strong><?php _e('Project Gallery (Comma separated image URLs)', 'viroyinfra'); ?></strong></label><br>
        <textarea id="project_gallery" name="project_gallery" class="widefat" rows="3"><?php echo esc_textarea($gallery); ?></textarea>
        <p class="description"><?php _e('Enter image URLs separated by commas.', 'viroyinfra'); ?></p>
    </p>

    <p>
        <label for="floor_plans_gallery"><strong><?php _e('Floor Plans Gallery (Comma separated image URLs)', 'viroyinfra'); ?></strong></label><br>
        <textarea id="floor_plans_gallery" name="floor_plans_gallery" class="widefat" rows="3"><?php echo esc_textarea($floor_plans); ?></textarea>
        <p class="description"><?php _e('Enter image URLs separated by commas.', 'viroyinfra'); ?></p>
    </p>
    <?php
}

// Save Meta Box Data
function viroyinfra_save_project_details($post_id) {
    if (!isset($_POST['viroyinfra_project_details_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['viroyinfra_project_details_nonce'], 'viroyinfra_save_project_details')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save Location
    if (isset($_POST['project_location'])) {
        update_post_meta($post_id, '_project_location', sanitize_text_field($_POST['project_location']));
    }

    // Save Description
    if (isset($_POST['project_description'])) {
        update_post_meta($post_id, '_project_description', sanitize_textarea_field($_POST['project_description']));
    }

    // Save Gallery
    if (isset($_POST['project_gallery'])) {
        $gallery_raw = sanitize_textarea_field($_POST['project_gallery']);
        update_post_meta($post_id, '_project_gallery', $gallery_raw);
    }

    // Save Floor Plans
    if (isset($_POST['floor_plans_gallery'])) {
        $floor_plans_raw = sanitize_textarea_field($_POST['floor_plans_gallery']);
        update_post_meta($post_id, '_floor_plans_gallery', $floor_plans_raw);
    }
}
add_action('save_post', 'viroyinfra_save_project_details');
