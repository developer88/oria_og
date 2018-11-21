<?php
/**
 * @package Oria
 */
?>

<?
  if(get_the_ID() == 243) {
    echo '<script type="text/javascript" src="/wp-content/themes/oria/extra/professional_form/pf0.js"></script>';
  };
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Article">

	<?php if ( has_post_thumbnail() && ( get_theme_mod( 'post_feat_image' ) != 1 ) ) : ?>
		<div class="single-thumb" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
			<?php the_post_thumbnail('oria-standard-thumb'); ?>
      <meta itemprop="url" content="<?php echo ogp_post_image(); ?>">
      <meta itemprop="width" content="600">
      <?php
        $tn_id = get_post_thumbnail_id( $post->ID );

        $img = wp_get_attachment_image_src( $tn_id, 'oria-standard-thumb' );
        $width = $img[1];
        $height = $img[2];
      ?>
      <meta itemprop="height" content="<?php echo $height; ?>">
		</div>
	<?php endif; ?>

  <meta itemprop="description" content="<?php echo ogp_post_description(false); ?>...">
  <meta itemprop="datePublished" content="<?php echo get_the_modified_time('o-m-d'); ?>"/>
  <meta itemprop="dateModified" content="<?php echo get_the_modified_time('o-m-d'); ?>"/>
  <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php echo bloginfo('url'); ?>"/>

  <span itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
    <span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
      <?php if ( get_theme_mod('site_favicon') ) : ?>
        <meta itemprop="url" content="<?php echo esc_url(get_theme_mod('site_favicon')); ?>">
      <?php endif; ?>
      <meta itemprop="width" content="256">
      <meta itemprop="height" content="316">
    </span>
    <meta itemprop="name" content="OnceInGermany">
  </span>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>

		<?php if (get_theme_mod('hide_meta_single') != 1 ) : ?>
      <div class="author" style="display:none;">OnceInGermany.ru</div>
  		<div class="entry-meta">
  			<?php oria_posted_on(); ?>
  		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
    <?php

      function insertContent($content) {
        $date = '<p class="post-created-date post-date date">';
        $date .= '<meta itemprop="datePublished" content="' . get_the_modified_time('o-m-d') . '" />';
        $date .= '<span itemprop="author" itemscope itemtype="https://schema.org/Person" class="vcard author">';
        $date .= '© <span itemprop="name" class="author fn">OnceInGermany</span></span>, <span class="date updated published">' . get_the_modified_time('d-m-o') . '</span>';
        $date .= '</p>';

      	$content = $date . $content;
      	return $content;
      }

     add_filter( 'the_content', 'insertContent' );
    ?>

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'oria' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if (get_theme_mod('hide_meta_single') != 1 ) : ?>
  	<footer class="entry-footer">
  		<?php oria_entry_footer(); ?>
  	</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
