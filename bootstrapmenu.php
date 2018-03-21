<?php

function bse_theme_customize_register( $wp_customize )
{
    $wp_customize->add_section( 'bootstrap-essentials_options', 
    array(
        'title'       => __( 'Bootstrap Options', 'bootstrap-essentials' ),
        'priority'    => 20,
        'capability'  => 'edit_theme_options',
        'description' => __('Allows you to change bootstrap theme.', 'bootstrap-essentials'),
    ) 
    );

    $wp_customize->add_setting( 'bootstrap_theme_name',
    array(
        'default'    => 'default',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        //'transport'  => 'postMessage',
    ) 
    );

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'bootstrap-essentials_theme_name',
        array(
        'label'      => __( 'Select Theme Name', 'bootstrap-essentials' ),
        'description' => __( 'Using this option you can change the theme colors.' ),
        'settings'   => 'bootstrap_theme_name', 
        'priority'   => 10,
        'section'    => 'bootstrap-essentials_options',
        'type'    => 'select',
        'choices' => array(
            'default' => 'Default',
            'cerulean' => 'Cerulean',
            'cosmo' => 'Cosmo',
            'cyborg' => 'Cyborg',
            'darkly' => 'Darkly',
            'flatly' => 'Flatly',
            'green-apple' => 'Green Apple',
            'journal' => 'Journal',
            'newcity' => 'New City',
            'paper' => 'Paper',
            'power' => 'Power',
            'readable' => 'Readable',
            'sandstone' => 'Sandstone',
            'simplex' => 'Simplex',
            'so-orange-inside' => 'So Orange Inside',
            'solar' => 'Solar',
            'spacelab' => 'Spacelab',
            'superhero' => 'Superhero',
            'slate' => 'Slate',
            'stimulus' => 'Stimulus',
            'united' => 'United',
            'yeti' => 'Yeti',
        )
    )
    ) );

    $wp_customize->add_setting( 'bootstrap_navbar_type',
    array(
        'default'    => 'default',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        //'transport'  => 'postMessage',
    ) 
    );

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'bootstrap-essentials_navbar_type',
        array(
        'label'      => __( 'Select Navbar Type', 'bootstrap-essentials' ),
        'description' => __( 'Using this option you can change navbar colors.' ),
        'settings'   => 'bootstrap_navbar_type', 
        'priority'   => 20,
        'section'    => 'bootstrap-essentials_options',
        'type'    => 'radio',
        'choices' => array(
            'default' => 'Default',
            'inverse' => 'Inverse',
        )
    )
    ) );

    $wp_customize->add_setting( 'bootstrap_navbar_align',
    array(
        'default'    => 'right',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        //'transport'  => 'postMessage',
    ) 
    );

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'bootstrap-essentials_navbar_align',
        array(
        'label'      => __( 'Select Navbar Alignment', 'bootstrap-essentials' ),
        'description' => __( 'Using this option you can change navbar alignment.' ),
        'settings'   => 'bootstrap_navbar_align', //Wh
        'priority'   => 30,
        'section'    => 'bootstrap-essentials_options',
        'type'    => 'radio',
        'choices' => array(
            'right' => 'Right',
            'left' => 'Left',
        )
    )
    ) );

    $wp_customize->add_setting( 'bootstrap_navbar_position',
    array(
        'default'    => 'static',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        //'transport'  => 'postMessage',
    ) 
    );

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'bootstrap-essentials_navbar_position',
        array(
        'label'      => __( 'Select Navbar Position', 'bootstrap-essentials' ),
        'description' => __( 'Using this option you can change navbar position.' ),
        'settings'   => 'bootstrap_navbar_position', 
        'priority'   => 40,
        'section'    => 'bootstrap-essentials_options',
        'type'    => 'radio',
        'choices' => array(
            'static' => 'Static',
            'fixed' => 'Fixed',
        )
    )
    ) );

    $wp_customize->add_setting( 'bootstrap_navbar_toggle',
    array(
        'default'    => 'slide',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        //'transport'  => 'postMessage',
    ) 
    );

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'bootstrap-essentials_navbar_toggle',
        array(
        'label'      => __( 'Select Navbar Toggle', 'bootstrap-essentials' ),
        'description' => __( 'Using this option you can change navbar toggle in mobile.' ),
        'settings'   => 'bootstrap_navbar_toggle', 
        'priority'   => 40,
        'section'    => 'bootstrap-essentials_options',
        'type'    => 'radio',
        'choices' => array(
            'slide' => 'Slide',
            'collapse' => 'Collapse',
        )
    )
    ) );

    $wp_customize->add_setting( 'bootstrap_footer_type',
    array(
        'default'    => 'navbar-default',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        //'transport'  => 'postMessage',
    ) 
    );

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'bootstrap-essentials_footer_type',
        array(
        'label'      => __( 'Select Footer Color', 'bootstrap-essentials' ),
        'description' => __( 'Using this option you can change footer colors.' ),
        'settings'   => 'bootstrap_footer_type', 
        'priority'   => 50,
        'section'    => 'bootstrap-essentials_options',
        'type'    => 'select',
        'choices' => array(
            'navbar-default' => 'Default',
            'navbar-inverse' => 'Inverse',
            'bg-primary' => 'Primary',
        )
    )
    ) );

    $wp_customize->add_setting( 'bootstrap_cards',
    array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        //'transport'  => 'postMessage',
    ) 
    );

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'bootstrap-essentials_cards',
        array(
        'label'      => __( 'Blog in Cards', 'bootstrap-essentials' ),
        'description' => __( 'Organise your blog within cards layout.' ),
        'settings'   => 'bootstrap_cards', 
        'priority'   => 15,
        'section'    => 'bootstrap-essentials_options',
        'type'    => 'checkbox',
    )
    ) );
}
   add_action( 'customize_register', 'bse_theme_customize_register' );