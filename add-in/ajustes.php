<?php
add_shortcode("fix159775_add_to_cart", "fix159775_add_to_cart");
function fix159775_add_to_cart($atts, $content = null){
	global $post;
	// echo "<div>--".$post->ID."--</div>";
	//$woocommerce->cart->add_to_cart( $product_id );
	?>
	<script type="text/javascript">
		jQuery(function($){
			$('.fix159775_add_to_cart_<?php echo $post->ID ?>').on('click', function(e){
				e.preventDefault();
				// alert('11');
				var post_id = $(this).attr('data-id');
				console.log(post_id);

				$.ajax({
					url:"<?php echo site_url() ?>/fix159775_add_to_cart",
					method:"POST",
					// data: new FormData(this),
					data: "id="+post_id,
					dataType:"json",
					contentType:false,
					cache:false,
					processData:false,
					success:function(data){
						// $('#fix158716_form_upload_foto').html('<div class="alert alert-success">'+data.success+'</div>');
						// $('#fix158716_form_upload_foto')[0].reset();

					}
				});

				return false;
			});

			
			//jet-listing-items
			//fixrowproduto

			// $('.jet-listing-items').on('click', function(e){
			// 	console.log('fixrowproduto');
			// 	var post_id = $(this).attr('data-post-id');
			// 	console.log(post_id);
			// });

		});
	</script>


	<div class="elementor-button-wrapper">
		<a href="#" data-id="<?php echo $post->ID ?>" class="fix159775_add_to_cart_<?php echo $post->ID ?> elementor-button-link elementor-button elementor-size-sm" role="button">
			<span class="elementor-button-content-wrapper">
				<span class="elementor-button-text">ADICIONAR AO ORÇAMENTO</span>
			</span>
		</a>
	</div>


	<?php
}

add_action( 'parse_request', 'fix159775_parse_request');
function fix159775_parse_request( &$wp ) {
	global $woocommerce;
	if($wp->request == 'fix159775_add_to_cart'){
		$id = isset($_POST['id']) ? $_POST['id'] : 0 ;
		$woocommerce->cart->add_to_cart( $id );
		exit;
	}
}
