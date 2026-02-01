<?php
/**
 * ViroyInfra Theme Customizer
 *
 * @package ViroyInfra
 */

function viroyinfra_customize_register( $wp_customize ) {

    // Add Section: Contact Info
    $wp_customize->add_section( 'viroyinfra_contact_section', array(
        'title'    => __( 'Contact Information', 'viroyinfra' ),
        'priority' => 30,
    ) );

    // Setting: Phone
    $wp_customize->add_setting( 'viroyinfra_phone', array(
        'default'           => '(123) 456-7890',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'viroyinfra_phone', array(
        'label'    => __( 'Phone Number', 'viroyinfra' ),
        'section'  => 'viroyinfra_contact_section',
        'type'     => 'text',
    ) );

    // Setting: Email
    $wp_customize->add_setting( 'viroyinfra_email', array(
        'default'           => 'info@viroyinfra.com',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'viroyinfra_email', array(
        'label'    => __( 'Email Address', 'viroyinfra' ),
        'section'  => 'viroyinfra_contact_section',
        'type'     => 'email',
    ) );

    // Setting: Address
    $wp_customize->add_setting( 'viroyinfra_address', array(
        'default'           => '100 Real Estate Blvd, City, Country',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'viroyinfra_address', array(
        'label'    => __( 'Physical Address', 'viroyinfra' ),
        'section'  => 'viroyinfra_contact_section',
        'type'     => 'textarea',
    ) );

    // Add Section: Social Links
    $wp_customize->add_section( 'viroyinfra_social_section', array(
        'title'    => __( 'Social Media Links', 'viroyinfra' ),
        'priority' => 31,
    ) );

    $social_networks = array( 'facebook', 'twitter', 'instagram', 'linkedin' );
    foreach ( $social_networks as $network ) {
        $wp_customize->add_setting( 'viroyinfra_' . $network, array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'viroyinfra_' . $network, array(
            'label'    => ucfirst( $network ) . ' URL',
            'section'  => 'viroyinfra_social_section',
            'type'     => 'url',
        ) );
    }

    // Add Section: Footer
    $wp_customize->add_section( 'viroyinfra_footer_section', array(
        'title'    => __( 'Footer Settings', 'viroyinfra' ),
        'priority' => 32,
    ) );

    $wp_customize->add_setting( 'viroyinfra_footer_text', array(
        'default'           => 'Helping you find the perfect place to call home. Luxury properties, exceptional service.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'viroyinfra_footer_text', array(
        'label'    => __( 'Footer Description', 'viroyinfra' ),
        'section'  => 'viroyinfra_footer_section',
        'type'     => 'textarea',
    ) );

    $wp_customize->add_setting( 'viroyinfra_copyright', array(
        'default'           => 'Viroy Infra. All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'viroyinfra_copyright', array(
        'label'    => __( 'Copyright Text', 'viroyinfra' ),
        'section'  => 'viroyinfra_footer_section',
        'type'     => 'text',
    ) );

}
add_action( 'customize_register', 'viroyinfra_customize_register' );
