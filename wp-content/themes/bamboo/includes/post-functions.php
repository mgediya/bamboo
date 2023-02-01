<?php
function related_content_grid($post_id) {
    $img = get_the_post_thumbnail_url($post_id);
    $link = get_permalink($post_id);
    $coun_tag = array();
    $pub_date = get_field('post_date', $post_id);
    $time_ago = human_time_diff(get_post_time( 'U', $post_id ));
    echo '<div class="grid-item">';
        echo '<a href="'. $link .'">';
            echo '<div class="mcn-post-card">';
                if($img) {
                    echo '<div class="mcn-img ">
                            <img src="'. $img .'" >
                    </div>';
                }
                if ( $pub_date || $time_ago ) {
                    if ( $pub_date ) {
                        $coun_tag[] = date_i18n('F jS, Y', strtotime( $pub_date ) );
                    }
                    if ( $time_ago ) {
                        $coun_tag[] = $time_ago;
                    }
                    if( $coun_tag ) {
                        $cattopic = implode(" | ", $coun_tag );
                        echo '<span class="mcn-date">'.$cattopic.'</span>';
                    }
                }
                echo '<div class="mcn-content">';
                    echo '<div class="post-desc">
                        <h5 class="title">'. get_the_title($post_id) .'</h5>
                        <span class="btn-link">'.__( 'Full Article', 'bamboo').'</span>
                    </div>
                </div>';
            echo '</div>';
        echo '</a>';
    echo '</div>';
}