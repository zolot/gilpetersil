<?php get_header(); ?>

<section id="blog-all">
    <div class="container">
        <div class="wrapper">
            <?php if ( have_posts() ) : 
                if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }

                query_posts( array ('orderby' => 'date ', 'order' => 'ASC', 'cat'=>'29', 'paged' => $paged) );

                while (have_posts()) : the_post(); ?> 
                <a href='<?php the_permalink(); ?>' class="wrap">
                    <div class="data"><span><?php the_time('j.m.Y' );?></span></div>
                    <div class="thumb-wrap"><?php the_post_thumbnail(); ?></div>
                    <div class="descr">
                        <h4><?php the_title(); ?></h4>
                        <div class="btn-wrap">
                            <span class="show">Читать</span>
                                <?php 
                                $categories = get_the_category();
                                if($categories){
                                    foreach($categories as $category) {
                                        if ($category->parent != 0 && $category -> parent == 22) {
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
            

            
        </div>
        <div class="all-btn-wrap">
            <a href="#" id="next" data-max="<?php echo $wp_query->max_num_pages; ?>">Загрузить Еще</a>
        </div>
        
    </div>
    
    <script>
        $(function() {
            var next_page = 2;
            var $obj = $("#next");
            var max_pages_cout = $obj.attr("data-max");
            $obj.on("click", function(e) {
                e.preventDefault();
                var url = window.location.href + "/page/" + next_page;
                if (max_pages_cout >= next_page) {
                    $.get(url, function(data) {
                        $(".wrapper").append($(data).find(".wrap"));
                    });
                    if (max_pages_cout == next_page) {
                         $obj.hide();
                    }
                    next_page ++;
                }
            });
        });
    </script>
                
</section>

<?php get_footer(); ?>