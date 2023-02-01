<?php
$heading = get_sub_field('heading');
$display_all_tab = get_sub_field('display_all_tab');
$add_tab_list = get_sub_field('add_tab_list');
$add_news = get_sub_field('add_news');
echo '<section class="most-current-news related-news">
<div class="container">';
    if( $add_news ) {
        $term_ids = array();
        foreach( $add_news as $member){
            $terms = get_the_terms( $member->ID , 'category' );
            if ( $terms && ! is_wp_error( $terms ) ) {
                foreach ( $terms as $term ) {
                    $term_ids[] = $term->term_id;
                }
            }
        }
        if( $heading ) {
            echo '<div class="mcn-heading"><h2>'.$heading.'</h2></div>';
        }
        echo '<div class="mcn-post-wrap bgb-data-row">';
            if( $add_news ){
                foreach( $add_news as $member){
                    $img = get_the_post_thumbnail_url($member->ID);
                    $link = get_permalink($member->ID);
                    $coun_tag = array();
                    $pub_date = get_field('post_date', $member->ID);
                    $time_ago = human_time_diff(get_post_time( 'U', $member->ID ));
                    $terms = get_the_terms( $member->ID , 'category' );
                    $class = '';
                    if ( $terms && ! is_wp_error( $terms ) ) {
                        $class = join(' ', wp_list_pluck($terms, 'slug'));
                    }
                    echo '<div class="grid-item '.$class.'">';
                        echo '<a href="'. $link .'" class="viewPlan">';
                            echo '<div class="mcn-post-card">';
                                if($img) echo '<div class="mcn-img "><img src="'. $img .'" alt="featured-img"></div>';
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
                                        <h5 class="title">'. get_the_title($member->ID) .'</h5>
                                        <span class="btn-link ">'.__( 'Full Article', 'bamboo').'</span>
                                    </div>
                                </div>';
                            echo '</div>';
                        echo '</a>';
                    echo '</div>';
                }
            }
        echo '</div>';
        echo '<div class="fb-cat-row d-flex">
            <div class="filter-column">
                <div class="filter-listitem">';
                    echo '<span class="checkbox-list gallery-catlist">'.__('Categories :','bamboo').'</span>';
                echo '</div>
            </div>';
            echo '<div class="filterlist bgb-cat-row">';
                echo '<span class="filter-btn gallery-catlist">'.__('Most Current','bamboo').'</span>';
                if (have_rows('add_tab_list')) {
                    while (have_rows('add_tab_list')) {
                        the_row();
                        $add_tab = get_sub_field('add_tab');
                        if ($add_tab) {
                            echo '<span class="filter-btn gallery-catlist" data-filter="' . '.' .$add_tab->slug.'">'.$add_tab->name.'</span>';
                        }
                    }
                }
            echo '</div>';
        echo '</div>';
    }
echo '</div>
</section>';