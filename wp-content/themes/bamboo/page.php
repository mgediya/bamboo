<?php
/**
 * Default page tmeplate.
 */
if (!defined('ABSPATH') || !function_exists('add_filter')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit;
}
get_header();
$hero_title = get_field('hero_title');
$hero_sub_heading = get_field('hero_sub_heading');
$banner_image = get_field('banner_image');

if ($banner_image ) $img_overlay = ' img_overlay';
else $img_overlay = ' bg-shape';
		echo '<div class="main-content">
			<section class="inner-hero'.$img_overlay.'">
				<div class="inner-hero-bg">';
					if ( $banner_image ) acf_img( $banner_image, 'banner-image' );
				echo '</div>
				<div class="container">
					<div class="inner-hero-content text-center text-white">';
						if ( $hero_sub_heading ) echo '<div class="small">'. $hero_sub_heading .'</div>';
						if ( $hero_title ) echo '<h1>'.$hero_title.'</h1>';
						else echo '<h1>'.get_the_title().'</h1>';
					echo '</div>
				</div>
			</section>';
			include(locate_template('template-part/components.php'));
		echo '</div>';
	echo '</div>';
echo '</div>';
get_footer();
