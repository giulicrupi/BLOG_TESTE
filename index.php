<?php //error_reporting(E_WARNING); ?>
<?php get_header(); ?>

<?php 
                if( have_posts() ):
                  while( have_posts() ): the_post();
                  
                   ?>

                    <article <?php post_class(); ?>>
                      <h2>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </h2>
                
                      
                      <div><?php the_excerpt(); ?></div>
                    </article>


                    <?php

                  

                  endwhile;
                endif;
                  ?>



<?php get_footer(); ?>
