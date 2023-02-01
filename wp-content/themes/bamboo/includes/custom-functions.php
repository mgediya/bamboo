<?php
/**
* Load the custom functions.
*/

if ( !defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}

/* ACF option */
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> __( 'Theme Options', 'ctwp' ),
		'menu_title'	=> __( 'Theme Options', 'ctwp' ),
		'menu_slug' 	=> 'theme-options',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> __( 'Theme Options', 'ctwp' ),
		'menu_title'	=> __( 'Theme Options', 'ctwp' ),
		'parent_slug'	=> 'theme-options',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> __( '404', 'ctwp' ),
		'menu_title'	=> __( '404', 'ctwp' ),
		'parent_slug'	=> 'theme-options',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> __( 'Megamenu Edits', 'ctwp' ),
		'menu_title'	=> __( 'Megamenu Edits', 'ctwp' ),
		'parent_slug'	=> 'theme-options',
	));
}

/* SVG icon function start */
function svg_icon( $wp_icon, $classes="", $width="", $height="" ){
	ob_start();
		$context = stream_context_create(
			array(
				"http" => array(
					"header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
				)
			)
		);
		$wp_iconSVG = file_get_contents( $wp_icon , false, $context);
		$dom = new DOMDocument();
		@$dom->loadHTML($wp_iconSVG);
		foreach($dom->getElementsByTagName('svg') as $element) {
			if( !empty( $classes ) ){
				$element->setAttribute('class', $classes );
			}
			if( !empty( $width ) ){
				$element->setAttribute('width', $width );
			}
			if( !empty( $height ) ){
				$element->setAttribute('height', $height );
			}
		}
		$dom->saveHTML();
		$wp_iconSVG = $dom->saveHTML();
		echo $wp_iconSVG;
	return ob_get_clean();
}
/* SVG icon function end */
/* <ACF Link> */
function acf_link ( $link, $link_class = '' ) {
	if( $link ):
		$link_url = $link['url'];
		$link_title = $link['title'];
		$link_target = $link['target'] ? $link['target'] : '_self';
		$link_class = $link_class ? $link_class : 'btn';

		echo '<a class="'.$link_class.'" href="'.esc_url( $link_url ).'" target="'.esc_attr( $link_target ).'">'.esc_html( $link_title ).'</a>';
	endif;
	// acf_link ($link);
}
/* </ACF Link> */

/* <ACF Image> */
function acf_img ( $img, $img_class = '' ) {
	if( $img ):
		$img_url = $img['url'];
		$img_alt = $img['alt'] ? $img['alt'] : '';
		$img_class = $img_class ? $img_class : '';

		echo '<img class="'.$img_class.'" src="'.esc_url( $img_url ).'" alt="'.esc_attr( $img['title'] ).'">';

	endif;
	// acf_img ($img);
}
/* </ACF Image> */

/* Youtube ID get */
function YouTube_ID($link){
	$arr = parse_url($link);
	if($arr['path'] === "/watch"){
		return str_replace('v=','', preg_replace('#^.*?/([^/]+)$#', '$1', $arr['query']));
	}else{
		return preg_replace('#^.*?/([^/]+)$#', '$1', $arr['path']);
	}
}
/* Vimeo ID get */
function Vimeo_ID($link){
	$varr = parse_url($link);
    return str_replace('video','', preg_replace('#^.*?/([^/]+)$#', '$1', $varr['path']));
}