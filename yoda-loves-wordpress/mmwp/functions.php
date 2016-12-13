<?php

	// ---------------------------------------------------------------------//
	// Função SetCTP - cria custom post types em uma só linha! :)
	// ---------------------------------------------------------------------//

	function setCTP($tipo, $label, $label_plural, $categoria = true, $sexo = 'M', $args = array()){

		//Labels default
		$labels = array (
			'name' => _x($label_plural, 'post type general name'),
			'singular_name' => _x($label_plural, 'post type singular name'),
			'edit_item' => __('Editar '.$label_plural),
			'view_item' => __('Ver '.$label_plural),
			'search_items' => __('Procurar '.$label_plural),
			'parent_item_colon' => '',
			'menu_name' => $label_plural
		);

		if($sexo == "M"){
			//labels Masculino
			$labels['add_new'] = _x('Adicionar novo '.$label, $tipo);
			$labels['add_new_item'] = __('Adicionar novo '.$label_plural);
			$labels['new_item'] =  __('Novo '.$label_plural);
			$labels['all_items'] =  __('Todos o '.$label_plural);
			$labels['not_found'] =   __('Nenhum '.$label_plural.' encontrado');
			$labels['not_found_in_trash'] =  __('Nenhum '.$label_plural.' encontrado na lixeira');
		}else{
			//labels Feminino
			$labels['add_new'] = _x('Adicionar nova '.$label, $tipo);
			$labels['add_new_item'] = __('Adicionar nova '.$label_plural);
			$labels['new_item'] = __('Nova '.$label_plural);
			$labels['all_items'] = __('Todas a '.$label_plural);
			$labels['not_found'] =  __('Nenhuma '.$label_plural.' encontrada');
			$labels['not_found_in_trash'] = __('Nenhuma '.$label_plural.' encontrada na lixeira');
		}
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'rewrite' => true,
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => 10,
			'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')
		);
		register_post_type( $tipo, $args );
		if($categoria){
			$labels = array(
				'name' => _x( 'Categorias', 'taxonomy general name' ),
				'singular_name' => _x( 'Categoria', 'taxonomy singular name' ),
				'search_items' =>  __( 'Buscar Categorias' ),
				'all_items' => __( 'Todas as Categorias' ),
				'parent_item' => __( 'Categoria Pai' ),
				'parent_item_colon' => __( 'Categoria Pai:' ),
				'edit_item' => __( 'Editar Categoria' ),
				'update_item' => __( 'Atualizar Categoria' ),
				'add_new_item' => __( 'Adicionar nova Categoria' ),
				'new_item_name' => __( 'Adicionar novo nome de Categoria' ),
				'menu_name' => __( 'Categorias' ),
			);
		register_taxonomy($tipo.'_category',array($tipo), array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'query_var' => true,
				"slug" => "categoria",
				'rewrite' => array('with_front' => true )));
		}
		flush_rewrite_rules();
	}
	// ---------------------------------------------------------------------//

	// ---------------------------------------------------------------------//
	// Função getPostViews - seta quantidade de pageviews de um post
	// ---------------------------------------------------------------------//

	function getPostViews( $postID ) {
		$count_key = 'post_views_count';
		$count = get_post_meta( $postID, $count_key, true );
		if ( $count=='' ) {
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
			return "0 View";
		}
		return $count.' Views';
	}
	function setPostViews( $postID ) {
		$count_key = 'post_views_count';
		$count = get_post_meta( $postID, $count_key, true );
		if( $count == '' ) {
			$count = 0;
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
		} else {
			$count++;
			update_post_meta( $postID, $count_key, $count );
		}
	}
	// ---------------------------------------------------------------------//

	// ---------------------------------------------------------------------//
	// Função tags_support_all - Adicionando tags
	// ---------------------------------------------------------------------//

	function tags_support_all() {
		register_taxonomy_for_object_type('post_tag', 'page');
	}

	//Ensure all tags are included in queries
	function tags_support_query($wp_query) {
		if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
	}

	// ---------------------------------------------------------------------//

	// ---------------------------------------------------------------------//
	// Função get_the_user_ip - Pega IP do usuário
	// ---------------------------------------------------------------------//
	function get_the_user_ip() {
		if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
			//check ip from share internet
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
			//to check ip is pass from proxy
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return apply_filters( 'wpb_get_ip', $ip );
	}

	// ---------------------------------------------------------------------//

	// ---------------------------------------------------------------------//
	// Função custom_menu_page_removing - contact-form-7 só para super admin
	// ---------------------------------------------------------------------//
	function custom_menu_page_removing() {
		if(!is_super_admin()){
			remove_menu_page('wpcf7');
			remove_menu_page('edit-comments.php'); // Comments
		}
	}

	// ---------------------------------------------------------------------//

	// ---------------------------------------------------------------------//
	// Função login_logo - Muda logo Painel de Administração
	// ---------------------------------------------------------------------//
	function login_logo($img_url = '') {
		if($img_url == ""){
			$img_url = get_bloginfo('template_directory').'/img/logo.png';
		} ?>
		<style type="text/css">
		  .login h1 a {
			background-image: url(<?=$img_url;?>);
			padding-bottom: 30px;
			width: 100%;
			height: 100%;
			background-size: 270px;
		}
		</style>
	<?php }

	// ---------------------------------------------------------------------//

	// ---------------------------------------------------------------------//
	// Função custom_excerpt
	// ---------------------------------------------------------------------//
	function custom_excerpt( $post_temp, $length = 20 ) {
		if( $post_temp->post_excerpt ) {
			$content = wp_trim_words( $post_temp->post_excerpt , $length );
		} else {
			$content = $post_temp->post_content;
			$content = wp_trim_words( $content , $length );
		}
		return $content;
	}

	// ---------------------------------------------------------------------//

	// ---------------------------------------------------------------------//
	// Função custom_mtypes
	// ---------------------------------------------------------------------//
	function custom_mtypes( $m ){
		$m['svg'] = 'image/svg+xml';
		$m['svgz'] = 'image/svg+xml';
		return $m;
	}
	add_filter( 'upload_mimes', 'custom_mtypes' );
	// ---------------------------------------------------------------------//

	// ---------------------------------------------------------------------//
	// Theme support
	// ---------------------------------------------------------------------//
	add_theme_support('menus');
	add_theme_support('post-thumbnails');
	add_theme_support('excerpt');

	// ---------------------------------------------------------------------//

	// ---------------------------------------------------------------------//
	// Theme Actions
	// ---------------------------------------------------------------------//
	add_action('init', 'tags_support_all');
	add_action('login_enqueue_scripts', 'login_logo');
	add_action('admin_menu', 'custom_menu_page_removing');
	add_action('pre_get_posts', 'tags_support_query');

	// ---------------------------------------------------------------------//

	// ---------------------------------------------------------------------//
	// Removendo Emoji
	// ---------------------------------------------------------------------//
	remove_action("wp_head", "print_emoji_detection_script", 7 );
	remove_action("admin_print_scripts", "print_emoji_detection_script" );
	remove_action("wp_print_styles", "print_emoji_styles" );
	remove_action("admin_print_styles", "print_emoji_styles" );
	// ---------------------------------------------------------------------//

	// ---------------------------------------------------------------------//
	// Removendo meta Wordpress
	// ---------------------------------------------------------------------//
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_shortlink_wp_head');
	// ---------------------------------------------------------------------//

?>
