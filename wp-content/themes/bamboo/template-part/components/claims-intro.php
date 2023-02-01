<?php
$heading = get_sub_field('heading');
$sub_heading = get_sub_field('sub_heading');
$image = get_sub_field('image');
$cta_1 = get_sub_field('cta_1');
$cta_2 = get_sub_field('cta_2');

echo '<section class="claims-intro-section">
    <div class="container">
        <div class="ci-wrapper">';
            if ( $image ) {
                echo '<div class="ci-image">';
                    acf_img($image);
                echo '</div>';
            }
            echo '<div class="ci-desc">
                <div class="sec-heading">';
                    if($heading) echo '<h2>'.$heading.'</h2>';
                    if($sub_heading) echo $sub_heading;
                echo '</div>';
                echo'<div class="ci-btnwrap">';
                    if ( $cta_1 ) acf_link( $cta_1, 'btn-arrow claim-one' );
                    if ( $cta_1 && $cta_2 ) echo '<span>'.__('or','bamboo').'</span>';
                    if ( $cta_2 ) acf_link( $cta_2, 'btn-arrow claim-two' );
                echo '</div>
            </div>
        </div>
    </div>
</section>';