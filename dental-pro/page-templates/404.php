<?php

################################################################################
# Genesis Filters                                                              #
################################################################################
remove_action( 'genesis_loop', 'genesis_do_loop' );
remove_action( 'genesis_after_header', 'custom_entry_header',1);
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action('genesis_loop','four_oh_four');
function four_oh_four(){
    $markup = '';

    $markup .= '<div class="four_oh_four_cont">';
    $markup .= '<h1>404 Not Found</h1>';

    $markup .= '<div class="verbiage_cont">';
    $markup .= 'Sorry, we could\'nt find this page. But don\'t worry, ';
    $markup .= 'here is some content you might find interesting';
    $markup .= '</div>';

    echo $markup;
}

genesis();
