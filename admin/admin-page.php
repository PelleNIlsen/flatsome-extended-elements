<?php

class Admin_Page
{
    public function __construct() {
        add_action('admin_menu', array($this, 'initialize_menu'));
        add_action('admin_init', array($this, 'save_json_data'));
    }

    public function initialize_menu() {
        add_menu_page(
            'Flatsome Elements',
            'Flatsome Elements', 
            'manage_options',    
            'flatsome_elements', 
            array($this, 'flatsome_elements_admin_page')
        );

        add_submenu_page(
            'flatsome_elements',
            'FB Stories',
            'FB Stories',
            'manage_options',
            'flatsome_fb_stories',
            array($this, 'fb_stories_admin_page')
        );
    }

    public function flatsome_elements_admin_page() {
        echo '<h1>Hello, world!</h1>';
    }

    public function fb_stories_admin_page() {
        $current_json = $this->get_json_data();
        ?>
        <h1>Flatsome Elements JSON Data</h1>
        <form method="post">
            <textarea name="json_data" rows="10" cols="50"><?php echo esc_textarea($current_json); ?></textarea>
            <input type="submit" value="Save JSON" />
        </form>
        <?php
    }

    public function save_json_data() {
        if (!empty($_POST['json_data'])) {
            $json_data = stripslashes($_POST['json_data']);

            file_put_contents(FLATSOME_ELEMENTS_PATH . 'assets/js/data.json', $json_data);
    
            update_option('flatsome_elements_json_data', $json_data);
        }
    }

    public function get_json_data() {
        $file_path = FLATSOME_ELEMENTS_PATH . 'assets/js/data.json';
        if (file_exists($file_path)) {
            return file_get_contents($file_path);
        }
        return '';
    }
    
}

new Admin_Page();