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
            'menu_name'           => __( 'Property', 'inspiry-real-estate' ),
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

}