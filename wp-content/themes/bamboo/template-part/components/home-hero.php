<?php
$hero_sub_heading = get_field('hero_sub_heading');
$hero_heading = get_field('hero_heading');
$hero_image = get_field('hero_image');
$cta_1 = get_field('primary_hero_cta');
$cta_2 = get_field('secondary_hero_cta');
$form_title = get_field('form_title');
$select_form = get_field('select_form');
echo '<section class="home-hero-section">
    <div class="hh-inner d-flex align-items-center">';
        if ( $hero_image ) {
            echo '<div class="bg-image">';
                acf_img($hero_image,'');
            echo'</div>';
        }
        echo '<div class="container">
            <div class="hh-content">';
                if ( $hero_sub_heading ) echo '<div class="small">'.$hero_sub_heading.'</div>';
                if ( $hero_heading ) echo '<h1>'.$hero_heading.'</h1>';
                if ( $cta_1 || $cta_2) {
                    echo '<div class="btn-wrap d-flex align-items-center">';
                        // if( $cta_1 ) acf_link( $cta_1, 'btn -white get-a-quote' );
                        if( $cta_1 ) echo '<a href="javascript:void();" data-src="#modal" class="btn -white get-a-quote" data-fancybox>'.$cta_1['title'].'</a>';
                        if( $cta_2 ) acf_link( $cta_2, 'btn-link coverage-btn' );
                    echo '</div>';
                }
            echo '</div>
        </div>
    </div>';
    if( $select_form ){
        echo '<div class="form-wrapper" style="display: none;" id="modal">';
        if($form_title) echo '<h3>'.$form_title.'</h3>';
        if ( $select_form ) echo do_shortcode( '[gravityform id="'.$select_form.'" title="false" description="false" ajax="true"]');
        echo '</div>';
    }
    if( have_rows('add_features') ) {
        echo '<div class="hh-features-grid">
            <div class="container">
                <div class="hh-features-inner">
                    <div class="row">';
                        while( have_rows('add_features') ) {
                            the_row();
                            $featured_icon = get_sub_field('featured_icon');
                            $featured_text = get_sub_field('featured_text');
                            $featured_descriptions = get_sub_field('featured_descriptions');
                            echo '<div class="cell-md-4 grid-items">
                                <div class="grid-inner">';
                                    echo '<div class="feature-wrap">
                                        <div class="feature-head d-flex align-items-center">';
                                            if ( $featured_icon ) acf_img($featured_icon,'icon');
                                            if ( $featured_text ) echo '<h2 class="h4 title">'.$featured_text.'</h2>';
                                        echo '</div>';
                                        if ( $featured_descriptions ) echo $featured_descriptions;
                                    echo '</div>
                                </div>
                            </div>';
                        }
                    echo '</div>
                </div>
            </div>
        </div>';
    }
echo '</section>';