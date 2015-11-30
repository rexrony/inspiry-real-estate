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
            'slug'                => apply_filters( 'inspiry_property_slug', __( 'property', 'inspiry-real-estate' ) ),
            'with_front'          => true,
            'pages'               => true,
            'feeds'               => true,
        );

        $args = array(
            'label'               => __( 'property', 'inspiry-real-estate' ),
            'description'         => __( 'Real Estate Property', 'inspiry-real-estate' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'page-attributes', 'comments' ),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-building',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
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
            'menu_name'                  => __( 'Types', 'inspiry-real-estate' ),
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
            'slug'                       => apply_filters( 'inspiry_property_type_slug', __( 'property-type', 'inspiry-real-estate' ) ),
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
            'menu_name'                  => __( 'Statuses', 'inspiry-real-estate' ),
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
            'slug'                       => apply_filters( 'inspiry_property_status_slug', __( 'property-status', 'inspiry-real-estate' ) ),
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
            'menu_name'                  => __( 'Locations', 'inspiry-real-estate' ),
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
            'slug'                       => apply_filters( 'inspiry_property_city_slug', __( 'property-city', 'inspiry-real-estate' ) ),
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
            'menu_name'                  => __( 'Features', 'inspiry-real-estate' ),
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
            'slug'                       => apply_filters( 'inspiry_property_feature_slug', __( 'property-feature', 'inspiry-real-estate' ) ),
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
                    ?><a href="<?php the_permalink(); ?>" target="_blank"><?php the_post_thumbnail( array( 130, 130 ) );?></a><?php
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
                $property_price = get_post_meta ( $post->ID, 'REAL_HOMES_property_price', true );
                if ( !empty ( $property_price ) ) {
                    $price_amount = doubleval( $property_price );
                    $price_postfix = get_post_meta ( $post->ID, 'REAL_HOMES_property_price_postfix', true );
                    echo Inspiry_Property::format_price( $price_amount, $price_postfix );
                } else {
                    _e ( 'NA', 'inspiry-real-estate' );
                }
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
        $default_desc = __( 'Consult theme documentation for required image size.', 'inspiry-real-estate' );
        $gallery_images_desc = apply_filters( 'inspiry_gallery_description', $default_desc );
        $video_image_desc = apply_filters( 'inspiry_video_description', $default_desc );
        $slider_image_desc = apply_filters( 'inspiry_slider_description', $default_desc );

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
                    // 'std' => 'Miami, FL, USA',
                    'columns' => 12,
                    'tab' => 'details',
                ),
                array(
                    'id' => "{$prefix}property_location",
                    'name' => __('Property Location at Google Map*', 'inspiry-real-estate'),
                    'desc' => __('Drag the google map marker to point your property location. You can also use the address field above to search for your property.', 'inspiry-real-estate'),
                    'type' => 'map',
                    'std' => '25.761680,-80.191790,14',   // 'latitude,longitude[,zoom]' (zoom is optional)
                    'style' => 'width: 95%; height: 400px',
                    'address_field' => "{$prefix}property_address",
                    'columns' => 12,
                    'tab' => 'details',
                ),

                array(
                    'name' => __('Property Gallery Images', 'inspiry-real-estate'),
                    'id' => "{$prefix}property_images",
                    'desc' => $gallery_images_desc,
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
                    'desc' => $video_image_desc,
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
                    'desc' => $slider_image_desc,
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


    /*
     * Add meta box to display payment information
     =============================================== */

    /**
     * Add payment meta box
     */
    function add_payment_meta_box() {
        add_meta_box( 'payment-meta-box', __( 'Payment Information', 'inspiry-real-estate' ), array( $this, 'display_payment_info' ), 'property', 'normal', 'default' );
    }

    /**
     * Display payment information
     * @param $post
     */
    function display_payment_info( $post ) {

        $values = get_post_custom( $post->ID );
        $not_available  = __( 'Not Available', 'inspiry-real-estate' );

        $txn_id             = isset( $values['txn_id'] ) ? esc_attr( $values['txn_id'][0] ) : $not_available;
        $payment_date       = isset( $values['payment_date'] ) ? esc_attr( $values['payment_date'][0] ) : $not_available;
        $payer_email        = isset( $values['payer_email'] ) ? esc_attr( $values['payer_email'][0] ) : $not_available;
        $first_name         = isset( $values['first_name'] ) ? esc_attr( $values['first_name'][0] ) : $not_available;
        $last_name          = isset( $values['last_name'] ) ? esc_attr( $values['last_name'][0] ) : $not_available;
        $payment_status     = isset( $values['payment_status'] ) ? esc_attr( $values['payment_status'][0] ) : $not_available;
        $payment_gross      = isset( $values['payment_gross'] ) ? esc_attr( $values['payment_gross'][0] ) : $not_available;
        $payment_currency   = isset( $values['mc_currency'] ) ? esc_attr( $values['mc_currency'][0] ) : $not_available;

        ?>
        <table style="width:100%;">
            <tr>
                <td style="width:25%; vertical-align: top;"><strong><?php _e( 'Transaction ID', 'inspiry-real-estate' );?></strong></td>
                <td style="width:75%;"><?php echo $txn_id; ?></td>
            </tr>
            <tr>
                <td style="width:25%; vertical-align: top;"><strong><?php _e( 'Payment Date', 'inspiry-real-estate' );?></strong></td>
                <td style="width:75%;"><?php echo $payment_date; ?></td>
            </tr>
            <tr>
                <td style="width:25%; vertical-align: top;"><strong><?php _e( 'First Name', 'inspiry-real-estate' );?></strong></td>
                <td style="width:75%;"><?php echo $first_name; ?></td>
            </tr>
            <tr>
                <td style="width:25%; vertical-align: top;"><strong><?php _e( 'Last Name', 'inspiry-real-estate' );?></strong></td>
                <td style="width:75%;"><?php echo $last_name; ?></td>
            </tr>
            <tr>
                <td style="width:25%; vertical-align: top;"><strong><?php _e( 'Payer Email', 'inspiry-real-estate' );?></strong></td>
                <td style="width:75%;"><?php echo $payer_email; ?></td>
            </tr>
            <tr>
                <td style="width:25%; vertical-align: top;"><strong><?php _e('Payment Status','inspiry-real-estate');?></strong></td>
                <td style="width:75%;"><?php echo $payment_status; ?></td>
            </tr>
            <tr>
                <td style="width:25%; vertical-align: top;"><strong><?php _e( 'Payment Amount', 'inspiry-real-estate' );?></strong></td>
                <td style="width:75%;"><?php echo $payment_gross; ?></td>
            </tr>
            <tr>
                <td style="width:25%; vertical-align: top;"><strong><?php _e( 'Payment Currency', 'inspiry-real-estate' );?></strong></td>
                <td style="width:75%;"><?php echo $payment_currency; ?></td>
            </tr>
        </table>
        <?php
    }


    /*
     * Property custom ID search support for properties index page on admin side
     ============================================================================= */

    /**
     * Check if current page is properties index page on admin side
     * @return bool
     */
    public function is_properties_index_page() {
        global $pagenow;
        return ( is_admin() && $pagenow == 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] == 'property' && isset($_GET['s']) );
    }


    /**
     * Joins post meta table with posts table for search purpose
     * @param $join
     * @return string
     */
    public function join_post_meta_table( $join ) {
        global $wpdb;
        if ( $this->is_properties_index_page() ) {
            $join .= ' LEFT JOIN ' . $wpdb->postmeta . ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
        }
        return $join;
    }


    /**
     * Add property custom id in search
     *
     * @param $where
     * @return mixed
     */
    public function add_property_id_in_search( $where ) {
        global $wpdb;
        if ( $this->is_properties_index_page() ) {
            $where = preg_replace(
                "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
                "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_key = 'REAL_HOMES_property_id') AND (".$wpdb->postmeta.".meta_value LIKE $1)",
                $where );
        }
        return $where;
    }


    /**
     * Add group by properties support
     * @param $group_by
     * @return string
     */
    function group_by_properties( $group_by ) {
        global $wpdb;
        if ( $this->is_properties_index_page() ) {
            $group_by = "$wpdb->posts.ID";
        }
        return $group_by;
    }


}