<?php
/**
 * Agent custom post type class.
 *
 * Defines the agent post type.
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
            'menu_name'           => __( 'Agents', 'inspiry-real-estate' ),
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
            'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', ),
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
            "email"     => __( 'Email', 'inspiry-real-estate' ),
            "mobile"    => __( 'Mobile', 'inspiry-real-estate'),
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
     * Display custom column for agents
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

            case 'email':
                $agent_email = is_email( get_post_meta ( $post->ID, 'REAL_HOMES_agent_email', true ) );
                if ( $agent_email ) {
                    echo $agent_email;
                } else {
                    _e ( 'NA', 'inspiry-real-estate' );
                }
                break;

            case 'mobile':
                $mobile_number = get_post_meta ( $post->ID, 'REAL_HOMES_mobile_number', true );
                if ( !empty( $mobile_number ) ) {
                    echo $mobile_number;
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

        // Agent Meta Box
        $meta_boxes[] = array(
            'id'        => 'agent-meta-box',
            'title'     => __('Contact Details', 'inspiry-real-estate'),
            'pages'     => array( 'agent' ),
            'context'   => 'normal',
            'priority'  => 'high',
            'fields'    => array(
                array(
                    'name'  => __( 'Job Title', 'inspiry-real-estate' ),
                    'id'    => "inspiry_job_title",
                    'type'  => 'text',
                ),
                array(
                    'name'  => __( 'Email Address', 'inspiry-real-estate' ),
                    'id'    => "{$prefix}agent_email",
                    'desc'  => __( "Agent related messages from contact form on property details page, will be sent on this email address.", "inspiry-real-estate" ),
                    'type'  => 'email',
                ),
                array(
                    'name'  => __( 'Mobile Number', 'inspiry-real-estate' ),
                    'id'    => "{$prefix}mobile_number",
                    'type'  => 'text',
                ),
                array(
                    'name'  => __('Office Number', 'inspiry-real-estate'),
                    'id'    => "{$prefix}office_number",
                    'type'  => 'text',
                ),
                array(
                    'name'  => __('Fax Number', 'inspiry-real-estate'),
                    'id'    => "{$prefix}fax_number",
                    'type'  => 'text',
                ),
                array(
                    'name'  => __( 'Office Address', 'inspiry-real-estate' ),
                    'id'    => "inspiry_office_address",
                    'type'  => 'text',
                ),
                array(
                    'name'  => __('Facebook URL', 'inspiry-real-estate'),
                    'id'    => "{$prefix}facebook_url",
                    'type'  => 'url',
                ),
                array(
                    'name'  => __('Twitter URL', 'inspiry-real-estate'),
                    'id'    => "{$prefix}twitter_url",
                    'type'  => 'url',
                ),
                array(
                    'name'  => __('Google Plus URL', 'inspiry-real-estate'),
                    'id'    => "{$prefix}google_plus_url",
                    'type'  => 'url',
                ),
                array(
                    'name'  => __('LinkedIn URL', 'inspiry-real-estate'),
                    'id'    => "{$prefix}linked_in_url",
                    'type'  => 'text',
                ),
                array(
                    'name'  => __('Pinterest URL', 'inspiry-real-estate'),
                    'id'    => "inspiry_pinterest_url",
                    'type'  => 'url',
                ),
                array(
                    'name'  => __('Instagram URL', 'inspiry-real-estate'),
                    'id'    => "inspiry_instagram_url",
                    'type'  => 'url',
                )

            )
        );

        // apply a filter before returning meta boxes
        $meta_boxes = apply_filters( 'agent_meta_boxes', $meta_boxes );

        return $meta_boxes;

    }

}