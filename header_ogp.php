<?php
/**
 * Open Graph protocol for WordPress
 * @version 0.9.2
 * @author makoto_kw
 * @link https://gist.github.com/3399585
 */
// key into custom fields for description. Default is for All in One SEO Pack
define('WP_OGP_POST_DESCRIPTION_KEY', 'aioseop_description');

// size of Feature Image
// http://codex.wordpress.org/Post_Thumbnails
define('WP_OGP_POST_IMAGE_SIZE', 'medium');


// Facebook AppId and username
// http://developers.facebook.com/docs/opengraphprotocol/
//define('WP_OGP_FB_APPID', 'your-appid');
//define('WP_OGP_FB_ADMINS', 'your-admins');

// Twitter Usernames
//define('WP_OGP_TWITTER_SITE_USERNAME', '@site_username');
//define('WP_OGP_TWITTER_CREATOR_USERNAME', '@creator_username');
//define('WP_OGP_TWITTER_DOMAIN', 'YourDomain.com');

function ogp_post_description($out = true) {
  global $post;
  
  if($out) {
    setup_postdata( $post ); 
  }
  $description = get_the_excerpt(); 
  return str_replace('Подробнее', '', strip_tags($description));
}

function ogp_post_image() {
  return wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
}

function ogp_post_section() {
  $categories = get_the_category();
  if (count($categories)>0) {
    if ($categories[0]->name !=  __('Uncategorized')) {
      return $categories[0]->name;
    } 
  }
  return false;
}

function ogp_post_tag($inline = false) {
  $tags = get_the_tags();
  $tagnames = array();
  if ($tags) {
    if($inline) {
        foreach ($tags as $tag) {
          $tagnames[] = $tag->name;
        }
        return implode(',', $tagnames);
    } else {
        $result = array();
        foreach ($tags as $tag) {
            array_push($result, $tag->name);
        }
        return $result;
    }
  }
  return false;
}
?>
