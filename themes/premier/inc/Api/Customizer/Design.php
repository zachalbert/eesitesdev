<?php
/**
 * Theme Customizer - Header
 *
 * @package awps
 */

namespace Awps\Api\Customizer;

use WP_Customize_Color_Control;
use Awps\Api\Customizer;

/**
 * Customizer class
 */
class Design
{
	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function register( $wp_customize )
	{
		$wp_customize->add_section( 'ft_design_section' , array(
			'title' => __( '<!> Design', 'awps' ),
			'description' => __( 'Customize the Site Design' ),
			'priority' => 10
		) );

		$wp_customize->add_setting( 'ft_site_background_color' , array(
			'default' => '#999999',
			'transport' => 'postMessage', // or refresh if you want the entire page to reload
		) );

		$wp_customize->add_setting( 'ft_header_text_color' , array(
			'default' => '#333333',
			'transport' => 'postMessage', // or refresh if you want the entire page to reload
		) );

		$wp_customize->add_setting( 'awps_header_link_color' , array(
			'default' => '#004888',
			'transport' => 'postMessage', // or refresh if you want the entire page to reload
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_site_background_color', array(
			'label' => __( 'Header Background Color', 'awps' ),
			'section' => 'ft_design_section',
			'settings' => 'ft_site_background_color',
		) ) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_header_text_color', array(
			'label' => __( 'Header Text Color', 'awps' ),
			'section' => 'ft_design_section',
			'settings' => 'ft_header_text_color',
		) ) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'awps_header_link_color', array(
			'label' => __( 'Header Link Color', 'awps' ),
			'section' => 'ft_design_section',
			'settings' => 'awps_header_link_color',
		) ) );

		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector' => '.site-title a',
				'render_callback' => function() {
					bloginfo( 'name' );
				},
			) );
			$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
				'selector' => '.site-description',
				'render_callback' => function() {
					bloginfo( 'description' );
				},
			) );
			$wp_customize->selective_refresh->add_partial( 'ft_site_background_color', array(
				'selector' => '#ft-site-background-color',
				'render_callback' => array( $this, 'outputCss' ),
				'fallback_refresh' => true
			) );
			$wp_customize->selective_refresh->add_partial( 'ft_header_text_color', array(
				'selector' => '#awps-header-control',
				'render_callback' => array( $this, 'outputCss' ),
				'fallback_refresh' => true
			) );
			$wp_customize->selective_refresh->add_partial( 'awps_header_link_color', array(
				'selector' => '#awps-header-control',
				'render_callback' => array( $this, 'outputCss' ),
				'fallback_refresh' => true
			) );
		}
	}

	/**
	 * Generate inline CSS for customizer async reload
	 */
	public function outputCss()
	{
		echo '<style type="text/css">';
			echo Customizer::css( 'body', 'background-color', 'ft_site_background_color' );
			echo Customizer::css( '.site-header', 'color', 'ft_header_text_color' );
			// echo Customizer::css( '.site-header a', 'color', 'awps_header_link_color' );
		echo '</style>';
	}
}
