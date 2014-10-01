<?php get_header(); ?>


<section class="content container">
	<div class="post">
		<?php while ( have_posts() ) : the_post(); ?>	
			<?php get_template_part( 'loop' );?>
		<?php endwhile; ?>
	</div>
</section>


<?php get_footer(); ?>