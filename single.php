<div class="container">
    <div class="row">
	    <?php while ( have_posts() ) :  the_post(); ?>
	        <!-- post -->
            <div class="col-md-12">
                <div class="card">
                    <?php
                        // Проверяем прикреплена ли миниатюра к записи
                        if ( has_post_thumbnail() ) {
                            $image_attr = array(
                                'class' => "card-img-top",
                                'alt'   => trim(strip_tags( esc_html( get_the_title() ) )),
                            );
                            the_post_thumbnail('', $image_attr);
                        }
                    ?>

                    <div class="card-body">
                       <?php
                            the_title('<h1 class="card-title">','</h1>', true);
                            echo 'Автор: ';
                            echo get_the_author_meta('email') . '<br />';
                            ?>

	                    <?php
	                        the_content(null, true );
                            //the_excerpt();

                            ?>
	                    Постоянная ссылка на статью: <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php the_permalink(); ?></a>
                    </div>
                </div>
            </div>
	    <?php endwhile; ?>
    </div>
</div>