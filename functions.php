<?php

/*
 * Подключаем стили и скрипты
 */

function byt_scripts(){
	// Подключаем стили
	wp_enqueue_style('byt_bootstrap', get_template_directory_uri(). '/assets/bootstrap/css/bootstrap.min.css', '', null);
	wp_enqueue_style('byt_style', get_template_directory_uri(). '/style.css', '', '1.0.1'); // or we can use get_stylesheet_uri();

	// Подключаем скрипты, удаляем авто-загрузку старого jquery и загружаем свой
	//wp_deregister_script('jquery');
	//wp_register_script('jquery','https://code.jquery.com/jquery-3.3.1.slim.min.js', false, false, true);
	wp_enqueue_script('jquery');
	wp_enqueue_script('byt_poper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', false, false, true);
	wp_enqueue_script('byt_bootstrapjs', get_template_directory_uri(). '/assets/bootstrap/js/bootstrap.min.js', false, false, true);

}

add_action('wp_enqueue_scripts', 'byt_scripts');


/*
 * Отключаем создание миниатюр файлов для media_large 768*x
 * */

add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );
function delete_intermediate_image_sizes( $sizes ){
	// размеры которые нужно удалить = оставляем только 2 изображения 150*150 и оригинал
	return array_diff( $sizes, array(
		'medium_large',
		//'large',
	) );
}


/*
 * Регистрируем поддержку новых возможностей темы в WP(поддержка миниатюр, форматов записей...)
 *  */

function byt_setup(){
	// поддержка картинки
	add_theme_support('post-thumbnails' );
	// регистрируем свою миниатюру с собственными размерами
	// add_image_size('category-thumb', 200, 150, true);


	// Видео в заголовке (шапке WordPress)
	add_theme_support( 'custom-header', array(
		'video' => true,
	) );
}

add_action( 'after_setup_theme', 'byt_setup' );






















