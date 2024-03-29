<?php

/**
 * Template Name: News Template 
 **/

## Removed Defeault Loop (will not accept anything inside the normal editor)
remove_action( 'genesis_loop', 'genesis_do_loop' );
remove_action('genesis_before_footer', 'recent_news_posts', 5);
## Added our post loop for blog (posts) posts
add_action('genesis_loop', 'blog_posts');
function blog_posts(){

    echo '<h1 class="entry-title">'.get_the_title().'</h1>';

    $blog_args = array(
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'post_type' => 'post',
    );

    $blog_query = new WP_Query($blog_args);
    if(!$blog_query->have_posts() ) :
        echo 'Hey, sorry, there are no new blog posts...';
        wp_reset_postdata();
    endif;

    echo '<ul class="blog_posts_grid">';
    while ( $blog_query->have_posts() ) : $blog_query->the_post();
       
        $image = get_the_post_thumbnail_url();
        if(empty($image))
            $image = '/wp-content/uploads/2024/01/logo.png';

        $content = strip_tags(get_the_content());
        $content_excerpt = wp_trim_words( $content, $num_words = 10, $more = '...' );

        $date = get_the_date('M d Y');

        echo '<li>';
        echo '<a href="'.get_permalink().'">';

        echo '<img src="'.$image.'" />';
        echo '<span>'.$date.'</span>';
        echo '<h2>'.get_the_title().'</h2>';
        
        echo '<p>'.$content_excerpt.'</p>';
        echo '</a>';
        echo '</li>';
    endwhile;
    echo '</ul>';
    wp_reset_postdata();
}



genesis();
