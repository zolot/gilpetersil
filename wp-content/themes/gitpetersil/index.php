	<?php get_header(); ?>
	<div id="main-page">

		<section id="main-slider">
			<?php if ( have_posts() ) : query_posts( array ( 'orderby' => 'date ', 'order' => 'ASC',  'cat'=>'3') );
				        while (have_posts()) : the_post(); ?>
				        <?php the_content(); ?>
			 <?php endwhile; endif; wp_reset_query(); ?>
			
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

		<section id="programs">
			<div class="container">
				<h3><?php echo get_cat_name(6); ?></h3>
				<ul class="programs-wrap">
				    <?php if ( have_posts() ) : query_posts( array ('orderby' => 'date ', 'order' => 'ASC', 'cat'=>'6',) );
				    while (have_posts()) : the_post(); ?>                                    
				    <li> 
				    	<?php the_post_thumbnail(); ?>  				    	 
				    	<a href="<?php echo get_post_meta( $post->ID, 'program_url', true ); ?>" target="_blank" title="<?php the_title(); ?>">				    	
				    		<div class="descr">
					    		<h4><?php the_title(); ?></h4> 
					    		<?php the_content(); ?> 
				    		</div>				    		 
				    		<div class="more"><span>Подробнее</span></div>
				    	</a>  
				        			        
				    </li>
				    <?php endwhile; endif; wp_reset_query(); ?>
				</ul>
			</div>
		</section>

		<section id="video-previev">
			<div class="container">
				<h3><?php echo get_cat_name(7); ?></h3>
				<div class="wrapper">
					<?php if ( have_posts() ) : query_posts( array ('orderby' => 'date ', 'order' => 'ASC', 'cat'=>'7', 'posts_per_page'      => 3) );
					    while (have_posts()) : the_post(); ?> 
						<a href='<?php the_permalink(); ?>' class="wrap">
							<div class="thumb-wrap"><?php the_post_thumbnail(); ?></div>
							<div class="descr">
								<h4><?php the_title(); ?></h4>
								<div class="btn-wrap">
									<span class="show">Смотреть</span>
								</div>
							</div>
							
						</a>
					<?php endwhile; endif; wp_reset_query(); ?>
				</div>
				<div class="all-btn-wrap">
					<a href="<?php echo get_permalink(25); ?>">Все видео</a>
				</div>
			</div>
		</section>

		<section id="about-gil">
			<div class="container">
				<h3><?php echo get_cat_name(8); ?></h3>

					 <div id="bx-pager-scheme">
				    <?php if ( have_posts() ) : query_posts( array ( 'orderby' => 'date ', 'order' => 'ASC',  'cat'=>'8') );
        		    	$c=0; 
				      	while (have_posts()) : the_post();  $c++;?>
				      	  <a data-slide-index="<?php echo $c-1;?>" href="#"><h4><?php the_title(); ?></h4> </a>
				      	<?php endwhile; endif; wp_reset_query(); ?>
			      	</div> 

			        <ul class="gil-bxslider">	
	        		    <?php if ( have_posts() ) : query_posts( array ( 'orderby' => 'date ', 'order' => 'ASC',  'cat'=>'8') );
		        	        while (have_posts()) : the_post(); ?>
					      		<li><?php the_post_thumbnail(); ?> <div class="descr"><?php the_content(); ?> </div>	</li>
					      	<?php endwhile; 
					      	endif; 
				      	wp_reset_query(); ?>

				    </ul>

				
				                          
			</div>
		</section>
		

		<div class="hidden"></div>
		<?php
            /*global $wp_query;*/

            $big = 999999999; // need an unlikely integer

            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages,
                'prev_text' => '&laquo',
                'next_text' => '&raquo',
                    'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
            ) );
            ?>

            <div class="pagin">
                <?php if ($wp_query->max_num_pages > 1) : ?>
            <?php
             if(function_exists('genarate_ajax_pagination'))
             genarate_ajax_pagination('Посмотреть еще...', 'blue','content');
             ?>
            <?php endif; ?>

        </div>
    </div>
	</div>
	


	<?php get_footer(); ?>