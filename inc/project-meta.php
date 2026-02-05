<?php
/**
 * Project Meta Configuration
 *
 * @package ViroyInfra
 */

function viroyinfra_add_project_meta_boxes() {
    // Floor Plans
    add_meta_box(
        'viroyinfra_project_floor_plans',
        __('Floor Plans Gallery', 'viroyinfra'),
        'viroyinfra_render_gallery_meta_box',
        'project',
        'normal',
        'high',
        array( 'meta_key' => '_viroyinfra_floor_plans' )
    );

    // Project Gallery
    add_meta_box(
        'viroyinfra_project_gallery',
        __('Project Images Gallery', 'viroyinfra'),
        'viroyinfra_render_gallery_meta_box',
        'project',
        'normal',
        'high',
        array( 'meta_key' => '_viroyinfra_project_gallery' )
    );

    // Project Details (Description & Location)
    add_meta_box(
        'viroyinfra_project_details',
        __('Project Details', 'viroyinfra'),
        'viroyinfra_render_details_meta_box',
        'project',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'viroyinfra_add_project_meta_boxes');

/**
 * Generic Renderer for Gallery Meta Boxes
 */
function viroyinfra_render_gallery_meta_box($post, $callback_args) {
    wp_nonce_field('viroyinfra_save_project_meta', 'viroyinfra_project_meta_nonce');

    $meta_key = $callback_args['args']['meta_key'];
    $gallery_ids = get_post_meta($post->ID, $meta_key, true);

    // Convert comma-separated string to array for checking
    $ids_array = !empty($gallery_ids) ? explode(',', $gallery_ids) : array();

    $input_id = $meta_key . '_ids';
    $preview_id = $meta_key . '_preview';
    ?>
    <div class="viroyinfra-gallery-metabox">
        <p>
            <input type="button" class="button button-secondary viroyinfra-upload-btn" value="<?php _e('Add Images', 'viroyinfra'); ?>" data-target="#<?php echo esc_attr($input_id); ?>" data-preview="#<?php echo esc_attr($preview_id); ?>" />
        </p>

        <input type="hidden" id="<?php echo esc_attr($input_id); ?>" name="<?php echo esc_attr($meta_key); ?>" value="<?php echo esc_attr($gallery_ids); ?>" />

        <div id="<?php echo esc_attr($preview_id); ?>" class="viroyinfra-gallery-preview" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;">
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
        <p class="description"><?php _e('Upload or select images.', 'viroyinfra'); ?></p>
    </div>
    <?php
}

/**
 * Renderer for Project Details (Location & Description)
 */
function viroyinfra_render_details_meta_box($post) {
    // Location
    $location = get_post_meta($post->ID, '_viroyinfra_location', true);

    // Description
    $description = get_post_meta($post->ID, '_viroyinfra_description', true);

    echo '<p>';
    echo '<label for="viroyinfra_location" style="display:block; font-weight:bold; margin-bottom:5px;">' . __('Location', 'viroyinfra') . '</label>';
    echo '<input type="text" id="viroyinfra_location" name="viroyinfra_location" value="' . esc_attr($location) . '" style="width:100%;" />';
    echo '</p>';

    echo '<p>';
    echo '<label for="viroyinfra_description" style="display:block; font-weight:bold; margin-bottom:5px;">' . __('Project Description', 'viroyinfra') . '</label>';
    wp_editor($description, 'viroyinfra_description', array(
        'textarea_name' => 'viroyinfra_description',
        'media_buttons' => false,
        'textarea_rows' => 8,
        'teeny'         => true
    ));
    echo '</p>';
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

    // Save Floor Plans
    if (isset($_POST['_viroyinfra_floor_plans'])) {
        update_post_meta($post_id, '_viroyinfra_floor_plans', sanitize_text_field($_POST['_viroyinfra_floor_plans']));
    }

    // Save Project Gallery
    if (isset($_POST['_viroyinfra_project_gallery'])) {
        update_post_meta($post_id, '_viroyinfra_project_gallery', sanitize_text_field($_POST['_viroyinfra_project_gallery']));
    }

    // Save Location
    if (isset($_POST['viroyinfra_location'])) {
        update_post_meta($post_id, '_viroyinfra_location', sanitize_text_field($_POST['viroyinfra_location']));
    }

    // Save Description (Allow HTML)
    if (isset($_POST['viroyinfra_description'])) {
        update_post_meta($post_id, '_viroyinfra_description', wp_kses_post($_POST['viroyinfra_description']));
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
