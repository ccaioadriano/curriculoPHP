
$(function(){
	//Aqui vai todo nosso código de javascript.
	$('nav.mobile').click(function(){
		//O que vai acontecer quando clicarmos na nav.mobile!
		var listaMenu = $('nav.mobile ul');

		if(listaMenu.is(':hidden') == true){
			//fa fa-times
			//fa fa-bars
			//var icone =  $('.botao-menu-mobile i');
			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass('fa-bars');
			icone.addClass('fa-times');
			listaMenu.slideToggle();
		}
		else{
			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass('fa-times');
			icone.addClass('fa-bars');
			listaMenu.slideToggle();
		}


	});

	//scroll dinamico
	if ($('target').length > 0) {
		var elemento = '#'+$('target').attr('target');
		var divScroll = $(elemento).offset().top;
		$('html, body').animate({'scrollTop': divScroll});

	}


	//IMPLEMENTAR CARREGAMENTO DINAMICO NAS HABILIDADES






	//carregar dinamico, sem atualizar a página
	carregarDinamico();
	function carregarDinamico() {
		$('[realtime]').click(function() {
			$('.container-principal').hide();
			var pagina = $(this).attr('realtime');
			$('.container-principal').load(include_path+'pages/'+pagina+'.php');

			$('.container-principal').fadeIn();

			return false;
		})
	}
})





