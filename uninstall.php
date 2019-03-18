<?php
/**
 * @package lucasMarch15
 */

if (!defined('WP_UNINSTALL_PLUGIN')){
	die;
}

// clear db stored data: only posts 
/*** $books = get_posts( array('post_type'=>'book','numberposts'=>-1));
foreach($books as $book){
	wp_delete_post($book->ID,true);
}
***/

// other delete method. Access the database via sql
global $wpdb;
$wpdb->query("DELETE FROM wp_post WHERE post_type = 'book'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN(SELECT id FROM wp_post)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN(SELECT id FROM wp_post)");