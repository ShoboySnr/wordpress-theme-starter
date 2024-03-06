<?php

$classes = isset( $block['className'] ) ? ' ' . $block['className'] : ''; 
$classes .= get_field( 'spacing_size' ) ? ' mt-' . get_field( 'spacing_size' ) : ' mt-md'; 

global $image_gallery_count;

$id = isset( $block['anchor'] ) ? $block['anchor'] : '';

$classes .= !empty( get_field( 'number_of_columns' ) ) ? ' cols-' . get_field( 'number_of_columns' ) : ' cols-3';

echo '<div ' . ( !empty( $id ) ? 'id="' . $id . '" ' : '') . 'class="block-image-gallery custom-content-row d-grid' . $classes . '">';

    $gallery = get_field( 'image_gallery' );

    $index = 0;

    foreach( $gallery as $img ){

        $src = wp_get_attachment_image_src( $img, 'full' );
        $caption = !empty( wp_get_attachment_caption( $img ) ) ? ' data-caption="' . wp_get_attachment_caption( $img ) . '"' : '';
        

        echo "<a data-fslightbox='gallery-$image_gallery_count' href='{$src[0]}'$caption>";
            $img_class = $index == 0 ? array( 'class' => 'featured-image gallery-image' ) : array( 'class' => 'gallery-image' );
            echo wp_get_attachment_image( $img, 'large', false, $img_class );
            echo '<div class="overlay"></div>';
        echo '</a>';

        $index++;

    }

echo '</div>';

$image_gallery_count++;