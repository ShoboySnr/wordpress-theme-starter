<?php

$classes = isset( $block['className'] ) ? ' ' . $block['className'] : ''; 
$classes .= get_field( 'white_text' ) ? ' white-text-wrapper' : '';
$classes .= get_field( 'padding' ) ? ' pad-' . get_field( 'padding' ) : '';
$classes .= isset( $media ) ? ' has-media-bg' : '';

if( get_field( 'position_sticky' ) && !is_user_currently_in_block_editor() ){
    $classes .= ' sticky-column';
}

$type = get_field( 'column_background_type' );

switch( $type ){

    case 'color':
        $color = 'background-color:' . get_field( 'background_color' ) . ';';
        break;

    case 'image':
        while( have_rows( 'background_media' ) ){
            the_row();
            $x = get_sub_field( 'x_position' );
            $y = get_sub_field( 'y_position' );
            $style = 'object-position:' . $x . '% ' . $y . '%; object-fit: cover; position: absolute; top: 0; left: 0; width: 100%; height: 100%;';
            $media = wp_get_attachment_image( get_sub_field( 'image' ), 'full', '', array( 'style' => $style ) ); 
        }
        break;
    
    case 'video':
        while( have_rows( 'background_media' ) ){
            the_row();
            $video = wp_get_attachment_url( get_sub_field( 'video' ) );
            $meta = wp_get_attachment_metadata( get_sub_field( 'video' ) );
            $poster = wp_get_attachment_image_url( get_sub_field( 'poster_image' ), 'medium' );
            $x = get_sub_field( 'x_position' );
            $y = get_sub_field( 'y_position' );
            $style = 'object-position:' . $x . '% ' . $y . '%; object-fit: cover; position: absolute; top: 0; left: 0; width: 100%; height: 100%;';
            $media = '<video playsinline="true" autoplay="true" muted="true" loop="true" poster="' . $poster . '" style="' . $style . '">';
            $media .= '<source src="' . $video . '" type="video/' . $meta['fileformat'] . '">';
            $media .= '</video>';
        }
        break;

    default:
        break;

}

$style = ' style="position: relative;' . ( !empty( $color ) ? $color : '' ) . '"';

echo is_user_currently_in_block_editor() ? '<div class="admin-block-label">Column</div>' : '';

echo '<div class="block-column' . $classes . '"' . $style . '>';

    $link = get_field( 'column_link' );
    echo !empty( $link ) ? '<a href="' . esc_url( $link ) . '" class="full-link"></a>' : '';

    echo isset( $media ) ? $media : '';
    echo get_field( 'background_overlay' ) ? '<div class="block-section-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: ' . get_field( 'background_overlay' ) . '"></div>' : '';
    $template = [
        array( 'core/paragraph', array(
            'content' => ''
        ))
    ];

    echo '<div class="block-column-content" style="position: relative; z-index: 3;">';
        echo '<InnerBlocks template="' . esc_attr( wp_json_encode( $template ) ) . '" templateLock="false" />';
    echo '</div>';
    
echo '</div>';