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
     * Real estate options
     *
     * @since    1.0.0
     * @access   public
     * @var      array    $options    Contains the plugin options
     */
    public $options;

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
        $this->options = get_option( 'inspiry_real_estate_option' );

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

        add_plugins_page(
            __( 'Inspiry Real Estate Settings', 'inspiry-real-estate'),
            __( 'Inspiry Real Estate', 'inspiry-real-estate'),
            'administrator',
            'inspiry_real_estate',
            array( $this, 'display_real_estate_settings')
        );

    }

    /**
     * Display real estate settings page
     * @since   1.0.0
     */
    public function display_real_estate_settings() {
        ?>
        <!-- Create a header in the default WordPress 'wrap' container -->
        <div class="wrap">

            <h2><?php _e( 'Inspiry Real Estate Settings', 'inspiry-real-estate' ); ?></h2>

            <!-- Make a call to the WordPress function for rendering errors when settings are saved. -->
            <?php settings_errors(); ?>

            <!-- Create the form that will be used to render our options -->
            <form method="post" action="options.php">
                <?php settings_fields( 'inspiry_real_estate_options_group' ); ?>
                <?php do_settings_sections( 'inspiry_real_estate_settings_page' ); ?>
                <?php submit_button(); ?>
            </form>

        </div><!-- /.wrap -->
        <?php
    }

    /**
     * Initialize real estate settings page
     */
    public function initialize_real_estate_options(){

        // create plugin options if not exist
        if( false == $this->options ) {
            add_option( 'inspiry_real_estate_option' );
        }

        /**
         * Section
         */
        add_settings_section(
            'inspiry_price_format_section',                                                 // ID used to identify this section and with which to register options
            __( 'Price Format', 'inspiry-real-estate'),                                     // Title to be displayed on the administration page
            array( $this, 'inspiry_price_format_settings_description'),                     // Callback used to render the description of the section
            'inspiry_real_estate_settings_page'                                                     // Page on which to add this section of options
        );

        add_settings_section(
            'inspiry_url_slugs_section',                                                 // ID used to identify this section and with which to register options
            __( 'URL Slugs', 'inspiry-real-estate'),                                     // Title to be displayed on the administration page
            array( $this, 'inspiry_url_slugs_settings_description'),                     // Callback used to render the description of the section
            'inspiry_real_estate_settings_page'                                                  // Page on which to add this section of options
        );

        /**
         * Price Format Fields
         */
        add_settings_field(
            'currency_sign',
            __( 'Currency Sign', 'inspiry-real-estate' ),
            array( $this, 'inspiry_text_option_field' ),
            'inspiry_real_estate_settings_page',
            'inspiry_price_format_section',
            array(
                'field_id'        => 'currency_sign',
                'field_option'    => 'inspiry_real_estate_option',
                'field_default'   => '$',
            )
        );

        add_settings_field(
            'currency_position',
            __( 'Currency Sign Position', 'inspiry-real-estate' ),
            array( $this, 'inspiry_select_option_field' ),
            'inspiry_real_estate_settings_page',
            'inspiry_price_format_section',
            array (
                'field_id'          => 'currency_position',
                'field_option'      => 'inspiry_real_estate_option',
                'field_default'     => 'before',
                'field_options'     => array(
                    'before'   => __( 'Before ($450,000)', 'inspiry-real-estate' ),
                    'after'    => __( 'After (450,000$)', 'inspiry-real-estate' ),
                )
            )
        );

        add_settings_field(
            'thousand_separator',
            __( 'Thousand Separator', 'inspiry-real-estate' ),
            array( $this, 'inspiry_text_option_field' ),
            'inspiry_real_estate_settings_page',
            'inspiry_price_format_section',
            array(
                'field_id'        => 'thousand_separator',
                'field_option'    => 'inspiry_real_estate_option',
                'field_default'   => ',',
            )
        );

        add_settings_field(
            'decimal_separator',
            __( 'Decimal Separator', 'inspiry-real-estate' ),
            array( $this, 'inspiry_text_option_field' ),
            'inspiry_real_estate_settings_page',
            'inspiry_price_format_section',
            array(
                'field_id'        => 'decimal_separator',
                'field_option'    => 'inspiry_real_estate_option',
                'field_default'   => '.',
            )
        );

        add_settings_field(
            'number_of_decimals',
            __( 'Number of Decimals', 'inspiry-real-estate' ),
            array( $this, 'inspiry_text_option_field' ),
            'inspiry_real_estate_settings_page',
            'inspiry_price_format_section',
            array(
                'field_id'        => 'number_of_decimals',
                'field_option'    => 'inspiry_real_estate_option',
                'field_default'   => '0',
            )
        );

        add_settings_field(
            'empty_price_text',
            __( 'Empty Price Text', 'inspiry-real-estate' ),
            array( $this, 'inspiry_text_option_field' ),
            'inspiry_real_estate_settings_page',
            'inspiry_price_format_section',
            array(
                'field_id'          => 'empty_price_text',
                'field_option'      => 'inspiry_real_estate_option',
                'field_default'     => __( 'Price on call', 'inspiry-real-estate' ),
                'field_description' => __( 'Text to display in case of empty price. Example: Price on call', 'inspiry-real-estate' ),
            )
        );

        /*
         * URL Slugs Fields
         */
        add_settings_field(
            'property_url_slug',
            __( 'Property', 'inspiry-real-estate' ),
            array( $this, 'inspiry_text_option_field' ),
            'inspiry_real_estate_settings_page',
            'inspiry_url_slugs_section',
            array(
                'field_id'          => 'property_url_slug',
                'field_option'      => 'inspiry_real_estate_option',
                'field_default'     => __( 'property', 'inspiry-real-estate' ),
                'field_description' => __( 'Default: property', 'inspiry-real-estate' ),
            )
        );

        add_settings_field(
            'property_type_url_slug',
            __( 'Property Type', 'inspiry-real-estate' ),
            array( $this, 'inspiry_text_option_field' ),
            'inspiry_real_estate_settings_page',
            'inspiry_url_slugs_section',
            array(
                'field_id'          => 'property_type_url_slug',
                'field_option'      => 'inspiry_real_estate_option',
                'field_default'     => __( 'property-type', 'inspiry-real-estate' ),
                'field_description' => __( 'Default: property-type', 'inspiry-real-estate' ),
            )
        );

        add_settings_field(
            'property_status_url_slug',
            __( 'Property Status', 'inspiry-real-estate' ),
            array( $this, 'inspiry_text_option_field' ),
            'inspiry_real_estate_settings_page',
            'inspiry_url_slugs_section',
            array(
                'field_id'          => 'property_status_url_slug',
                'field_option'      => 'inspiry_real_estate_option',
                'field_default'     => __( 'property-status', 'inspiry-real-estate' ),
                'field_description' => __( 'Default: property-status', 'inspiry-real-estate' ),
            )
        );

        add_settings_field(
            'property_city_url_slug',
            __( 'Property City', 'inspiry-real-estate' ),
            array( $this, 'inspiry_text_option_field' ),
            'inspiry_real_estate_settings_page',
            'inspiry_url_slugs_section',
            array(
                'field_id'          => 'property_city_url_slug',
                'field_option'      => 'inspiry_real_estate_option',
                'field_default'     => __( 'property-city', 'inspiry-real-estate' ),
                'field_description' => __( 'Default: property-city', 'inspiry-real-estate' ),
            )
        );

        add_settings_field(
            'property_feature_url_slug',
            __( 'Property Feature', 'inspiry-real-estate' ),
            array( $this, 'inspiry_text_option_field' ),
            'inspiry_real_estate_settings_page',
            'inspiry_url_slugs_section',
            array(
                'field_id'          => 'property_feature_url_slug',
                'field_option'      => 'inspiry_real_estate_option',
                'field_default'     => __( 'property-feature', 'inspiry-real-estate' ),
                'field_description' => __( 'Default: property-feature', 'inspiry-real-estate' ),
            )
        );

        /**
         * Register Settings
         */
        register_setting( 'inspiry_real_estate_options_group', 'inspiry_real_estate_option' );

    }

    /**
     * Price format section description
     */
    public function inspiry_price_format_settings_description() {
        echo '<p>'. __( 'Using options provided below, You can modify price format to match your needs.', 'inspiry-real-estate' ) . '</p>';
    }

    /**
     * URL slugs section description
     */
    public function inspiry_url_slugs_settings_description() {
        echo '<p>'. __( 'You can modify URL slugs to match your needs. Just make sure to re-save permalinks settings after every change to avoid 404 errors. You can do that from Settings > Permalinks .', 'inspiry-real-estate' ) . '</p>';
    }


    /**
     * Reusable text option field for settings page
     *
     * @param $args array   field arguments
     */
    public function inspiry_text_option_field( $args ) {
        extract( $args );
        if( $field_id ) {
            $field_value = ( isset( $this->options[ $field_id ] ) ) ? $this->options[ $field_id ] : $field_default;
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
    public function inspiry_select_option_field( $args ) {
        extract( $args );
        if( $field_id ) {
            $existing_value = ( isset( $this->options[ $field_id ] ) ) ? $this->options[ $field_id ] : $field_default;
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
        $links[] = '<a href="'. get_admin_url( null, 'plugins.php?page=inspiry_real_estate' ) .'">' . __( 'Settings', 'inspiry-real-estate' ) . '</a>';
        return $links;
    }

}
