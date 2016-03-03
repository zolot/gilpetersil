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
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/fonts.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/media.css" />

    <?php wp_head(); ?>

</head>
<body>
    <header>
        <div class="top-line">
            
        </div>
        <div class="info-line">
            <div class="container">
                <?php dynamic_sidebar('logo'); ?>
                <div class="descr-wrap">
                    <p>Топ 10 секретов развития деловых связей для гарантированного роста бизнеса</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/arrov.png" alt="" class="arrov">
                    <a href="#" class="get">Получить</a>
                </div>
            </div>            
        </div>

        <?php wp_nav_menu(array('menu_class' => 'menu', 
                        'menu_id' => 'menu',
                        'container' => '')) ; ?>
    </header>