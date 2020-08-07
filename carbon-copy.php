<?php
/* --------------------------------------------------
Plugin Name: Carbon Copy
Plugin URI: https://endurtech.com/carbon-copy-wordpress-plugin/
Description: Copy your pages, posts and more quickly and conveniently.
Author: Manny Rodrigues
Author URI: https://endurtech.com/
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Requires at least: 5.0
Tested up to: 5.5
Version: 1.0.0

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

-------------------------------------------------- */

if( ! defined( 'ABSPATH' ) )
{
  exit(); // No direct access
}

define( 'CARBON_COPY_CURRENT_VERSION', '1.0.0' );

add_filter( "plugin_action_links_".plugin_basename(__FILE__), "carbon_copy_plugin_actions", 10, 4 );

function carbon_copy_plugin_actions( $actions, $plugin_file, $plugin_data, $context )
{
	array_unshift( $actions,
		sprintf( '<a href="%s" aria-label="%s">%s</a>',
			menu_page_url( 'carboncopy', false ),
			esc_attr__( 'Settings for Carbon Copy', 'carbon-copy' ),
			esc_html__( "Settings", 'default' )
		)
	);
	return $actions;
}

require_once( dirname(__FILE__).'/carbon-copy-common.php' );

if( is_admin() )
{
	require_once( dirname(__FILE__).'/carbon-copy-admin.php' );
}