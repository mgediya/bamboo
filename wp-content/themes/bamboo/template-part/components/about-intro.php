<?php
$heading= get_sub_field('heading');
$sub_heading = get_sub_field('sub_heading');
$description = get_sub_field('description');
echo'<section class="about-intro-section">
    <div class="container">
        <div class="ai-wrapper">
            <div class="row">
                <div class="cell-lg-5">
                    <div class="ai-leftwrap">';
                        if ( $heading ) echo '<h3>'.$heading.'</h3>';
                        if ($sub_heading ) echo '<h2>'.$sub_heading.'</h2>';
                    echo '</div>
                </div>
                <div class="cell-lg-7">
                    <div class="ai-rightwrap">';
                        if ( $description ) echo $description;
                    echo '</div>
                </div>
            </div>
        </div>
    </div>
</section>';
?>