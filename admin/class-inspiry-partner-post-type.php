<?php
/**
 * Partner custom post type class.
 *
 * Defines the partner post type.
 *
 * @package    Inspiry_Real_Estate
 * @subpackage Inspiry_Real_Estate/admin
 * @author     M Saqib Sarwar <saqib@inspirythemes.com>
 */

class Inspiry_Partner_Post_Type {

    /**
     * Register partner post type
     * @since 1.0.0
     */
    public function register_partner_post_type() {

        $labels = array(
            'name'                => _x( 'Partners', 'Post Type General Name', 'inspiry-real-estate' ),
            'singular_name'       => _x( 'Partner', 'Post Type Singular Name', 'inspiry-real-estate' ),
            'menu_name'           => __( 'Partners', 'inspiry-real-estate' ),
            'name_admin_bar'      => __( 'Partner', 'inspiry-real-estate' ),
            'parent_item_colon'   => __( 'Parent Partner:', 'inspiry-real-estate' ),
            'all_items'           => __( 'All Partners', 'inspiry-real-estate' ),
            'add_new_item'        => __( 'Add New Partner', 'inspiry-real-estate' ),
            'add_new'             => __( 'Add New', 'inspiry-real-estate' ),
            'new_item'            => __( 'New Partner', 'inspiry-real-estate' ),
            'edit_item'           => __( 'Edit Partners', 'inspiry-real-estate' ),
            'update_item'         => __( 'Update Partner', 'inspiry-real-estate' ),
            'view_item'           => __( 'View Partner', 'inspiry-real-estate' ),
            'search_items'        => __( 'Search Partner', 'inspiry-real-estate' ),
            'not_found'           => __( 'Not found', 'inspiry-real-estate' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'inspiry-real-estate' ),
        );

        $args = array(
            'label'               => __( 'Partners', 'inspiry-real-estate' ),
            'description'         => __( 'Partners', 'inspiry-real-estate' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'thumbnail', ),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 10,
            'menu_icon'           => 'dashicons-groups',
            'show_in_admin_bar'   => false,
            'can_export'          => true,
            'has_archive'         => false,
            'rewrite'             => false,
            'capability_type'     => 'post',
        );

        register_post_type( 'partners', $args );

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
            "thumb"     => __( 'Logo', 'inspiry-real-estate' ),
        );

        $last_columns = array();

        if ( count( $defaults ) > 2 ) {
            $last_columns = array_splice( $defaults, 2, 1 );
        }

        $defaults = array_merge( $defaults, $new_columns );
        $defaults = array_merge( $defaults, $last_columns );

        return $defaults;
    }

    /**
     * Display custom column for partners
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
                    the_post_thumbnail( array( 150, 150 ) );
                } else {
                    _e ( 'No Image', 'inspiry-real-estate' );
                }
                break;

            default:
                break;
        }
    }

    /**
     * Register meta boxes related to partner post type
     *
     * @param   array   $meta_boxes
     * @since   1.0.0
     * @return  array   $meta_boxes
     */
    public function register_meta_boxes ( $meta_boxes ){

        $prefix = 'REAL_HOMES_';

        // Partners Meta Box
        $meta_boxes[] = array(
            'id' => 'partners-meta-box',
            'title' => __('Partner Information', 'inspiry-real-estate'),
            'pages' => array( 'partners' ),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => __('Website URL', 'inspiry-real-estate'),
                    'id' => "{$prefix}partner_url",
                    'desc' => __('Provide website URL', 'inspiry-real-estate'),
                    'type' => 'text',
                )
            )
        );

        // apply a filter before returning meta boxes
        $meta_boxes = apply_filters( 'partner_meta_boxes', $meta_boxes );

        return $meta_boxes;
    }

}