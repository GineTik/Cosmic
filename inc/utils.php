<?php

function display_menu($menu_name, $menu_class = '', $custom_title = null) {
    class Custom_Menu_Walker extends Walker_Nav_Menu {
        function start_el(&$output, $item, $depth=0, $args=array(), $current_object_id = 0) {
            $atts           = array();
            $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
            $atts['target'] = ! empty( $item->target ) ? $item->target : '';
            if ( '_blank' === $item->target && empty( $item->xfn ) ) {
                $atts['rel'] = 'noopener';
            } else {
                $atts['rel'] = $item->xfn;
            }
            $atts['href']         = ! empty( $item->url ) ? $item->url : '';
            $atts['aria-current'] = $item->current ? 'page' : '';

            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth);

            $attributes = '';
            foreach ($atts as $attr => $value) {
                if (is_scalar( $value ) && '' !== $value && false !== $value) {
                    $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $title = empty($item->post_title) ? __('[title is empty]') : $item->post_title;
            $title = is_null($args->custom_title) ? $title : $args->custom_title;

            $item_output  = $args->before;
            $item_output .= '<a' . $attributes . ' class="' . implode(' ', $item->classes) . '">';
            $item_output .= $args->link_before . $title . $args->link_after;

            $output .= $item_output;
        }
    
        function end_el(&$output, $item, $depth=0, $args=array()) {
            $output .= '</a>';
            $output .= "\n";
            $output .= $args->after;
        }

        public function start_lvl( &$output, $depth = 0, $args = null ) {
            $output .= '';
        }

        public function end_lvl( &$output, $depth = 0, $args = null ) {
            $output .= '';
        }
    }

    if (has_nav_menu($menu_name) == false)
        throw new InvalidArgumentException('menu by this location is not found');

    wp_nav_menu(array(
        'theme_location' => $menu_name,
        'walker' => new Custom_Menu_Walker(),
        'container' => '',
        'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>',
        'custom_title' => $custom_title,
        'menu_class' => $menu_class . ' menu',
    ));
}