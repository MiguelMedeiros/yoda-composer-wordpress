<?php

      // ---------------------------------------------------------------------//
      // Iniciando Framework MMWP
	// ---------------------------------------------------------------------//

      include(TEMPLATEPATH.'/mmwp/functions.php');


      // ---------------------------------------------------------------------//
      // Criando CPTs
	// ---------------------------------------------------------------------//

      function create_post_types() {
            //setCTP($tipo, $label, $label_plural, $categoria = true, $sexo = 'M', $args = array());
      }
      add_action('init', 'create_post_types' );


      // ---------------------------------------------------------------------//
      // Image Sizes
	// ---------------------------------------------------------------------//

      //add_image_size( 'tamanho_personalizado', 256, 256, array( 'center', 'center' ), true );

      // ---------------------------------------------------------------------//
      // Ajax Example
	// ---------------------------------------------------------------------//
      /*function loadPosts(){
           header('Content-Type: application/json');
           echo json_encode(array('var1' => $var1,'var2'=> $var2));
           die();
      }
      add_action('wp_ajax_loadPosts', 'loadPosts');
      add_action('wp_ajax_nopriv_loadPosts', 'loadPosts');
      */

      // ---------------------------------------------------------------------//
      // Add livereload gulp
	// ---------------------------------------------------------------------//
      if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
            wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
            wp_enqueue_script('livereload');
      }

?>
