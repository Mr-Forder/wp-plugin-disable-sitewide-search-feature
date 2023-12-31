<?php
/*
* Plugin Name: Disable Sitewide Search
* Description: Don't want your users searching your WP site? This plugin will disable the search feature sitewide.
*/


defined('ABSPATH') or die("Access denied.");


function fb_filter_query($query, $error = true)
{
    if (is_search()) {
        $query->is_search = false;
        $query->query_vars[s] = false;
        $query->query[s] = false;
        // to error
        if ($error == true)
            $query->is_404 = true;
    }
}
add_action('parse_query', 'fb_filter_query');
add_filter('get_search_form', create_function('$a', "return null;"));
