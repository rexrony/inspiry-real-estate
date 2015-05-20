<?php
/**
 * Represents a real estate property.
 *
 * This class provides utility functions related to a real estate property.
 *
 *
 * @since      1.0.0
 * @package    Inspiry_Real_Estate
 * @subpackage Inspiry_Real_Estate/includes
 * @author     M Saqib Sarwar <saqib@inspirythemes.com>
 */

class Inspiry_Property {

    /**
     * @var int $property_id contains property post id.
     */
    private $property_id;

    /**
     * @var array property meta keys
     */
    private $meta_keys = array(
        'price'                 => 'REAL_HOMES_property_price',
        'price_postfix'         => 'REAL_HOMES_property_price_postfix',
        'custom_id'             => 'REAL_HOMES_property_id',
        'area'                  => 'REAL_HOMES_property_size',
        'area_postfix'          => 'REAL_HOMES_property_size_postfix',
        'beds'                  => 'REAL_HOMES_property_bedrooms',
        'baths'                 => 'REAL_HOMES_property_bathrooms',
        'garages'               => 'REAL_HOMES_property_garage',
        'additional_details'    => 'REAL_HOMES_additional_details',
    );

    /**
     * @var array   $meta_data  contains custom fields data related to a property
     */
    private $meta_data;


    /**
     * @param int $property_id
     */
    public function __construct( $property_id = null ) {

        if ( ! $property_id ) {
            $property_id = get_the_ID();
        }

        if ( ! $property_id ) {
            return;
        }

        $this->property_id = $property_id;
        $this->meta_data = get_post_custom( $property_id );
    }

    /**
     * Return property meta
     *
     * @param $meta_key
     * @return mixed
     */
    public function get_property_meta( $meta_key ) {
        if ( isset( $this->meta_data[ $meta_key ] ) ) {
            return $this->meta_data[ $meta_key ][0];
        } else {
            return false;
        }
    }

    /**
     * Return property custom id
     * @return bool|mixed
     */
    public function get_custom_ID(){
        if ( ! $this->property_id ) {
            return false;
        }
        return $this->get_property_meta( $this->meta_keys['custom_id'] );
    }

    /**
     * Return property area
     * @return bool|mixed
     */
    public function get_area(){
        if ( ! $this->property_id ) {
            return false;
        }
        return $this->get_property_meta( $this->meta_keys['area'] );
    }

    /**
     * Return property area postfix
     * @return bool|mixed
     */
    public function get_area_postfix(){
        if ( ! $this->property_id ) {
            return false;
        }
        return $this->get_property_meta( $this->meta_keys['area_postfix'] );
    }

    /**
     * Return property beds
     * @return bool|mixed
     */
    public function get_beds(){
        if ( ! $this->property_id ) {
            return false;
        }
        return $this->get_property_meta( $this->meta_keys['beds'] );
    }

    /**
     * Return property baths
     * @return bool|mixed
     */
    public function get_baths(){
        if ( ! $this->property_id ) {
            return false;
        }
        return $this->get_property_meta( $this->meta_keys['baths'] );
    }

    /**
     * Return property garages
     * @return bool|mixed
     */
    public function get_garages(){
        if ( ! $this->property_id ) {
            return false;
        }
        return $this->get_property_meta( $this->meta_keys['garages'] );
    }

    /**
     * Return property additional details
     * @return bool|mixed
     */
    public function get_additional_details(){
        if ( ! $this->property_id ) {
            return false;
        }
        return maybe_unserialize ( $this->get_property_meta( $this->meta_keys['additional_details'] ) );
    }

    /**
     * Display property price
     */
    public function price() {
        if ( ! $this->property_id ) {
            return false;
        }
        echo $this->get_price();
    }

    /**
     * Returns property price
     * @return string price
     */
    public function get_price() {
        if ( ! $this->property_id ) {
            return null;
        }
        $price_amount = doubleval( $this->get_property_meta( $this->meta_keys[ 'price' ] ) );
        $price_postfix = $this->get_property_meta( $this->meta_keys[ 'price_postfix' ] );
        return $this->format_price( $price_amount, $price_postfix );
    }

    /**
     * Provide formatted price
     *
     * @param int|double|float $price_amount    price amount
     * @param string $price_postfix    price post fix
     * @return null|string  formatted price
     */
    public static function format_price ( $price_amount, $price_postfix = '' ) {

        // get related plugin options
        $inspiry_real_estate = Inspiry_Real_Estate::get_instance();

        if( $price_amount ) {

            $currency_sign      = $inspiry_real_estate->get_currency_sign();
            $number_of_decimals = $inspiry_real_estate->get_number_of_decimals();
            $decimal_separator  = $inspiry_real_estate->get_decimal_separator();
            $thousand_separator = $inspiry_real_estate->get_thousand_separator();
            $currency_position  = $inspiry_real_estate->get_currency_position();

            // format price
            $formatted_price = number_format( $price_amount, $number_of_decimals, $decimal_separator, $thousand_separator );

            // add currency and post fix
            if( $currency_position == 'after' ) {
                $formatted_price = $formatted_price . $currency_sign;
            } else {
                $formatted_price = $currency_sign . $formatted_price;
            }

            if ( !empty( $price_postfix ) ) {
                $formatted_price = $formatted_price . ' ' . $price_postfix;
            }

            return $formatted_price;

        } else {
            return $inspiry_real_estate->get_empty_price_text();
        }

    }

    /**
     * Return property types
     * @return bool|null|string
     */
    public function get_types() {
        return $this->get_taxonomy_terms( 'property-type' );
    }

    /**
     * Return property status
     * @return bool|null|string
     */
    public function get_status() {
        return $this->get_taxonomy_terms( 'property-status' );
    }

    /**
     * Return taxonomy terms
     * @param $taxonomy
     * @return bool|null|string
     */
    public function get_taxonomy_terms( $taxonomy ) {

        if ( !$taxonomy || !taxonomy_exists( $taxonomy ) ) {
            return false;
        }

        if ( ! $this->property_id ) {
            return false;
        }

        $taxonomy_terms = get_the_terms( $this->property_id, $taxonomy );
        $terms_count = count( $taxonomy_terms );
        if ( 0 < $terms_count ) {
            $taxonomy_terms_str = '';
            $loop_count = 1;
            foreach ( $taxonomy_terms as $single_term ) {
                $taxonomy_terms_str .= $single_term->name;
                if ( $loop_count < $terms_count ) {
                    $taxonomy_terms_str .= ', ';
                }
                $loop_count++;
            }
            return $taxonomy_terms_str;
        }

        return null;

    }

}