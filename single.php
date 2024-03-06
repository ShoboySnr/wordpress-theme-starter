<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package _themename
 */

get_header();
?>

<div id="primary" class="container-x-pad container-y-pad">

	<div class="content-container">

	<?php if( have_posts() ){
		
		while( have_posts() ){

			the_post();

			the_content();

		}
	} ?>
		
	</div>

</div>

<?php

get_footer();