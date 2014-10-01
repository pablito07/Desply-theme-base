<?php get_header(); ?>

<?php the_post(); ?>

<section id="entry" class="content container">
	<header>
		<h2 class="h1"><?php the_title(); ?></h2>
	</header>

	<article>
		<?php the_content(); ?>
		<?php the_tags(); ?>
		<div class="clear"></div>
	</article>
</section>

<?php get_footer(); ?>