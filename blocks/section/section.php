<?php

$id = isset( $block['anchor'] ) ? ' ' . $block['anchor'] : '';

$classes = isset( $block['className'] ) ? ' ' . $block['className'] : ''; 
$classes .= get_field( 'white_text' ) ? ' white-text-wrapper' : '';
$classes .= get_field( 'remove_side_padding' ) ? ' no-x-pad' : ' container-x-pad';
$classes .= get_field( 'remove_vertical_padding' ) ? ' no-y-pad' : ' container-y-pad';
$classes .= !empty( get_field( 'section_size' ) ) && get_field( 'section_size' ) != 'default' ? ' ' . get_field( 'section_size' ) : '';
$classes .= ' ai-' . get_field( 'content_vertical_alignment' );

$type = get_field( 'background_type' );
switch( get_field( 'background_type' ) ){

    case 'color':
        $color = ' background-color:' . get_field( 'background_color' ) . ';';
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
            $media = '<video playsinline autoplay muted loop poster="' . $poster . '" style="' . $style . '">';
            $media .= '<source src="' . $video . '" type="video/' . $meta['fileformat'] . '">';
            $media .= '</video>';
        }
        break;

    default:
        break;

}

echo '<section ' . ( isset( $id ) ? 'id="' . $id . '" ' : '') . 'style="position: relative;' . ( isset( $color ) ? $color : '' ) . '" class="block-section d-grid' . $classes . '">';
    echo is_user_currently_in_block_editor() ? '<div class="admin-block-label">Section</div>' : '';    
    //$allowed_blocks = _themename_get_allowed_section_blocktypes();
    echo isset( $media ) ? $media : '';
    echo get_field( 'background_overlay' ) ? '<div class="block-section-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: ' . get_field( 'background_overlay' ) . '"></div>' : '';
    echo '<div class="block-section-content" style="position: relative; z-index: 3;">';
        $template = [
            array( 'core/paragraph', array(
                'content' => ''
            ))
        ];
        echo '<InnerBlocks template="' . esc_attr( wp_json_encode( $template ) ) . '" templateLock="false" />';
    echo '</div>';
echo '</section>';

