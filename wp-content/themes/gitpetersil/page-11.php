<?php get_header(); ?>

<section id="blog-all">
    <div class="container">
        <div class="wrapper">
            <?php if ( have_posts() ) : query_posts( array ('orderby' => 'date ', 'order' => 'ASC', 'cat'=>'29') );
                while (have_posts()) : the_post(); ?> 
                <a href='<?php the_permalink(); ?>' class="wrap">
                    <div class="data"><span><?php the_time('j.m.Y' );?></span></div>
                    <div class="thumb-wrap"><?php the_post_thumbnail(); ?></div>
                    <div class="descr">
                        <h4><?php the_title(); ?></h4>
                        <div class="btn-wrap">
                            <span class="show">Читать</span>
                            
                            
                                    <?php 
                                    // $category = query(select * from category where parent != 0 and parent = 22 and id = 1)
                                    $categories = get_the_category();
                                    if($categories){
                                        foreach($categories as $category) {
                                            if ($category->parent != 0 && $category->parent == 22) {
                                                $out = '<object><a href="'.get_category_link($category->term_id ).'" class="tags">' . $category->name . '</a></object>';
                                                echo $out;
                                            }
                                        }
                                        
                                    };
                                    ?>      


                            
                            <div class="clear"></div>
                        </div>
                    </div>
                    
                </a>
            <?php endwhile; endif; ?>

            <div class="pagin">
            <?php echo $wp_query->max_num_pages ?>
                <?php if ($wp_query->max_num_pages > 1) : ?>
                <?php
                    if(function_exists('genarate_ajax_pagination'))
                        genarate_ajax_pagination('Посмотреть еще...', 'blue','content');
                ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    

            
</section>

<?php get_footer(); ?>