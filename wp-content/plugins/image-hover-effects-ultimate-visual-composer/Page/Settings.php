<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace OXI_FLIP_BOX_PLUGINS\Page;

/**
 * Description of Settings
 *
 * @author biplo
 */
class Settings {

    use \OXI_FLIP_BOX_PLUGINS\Inc_Helper\CSS_JS_Loader;

    public $roles;
    public $saved_role;
    public $license;
    public $status;
    public $oxi_fixed_header;
    public $fontawesome;
    public $getfontawesome = [];

    /**
     * Constructor of Oxilab tabs Home Page
     *
     * @since 2.0.0
     */
    public function __construct() {
        $this->admin();
        $this->Render();
    }

    public function admin() {
        global $wp_roles;
        $this->roles = $wp_roles->get_names();
        $this->saved_role = get_option('oxi_addons_user_permission');
        $this->license = get_option('oxilab_flip_box_license_key');
        $this->status = get_option('oxilab_flip_box_license_status');
        $this->admin_ajax_load();
    }

    /**
     * Admin Notice JS file loader
     * @return void
     */
    public function admin_ajax_load() {
        $this->admin_css_loader();
        wp_enqueue_script('oxi-flip-settings', OXI_FLIP_BOX_URL . '/asset/backend/js/settings.js', false, OXI_FLIP_BOX_PLUGIN_VERSION);
        wp_localize_script('oxi-flip-settings', 'oxi_flip_box_settings', array('ajaxurl' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('oxi-flip-box-editor')));
    }

    public function Render() {
        ?>
        <div class="wrap">
            <?php
            apply_filters('oxi-flip-box-plugin/admin_menu', TRUE);
            ?>
            <div class="oxi-addons-row oxi-addons-admin-settings">
                <h2>General</h2>
                <p>Settings for Flipbox - Image Overlay.</p>
                <form method="post">
                    <table class="form-table" role="presentation">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <label for="oxi_addons_user_permission">Who Can Edit?</label>
                                </th>
                                <td>
                                    <fieldset>
                                        <select name="oxi_addons_user_permission" id="oxi_addons_user_permission">
                                            <?php foreach ($this->roles as $key => $role) { ?>
                                                <option value="<?php echo esc_attr($key); ?>" <?php selected($this->saved_role, $key); ?>>
                                                    <?php echo esc_html($role); ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="oxi-addons-settings-connfirmation oxi_addons_user_permission"></span>
                                        <br>
                                        <p class="description">Select the Role who can manage This Plugins. <a
                                                target="_blank"
                                                href="https://codex.wordpress.org/Roles_and_Capabilities#Capability_vs._Role_Table">Help</a>
                                        </p>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="oxi_addons_font_awesome">Font Awesome Support</label>
                                </th>
                                <td>
                                    <fieldset>
                                        <label for="oxi_addons_font_awesome[]">
                                            <input type="radio" class="radio" id="oxi_addons_font_awesome[yes]"
                                                   name="oxi_addons_font_awesome" value=""
                                                   <?php checked('', get_option('oxi_addons_font_awesome'), true); ?>>Yes</label>
                                        <label for="oxi_addons_font_awesome[no]">
                                            <input type="radio" class="radio" id="oxi_addons_font_awesome[no]"
                                                   name="oxi_addons_font_awesome" value="no"
                                                   <?php checked('no', get_option('oxi_addons_font_awesome'), true); ?>>No
                                        </label>
                                        <span class="oxi-addons-settings-connfirmation oxi_addons_font_awesome"></span>
                                        <br>
                                        <p class="description">Load Font Awesome CSS at shortcode loading, If your theme already
                                            loaded select No for faster loading</p>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="oxi_addons_google_font">Google Font Support</label>
                                </th>
                                <td>
                                    <fieldset>
                                        <label for="oxi_addons_google_font[yes]">
                                            <input type="radio" class="radio" id="oxi_addons_google_font[yes]" name="oxi_addons_google_font" value="" <?php checked('', get_option('oxi_addons_google_font'), true); ?>>Yes</label>
                                        <label for="oxi_addons_google_font[no]">
                                            <input type="radio" class="radio" id="oxi_addons_google_font[no]" name="oxi_addons_google_font" value="no"  <?php checked('no', get_option('oxi_addons_google_font'), true); ?>>No
                                        </label>
                                        <span class="oxi-addons-settings-connfirmation oxi_addons_google_font"></span>
                                        <br>
                                        <p class="description">Load Google Font CSS at shortcode loading, If your theme already loaded select No for faster loading</p>
                                    </fieldset>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <label for="oxi_addons_pre_loader">PreLoader</label>
                                </th>
                                <td>
                                    <fieldset>
                                        <label for="oxi_addons_pre_loader[yes]">
                                            <input type="radio" class="radio" id="oxi_addons_pre_loader[yes]" name="oxi_addons_pre_loader" value="yes" <?php checked('yes', get_option('oxi_addons_pre_loader'), true); ?>>Yes</label>
                                        <label for="oxi_addons_pre_loader[no]">
                                            <input type="radio" class="radio" id="oxi_addons_pre_loader[no]" name="oxi_addons_pre_loader" value=""  <?php checked('', get_option('oxi_addons_pre_loader'), true); ?>>No
                                        </label>
                                        <span class="oxi-addons-settings-connfirmation oxi_addons_pre_loader"></span>
                                        <br>
                                        <p class="description">Add Preloader into Flipbox content, Flipbox will show after load all image or content perfectly</p>
                                    </fieldset>
                                </td>
                            </tr>




                        </tbody>
                    </table>
                    <br>
                    <br>
                    <h2>License Activation</h2>
                    <p>Activate your copy to get direct plugin updates and official support.</p>
                    <table class="form-table" role="presentation">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <label for="oxilab_flip_box_license_key">License Key</label>
                                </th>
                                <td class="valid">
                                    <input type="text" class="regular-text" id="oxilab_flip_box_license_key"
                                           name="oxilab_flip_box_license_key" value="<?php echo ($this->status == 'valid' && empty($this->license)) ? '****************************************' : esc_html($this->license); ?>">
                                    <span class="oxi-addons-settings-connfirmation oxilab_flip_box_license_massage">
                                        <?php
                                        if ($this->status == 'valid' && empty($this->license)) :
                                            echo '<span class="oxi-confirmation-success"></span>';
                                        elseif ($this->status == 'valid' && !empty($this->license)) :
                                            echo '<span class="oxi-confirmation-success"></span>';
                                        elseif (!empty($this->license)) :
                                            echo '<span class="oxi-confirmation-failed"></span>';
                                        else :
                                            echo '<span class="oxi-confirmation-blank"></span>';
                                        endif;
                                        ?>
                                    </span>
                                    <span class="oxi-addons-settings-connfirmation oxilab_flip_box_license_text">
                                        <?php
                                        if ($this->status == 'valid' && empty($this->license)) :
                                            echo '<span class="oxi-addons-settings-massage">Pre Active</span>';
                                        elseif ($this->status == 'valid' && !empty($this->license)) :
                                            echo '<span class="oxi-addons-settings-massage">Active</span>';
                                        elseif (!empty($this->license)) :
                                            echo '<span class="oxi-addons-settings-massage">' . esc_html($this->status) . '</span>';
                                        else :
                                            echo '<span class="oxi-addons-settings-massage"></span>';
                                        endif;
                                        ?>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <?php
    }

}
