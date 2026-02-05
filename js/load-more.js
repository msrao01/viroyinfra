jQuery(document).ready(function($) {
    var button = $('#viroyinfra-load-more');
    var container = $('#viroyinfra-projects-container');

    // Initial check
    if (viroyinfra_load_more_params.current_page >= viroyinfra_load_more_params.max_page) {
        button.hide();
    }

    button.on('click', function() {
        var data = {
            'action': 'load_more_projects',
            'page': viroyinfra_load_more_params.current_page,
            'security': viroyinfra_load_more_params.nonce
        };

        $.ajax({
            url: viroyinfra_load_more_params.ajaxurl,
            data: data,
            type: 'POST',
            beforeSend: function (xhr) {
                button.text('Loading...');
            },
            success: function(data) {
                if(data) {
                    button.text('Load More Projects');
                    container.append(data);
                    viroyinfra_load_more_params.current_page++;

                    if (viroyinfra_load_more_params.current_page >= viroyinfra_load_more_params.max_page) {
                        button.remove();
                    }
                } else {
                    button.remove();
                }
            }
        });
    });
});
