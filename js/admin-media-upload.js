jQuery(document).ready(function($){
    var mediaUploader;

    // Handle Click on Add Images Button
    $('.viroyinfra-upload-btn').on('click', function(e) {
        e.preventDefault();

        var button = $(this);
        var targetInput = $(button.data('target'));
        var targetPreview = $(button.data('preview'));

        // Re-use frame if it exists
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        // Create the media frame.
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Select Images',
            button: {
                text: 'Use these images'
            },
            multiple: true
        });

        // When an image is selected, run a callback.
        mediaUploader.on('select', function() {
            var selection = mediaUploader.state().get('selection');
            var currentIds = targetInput.val() ? targetInput.val().split(',') : [];

            selection.map( function( attachment ) {
                attachment = attachment.toJSON();

                // Avoid duplicates
                if(currentIds.indexOf(attachment.id.toString()) === -1) {
                    currentIds.push(attachment.id);

                    // Append preview
                    var imgUrl = attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url;
                    var previewHtml = '<div class="image-wrapper" style="position: relative; width: 100px; height: 100px;">' +
                        '<img src="' + imgUrl + '" style="width: 100%; height: 100%; object-fit: cover; border-radius: 4px; border: 1px solid #ddd;" />' +
                        '<span class="remove-image" data-id="' + attachment.id + '" style="position: absolute; top: -5px; right: -5px; background: red; color: white; border-radius: 50%; width: 20px; height: 20px; text-align: center; line-height: 20px; cursor: pointer; font-size: 12px;">&times;</span>' +
                        '</div>';

                    targetPreview.append(previewHtml);
                }
            });

            targetInput.val(currentIds.join(','));
        });

        mediaUploader.open();
    });

    // Handle Remove Image
    $(document).on('click', '.remove-image', function() {
        var idToRemove = $(this).data('id').toString();
        var wrapper = $(this).closest('.image-wrapper');
        var container = wrapper.parent();
        var inputId = container.attr('id').replace('_preview', '_ids'); // Infer input ID from preview ID
        var input = $('#' + inputId);

        // Remove from DOM
        wrapper.remove();

        // Remove from Input
        var currentIds = input.val().split(',');
        var index = currentIds.indexOf(idToRemove);
        if (index > -1) {
            currentIds.splice(index, 1);
        }
        input.val(currentIds.join(','));
    });
});
