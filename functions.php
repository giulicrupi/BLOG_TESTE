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


		 	// Font awesome
		 	wp_enqueue_style( 'awesome-fonts-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' );		 	
 	



			// Jquery
			wp_enqueue_script( 'jquery2','https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');

			//Bootstrap JS
			wp_enqueue_script( 'boot-js','https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js');

			//Slick.js biblioteca de carrossel 
			wp_enqueue_script( 'slick-carousel','http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');

		 	// Font awesome
		 	wp_enqueue_script( 'awesome-fonts-js', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js' );

	// Arquivo JS principal do tema
	wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), filemtime(get_template_directory() . '/js/main.js'), true);

}
add_action( 'wp_enqueue_scripts', 'Blog_TESTE_scripts' );

//pegar o titulo do site cadastrado no personalizar
add_theme_support('title-tag');


// adiciona a imagem destacada como suporte no wordpress
add_theme_support( 'post-thumbnails' );




// add_action('rest_api_init', 'register_rest_images' );
// function register_rest_images(){
//     register_rest_field( array('post'),
//         'fimg_url',
//         array(
//             'get_callback'    => 'get_rest_featured_image',
//             'update_callback' => null,
//             'schema'          => null,
//         )
//     );
// }
// function get_rest_featured_image( $object, $field_name, $request ) {
//     if( $object['featured_media'] ){
//         $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
//         return $img[0];
//     }
//     return false;
// }






