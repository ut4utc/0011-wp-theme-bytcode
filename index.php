<?php get_header(); ?>

<div class="container">
    <div class="row">
    <?php if ( have_posts() ) : while ( have_posts() ) :  the_post(); ?>
        <!-- post -->
        <div class="col-md-12">
            <div class="card">
                <?php

                // Проверяем прикреплена ли миниатюра к записи
                if ( has_post_thumbnail() ) {
                    // size можем указать с function с собственного размера или thumbnail, large ...
                    the_post_thumbnail('category-thumb', array(
                        'class' => "card-img-top",
                        'alt'   => trim(strip_tags( esc_html( get_the_title() ) ))));
                }
                ?>
                <div class="card-body">
                   <?php
                        echo get_the_author_meta('email') . '<br />';
                        the_title('<h5 class="card-title">','</h5>', true); ?>
                    <p class="card-text"><?php
                         // the_content( "читать полностью:  " . the_title('', '', false) );
                        the_excerpt();

                        ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php the_permalink(); ?></a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
        <!-- post navigation -->
        <?php
	    // удаляет H2 из шаблона пагинации
	    add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
	    function my_navigation_template( $template, $class ){
		    /*
			Вид базового шаблона:
			<nav class="navigation %1$s" role="navigation">
				<h2 class="screen-reader-text">%2$s</h2>
				<div class="nav-links">%3$s</div>
			</nav>
			*/

		    return '
            <nav class="navigation %1$s" role="navigation">
                <div class="nav-links">%3$s</div>
            </nav>    
            ';
	    }

        the_post_navigation(array(
			   // 'prev_text'    => __('«'),
			   // 'next_text'    => __('»'),
			   // 'screen_reader_text' => __( '' ),
                  'end_size' => 3,
                'mid_size' => 3,
		    )
	    );
        ?>
    <?php else: ?>
        <!-- no post found -->
	    <?php endif; ?>
    </div>
</div>


<?php get_footer(); ?>
