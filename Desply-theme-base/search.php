<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.js"></script>

<section id="entry" class="content container">
	<header>
		<h2 class="h1">Szukane: <?php echo get_search_query(); ?></h2>
	</header>

	<article>
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