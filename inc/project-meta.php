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

    // Get stored IDs
    $gallery_ids = get_post_meta($post->ID, '_project_gallery', true);
    $floor_plans_ids = get_post_meta($post->ID, '_floor_plans_gallery', true);

    ?>
    <p>
        <label for="project_location"><strong><?php _e('Location', 'viroyinfra'); ?></strong></label><br>
        <input type="text" id="project_location" name="project_location" value="<?php echo esc_attr($location); ?>" class="widefat">
    </p>

    <p>
        <label for="project_description"><strong><?php _e('Extra Description / Overview', 'viroyinfra'); ?></strong></label><br>
        <textarea id="project_description" name="project_description" class="widefat" rows="5"><?php echo esc_textarea($description); ?></textarea>
    </p>

    <hr>

    <p>
        <strong><?php _e('Project Gallery', 'viroyinfra'); ?></strong><br>
        <input type="button" class="button upload-project-gallery" value="<?php _e('Add Images', 'viroyinfra'); ?>">
        <input type="hidden" id="project_gallery" name="project_gallery" value="<?php echo esc_attr($gallery_ids); ?>">

        <div id="project_gallery_preview" style="margin-top: 10px;">
            <?php
            if ($gallery_ids) {
                $ids = explode(',', $gallery_ids);
                foreach ($ids as $id) {
                    $img = wp_get_attachment_image_src($id, 'thumbnail');
                    if ($img) {
                        echo '<div class="image-preview-item" style="display:inline-block; margin:5px; position:relative;">';
                        echo '<img src="' . esc_url($img[0]) . '" style="max-width:100px; height:auto; border:1px solid #ccc;">';
                        echo '<a href="#" class="remove-image" data-id="' . esc_attr($id) . '" style="position:absolute; top:0; right:0; background:red; color:white; text-decoration:none; padding:0 5px;">&times;</a>';
                        echo '</div>';
                    }
                }
            }
            ?>
        </div>
    </p>

    <hr>

    <p>
        <strong><?php _e('Floor Plans Gallery', 'viroyinfra'); ?></strong><br>
        <input type="button" class="button upload-floor-plans" value="<?php _e('Add Floor Plans', 'viroyinfra'); ?>">
        <input type="hidden" id="floor_plans_gallery" name="floor_plans_gallery" value="<?php echo esc_attr($floor_plans_ids); ?>">

        <div id="floor_plans_gallery_preview" style="margin-top: 10px;">
            <?php
            if ($floor_plans_ids) {
                $ids = explode(',', $floor_plans_ids);
                foreach ($ids as $id) {
                    $img = wp_get_attachment_image_src($id, 'thumbnail');
                    if ($img) {
                        echo '<div class="image-preview-item" style="display:inline-block; margin:5px; position:relative;">';
                        echo '<img src="' . esc_url($img[0]) . '" style="max-width:100px; height:auto; border:1px solid #ccc;">';
                        echo '<a href="#" class="remove-image" data-id="' . esc_attr($id) . '" style="position:absolute; top:0; right:0; background:red; color:white; text-decoration:none; padding:0 5px;">&times;</a>';
                        echo '</div>';
                    }
                }
            }
            ?>
        </div>
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

    // Save Gallery (Comma separated IDs)
    if (isset($_POST['project_gallery'])) {
        // Sanitize allows comma separated numbers
        $gallery_raw = sanitize_text_field($_POST['project_gallery']);
        update_post_meta($post_id, '_project_gallery', $gallery_raw);
    }

    // Save Floor Plans (Comma separated IDs)
    if (isset($_POST['floor_plans_gallery'])) {
        $floor_plans_raw = sanitize_text_field($_POST['floor_plans_gallery']);
        update_post_meta($post_id, '_floor_plans_gallery', $floor_plans_raw);
    }
}
add_action('save_post', 'viroyinfra_save_project_details');
