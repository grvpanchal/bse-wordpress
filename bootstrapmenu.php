<?php
function display_navbar_position()
{
    ?>
  <select name="navbar_position" id="navbar_position">
    <option value="static" <?php echo (get_option( 'navbar_position')=='static' ? 'selected' : ''); ?>>Static</option>
    <option value="fixed" <?php echo (get_option( 'navbar_position')=='fixed' ? 'selected' : ''); ?>>Fixed</option>
  </select>
  <?php
}

function display_navbar_align()
{
    ?>
    <select type="text" name="navbar_align" id="navbar_align">
      <option value="right" <?php echo (get_option( 'navbar_align')=='right' ? 'selected' : ''); ?>>Right</option>
      <option value="left" <?php echo (get_option( 'navbar_align')=='left' ? 'selected' : ''); ?>>Left</option>
    </select>
    <?php
}

function display_navbar_bgcolor()
{
    ?>
    <select type="text" name="navbar_align" id="navbar_align">
      <option value="right" <?php echo (get_option( 'navbar_align')=='right' ? 'selected' : ''); ?>>Right</option>
      <option value="left" <?php echo (get_option( 'navbar_align')=='left' ? 'selected' : ''); ?>>Left</option>
    </select>
    <?php
}

function display_fields()
{
    add_settings_section("section", "Navbar Options", null, "theme-options");
    
    add_settings_field("navbar_position", "Navbar Position: ", "display_navbar_position", "theme-options", "section");
    add_settings_field("navbar_align", "Navbar Align: ", "display_navbar_align", "theme-options", "section");
    
    register_setting("section", "navbar_position");
    register_setting("section", "navbar_align");
}

add_action("admin_init", "display_fields");

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

add_action("admin_menu", "add_theme_menu_item");