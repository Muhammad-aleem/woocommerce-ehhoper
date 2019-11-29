<?php get_header(); ?>
<?php
while (have_posts()) :
	the_post();
	the_title();
	the_content();

	// If comments are open or we have at least one comment, load up the comment template.
	if (comments_open() || get_comments_number()) :
		comments_template();
	endif;

endwhile; // End of the loop.
?>

<?php get_footer(); ?>


<!-- ============================= -->


<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					
					<?php if (is_active_sidebar('cart-shop')) : ?>

					<?php dynamic_sidebar('cart-shop'); ?>

					<?php endif; ?>

				</div>
			</div>
			<div class="col-sm-9">
				<div class="blog-post-area">
					<h2 class="title text-center">Latest From our Blog</h2>
					<div class="single-blog-post">

					</div>
				</div>
			</div>
		</div>
	</div>
</section>