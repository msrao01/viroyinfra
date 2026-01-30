<?php
// ... existing code ...

// Remove CPT Slug from Permalink
function viroyinfra_remove_cpt_slug($post_link, $post) {
    if ('project' === $post->post_type && 'publish' === $post->post_status) {
        $post_link = str_replace('/projects/', '/', $post_link); // Removing registered slug
    }
    return $post_link;
}
add_filter('post_type_link', 'viroyinfra_remove_cpt_slug', 10, 2);

function viroyinfra_add_cpt_to_main_query($query) {
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }

    if ( $query->is_home() && empty($query->query['name']) ) {
        return;
    }

    // Check if the query is for a single post by slug
    if ( isset($query->query['name']) ) {
         $query->set('post_type', array('post', 'page', 'project'));
    }
}
add_action('pre_get_posts', 'viroyinfra_add_cpt_to_main_query');
