<?php

$classes = isset( $block['className'] ) ? ' ' . $block['className'] : ''; 
$classes .= get_field( 'spacing_size' ) ? ' mt-' . get_field( 'spacing_size' ) : ' mt-md';

$id = isset( $block['anchor'] ) ? $block['anchor'] : '';

echo '<div ' . ( !empty( $id ) ? 'id="' . $id . '" ' : '') . 'class="block-button-group align-' . get_field( 'button_alignment' ) . $classes . '">';

    while( have_rows( 'buttons' ) ): the_row();

        $button_classes = array( 'theme-button' );

        $button_classes[] = get_sub_field( 'button_style' );

        $btn = get_sub_field( 'button' );

        echo _themename_acf_button( $btn, $button_classes );

    endwhile;

echo '</div>';