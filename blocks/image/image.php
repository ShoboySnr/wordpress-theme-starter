<?php

$classes = !empty( $block['className'] ) ? ' ' . $block['className'] : ''; 
$classes .= get_field( 'spacing_size' ) ? ' mt-' . get_field( 'spacing_size' ) : ' mt-md'; 
$classes .= get_field( 'animation_type') ? ' ' . get_field( 'animation_type' ) : '';

$id = !empty( $block['anchor'] ) ? $block['anchor'] : '';

$style = '';

if( get_field( 'custom_max_width' ) ){

    $units = get_field( 'max_width_units' );

    switch( $units ):

        case 'px':
            $style .= 'max-width:' . get_field( 'max_width_px' ) . 'px; width: 100%;';
            break;
    
        case '%':
            $style .= 'max-width:' . get_field( 'max_width_percentage' ) . '%; width: 100%;';
            break;
    
    endswitch;

}

switch( get_field( 'image_alignment' ) ){

    case 'left':
        $style .= 'margin: 0 auto 0 0; ';
        break;

    case 'right':
        $style .= 'margin: 0 0 0 auto; ';
        break;

    default:
        $style .= 'margin: 0 auto; ';
        break;
    
}

$fixed_aspect_ratio = get_field( 'fixed_aspect_ratio' ) ? get_field( 'aspect_ratio' ) : null;

$image = get_field( 'image' );

$link = get_field( 'link' );

$mobile_image = get_field( 'mobile_image' );

echo '<div ' . ( !empty( $id ) ? 'id="' . $id . '" ' : '') . 'class="block-image' . $classes . '">';

    echo !empty( $fixed_aspect_ratio ) ? '<div class="force-aspect aspect-' . $fixed_aspect_ratio . '">' : '';

    echo '<picture>';

        if( !empty( $link ) ){
            $target = $link['target'] ? ' target="' . $link['target'] . '"' : '';
            echo '<a href="' . esc_url( $link['url'] ) . '" class="full-link"' . $target . '></a>';
        }

        echo get_field( 'mobile_image' ) ? '<source media="(max-width: 767px)" srcset="' . get_field( 'mobile_image' ) . '">' : '';

        echo wp_get_attachment_image( $image, 'full', '', array('style' => $style ) );

    echo '</picture>';

    echo !empty( $fixed_aspect_ratio ) ? '</div>' : '';

echo '</div>';