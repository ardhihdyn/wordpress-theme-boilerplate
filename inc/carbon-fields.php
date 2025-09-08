<?php
/**
 * Carbon Fields
 *
 * @package Boilerplate_Theme
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'boilerplate_theme_carbon_fields' );
function boilerplate_theme_carbon_fields() {
	Container::make( 'theme_options', __( 'Theme Options', 'boilerplate-theme' ) )
		->add_fields( array(
			Field::make( 'text', 'crb_facebook_url', __( 'Facebook URL', 'boilerplate-theme' ) ),
			Field::make( 'text', 'crb_twitter_url', __( 'Twitter URL', 'boilerplate-theme' ) ),
			Field::make( 'text', 'crb_linkedin_url', __( 'LinkedIn URL', 'boilerplate-theme' ) ),
		) );
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( get_template_directory() . '/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}
