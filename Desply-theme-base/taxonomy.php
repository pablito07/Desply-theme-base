<?php get_header(); ?>

<section id="entry" class="content container">
	<header>
		<h2 class="h1"> <?php echo ucfirst(single_cat_title('', false)); ?></h2>
	</header>

	<article>
		<?php if(have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part( 'loop', 'ulotki' );?>
			<?php endwhile; ?>
			<div class="clear"></div>
		<?php else : ?>
			<p>Nie znaleziono</p>
		<?php endif; ?>
		<div class="clear"></div>
	</article>
</section>

<?php get_footer(); ?>