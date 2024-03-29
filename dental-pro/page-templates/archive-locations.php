<?php

global $wp_query;
$cpt = $wp_query->query_vars['post_type'];

echo "<h1>$cpt</h1>";

genesis();
