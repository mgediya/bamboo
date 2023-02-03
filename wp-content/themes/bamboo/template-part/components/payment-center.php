<?php
$sub_heading = get_sub_field('sub_heading');
$heading = get_sub_field('heading');
$image = get_sub_field('image');
$cta1 = get_sub_field('cta1');
$cta2 = get_sub_field('cta2');
echo '<section class="payment-center-section">
    <div class="container">
        <div class="pc-wrapper">
            <div class="row align-items-center">
                <div class="cell-md-6">
                    <div class="pc-desc">';
                        if($sub_heading) echo'<h5>'.$sub_heading.'</h5>';
                        if($heading) echo'<h3>'.$heading.'</h3>';
                        echo '<div class="pc-btnwrap">';
                            if($cta1) acf_link( $cta1, 'check-btn btn-main' );
                            if($cta2) acf_link( $cta2, 'cancle-btn btn-main trigger-oneinc-portal-modal' );
                        echo '</div>
                    </div>
                </div>
                <div class="cell-md-6">
                    <div class="pc-img">';
                        if($image) acf_img($image);
                    echo '</div>
                </div>
            </div>
        </div>
    </div>
</section>';

Bamboo_OneInc_Portal_Modal_Integration::frontend();