<?php

// Function to get a blog/site's domain mapped url.
// 
// You need to call it with a blog ID
// 
// Example:
//   $custom_blog_id = '14';
//   echo get_domain_mapped_url( $custom_blog_id );
// 
// 
// Borrowed and modified from Donncha's WordPress MU Domain Mapping domain-mapping.php domain_mapping_siteurl() function.
// http://wordpress.org/extend/plugins/wordpress-mu-domain-mapping/
// 
// I use it with the get_blogs_of_user() function in a foreach loop to show all the users sites in a list.

function get_domain_mapped_url( $custom_blog_id ) {
		
        // Enable WordPress DB connection
        global $wpdb;

        // To reduce the number of database queries, save the results the first time we encounter each blog ID.
        static $return_url = array();

        $wpdb->dmtable = $wpdb->base_prefix . 'domain_mapping';

        if ( !isset( $return_url[ $custom_blog_id ] ) ) {
                $s = $wpdb->suppress_errors();

                if ( get_site_option( 'dm_no_primary_domain' ) == 1 ) {
                        $domain = $wpdb->get_var( "SELECT domain FROM {$wpdb->dmtable} WHERE blog_id = '{$custom_blog_id}' AND domain = '" . $wpdb->escape( $_SERVER[ 'HTTP_HOST' ] ) . "' LIMIT 1" );
                        if ( null == $domain ) {
                                $return_url[ $custom_blog_id ] = untrailingslashit( get_site_url( $custom_blog_id ) );
                                return $return_url[ $custom_blog_id ];
                        }
                } else {
                        // get primary domain, if we don't have one then return original url.
                        $domain = $wpdb->get_var( "SELECT domain FROM {$wpdb->dmtable} WHERE blog_id = '{$custom_blog_id}' AND active = 1 LIMIT 1" );
                        if ( null == $domain ) {
                                $return_url[ $wpdb->blogid ] = untrailingslashit( get_site_url( $custom_blog_id ) );
                                return $return_url[ $custom_blog_id ];
                        }
                }

                $wpdb->suppress_errors( $s );
                if ( false == isset( $_SERVER[ 'HTTPS' ] ) )
                        $_SERVER[ 'HTTPS' ] = 'Off';
                $protocol = ( 'on' == strtolower( $_SERVER[ 'HTTPS' ] ) ) ? 'https://' : 'http://';
                if ( $domain ) {
                        $return_url[ $custom_blog_id ] = untrailingslashit( $protocol . $domain  );
                        $setting = $return_url[ $custom_blog_id ];
                } else {
                        $return_url[ $custom_blog_id ] = false;
                }
        } elseif ( $return_url[ $custom_blog_id ] !== FALSE) {
                $setting = $return_url[ $custom_blog_id ];
        }

        return $setting;
}

?>