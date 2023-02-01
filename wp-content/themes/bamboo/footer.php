<?php
/**
* The template for displaying the footer
*/
$footer_logo = get_field( 'footer_logo','option' );
$footer_text = get_field( 'footer_text','option' );
$copyright = get_field( 'copyright_content','option' );
$current_year = date('Y');
$copyright_text = str_replace("[year]",$current_year ,$copyright);
$social_media = get_field( 'social_media','option' );
$general_inquiries = get_field( 'general_inquiries','option' );
$footer_offset_top = get_field( 'footer_offset_top' );
$class='';
if( $footer_offset_top ){
    $class=' mt-minus';
}
		echo '
		</div>
		<!-- footer part -->
        <footer class="main-footer'.$class.'">
            <div class="footer-top text-white">
                <div class="container">
                    <div class="row">
                        <div class="logo-wrap cell-lg-4">';
                            if($footer_logo){
                                echo'<div class="footer-logo">
                                    <a href="'.home_url( '/' ).'" >
                                        <img src="'. $footer_logo['url'] .'" alt="'. $footer_logo['alt'] .'">
                                    </a>
                                </div>';
                            }
                            if ( $footer_text ) echo '<div class="ft-text">'.$footer_text.'</div>';
                            if(have_rows('social_media', 'option')){
                                echo'<div class="social-media-wrapper">
                                    <ul class="social_icon_wrapper d-flex align-items-center">';
                                        while(have_rows('social_media', 'option')){the_row();
                                            $link = get_sub_field('social_media_link','option');
                                            if (strpos($link,'linkedin') !== false) {
                                                echo'<li><a href="'.$link.'" target="_blank" class="icon-linkedin"></a></li>';
                                            }
                                            else if (strpos($link,'twitter') !== false) {
                                                echo'<li><a href="'.$link.'" target="_blank" class="icon-twitter"></a></li>';
                                            }
                                            else if (strpos($link,'facebook') !== false) {
                                                echo'<li><a href="'.$link.'" target="_blank" class="icon-facebook"></a></li>';
                                            }
                                            else if (strpos($link,'youtube') !== false) {
                                                echo'<li><a href="'.$link.'" target="_blank" class="icon-youtube"></a></li>';
                                            }
                                            else if (strpos($link,'instagram') !== false) {
                                                echo'<li><a href="'.$link.'" target="_blank" class="icon-instagram"></a></li>';
                                            }
                                            else if (strpos($link,'google') !== false) {
                                                echo'<li><a href="'.$link.'" target="_blank" class="icon-google"></a></li>';
                                            }
                                        }
                                    echo'</ul>
                                </div>';
                            }
                        echo '</div>';
                        echo'<div class="footer-right cell-lg-8">
                            <div class="row ">';
                                if ( has_nav_menu( 'footer-menu' ) ) {
                                    echo '<div class="cell-sm-6">';
                                        echo'<div class="single-menu-wrap">';
                                            wp_nav_menu(array('theme_location' => 'footer-menu','container' => 'ul'));
                                        echo'</div>';
                                    echo'</div>';
                                }
                                if ( $general_inquiries ) {
                                    echo '<div class="cell-sm-6">
                                        <div class="footer-desc">'.$general_inquiries.'</div>
                                    </div>';
                                }
                            echo '</div>
                        </div>
                    </div>';
                echo '</div>
            </div>';
            if($copyright_text || has_nav_menu( 'policy-menu' )){
                echo '<div class="footer-bottom">
                    <div class="container">
                        <div class="ft-content-wrap d-flex align-items-center justify-content-center">';
                            if($copyright_text){
                                echo '<span>'.$copyright_text. '</span>';
                            }
                            if ( has_nav_menu( 'policy-menu' ) ) {
                                echo'<div class="ft-privacy-nav">
                                    <nav>';
                                        wp_nav_menu(array('theme_location' => 'policy-menu','container' => 'ul'));
                                    echo'</nav>
                                </div>';
                            }
                        echo '</div>
                    </div>
                </div>';
            }
        echo '</footer>
    </div>';
        echo get_field( 'footer_script', 'options' );
		wp_footer();
	echo '</body>
</html>';