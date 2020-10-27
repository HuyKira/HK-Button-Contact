<?php
class HkButtonContactSettingsPage {
	private $options;
	public function __construct(){
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    public function add_plugin_page(){
        add_menu_page(
            'Trang tuỳ chỉnh', 
            'HK Contact', 
            'manage_options', 
            'hk-button-contact-page', 
            array( $this, 'create_hk_button_contact_page' ),
            'dashicons-phone',
            100
        );
    }

    public function create_hk_button_contact_page(){
        $this->options = get_option( 'blog-options' );
        ?>
        <div class="wrap">
            <h1>Tùy chỉnh nút liên hệ</h1>
            <form method="post" action="options.php" class="option-style">
            	<?php
	                settings_fields( 'my_option_group' );
	                do_settings_sections( 'my-setting-admin' );
	                submit_button();
	            ?>
            </form>
        </div>
        <style>
        	.option-style h2{display: none;}
        	table.form-table label {font-weight: 600;position: relative;top: -4px;margin-left: 15px;margin-right: 10px;}
        	.input-style_color {height: 30px;position: relative;top: 4px;}
            .input-style {width: 300px;}
        </style>
        <?php
    }

    public function page_init(){        
        register_setting(
            'my_option_group', // Option group
            'blog-options', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Thông tin chung', // Title
            array( $this, 'print_section_info' ), // Callback
            'my-setting-admin' // Page
        );  
        add_settings_field(
            'Zalo Button', 
            'Zalo Button', 
            array( $this, 'zalo_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        );
        add_settings_field(
            'Phone Button', 
            'Phone Button', 
            array( $this, 'phone_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        );
        add_settings_field(
            'Messages Button', 
            'Messages Button', 
            array( $this, 'messages_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        );
    }

    public function sanitize( $input ){
        $new_input = array();
        if( isset( $input['zalo'] ) ) $new_input['zalo'] = sanitize_text_field( $input['zalo'] );
        if( isset( $input['zalo_color'] ) ) $new_input['zalo_color'] = sanitize_text_field( $input['zalo_color'] );
        if( isset( $input['phone'] ) ) $new_input['phone'] = sanitize_text_field( $input['phone'] );
        if( isset( $input['phone_color'] ) ) $new_input['phone_color'] = sanitize_text_field( $input['phone_color'] );
        if( isset( $input['messages'] ) ) $new_input['messages'] = sanitize_text_field( $input['messages'] );
        if( isset( $input['messages_color'] ) ) $new_input['messages_color'] = sanitize_text_field( $input['messages_color'] );
        return $new_input;
    }

    public function zalo_callback(){
        printf(
            '<input class="input-style" type="text" id="zalo" name="blog-options[zalo]" value="%s" />',
            isset( $this->options['zalo'] ) ? esc_attr( $this->options['zalo']) : ''
        );
        printf(
            '<label for="zalo_color">Button Color: </label> <input class="input-style_color" type="color" id="zalo_color" name="blog-options[zalo_color]" value="%s" />',
            isset( $this->options['zalo_color'] ) ? esc_attr( $this->options['zalo_color']) : ''
        );
    }
    public function phone_callback(){
        printf(
            '<input class="input-style" type="text" id="phone" name="blog-options[phone]" value="%s" />',
            isset( $this->options['phone'] ) ? esc_attr( $this->options['phone']) : ''
        );
        printf(
            '<label for="phone_color">Button Color: </label> <input class="input-style_color" type="color" id="phone_color" name="blog-options[phone_color]" value="%s" />',
            isset( $this->options['phone_color'] ) ? esc_attr( $this->options['phone_color']) : ''
        );
    }
    public function messages_callback(){
        printf(
            '<input class="input-style" type="text" id="messages" name="blog-options[messages]" value="%s" />',
            isset( $this->options['messages'] ) ? esc_attr( $this->options['messages']) : ''
        );
        printf(
            '<label for="messages_color">Button Color: </label> <input class="input-style_color" type="color" id="messages_color" name="blog-options[messages_color]" value="%s" />',
            isset( $this->options['messages_color'] ) ? esc_attr( $this->options['messages_color']) : ''
        );
    }
}
if( is_admin() ) $hk_contact_button = new HkButtonContactSettingsPage();