<?php
function display_style_option()
{
    ?>
    
    <select name="style_option" id="style_option">
      <option value="default" <?php echo esc_attr(get_option( 'style_option')=='default' ? 'selected' : ''); ?>>default</option>
      <option value="cerulean" <?php echo esc_attr(get_option( 'style_option')=='cerulean' ? 'selected' : ''); ?>>cerulean</option>
      <option value="cosmo" <?php echo esc_attr(get_option( 'style_option')=='cosmo' ? 'selected' : ''); ?>>cosmo</option>
      <option value="cyborg" <?php echo esc_attr(get_option( 'style_option')=='cyborg' ? 'selected' : ''); ?>>cyborg</option>
      <option value="darkly" <?php echo esc_attr(get_option( 'style_option')=='darkly' ? 'selected' : ''); ?>>darkly</option>
      <option value="flatly" <?php echo esc_attr(get_option( 'style_option')=='flatly' ? 'selected' : ''); ?>>flatly</option>
      <option value="green-apple" <?php echo esc_attr(get_option( 'style_option')=='green-apple' ? 'selected' : ''); ?>>green-apple</option>
      <option value="journal" <?php echo esc_attr(get_option( 'style_option')=='journal' ? 'selected' : ''); ?>>journal</option>
      <option value="lumen" <?php echo esc_attr(get_option( 'style_option')=='lumen' ? 'selected' : ''); ?>>lumen</option>
      <option value="newcity" <?php echo esc_attr(get_option( 'style_option')=='newcity' ? 'selected' : ''); ?>>newcity</option>
      <option value="paper" <?php echo esc_attr(get_option( 'style_option')=='paper' ? 'selected' : ''); ?>>paper</option>
      <option value="power" <?php echo esc_attr(get_option( 'style_option')=='power' ? 'selected' : ''); ?>>power</option>
      <option value="readable" <?php echo esc_attr(get_option( 'style_option')=='readable' ? 'selected' : ''); ?>>readable</option>
      <option value="sandstone" <?php echo esc_attr(get_option( 'style_option')=='sandstone' ? 'selected' : ''); ?>>sandstone</option>
      <option value="simplex" <?php echo esc_attr(get_option( 'style_option')=='simplex' ? 'selected' : ''); ?>>simplex</option>
      <option value="so-orange-inside" <?php echo esc_attr(get_option( 'style_option')=='so-orange-inside' ? 'selected' : ''); ?>>so-orange-inside</option>
      <option value="solar" <?php echo esc_attr(get_option( 'style_option')=='solar' ? 'selected' : ''); ?>>solar</option>
      <option value="spacelab" <?php echo esc_attr(get_option( 'style_option')=='spacelab' ? 'selected' : ''); ?>>spacelab</option>
      <option value="superhero" <?php echo esc_attr(get_option( 'style_option')=='superhero' ? 'selected' : ''); ?>>superhero</option>
      <option value="slate" <?php echo esc_attr(get_option( 'style_option')=='slate' ? 'selected' : ''); ?>>slate</option>
      <option value="stimulus" <?php echo esc_attr(get_option( 'style_option')=='stimulus' ? 'selected' : ''); ?>>stimulus</option>
      <option value="united" <?php echo esc_attr(get_option( 'style_option')=='united' ? 'selected' : ''); ?>>united</option>
      <option value="yeti" <?php echo esc_attr(get_option( 'style_option')=='yeti' ? 'selected' : ''); ?>>yeti</option>
    </select>
    The current theme is <?php echo esc_attr(get_option( 'style_option')); ?>
    <?php
}

function display_navbar_type()
{
    ?>
    <select type="text" name="navbar_type" id="navbar_type">
      <option value="default" <?php echo esc_attr(get_option( 'navbar_type')=='default' ? 'selected' : ''); ?>>default</option>
      <option value="inverse" <?php echo esc_attr(get_option( 'navbar_type')=='inverse' ? 'selected' : ''); ?>>inverse</option>
    </select>
    <?php
}

function display_navbar_position()
{
    ?>
  <select name="navbar_position" id="navbar_position">
    <option value="static" <?php echo esc_attr(get_option( 'navbar_position')=='static' ? 'selected' : ''); ?>>Static</option>
    <option value="fixed" <?php echo esc_attr(get_option( 'navbar_position')=='fixed' ? 'selected' : ''); ?>>Fixed</option>
  </select>
  <?php
}

function display_navbar_align()
{
    ?>
    <select type="text" name="navbar_align" id="navbar_align">
      <option value="right" <?php echo esc_attr(get_option( 'navbar_align')=='right' ? 'selected' : ''); ?>>Right</option>
      <option value="left" <?php echo esc_attr(get_option( 'navbar_align')=='left' ? 'selected' : ''); ?>>Left</option>
    </select>
    <?php
}

function display_footer_type()
{
    ?>
    <select type="text" name="footer_type" id="footer_type">
      <option value="navbar-default" <?php echo esc_attr(get_option( 'footer_type')=='navbar-default' ? 'selected' : ''); ?>>Default</option>
      <option value="navbar-inverse" <?php echo esc_attr(get_option( 'footer_type')=='navbar-inverse' ? 'selected' : ''); ?>>Inverse</option>
      <option value="bg-primary" <?php echo esc_attr(get_option( 'footer_type')=='bg-primary' ? 'selected' : ''); ?>>Primary</option>
    </select>
    <?php
}

function display_blog_panel()
{
    ?>
    <input type="checkbox" value="1" name="blog_panel" id="blog_panel" <?php echo esc_attr(get_option( 'blog_panel')=='1' ? 'checked' : ''); ?>/>
    <?php
}

function style_fields()
{
    add_settings_section("section0", "Theme Options", null, "theme-options");
    
    add_settings_field("style_option", "Select Theme: ", "display_style_option", "theme-options", "section0");
    
    register_setting("section", "style_option");
}

function navbar_fields()
{
    add_settings_section("section1", "Navbar Options", null, "theme-options");
    
    add_settings_field("navbar_type", "Navbar Type: ", "display_navbar_type", "theme-options", "section1");
    add_settings_field("navbar_position", "Navbar Position: ", "display_navbar_position", "theme-options", "section1");
    add_settings_field("navbar_align", "Navbar Align: ", "display_navbar_align", "theme-options", "section1");
    
    register_setting("section", "navbar_type");
    register_setting("section", "navbar_position");
    register_setting("section", "navbar_align");
}

function footer_fields()
{
    add_settings_section("section2", "Footer Options", null, "theme-options");
    
    add_settings_field("footer_type", "Footer Type: ", "display_footer_type", "theme-options", "section2");
    
    register_setting("section", "footer_type");
}

function blog_fields()
{
    add_settings_section("section3", "Blog Options", null, "theme-options");
    
    add_settings_field("blog_panel", "Blog in Panels / Cards: ", "display_blog_panel", "theme-options", "section3");
    
    register_setting("section", "blog_panel");
}
add_action("admin_init", "style_fields");
add_action("admin_init", "navbar_fields");
add_action("admin_init", "footer_fields");
add_action("admin_init", "blog_fields");


function theme_settings_page()
{
    ?>
      <div class="wrap">
        <h1>Bootstrap Options</h1>
        <form method="post" action="options.php">
          <?php
    settings_fields("section");
    do_settings_sections("theme-options");
    submit_button();
    ?>
        </form>
      </div>
      <?php
}

function add_theme_menu_item()
{
    add_theme_page("Bootstrap Options", "Bootstrap Options", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

// add_action('customize_register', "add_theme_menu_item");


function evp_customize_register( $wp_customize )
{
    $wp_customize->add_section( 'parsmizban_options', 
    array(
        'title'       => __( 'Bootstrap Options', 'parsmizban' ), //Visible title of section
        'priority'    => 20, //Determines what order this appears in
        'capability'  => 'edit_theme_options', //Capability needed to tweak
        'description' => __('Allows you to customize settings for Theme.', 'parsmizban'), //Descriptive tooltip
    ) 
    );

    $wp_customize->add_setting( 'bootstrap_theme_name', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
    array(
        'default'    => 'default', //Default setting/value to save
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        //'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
    ) 
    );

    //3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize, //Pass the $wp_customize object (required)
        'parsmizban_theme_name', //Set a unique ID for the control
        array(
        'label'      => __( 'Select Theme Name', 'parsmizban' ), //Admin-visible name of the control
        'description' => __( 'Using this option you can change the theme colors' ),
        'settings'   => 'bootstrap_theme_name', //Which setting to load and manipulate (serialized is okay)
        'priority'   => 10, //Determines the order this control appears in for the specified section
        'section'    => 'parsmizban_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
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
}
   add_action( 'customize_register', 'evp_customize_register' );