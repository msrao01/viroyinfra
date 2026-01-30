document.addEventListener('DOMContentLoaded', function() {
    const loadMoreBtn = document.getElementById('load-more-projects');

    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            const button = this;
            const currentPage = parseInt(button.getAttribute('data-page'));
            const maxPages = parseInt(button.getAttribute('data-max'));
            const nextPage = currentPage + 1;

            if (nextPage > maxPages) {
                return;
            }

            // Disable button and show loading state
            button.disabled = true;
            button.innerHTML = 'Loading... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';

            const data = new FormData();
            data.append('action', 'load_more_projects');
            data.append('paged', nextPage);
            data.append('security', viroyinfra_ajax.nonce);

            fetch(viroyinfra_ajax.ajax_url, {
                method: 'POST',
                body: data
            })
            .then(response => response.text())
            .then(html => {
                if (html) {
                    // Append new content
                    const list = document.getElementById('project-list');
                    list.insertAdjacentHTML('beforeend', html);

                    // Update button state
                    button.setAttribute('data-page', nextPage);
                    button.disabled = false;
                    button.innerHTML = 'Load More Projects <i class="bi bi-arrow-down ms-2"></i>';

                    // Hide button if we reached the end
                    if (nextPage >= maxPages) {
                        button.parentElement.remove();
                    }
                } else {
                    button.parentElement.remove();
                }
            })
            .catch(error => {
                console.error('Error loading projects:', error);
                button.disabled = false;
                button.innerText = 'Error loading. Try again.';
            });
        });
    }
});
