<?php
/**
 * Class for additional details meta box
 *
 * @package    Inspiry_Real_Estate
 * @subpackage Inspiry_Real_Estate/admin
 * @author     M Saqib Sarwar <saqib@inspirythemes.com>
 */

class Additional_Details_Meta_Box {

	/**
     * A reference to the single instance of this class
     */
	private static $instance = null;

	/**
     * Represents the nonce value used to save the post media
     */
	private $nonce = 'inspiry_additional_details_nonce';

	/**
	* Provides access to a single instance of this class.
	* @since 1.0.0
	* @return object A single instance of this class.
	*/
	public static function get_instance() {
		if( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	/**
	 * constructor
     * @since 1.0.0
	 */
	private function __construct() { }

	/**
	 * Call core function and call back to generate user interface
     * @since 1.0.0
	 */
	public function add_additional_details_meta_box() {

		add_meta_box( 'additional-details-meta-box', __( 'Additional Details', 'inspiry-real-estate' ), array( $this, 'display_additional_details' ), 'property', 'normal', 'core' );
	
	}

	/**
	 * Provides user interface for additional details meta box
     * @since 1.0.0
	 */
	public function display_additional_details( $post ) {

		// Migrate old title and values to new key => value array
		/* $detail_titles = get_post_meta($post->ID,'REAL_HOMES_detail_titles',true);
		if( !empty( $detail_titles ) ) {
			$detail_values = get_post_meta($post->ID, 'REAL_HOMES_detail_values', true);
			if (!empty($detail_values)) {
				$additional_details = array_combine( $detail_titles, $detail_values );
				if ( update_post_meta( $post->ID, 'REAL_HOMES_additional_details', $additional_details ) ){
					delete_post_meta( $post->ID, 'REAL_HOMES_detail_titles' );
					delete_post_meta( $post->ID, 'REAL_HOMES_detail_values' );
				}
			}
		} */

		// nonce field for better security
		wp_nonce_field( 'inspiry_additional_details_meta_box', $this->nonce );

		?>
		<div class="inspiry-details-wrapper">

			<div class="inspiry-detail labels">
				<div class="inspiry-detail-control">&nbsp;</div>
				<div class="inspiry-detail-title"><label><?php _e( 'Title', 'inspiry-real-estate' ) ?></label></div>
				<div class="inspiry-detail-value"><label><?php _e( 'Value', 'inspiry-real-estate' ); ?></label></div>
				<div class="inspiry-detail-control">&nbsp;</div>
			</div>

			<!-- additional details container -->
			<div id="inspiry-additional-details-container">
				<?php
				// output existing details
				$additional_details = get_post_meta( $post->ID, 'REAL_HOMES_additional_details', true );

				if( ! empty ( $additional_details ) ) {

					foreach( $additional_details as $title => $value ) {
						?>
						<div class="inspiry-detail inputs">
							<div class="inspiry-detail-control">
								<span class="sort-detail dashicons dashicons-menu"></span>
							</div>
							<div class="inspiry-detail-title">
								<input type="text" name="detail-titles[]" value="<?php echo esc_attr( $title ); ?>" />
							</div>
							<div class="inspiry-detail-value">
								<input type="text" name="detail-values[]" value="<?php echo esc_attr( $value ); ?>" />
							</div>
							<div class="inspiry-detail-control">
								<a class="remove-detail" href="#"><span class="dashicons dashicons-dismiss"></span></a>
							</div>
						</div>
						<?php
					}

				} else {
					?>
					<div class="inspiry-detail inputs">
						<div class="inspiry-detail-control">
							<span class="sort-detail dashicons dashicons-menu"></span>
						</div>
						<div class="inspiry-detail-title">
							<input type="text" name="detail-titles[]" value="" />
						</div>
						<div class="inspiry-detail-value">
							<input type="text" name="detail-values[]" value="" />
						</div>
						<div class="inspiry-detail-control">
							<a class="remove-detail" href="#"><span class="dashicons dashicons-dismiss"></span></a>
						</div>
					</div>
					<?php
				}
				?>
			</div><!-- end of additional details container -->

			<div class="inspiry-detail">
				<div class="inspiry-detail-control">&nbsp;</div>
				<div class="inspiry-detail-control">
					<a class="add-detail" href="#"><span class="dashicons dashicons-plus-alt"></span></a>
				</div>
			</div>

		</div>
		<?php

	}

	/**
	 * Updated additional details information
	 *
	 * @param int $post_id The ID of the post being saved
	 * @since 1.0.0
	 */
	public function save_additional_details( $post_id ) {

		// First, make sure the user can save the post
		if( $this->user_can_save( $post_id, $this->nonce ) ) {

			if( isset( $_POST['detail-titles'] ) && isset( $_POST['detail-values'] ) ) {

				$additional_details_titles = $_POST['detail-titles'];
				$additional_details_values = $_POST['detail-values'];

                // data sanitization
                $additional_details_titles = array_map( 'sanitize_text_field' , $additional_details_titles );
                $additional_details_titles = array_map( 'stripslashes' , $additional_details_titles );

                $additional_details_values = array_map( 'sanitize_text_field' , $additional_details_values );
                $additional_details_values = array_map( 'stripslashes' , $additional_details_values );

				if( !empty( $additional_details_titles ) && !empty( $additional_details_values ) ) {

					$additional_details = array_combine( $additional_details_titles, $additional_details_values );
                    $additional_details = array_filter( $additional_details );  // remove empty values
                    if( ! empty( $additional_details ) ) {
                        update_post_meta( $post_id, 'REAL_HOMES_additional_details', $additional_details );
                        return;
                    }
				}
			}

            // remove additional details.
            delete_post_meta( $post_id, 'REAL_HOMES_additional_details' );
		}

	}

	/**
	 * Determines whether or not the current user has the ability to save meta data associated with this post.
	 *
	 * @param int $post_id The ID of the post being save
	 * @param string $nonce nonce for verification
	 * @since 1.0.0
	 * @return bool returns true or false based on current user ability and nonce verification
	 */
	function user_can_save( $post_id, $nonce ) {

	    $is_autosave = wp_is_post_autosave( $post_id );
	    $is_revision = wp_is_post_revision( $post_id );
	    $is_valid_nonce = ( isset( $_POST[ $nonce ] ) && wp_verify_nonce( $_POST[ $nonce ], 'inspiry_additional_details_meta_box' ) );
	    
	    // Return true if the user is able to save; otherwise, false.
	    return ! ( $is_autosave || $is_revision ) && $is_valid_nonce;
	 
	}

} // end class