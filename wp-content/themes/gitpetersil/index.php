	<?php get_header(); ?>
	<section id="main-slider">
		<div class="main-slider-wrap">
	    <?php if ( have_posts() ) : query_posts( array ( 'orderby' => 'date ', 'order' => 'ASC',  'cat'=>'3') );
        while (have_posts()) : the_post(); ?>
        <div class="item">
            <div class="container">
                <div class="teacher-wrap">
                    <div class="photo-wrap">
                    <?php the_post_thumbnail(); ?>
                    <div class="descr">
                        <h3><?php the_title(); ?></h3>
                        <div class="post"><?php echo get_post_meta($post->ID, 'post', true) ?></div>
                        <?php the_content(); ?>
                    </div>
                </div>
                <p class="name"><?php the_title(); ?></p>
                <p class="post"><?php echo get_post_meta($post->ID, 'post', true) ?></p>
                </div> 
            </div>
        </div>                               

        <?php endwhile; endif; wp_reset_query(); ?>
	</div>
	</section>
	<section id="clients">
		<div class="container">
			<h3><?php echo get_cat_name(4); ?>:</h3>
			<div class="logos">
				<?php if ( have_posts() ) : query_posts( array ( 'orderby' => 'date ', 'order' => 'ASC',  'cat'=>'4') );
			        while (have_posts()) : the_post(); ?>
			                    <?php the_post_thumbnail(); ?>               
			        <?php endwhile; endif; wp_reset_query(); ?>
			</div>
		</div>
	</section>

	<section id="open-possibility">
		<div class="container">
			<h3><?php echo get_cat_name(5); ?>:</h3>
			<div class="descr"><?php echo category_description(5); ?></div>
			<?php if($imgcat1=get_field("imgcat1",get_category(5))){?>
			<img src="<?php echo $imgcat1;?>"/>
			<?php }?>

		</div>
		
	</section>
	

	<div class="hidden"></div>


	<?php get_footer(); ?>