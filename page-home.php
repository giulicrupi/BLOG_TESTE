<?php get_header();?>
		
<section class="principal">


	<!-- Começo da forma cinza na parte superior esquerda da página -->
	<div class="forma"></div>
	<!-- -------- -->

	<!-- Aqui está o header com as navegações do carrossel -->
	<div class="header-cont">
		<div class="linha">
			<div class="topico1">
				<p class="title">Vídeos</p>
			</div>
			<div class="topico2">
				<div class="botao">
					<a href="#">
						<button>Veja mais <i class="fa-solid fa-chevron-right"></i></button>
					</a>
				</div>
			</div>
			<div class="topico3">
				<!-- setas de navegação -->
				<span class="thumb-prev arrows"><i class="fa fa-angle-up fa-lg"></i></span>
				<span class="thumb-next arrows"><i class="fa fa-angle-down fa-lg"></i><span>	
				<!-- fim -->				
			</div>
		</div>
	</div>	

	<!-- fim do header -->

	<!-- Aqui começa o conteúdo dos posts -->
	<div class="conteudo">

	    <div class="container">
			<div class="slides">
				<div class="posts">
				<?php 

				// essa é a chamada da api dos posts, repare que foi limitado a 10 posts
			    $posts = file_get_contents('http://apiseoxteste.servicos.ws/wp-json/wp/v2/posts?per_page=10');

			    // Aqui eu desconstrui o conteudo json obtido na linha cima
			    $obj = json_decode($posts);

			    
			    // Diferente do loop wordpress, aqui foi feito um loop com o mumero total dos posts obtidos e então começamos a mostrar post a post de acordo com a api
				foreach ($obj as $post) {

				// Essa é a chamada da imagem para cada post. Cada post possui um numero relativo as imagens dentro do JSON, 
				// se inserimos o mesmo numero da variavel featured_media na api com o /media, conseguimos pegar a url da mesma
			    $thumbnail = file_get_contents('http://apiseoxteste.servicos.ws/wp-json/wp/v2/media/'. $post->featured_media);

			    // desconstruindo a linha a cima
			    $image = json_decode($thumbnail);

			    // aqui estamos buscando a categoria relativa a cada post, note que o processo é o mesmo para buscar a categoria, 
			    // assim como fizemos para pegar as imagens
			    $teste = file_get_contents('http://apiseoxteste.servicos.ws/wp-json/wp/v2/categories?post='. $post->id);
				
				// desconstruindo a linha a cima
			    $cat = json_decode($teste);
			 ?>
					

				<!-- Aqui começa a listagem do post principal, o maior em destaque -->	

<!-- 					para pergamos a imagem utilizamos a variavel descontruida relativa a imagem e referenciamos seguindo o
					o caminho respectivo da url da imagem -->
				  <div class="item-slide grande" style="background-image: url('<?php echo $image->guid->rendered; ?>');"> 
				  	<div class="over">
					  	<div class="content">
					  		<div class="infos">
					  			<div class="play">
					  				<a href="#">
					  					<div class="circle">
					  						<i class="fa-solid fa-play"></i>
					  					</div>
					  				</a>
					  			</div>
					  			<?php 
					  				// para mostrar as categorias é preciso fazer um foreach, pois cada post pode ter N categorias, 
					  				// e aqui o intuito é mostrar todas as categorias.
					  				foreach ($cat as $categoria){?>
					  					<!-- O caminho para pegar a categoria é padrão, seguir o percurso ate o nome da categoria -->
					  				<p class="categoria"><?php echo $categoria->name; ?></p>	
					  			<?php		
					  				}
					  			 ?>
					  			
					  			<p class="title"><?php echo $post->title->rendered; ?></p>
					  		</div>
					  	</div>				  		
				  	</div>
				  </div>
			<?php } ?> 					


				</div>
				<div class="posts-nav">

				<?php 


			    
				foreach ($obj as $post) {


				// Essa é a chamada da imagem para cada post. Cada post possui um numero relativo as imagens dentro do JSON, 
				// se inserimos o mesmo numero da variavel featured_media na api com o /media, conseguimos pegar a url da mesma			
			    $thumbnail = file_get_contents('http://apiseoxteste.servicos.ws/wp-json/wp/v2/media/'. $post->featured_media);

			    // desconstruindo a linha a cima
			    $image = json_decode($thumbnail);


			    // aqui estamos buscando a categoria relativa a cada post, note que o processo é o mesmo para buscar a categoria, 
			    // assim como fizemos para pegar as imagens
			    $teste = file_get_contents('http://apiseoxteste.servicos.ws/wp-json/wp/v2/categories?post='. $post->id);

			    // desconstruindo a linha a cima			    
			    $cat = json_decode($teste);

			    //variavel para armazenar o titulo do post, assim fica mais facil limitar o numero de caracteres
			    $titulo = $post->title->rendered;	

			    // aqui estamos buscando os comentarios relativo as post que estamos mostrando
			    $getcomentarios = file_get_contents('http://apiseoxteste.servicos.ws/wp-json/wp/v2/comments?post='. $post->id);

			    // desconstruindo a linha a cima				    
			    $comentarios = json_decode($getcomentarios);	    		
			 ?>

<!-- 
			 	Iniciando a exibicão das thumbs dos posts -->
				  <div class="item-slide" >
				  	<div class="card-post">
				  		
					  		<div class="image" style="background-image: url('<?php echo $image->guid->rendered; ?>');">
					  			<div class="over">
						  			<div class="play">
						  				<a href="#">
						  					<div class="circle">
						  						<i class="fa-solid fa-play"></i>
						  					</div>
						  				</a>
						  			</div>
						  			<div class="coments">
						  				<p class="icon"><i class="fa-regular fa-comments"></i></p>
						  				<?php 
						  					// como queremos saber o número de comentarios para cada post,
						  					// aqui foi feito um foreach com um contador para assim retornar o numero de comentários
						  					$cont = 0;
						  					foreach ($comentarios as $comentario) $cont++;
						  				 ?>

						  				<p class="p-com"><?php echo $cont; ?></p>
						  			</div>					  				
					  			</div>
					  		</div>				  			
				  		
				  		<div class="infos">
				  			<?php 
				  				foreach ($cat as $categoria){?>
				  				<p class="categoria"><?php echo $categoria->name; ?></p>	
				  			<?php		
				  				}
				  			 ?>

				  			 <!-- Aqui utilizei o mb_strimwidth para limitar a exibição de texto a 65 caracteres -->
				  			<p class="title-navs"><?php echo  mb_strimwidth($titulo, 0, 65, "...") ?></p>
				  		</div>
				  	</div>
				  </div>
				 <!--  fim das thumbs -->

				<?php } ?>

				</div>
				

			</div> 			
	    </div>	
	</div>
</section>		
	
<?php get_footer(); ?>


