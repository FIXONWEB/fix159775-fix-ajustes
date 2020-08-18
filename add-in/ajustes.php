<?php
add_shortcode("fix158716_deletar", "fix158716_deletar");
function fix158716_deletar($atts, $content = null){
	?>
	<script type="text/javascript">
		jQuery(function($){
			$('.fixcoladdorc').on('click', function(e){
				e.preventDefault();
				alert('11');
				return false;
			});
		});
	</script>
	<?php
}