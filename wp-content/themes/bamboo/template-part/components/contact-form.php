<?php
$form_title = get_sub_field('form_title');
$heading = get_sub_field('heading');
$sub_heading = get_sub_field('sub_heading');
$contact_detail = get_sub_field('contact_detail');
$select_form = get_sub_field('select_form');
$contact_detail = get_sub_field('contact_detail');

echo '<section class="contact-form-section">
    <div class="container">
        <div class="cf-main">
            <div class="cf-wrap">
                <div class="row no-gutters cf-mainrow">
                    <div class="cell-lg-7">
                        <div class="form-wrapper cf-form">';
                            if ( $form_title ) echo '<div class="form-heading"><h3>'.$form_title.'</h3></div>';
                            if ( $select_form ) echo do_shortcode( '[gravityform id="'.$select_form.'" title="false" description="false" ajax="true"]');
                        echo '</div>
                    </div>
                    <div class="cell-lg-5">
                        <div class="cf-detailwrap">
                            <div class="cf-detailhead">';
                                if ( $heading ) echo'<h4>'.$heading.'</h4>';
                                if ( $sub_heading ) echo'<p>'.$sub_heading.'</p>';
                            echo'</div>';
                            if( $contact_detail ){
                                echo '<div class="cf-detailall">';
                                    while( have_rows('contact_detail') ) {
                                        the_row();
                                        $contact_title = get_sub_field('contact_title');
                                        $contact_data = get_sub_field('contact_data');
                                        echo '<div class="detail">';
                                            if ( $contact_title ) echo '<h3>'.$contact_title.'</h3>';
                                            if ( $contact_data ) echo '<p>'.$contact_data.'</p>
                                        </div>';
                                    }
                                echo'</div>';
                            }
                        echo '</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';
?>