<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://themeforest.net/user/InspiryThemes
 * @since      1.0.0
 *
 * @package    Inspiry_Real_Estate
 * @subpackage Inspiry_Real_Estate/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Inspiry_Real_Estate
 * @subpackage Inspiry_Real_Estate/admin
 * @author     M Saqib Sarwar <saqib@inspirythemes.com>
 */
class Inspiry_Real_Estate_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

    /**
     * Price format options
     * @access   public
     * @var      array    $options    Contains price format options
     */
    public $price_format_options;

    /**
     * URL slugs options
     * @access   public
     * @var      array    $options    Contains URL slugs options
     */
    public $url_slugs_options;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
        $this->price_format_options =  get_option( 'inspiry_price_format_option' );
        $this->url_slugs_options = get_option( 'inspiry_url_slugs_option' );

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

        if ( $this::is_property_edit_page() || ( isset( $_GET['page'] ) && ( $_GET['page'] == 'inspiry_real_estate' ) ) ) {
            wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/inspiry-real-estate-admin.css', array(), $this->version, 'all');
        }

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

        if( $this::is_property_edit_page() ) {
            wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/inspiry-real-estate-admin.js', array('jquery', 'jquery-ui-sortable'), $this->version, false);
        }

    }

    /**
     * Check if it is a property edit page.
     * @return bool
     */
    public static function is_property_edit_page(){
        if ( is_admin() ) {
            global $pagenow;
            if ( in_array( $pagenow, array( 'post.php', 'post-new.php' ) ) ) {
                global $post_type;
                if ( 'property' == $post_type ) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Add plugin settings page
     * @since   1.0.0
     */
    public function add_real_estate_settings(){

        add_menu_page(
            __( 'Inspiry Real Estate Settings', 'inspiry-real-estate'),	// The value used to populate the browser's title bar when the menu page is active
            __( 'Real Estate', 'inspiry-real-estate'),					// The text of the menu in the administrator's sidebar
            'administrator',					                        // What roles are able to access the menu
            'inspiry_real_estate',				                        // The ID used to bind submenu items to this menu
            array( $this, 'display_real_estate_settings'),			    // The callback function used to render this menu
            'dashicons-admin-multisite',
            '25.786'
        );

        add_submenu_page(
            'inspiry_real_estate',				                    // The ID of the top-level menu page to which this submenu item belongs
            __( 'URL Slugs', 'inspiry-real-estate' ),			    // The value used to populate the browser's title bar when the menu page is active
            __( 'URL Slugs', 'inspiry-real-estate' ),			    // The label of this submenu item displayed in the menu
            'administrator',					                    // What roles are able to access this submenu item
            'inspiry_real_estate_url_slugs',	                    // The ID used to represent this submenu item
            array( $this, 'display_url_slugs_settings')		        // The callback function used to render the options for this submenu item
        );
    }

    /**
     * Wrapper function for price format settings
     */
    public function display_price_format_settings(){
        $this->display_real_estate_settings( 'price_format' );
    }

    /**
     * Wrapper function for url slugs settings
     */
    public function display_url_slugs_settings(){
        $this->display_real_estate_settings( 'url_slugs' );
    }

    /**
     * Display real estate settings page
     *
     * @param   string  $active_tab name of currently active tab
     */
    public function display_real_estate_settings(  $active_tab = ''  ) {
        ?>
        <!-- Create a header in the default WordPress 'wrap' container -->
        <div class="wrap">

            <h2><?php _e( 'Inspiry Real Estate Settings', 'inspiry-real-estate' ); ?></h2>

            <!-- Make a call to the WordPress function for rendering errors when settings are saved. -->
            <?php settings_errors(); ?>

            <?php
            if ( isset( $_GET[ 'tab' ] ) ) {
                $active_tab = $_GET[ 'tab' ];
            } else if( $active_tab == 'url_slugs' ) {
                $active_tab = 'url_slugs';
            } else {
                $active_tab = 'price_format';
            }
            ?>

            <h2 class="nav-tab-wrapper">
                <a href="?page=inspiry_real_estate&tab=price_format" class="nav-tab <?php echo $active_tab == 'price_format' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Price Format', 'inspiry-real-estate' ); ?></a>
                <a href="?page=inspiry_real_estate&tab=url_slugs" class="nav-tab <?php echo $active_tab == 'url_slugs' ? 'nav-tab-active' : ''; ?>"><?php _e( 'URL Slugs', 'inspiry-real-estate' ); ?></a>
            </h2>

            <!-- Create the form that will be used to render our options -->
            <form method="post" action="options.php">
                <?php

                if( $active_tab == 'url_slugs' ) {

                    settings_fields( 'inspiry_url_slugs_option_group' );
                    do_settings_sections( 'inspiry_url_slugs_page' );

                } else {

                    settings_fields( 'inspiry_price_format_option_group' );
                    do_settings_sections( 'inspiry_price_format_page' );

                }

                submit_button();

                ?>
            </form>

        </div><!-- /.wrap -->
        <?php
    }

    /**
     * Initialize real estate settings page
     */
    public function initialize_price_format_options(){

        // If the price format options do not exist then create them
        if( false == $this->price_format_options ) {
            add_option( 'inspiry_price_format_option', apply_filters( 'inspiry_price_format_default_options', array( $this, 'price_format_default_options' ) ) );
        }

        /**
         * Section
         */
        add_settings_section(
            'inspiry_price_format_section',                                                 // ID used to identify this section and with which to register options
            __( 'Price Format', 'inspiry-real-estate'),                                     // Title to be displayed on the administration page
            array( $this, 'price_format_settings_desc'),                     // Callback used to render the description of the section
            'inspiry_price_format_page'                                                     // Page on which to add this section of options
        );

        /**
         * Price Format Fields
         */
        add_settings_field(
            'currency_sign',
            __( 'Currency Sign', 'inspiry-real-estate' ),
            array( $this, 'text_option_field' ),
            'inspiry_price_format_page',
            'inspiry_price_format_section',
            array(
                'field_id'        => 'currency_sign',
                'field_option'    => 'inspiry_price_format_option',
                'field_default'   => '$',
                'field_description' => __( 'Default: $', 'inspiry-real-estate' ),
            )
        );

        add_settings_field(
            'currency_position',
            __( 'Currency Sign Position', 'inspiry-real-estate' ),
            array( $this, 'select_option_field' ),
            'inspiry_price_format_page',
            'inspiry_price_format_section',
            array (
                'field_id'          => 'currency_position',
                'field_option'      => 'inspiry_price_format_option',
                'field_default'     => 'before',
                'field_options'     => array(
                    'before'   => __( 'Before ($450,000)', 'inspiry-real-estate' ),
                    'after'    => __( 'After (450,000$)', 'inspiry-real-estate' ),
                ),
                'field_description' => __( 'Default: Before', 'inspiry-real-estate' ),
            )
        );

        add_settings_field(
            'thousand_separator',
            __( 'Thousand Separator', 'inspiry-real-estate' ),
            array( $this, 'text_option_field' ),
            'inspiry_price_format_page',
            'inspiry_price_format_section',
            array(
                'field_id'        => 'thousand_separator',
                'field_option'    => 'inspiry_price_format_option',
                'field_default'   => ',',
                'field_description' => __( 'Default: ,', 'inspiry-real-estate' ),
            )
        );

        add_settings_field(
            'decimal_separator',
            __( 'Decimal Separator', 'inspiry-real-estate' ),
            array( $this, 'text_option_field' ),
            'inspiry_price_format_page',
            'inspiry_price_format_section',
            array(
                'field_id'        => 'decimal_separator',
                'field_option'    => 'inspiry_price_format_option',
                'field_default'   => '.',
                'field_description' => __( 'Default: .', 'inspiry-real-estate' ),
            )
        );

        add_settings_field(
            'number_of_decimals',
            __( 'Number of Decimals', 'inspiry-real-estate' ),
            array( $this, 'text_option_field' ),
            'inspiry_price_format_page',
            'inspiry_price_format_section',
            array(
                'field_id'        => 'number_of_decimals',
                'field_option'    => 'inspiry_price_format_option',
                'field_default'   => '0',
                'field_description' => __( 'Default: 0', 'inspiry-real-estate' ),
            )
        );

        add_settings_field(
            'empty_price_text',
            __( 'Empty Price Text', 'inspiry-real-estate' ),
            array( $this, 'text_option_field' ),
            'inspiry_price_format_page',
            'inspiry_price_format_section',
            array(
                'field_id'          => 'empty_price_text',
                'field_option'      => 'inspiry_price_format_option',
                'field_default'     => __( 'Price on call', 'inspiry-real-estate' ),
                'field_description' => __( 'Text to display in case of empty price. Example: Price on call', 'inspiry-real-estate' ),
            )
        );

        /**
         * Register Settings
         */
        register_setting( 'inspiry_price_format_option_group', 'inspiry_price_format_option' );

    }

    public function initialize_url_slugs_options(){

        // create plugin options if not exist
        if( false == $this->url_slugs_options ) {
            add_option( 'inspiry_url_slugs_option', apply_filters( 'inspiry_url_slugs_default_options', array( $this, 'url_slugs_default_options' ) ) );
        }

        /**
         * Section
         */
        add_settings_section(
            'inspiry_url_slugs_section',                                                 // ID used to identify this section and with which to register options
            __( 'URL Slugs', 'inspiry-real-estate'),                           // Title to be displayed on the administration page
            array( $this, 'url_slugs_settings_desc'),          // Callback used to render the description of the section
            'inspiry_url_slugs_page'                                          // Page on which to add this section of options
        );

        /*
         * URL Slugs Fields
         */
        add_settings_field(
            'property_url_slug',
            __( 'Property', 'inspiry-real-estate' ),
            array( $this, 'text_option_field' ),
            'inspiry_url_slugs_page',
            'inspiry_url_slugs_section',
            array(
                'field_id'          => 'property_url_slug',
                'field_option'      => 'inspiry_url_slugs_option',
                'field_default'     => __( 'property', 'inspiry-real-estate' ),
                'field_description' => __( 'Default: property', 'inspiry-real-estate' ),
            )
        );

        add_settings_field(
            'property_type_url_slug',
            __( 'Property Type', 'inspiry-real-estate' ),
            array( $this, 'text_option_field' ),
            'inspiry_url_slugs_page',
            'inspiry_url_slugs_section',
            array(
                'field_id'          => 'property_type_url_slug',
                'field_option'      => 'inspiry_url_slugs_option',
                'field_default'     => __( 'property-type', 'inspiry-real-estate' ),
                'field_description' => __( 'Default: property-type', 'inspiry-real-estate' ),
            )
        );

        add_settings_field(
            'property_status_url_slug',
            __( 'Property Status', 'inspiry-real-estate' ),
            array( $this, 'text_option_field' ),
            'inspiry_url_slugs_page',
            'inspiry_url_slugs_section',
            array(
                'field_id'          => 'property_status_url_slug',
                'field_option'      => 'inspiry_url_slugs_option',
                'field_default'     => __( 'property-status', 'inspiry-real-estate' ),
                'field_description' => __( 'Default: property-status', 'inspiry-real-estate' ),
            )
        );

        add_settings_field(
            'property_city_url_slug',
            __( 'Property City', 'inspiry-real-estate' ),
            array( $this, 'text_option_field' ),
            'inspiry_url_slugs_page',
            'inspiry_url_slugs_section',
            array(
                'field_id'          => 'property_city_url_slug',
                'field_option'      => 'inspiry_url_slugs_option',
                'field_default'     => __( 'property-city', 'inspiry-real-estate' ),
                'field_description' => __( 'Default: property-city', 'inspiry-real-estate' ),
            )
        );

        add_settings_field(
            'property_feature_url_slug',
            __( 'Property Feature', 'inspiry-real-estate' ),
            array( $this, 'text_option_field' ),
            'inspiry_url_slugs_page',
            'inspiry_url_slugs_section',
            array(
                'field_id'          => 'property_feature_url_slug',
                'field_option'      => 'inspiry_url_slugs_option',
                'field_default'     => __( 'property-feature', 'inspiry-real-estate' ),
                'field_description' => __( 'Default: property-feature', 'inspiry-real-estate' ),
            )
        );

        add_settings_field(
            'agent_url_slug',
            __( 'Agent', 'inspiry-real-estate' ),
            array( $this, 'text_option_field' ),
            'inspiry_url_slugs_page',
            'inspiry_url_slugs_section',
            array(
                'field_id'          => 'agent_url_slug',
                'field_option'      => 'inspiry_url_slugs_option',
                'field_default'     => __( 'agent', 'inspiry-real-estate' ),
                'field_description' => __( 'Default: agent', 'inspiry-real-estate' ),
            )
        );

        /**
         * Register Settings
         */
        register_setting( 'inspiry_url_slugs_option_group', 'inspiry_url_slugs_option' );

    }

    /**
     * Price format section description
     */
    public function price_format_settings_desc() {
        echo '<p>'. __( 'Using options provided below, You can modify price format to match your needs.', 'inspiry-real-estate' ) . '</p>';
    }

    /**
     * URL slugs section description
     */
    public function url_slugs_settings_desc() {
        echo '<p>'. __( 'You can modify URL slugs to match your needs.', 'inspiry-real-estate' ) . '</p>';
        echo '<p><strong>'. __( 'Just make sure to re-save permalinks settings after every change to avoid 404 errors. You can do that from Settings > Permalinks .', 'inspiry-real-estate' ) . '</strong></p>';
    }


    /**
     * Reusable text option field for settings page
     *
     * @param $args array   field arguments
     */
    public function text_option_field( $args ) {
        extract( $args );
        if( $field_id ) {

            // Default value or stored value based on option field
            if ( $field_option == 'inspiry_url_slugs_option' ) {
                $field_value = ( isset( $this->url_slugs_options[ $field_id ] ) ) ? $this->url_slugs_options[ $field_id ] : $field_default;
            } else {
                $field_value = ( isset( $this->price_format_options[ $field_id ] ) ) ? $this->price_format_options[ $field_id ] : $field_default;
            }

            echo '<input name="' . $field_option . '[' . $field_id . ']" class="inspiry-text-field '. $field_id .'" value="' . $field_value . '" />';
            if ( isset( $field_description ) ) {
                echo '<br/><label class="inspiry-field-description">' . $field_description . '</label>';
            }

        } else {
            _e( 'Field id is missing!', 'inspiry-real-estate' );
        }
    }


    /**
     * Reusable select options field for settings page
     *
     * @param $args array   field arguments
     */
    public function select_option_field( $args ) {
        extract( $args );
        if( $field_id ) {

            // Default value or stored value based on option field
            if ( $field_option == 'inspiry_url_slugs_option' ) {
                $existing_value = ( isset( $this->url_slugs_options[ $field_id ] ) ) ? $this->url_slugs_options[ $field_id ] : $field_default;
            } else {
                $existing_value = ( isset( $this->price_format_options[ $field_id ] ) ) ? $this->price_format_options[ $field_id ] : $field_default;
            }

            ?>
            <select name="<?php echo $field_option . '[' . $field_id . ']'; ?>" class="inspiry-select-field <?php echo $field_id; ?>">
                <?php foreach( $field_options as $key => $value ) { ?>
                    <option value="<?php echo $key; ?>" <?php selected( $existing_value, $key ); ?>><?php echo $value; ?></option>
                <?php } ?>
            </select>
            <?php
            if ( isset( $field_description ) ) {
                echo '<br/><label class="inspiry-field-description">' . $field_description . '</label>';
            }
        } else {
            _e( 'Field id is missing!', 'inspiry-real-estate' );
        }
    }

    /**
     * Add plugin action links
     *
     * @param $links
     * @return array
     */
    public function inspiry_real_estate_action_links( $links ) {
        $links[] = '<a href="'. get_admin_url( null, 'admin.php?page=inspiry_real_estate' ) .'">' . __( 'Settings', 'inspiry-real-estate' ) . '</a>';
        return $links;
    }


    /**
     * Provides default values for price format options
     */
    function price_format_default_options() {

        $defaults = array(
            'currency_sign'		    =>	'$',
            'currency_position'		=>	'before',
            'thousand_separator'	=>	',',
            'decimal_separator'	    =>	'.',
            'number_of_decimals'	=>	'0',
            'empty_price_text'	    =>	'Price on call',
        );

        return $defaults;

    }

    /**
     * Provides default values for url slugs options
     */
    function url_slugs_default_options() {

        $defaults = array(
            'property_url_slug'		        =>	'property',
            'property_type_url_slug'		=>	'property-type',
            'property_status_url_slug'		=>	'property-status',
            'property_city_url_slug'		=>	'property-city',
            'property_feature_url_slug'		=>	'property-feature',
            'agent_url_slug'		        =>	'agent',
        );

        return $defaults;

    }

}
