<?php
/**
 * Template Name: Front Page
 */

get_header();
echo '<!-- content area part -->';
echo '<div class="main-content">';
    include(locate_template('template-part/components/home-hero.php'));
    include(locate_template('template-part/components.php'));
echo '</div>';
get_footer();
