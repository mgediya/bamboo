<?php
$tabs = get_sub_field('add_tabs');
$title = get_sub_field('our_values_title');
// $subheading = get_sub_field('our_values_subheading');
$values = get_sub_field('add_our_values');
$offset_top = get_sub_field('offset_top');
$margin = '';
if( $offset_top == 1 ) $margin = ' mt-minus';
echo '<section class="our-mission-and-vision">
    <div class="container">
        <div class="tabs-wrapper'.$margin.'">';
            if ( $tabs ){
                $i = 1;
                echo '<ul class="tabs-nav">';
                    while( have_rows('add_tabs') ) {
                        the_row();
                        $tab_title = get_sub_field('tab_title');
                        $active=' ';
                        if( $i==1 ) $active = ' active';
                        if($tab_title) echo '<li class="tabs-item'.$active.'"><h4 data-href="#tab'. $i .'">'.$tab_title.'</h4></li>';
                        $i++;
                    }
                echo '</ul>';

                $j=1;
                echo '<div class="tabs-content-wrap">';
                    while( have_rows('add_tabs') ) {
                        the_row();
                        $tab_description = get_sub_field('tab_description');
                        $tab_button = get_sub_field('tab_button');
                        $tab_image = get_sub_field('tab_image');
                        $active = '';
                        if( $j == 1 ) $active = ' active';
                        echo '<div id="tab'.$j.'" class="tab-content'.$active.'">';
                            echo '<div class="row no-gutters">
                                <div class="cell-md-7">
                                    <div class="tb-content">';
                                        if($tab_description) echo'<div class="desc"><p>'.$tab_description.'</p></div>';
                                        if( $tab_button ) echo acf_link( $tab_button, 'btn-link -arrow' );
                                    echo '</div>
                                </div>
                                <div class="cell-md-5">';
                                    echo ' <div class="tb-image">';
                                        if ( $tab_image ) acf_img($tab_image,'');
                                    echo '</div>
                                </div>
                            </div>
                        </div>';
                        $j++;
                    }
                echo '</div>';
            }
        echo '</div>
        <div class="our-value-wrapper">';
            echo '<div class="row no-gutters justify-content-end">';
                echo '<div class="cell-lg-9">';
                    if ( $title ){
                        echo '<div class="section-heading">';
                            if ( $title) echo '<h2>'.$title.'</h2>';
                        echo '</div>';
                    }
                    if ( $values ){
                        echo '<div class="row">';
                            while( have_rows('add_our_values') ) {
                                the_row();
                                $title = get_sub_field('title');
                                $description = get_sub_field('description');
                                echo '<div class="cell-sm-6">
                                    <div class="ov-wrap">';
                                        if ( $title ) echo '<h4>'.$title.'</h4>';
                                        if ( $description ) echo $description;
                                    echo '</div>
                                </div>';
                            }
                        echo '</div>';
                    }
                echo '</div>
            </div>
        </div>
    </div>
</section>';