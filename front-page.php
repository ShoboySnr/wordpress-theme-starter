<?php get_header(); ?>

<section class="container-x-pad">

    <div class="content-container container-y-pad">

        <h1>Heading 1</h1>
        <h2>Heading 2</h2>
        <h3>Heading 3</h3>
        <h4>Heading 4</h4>
        <h5>Heading 5</h5>
        <h6>Heading 6</h6>

        <ul>
            <li>List Item 1</li>
            <li>List Item 2</li>
            <li>List Item 3</li>
            <li>List Item 4</li>
        </ul>

        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam tempore ab incidunt eaque qui minus ad sed molestiae repellendus facilis! Assumenda, doloribus ratione? Maiores dignissimos facere tempore quo nihil eveniet.</p>

        <div class="block-button-group mt-md">
            <a href="#" class="theme-button">Primary Btn</a>
            <a href="#" class="theme-button secondary">Secondary Btn</a>
            <?php include( locate_template( 'template-parts/components/modal-template.php' ) ); ?>
        </div>

    </div>

</section>

<?php

while( have_posts() ):

    the_post();

    the_content();

endwhile; ?>

<?php get_footer(); ?>