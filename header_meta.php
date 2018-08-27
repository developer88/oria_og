<?php
    if(is_single()) {
      $post_description = str_replace('Подробнее', '', strip_tags(get_the_excerpt()));
      $post_tags = wp_get_post_tags($post->ID);
      $categories = get_the_category();
?>

        <meta property="og:title" content="<?php echo the_title(); ?>">
        <meta property="og:image" content="<?php echo ogp_post_image(); ?>">
        <meta property="og:url" content="<?php echo get_permalink( $post->ID ); ?>">
        <meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>">
        <meta property="og:type" content="article">
        <meta property="og:image:width" content="600" />
        <meta property="og:locale" content="ru_RU" />
        <meta property="og:description" content="<?php echo ogp_post_description(); ?>...">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@onceingermany">
        <meta name="twitter:title" content="<?php echo the_title(); ?> | <?php echo get_bloginfo('name'); ?>">
        <meta name="twitter:description" content="<?php echo ogp_post_description(); ?>...">
        <meta name="twitter:image" content="<?php echo ogp_post_image(); ?>">
        <meta name="twitter:creator" content="@onceingermany">

        <meta name="title" content="<?php echo the_title(); ?> | <?php echo get_bloginfo('name'); ?>">

        <link rel="canonical" href="<?php echo get_permalink( $post->ID ); ?>">

        <?php
          foreach( $categories as $category ) {
              echo '<meta property="article:section" content="' . $category->name  . '" />';
          };
          foreach($post_tags as $tag) {
              echo '<meta property="article:tag" content="' . $tag->name . '" />';
          };
        ?>
<?php
    } else {
?>
        <meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>">
        <meta property="og:description" content="<?php echo  bloginfo('description'); ?>" />
        <meta property="og:locale" content="ru_RU" />
        <meta property="og:image" content="http://onceingermany.ru/wp-content/uploads/2016/01/favicon256.png" />
        <meta property="og:title" content="<?php echo get_bloginfo('name'); ?>" />
        <meta property="og:type" content="blog" />
        <meta property="og:url" content="<?php echo bloginfo('url'); ?>" />

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@onceingermany">
        <meta name="twitter:title" content="<?php echo get_bloginfo('name'); ?>">
        <meta name="twitter:description" content="<?php echo  bloginfo('description'); ?>">
        <meta name="twitter:image" content="http://onceingermany.ru/wp-content/uploads/2016/01/favicon256.png">
        <meta name="twitter:creator" content="@onceingermany">

        <link rel="canonical" href="<?php echo bloginfo('url'); ?>">
        <meta name="title" content="<?php echo get_bloginfo('name'); ?>">
<?php
    };
?>