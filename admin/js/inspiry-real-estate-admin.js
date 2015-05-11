(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-specific JavaScript source
	 * should reside in this file.
	 *
	 * Note that this assume you're going to use jQuery, so it prepares
	 * the $ function reference to be used within the scope of this
	 * function.
	 *
	 * From here, you're able to define handlers for when the DOM is
	 * ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * Or when the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and so on.
	 *
	 * Remember that ideally, we should not attach any more than a single DOM-ready or window-load handler
	 * for any particular page. Though other scripts in WordPress core, other plugins, and other themes may
	 * be doing this, we should try to minimize doing that in our own work.
	 */

    $(function() {

        /* Apply jquery ui sortable on additional details */
        $( "#inspiry-additional-details-container" ).sortable({
            revert: 100,
            placeholder: "detail-placeholder",
            handle: ".sort-detail",
            cursor: "move"
        });

        $( '.add-detail' ).click(function( event ){
            event.preventDefault();
            var newInspiryDetail = '<div class="inspiry-detail inputs">' +
                '<div class="inspiry-detail-control"><span class="sort-detail dashicons dashicons-menu"></span></div>' +
                '<div class="inspiry-detail-title"><input type="text" name="detail-titles[]" /></div>' +
                '<div class="inspiry-detail-value"><input type="text" name="detail-values[]" /></div>' +
                '<div class="inspiry-detail-control"><a class="remove-detail" href="#"><span class="dashicons dashicons-dismiss"></span></a></div>' +
                '</div>';

            $( '#inspiry-additional-details-container').append( newInspiryDetail );
            bindAdditionalDetailsEvents();
        });

        function bindAdditionalDetailsEvents(){

            /* Bind click event to remove detail icon button */
            $( '.remove-detail').click(function( event ){
                event.preventDefault();
                var $this = $( this );
                $this.closest( '.inspiry-detail' ).remove();
            });

        }
        bindAdditionalDetailsEvents();

    });


})( jQuery );
