<?php

$classes = isset( $block['className'] ) ? ' ' . $block['className'] : ''; 
$classes .= get_field( 'spacing_size' ) ? ' mt-' . get_field( 'spacing_size' ) : ' mt-md'; 
$classes .= get_field( 'white_text' ) ? ' white-text-wrapper' : '';
$classes .= get_field( 'padding' ) ? ' pad-' . get_field( 'padding' ) : '';

$id = isset( $block['anchor'] ) ? $block['anchor'] : '';

$blockID = $block['id'];

$type = get_field( 'background_type' );

$alignment = get_field( 'alignment' );

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

switch( $alignment ){
    case 'center':
        $margin = "margin-left: auto; margin-right: auto;";
        break;
    case 'right':
        $margin = "margin-left: auto; margin-right: 0;";
        break;
    default:
        $margin = '';
        break;
}

$units = get_field( 'max_width_units' );

switch( $units ){

    case '%':
        $max_width = !empty( get_field( 'max_width_percentage' ) ) ? ' max-width: ' . get_field( 'max_width_percentage' ) . '%; width: 100%;' : 'max-width: 100%; width: 100%;';
        break;

    case 'px':
        $max_width = ' max-width: ' . get_field( 'max_width_px' ) . 'px; width: 100%;';
        break;

    default:
        $max_width = '';
        break;
}

$style = ' style="position: relative;' . $margin . $max_width . ( !empty( $color ) ? $color : '' ) . '"';

echo '<div ' . ( isset( $id ) ? 'id="' . $id . '" ' : '') . 'class="block-wrapper custom-content-row' . $classes . '"' . $style . '>';
    echo is_user_currently_in_block_editor() ? '<div class="admin-block-label">Wrapper</div>' : '';
    echo isset( $media ) ? $media : '';
    echo get_field( 'background_overlay' ) ? '<div class="block-section-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: ' . get_field( 'background_overlay' ) . '"></div>' : '';
    echo '<div class="block-wrapper-content" style="position: relative; z-index: 3;">';
        //$allowed_blocks = _themename_get_allowed_section_blocktypes();
        echo '<InnerBlocks/>';
    echo '</div>';
echo '</div>';