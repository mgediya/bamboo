<?php
$heading = get_sub_field('heading');
$cta_link = get_sub_field('cta_link');
$bg_option = get_sub_field('background');
if ( $bg_option == 'gradient') $bg = ' -gradient';
else $bg = ' -texture';
echo '<section class="coverage-section'.$bg.'" id="coverage-part">
    <div class="container">
        <div class="cs-main">
        <div class="cs-wrap row align-items-center">
            <div class="cs-left cell-md-6">
                <div class="cs-heading">';
                    if ( $heading ) echo '<h2 class="left-head">'.$heading.'</h2>';
                    if( $cta_link )     acf_link( $cta_link, 'btn-secondary' );
                echo '</div>
            </div>';
            if( have_rows('add_coverage') ) {
                echo '<div class="cs-right cell-md-6">
                    <div class="cs-covrage">';
                        $count = 1;
                        while( have_rows('add_coverage') ) {
                            the_row();
                            $coverage_heading = get_sub_field('coverage_heading');
                            $coverage_description = get_sub_field('coverage_description');
                            $coverage_cta = get_sub_field('coverage_cta');
                            if( $count == 1 ) {
                                echo '<div class="cs-col">
                                    <div class="cs-inner">';
                                        if ( $coverage_heading ) echo '<h4 class="cs-head">'.$coverage_heading.'</h4>';
                                        if ( $coverage_description) echo $coverage_description;
                                        if( $coverage_cta ) acf_link( $coverage_cta, 'btn-link' );
                                    echo '</div>
                                </div>';
                            }
                            $count++;
                        }
                    echo '</div>
                </div>';
            }
        echo '</div>
        <div class="cs-wrap">';
            if( have_rows('add_coverage') ) {
                    echo '<div class="cs-covrage justify-content-end  d-flex">';
                        $count2 = 1;
                        while( have_rows('add_coverage') ) {
                            the_row();
                            $coverage_heading = get_sub_field('coverage_heading');
                            $coverage_description = get_sub_field('coverage_description');
                            $coverage_cta = get_sub_field('coverage_cta');
                            if($count2 != 1) {
                                echo '<div class="cs-col">
                                    <div class="cs-inner">';
                                        if ( $coverage_heading ) echo '<h4 class="cs-head">'.$coverage_heading.'</h4>';
                                        if ( $coverage_description ) echo $coverage_description;
                                        if( $coverage_cta ) acf_link( $coverage_cta, 'btn-link' );
                                    echo '</div>
                                </div>';
                            }
                            $count2++;
                        }
                    echo '</div>
                </div>';
            }
        echo '</div>
    </div>
</section>';