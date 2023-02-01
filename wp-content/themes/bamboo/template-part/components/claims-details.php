<?php
$heading = get_sub_field('heading');
$description = get_sub_field('description');
$sub_heading = get_sub_field('sub_heading');
$contact_number = get_sub_field('contact_number');
$add_link = get_sub_field('add_link');
$add_details = get_sub_field('add_details');

echo '<section class="claims-detail-section">
    <div class="container">
        <div class="cd-wrapper">
            <div class="row ">
                <div class="cell-lg-7">
                    <div class="cd-leftwrap">';
                        if ( $add_details ){
                            $count = 1;
                            while( have_rows('add_details') ) {
                                the_row();
                                $add_title = get_sub_field('add_title');
                                $add_description = get_sub_field('add_description');
                                echo'<div class="cd-description" id="claim'. $count .'">
                                    <div class="inner-description ">';
                                        if ( $add_title ) echo '<h4>'.$add_title.'</h4>';
                                        if ( $add_description ) echo '<div class="desc bullet-check">'.$add_description.'</div>
                                    </div>
                                </div>';
                                $count++;
                            }
                        }
                    echo'</div>
                </div>
                <div class="cell-lg-5">
                    <div class="cd-rightwrap">
                        <div class="sec-heading">';
                            if ( $heading ) echo'<h4>'.$heading.'</h4>';
                            if ( $description ) echo $description;
                            if($add_link){
                                echo '<div class="linkpages">';
                                    while( have_rows('add_link') ) {
                                        the_row();
                                        $add_page_link = get_sub_field('add_page_link');
                                        if($add_page_link) acf_link( $add_page_link, 'btn-link' );
                                    }
                                echo '</div>';
                            }
                        echo '</div>
                        <div class="policy-detail">';
                            if ( $sub_heading ) echo'<p class="pera-policy">'.$sub_heading.'</p>';
                            if ( $contact_number ) echo'<div class="contact-detail">'.$contact_number.'</div>';
                        echo'</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';