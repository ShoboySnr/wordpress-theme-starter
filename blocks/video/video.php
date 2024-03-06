<?php

$classes = isset( $block['className'] ) ? ' ' . $block['className'] : ''; 
$classes .= get_field( 'spacing_size' ) ? ' mt-' . get_field( 'spacing_size' ) : ' mt-md'; 

$id = isset( $block['anchor'] ) ? $block['anchor'] : '';

$type = get_field( 'video_type' );

$video = get_field( 'video' );

preg_match('/src="(.+?)"/', $video , $matches);

$src = $matches[1];

echo '<div ' . ( !empty( $id ) ? 'id="' . $id . '" ' : '') . 'class="block-video' . $classes . '">';

    if( $type == 'lightbox' ){
        $poster = get_field( 'poster_image' );
        echo '<a href="#" class="custom-modal-trigger lightbox-poster" data-modal="' . $src . '">';
            echo '<div class="overlay"></div>';
            echo wp_get_attachment_image( $poster, 'large', 'null', ['class' => 'poster-img'] );
            echo '<img src="' . get_stylesheet_directory_uri() . '/dist/images/play-white.svg" alt="play-button" class="play-button">';
        echo '</a>';
        include( locate_template( 'template-parts/components/lightbox-modal.php' ) );
    }

    else{
        echo '<div class="block-video-embed">';
            echo get_field( 'video' );
        echo '</div>';
    }

echo '</div>';