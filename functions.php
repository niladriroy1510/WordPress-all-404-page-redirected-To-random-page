<?php

/**
To automatically redirect all 404 pages to random pages using functions.php in WordPress, you can use the template_redirect hook to check for 404 errors and then perform the redirection. Here's an example:

Open your theme's functions.php file.

Add the following code at the end:
**/


function custom_redirect_404_to_random_page() {
    if (is_404()) {
        // Array of possible random URLs
        $randomPages = array(
            '/page1',
            '/page2',
            '/page3',
            // Add more pages as needed
        );

        // Choose a random page from the array
        $randomIndex = array_rand($randomPages);
        $randomPage = home_url($randomPages[$randomIndex]);

        // Redirect to the randomly chosen page
        wp_redirect($randomPage, 302);
        exit;
    }
}

add_action('template_redirect', 'custom_redirect_404_to_random_page');




/***
In WordPress Multisite, you might need to set conditions to execute specific code for different subsites or the main site. You can achieve this by using conditional checks based on the site's ID or URL.

Here are a few methods to set conditions for different websites in a WordPress Multisite network:

1. Based on Site ID:
You can use the get_current_blog_id() function to retrieve the current site's ID and then apply conditional logic. For example:

**/



$current_site_id = get_current_blog_id();

if ( $current_site_id === 1 ) {
    // Code specific to the main site
} elseif ( $current_site_id === 2 ) {
    // Code specific to site with ID 2
} else {
    // Default code or other site-specific conditions
}



/**
2. Based on Site URL:
You can check the site's URL using get_site_url() and then execute code based on the URL:
**/



$current_site_url = get_site_url();

if ( $current_site_url === 'http://main-site-url.com' ) {
    // Code specific to the main site URL
} elseif ( $current_site_url === 'http://site2-url.com' ) {
    // Code specific to site 2 URL
} else {
    // Default code or other site-specific conditions
}


/**
3. Using is_main_site() and is_main_network():
These conditional functions check if the current site is the main site or part of the main network.
**/


if ( is_main_site() && is_main_network() ) {
    // Code specific to the main site or main network
} elseif ( is_main_site() ) {
    // Code specific to the main site
} else {
    // Code specific to subsites
}



/**
This can include default behavior or code that should be applied to other sites within the WordPress Multisite network.

Here's an example that combines both site ID and site URL checks, providing default behavior for any other sites:
**/


$current_site_id = get_current_blog_id();
$current_site_url = get_site_url();

if ( $current_site_id === 1 ) {
    // Code specific to the main site
} elseif ( $current_site_id === 2 ) {
    // Code specific to site with ID 2
} elseif ( $current_site_url === 'http://main-site-url.com' ) {
    // Additional code specific to the main site URL
} elseif ( $current_site_url === 'http://site2-url.com' ) {
    // Additional code specific to site 2 URL
} else {
    // Default code for other sites or any additional conditions
}








