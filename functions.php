<?php

    // custom admin
    require_once( 'library/admin.php' );

    // directory
    // require_once( 'library/directory/directory.php' );

    // composer
    // require_once( 'vendor/autoload.php' );

    // various clean up functions
    require_once( 'library/cleanup.php' );

    // foundation framework core
    require_once( 'library/foundation.php' );

    // menus
    require_once( 'library/menus/menus.php' );

    // utilities
    require_once( 'library/utilities.php' );

    // custom fields
    // require_once( 'library/custom.fields/custom.fields.php' );

    // taxonomy pages
    require_once( 'library/taxonomy.php' );

    // post types
    require_once( 'library/post.types.php' );

    // options pages
    require_once( 'library/options.php' );

    // sidebars
    require_once( 'library/sidebars/sidebars.php' );

    // menu walkers
    require_once( 'library/class-foundationpress-top-bar-walker.php' );
    require_once( 'library/class-foundationpress-mobile-walker.php' );

    // widget areas
    // require_once( 'library/widget-areas.php' );

    // entry meta for posts
    require_once( 'library/entry-meta.php' );

    // custom metaboxes
    require_once( 'library/metaboxes.php' );

    // enqueue scripts
    require_once( 'library/enqueue-scripts.php' );

    // theme support
    require_once( 'library/theme.support.php' );

    // customizer nav options
    require_once( 'library/custom-nav.php' );

    // sticky post class (REMOVE)
    require_once( 'library/sticky-posts.php' );

    // responsive image sizes
    require_once( 'library/responsive-images.php' );

    // protocol relative urls
    // require_once( 'library/class-foundationpress-protocol-relative-theme-assets.php' );

    // custom image sizes
    add_image_size( 'x-large', 1920, 1920, false );

    // register CSS & JS for ACF Flexible Content thumbnails
    function acf_flexible_content_thumbnails() {
        // register admin.css
        wp_enqueue_style( 'css-theme-admin', get_template_directory_uri().'/dist/assets/css/admin.css', 1.0, false );

        // register admin.js
        wp_register_script( 'js-theme-admin', get_template_directory_uri().'/js/cvmbs.admin.js', array('jquery'), 1.0, true );
        wp_localize_script( 'js-theme-admin', 'theme_var',
            array(
                'upload' => get_template_directory_uri().'/dist/assets/img/acf-thumbnails/',
            )
        );
        wp_enqueue_script( 'js-theme-admin' );
    }
    add_action( 'admin_enqueue_scripts', 'acf_flexible_content_thumbnails' );


    // determine if an item is expired - date should be passed in using 'Ymd' format
    function is_this_item_expired( $expiration ) {
        $expired = true;

        if ( !($expiration) ) {
            $expired = false; // if no expiration set, this item cannot expire
        } elseif ( $expiration >= date('Ymd') ) {
            $expired = false;
        }

        return $expired;
    }
