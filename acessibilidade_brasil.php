<?php
/**
 * Plugin Name: Acessibilidade Brasil
 * Plugin URI: https://www.reiselopes.com.br/plugins
 * Description: Plugin para adicionar uma barra de acessibilidade no topo do site.
 * Version: 1.0
 * Author: Marcelo Lopes
 * Author URI: https://www.reiselopes.com.br/dev
 * License: GPL2
 * Text Domain: acessibilidade-brasil
 * Domain Path: /languages
 */

// Carregar local 
function my_plugin_load_plugin_textdomain() {
    load_plugin_textdomain( 'acessibilidade-brasil', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'my_plugin_load_plugin_textdomain' ); 

// Carregar scripts 
function acessibilidade_brasil_scripts() {	
	wp_enqueue_style( 'acessibilidade-brasil_style', plugin_dir_url( __FILE__ ) . 'styles.css', array(), '1.0' );
	//wp_enqueue_style( 'acessibilidade-brasil_bootstrap', plugin_dir_url( __FILE__ ) . 'bootstrap.css', array(), '1.0' );
	wp_enqueue_script( 'acessibilidade-brasil_srv', plugin_dir_url( __FILE__ ) . 'services.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'acessibilidade-brasil_bootstrap', plugin_dir_url( __FILE__ ) . 'bootstrap.js', array('jquery'), '1.0', true  );
}
add_action( 'wp_enqueue_scripts', 'acessibilidade_brasil_scripts' );


// Adicionar acessibilidade no Body
function real_acessability_body_class($classes) {
	
		$cookie = $_COOKIE['acessibilidade-brasil'];
	
        $classes[] = 'acessibilidade-brasil-body';
        
		if(isset($cookie)) {
			$cookie = str_replace("\\", "", $cookie);
			$cookie = json_decode($cookie);
			
			if($cookie->effect !== null) {
				$classes[] = $cookie->effect;
			}
			
			if($cookie->linkHighlight !== false) {
				$classes[] = 'real-acessability-linkHighlight';
			}
			
			
			if($cookie->regularFont !== false) {
				$classes[] = 'real-acessability-regularFont';
			}
		}
		        
        return $classes;
}
add_filter('body_class', 'acessibilidade-brasil_body_class');


// Barra no Topo
function acessibilidade_brasil_html() {
	echo '
	<!-- barra de acessibilidade -->
    <!--<div id="barra">
      <div class="navbar navbar-inverse navbar-fixed-top" id="advanced" style="margin-top: 0px; position: relative; ">
        <span class="trigger">
          <strong></strong>
          <em></em>
        </span>

        <div class="navbar-inner">
          <div class="container">
            <div class="nav-collapse collapse nav-top-collapse">-->
              <!--<ul class="nav" id="barra">
                <li class="">
                  <a acesskey="1" href="javascript:;" id="link-conteudo"> Ir para o conte&uacute;do <span>(1)</span> </a>
                </li>
                <li class="">
                  <a acesskey="2" href="javascript:;" id="link-navegacao"> Ir para a navega&ccedil;&atilde;o <span>(2)</span> </a>
                </li>

                <li class="divider-vertical"></li>
                
                <li class="">
                  <a acesskey="4" href="acessibilidade.html">Acessibilidade <span>(4)</span></a>
                </li>
                <li class="">
                  <a acesskey="5" href="#" id="contraste">Alto Contraste <span>(5)</span></a>
                </li>
                <li class="">
                  <a acesskey="Alt+A" href="#" id="afonte">Aumentar Fonte <span>(Alt + A)</span></a>
                </li>
                <li class="">
                  <a acesskey="Alt+D" href="#" id="dfonte">Diminuir Fonte <span>(Alt + D)</span></a>
                </li>
                <li class="">
                  <a acesskey="Alt+N" href="#" id="nfonte">Fonte Normal<span>(Alt + N)</span></a>
                </li>
                <li>
                  <a acesskey="6" href="mapa-do-site.html">Mapa do Site <span>(6)</span></a>
                </li>
              </ul>-->
            <!--</div>
          </div>
        </div>
      </div>
    </div> -->
	
	<section id="topo">
		<div id="barra">
				<nav class="acessibilidade">
					<ul>
						<li class=""><a id="acess1" href="javascript:;" title="Ir para o conteúdo"><i class="preto">1</i>Ir para o conteúdo</a></li>
						<li><a id="acess2" href="javascript:;" title="Ir para o menu"><i class="preto">2</i>Ir para o menu</a></li>
						<li><a id="acess3" href="javascript:;" title="Ir para a busca"><i class="preto">3</i>Ir para a busca</a></li>
						<li><a id="acess4" href="javascript:;" title="Ir para o rodapé"><i class="preto">4</i>Ir para o rodapé</a></li>
						<li><a href="http://guanambi.ba.gov.br/texto/acessibilidade" title="acessibilidade"><i class="mause"></i>acessibilidade</a></li>
						<li><a href="http://guanambi.ba.gov.br/leitor_tela" title="leitor de tela"><i class="pc"></i>leitor de tela</a></li>
						<li><a href="javascript:;" id="contraste" title="contraste"><i class="contraste"></i>contraste</a></li>
					</ul>
				</nav>
		</div>
	</section>
	';
}
add_action( 'wp_head', 'acessibilidade_brasil_html' );
 
 ?>