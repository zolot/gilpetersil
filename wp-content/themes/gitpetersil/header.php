<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8" />

    <title>GitPetersil</title>
    <meta content="" name="description" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/libs/owl/owl.carousel.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/libs/magnific/magnific-popup.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/libs/mCustomScrollbar/jquery.mCustomScrollbar.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/libs/font-awesome-4.2.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/fonts.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/media.css" />
    <script src="<?php echo get_template_directory_uri(); ?>/libs/jquery/jquery-1.11.2.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/libs/modernizr/modernizr.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/libs/magnific/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/libs/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/libs/owl/owl.carousel.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/libs/bxslider/jquery.bxslider.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/common.js"></script>
    <script src="http://localhost/GilPetersil/wp-content/plugins/revslider/public/assets/js/extensions/revolution.extension.navigation.min.js"></script>


</head>
<body>
    <header>
        <div class="top-line">
            <div class="container">
                <div class="contacts">
                    <ul>
                        <?php if ( have_posts() ) : query_posts( array ('orderby' => 'date ', 'order' => 'ASC', 'cat'=>'11') );
                        while (have_posts()) : the_post(); ?>                                    
                        <li>       
                            <?php the_content(); ?>                          
                        </li>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </ul>
                </div>
            </div>
            
        </div>
        <div class="info-line">
            <div class="container">
                <a href="#" class="logo">
                    <?php if($imgcat1=get_field("imgcat1",get_category(14))){?>
                    <img src="<?php echo $imgcat1;?>"/>
                    <?php }?>
                </a>
                
                <div class="descr-wrap">
                    <p>Топ 10 секретов развития деловых связей для гарантированного роста бизнеса</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/arrov.png" alt="" class="arrov">
                    <a href="#" class="get">Получить</a>
                </div>
            </div>            
        </div>

        <nav id="main-menu">
            <div class="btn-wrap">
                <button id="menu-button"><i class="fa fa-bars"></i></button>
            </div>
            <?php wp_nav_menu(array('menu_class' => 'menu', 
                        'menu_id' => 'menu',
                        'container' => '')) ; ?>
        </nav>

        
    </header>