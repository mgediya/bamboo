<?php
$sub_heading = get_sub_field('sub_heading');
$rating_star = get_sub_field('rating_star');
$heading = get_sub_field('heading');
$testimonial = get_sub_field('add_testimonial');
$offset_top = get_sub_field('offset_top');
$bg_option = get_sub_field('background');
$margin = '';
if ( $offset_top == 1 ) $margin = ' mt-minus';
$counter = count( $testimonial );
$class = '';
if($counter < 3) $class=' no-space';
if($bg_option == 'color') $bg = ' -color';
else $bg = ' -texture';
echo '<section class="testimonial-section'.$bg.$margin.'">
    <div class="container">
        <div class="ts-heading">
            <div class="ts-subtitle d-flex align-items-center">';
                if ( $sub_heading ) echo '<p class="sub-heading"><span>'.$sub_heading.'</span></p>';
                if ( $rating_star ) {
                    echo'<div class="ts-review-img">
                        <div class="star-img">
                            <img class="star-black" src="' .get_template_directory_uri(). '/assets/images/star-black.svg" alt="star-black">
                            <div class="yellow-img" style =" width: calc(('.$rating_star.' * 100%) / 5); ">
                                <img src="' .get_template_directory_uri(). '/assets/images/star-grp2.svg" alt="star-grp2">
                            </div>
                        </div>
                        <div class="black-img">
                            <img src="' .get_template_directory_uri(). '/assets/images/star-grp-black2.svg" alt="star-grp-black2">
                        </div>
                    </div>';
                }
            echo '</div>';
            if ( $heading ) echo '<h2>'. $heading .'</h2>';
        echo '</div>';
        if( $testimonial ) {
            echo'<div class="ts-testimonial-wrapper'.$class.'">
                <div class="ts-testimonial">';
                    while( have_rows('add_testimonial') ) {
                        the_row();
                        $rating_numbers = get_sub_field('rating_numbers');
                        $descriptions = get_sub_field('descriptions');
                        $speaker_details = get_sub_field('speaker_details');
                        echo '<div class="testimonial-item">
                            <div class="ts-details">';
                                if ( $rating_numbers ) {
                                    echo '<div class="ts-review-star-grp">
                                        <div class="ts-review-star">
                                            <div class="star-img">
                                                <img class="star-black" src="' .get_template_directory_uri(). '/assets/images/star-black.svg" alt="star-black">
                                                <div class="yellow-img" style =" width: calc(('.$rating_numbers.' * 100px) / 5) ">
                                                    <img src="' .get_template_directory_uri(). '/assets/images/star-grp2.svg" alt="star-grp2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                }
                                echo '<div class="sr-testimonial-content">';
                                    if ( $descriptions ) echo $descriptions;
                                    if ( $speaker_details ) echo '<h4>'.$speaker_details.'</h4>';
                                echo '</div>
                            </div>
                        </div>';
                    }
                echo '</div>
            </div>';
        }
    echo '</div>
</section>';