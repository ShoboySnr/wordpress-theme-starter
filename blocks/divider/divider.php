<?php

$classes = isset( $block['className'] ) ? ' ' . $block['className'] : ''; 

$height = get_field( 'height' ) ? 'height:' . get_field( 'height' ) . 'px;' : 'height: 2px;';

$units = get_field( 'max_width_units' );

switch( $units ){

    case '%':
        $max_width = ' max-width: ' . get_field( 'max_width_percent' ) . '%; width: 100%;';
        break;

    case 'px':
        $max_width = ' max-width: ' . get_field( 'max_width_px' ) . 'px; width: 100%;';
        break;

    default:
        $max_width = '';
        break;
}

$alignment = get_field( 'alignment' );

switch( $alignment ){

    case 'center':
        $margin = "margin-left: auto; margin-right: auto;";
        break;

    case 'right':
        $margin = "margin-left: auto; margin-right: 0;";
        break;

    default:
        $margin = 'margin-left: 0;';
        break;
}

$color = get_field( 'color' ) ? ' background-color: ' . get_field( 'color' ) . ';' : '';

$style = 'style="' . $height . $max_width . $color . $margin . '"';


if( get_field( 'space_around' ) ){

    echo '<hr class="block-divider' . $classes . '"' . $style . '/>';

} else {

    echo '<div class="block-divider custom-content-row' . $classes . '"' . $style . '></div>';
}

