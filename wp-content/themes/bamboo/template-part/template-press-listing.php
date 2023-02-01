<?php
/**
 * Template Name: Press Listing
 */

get_header();
?>
<style>
    .hidden {
        display: none;
    }
</style>
<?php
$hero_title = get_field('hero_title');
$hero_sub_heading = get_field('hero_sub_heading');
$banner_image = get_field('banner_image');
$latest_post = get_field('latest_post');
$add_tab_list = get_field('add_tab_list');
$heading = get_field('heading');
$filter_bar_title = get_field('filter_bar_title');

$terms = get_terms( 'category', array('hide_empty' => false) );
$select_category = get_field('by_category');
$pager = isset($_REQUEST['pager']) ? $_REQUEST['pager'] : '1';
$category_filter = isset($_REQUEST['category']) ? $_REQUEST['category'] : '0';

if ( $banner_image ) $img_overlay = ' img_overlay';
else $img_overlay = ' bg-shape';

echo '<section class="inner-hero'.$img_overlay.'">';
    echo '<div class="inner-hero-bg">';
        if($banner_image) acf_img($banner_image,'banner-image');
    echo '</div>';
    echo '<div class="container">
        <div class="inner-hero-content text-center text-white">';
            if ( $hero_sub_heading ) echo '<h5 class="small">'. $hero_sub_heading .'</h5>';
            if ( $hero_title ) echo '<h1 class="h1">'.$hero_title.'</h1>';
            else echo '<h1 class="h1">'.get_the_title().'</h1>';
        echo '</div>
    </div>
</section>';

echo '<div class="main-content">';
    if ( $latest_post ) {
        echo '<section class="latest-post">
            <div class="container">
                <div class="lp-wapper">
                    <div class="row no-gutters" >';
                        foreach($latest_post as $lt_post){
                            $lt_id = $lt_post->ID;
                            $cat_terms = get_the_terms( $lt_id, 'category' );
                            $featured_img = get_the_post_thumbnail($lt_id);
                            $author_tag = array();
                            $publish_date = get_field('post_date', $lt_id);
                            $author_name = get_field ('author_name', $lt_id);
                            $twitter_link = get_field ('twitter_link', $lt_id);
                            $facebook_link = get_field ('facebook_link', $lt_id);
                            $ps_time = human_time_diff(get_post_time( 'U', $lt_id ));
                            $description = get_the_excerpt($lt_id);
                            $length = 210;
                            if (strlen($description) <= $length) {
                                $description = $description;
                            } else {
                                $description = substr($description, 0, $length) . ' [...]';
                            }
                            if ( $featured_img ) {
                                echo '<div class="cell-lg-5">
                                    <div class="lp-img"><a href="'.get_the_permalink($lt_id).'">'.$featured_img.'</a></div>
                                </div>';
                            }
                            echo '<div class="cell-lg-7">';
                                echo '<div class="lp-content">';
                                    if ( $cat_terms ) {
                                        echo '<div class="res-type">
                                            <ul class="catlist d-flex justify-content-end">';
                                                foreach ($cat_terms as $term) {
                                                    $args = array(
                                                        'post_type' => 'post',
                                                        'posts_per_page' => 1,
                                                        'tax_query' => array(
                                                            array(
                                                                'taxonomy' => 'category',
                                                                'field' => 'term_id',
                                                                'terms' => $term->term_id,
                                                            ),
                                                        )
                                                    );
                                                    $query = new WP_Query( $args );
                                                    if ( $query->have_posts() ) {
                                                        echo '<li class="catitem">'.esc_html( $term->name ).'</li>';
                                                    }
                                                    wp_reset_postdata();
                                                }
                                            echo '</ul>
                                        </div>';
                                    }
                                    echo '<div class="lp-content-wrap">';
                                        if ( $publish_date || $ps_time || $author_name ) {
                                            echo '<div class="lp-date-cat">';
                                                if ( $publish_date ) $author_tag[] = date_i18n('F jS, Y', strtotime( $publish_date ) );
                                                if ( $ps_time ) $author_tag[] = $ps_time;
                                                if ( $author_name ) $author_tag[] = $author_name;
                                                if( $author_tag ) {
                                                    $ps_auth = implode(" | ", $author_tag );
                                                    echo  '<span class="lp-author">'.$ps_auth.'</span>';
                                                }
                                            echo '</div>';
                                        }
                                        echo '<h2>'.get_the_title($lt_id).'</h2>';
                                        if ($description) echo '<p class="lp-desc">'.$description.'</p>';
                                        echo '<a href="'.get_the_permalink( $lt_id ).'" class="btn-link">'.esc_html(__("Read More",'bamboo')).'</a>';
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="social-iconcat">
                                    <ul class="social-wrapper">';
                                        if ($twitter_link) echo'<li><a href="'.$twitter_link.'" target="_blank" class="icon-twitter"></a></li>';
                                        if ($facebook_link) echo'<li><a href="'.$facebook_link.'" target="_blank" class="icon-facebook"></a></li>';
                                    echo '</ul>
                                </div>';
                            echo '</div>';
                        }
                    echo '</div>
                </div>
            </div>
        </section>';
    }
    echo '<section class="most-current-news">
        <div class="container">';
            echo '<form method="post" id="filter_form">
                <input type="hidden" name="pager" id="pager" value="'.$pager.'" >
                <input type="hidden" name="category" id="category" value="'.$category_filter.'" >
            </form>';
            echo '<div class="fb-cat-row d-flex">';
                if ( $filter_bar_title ) {
                    echo '<div class="filter-column"><div class="filter-listitem">
                        <span class="checkbox-list gallery-catlist">'.$filter_bar_title.'</span>
                    </div></div>';
                }
                $selected = '';
                if( $category_filter == 0 ) { $selected = ' selected'; }
                echo '<div class="filterlist portfolioFilter">';
                    // echo '<a href="#" data-filter="*" class="current gallery-catlist '.$selected.'">'.__( 'Most Current', 'bamboo').'</a>';
                    echo '<span data-filter="*" class="gallery-catlist '.$selected.'">'.__( 'Most Current', 'bamboo').'</span>';
                    if( $select_category ){
                        foreach( $select_category as $cat ) {
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'category',
                                        'field' => 'term_id',
                                        'terms' => $cat->term_id,
                                    ),
                                )
                            );
                            $query = new WP_Query( $args );
                            if ( $query->have_posts() ) {
                                $class = '';
                                if( $category_filter == $cat->term_id ) {
                                        $class = ' selected';
                                }
                                // echo '<a href="#" class="gallery-catlist '.$class.'" data-filter=".'.$cat->slug.'">'.$cat->name.'</a>';
                                echo '<span class="gallery-catlist '.$class.'" data-filter=".'.$cat->slug.'">'.$cat->name.'</span>';
                            } wp_reset_postdata();
                        }
                    }
                echo '</div>';
            echo '</div>';
            if( $heading ) {
                echo '<div class="mcn-heading"><h2>'.$heading.'</h2></div>';
            }
            echo '<div class="mcn-post-wrap portfolioContainer grid">';
                $posts_per_page = -1;
                $args = array(
                    'post_type' => 'post',
                    'order' => 'DESC',
                    'orderby' => 'date',
                    'post_status' => 'publish',
                    'posts_per_page' => $posts_per_page,
                );
                $blog_query = new WP_Query( $args );
                if( $blog_query->have_posts() ) {
                    $i = 0;
                    while( $blog_query->have_posts() ) {
                        $i++;
                        $blog_query->the_post();
                        $p_id = get_the_ID();
                        $img = get_the_post_thumbnail_url($p_id);
                        $link = get_permalink($p_id);
                        $coun_tag = array();
                        $pub_date = get_field('post_date', $p_id);
                        $time_ago = human_time_diff(get_post_time( 'U', $p_id ));
                        $cat_terms_ids = array();
                        $cat_terms = get_the_terms($p_id, 'category');
                        if ($cat_terms && !is_wp_error($cat_terms)) {
                            foreach ( $cat_terms as $term ) {
                                $cat_terms_ids[] = $term->slug;
                            }
                        }
                        $class = '';
                        if( $i > 6) { $class= 'hidden'; }
                        echo '<div class="grid-item isotope-item '.$class.' '.implode(" ",$cat_terms_ids).'">';
                            echo '<a href="'. $link .'" class="viewPlan">';
                                echo '<div class="mcn-post-card">';
                                    if ( $img ) echo '<div class="mcn-img"><img src="'.$img.'" alt="featured-img"></div>';
                                    if ( $pub_date || $time_ago ) {
                                        if ( $pub_date ) $coun_tag[] = date_i18n('F jS, Y', strtotime( $pub_date ) );
                                        if ( $time_ago ) $coun_tag[] = $time_ago;
                                        if( $coun_tag ) {
                                            $cattopic = implode(" | ", $coun_tag );
                                            echo '<span class="mcn-date">'.$cattopic.'</span>';
                                        }
                                    }
                                    echo '<div class="mcn-content">';
                                        echo '<div class="post-desc">
                                            <h5 class="title">'. get_the_title() .'</h5>
                                            <span class="btn-link ">'.__( 'Full Article', 'bamboo').'</span>
                                        </div>
                                    </div>';
                                echo '</div>';
                            echo '</a>';
                        echo '</div>';
                    }
                    wp_reset_postdata();
                }
            echo '</div>';
        echo '</div>
    </section>';
    include(locate_template('template-part/components.php'));
echo '</div>';
get_footer();