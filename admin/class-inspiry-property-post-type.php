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
     * @since   1.0.0
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
     * @since   1.0.0
     */
    public function register_property_type_taxonomy() {

        $labels = array(
            'name'                       => _x( 'Property Types', 'Taxonomy General Name', 'inspiry-real-estate' ),
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
     * Register Property Type Taxonomy
     * @since   1.0.0
     */
    public function register_property_type_taxonomy() {

        $labels = array(
            'name'                       => _x( 'Property Types', 'Taxonomy General Name', 'inspiry-real-estate' ),
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

}