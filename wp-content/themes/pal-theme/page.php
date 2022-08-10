<?php
/*
 * The template for displaying pages
 */
get_header();
while ( have_posts() ) : the_post(); ?>
<style>
	h1.page-title {
		font-size: 48px;
		padding: 30px 0 0;
		margin-bottom: 15px;
	}
</style>
<div class="container">
	<div class="row">
		<div class="offset-xxl-1 col-12 col-xxl-10">
			<h1 class="page-title"><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
	</div>
</div>
<?php /*
<script type="text/javascript">
let createOrderBTN = document.getElementById('createOrderBTN');
createOrderBTN.addEventListener('click', function(e){
	e.preventDefault();

	let formData = new FormData();

	formData.append("action", "createOrder");

	var request = new XMLHttpRequest();
	request.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>', true);

	request.onload = function() {
		if (this.status >= 200 && this.status < 400) {
			console.log(this.response);
		} else {
			console.log(this.response);
		}
	};

	request.onerror = function() {
		console.log(this.response);
	};

	request.send(formData);
});
</script>
*/ ?>
<?php
endwhile;
get_footer(); ?>