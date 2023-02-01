<?php
$heading = get_sub_field('heading');
$accolades_title = get_sub_field('accolades_title');
echo '<section class="our-people-section">
    <div class="container">';
        if ( $heading ) echo '<div class="op-head"><h2>'.$heading.'</h2></div>';
        if( have_rows('add_people') ) {
            echo '<div class="op-people row">';
                while( have_rows('add_people') ) {
                    the_row();
                    $image_people = get_sub_field('image_people');
                    $sub_heading = get_sub_field('sub_heading');
                    $sub_title = get_sub_field('sub_title');
                    echo '<div class="cell-lg-3 cell-md-4 cell-6">
                        <div class="op-wrap">';
                            if ( $image_people ) {
                                echo '<div class="people-image">';
                                    acf_img( $image_people );
                                echo '</div>';
                            }
                            if ( $sub_heading || $sub_title ) {
                                echo '<div class="people-content">';
                                    if ( $sub_heading ) echo'<h3>'.$sub_heading.'</h3>';
                                    if ( $sub_title ) echo'<h4>'.$sub_title.'</h4>';
                                echo'</div>';
                            }
                        echo '</div>
                    </div>';
                }
            echo'</div>';
        }
        echo '<div class="op-accolades d-flex justify-content-center">';
            if ( $accolades_title ) echo '<h3>'.$accolades_title.'</h3>';
            if ( have_rows('add_accolades') ){
                echo '<div class="op-logos d-flex align-items-center">';
                    while( have_rows('add_accolades') ) {
                        the_row();
                        $accolades_logo = get_sub_field('accolades_logo');
                        echo '<div class="accolades-image">';
                            if ( $accolades_logo ) acf_img($accolades_logo);
                        echo '</div>';
                    }
                echo '</div>';
            }
        echo '</div>
    </div>
</section>';