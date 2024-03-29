<?php

/**
 * Template Name: About Us Template 
 **/

add_action('genesis_after_entry', 'main_grid');
function main_grid(){
    if(!have_rows('main_grid') )
        return;
    
    echo '<ul class="about_us_grid">';
    while ( have_rows('main_grid') ) : the_row();
        $content = get_sub_field('content');
        $image = get_sub_field('image');

        echo '<li>';

        echo '<div class="grid_content">';
        echo $content;
        echo '</div>';

        echo '<div class="grid_image">';
        echo '<img src="'.$image.'"/>';
        echo '</div>';

        echo '</li>';

    endwhile;
    echo '</ul>';
}

add_action('genesis_after_entry', 'text_grid');
function text_grid(){
   
    if(!have_rows('text_grid') )
        return;
    
    echo '<ul class="values_grid">';
    while ( have_rows('text_grid') ) : the_row();
        $content = get_sub_field('the_content');
       

        echo '<li>';

        echo '<div class="grid_content">';
        echo $content;
        echo '</div>';


        echo '</li>';

    endwhile;
    echo '</ul>';
}


add_action('genesis_after_entry', 'cta_grid');
function cta_grid(){
    if(!have_rows('cta_grid') )
        return;
    
    echo '<ul class="action_grid">';
    while ( have_rows('cta_grid') ) : the_row();
        $content = get_sub_field('content');
        $image = get_sub_field('image');

        echo '<li>';

        echo '<div class="grid_content">';
        echo $content;
        echo '</div>';

        echo '<div class="grid_image">';
        echo '<img src="'.$image.'"/>';
        echo '</div>';

        echo '</li>';

    endwhile;
    echo '</ul>';
}



genesis();
