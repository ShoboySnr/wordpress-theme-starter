<?php

$image_gallery_count = 1;

add_action( 'init', '_themename_acf_init_block_types' );

function _themename_acf_init_block_types(){
    register_block_type( get_template_directory() . '/blocks/button-group/block.json' );
    register_block_type( get_template_directory() . '/blocks/column/block.json' );
    register_block_type( get_template_directory() . '/blocks/columns/block.json' );
    register_block_type( get_template_directory() . '/blocks/divider/block.json' );
    register_block_type( get_template_directory() . '/blocks/image/block.json' );
    register_block_type( get_template_directory() . '/blocks/image-gallery/block.json' );
    register_block_type( get_template_directory() . '/blocks/section/block.json' );
    register_block_type( get_template_directory() . '/blocks/spacer/block.json' );
    register_block_type( get_template_directory() . '/blocks/video/block.json' );
    register_block_type( get_template_directory() . '/blocks/wrapper/block.json' );
    register_block_type( get_template_directory() . '/blocks/wysiwyg/block.json' );
}

//Remove most of core blocks and define allowed block types
add_filter( 'allowed_block_types', '_themename_allowed_block_types' );
 
function _themename_allowed_block_types( $allowed_blocks ) {
	return apply_filters( '_themename_allowed_block_types', [
        'acf/button-group',
        'acf/divider',
        'acf/column',
        'acf/columns',
        'acf/image',
        'acf/image-gallery',
        'acf/section',
        'acf/spacer',
        'acf/video',
        'acf/wrapper',
        'acf/wysiwyg',
        'core/list',
		'core/list-item',
        'core/heading',
        'core/paragraph',
        'gravityforms/form'
	]);
}

//Enqueue stylesheet for proper preview display of blocks in the editor
add_action( 'enqueue_block_editor_assets', function(){
    wp_enqueue_style('blocks-admin-style-min', get_template_directory_uri() . '/dist/css/blocks-admin.css', array(), filemtime( get_template_directory() . '/dist/css/blocks-admin.css'), false );
    wp_enqueue_script('blocks-admin-scripts-min', get_template_directory_uri() . '/dist/js/blocks-admin.js', array(), filemtime( get_template_directory() . '/dist/js/blocks-admin.js'), false );
    $translation_array = array( 'templateURL' => get_stylesheet_directory_uri() );
	wp_localize_script( 'blocks-admin-scripts-min', 'theme', $translation_array );
});

add_action( 'admin_head', function(){ ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;700&display=swap" rel="stylesheet">
<?php });

//Add wrappers around default blocks
function _themename_block_wrapper( $block_content, $block ) {

    if ( $block['blockName'] === 'core/list' ) {
        $content = '<div class="custom-content-row block-core-list">';
        $content .= $block_content;
        $content .= '</div>';
        return $content;

    } 
    
    elseif ( $block['blockName'] === 'core/paragraph' ) {
        $content = '<div class="custom-content-row block-core-paragraph">';
        $content .= $block_content;
        $content .= '</div>';
        return $content;
    }
    
    elseif ( $block['blockName'] === 'core/heading' ) {
        $content = '<div class="custom-content-row block-core-heading">';
        $content .= $block_content;
        $content .= '</div>';
        return $content;
    }

    elseif ( $block['blockName'] === 'gravityforms/form' ) {
        $content = '<div class="custom-content-row theme-form-wrap">';
        $content .= $block_content;
        $content .= '</div>';
        return $content;
    } 

    return $block_content;
}
add_filter( 'render_block', '_themename_block_wrapper', 10, 2 );

//Load default values so blocks don't appear empty
add_filter('acf/load_value/key=field_62d600ad7bc9a',  '_themename_load_default_video', 10, 3);
function _themename_load_default_video($value, $post_id, $field) {
    if( !isset( $value ) ) $value = 'https://www.youtube.com/watch?v=xcJtL7QggTI';
    return $value;
}

add_filter('acf/load_value/key=field_6295d52957886',  '_themename_load_default_button', 10, 3);
function _themename_load_default_button($value, $post_id, $field) {
    if( !isset( $value[0]['field_6295d53557887'] ) ){
        $link = [
            'url' => '#',
            'title' => 'Button',
            'target' => ''
        ];
        $value[0]['field_6295d53557887'] = $link;
    }
    return $value;
}

//Disable acf-innerblocks-container on front-end to reduce extraneous html
add_filter( 'acf/blocks/wrap_frontend_innerblocks', '_themename_remove_innerblocks_wrapper', 10, 2 );
function _themename_remove_innerblocks_wrapper( $wrap, $name ){
    $enabled_blocks = [];
    if( in_array( $name, $enabled_blocks ) ) return $wrap;
    return false;
}

function is_user_currently_in_block_editor(){

    if( !is_admin() ) return false;

    $screen = get_current_screen();

    if( empty( $screen && wp_doing_ajax() ) ){
        return true;
    }

    if( method_exists( $screen, 'is_block_editor' ) && $screen->is_block_editor() ){
        return true;
    }

    return false;
}