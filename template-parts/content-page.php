<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Oria
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() && ( get_theme_mod( 'post_feat_image' ) != 1 ) ) : ?>
		<div class="single-thumb">
			<?php the_post_thumbnail('oria-large-thumb'); ?>
		</div>
	<?php endif; ?>
	
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <meta itemprop="headline" content="<?= the_title('',''); ?>"/>
	</header><!-- .entry-header -->

         <span class='author' style='display:none;'>
           <span class="vcard">
             <span class="fn family-name"> <?php the_author(); ?> </span>
           </span>
         </span>

        <meta itemprop="datePublished" content="<?php the_time('o-m-d') ?>"/>
        <div style='display:none;' datetime="<?php the_time('o-m-d') ?>" class="post-date date updated" pubdate><?php the_time(apply_filters('themify_loop_date', 'M j, Y')) ?></div>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'oria' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'oria' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
