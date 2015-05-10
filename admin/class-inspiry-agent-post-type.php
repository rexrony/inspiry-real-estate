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

class Inspiry_Agent_Post_Type {

    /**
     * Register Agent Post Type
     * @since 1.0.0
     */
    public function register_agent_post_type() {

        $labels = array(
            'name'                => _x( 'Agents', 'Post Type General Name', 'inspiry-real-estate' ),
            'singular_name'       => _x( 'Agent', 'Post Type Singular Name', 'inspiry-real-estate' ),
            'menu_name'           => __( 'Agent', 'inspiry-real-estate' ),
            'name_admin_bar'      => __( 'Agent', 'inspiry-real-estate' ),
            'parent_item_colon'   => __( 'Parent Agent:', 'inspiry-real-estate' ),
            'all_items'           => __( 'All Agents', 'inspiry-real-estate' ),
            'add_new_item'        => __( 'Add New Agent', 'inspiry-real-estate' ),
            'add_new'             => __( 'Add New', 'inspiry-real-estate' ),
            'new_item'            => __( 'New Agent', 'inspiry-real-estate' ),
            'edit_item'           => __( 'Edit Agent', 'inspiry-real-estate' ),
            'update_item'         => __( 'Update Agent', 'inspiry-real-estate' ),
            'view_item'           => __( 'View Agent', 'inspiry-real-estate' ),
            'search_items'        => __( 'Search Agent', 'inspiry-real-estate' ),
            'not_found'           => __( 'Not found', 'inspiry-real-estate' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'inspiry-real-estate' ),
        );

        $rewrite = array(
            'slug'                => __( 'agent', 'inspiry-real-estate'),
            'with_front'          => true,
            'pages'               => true,
            'feeds'               => false,
        );

        $args = array(
            'label'               => __( 'agent', 'inspiry-real-estate' ),
            'description'         => __( 'Real Estate Agent', 'inspiry-real-estate' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-businessman',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => true,
            'rewrite'             => $rewrite,
            'capability_type'     => 'post',
        );

        register_post_type( 'agent', $args );

    }

}