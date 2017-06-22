<?php
/**
 * Disable Feeds
 *
 * @package    WP_CMS_Settings
 * @subpackage WP_CMS_Settings/Includes/Classes
 * @author     Jason Witt <contact@jawittdesigns.com>
 * @copyright  Copyright (c) 2017, Jason Witt
 * @license    GNU General Public License v2 or later
 * @version    0.0.1
 */

namespace WP_CMS_Settings\Includes\Classes;

use \WP_CMS_Settings as Root;

if ( ! class_exists( 'Disable_Feeds' ) ) {

	/**
	 * Name
	 *
	 * @author Jason Witt
	 * @since  0.0.1
	 */
	class Disable_Feeds {

		/**
		 * Settings.
		 *
		 * @author Jason Witt
		 * @since  0.0.1
		 *
		 * @var array
		 */
		protected $settings;

		/**
		 * Initialize the class
		 *
		 * @author Jason Witt
		 * @since  0.0.1
		 *
		 * @return void
		 */
		public function __construct() {
			// Set the properties.
			$this->settings = Root\wp_cms_settings()->get_settings;
			$this->init();
		}

		/**
		 * Init
		 *
		 * @author Jason Witt
		 * @since  0.0.1
		 *
		 * @return void
		 */
		public function init() {
			$option = ( isset( $this->settings['disable_feeds'] ) ) ? $this->settings['disable_feeds'] : '';
			if ( isset( $option ) && $option ) {
				add_action( 'init', array( $this, 'disable_feeds' ) );
			}
		}

		/**
		 * Disable Blog Feed Links.
		 *
		 * @author Jason Witt
		 * @since  0.0.1
		 *
		 * @return void
		 */
		public function disable_feeds() {
			remove_action( 'wp_head', 'feed_links', 2 );
			remove_action( 'wp_head', 'feed_links_extra', 3 );
			add_action( 'do_feed', array( $this, 'disable_feed_page' ),1 );
			add_action( 'do_feed_rdf', array( $this, 'disable_feed_page' ),1 );
			add_action( 'do_feed_rss', array( $this, 'disable_feed_page' ),1 );
			add_action( 'do_feed_rss2', array( $this, 'disable_feed_page' ),1 );
			add_action( 'do_feed_atom', array( $this, 'disable_feed_page' ),1 );
			add_action( 'do_feed_rss2_comments', array( $this, 'disable_feed_page' ),1 );
			add_action( 'do_feed_atom_comments', array( $this, 'disable_feed_page' ),1 );
		}

		/**
		 * Disable Feeds.
		 *
		 * @author Jason Witt
		 * @since  0.0.1
		 *
		 * @return void
		 */
		public function disable_feed_page() {
			wp_die( esc_html( __( 'Feed not available.', 'wp-cms-settings' ) ) );
		}
	}
}