<?php
/**
 * Project Meta Configuration
 *
 * @package ViroyInfra
 */

function viroyinfra_add_project_meta_boxes() {
    add_meta_box(
        'viroyinfra_project_floor_plans',
        __('Floor Plans', 'viroyinfra'),
        'viroyinfra_render_floor_plans_meta_box',
        'project',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'viroyinfra_add_project_meta_boxes');

function viroyinfra_render_floor_plans_meta_box($post) {
    // Add nonce for security and authentication.
    wp_nonce_field('viroyinfra_save_project_meta', 'viroyinfra_project_meta_nonce');

    // Retrieve an existing value from the database.
    $floor_plans_ids = get_post_meta($post->ID, '_viroyinfra_floor_plans', true);

    // Convert comma-separated string to array for checking
    $ids_array = !empty($floor_plans_ids) ? explode(',', $floor_plans_ids) : array();
    ?>
    <div class="viroyinfra-gallery-metabox">
        <p>
            <input type="button" class="button button-secondary viroyinfra-upload-btn" value="<?php _e('Add Floor Plans', 'viroyinfra'); ?>" data-target="#viroyinfra_floor_plans_ids" data-preview="#viroyinfra_floor_plans_preview" />
        </p>

        <input type="hidden" id="viroyinfra_floor_plans_ids" name="viroyinfra_floor_plans" value="<?php echo esc_attr($floor_plans_ids); ?>" />

        <div id="viroyinfra_floor_plans_preview" class="viroyinfra-gallery-preview" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;">
            <?php
            if (!empty($ids_array)) {
                foreach ($ids_array as $attachment_id) {
                    $image_url = wp_get_attachment_image_url($attachment_id, 'thumbnail');
                    if ($image_url) {
                        echo '<div class="image-wrapper" style="position: relative; width: 100px; height: 100px;">';
                        echo '<img src="' . esc_url($image_url) . '" style="width: 100%; height: 100%; object-fit: cover; border-radius: 4px; border: 1px solid #ddd;" />';
                        echo '<span class="remove-image" data-id="' . esc_attr($attachment_id) . '" style="position: absolute; top: -5px; right: -5px; background: red; color: white; border-radius: 50%; width: 20px; height: 20px; text-align: center; line-height: 20px; cursor: pointer; font-size: 12px;">&times;</span>';
                        echo '</div>';
                    }
                }
            }
            ?>
        </div>
        <p class="description"><?php _e('Upload or select images for the floor plans gallery.', 'viroyinfra'); ?></p>
    </div>
    <?php
}

function viroyinfra_save_project_meta($post_id) {
    // Check if our nonce is set.
    if (!isset($_POST['viroyinfra_project_meta_nonce'])) {
        return;
    }

    // Verify that the nonce is valid.
    if (!wp_verify_nonce($_POST['viroyinfra_project_meta_nonce'], 'viroyinfra_save_project_meta')) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's permissions.
    if (isset($_POST['post_type']) && 'project' == $_POST['post_type']) {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    } else {
        return;
    }

    // Update the meta field in the database.
    if (isset($_POST['viroyinfra_floor_plans'])) {
        update_post_meta($post_id, '_viroyinfra_floor_plans', sanitize_text_field($_POST['viroyinfra_floor_plans']));
    }
}
add_action('save_post', 'viroyinfra_save_project_meta');

function viroyinfra_admin_scripts($hook) {
    global $post;

    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( 'project' === $post->post_type ) {
            wp_enqueue_media();
            wp_enqueue_script('viroyinfra-admin-js', get_template_directory_uri() . '/js/admin-media-upload.js', array('jquery'), '1.0', true);
        }
    }
}
add_action('admin_enqueue_scripts', 'viroyinfra_admin_scripts');
