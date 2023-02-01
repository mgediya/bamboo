<?php
$tabs = get_sub_field('add_tabs');
$title = get_sub_field('our_values_title');
$subheading = get_sub_field('our_values_subheading');
$values = get_sub_field('add_our_values');
$cta = get_sub_field('cta');
echo '<section class="partner-type-tab-section">
    <div class="container">
        <div class="tabs-wrapper">';
            if ( $tabs ) {
                $i = 1;
                echo '<ul class="tabs-nav">';
                    while( have_rows('add_tabs') ) {
                        the_row();
                        $tab_title = get_sub_field('tab_title');
                        $active='';
                        if ( $i == 1) $active = ' active';
                        if ( $tab_title )  echo '<li class="tabs-item'.$active.'"><h4 data-href="#tab'.$loop.$i.'">'.$tab_title.'</h4></li>';
                        $i++;
                    }
                echo '</ul>';
                echo '<div class="tabs-content-wrap">';
                    $j=1;
                    while( have_rows('add_tabs') ) {
                        the_row();
                        $add_logo = get_sub_field( 'add_logo' );
                        $active = '';
                        if ( $j == 1 ) $active = ' active';
                        echo '<div id="tab'.$loop.$j .'" class="tab-content'.$active.'">';
                            if( $add_logo ) {
                                echo '<div class="tb-content d-flex justify-content-center align-items-center">';
                                    while( have_rows('add_logo') ) {
                                        the_row();
                                        $logo = get_sub_field('logo');
                                        $link = get_sub_field('link');
                                        if ( $logo ) {
                                            echo '<a href="'.$link.'" class="ptt-addlogo" target="blank">';
                                                acf_img($logo);
                                            echo '</a>';
                                        }
                                    }
                                echo '</div>';
                            }
                        echo '</div>';
                        $j++;
                    }
                echo '</div>';
            }
        echo '</div>';
        if( $cta ) {
            echo '<div class="cta-wrap text-center">';
                acf_link( $cta, 'btn-arrow' );
            echo '</div>';
        }
    echo '</div>
</section>';