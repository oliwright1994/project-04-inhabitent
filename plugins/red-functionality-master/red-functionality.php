<?php
/**
 *
 * @package   [SITE NAME] Functionality
 * @author    Your Name <your_email@email.com>
 * @license   GPL-2.0+
 * @copyright 2015 Your Name or Company
 *
 * @wordpress-plugin
 * Plugin Name: [SITE NAME] Functionality
 * Description: This very important plugin contains all of the core functionality for this website so that it remains theme-independent.
 * Version:     1.0.0
 * Author:      Your Name
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Define plugin directory
 *
 * @since 1.0.0
 */
define('RF_DIR', dirname(__FILE__));

/**
 * General housekeeping and plugin activation tasks
 *
 * @since 1.0.0
 */
include_once(RF_DIR . '/lib/functions/general.php');
register_activation_hook(__FILE__, array('RF_General', 'plugin_activation'));

/**
 * Post types
 *
 * @since 1.0.0
 */
include_once(RF_DIR . '/lib/functions/post-types.php');

/**
 * Taxonomies
 *
 * @since 1.0.0
 */
include_once(RF_DIR . '/lib/functions/taxonomies.php');


// Register Custom Post Type
function inhabitent_register_cpt()
{

	$labels = array(
		'name'                  => _x('Products', 'Post Type General Name', 'inhabitent'),
		'singular_name'         => _x('Product', 'Post Type Singular Name', 'inhabitent'),
		'menu_name'             => __('Product', 'inhabitent'),
		'name_admin_bar'        => __('Product', 'inhabitent'),
		'archives'              => __('Item Archives', 'inhabitent'),
		'attributes'            => __('Item Attributes', 'inhabitent'),
		'parent_item_colon'     => __('Parent Product:', 'inhabitent'),
		'all_items'             => __('All Products', 'inhabitent'),
		'add_new_item'          => __('Add New Product', 'inhabitent'),
		'add_new'               => __('New Product', 'inhabitent'),
		'new_item'              => __('New Item', 'inhabitent'),
		'edit_item'             => __('Edit Product', 'inhabitent'),
		'update_item'           => __('Update Product', 'inhabitent'),
		'view_item'             => __('View Product', 'inhabitent'),
		'view_items'            => __('View Items', 'inhabitent'),
		'search_items'          => __('Search products', 'inhabitent'),
		'not_found'             => __('No products found', 'inhabitent'),
		'not_found_in_trash'    => __('No products found in Trash', 'inhabitent'),
		'featured_image'        => __('Featured Image', 'inhabitent'),
		'set_featured_image'    => __('Set featured image', 'inhabitent'),
		'remove_featured_image' => __('Remove featured image', 'inhabitent'),
		'use_featured_image'    => __('Use as featured image', 'inhabitent'),
		'insert_into_item'      => __('Insert into item', 'inhabitent'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'inhabitent'),
		'items_list'            => __('Items list', 'inhabitent'),
		'items_list_navigation' => __('Items list navigation', 'inhabitent'),
		'filter_items_list'     => __('Filter items list', 'inhabitent'),
	);
	$args = array(
		'label'                 => __('Product', 'inhabitent'),
		'description'           => __('Product information pages.', 'inhabitent'),
		'labels'                => $labels,
		'taxonomies'            => array('category', 'post_tag'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest' => true,
		'supports' => array('editor'),
		'template' => array(
			array('core/image', array(
				'align' => 'left',
			)),
			array('core/heading', array(
				'placeholder' => 'Add Author...',
			)),
			array('core/paragraph', array(
				'placeholder' => 'Add Description...',
			)),
		),
	);
	register_post_type('product', $args);
}
add_action('init', 'inhabitent_register_cpt', 0);



// Register Custom Taxonomy
function custom_taxonomy_product_types()
{

	$labels = array(
		'name'                       => _x('Product Types', 'Taxonomy General Name', 'inthabitent'),
		'singular_name'              => _x('Product Type', 'Taxonomy Singular Name', 'inthabitent'),
		'menu_name'                  => __('Product Type', 'inthabitent'),
		'all_items'                  => __('All Items', 'inthabitent'),
		'parent_item'                => __('Parent Item', 'inthabitent'),
		'parent_item_colon'          => __('Parent Item:', 'inthabitent'),
		'new_item_name'              => __('New Item Name', 'inthabitent'),
		'add_new_item'               => __('Add New Item', 'inthabitent'),
		'edit_item'                  => __('Edit Item', 'inthabitent'),
		'update_item'                => __('Update Item', 'inthabitent'),
		'view_item'                  => __('View Item', 'inthabitent'),
		'separate_items_with_commas' => __('Separate items with commas', 'inthabitent'),
		'add_or_remove_items'        => __('Add or remove items', 'inthabitent'),
		'choose_from_most_used'      => __('Choose from the most used', 'inthabitent'),
		'popular_items'              => __('Popular Items', 'inthabitent'),
		'search_items'               => __('Search Items', 'inthabitent'),
		'not_found'                  => __('Not Found', 'inthabitent'),
		'no_terms'                   => __('No items', 'inthabitent'),
		'items_list'                 => __('Items list', 'inthabitent'),
		'items_list_navigation'      => __('Items list navigation', 'inthabitent'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy('producttype', array('product'), $args);
}
add_action('init', 'custom_taxonomy_product_types', 0);
