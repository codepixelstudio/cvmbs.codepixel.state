<?php

    // remove access to appearance > themes/customizer
    function remove_sub_menus () {

        // parse URL for site path
        $siteurl = str_replace( '/', '', $siteinfo->path );

        // conditional removal
        if ( current_user_can( 'site_admin' ) ) {

            // development->wp-admin/customize.php?return=%2Fwp-admin%2F
            remove_submenu_page( 'themes.php', 'customize.php?return=%2Fwp-admin%2Findex.php' );

            // production->wp-admin/customize.php?return=%2Fwp-admin%2Findex.php
            remove_submenu_page( 'themes.php', 'customize.php?return=%2Fwp-admin%2Findex.php' );

            // hail mary full of grace
            $customizer_url = add_query_arg( 'return', urlencode( remove_query_arg( wp_removable_query_args(), wp_unslash( $_SERVER[ 'REQUEST_URI' ] ) ) ), 'customize.php' );

            // hide network wide
            remove_submenu_page( 'themes.php', $customizer_url );

            // remove backdoor access
            remove_submenu_page( 'themes.php', 'themes.php' );

        }

    }

    // action reference
    add_action( 'admin_menu', 'remove_sub_menus' );

    // if they backdoor via menus, scare them off
    add_action( 'customize_preview_init', function() {

        die( "The customizer is disabled. If you can see this message, you have wandered too far into WordPress and you need to return to the default admin area immediately. Unauthorized edits to any of the options on the left is cause for revocation of your permissions." );

    }, 1 );

?>
