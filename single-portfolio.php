<?php get_header() ; ?>

<div class="row" >
    
    <div class="col-xs-12 col-sm-8" >
        
        <?php
            
            if( have_posts()) :
                while ( have_posts()) : the_post(); 
        ?>
                    <article id="<?php the_ID(); ?>" <?php post_class();?>>
                        <?php the_title('<h1 class="entry-title">','</h1>');?>
                        <?php if( has_post_thumbnail()): ?>
                            <div class="pull-right"><?php the_post_thumbnail('thumbnail');?> </div>
                        <?php endif; ?>
                        <small><?php 
                        echo brocool_get_terme ($post->ID, 'field') ; ?> || <?php
                        echo brocool_get_terme ($post->ID, 'software') ;
                         
                        /*
                        $i =0 ;
                        $terms_list = wp_get_post_terms( $post->ID, 'field');
                        foreach ($terms_list as $term ) { $i++;
                            if ($i >1) {
                                echo ', ';
                            }
                           echo $term->name.' ';
                        }
                        $i =0 ;
                        $terms_list = wp_get_post_terms( $post->ID, 'field');
                        foreach ($terms_list as $term ) { $i++;
                            if ($i >1) {
                                echo ', ';
                            }
                           echo $term->name.' ';
                        }
                        */
                       if( current_user_can( 'manage_options' )) :
                       echo ' || '; edit_post_link() ;
                       endif;
                       ?> </small>
                        <?php the_content(); ?>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6 text-left"> <?php previous_post_link() ;?> </div>
                            <div class="col-xs-6 text-right"> <?php next_post_link() ;?> </div>
                        </div>

                       
                    </article>
                <?php
                endwhile;
            endif;        
                ?>

    </div>
</div>

<?php get_footer(); ?>