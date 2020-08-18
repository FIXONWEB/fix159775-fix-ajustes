<?php
add_shortcode("fix159775_add_to_cart", "fix159775_add_to_cart");
function fix159775_add_to_cart($atts, $content = null){
	global $post;
	echo "<div>--".$post->ID."--</div>";
	?>
	<script type="text/javascript">
		jQuery(function($){
			// $('.fixcoladdorc').on('click', function(e){
			// 	e.preventDefault();
			// 	alert('11');
			// 	return false;
			// });
			
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
		<a href="#" class="elementor-button-link elementor-button elementor-size-sm" role="button">
			<span class="elementor-button-content-wrapper">
				<span class="elementor-button-text">xxxxxxxx</span>
			</span>
		</a>
	</div>


	<?php
}