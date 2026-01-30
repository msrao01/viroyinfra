jQuery(document).ready(function($) {
    // Generic function to handle media upload
    function viroyinfra_handle_media_upload(button_selector, input_selector, preview_selector) {
        $(document).on('click', button_selector, function(e) {
            e.preventDefault();
            var button = $(this);
            var custom_uploader = wp.media({
                title: 'Select Images',
                library: {
                    type: 'image'
                },
                button: {
                    text: 'Use these images'
                },
                multiple: true
            }).on('select', function() {
                var attachments = custom_uploader.state().get('selection').map(function(attachment) {
                    attachment = attachment.toJSON();
                    return attachment;
                });

                var ids = [];
                var html = '';

                // Get existing IDs if any
                var existing_ids = $(input_selector).val();
                if (existing_ids) {
                    ids = existing_ids.split(',');
                }

                // Process selected attachments
                $.each(attachments, function(i, attachment) {
                    if (ids.indexOf(attachment.id.toString()) === -1) {
                        ids.push(attachment.id);
                        html += '<div class="image-preview-item" style="display:inline-block; margin:5px; position:relative;">';
                        html += '<img src="' + (attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url) + '" style="max-width:100px; height:auto; border:1px solid #ccc;">';
                        html += '<a href="#" class="remove-image" data-id="' + attachment.id + '" style="position:absolute; top:0; right:0; background:red; color:white; text-decoration:none; padding:0 5px;">&times;</a>';
                        html += '</div>';
                    }
                });

                $(input_selector).val(ids.join(','));
                $(preview_selector).append(html);

            }).open();
        });

        // Remove image handler
        $(document).on('click', preview_selector + ' .remove-image', function(e) {
            e.preventDefault();
            var id_to_remove = $(this).data('id');
            var current_ids = $(input_selector).val().split(',');

            // Remove ID from array
            current_ids = current_ids.filter(function(id) {
                return id != id_to_remove;
            });

            $(input_selector).val(current_ids.join(','));
            $(this).parent().remove();
        });
    }

    // Initialize for Project Gallery
    viroyinfra_handle_media_upload('.upload-project-gallery', '#project_gallery', '#project_gallery_preview');

    // Initialize for Floor Plans
    viroyinfra_handle_media_upload('.upload-floor-plans', '#floor_plans_gallery', '#floor_plans_gallery_preview');
});
