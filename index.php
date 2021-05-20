<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Projeto 01</title>
		<meta charset="UTF-8">
	  	<meta name="description" content="Projeto 01 - curso de backend">
	  	<meta name="keywords" content="HTML, CSS, JavaScript, PHP">
	  	<meta name="author" content="Caio Adriano">
	  	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	  	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH; ?>estilo/style.css">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">

		<script src="https://kit.fontawesome.com/b2f5774bfc.js" crossorigin="anonymous"></script>
		

	</head>
	<body>
	
	<?php new Email();?>

		<!--INSERE UMA CONSTANTE (LOCALHOST) PARA QUE O SITE CARREGUE DINAMICAMENTE-->
		<base base="<?php echo INCLUDE_PATH; ?>"></base>

			<!--CRIA A VARIAVEL $URL QUE PEGA VIA GET OS DADOS. DEFALT = HOME -->
			<?php 
				$url = isset($_GET['url']) ? $_GET['url'] : 'home';
				
				//TESTA A $URL. CASO SEJA 'SOBRE/SERVICOS' APLICA O ATRIBUTO TARGET.
				switch($url) {
					case 'sobre': echo '<target target="sobre" />';
					break;

					case 'servicos': echo '<target target="servicos" />';
					break;
				}
				
			?>


		<!--CABEÇALHO DA PÁGINA INSCLUINDO OS ARQUIVOS DINAMICAMENTE-->		
		<header>
			<div class="center">

				<nav class="desktop right">
					<ul>
						<li><a href="<?php echo INCLUDE_PATH; ?>" />Home</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
						<li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>

					</ul>
				</nav><!--desktop-->

				<!--CABEÇALHO DA PÁGINA INSCLUINDO OS ARQUIVOS DINAMICAMENTE (MOBILE)-->		
				<nav class="mobile right">
					<div class="botao-menu-mobile" >
						<i class="fa fa-bars" aria-hidden="true"></i>
					</div>
					<ul>
						<li><a href="<?php echo INCLUDE_PATH; ?>" />Home</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
						<li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
					</ul>
				</nav><!--mobile-->
				<div class="clear"></div><!--clear-->
			</div><!--center-->
		</header><!--header-->
		
		<!--INSERE O CONTEUDO PRINCIPAL DA PÁGINA DINAMICAMENTE-->		
		<div class="container-principal">
			<?php 

						if (file_exists('pages/'.$url.'.php')) {
					
							include('pages/'.$url.'.php');
			
						}
			
						else {

							if($url != 'servicos' && $url != 'sobre'){
								$pagina404 = true;
								include('pages/404.php');					
							}else {
								include('pages/home.php');
							}

						}
		
			?>
		</div><!--container-principal-->
		
		<!--RODAPÉ DA PÁGINA COM UM TESTE PARA APLICAR A CLASS"FIXED" CASO A PÁGINA NÃO EXISTA-->		
		<footer <?php if(isset($pagina404) && $pagina404 == true ) echo 'class="fixed"'?>>
			<div class="center">
				<p>Todos os direitos reservados</p>
			</div><!--center-->
		</footer>
		
		<script type="text/javascript" src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script><!--JQUERY-->
		<script type="text/javascript" src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script><!--SCRIPTS-->
		<script type="text/javascript" src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script><!--CONSTANTS-->

		<?php if ($url == 'contato') { ?>
			<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKjT1-iCoGMjqSQEekMCW386fnqFlHRtU"></script> -->
			<!--<script type="text/javascript" src="<?php //echo INCLUDE_PATH; ?>js/map.js"></script>--><!--SCRIPTS-->
		<?php } ?>
	</body>
</html>