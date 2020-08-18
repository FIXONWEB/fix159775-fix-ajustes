<?php
add_shortcode("fix159775_add_to_cart", "fix159775_add_to_cart");
function fix159775_add_to_cart($atts, $content = null){
	?>
	<script type="text/javascript">
		jQuery(function($){
			// $('.fixcoladdorc').on('click', function(e){
			// 	e.preventDefault();
			// 	alert('11');
			// 	return false;
			// });
			
			$('.fixrowproduto').on('click', function(e){
				console.log('fixrowproduto');
			});
		});
	</script>
	<?php
}