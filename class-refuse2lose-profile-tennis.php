<?php

if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Refuse2Lose_Profile_Tennis' ) ) {
	/**
	 * Tennis Profile (default)
	 *
	 * @since  1.0.0
	 */
	class Refuse2Lose_Profile_Tennis {
		/**
		 * Construct
		 *
		 * @since  1.0.0
		 */
		function __construct( $chosen_profile ) {
			add_filter( 'refuse2lose_profiles', array( $this, 'add_profile' ) );

			if ( 'tennis' == $chosen_profile ) {
				add_filter( 'refuse2lose_fields', array( $this, 'refuse2lose_fields' ) );
			}
		}

		public function refuse2lose_fields( $fields ) {
			$template = $fields['_who_did_you_beat']; // Use this to get the attributes, santization, etc.

			$fields['_where_did_you_win'] = array_merge( $template, array(
				'name'            => __( 'Where', 'cmb2' ),
				'desc'            => __( 'Where, or what facility, did you win your match?', 'refuse2lose' ),
				'id'              => '_where_did_you_win',
				'type'            => 'text',
			) );

			$fields['_score'] = array_merge( $template, array(
				'name'            => __( 'Set Score', 'cmb2' ),
				'desc'            => __( 'What was your set score? Use format: 62, 75, 76', 'refuse2lose' ),
				'id'              => '_score',
				'type'            => 'text',
				'attributes'      => array(
					'placeholder' => '62, 75, 76',
					'required'    => 'required', // Required.
				),
			) );

			$fields['_singles_doubles'] = array_merge( $template, array(
				'name'            => __( 'Singles or Doubles?', 'cmb2' ),
				'desc'            => __( 'Did you play singles or doubles? Singles awards double points.', 'refuse2lose' ),
				'id'              => '_singles_doubles',
				'type'            => 'select',
				'options'         => array(
					'singles'       => __( 'Singles', 'refuse2lose' ),
					'doubles'       => __( 'Doubles', 'refuse2lose' ),
				),
			) );

			return $fields;
		}

		/**
		 * Adds the Tennis Profile to the settings page.
		 *
		 * @since 1.0.0
		 * @param array $profiles Current profile options.
		 */
		public function add_profile( $profiles ) {
			return array_merge( $profiles, array(
				'tennis' => __( 'Tennis', 'refuse2lose' ),
			) );
		}
	} // Refuse2Lose_Profile_Tennis
}