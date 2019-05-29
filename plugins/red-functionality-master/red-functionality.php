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
function inhabitent_register_cpt_product()
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
		'show_in_rest' 					=> true,
		'supports'              => array('title', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats'),
	);
	register_post_type('product', $args);
}
add_action('init', 'inhabitent_register_cpt_product', 0);

function inhabitent_register_cpt_adventure()
{

	$labels = array(
		'name'                  => _x('Adventures', 'Post Type General Name', 'inhabitent'),
		'singular_name'         => _x('Adventure', 'Post Type Singular Name', 'inhabitent'),
		'menu_name'             => __('Adventure', 'inhabitent'),
		'name_admin_bar'        => __('Adventure', 'inhabitent'),
		'archives'              => __('Item Archives', 'inhabitent'),
		'attributes'            => __('Item Attributes', 'inhabitent'),
		'parent_item_colon'     => __('Parent Adventure:', 'inhabitent'),
		'all_items'             => __('All Adventures', 'inhabitent'),
		'add_new_item'          => __('Add New Adventure', 'inhabitent'),
		'add_new'               => __('New Adventure', 'inhabitent'),
		'new_item'              => __('New Item', 'inhabitent'),
		'edit_item'             => __('Edit Adventure', 'inhabitent'),
		'update_item'           => __('Update Adventure', 'inhabitent'),
		'view_item'             => __('View Adventure', 'inhabitent'),
		'view_items'            => __('View Items', 'inhabitent'),
		'search_items'          => __('Search Adventures', 'inhabitent'),
		'not_found'             => __('No Adventures found', 'inhabitent'),
		'not_found_in_trash'    => __('No Adventures found in Trash', 'inhabitent'),
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
		'label'                 => __('Adventure', 'inhabitent'),
		'description'           => __('Adventure information pages.', 'inhabitent'),
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
		'show_in_rest' 					=> true,
		'supports'              => array('title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats'),
	);
	register_post_type('adventure', $args);
}
add_action('init', 'inhabitent_register_cpt_adventure', 0);

// Add custom post type to searh
function search_filter($query)
{
	if (!is_admin() && $query->is_main_query()) {
		if ($query->is_search) {
			$query->set('post_type', array('post', 'product', 'adventure'));
		}
	}
}
add_action('pre_get_posts', 'search_filter');



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

/*
Plugin Name: Business Hours
Plugin URI: http://wordpress.org/extend/plugins/#
Description: This is an test plugin
Author: Inhabitent
Version: 1.0
Author URI: http://example.com/
*/

class Business_Hours extends WP_Widget
{

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$widget_ops = array(
			'classname' => 'business_hours_widget',
			'description' => 'Customize business hours',
		);
		parent::__construct('business_hours', 'Business Hours', $widget_ops);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget($args, $instance)
	{
		echo $args['before_widget'];

		echo '<h1 class="business-hours-widget-title">Business Hours </h1>';
		echo '<p><span class="bold">Monday-Friday:</span> ' . $instance['mon-fri'] . '</p>';
		echo '<p><span class="bold">Saturday: </span> ' . $instance['saturday'] . '</p>';
		echo '<p><span class="bold">Sunday: </span>' . $instance['sunday'] . '</p>';

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form($instance)
	{
		$mon_fri = !empty($instance['mon-fri']) ? $instance['mon-fri'] : esc_html__('am to pm', 'text_domain');
		?>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('mon-fri')); ?>"><?php esc_attr_e('Monday-Friday:', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('mon-fri')); ?>" name="<?php echo esc_attr($this->get_field_name('mon-fri')); ?>" type="text" value="<?php echo esc_attr($mon_fri); ?>">
	</p>

	<?php
	$saturday = !empty($instance['saturday']) ? $instance['saturday'] : esc_html__('am to pm', 'text_domain');
	?>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('saturday')); ?>"><?php esc_attr_e('Saturday:', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('saturday')); ?>" name="<?php echo esc_attr($this->get_field_name('saturday')); ?>" type="text" value="<?php echo esc_attr($saturday); ?>">
	</p>

	<?php
	$sunday = !empty($instance['sunday']) ? $instance['sunday'] : esc_html__('am to pm', 'text_domain');
	?>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('sunday')); ?>"><?php esc_attr_e('Sunday:', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('sunday')); ?>" name="<?php echo esc_attr($this->get_field_name('sunday')); ?>" type="text" value="<?php echo esc_attr($sunday); ?>">
	</p>
<?php

}

/**
 * Sanitize widget form values as they are saved.
 *
 * @see WP_Widget::update()
 *
 * @param array $new_instance Values just sent to be saved.
 * @param array $old_instance Previously saved values from database.
 *
 * @return array Updated safe values to be saved.
 */
public function update($new_instance, $old_instance)
{
	$instance = array();

	$instance['mon-fri'] = (!empty($new_instance['mon-fri'])) ? sanitize_text_field($new_instance['mon-fri']) : '';

	$instance['saturday'] = (!empty($new_instance['saturday'])) ? sanitize_text_field($new_instance['saturday']) : '';

	$instance['sunday'] = (!empty($new_instance['sunday'])) ? sanitize_text_field($new_instance['sunday']) : '';
	return $instance;
}
}

add_action('widgets_init', function () {
	register_widget('Business_Hours');
});

/*
Plugin Name: Contact Info Footer
Plugin URI: http://wordpress.org/extend/plugins/#
Description: This is an test plugin
Author: Inhabitent
Version: 1.0
Author URI: http://example.com/
*/

class Contact_Info_Footer extends WP_Widget
{

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$widget_ops = array(
			'classname' => 'contact_info_widget_footer',
			'description' => 'Customize contact info',
		);
		parent::__construct('contact_info_footer', 'Contact Info Footer', $widget_ops);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget($args, $instance)
	{
		echo $args['before_widget'];

		echo '<h1 class="contact-info-widget-title">Contact Info </h1>';
		echo '<i class="fas fa-envelope"></i><a href="mailto:' . $instance['email'] . '">' . $instance['email'] . '</a>';
		echo '<br>';
		echo '<i class="fas fa-phone"></i><a href="tel:' . $instance['phone'] . '">' . $instance['phone'] . '</a>';
		echo '<p class="social-media-widget-icons">';
		echo '<a href="' . $instance['facebook'] . '"><i class="fab fa-facebook-square"></i></a>';
		echo '<a href="' . $instance['twitter'] . '"><i class="fab fa-twitter-square"></i></a>';
		echo '<a href="' . $instance['google_plus'] . '"><i class="fab fa-google-plus-square"></i></a>';
		echo '</p>';

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form($instance)
	{
		$email = !empty($instance['email']) ? $instance['email'] : esc_html__('email', 'text_domain');
		?>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_attr_e('Email:', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>">
	</p>

	<?php
	$phone = !empty($instance['phone']) ? $instance['phone'] : esc_html__('phone number', 'text_domain');
	?>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_attr_e('Phone Number:', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>">
	</p>

	<?php
	$facebook = !empty($instance['facebook']) ? $instance['facebook'] : esc_html__('facebook profile', 'text_domain');
	?>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php esc_attr_e('Facebook:', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">
	</p>
	<?php
	$twitter = !empty($instance['twitter']) ? $instance['twitter'] : esc_html__('twitter profile', 'text_domain');
	?>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php esc_attr_e('Twitter:', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($twitter); ?>">
	</p>
	<?php
	$google_plus = !empty($instance['google_plus']) ? $instance['google_plus'] : esc_html__('google plus lol', 'text_domain');
	?>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('google_plus')); ?>"><?php esc_attr_e('Google Plus :', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('google_plus')); ?>" name="<?php echo esc_attr($this->get_field_name('google_plus')); ?>" type="text" value="<?php echo esc_attr($google_plus); ?>">
	</p>
<?php

}

/**
 * Sanitize widget form values as they are saved.
 *
 * @see WP_Widget::update()
 *
 * @param array $new_instance Values just sent to be saved.
 * @param array $old_instance Previously saved values from database.
 *
 * @return array Updated safe values to be saved.
 */
public function update($new_instance, $old_instance)
{
	$instance = array();

	$instance['email'] = (!empty($new_instance['email'])) ? sanitize_text_field($new_instance['email']) : '';

	$instance['phone'] = (!empty($new_instance['phone'])) ? sanitize_text_field($new_instance['phone']) : '';

	$instance['facebook'] = (!empty($new_instance['facebook'])) ? sanitize_text_field($new_instance['facebook']) : '';

	$instance['twitter'] = (!empty($new_instance['twitter'])) ? sanitize_text_field($new_instance['twitter']) : '';

	$instance['google_plus'] = (!empty($new_instance['google_plus'])) ? sanitize_text_field($new_instance['google_plus']) : '';

	return $instance;
}
}

add_action('widgets_init', function () {
	register_widget('Contact_Info_Footer');
});

/*
Plugin Name: Contac Info Sidebar
Plugin URI: http://wordpress.org/extend/plugins/#
Description: This is an test plugin
Author: Inhabitent
Version: 1.0
Author URI: http://example.com/
*/

class Contact_Info_Sidebar extends WP_Widget
{

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$widget_ops = array(
			'classname' => 'contact_info_widget_sidebar',
			'description' => 'Customize contact info',
		);
		parent::__construct('contact_info', 'Contact Info Sidebar', $widget_ops);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget($args, $instance)
	{
		echo $args['before_widget'];

		echo '<h1 class="contact-info-widget-title">Contact Info </h1>';
		echo '<p><i class="fas fa-phone"></i><a href="tel:' . $instance['phone'] . '">' . $instance['phone'] . '</a></p>';
		echo '<p><i class="fas fa-envelope"></i><a href="mailto:' . $instance['email'] . '">' . $instance['email'] . '</a></p>';
		echo '<p><i class="fas fa-map-marker-alt"></i>' . $instance['adress'] . '</p>';


		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form($instance)
	{
		$email = !empty($instance['email']) ? $instance['email'] : esc_html__('email', 'text_domain');
		?>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_attr_e('Email:', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>">
	</p>

	<?php
	$phone = !empty($instance['phone']) ? $instance['phone'] : esc_html__('phone number', 'text_domain');
	?>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_attr_e('Phone Number:', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>">
	</p>

	<?php
	$adress = !empty($instance['adress']) ? $instance['adress'] : esc_html__('adress profile', 'text_domain');
	?>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('adress')); ?>"><?php esc_attr_e('Adress:', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('adress')); ?>" name="<?php echo esc_attr($this->get_field_name('adress')); ?>" type="text" value="<?php echo esc_attr($adress); ?>">
	</p>

<?php

}

/**
 * Sanitize widget form values as they are saved.
 *
 * @see WP_Widget::update()
 *
 * @param array $new_instance Values just sent to be saved.
 * @param array $old_instance Previously saved values from database.
 *
 * @return array Updated safe values to be saved.
 */
public function update($new_instance, $old_instance)
{
	$instance = array();

	$instance['email'] = (!empty($new_instance['email'])) ? sanitize_text_field($new_instance['email']) : '';

	$instance['phone'] = (!empty($new_instance['phone'])) ? sanitize_text_field($new_instance['phone']) : '';

	$instance['adress'] = (!empty($new_instance['adress'])) ? sanitize_text_field($new_instance['adress']) : '';

	return $instance;
}
}

add_action('widgets_init', function () {
	register_widget('Contact_Info_Sidebar');
});
