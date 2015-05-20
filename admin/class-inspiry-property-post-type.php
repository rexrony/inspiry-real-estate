<?php
/**
 * Property custom post type class.
 *
 * Defines the property post type.
 *
 * @package    Inspiry_Real_Estate
 * @subpackage Inspiry_Real_Estate/admin
 * @author     M Saqib Sarwar <saqib@inspirythemes.com>
 */

class Inspiry_Property_Post_Type {

    /**
     * Register Property Post Type
     * @since 1.0.0
     */
    public function register_property_post_type() {

        $labels = array(
            'name'                => _x( 'Properties', 'Post Type General Name', 'inspiry-real-estate' ),
            'singular_name'       => _x( 'Property', 'Post Type Singular Name', 'inspiry-real-estate' ),
            'menu_name'           => __( 'Properties', 'inspiry-real-estate' ),
            'name_admin_bar'      => __( 'Property', 'inspiry-real-estate' ),
            'parent_item_colon'   => __( 'Parent Property:', 'inspiry-real-estate' ),
            'all_items'           => __( 'All Properties', 'inspiry-real-estate' ),
            'add_new_item'        => __( 'Add New Property', 'inspiry-real-estate' ),
            'add_new'             => __( 'Add New', 'inspiry-real-estate' ),
            'new_item'            => __( 'New Property', 'inspiry-real-estate' ),
            'edit_item'           => __( 'Edit Property', 'inspiry-real-estate' ),
            'update_item'         => __( 'Update Property', 'inspiry-real-estate' ),
            'view_item'           => __( 'View Property', 'inspiry-real-estate' ),
            'search_items'        => __( 'Search Property', 'inspiry-real-estate' ),
            'not_found'           => __( 'Not found', 'inspiry-real-estate' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'inspiry-real-estate' ),
        );

        $rewrite = array(
            'slug'                => __( 'property', 'inspiry-real-estate' ),
            'with_front'          => true,
            'pages'               => true,
            'feeds'               => true,
        );

        $args = array(
            'label'               => __( 'property', 'inspiry-real-estate' ),
            'description'         => __( 'Real Estate Property', 'inspiry-real-estate' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'page-attributes', ),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-building',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'rewrite'             => $rewrite,
            'capability_type'     => 'post',
        );

        register_post_type( 'property', $args );

    }

    /**
     * Register Property Type Taxonomy
     * @since 1.0.0
     */
    public function register_property_type_taxonomy() {

        $labels = array(
            'name'                       => _x( 'Property Type', 'Taxonomy General Name', 'inspiry-real-estate' ),
            'singular_name'              => _x( 'Property Type', 'Taxonomy Singular Name', 'inspiry-real-estate' ),
            'menu_name'                  => __( 'Property Type', 'inspiry-real-estate' ),
            'all_items'                  => __( 'All Property Types', 'inspiry-real-estate' ),
            'parent_item'                => __( 'Parent Property Type', 'inspiry-real-estate' ),
            'parent_item_colon'          => __( 'Parent Property Type:', 'inspiry-real-estate' ),
            'new_item_name'              => __( 'New Property Type Name', 'inspiry-real-estate' ),
            'add_new_item'               => __( 'Add New Property Type', 'inspiry-real-estate' ),
            'edit_item'                  => __( 'Edit Property Type', 'inspiry-real-estate' ),
            'update_item'                => __( 'Update Property Type', 'inspiry-real-estate' ),
            'view_item'                  => __( 'View Property Type', 'inspiry-real-estate' ),
            'separate_items_with_commas' => __( 'Separate Property Types with commas', 'inspiry-real-estate' ),
            'add_or_remove_items'        => __( 'Add or remove Property Types', 'inspiry-real-estate' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'inspiry-real-estate' ),
            'popular_items'              => __( 'Popular Property Types', 'inspiry-real-estate' ),
            'search_items'               => __( 'Search Property Types', 'inspiry-real-estate' ),
            'not_found'                  => __( 'Not Found', 'inspiry-real-estate' ),
        );

        $rewrite = array(
            'slug'                       => __( 'property-type', 'inspiry-real-estate' ),
            'with_front'                 => true,
            'hierarchical'               => true,
        );

        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => $rewrite,
        );

        register_taxonomy( 'property-type', array( 'property' ), $args );

    }

    /**
     * Register Property Status Taxonomy
     * @since 1.0.0
     */
    public function register_property_status_taxonomy() {

        $labels = array(
            'name'                       => _x( 'Property Status', 'Taxonomy General Name', 'inspiry-real-estate' ),
            'singular_name'              => _x( 'Property Status', 'Taxonomy Singular Name', 'inspiry-real-estate' ),
            'menu_name'                  => __( 'Property Status', 'inspiry-real-estate' ),
            'all_items'                  => __( 'All Property Statuses', 'inspiry-real-estate' ),
            'parent_item'                => __( 'Parent Property Status', 'inspiry-real-estate' ),
            'parent_item_colon'          => __( 'Parent Property Status:', 'inspiry-real-estate' ),
            'new_item_name'              => __( 'New Property Status Name', 'inspiry-real-estate' ),
            'add_new_item'               => __( 'Add New Property Status', 'inspiry-real-estate' ),
            'edit_item'                  => __( 'Edit Property Status', 'inspiry-real-estate' ),
            'update_item'                => __( 'Update Property Status', 'inspiry-real-estate' ),
            'view_item'                  => __( 'View Property Status', 'inspiry-real-estate' ),
            'separate_items_with_commas' => __( 'Separate Property Statuses with commas', 'inspiry-real-estate' ),
            'add_or_remove_items'        => __( 'Add or remove Property Statuses', 'inspiry-real-estate' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'inspiry-real-estate' ),
            'popular_items'              => __( 'Popular Property Statuses', 'inspiry-real-estate' ),
            'search_items'               => __( 'Search Property Statuses', 'inspiry-real-estate' ),
            'not_found'                  => __( 'Not Found', 'inspiry-real-estate' ),
        );

        $rewrite = array(
            'slug'                       => __( 'property-status', 'inspiry-real-estate' ),
            'with_front'                 => true,
            'hierarchical'               => true,
        );

        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => $rewrite,
        );

        register_taxonomy( 'property-status', array( 'property' ), $args );

    }

    /**
     * Register Property City Taxonomy
     * @since 1.0.0
     */
    public function register_property_city_taxonomy() {

        $labels = array(
            'name'                       => _x( 'Property City', 'Taxonomy General Name', 'inspiry-real-estate' ),
            'singular_name'              => _x( 'Property City', 'Taxonomy Singular Name', 'inspiry-real-estate' ),
            'menu_name'                  => __( 'Property City', 'inspiry-real-estate' ),
            'all_items'                  => __( 'All Property Cities', 'inspiry-real-estate' ),
            'parent_item'                => __( 'Parent Property City', 'inspiry-real-estate' ),
            'parent_item_colon'          => __( 'Parent Property City:', 'inspiry-real-estate' ),
            'new_item_name'              => __( 'New Property City Name', 'inspiry-real-estate' ),
            'add_new_item'               => __( 'Add New Property City', 'inspiry-real-estate' ),
            'edit_item'                  => __( 'Edit Property City', 'inspiry-real-estate' ),
            'update_item'                => __( 'Update Property City', 'inspiry-real-estate' ),
            'view_item'                  => __( 'View Property City', 'inspiry-real-estate' ),
            'separate_items_with_commas' => __( 'Separate Property Cities with commas', 'inspiry-real-estate' ),
            'add_or_remove_items'        => __( 'Add or remove Property Cities', 'inspiry-real-estate' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'inspiry-real-estate' ),
            'popular_items'              => __( 'Popular Property Cities', 'inspiry-real-estate' ),
            'search_items'               => __( 'Search Property Cities', 'inspiry-real-estate' ),
            'not_found'                  => __( 'Not Found', 'inspiry-real-estate' ),
        );

        $rewrite = array(
            'slug'                       => __( 'property-city', 'inspiry-real-estate' ),
            'with_front'                 => true,
            'hierarchical'               => true,
        );

        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => $rewrite,
        );

        register_taxonomy( 'property-city', array( 'property' ), $args );

    }

    /**
     * Register Property Feature Taxonomy
     * @since 1.0.0
     */
    public function register_property_feature_taxonomy() {

        $labels = array(
            'name'                       => _x( 'Property Features', 'Taxonomy General Name', 'inspiry-real-estate' ),
            'singular_name'              => _x( 'Property Feature', 'Taxonomy Singular Name', 'inspiry-real-estate' ),
            'menu_name'                  => __( 'Property Feature', 'inspiry-real-estate' ),
            'all_items'                  => __( 'All Property Features', 'inspiry-real-estate' ),
            'parent_item'                => __( 'Parent Property Feature', 'inspiry-real-estate' ),
            'parent_item_colon'          => __( 'Parent Property Feature:', 'inspiry-real-estate' ),
            'new_item_name'              => __( 'New Property Feature Name', 'inspiry-real-estate' ),
            'add_new_item'               => __( 'Add New Property Feature', 'inspiry-real-estate' ),
            'edit_item'                  => __( 'Edit Property Feature', 'inspiry-real-estate' ),
            'update_item'                => __( 'Update Property Feature', 'inspiry-real-estate' ),
            'view_item'                  => __( 'View Property Feature', 'inspiry-real-estate' ),
            'separate_items_with_commas' => __( 'Separate Property Features with commas', 'inspiry-real-estate' ),
            'add_or_remove_items'        => __( 'Add or remove Property Features', 'inspiry-real-estate' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'inspiry-real-estate' ),
            'popular_items'              => __( 'Popular Property Features', 'inspiry-real-estate' ),
            'search_items'               => __( 'Search Property Features', 'inspiry-real-estate' ),
            'not_found'                  => __( 'Not Found', 'inspiry-real-estate' ),
        );

        $rewrite = array(
            'slug'                       => __( 'property-feature', 'inspiry-real-estate' ),
            'with_front'                 => true,
            'hierarchical'               => true,
        );

        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => false,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => $rewrite,
        );

        register_taxonomy( 'property-feature', array( 'property' ), $args );

    }


    /**
     * Register custom columns
     *
     * @param   array   $defaults
     * @since   1.0.0
     * @return  array   $defaults
     */
    public function register_custom_column_titles ( $defaults ) {

        $new_columns = array(
            "thumb"     => __( 'Photo', 'inspiry-real-estate' ),
            "id"        => __( 'Custom ID', 'inspiry-real-estate' ),
            "price"     => __( 'Price', 'inspiry-real-estate'),
        );

        $last_columns = array();

        if ( count( $defaults ) > 5 ) {

            unset( $defaults['author'] );

            $last_columns = array_splice( $defaults, 2, 4 );

            // Simplify column titles
            $last_columns[ 'taxonomy-property-type' ]   = __( 'Type', 'inspiry-real-estate' );
            $last_columns[ 'taxonomy-property-status' ] = __( 'Status', 'inspiry-real-estate' );
            $last_columns[ 'taxonomy-property-city' ]   = __( 'Location', 'inspiry-real-estate' );

        }

        $defaults = array_merge( $defaults, $new_columns );
        $defaults = array_merge( $defaults, $last_columns );

        return $defaults;
    }

    /**
     * Display custom column for properties
     *
     * @access  public
     * @param   string $column_name
     * @since   1.0.0
     * @return  void
     */
    public function display_custom_column ( $column_name ) {
        global $post;

        switch ( $column_name ) {

            case 'thumb':
                if ( has_post_thumbnail ( $post->ID ) ) {
                    ?>
                    <a href="<?php the_permalink(); ?>" target="_blank">
                        <?php the_post_thumbnail( array( 130, 130 ) );?>
                    </a>
                    <?php
                } else {
                    _e ( 'No Image', 'inspiry-real-estate' );
                }
                break;

            case 'id':
                $property_id = get_post_meta ( $post->ID, 'REAL_HOMES_property_id', true );
                if( ! empty ( $property_id ) ) {
                    echo $property_id;
                } else {
                    _e ( 'NA', 'inspiry-real-estate' );
                }
                break;

            case 'price':
                //property_price();
                echo 'to do';   // todo: property price
                break;

            default:
                break;
        }
    }

    /**
     * Register meta boxes related to property post type
     *
     * @param   array   $meta_boxes
     * @since   1.0.0
     * @return  array   $meta_boxes
     */
    public function register_meta_boxes ( $meta_boxes ){

        $prefix = 'REAL_HOMES_';

        // Agents
        $agents_array = array( -1 => __( 'None', 'inspiry-real-estate' ) );
        $agents_posts = get_posts( array (
            'post_type' => 'agent',
            'posts_per_page' => -1,
            'suppress_filters' => 0,
            ) );
        if ( ! empty ( $agents_posts ) ) {
            foreach ( $agents_posts as $agent_post ) {
                $agents_array[ $agent_post->ID ] = $agent_post->post_title;
            }
        }

        // Property Details Meta Box
        $meta_boxes[] = array(
            'id' => 'property-meta-box',
            'title' => __('Property', 'inspiry-real-estate'),
            'pages' => array('property'),
            'tabs' => array(
                'details' => array(
                    'label' => __('Basic Information', 'inspiry-real-estate'),
                    'icon' => 'dashicons-admin-home',
                ),
                'gallery' => array(
                    'label' => __('Gallery Images', 'inspiry-real-estate'),
                    'icon' => 'dashicons-format-gallery',
                ),
                'video' => array(
                    'label' => __('Property Video', 'inspiry-real-estate'),
                    'icon' => 'dashicons-format-video',
                ),
                'agent' => array(
                    'label' => __('Agent Information', 'inspiry-real-estate'),
                    'icon' => 'dashicons-businessman',
                ),
                'misc' => array(
                    'label' => __('Misc', 'inspiry-real-estate'),
                    'icon' => 'dashicons-lightbulb',
                ),
                'home-slider' => array(
                    'label' => __('Homepage Slider', 'inspiry-real-estate'),
                    'icon' => 'dashicons-images-alt',
                ),
                'banner' => array(
                    'label' => __('Top Banner', 'inspiry-real-estate'),
                    'icon' => 'dashicons-format-image',
                ),
            ),
            'tab_style' => 'left',
            'fields' => array(

                // Details
                array(
                    'id' => "{$prefix}property_price",
                    'name' => __('Sale or Rent Price ( Only digits )', 'inspiry-real-estate'),
                    'desc' => __('Example Value: 435000', 'inspiry-real-estate'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                    'tab' => 'details',
                ),
                array(
                    'id' => "{$prefix}property_price_postfix",
                    'name' => __('Price Postfix', 'inspiry-real-estate'),
                    'desc' => __('Example Value: Per Month', 'inspiry-real-estate'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                    'tab' => 'details',
                ),
                array(
                    'id' => "{$prefix}property_size",
                    'name' => __('Area Size ( Only digits )', 'inspiry-real-estate'),
                    'desc' => __('Example Value: 2500', 'inspiry-real-estate'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                    'tab' => 'details',
                ),
                array(
                    'id' => "{$prefix}property_size_postfix",
                    'name' => __('Size Postfix', 'inspiry-real-estate'),
                    'desc' => __('Example Value: Sq Ft', 'inspiry-real-estate'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                    'tab' => 'details',
                ),
                array(
                    'id' => "{$prefix}property_bedrooms",
                    'name' => __('Bedrooms', 'inspiry-real-estate'),
                    'desc' => __('Example Value: 4', 'inspiry-real-estate'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                    'tab' => 'details',
                ),
                array(
                    'id' => "{$prefix}property_bathrooms",
                    'name' => __('Bathrooms', 'inspiry-real-estate'),
                    'desc' => __('Example Value: 2', 'inspiry-real-estate'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                    'tab' => 'details',
                ),
                array(
                    'id' => "{$prefix}property_garage",
                    'name' => __('Garages', 'inspiry-real-estate'),
                    'desc' => __('Example Value: 1', 'inspiry-real-estate'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                    'tab' => 'details',
                ),
                array(
                    'id' => "{$prefix}property_id",
                    'name' => __('Property ID', 'inspiry-real-estate'),
                    'desc' => __('It will help you search a property directly.', 'inspiry-real-estate'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                    'tab' => 'details',
                ),


                // Map
                array(
                    'type' => 'divider',
                    'columns' => 12,
                    'id' => 'google_map_divider', // Not used, but needed
                    'tab' => 'details',
                ),
                array(
                    'id' => "{$prefix}property_address",
                    'name' => __('Property Address', 'inspiry-real-estate'),
                    'desc' => __('Leaving it empty will hide the google map on property detail page.', 'inspiry-real-estate'),
                    'type' => 'text',
                    'std' => '1903 Hollywood Boulevard, Hollywood, FL 33020, USA',
                    'columns' => 12,
                    'tab' => 'details',
                ),
                array(
                    'id' => "{$prefix}property_location",
                    'name' => __('Property Location at Google Map*', 'inspiry-real-estate'),
                    'desc' => __('Drag the google map marker to point your property location. You can also use the address field above to search for your property.', 'inspiry-real-estate'),
                    'type' => 'map',
                    'std' => '26.011812,-80.14524499999999,15',   // 'latitude,longitude[,zoom]' (zoom is optional)
                    'style' => 'width: 95%; height: 400px',
                    'address_field' => "{$prefix}property_address",
                    'columns' => 12,
                    'tab' => 'details',
                ),

                // Gallery
                array(
                    'name' => __('Gallery Type You Want to Use', 'inspiry-real-estate'),
                    'id' => "{$prefix}gallery_slider_type",
                    'type' => 'radio',
                    'std' => 'thumb-on-right',
                    'options' => array(
                        'thumb-on-right' => __('Gallery with thumbnails on right', 'inspiry-real-estate'),
                        'thumb-on-bottom' => __('Gallery with thumbnails on bottom', 'inspiry-real-estate')
                    ),
                    'columns' => 12,
                    'tab' => 'gallery',
                ),
                array(
                    'name' => __('Property Gallery Images', 'inspiry-real-estate'),
                    'id' => "{$prefix}property_images",
                    'desc' => __('Images should have minimum size of 850px by 567px. Bigger size images will be cropped automatically.', 'inspiry-real-estate'),
                    'type' => 'image_advanced',
                    'max_file_uploads' => 48,
                    'columns' => 12,
                    'tab' => 'gallery',
                ),


                // Property Video
                array(
                    'id' => "{$prefix}tour_video_url",
                    'name' => __('Virtual Tour Video URL', 'inspiry-real-estate'),
                    'desc' => __('Provide virtual tour video URL. YouTube, Vimeo, SWF File and MOV File are supported', 'inspiry-real-estate'),
                    'type' => 'text',
                    'columns' => 12,
                    'tab' => 'video',
                ),
                array(
                    'name' => __('Virtual Tour Video Image', 'inspiry-real-estate'),
                    'id' => "{$prefix}tour_video_image",
                    'desc' => __('Provide an image that will be displayed as a place holder and when user will click over it the video will be opened in a lightbox. You must provide this image otherwise the video will not be displayed. Image should have minimum width of 818px and minimum height 417px. Bigger size images will be cropped automatically.', 'inspiry-real-estate'),
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                    'columns' => 12,
                    'tab' => 'video',
                ),

                // Agents
                array(
                    'name' => __('What to display in agent information box ?', 'inspiry-real-estate'),
                    'id' => "{$prefix}agent_display_option",
                    'type' => 'radio',
                    'std' => 'none',
                    'options' => array(
                        'my_profile_info' => __('Author information.', 'inspiry-real-estate'),
                        'agent_info' => __('Agent Information. ( Select the agent below )', 'inspiry-real-estate'),
                        'none' => __('None. ( Hide information box )', 'inspiry-real-estate'),
                    ),
                    'columns' => 12,
                    'tab' => 'agent',
                ),
                array(
                    'name' => __('Agent', 'inspiry-real-estate'),
                    'id' => "{$prefix}agents",
                    'type' => 'select',
                    'options' => $agents_array,
                    'columns' => 12,
                    'tab' => 'agent',
                ),

                // Misc
                array(
                    'name' => __('Mark this property as featured ?', 'inspiry-real-estate'),
                    'id' => "{$prefix}featured",
                    'type' => 'radio',
                    'std' => 0,
                    'options' => array(
                        1 => __('Yes ', 'inspiry-real-estate'),
                        0 => __('No', 'inspiry-real-estate')
                    ),
                    'columns' => 12,
                    'tab' => 'misc',
                ),
                array(
                    'id' => "{$prefix}attachments",
                    'name' => __('Attachments', 'inspiry-real-estate'),
                    'desc' => __('You can attach PDF files, Map images OR other documents to provide further details related to property.', 'inspiry-real-estate'),
                    'type' => 'file_advanced',
                    'mime_type' => '',
                    'columns' => 12,
                    'tab' => 'misc',
                ),
                array(
                    'id' => "{$prefix}property_private_note",
                    'name' => __('Private Note', 'inspiry-real-estate'),
                    'desc' => __('In this textarea, You can write your private note about this property. This field will not be displayed anywhere else.', 'inspiry-real-estate'),
                    'type' => 'textarea',
                    'std' => "",
                    'columns' => 12,
                    'tab' => 'misc',
                ),

                // Homepage Slider
                array(
                    'name' => __('Do you want to add this property in Homepage Slider ?', 'inspiry-real-estate'),
                    'desc' => __('If Yes, Then you need to provide a slider image below.', 'inspiry-real-estate'),
                    'id' => "{$prefix}add_in_slider",
                    'type' => 'radio',
                    'std' => 'no',
                    'options' => array(
                        'yes' => __('Yes ', 'inspiry-real-estate'),
                        'no' => __('No', 'inspiry-real-estate')
                    ),
                    'columns' => 12,
                    'tab' => 'home-slider',
                ),
                array(
                    'name' => __('Slider Image', 'inspiry-real-estate'),
                    'id' => "{$prefix}slider_image",
                    'desc' => __('The recommended image size is 2000px by 700px. You can use bigger or smaller image but try to keep the same height to width ratio and use the exactly same size images for all properties that will be added in slider.', 'inspiry-real-estate'),
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                    'columns' => 12,
                    'tab' => 'home-slider',
                ),

                // Top Banner
                array(
                    'name' => __('Top Banner Image', 'inspiry-real-estate'),
                    'id' => "{$prefix}page_banner_image",
                    'desc' => __('Upload the banner image, If you want to change it for this property. Otherwise default banner image uploaded from theme options will be displayed. Image should have minimum width of 2000px and minimum height of 230px.', 'inspiry-real-estate'),
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                    'columns' => 12,
                    'tab' => 'banner',
                )

            )
        );

        // apply a filter before returning meta boxes
        $meta_boxes = apply_filters( 'property_meta_boxes', $meta_boxes );

        return $meta_boxes;

    }

}