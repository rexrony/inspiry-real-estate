<?php
/*
 * Template Name: Contact
 */

get_header();

get_template_part( 'partials/header/banner' );

global $inspiry_options;

// Get all custom post meta information related to contact page
$contact_meta_data = get_post_custom( get_the_ID() );

    /*
     * Google Map
     */
    if ( isset( $contact_meta_data[ 'inspiry_map_address' ] ) && isset( $contact_meta_data[ 'inspiry_map_location' ] ) ) {

        if( !empty( $contact_meta_data[ 'inspiry_map_address' ][ 0 ] ) && !empty( $contact_meta_data[ 'inspiry_map_location' ][ 0 ] ) ) {

            $lat_lng = explode( ',', $contact_meta_data[ 'inspiry_map_location' ][ 0 ] );

            if( is_array( $lat_lng ) && isset( $lat_lng[0] ) && isset( $lat_lng[1] ) ) {

                $lat = $lat_lng[0];
                $lng = $lat_lng[1];

                $map_zoom = 15;
                if( isset( $contact_meta_data[ 'inspiry_map_zoom' ] ) ) {
                    $map_zoom = intval( $contact_meta_data[ 'inspiry_map_zoom' ][ 0 ] );
                }

                ?>
                <div class="google-map-wrapper">
                    <div id="map-canvas"></div>
                </div>
                <script>
                    function initialize() {

                        var locationLatLng = new google.maps.LatLng( <?php echo esc_attr( $lat ); ?>, <?php echo esc_attr( $lng ); ?> );

                        var mapCanvas = document.getElementById( 'map-canvas' );

                        var mapOptions = {
                            center: locationLatLng,
                            zoom: <?php echo esc_attr( $map_zoom ); ?>,
                            zoomControl: true,
                            zoomControlOptions: {
                                style: google.maps.ZoomControlStyle.SMALL
                            },
                            panControl: false,
                            mapTypeControl: true,
                            scrollwheel: false,
                            styles: [
                                {
                                    "featureType": "administrative",
                                    "elementType": "labels.text.fill",
                                    "stylers": [
                                        {
                                            "color": "#444444"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "landscape",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "color": "#f2f2f2"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "poi",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "visibility": "off"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "poi.business",
                                    "elementType": "geometry.fill",
                                    "stylers": [
                                        {
                                            "visibility": "on"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "road",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "saturation": -100
                                        },
                                        {
                                            "lightness": 45
                                        }
                                    ]
                                },
                                {
                                    "featureType": "road.highway",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "visibility": "simplified"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "road.arterial",
                                    "elementType": "labels.icon",
                                    "stylers": [
                                        {
                                            "visibility": "off"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "transit",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "visibility": "off"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "water",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "color": "#b4d4e1"
                                        },
                                        {
                                            "visibility": "on"
                                        }
                                    ]
                                }
                            ]
                        };

                        var officeMap = new google.maps.Map( mapCanvas, mapOptions );

                        var marker = new google.maps.Marker( {
                            position: locationLatLng,
                            map: officeMap,
                            icon: '<?php echo get_template_directory_uri() ?>/images/svg/map-marker.svg'
                        } );

                    }

                    google.maps.event.addDomListener(window, 'load', initialize);

                </script>
                <?php
            }
        }
    }
    ?>

    <div id="content-wrapper" class="site-content-wrapper site-pages">

        <div id="content" class="site-content layout-boxed">

            <div class="container">

                <div class="row">

                    <div class="col-xs-12 site-main-content">

                        <main id="main" class="site-main">

                            <div class="row zero-horizontal-margin column-container">

                            <?php
                            if ( have_posts() ):
                                while ( have_posts() ):
                                    the_post();
                                    ?>
                                    <div class="col-md-6 col-left-side contact-details">
                                        <?php
                                        /*
                                         * Content
                                         */
                                        $content = get_the_content();
                                        if ( !empty( $content ) ) {
                                            ?>
                                            <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> >
                                                <div class="entry-content clearfix">
                                                    <?php the_content(); ?>
                                                </div>
                                            </article>
                                            <?php
                                        }

                                        /*
                                         * Address
                                         */
                                        $inspiry_address = null;
                                        if ( isset( $contact_meta_data[ 'inspiry_address' ] ) ) {
                                            $inspiry_address = $contact_meta_data[ 'inspiry_address' ][ 0 ];
                                        }

                                        if ( !empty( $inspiry_address ) ) {
                                            ?>
                                            <div class="address-wrapper">
                                                <h3 class="list-title"><?php _e( 'Address', 'inspiry' ); ?></h3>
                                                <address>
                                                    <i class="fa fa-map-marker"></i>
                                                    <?php echo esc_html( $inspiry_address ); ?>
                                                </address>
                                            </div>
                                            <?php
                                        }
                                        ?>


                                        <div class="row">

                                            <?php
                                            $inspiry_phone = null;
                                            if ( isset( $contact_meta_data[ 'inspiry_phone' ] ) ) {
                                                $inspiry_phone = $contact_meta_data[ 'inspiry_phone' ][ 0 ];
                                            }

                                            $inspiry_mobile = null;
                                            if ( isset( $contact_meta_data[ 'inspiry_mobile' ] ) ) {
                                                $inspiry_mobile = $contact_meta_data[ 'inspiry_mobile' ][ 0 ];
                                            }

                                            $inspiry_fax = null;
                                            if ( isset( $contact_meta_data[ 'inspiry_fax' ] ) ) {
                                                $inspiry_fax = $contact_meta_data[ 'inspiry_fax' ][ 0 ];
                                            }

                                            $inspiry_display_email = null;
                                            if ( isset( $contact_meta_data[ 'inspiry_display_email' ] ) ) {
                                                $inspiry_display_email = trim($contact_meta_data[ 'inspiry_display_email' ][ 0 ]);
                                                $inspiry_display_email = is_email( $inspiry_display_email );
                                            }

                                            if ( !empty( $inspiry_phone ) || !empty( $inspiry_mobile ) || !empty( $inspiry_fax ) ) {
                                                $template_svg_path = get_template_directory() . '/images/svg/';
                                                ?>
                                                <div class="col-sm-6">
                                                    <h3 class="list-title"><?php _e( 'Contact Details', 'inspiry' ); ?></h3>
                                                    <ul class="contacts-list">
                                                        <?php
                                                        /*
                                                         * Phone
                                                         */
                                                        if ( !empty( $inspiry_phone ) ) {
                                                            ?>
                                                            <li class="phone">
                                                            <?php include( $template_svg_path . 'icon-phone.svg' ); ?><span class="hidden-xs"><?php echo esc_html( $inspiry_phone ); ?></span>
                                                            <a class="visible-xs-inline-block" href="tel://<?php echo esc_attr( $inspiry_phone ); ?>" title="Make a Call"><?php echo esc_html( $inspiry_phone ); ?></a>
                                                            </li>
                                                            <?php
                                                        }

                                                        /*
                                                         * Mobile
                                                         */
                                                        if ( !empty( $inspiry_mobile ) ) {
                                                            ?>
                                                            <li class="mobile">
                                                                <?php include( $template_svg_path . 'icon-mobile.svg' ); ?><span class="hidden-xs"><?php echo esc_html( $inspiry_mobile ); ?></span>
                                                                <a class="visible-xs-inline-block" href="tel://<?php echo esc_attr( $inspiry_mobile ); ?>" title="<?php _e( 'Make a Call', 'inspiry' ) ?>"><?php echo esc_html( $inspiry_mobile ); ?></a>
                                                            </li>
                                                            <?php
                                                        }

                                                        /*
                                                         * Fax
                                                         */
                                                        if ( !empty( $inspiry_fax ) ) {
                                                            ?><li class="fax"><?php include( $template_svg_path . 'icon-fax.svg' ); ?><?php echo esc_html( $inspiry_fax ); ?></li><?php
                                                        }

                                                        /*
                                                         * Display Email
                                                         */
                                                        if ( !empty( $inspiry_display_email ) ) {
                                                            ?>
                                                            <li class="email">
                                                                <?php include( $template_svg_path . 'icon-email.svg' ); ?><a href="mailto:<?php echo antispambot( $inspiry_display_email ); ?>"><?php echo esc_html( $inspiry_display_email ); ?></a>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                                <?php
                                            }

                                            /*
                                             * Working Hours
                                             */
                                            $inspiry_work_hours = null;
                                            if ( isset( $contact_meta_data[ 'inspiry_work_hours' ] ) ) {
                                                $inspiry_work_hours = maybe_unserialize( $contact_meta_data[ 'inspiry_work_hours' ][ 0 ] );
                                            }

                                            if ( !empty( $inspiry_work_hours ) ) {
                                                ?>
                                                <div class="col-sm-6">
                                                    <h3 class="list-title"><?php _e( 'Working Hours', 'inspiry' ); ?></h3>
                                                    <ul class="contacts-list">
                                                        <?php
                                                        foreach ( $inspiry_work_hours as $key=>$value ) {
                                                            if ( $key == 0 ) {
                                                                ?><li class="icon-clock"><?php include( $template_svg_path . 'icon-clock.svg' ); ?><?php echo esc_html( $value ); ?></li><?php
                                                            } else {
                                                                ?><li class="icon-clock"><?php echo esc_html( $value ); ?></li><?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                        </div>

                                    </div>


                                    <?php
                                    /*
                                     * Contact form
                                     */
                                    $inspiry_form_heading = null;
                                    if ( isset( $contact_meta_data[ 'inspiry_form_heading' ] ) ) {
                                        $inspiry_form_heading = $contact_meta_data[ 'inspiry_form_heading' ][ 0 ];
                                    }

                                    $inspiry_email = null;
                                    if ( isset( $contact_meta_data[ 'inspiry_email' ] ) ) {
                                        $inspiry_email = trim($contact_meta_data[ 'inspiry_email' ][ 0 ]);
                                        $inspiry_email = is_email( $inspiry_email );
                                    }

                                    $inspiry_contact_form_7 = null;
                                    if ( isset( $contact_meta_data[ 'inspiry_contact_form_7' ] ) ) {
                                        $inspiry_contact_form_7 = $contact_meta_data[ 'inspiry_contact_form_7' ][ 0 ];
                                    }
				
                                    if ( $inspiry_email ) {
                                        ?>
                                        <div class="col-md-6 col-right-side contact-form-wrapper">

                                            <section id="contact-form-section">

                                                <?php
                                                if ( !empty( $inspiry_form_heading ) ) {
                                                    ?><h3 class="contact-form-heading"><?php echo esc_html( $inspiry_form_heading ); ?></h3><?php
                                                }
                                                ?>

                                                <form id="contact-form" class="contact-form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post" novalidate="novalidate">

                                                    <p><input id="name" class="required" name="name" type="text" placeholder="<?php _e( 'Name*', 'inspiry' ); ?>" title="<?php _e( '* Please provide your name', 'inspiry' ); ?>"></p>

                                                    <p><input id="email" class="email required" name="email" type="text" placeholder="<?php _e( 'Email*', 'inspiry' ); ?>" title="<?php _e( '* Please provide a valid email address', 'inspiry' ); ?>"></p>

                                                    <p><input id="number" name="number" type="text" placeholder="<?php _e( 'Number', 'inspiry' ); ?>"></p>

                                                    <p><textarea id="comment" class="required" name="message" placeholder="<?php _e( 'Message*', 'inspiry' ); ?>" title="<?php _e( '* Please provide your message', 'inspiry' ); ?>"></textarea></p>

                                                    <?php get_template_part( 'partials/common/google-reCAPTCHA' ); ?>

                                                    <div class="clearfix">
                                                        <input type="submit" id="submit-button" name="submit" class="btn-small btn-orange pull-right" value="<?php _e( 'Send Message', 'inspiry' ); ?>">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif" id="ajax-loader" class="pull-right" alt="Loading...">
                                                        <input type="hidden" name="action" value="inspiry_send_message" />
                                                        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('send_message_nonce'); ?>"/>
                                                        <input type="hidden" name="target" value="<?php echo antispambot( $inspiry_email ); ?>">
                                                    </div>

                                                    <div id="error-container"></div>
                                                    <div id="message-container">&nbsp;</div>

                                                </form>

                                            </section>

                                        </div>
                                        <?php
                                    } else if ( !empty( $inspiry_contact_form_7 ) ) {
                                        ?>
                                        <div class="col-md-6 col-right-side contact-form-wrapper">

                                            <section id="contact-form-section">

                                                <?php
                                                if ( !empty( $inspiry_form_heading ) ) {
                                                    ?><h3 class="contact-form-heading"><?php echo esc_html( $inspiry_form_heading ); ?></h3><?php
                                                }
                                                ?>

                                                <div class="inspiry-contact-form-wrapper">
                                                    <?php echo do_shortcode( $inspiry_contact_form_7 ); ?>
                                                </div>

                                            </section>

                                        </div>
                                        <?php
                                    }

                                endwhile;

                            endif;
                            ?>

                            </div>

                        </main>
                        <!-- .site-main -->

                    </div>
                    <!-- .site-main-content -->

                </div>
                <!-- .row -->

            </div>
            <!-- .container -->

        </div>
        <!-- .site-content -->

    </div><!-- .site-content-wrapper -->

<?php
get_footer();
?>