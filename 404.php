<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package trinity
 */

get_header();
?>

<section id="page-not-found" class="container-x-pad container-y-pad">

	<div class="content-container">

		<h1>404 Error</h1>

		<p>Sorry, the page you are looking for could not be found. Try a search below to find what you were looking for.</p>

		<?php echo get_search_form(); ?>

	</div>

</section>

<?php
get_footer();
