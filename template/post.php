				<?php 
				// Aqui é feita a requisição para consumir a api, nesta url todos os post com o limite de até 100
			    $posts = file_get_contents('http://localhost/teste/wp-json/wp/v2/posts?per_page=100');

			    // Aqui convertemos para variaveis em php
			    $obj = json_decode($posts);

			    // Enifim o loop para mostrar os 100 posts
				foreach ($obj as $post) {

				// No caso da imagem destacada foi feito da seguinte forma, eu referenciei o id da imagem destacada na url de media para então buscar a imagem correta para cada post.	
			    $thumbnail = file_get_contents('http://localhost/teste/wp-json/wp/v2/media/'. $post->featured_media);
			    $image = json_decode($thumbnail);		
			 ?>
			  	<div class="posts">
			 		<img src="<?php echo $image->guid->rendered; ?>" alt="" class="img-fluid">
			 		<p><?php echo $post->title->rendered; ?></p>
			 	</div>	

			<?php } ?>   