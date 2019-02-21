<?php get_header(); ?>

<h1>Hello, world!</h1>

    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            the_title('<h4>', '</h4>');
        endwhile;

     else: ?>
    <p>Постов нет.</p>

     <?php endif; ?>

<?php get_footer(); ?>
