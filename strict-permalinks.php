<?php
/*
Plugin Name: Strict Permalinks
Plugin URI: http://wordpress.org/extend/plugins/strict-permalinks/
Description: Restricts permalink syntax and disables permalink editing after a post is published.
Version: 1.1
Author: Dan Phiffer
Author URI: http://phiffer.org/
*/

class Strict_Permalinks {
  
  function Strict_Permalinks() {
    // Ensures that only alphanumerics and hyphens make it into post_name values
    add_filter('sanitize_title', array(&$this, 'sanitize_title'));
    
    // Disables permalink editing once a post has been published
    if (is_admin()) {
      add_action('admin_init', array(&$this, 'admin_init'));
      add_action('admin_menu', array(&$this, 'admin_menu'));
    }
  }
  
  function sanitize_title($slug) {
    
    // Clear out any URL-encoded symbols
    $slug = preg_replace("/%../", "-", $slug);
    
    // Replace anything that's not alphanumeric or hyphen
    $slug = preg_replace("/[^-0-9a-zA-Z_]+/", "-", $slug);
    
    // Eliminate consecutive hyphens
    $slug = preg_replace("/--+/", "-", $slug);
    
    // Remove trailing hyphen if it exists
    if (substr($slug, -1, 1) == '-') {
      $slug = substr($slug, 0, -1);
    }
    return $slug;
  }
  
  function admin_init() {
    //wp_register_script('strict_permalinks_js', WP_PLUGIN_URL . '/strict-permalinks/strict-permalinks.js', array('jQuery'), '1.0');
  }
  
  function admin_menu() {
    // Adds a meta box to the post editing interface
    add_meta_box('strictpermalinks', 'Permalink Editing', array(&$this, 'meta_box'), 'post', 'advanced', 'low');
    add_action('admin_print_scripts-post-new.php', array(&$this, 'print_scripts'));
    add_action('admin_print_scripts-post.php', array(&$this, 'print_scripts'));
  }
  
  function print_scripts() {
    wp_enqueue_script('strict_permalink_js', WP_PLUGIN_URL . '/strict-permalinks/strict-permalinks.js', array('jquery'), '1.0');
  }
  
  function meta_box() {
    // If the post is published, disable the permalink editing interface
    global $post;
    echo <<<END
      <p id="strict-permalinks-feedback">
        Strict Permalinks is taking a look at things...
      </p>
END;
  }
  
}

$strict_permalinks = new Strict_Permalinks();

?>
