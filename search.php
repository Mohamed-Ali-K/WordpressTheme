<?php get_header(); ?>
<div class="row" >

    <div class="col-xs-12 col-sm-8" >
        <div class="row text-center no-margin" >
        
        
            <?php 
                    while (have_posts()): the_post();?>
   
                        <?php get_template_part('content', 'search'); ?>
                
            
                    <?php endwhile;
            ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4" >
         <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>