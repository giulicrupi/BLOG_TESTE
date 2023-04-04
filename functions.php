<?php 


function Blog_TESTE_scripts(){


	// Arquivo css gerado pelo Sass
	wp_enqueue_style('style-sass', get_template_directory_uri() . '/sass/style.css', array(), filemtime(get_template_directory() . '/sass/style.css'), false);

 	//Bootstrap CSS
	wp_enqueue_style( 'google-fonts', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' );
	
	//Slick.css Biblioteca externa para o carrossel de imagens
	wp_enqueue_style( 'slick-css','http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');

 	// Google Fonts
 	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@700' );
 	

	// Jquery
	wp_enqueue_script( 'jquery2','https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');

	//Bootstrap JS
	wp_enqueue_script( 'boot-js','https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js');

	//Slick.js biblioteca de carrossel 
	wp_enqueue_script( 'slick-carousel','http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');

}
add_action( 'wp_enqueue_scripts', 'Blog_TESTE_scripts' );

add_theme_support('title-tag');





