<?php get_header(); ?>

<div id="content">
	<section>
		<ul class="post">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'loop' );?>
			<?php endwhile; ?>
		</ul>
	</section>
</div>

<?php get_footer(); ?>