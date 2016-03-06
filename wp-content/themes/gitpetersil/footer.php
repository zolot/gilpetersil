    <footer>
        <div class="container">
            <div class="col">
                <a href="#" class="logo-footer">
                    <?php if($imgcat1=get_field("imgcat1",get_category(15))){?>
                    <img src="<?php echo $imgcat1;?>"/>
                    <?php }?>
                </a>
                
                <div class="social">
                    <ul>
                        <?php if (have_posts() ) : query_posts(array ('orderby' => 'date ', 'order' => 'ASC', 'cat'=>'10'));
                        while (have_posts()) : the_post(); ?>
                        <li><a href="<?php echo get_post_meta( $post->ID, 'soc_url', true ); ?>" target="_blank" title="<?php the_title(); ?>"><i class="fa <?php echo get_post_meta( $post->ID, 'fonts_awesome', true ); ?>"></i></a></li>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </ul>
                </div>
                <div class="contacts">
                    <ul>
                        <?php if ( have_posts() ) : query_posts( array ('orderby' => 'date ', 'order' => 'ASC', 'cat'=>'11') );
                        while (have_posts()) : the_post(); ?>                                    
                        <li>    
                            <?php the_post_thumbnail(); ?>    
                            <?php the_content(); ?>          
                            
                        </li>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="menu-wrap">
                    <h5>Программы:</h5>
                    <?php wp_nav_menu( array( 'theme_location' => 'programs_menu', 'menu_class' => 'programs-menu', 'orderby' => 'date ', 'order' => 'ASC', ) ); ?>
                </div>
            </div>
            <div class="col">
                <div class="menu-wrap">
                    <h5>Меню:</h5>
                    <?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'menu_class' => 'footer-menu', 'orderby' => 'date ', 'order' => 'ASC', ) ); ?>
                </div>
            </div>
            <div class="clear"></div>
            <div class="site-info">
                <p class="copyright">Гил Питерсил © 2016 — ООО «МИТПАРТНЕРС» </p>

                <?php if (have_posts() ) : query_posts(array ('orderby' => 'date ', 'order' => 'ASC', 'cat'=>'19'));
                    while (have_posts()) : the_post(); ?>

                    <a href="#myModal-<?php echo $post->ID; ?>" class="popup"><?php the_title(); ?></a>
                    <div class="hidden">
                        <div class="info-wrap" id='myModal-<?php echo $post->ID; ?>'>
                            <h4><?php the_title(); ?></h4>
                            <div class="info mCustomScrollbar" data-mcs-theme="dark">
                                <?php the_content(); ?>                                 
                            </div>
                        </div>
                    </div>

                <?php endwhile; endif; wp_reset_query(); ?>                
                
                <div class="other-info">
                    <p>ООО «МИТПАРТНЕРС» (ОБЩЕСТВО С ОГРАНИЧЕННОЙ ОТВЕТСТВЕННОСТЬЮ «МИТПАРТНЕРС») </p>
                    <p>ЮРИДИЧЕСКИЙ АДРЕС: 115120, МОСКВА, УЛ. ПРЯМИКОВА, ДОМ 1, ОГРН 5147746450924, ИНН 7709969493 , КПП 770901001.</p>
                </div>
            </div>
        </div>
    </footer>

    <!--[if lt IE 9]>
    <script src="libs/html5shiv/es5-shim.min.js"></script>
    <script src="libs/html5shiv/html5shiv.min.js"></script>
    <script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
    <script src="libs/respond/respond.min.js"></script>
    <![endif]-->
    
    
    
    <?php wp_footer(); ?>
       
    <!-- Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
    <!-- Google Analytics counter --><!-- /Google Analytics counter -->
    
</body>
</html>