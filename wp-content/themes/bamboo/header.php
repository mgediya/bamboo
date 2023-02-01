<?php
/**
* Default site header.
*/

if ( !defined( 'ABSPATH' ) || !function_exists( 'add_filter' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes() ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ) ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
	<?php
	echo '<!-- start -->
	<div class="wrapper">
		<div class="main-container">
		    <!-- device menu -->
			<div class="mbnav d-md-none">
                <div class="mbnav__backdrop"></div>
                <div class="mbnav__state" data-clickable="false">
                    <!--  main responsive menu -->
                    <div class="mbnav__inner">';
                        if ( has_nav_menu( 'main-menu' ) ) {
                            wp_nav_menu(array('theme_location' => 'main-menu','container' => 'ul','walker' => new My_Custom_Nav_Walker));
                        }
                    echo'</div>
                </div>
            </div>';
            $brand_logo = get_field( 'brand_logo','option' );
            $get_quote = get_field( 'get_quote','option' );
            $payments = get_field( 'payments','option' );
            $agent_login = get_field( 'agent_login','option' );
			echo'<header class="main-header py-30">
                <div class="container">
                    <div class="inner-header d-flex justify-content-between align-items-center">';
                        if($payments || $agent_login){
                            echo'<div class="top-header">';
                                if($payments) {
                                    echo '<a href="'.$payments['url'].'" class="top-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="239.999" height="200" viewBox="0 0 239.999 200">
                                        <path id="Union_1" data-name="Union 1" d="M615-192a50.058,50.058,0,0,1,50-50,50,50,0,0,1,50,50,50,50,0,0,1-50,50A50,50,0,0,1,615-192Zm10,0a40.045,40.045,0,0,0,40,40,40,40,0,0,0,40-40,40,40,0,0,0-40-40A40,40,0,0,0,625-192ZM495-162a20.023,20.023,0,0,1-20-20V-322a20.023,20.023,0,0,1,20-20H695a19.872,19.872,0,0,1,14.143,5.858A19.867,19.867,0,0,1,715-322v79.148a5,5,0,0,1-5,5,5,5,0,0,1-5-5V-322a9.934,9.934,0,0,0-2.929-7.071A9.937,9.937,0,0,0,695-332H495a10.011,10.011,0,0,0-10,10v140a10.011,10.011,0,0,0,10,10H597.712a5,5,0,0,1,5,5,5,5,0,0,1-5,5Zm157.808-11.552-11.429-12a5,5,0,0,1,.171-7.07,5,5,0,0,1,7.07.17l7.807,8.2,24.951-26.2a5,5,0,0,1,7.07-.17,5,5,0,0,1,.17,7.07l-28.57,30A5,5,0,0,1,656.429-172,5,5,0,0,1,652.808-173.552ZM510-197a5,5,0,0,1-5-5,5,5,0,0,1,5-5h80a5,5,0,0,1,5,5,5,5,0,0,1-5,5Zm0-25a5,5,0,0,1-5-5,5,5,0,0,1,5-5h50a5,5,0,0,1,5,5,5,5,0,0,1-5,5Zm140-55a10.011,10.011,0,0,1-10-10v-20a10.011,10.011,0,0,1,10-10h30a10.011,10.011,0,0,1,10,10v20a10.011,10.011,0,0,1-10,10Zm0-10h30v-20H650Z" transform="translate(-475 342)" fill="#fff"/>
                                    </svg>

                                        '.$payments['title'].'
                                    </a>';
                                }
                                if($agent_login) {
                                    echo '<a href="'.$agent_login['url'].'" class="top-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="81.885" height="105.157" viewBox="0 0 81.885 105.157">
                                    <path id="Union_2" data-name="Union 2" d="M183.91-337.333a2.9,2.9,0,0,1-1.31-2.43v-9.931H147.59a2.91,2.91,0,0,1-2.059-.85,2.906,2.906,0,0,1-.85-2.059v-10.87a2.909,2.909,0,0,1,2.91-2.91,2.909,2.909,0,0,1,2.91,2.91v7.97h32.11v-68.71h-32.1v5.49a2.91,2.91,0,0,1-2.91,2.911,2.91,2.91,0,0,1-2.91-2.911v-8.39a2.912,2.912,0,0,1,2.91-2.91h35.01v-9.08a2.9,2.9,0,0,1,1.282-2.414,2.9,2.9,0,0,1,2.718-.276L216.08-429.8a2.908,2.908,0,0,1,1.81,2.69v74.53a2.911,2.911,0,0,1-1.75,2.66l-29.48,12.829a2.892,2.892,0,0,1-1.154.24A2.894,2.894,0,0,1,183.91-337.333Zm4.511-89.78v82.92l23.659-10.3v-70.66l-23.659-9.62Zm-30.87,52.18a2.915,2.915,0,0,1,0-4.11h.01l9.01-9.01H138.91a2.9,2.9,0,0,1-2.9-2.9,2.9,2.9,0,0,1,2.894-2.9H166.55l-9.021-9.011a2.906,2.906,0,0,1,0-4.109,2.907,2.907,0,0,1,4.11,0L175.62-393a1.825,1.825,0,0,1,.19.21c.031.04.05.07.08.111l.09.12a.843.843,0,0,1,.08.13c.02.04.05.08.07.121s.04.09.06.13l.059.12c.021.04.031.09.05.13a.782.782,0,0,1,.049.14c.011.04.021.09.031.13a.331.331,0,0,1,.04.139.709.709,0,0,1,.02.15.58.58,0,0,1,.021.13,2.64,2.64,0,0,1,.01.28c0,.09-.01.19-.01.28a.572.572,0,0,0-.021.13.782.782,0,0,1-.02.15c-.01.049-.03.11-.04.15a.734.734,0,0,1-.031.13c-.02.05-.03.09-.049.14s-.03.09-.05.13-.04.08-.059.13-.04.09-.06.131-.05.08-.07.12a.767.767,0,0,1-.07.121c-.03.04-.069.09-.1.13a.349.349,0,0,1-.069.1c-.06.07-.121.14-.191.21l-13.97,13.981a2.9,2.9,0,0,1-2.055.85A2.9,2.9,0,0,1,157.55-374.933Z" transform="translate(-136.005 442.01)" fill="#fff"/>
                                </svg>
                                        '.$agent_login['title'].'
                                    </a>';
                                }
                            echo '</div>';
                        }
                        if($brand_logo){
                            echo'<a href="'.home_url( '/' ).'" class="brand">
                                <img src="'.$brand_logo['url'].'" alt="'.get_bloginfo('name').'">
                            </a>';
                        }
                        echo'<div class="header-right d-flex align-items-center justify-content-end">';
                            if ( has_nav_menu( 'main-menu' ) ) {
                                echo'<div class="navigation">
                                    <nav>';
                                        wp_nav_menu(array('theme_location' => 'main-menu','container' => 'ul','walker' => new My_Custom_Nav_Walker));
                                    echo'</nav>
                                </div>';
                            }
                            if( $get_quote ){
                                echo'<div class="header-cta">';
                                    echo acf_link($get_quote, 'btn');
                                echo'<div>';
                            }
                        echo'</div>';
                        echo'<!-- hamburger -->
                        <a href="javascript:;" class="hamburger">
                            <span></span>
                        </a>
                    </div>
                </div>
            </header>';
