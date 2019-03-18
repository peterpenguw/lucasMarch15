<?php
/**
 * @package lucasMarch15
 */
/*
Plugin Name: lucasMarch15
Plugin URI: http://www.lucascreatives.com
Description: this is a test plugin
Version: 1.0.0
Author: Peter Peng
Author URI: http://www.lucascreatives.com
License: GPLv2 or later
Text Domain: Peter Peng's plugin
 */

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

defined('ABSPATH') or die('Hey don\t back access this plugin please');


class lucasPlugin
{
	function __construct(){
		add_action('init',array($this,'custom_post_type'));
	}
	function activate(){
		//gereanted a cpt , using this method inside another method in oop
		$this->custom_post_type();
		// flush rewrite rules, using a global wp plugin
		
		flush_rewrite_rules();
		
	}
	function deactivate(){

	}
	//function uninstall(){

	//}

	function custom_post_type(){
		register_post_type('book',['public' => true, 'label'=> 'Books']);
	}

	function enqueue(){
		// enqueue all our scripts
		wp_enqueue_style( 'mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__) ); 
		
	}

}

if(class_exists('lucasPlugin')){
	$lucasPlugin = new lucasPlugin();
}
 
// activation
register_activation_hook( __FILE__, array( $lucasPlugin,'activate'));
 
// deactivate
register_deactivation_hook( __FILE__, array( $lucasPlugin,'deactivate'));

// uninstall
//register_uninstall_hook( __FILE__, array( $lucasPlugin,'uninstall'));




