<?php 
/**
 * Change the custom logo URL
 */
function my_custom_logo_link() {

    // The logo
    $custom_logo_id = get_theme_mod( 'custom_logo' );

    // If has logo
    if ( $custom_logo_id ) {

        // Attr
        $custom_logo_attr = array(
            'class'    => 'custom-logo',
            'itemprop' => 'logo',
        );

        // Image alt
        $image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
        if ( empty( $image_alt ) ) {
            $custom_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
        }

        // Get the image
        $html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
            esc_url( 'https://360pms.co.uk' ),
            wp_get_attachment_image( $custom_logo_id, 'full', false, $custom_logo_attr )
        );

    }

    // Return
    return $html;   
}
add_filter( 'get_custom_logo', 'my_custom_logo_link' );
