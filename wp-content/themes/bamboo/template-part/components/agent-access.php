<?php
$heading = get_sub_field('heading');
$add_city = get_sub_field('add_city');
$count = count($add_city);
$class = '';
if ( $count == 1 ) $class = ' fullwidth';
echo '<section class="agent-access-section">
    <div class="container">
        <div class="aa-wrapper">';
            if ( $heading ) echo '<div class="sec-heading"><h2>'.$heading.'</h2></div>';
            if ( $add_city ) {
                $count = 1;
                echo '<div class="row align-items-center'.$class.'">';
                    while( have_rows('add_city') ) {
                        the_row();
                        $title = get_sub_field('title');
                        $cta2 = get_sub_field('cta2');
                        $cta1 = get_sub_field('cta1');
                        $map_image = get_sub_field('map_image');
                        echo '<div class="cell-md-6 border-line">
                            <div class="aa-innerwrap">
                                <div class="aa-img ">';
                                    if($map_image) acf_img( $map_image );
                                echo '</div>
                                <div class="aa-description">';
                                    if ( $title ) echo '<h3>'.$title.'</h3>';
                                    echo '<div class="btnwrap">';
                                        if ( $cta1 ) acf_link( $cta1, 'map-btn');
                                        if ( $cta2 ) acf_link( $cta2, 'map-btn');
                                    echo '</div>
                                </div>
                            </div>
                        </div>';
                    }
                echo'</div>';
            }
        echo '</div>
    </div>
</section>';