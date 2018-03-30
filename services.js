// Atalhos
function gotoConteudo(){
	"use strict";
    //$("#conteudo_ref").focus();
	$('html, body').animate({scrollTop: $('#conteudo_ref').offset().top }, 600);
    return false;
}

function gotoMenu(){
	"use strict";
    //$("#menu_ref").focus(); 
	$('html, body').animate({scrollTop: $('#menu_ref').offset().top }, 600);    
    return false;
} 

function gotoTopo(){
	"use strict";
    $("html, body").animate({ scrollTop: $('#panel').offset().top }, 600);     
    return false;
} 

function gotoAcessibilidade(){
	"use strict";
    window.location.assign("acessibilidade.html");
    return false;
} 

function gotoMapaDoSite(){
	"use strict";
    window.location.assign("mapa-do-site.html");
    return false;
} 

// Contraste
function configContrastePadrao(){
	"use strict";
    if($.cookie("contraste") && $.cookie("contraste") !== ""){
        $("body").addClass($.cookie("contraste"));
    }
}

function selecionaContraste(){  
	"use strict"; 
    var  contraste = $.cookie("contraste") || "";
    
    if (contraste === "") {  
        $("body").addClass("contraste");
        $.cookie("contraste", "contraste");
    }else{
        $('body').removeClass("contraste");
        $.cookie("contraste", "");
    }
}

function trataFonte(acao){
	
	//alert('Ação = ' + acao);

for (var i in id){

	var cmd = id[i].split("/");
	var local = cmd[0]; var tamanhomin = cmd[1]; var tamanhomax = cmd[2];	
	var recipiente = local; 
	//var acao = $(this).attr('class');	
	var atual = parseFloat($(recipiente).css('font-size'));

	if(acao == 'afonte'){
		var novotamanho = atual+1;
		if (novotamanho < tamanhomax){ 
			$(recipiente).css('font-size', novotamanho);
			$.cookie(recipiente, novotamanho, { path : '/' });
		}
		
		 //$("body").css({"zoom":"1.3", "-moz-transform":"scale(1.3)"});
		 $.cookie("body", "aumentar", { path : '/' });
	}

	if (acao == 'dfonte'){
		var novotamanho = atual-1;
		if (novotamanho > tamanhomin){ 
			$(recipiente).css('font-size', novotamanho);
			$.cookie(recipiente, novotamanho, { path : '/' });
		}
		
	//	$("body").css({"zoom":"0.8", "-moz-transform":"scale(0.7)"});
		$.cookie("body", "diminuir", { path : '/' });
	}

	if(acao == 'nfonte'){
		$(recipiente).css('font-size', '');
		$.cookie(recipiente, '', { path : '/' });
		
	//	$("body").css({"zoom":"1.0", "-moz-transform":"scale(1.3)"});
		$.cookie("body", "normal", { path : '/' });
	}	

}	return false;

}

$(document).ready(function() {
	"use strict";
    configContrastePadrao();
    
    /* atalhos */
    $(document).bind("keydown", "Alt+Shift+1", gotoConteudo);
    $(document).bind("keydown", "Alt+1", gotoConteudo);
	//$(document).bind("click", "link-conteudo", gotoConteudo);   
        
    $(document).bind("keydown", "Alt+Shift+2", gotoMenu);
    $(document).bind("keydown", "Alt+2", gotoMenu);
	//$(document).bind("click", "link-navegacao", gotoMenu);   
    
    $(document).bind("keydown", "Alt+Shift+4", gotoAcessibilidade);
    $(document).bind("keydown", "Alt+4", gotoAcessibilidade); 

    $(document).bind("keydown", "Alt+Shift+5", selecionaContraste);
    $(document).bind("keydown", "Alt+5", selecionaContraste); 

    $(document).bind("keydown", "Alt+Shift+6", gotoMapaDoSite);
    $(document).bind("keydown", "Alt+6", gotoMapaDoSite); 
	
   
    /* contraste */
    $("#contraste").click(function(){
        selecionaContraste(); 
        return false;
    });
	
	/* Aumentar Fonte */
    $("#afonte").click(function(){
        trataFonte($(this).attr('id')); 
        return false;
    });
	
	/* Diminuir Fonte */
    $("#dfonte").click(function(){
        trataFonte($(this).attr('id')); 
        return false;
    });
	
	/* Fonte Padrão */
    $("#nfonte").click(function(){
        trataFonte($(this).attr('id')); 
        return false;
    });
    
    /* impressao */
    $("#imprimir").click(function(){ 
        window.print();
        return false;
    });
    
    /* voltar */
    $("#voltar").click(function(){ 
        history.go(-1);
        return false;
    });
	
	$("#go_topo").click(function(){ 
        gotoTopo();
        return false;
    });

});