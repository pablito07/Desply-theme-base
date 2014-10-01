<?php
//funkcje bezpieczeństwa - snippet
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('Nie możesz bezpośrednio uruchomić tego pliku.');

if (post_password_required()) {
    echo 'Post jest chroniony hasłem. Wprowadź hasło aby zobaczyć komentarze.';
    return;
}
?>

<div class="comments">

		<?php if(!comments_open()) : ?>
		
		<?php else: ?>
		
                        <header>
                            <h2>Komentarze</h2>
                        </header>

                        <div class="comments-list">
						
						<?php if(have_comments()) : ?>
						
							<?php
								wp_list_comments();
							?>
						
							
						<?php else : ?>
						
                            <p class="no-comments">Ten wpis nie posiada jeszcze żadnych komentrzy.</p>
							
						<?php endif; ?>
						
                        </div>
                         <?php if (get_comment_pages_count() > 1 && get_option('page_comments') ) : ?>
                        <div class="comments-navi">
                                <div class="prev"><?php previous_comment_link('Starsze komentarze'); ?></div>
                                <div class="next"><?php next_comment_link('Nowsze komentarze'); ?></div>
                        </div>
						<?php endif; ?>

                        <div id="respond">

                            <header>
                                <h2>
									<?php comment_form_title('Dodaj komentarz', 'Odpowiedź dla %s'); ?>
									<?php cancel_comment_reply_link('Kliknij tutaj, aby anulować odpowiadanie.'); ?>
								</h2>
                            </header>
							
						<?php if(get_option('comment_registration') && !is_user_logged_in()) : ?>
						
							<p>Musisz się <a href="<?php echo wp_login_url(get_permalink()); ?>">zalogować</a></p>
							
						<?php else : ?>

                            <form id="commentform" method="post" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php">
							
							<?php if(is_user_logged_in()) : ?>
							
								<p>Zalogowany jako: <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>">Wyloguj się</a></p>
							
							<?php else : ?>
							
                                <input type="text" name="author" placeholder="Imię i nazwisko">
                                <input type="text" name="email" placeholder="Adres e-mail">
								
							<?php endif; ?>

                                <textarea name="comment" placeholder="Treść komentarza"></textarea>
								
								<?php comment_id_fields(); ?>

                                <button>Wyślij</button>
								<?php do_action('comment_form', $post->ID); ?>
								
                            </form>

						<?php endif; ?>
                        </div>
					<?php endif; ?>
                    </div>
					
					