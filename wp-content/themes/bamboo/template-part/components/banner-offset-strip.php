<?php
$heading = get_sub_field('heading');
$sub_heading = get_sub_field('sub_heading');
$image = get_sub_field('image');
$offset_top = get_sub_field('offset_top');
$margin='';
if ( $offset_top == 1 ) $margin = ' mt-minus';
echo '<section class="banner-offset-strip-section'.$margin.'">
    <div class="container">
        <div class="pos-warpper">
            <div class="row align-items-center no-gutters">
                <div class="cell-md-8">
                    <div class="pos-leftwrap">';
                        if ( $heading ) echo '<h2>'.$heading.'</h2>';
                        if ( $sub_heading ) echo $sub_heading;
                    echo '</div>
                </div>';
                if ( $image ) {
                    echo '<div class="cell-md-4">
                        <div class="pos-rightwrap">';
                            acf_img($image,'');
                        echo '</div>
                    </div>';
                }
            echo '</div>
        </div>
    </div>
</section>';