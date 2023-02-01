<?php

class My_Custom_Nav_Walker extends Walker_Nav_Menu {

    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {

		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

        $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts           = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target ) ? $item->target : '';
        if ( '_blank' === $item->target && empty( $item->xfn ) ) {
            $atts['rel'] = 'noopener noreferrer';
        } else {
            $atts['rel'] = $item->xfn;
        }
        $atts['href']         = ! empty( $item->url ) ? $item->url : '';
        $atts['aria-current'] = $item->current ? 'page' : '';
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
        $item_output  = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		/* custom settings */
		if( $depth == 0 ) {
            if ( strpos($class_names, 'megamenu') !== false ) {
                $output .= '<div class="mega-menu-wrapper">';
                // if( strip_tags($title) == 'About' ) {
                    $heading = get_field('heading','option');
                    $mobile_number = get_field('mobile_number','option');
                    $descriptions = get_field('descriptions','option');
                    $output .= '<div class="mega-menu-block">
                        <div class="quick-contact">';
                            if( $heading || $mobile_number || $descriptions ) {
                                $output .= '<div class="qc-item">';
                                    if ( $heading ) {
                                        $output .= '<h5>';
                                        $output .= $heading;
                                        $output .= '</h5>';
                                    }
                                    if($mobile_number){
                                        // $output .= '<h4>';
                                            if( $mobile_number ) { $output .= '<a href="'.$mobile_number['url'].'" class="phone">'; }
                                            $output .= $mobile_number['title'];
                                            if( $mobile_number ) { $output .= '</a>'; }
                                        // $output .= '</h4>';
                                    }
                                    if($descriptions){
                                        $output .= '<div class="qc-desc">';
                                            $output .= $descriptions;
                                        $output .= '</div>';
                                    }
                                $output .= '</div>';
                            }
                        $output .= '</div>
                    </div>';
            }
		}
  	}
	public function end_lvl( &$output, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent  = str_repeat( $t, $depth );
        $output .= "$indent</ul>{$n}";
		/* custom settings */
		if( $depth == 0 ) {
			$output .= '</div>';
		}
		/*  End wrapper */
    }
}
?>