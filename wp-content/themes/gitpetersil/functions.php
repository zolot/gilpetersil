<?php

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');

show_admin_bar(false);

function logo_widget_init() {
    register_sidebar( array(
        'name'          => 'Логотип в шапке',
        'id'            => 'logo',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}
add_action( 'widgets_init', 'logo_widget_init' );

function logo_widget_init2() {
    register_sidebar( array(
        'name'          => 'Логотип в подвале',
        'id'            => 'logo-footer',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}
add_action( 'widgets_init', 'logo_widget_init2' );

add_theme_support('post-thumbnails' );

register_nav_menus( array( 
        'primary' => __( 'Main Menu', 'gitpetersil' ), 
        'footer_menu' => 'Меню в футере', 
        'programs_menu' => 'Список программ в футере', 
    ));

