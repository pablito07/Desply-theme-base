		<?php get_header(); ?>
		
<div class="bg-container">
	<section class="container">
		<header>
			<h2 class="h1">Błąd 404</h3>
        </header>  
	</section>
</div>

<section id="error404" class="content container">
	<div class="pos-center">
		
		<div class="wrapper">
			<div class="message">
				<h2>Przykro nam, ale strona której szukasz nie istnieje...</h2>
				<a href="<?php echo esc_url(home_url('/')); ?>">Przejdź do strony głównej</a>
			</div>
		</div>
		
	</div>
</section>


<?php get_footer(); ?>