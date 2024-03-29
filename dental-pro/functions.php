<?php

################################################################################
# Define Constants                                                             #
################################################################################
## Define Theme Version
define('THEME_VER',0.1);
## Google API
define('GOOGLE_MAPS_API','AIzaSyDnSI2nPa76O6fruviJhnu5ZfhGux5cfxI');
## Theme Class
define('DD_THEME_CLASS','dental');
## WooCommerce Support 
define('DD_WOO_SUPPORT',false);
## Custom Dashboard Support 
define('DD_CUSTOM_WP_DASH',true);
## UIKIT Support
define('DD_UI_KIT',true);
## FontAwesome Support
define('DD_FONT_AWESOME',true);

################################################################################
# Load GENESIS Functions                                                       #
################################################################################
require_once(get_stylesheet_directory().'/lib/defaults/functions.inc.php');

################################################################################
# Scripts & Styles                                                             #
################################################################################
require_once(get_stylesheet_directory().'/lib/includes/scripts_and_styles/scripts_and_styles.inc.php');

################################################################################
# Navigation                                                                   #
################################################################################
require_once(get_stylesheet_directory().'/lib/includes/navigation.inc.php');

################################################################################
# Filter Page Template Paths                                                   #
################################################################################
require_once(get_stylesheet_directory().'/lib/includes/page_template_filters.inc.php');

################################################################################
# Footer                                                                       #
################################################################################
require_once(get_stylesheet_directory().'/lib/includes/footer.inc.php');

################################################################################
# Navigation                                                                   #
################################################################################
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header_right', 'genesis_do_nav', 12 );

################################################################################
# News Area                                                                    #
################################################################################
add_action('genesis_before_footer', 'recent_news_posts', 5);
function recent_news_posts(){
    $post_args = [
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'post_type' => 'post',
    ];

    $post_query = new WP_Query($post_args);
    if(!$post_query->have_posts()):
        wp_reset_postdata();
        return;
    endif;
    
    echo '<div class="recent_news_posts">';
    echo '<ul>';
    $i = 1;
    while ( $post_query->have_posts() ) : $post_query->the_post();

        ## Title && URL
        $title = get_the_title();
        $url = get_permalink();

        ## Content
        $content = get_the_content();
        $content = substr(strip_tags($content), 0, 84);

        ## Date
        $date = get_the_date('Y-m-d');
        $human_date = date('F d, Y', strtotime($date));

        ## Image
        $image = get_the_post_thumbnail_url();
        if(empty($image))
            $image = get_field('default_featured_image','option');
    
        echo '<li class="item_'.$i.'">';

        echo '<img src="'.$image.'"/>';

        echo '<div class="cont">';
        echo '<time datetime="'.$date.'">'.$human_date.'</time>';
        echo '<h3>'.$title.'</h3>';
        echo '<p>'.$content.'...</p>';
        echo '<a class="button" href="'.$url.'">Read More</a>';
        echo '</div>';

        echo '</li>';
    $i++;
    endwhile;
    echo '</ul>';
    echo '</div>';

    wp_reset_postdata();


}

// Buttons**********



add_action('genesis_before_footer', 'about_us_footer_cta', 10);
function about_us_footer_cta(){
    $ignore = get_field('ignore_pages', 'options');
    if (in_array(get_the_id(),$ignore))
        return;
    
    echo '<div class="about_cta_cont">';
    echo '<a href="'.get_field('call_to_action_link', 'options').'" class="button">';
    echo get_field('call_to_action_text', 'options');
    echo '</a>';
    echo '</div>';
}

add_action('genesis_before_footer', 'about_us_footer_call_us', 15);
function about_us_footer_call_us(){
    $ignore = get_field('ignore_pages', 'options');
    if (in_array(get_the_id(),$ignore))
        return;
   
     
    echo '<div class="about_phone_cont">';
    echo '<a href="tel:'.get_field('call_to_action_phone', 'options').'" class="button">';
    echo get_field('call_to_action_phone_text', 'options');
    echo '</a>';
    echo '</div>';
}


