<?php

/*
 * Подключаем стили и скрипты
 */

function byt_scripts(){
	// Подключаем стили
	wp_enqueue_style('byt_bootstrap', get_template_directory_uri(). '/assets/bootstrap/css/bootstrap.min.css', '', null);
	wp_enqueue_style('byt_style', get_template_directory_uri(). '/style.css', '', '1.0.1'); // or we can use get_stylesheet_uri();

	// Подключаем скрипты
	wp_deregister_script('jquery');
	wp_register_script('jquery','https://code.jquery.com/jquery-3.3.1.slim.min.js', false, false, true);
	wp_enqueue_script('jquery');
	wp_enqueue_script('byt_poper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', false, false, true);
	wp_enqueue_script('byt_bootstrapjs', get_template_directory_uri(). '/assets/bootstrap/js/bootstrap.min.js', false, false, true);

}

add_action('wp_enqueue_scripts', 'byt_scripts');