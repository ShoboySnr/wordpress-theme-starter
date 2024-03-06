<?php

$classes = isset( $block['className'] ) ? ' ' . $block['className'] : ''; 
$classes .= get_field( 'spacing_size' ) ? ' mt-' . get_field( 'spacing_size' ) : ' mt-md'; 

$id = isset( $block['anchor'] ) ? $block['anchor'] : '';

$content = get_field( 'content' );

echo '<div ' . ( !empty( $id ) ? 'id="' . $id . '" ' : '') . 'class="block-wysiwyg custom-content-row' . $classes . '">';
    echo get_field( 'content' );
echo '</div>';