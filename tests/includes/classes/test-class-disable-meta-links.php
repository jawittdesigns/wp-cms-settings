<?php
/**
 * Disable Meta Links.
 *
 * @package    WP_CMS_Settings
 * @subpackage WP_CMS_Settings\Tests\Includes\Classes
 * @author     Jason Witt <contact@jawittdesigns.com>
 * @copyright  Copyright (c) 2017, Jason Witt
 * @license    GNU General Public License v2 or later
 * @version    0.0.1
 */

 /**
  * Disable Meta Links.
  *
  * @author Jason Witt
  * @since  1.0.0
  */
 class Disable_Meta_Links_Test extends Base_UnitTestCase {

	 /**
	  * Options.
	  *
	  * @author Jason Witt
	  * @since  0.0.1
	  *
	  * @var array
	  */
	 protected $options;

	 /**
	  * SetUp.
	  *
	  * @author Jason Witt
	  * @since  0.0.1
	  *
	  * @return void
	  */
	 public function setUp() {
		 $this->file            = $this->dirname() . 'includes/classes/class-disable-meta-links.php';
		 $this->class_name      = 'WP_CMS_Settings\\Includes\\Classes\\Disable_Meta_Links';
		 $this->class           = new WP_CMS_Settings\Includes\Classes\Disable_Meta_Links();
		 $this->methods         = array(
			 'init',
			 'disable_wlwmanifest',
			 'disable_wp_generator',
			 'disable_wp_shortlink',
		 );
		 $this->properties      = array(
			 'settings',
		 );
		 $this->option_settings = array(
			 array(
				 'name' => 'disable_wlwmanifest',
			 ),
			 array(
				 'name' => 'disable_wp_generator',
			 ),
			 array(
				 'name' => 'disable_wp_shortlink',
			 ),
		 );
		 $this->set_the_options();
	 }

	 /**
	  * Test Init.
	  *
	  * @author Jason Witt
	  * @since  0.0.1
	  *
	  * @return void
	  */
	 public function test_init() {
		 $this->class->init();
		 $hooks = array(
			 array(
				 'hook_name' => 'init',
				 'type'      => 'add_action',
				 'method'    => 'disable_wlwmanifest',
			 ),
			 array(
				 'hook_name' => 'init',
				 'type'      => 'add_action',
				 'method'    => 'disable_wp_generator',
			 ),
			 array(
				 'hook_name' => 'init',
				 'type'      => 'add_action',
				 'method'    => 'disable_wp_shortlink',
			 ),
		 );
		 $this->assertAddHooks( $hooks );
	 }
 }
