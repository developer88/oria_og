<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Oria
 */
?>

	<section class="error-404 not-found">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Мы не смогли найти такую страницу', 'oria' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p><?php printf( wp_kses( __( 'Готовы опубликовать свой первый пост? <a href="%1$s">Начните тут</a>.', 'oria' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p><?php esc_html_e( 'Я так и не понял, что ты имела в виду (с). Попробуйте поискать что-нибудь еще.', 'oria' ); ?></p>
				<?php get_search_form(); ?>
				<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

			<?php else : ?>

				<p><?php esc_html_e( 'Мы где-то потеряли эту страницу. Попробуйте ее поискать.', 'oria' ); ?></p>
				<?php get_search_form(); ?>

			<?php endif; ?>
		</div><!-- .page-content -->
	</section><!-- .error-404 -->
