<?php
$sub_heading = get_sub_field('sub_heading');
$heading = get_sub_field('heading');
$image = get_sub_field('image');
$form_title = get_sub_field('form_title');
$form_sub_heading = get_sub_field('form_sub_heading');
$form_id = get_sub_field('select_form');

$bg_option = get_sub_field('background');
$bg='';
if($bg_option == 1){
    $bg = ' -color';
}

echo '<section class="quote-form-section '.$bg.'" id="get-a-quote">
    <div class="container">
        <div class="qf-main">
            <div class="qf-heading">';
                if ( $sub_heading ) echo '<h3 class="qf-title">'.$sub_heading.'</h3>';
                if ( $heading )  echo '<h2>'.$heading.'</h2>';
            echo '</div>
            <div class="qf-contant row">';
                if ( $image ) {
                    echo '<div class="cell-lg-7">
                        <div class="qf-image">';
                            acf_img( $image);
                        echo '</div>
                    </div>';
                }
                echo '<div class="cell-lg-5">
                    <div class="form-wrapper">';
                        if ( $form_title || $form_sub_heading ) {
                            echo '<div class="form-heading text-center">';
                                if ( $form_title ) echo '<h3>'.$form_title.'</h3>';
                                if ( $form_sub_heading ) echo '<div class="sub-heading">'.$form_sub_heading.'</div>';
                            echo '</div>';
                        }
                        if ( $form_id ) echo do_shortcode( '[gravityform id="'.$form_id.'" title="false" description="false" ajax="true"]');
                    echo '</div>
                </div>
            </div>
        </div>
    </div>
</section>';
?>