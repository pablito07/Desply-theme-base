<?php get_header(); ?>

<?php the_post(); ?>

<section id="entry" class="content container">
	<header>
		<h2 class="h1"><?php the_title(); ?></h2>
	</header>

	<article>
		<?php $args = array('order' => 'ASC'); ?>
		<?php query_posts( $args ); if (have_posts()) : ?>
		<ul class="">
				<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part( 'loop' );?>
				<?php endwhile; ?>
				<div class="clear"></div>
		</ul>
		<?php else : ?>
			<p>Nie znaleziono</p>
		<?php endif; ?>
	</article>
</section>

<?php get_footer(); ?>