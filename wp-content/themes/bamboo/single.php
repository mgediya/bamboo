<?php
/**
 * Post template.
 */
if (!defined('ABSPATH') || !function_exists('add_filter')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit;
}
get_header();
$author_tag = array();
$publish_date = get_field('post_date');
$author_name = get_field ('author_name');
$twitter_link = get_field ('twitter_link');
$facebook_link = get_field ('facebook_link');
$ps_time = human_time_diff(get_post_time( 'U' ));
$featured_img = get_the_post_thumbnail();
echo '<section class="inner-hero img_overlay single-hero">';
    if ( $featured_img ) echo '<div class="inner-hero-bg">'.$featured_img.'</div>';
echo '</section>';
echo '<div class="main-content">';
    echo '<section class="post-detail-hero bullet-styled ">
        <div class="container">
            <div class="pdh-wrapper">
                <div class="pdh-content">';
                    if ( $publish_date || $ps_time || $author_name ) {
                        echo '<div class="pdh-date">';
                            if ( $publish_date ) $author_tag[] = date_i18n('F jS, Y', strtotime( $publish_date ) );
                            if ( $ps_time ) $author_tag[] = $ps_time;
                            if ( $author_name ) $author_tag[] = $author_name;
                            if( $author_tag ) {
                                $ps_auth = implode(" | ", $author_tag );
                                echo '<span class="pdh-auth">'.$ps_auth.'</span>';
                            }
                        echo '</div>';
                    }
                    echo '<div class="pdh-socialicon">
                        <ul class="pdh-icon-wrapper">';
                            if ( $twitter_link ) echo'<li><a href="'.$twitter_link.'" target="_blank" class="icon-twitter"></a></li>';
                            if ( $facebook_link ) echo'<li><a href="'.$facebook_link.'" target="_blank" class="icon-facebook"></a></li>';
                        echo '</ul>
                    </div>';
                echo '</div>';
                echo '<h1 class="h3">'.get_the_title().'</h1>';
                echo '<div class="pdh-desc">'.the_content().'</div>';
            echo '</div>';
            $prev_post = get_previous_post();
            $next_post = get_next_post();
            echo '<nav id="nav-single" class="blog-navigation">';
                if ( !empty( $prev_post ) ) {
                    echo '<div class=" bn-prev">
                        <h2><a class="btn" href="'.get_permalink( $prev_post->ID ).'">'. __( 'Go Back', 'bamboo' ).'</a></h2>
                    </div>';
                }
                if ( !empty( $next_post ) ) {
                    echo '<div class=" bn-next">
                        <h2><a class="btn" href="'.get_permalink( $next_post->ID ).'">'.__( 'Next Article', 'bamboo' ).'</a></h2>
                    </div>';
                }
            echo '</nav>
        </div>
    </section>';
    include(locate_template('template-part/components.php'));
echo '</div>';
get_footer();