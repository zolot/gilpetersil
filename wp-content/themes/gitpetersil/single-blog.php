<?php get_header(); ?>


   <h1><?php the_title(); ?></h1>
   <div class="post">
       <?php the_post_thumbnail('full','class=imgstyle'); ?>
       <?php the_content();?>
   </div>


<?php get_footer(); ?>