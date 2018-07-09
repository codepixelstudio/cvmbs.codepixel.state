<?php

    // $left_menu = wp_get_nav_menu_object( $)
    $locations   = get_nav_menu_locations();
    $left_menu   = get_term( $locations[ 'footer-menu-left' ], 'nav_menu' );
    $center_menu = get_term( $locations[ 'footer-menu-center' ], 'nav_menu' );
    $right_menu  = get_term( $locations[ 'footer-menu-right' ], 'nav_menu' );

    $left_menu_name   = $left_menu->name;
    $center_menu_name = $center_menu->name;
    $right_menu_name  = $right_menu->name;

?>

                <!-- site.footer -->
                <footer id="site-footer" class="ui-element layout-element homepage hidden">

                    <!-- links.row -->
                    <div class="footer-row-top columns">

                        <!-- links.column -->
                        <column id="footer-left" class="footer-column links narrow">

                            <span class="links-header">

                                <?php echo $left_menu_name; ?>

                            </span>

                            <?php footer_left_menu(); ?>

                        </column>
                        <!-- END links.column -->

                        <!-- links.column -->
                        <column id="footer-center" class="footer-column links wide">

                            <span class="links-header">

                                <?php echo $center_menu_name; ?>

                            </span>

                            <?php footer_center_menu(); ?>

                        </column>
                        <!-- END links.column -->

                        <!-- links.column -->
                        <column id="footer-right" class="footer-column links default">

                            <span class="links-header">

                                <?php echo $right_menu_name; ?>

                            </span>

                            <?php footer_right_menu(); ?>

                        </column>
                        <!-- END links.column -->

                        <!-- links.column -->
                        <column id="footer-drawer" class="footer-column content">

                            <span class="links-header">

                                get in touch

                            </span>

                            <div id="contact-info">

                                <!-- {{> contact.footer }} -->

                            </div>

                            <div class="social-media-links">

                                {{> social.media }}

                            </div>

                            <!-- {{> button.campaign }} -->

                        </column>
                        <!-- END links.column -->

                    </div>
                    <!-- END links.row -->

                    <!-- links.row -->
                    <div class="footer-row-bottom links">

                        <?php get_template_part( 'elements/links/links.required' ); ?>

                        <!-- brand.state -->
                        <button id="brand-legacy" class="footer-button" data-link="http://colostate.edu">

                            <svg x="0px" y="0px" viewBox="0 0 256 32" enable-background="new 0 0 256 32" xml:space="preserve">

                				<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M45,11.9h5.6v3l2.3-2.7c0.6-0.7,2-0.9,3.5,0.3l-0.8,4.4 c-0.8-1.1-1.9-1.9-3-1.9c-1,0-2,0.7-2,2.2V21c0,1.4,0.4,1.8,1.9,1.9v0.5h-7.4l0-0.5c1.4,0,1.8-0.5,1.8-1.9v-7 c0-1.3-0.5-1.7-1.9-1.7V11.9L45,11.9z"/>

                				<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M15.1,20.1c-1.4,1.6-3.5,3.6-6.8,3.7c-3.2,0.1-8.4-1.8-8.3-8 c0.1-6.2,5.9-7.8,8.5-7.9c2-0.1,4.6,0.8,4.9,0.9c0.5,0,0.8-0.3,0.8-0.7h0.5l0.1,5.5l-0.6,0.2c-0.3-1.6-0.8-4.7-4.7-4.8 c-6.9-0.1-6.8,12.6-0.2,13c1.4,0.1,3.6-0.7,5.4-2.7L15.1,20.1L15.1,20.1z"/>

                				<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M39.3,11.9c3.7,0,6.7,2.6,6.7,5.9c0,3.3-3,5.9-6.7,5.9 c-3.7,0-6.7-2.6-6.7-5.9C32.7,14.5,35.6,11.9,39.3,11.9L39.3,11.9z M39.3,12.8c1.8,0,3.3,2.2,3.3,4.9c0,2.7-1.5,4.9-3.3,4.9 c-1.8,0-3.3-2.2-3.3-4.9C36,15,37.5,12.8,39.3,12.8L39.3,12.8z"/>

                				<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M86.5,11.9c3.7,0,6.7,2.6,6.7,5.9c0,3.3-3,5.9-6.7,5.9 c-3.7,0-6.6-2.6-6.6-5.9C79.9,14.5,82.9,11.9,86.5,11.9L86.5,11.9z M86.5,12.8c1.8,0,3.3,2.2,3.3,4.9c0,2.7-1.5,4.9-3.3,4.9 c-1.8,0-3.3-2.2-3.3-4.9C83.2,15,84.7,12.8,86.5,12.8L86.5,12.8z"/>

                				<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M31.8,21.1c0,1.3,0.4,1.8,1.8,1.9v0.5h-7.2v-0.5 c1.4,0,1.7-0.5,1.7-2v-11c-0.1-1.2-0.4-1.4-1.8-1.5V7.9h5.5V21.1L31.8,21.1z"/>

                				<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M62.2,17.5l0,2.7c0,1.2-0.6,1.9-1.7,1.9c-1.3,0-1.8-1-1.8-2 c0-0.7,0.4-1.2,0.9-1.5L62.2,17.5L62.2,17.5z M56.1,16.2c0.2-3,2.9-4.3,5.2-4.3c2.1,0,4.5,1.4,4.5,3.2v5.8c0,1,0.5,1.4,1.4,0.9 c-0.3,1.1-1.4,1.9-2.3,1.9c-1,0-1.9-0.5-2.4-1.8c-1.2,1.1-2.4,1.7-3.8,1.7c-2.2,0.1-3.1-1.5-3.2-2.8c-0.1-1.4,0.8-2.5,2.4-3 l3.9-1.2c1-0.3,0.7-1.8-0.5-2.3C59.2,13.6,57.4,14.4,56.1,16.2L56.1,16.2z"/>

                				<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M73.4,7.9h5.4v13.3c0,0.8,0.5,1.5,1.7,1.8v0.5h-7.6 c-4.6,0-6.3-2.6-6.3-5.8c0-2.7,2.1-5.7,5.4-5.7c1.2,0,2.5,0.3,3.3,1.2l0-3.3c0-1.5-0.4-1.4-1.9-1.6V7.9L73.4,7.9z M72.9,13.1 c1.3,0,2.3,0.5,2.3,2.1v6.3c0,0.6-0.5,1.2-1.3,1.2c-2.3-0.1-3.8-2.6-3.9-5C69.9,15.7,70.8,13.1,72.9,13.1L72.9,13.1z"/>

                				<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M20.7,11.9c3.7,0,6.7,2.6,6.7,5.9c0,3.3-3,5.9-6.7,5.9 c-3.7,0-6.7-2.6-6.7-5.9C14,14.5,17,11.9,20.7,11.9L20.7,11.9z M20.6,12.8c1.8,0,3.3,2.2,3.3,4.9c0,2.7-1.5,4.9-3.3,4.9 c-1.8,0-3.3-2.2-3.3-4.9C17.3,15,18.8,12.8,20.6,12.8L20.6,12.8z"/>

                				<path fill="#FFFFFF" d="M233.7,11.9v9.2c0,1.6,0.6,1.8,1.9,1.9v0.5h-7.2V23c0.7,0,1.1-0.2,1.4-0.4c0.4-0.4,0.4-1,0.4-1.7v-6 c0-0.7,0-1.7-0.2-2c-0.3-0.3-0.5-0.6-1.7-0.6v-0.5L233.7,11.9z M229.9,6.9c0-2.5,4.1-2.5,4.1,0C233.9,9.4,229.9,9.4,229.9,6.9"/>

                				<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M208.3,11.9h5.6v3l2.3-2.7c0.6-0.7,2-0.9,3.5,0.3l-0.8,4.3 c-0.8-1.1-1.9-1.9-3-1.9c-1,0-2,0.7-2,2.2V21c0,1.4,0.4,1.8,1.9,1.9v0.5h-7.3l0-0.5c1.4,0,1.8-0.5,1.8-1.9v-7 c0-1.3-0.5-1.7-1.9-1.7V11.9L208.3,11.9z"/>

                				<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M197.1,18.2c-0.1-4.1,2.8-6.2,6.6-6.3c3.5,0,5,2.1,5.2,5.1h-8 c-0.1,2.6,1.5,5,3.5,5.1c1.6,0.1,2.9-0.1,4.7-2.6l0.4,0.4c-0.6,2-2.5,3.9-5.9,3.9C201,23.7,197.2,22.1,197.1,18.2L197.1,18.2z M201,15.8h4.2c0.1-1.6-0.9-2.9-1.9-2.9C202.2,12.9,201.1,14.1,201,15.8L201,15.8z"/>

                				<path fill="#FFFFFF" d="M170.1,11.9v2.7h0c1.1-1.8,2.5-2.7,4.2-2.7c1.1,0,2,0.4,2.7,1.1c0.7,0.7,1.1,1.7,1.1,2.9v4.9 c0,0.7,0.1,1.5,0.5,1.7c0.3,0.2,0.5,0.3,1.3,0.4v0.5h-6.8v-0.5c0.6,0,1-0.1,1.3-0.4c0.4-0.3,0.4-1,0.4-1.6v-4.6 c0-0.8-0.2-1.5-0.5-2c-0.4-0.5-0.9-0.7-1.5-0.7c-1.1,0-2.1,0.7-2.8,2v5.2c0,0.9,0.1,1.4,0.5,1.8c0.3,0.2,0.5,0.3,1.1,0.4v0.4h-6.7 V23c0.3,0,0.8-0.1,1.1-0.3c0.5-0.4,0.5-1.1,0.5-1.6v-6.2c0-1.4-0.1-1.8-0.4-2.1c-0.3-0.3-0.7-0.4-1.4-0.4v-0.5h4.8H170.1z"/>

                				<path fill="#FFFFFF" d="M184.5,11.9v9.2c0,1.6,0.6,1.8,1.9,1.9v0.5h-7.2V23c0.7,0,1.1-0.2,1.4-0.4c0.4-0.4,0.4-1,0.4-1.7v-6c0-0.7,0-1.7-0.2-2c-0.3-0.3-0.5-0.6-1.7-0.6v-0.5L184.5,11.9z M180.7,6.9c0-2.5,4.1-2.5,4.1,0C184.8,9.4,180.7,9.4,180.7,6.9"/>

                				<path fill="#FFFFFF" d="M198.8,11.9v0.5c-0.6,0.1-1,0.3-1.5,0.7c-0.4,0.4-0.8,1-1.3,1.9l-4.1,8.5h-0.6l-4.3-8.7 c-0.5-0.9-0.9-1.5-1.3-1.8c-0.4-0.3-0.9-0.5-1.5-0.5v-0.5h7.1v0.5c-0.7,0.1-1.1,0.5-1.1,1c0,0.2,0.1,0.5,0.2,0.8l2.6,5.1l2-4.1 c0.3-0.6,0.5-1.1,0.5-1.6c0-0.8-0.5-1.2-1.4-1.2v-0.5H198.8z"/>

                				<path fill="#FFFFFF" d="M219.7,23.1v-3.6h0.5c1.2,2.3,2.6,3.4,4.2,3.4c0.6,0,1-0.2,1.5-0.5c0.4-0.3,0.6-0.7,0.6-1.1 c0-0.5-0.2-0.9-0.6-1.2c-0.4-0.3-1.2-0.7-2.4-1.2c-1.6-0.6-2.6-1.1-3.1-1.7c-0.5-0.5-0.7-1.2-0.7-2c0-0.9,0.4-1.7,1.1-2.4 c0.8-0.6,1.7-1,2.9-1c0,0,2.9,0.1,4.3,0.8v2.6h-0.5c-0.3-0.8-0.8-1.5-1.5-1.9c-0.6-0.5-1.3-0.7-2.1-0.7c-0.6,0-1,0.1-1.4,0.3 c-0.4,0.2-0.6,0.5-0.6,0.9c0,0.3,0.2,0.7,0.5,0.9c0.3,0.3,1,0.6,2.1,1c1.7,0.6,2.8,1.2,3.4,1.8c0.6,0.6,0.8,1.4,0.8,2.3 c0,1-0.4,1.9-1.3,2.7c-0.9,0.7-1.8,1.1-2.9,1.1C224.5,23.7,222.3,23.8,219.7,23.1"/>

                				<path fill="#FFFFFF" d="M160.4,23.5v-2.1c-0.9,1-1.7,1.6-2.4,2c-0.7,0.3-1.5,0.5-2.5,0.5c-1.6,0-2.9-0.5-3.8-1.4 c-1-0.9-1.4-2.2-1.4-3.8v-8.1c0-0.7,0-1.4-0.3-1.8c-0.3-0.3-0.9-0.4-1.4-0.4l0-0.5h5.3l0,11.4c0,0.9,0.3,1.7,0.8,2.2 c0.5,0.5,1.2,0.8,2.1,0.8c1.3,0,2.4-0.7,3.8-2.2v-9.7c0-1.4-0.1-1.5-0.4-1.8c-0.2-0.3-1-0.4-1.4-0.4V7.9h5.1l0,12.9 c0,1,0.1,1.5,0.4,1.7c0.3,0.3,0.7,0.4,1.5,0.4v0.5H160.4z"/>

                				<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M133.7,18.2c-0.1-4.1,2.8-6.2,6.6-6.3c3.5,0,5,2.1,5.2,5.1h-8 c-0.1,2.6,1.5,5,3.5,5.1c1.6,0.1,2.9-0.1,4.7-2.6l0.4,0.4c-0.6,2-2.4,3.9-5.9,3.9C137.6,23.7,133.8,22.1,133.7,18.2L133.7,18.2z M137.6,15.8h4.2c0.1-1.6-0.9-2.9-1.9-2.9C138.8,12.9,137.7,14.1,137.6,15.8L137.6,15.8z"/>

                				<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M130.7,6.5l0.5,0.2l0,5.2l3.5,0l0,1.2l-3.5,0l0,6.5 c0,2.4,1.9,2.8,3.3,1.1c0-0.1,0.4,0.5,0.4,0.4c-1.1,2.2-3.1,3.2-5.4,2.3c-1.1-0.5-2.2-1.5-2.2-3.4v-7h-1.5l0-1.2 C128.3,11.3,130.2,9.8,130.7,6.5L130.7,6.5z"/>

                				<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M108.3,6.7l0,5.1c2.6-1.1,3.4-2.1,4-5.3l0.5,0.1l0,5.2h3.5l0,1.2h-3.5l0,6.2c0,1.9,0.9,3,3.1,1.9l0.3,0.7c-0.8,1.5-2.8,1.9-4.1,1.8c-2.1-0.1-3.1-1.8-3.1-4.1V13l-1.3,0c-0.1-3.4-1.7-6.3-4.3-6.3 c-1.2,0-3.3,1-3.4,3c0,0.9,0.2,1.5,1.1,2.1l5.4,4.2c1.3,1,2.8,3.8,1.9,6.8c-0.7,2.4-3.8,3.8-6.2,3.9c-2.6,0.1-5.1-1.4-6.4-3.9 l0.6-0.3c1,1.5,3.2,3,5.4,2.4c2.5-0.6,3.6-4.3,1-6.5l-4.6-3.8c-3.2-2.6-2.1-6.8,1.3-8.3C101,5.9,104.7,5.2,108.3,6.7L108.3,6.7z"/>

                				<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M122.2,17.5l0,2.7c0,1.2-0.6,1.9-1.7,1.9c-1.2,0-1.8-1-1.8-2 c0-0.7,0.3-1.2,0.9-1.5L122.2,17.5L122.2,17.5z M116.2,16.2c0.2-3.1,2.8-4.3,5-4.3c2,0,4.4,1.4,4.4,3.2v5.8c0,1,0.5,1.4,1.4,1 c-0.3,1.1-1.4,1.9-2.3,1.9c-1,0-1.9-0.5-2.3-1.8c-1.1,1.1-2.4,1.7-3.7,1.7c-2.1,0.1-3-1.5-3.1-2.8c-0.1-1.4,0.7-2.5,2.3-3l3.8-1.1 c0.9-0.3,0.7-1.8-0.5-2.3C119.2,13.6,117.4,14.4,116.2,16.2L116.2,16.2z"/>

                				<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M238.9,6.5l0.5,0.2l0,5.2l3.5,0l0,1.2l-3.5,0l0,6.5 c0,2.4,1.9,2.8,3.3,1.1c0-0.1,0.4,0.5,0.4,0.4c-1.1,2.2-3.1,3.2-5.4,2.3c-1.1-0.5-2.2-1.5-2.2-3.4v-7H234l0-1.1 C236.5,11.5,238.4,9.8,238.9,6.5L238.9,6.5z"/>

                				<path fill="#FFFFFF" d="M250.8,11.9v0.5c1,0.2,1.5,0.7,1.5,1.5c0,0.6-0.2,1.3-0.7,2.3l-1.7,3.8l-2.6-5.2c-0.3-0.7-0.5-1.2-0.5-1.5 c0-0.5,0.4-0.8,1.2-0.9v-0.5h-7.6v0.5c0.8,0.2,1.4,0.4,1.8,0.8c0.4,0.3,0.8,1,1.3,1.9l4.6,9.3c-0.6,1.2-1.1,2.1-1.7,2.7 c-0.8,0.8-1.7,1.2-2.8,1.2c-0.5,0-1.1-0.1-1.7-0.3l-0.8,3.6c0.3,0,0.7,0.1,1.1,0.1c1.3,0,2.4-0.3,3.2-0.9c0.8-0.6,1.5-1.6,2.2-3.1 l5.6-12.2c0.5-1.1,1-1.9,1.3-2.2c0.4-0.4,0.9-0.6,1.7-0.8v-0.5H250.8z"/>

                			</svg>

                        </button>
                        <!-- END brand.state -->

                    </div>
                    <!-- END links.row -->

                </footer>
                <!-- END site.footer -->

            </section>
            <!-- END content.homepage -->

        </main>
        <!-- site.layout -->

        <?php get_template_part( 'elements/menus/menu.site' ); ?>

        <?php wp_footer(); ?>

        <script src="<?php echo get_stylesheet_directory_uri(); ?>/src/assets/js/library/velocity.ui.min.js"></script>
        <script id="__bs_script__">

            //<![CDATA[
                document.write("<script async src='//HOST:3000/browser-sync/browser-sync-client.js?v=2.18.13'><\/script>".replace("HOST", location.hostname));
            //]]>

        </script>

        <script id="cartographer_script">

            function cartographer() {

                map = new google.maps.Map( document.getElementById( 'research-map' ), {

                    center : {

                        // lat : 40.58526,
                        lat : 20.58526,
                        // lng : -105.084423
                        lng : -75.084423

                    },
                    zoom            : 5,
                    // gestureHandling : 'cooperative',
                    styles          : [

                        {
                            "featureType": "all",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "saturation": 36
                                },
                                {
                                    "color": "#333333"
                                },
                                {
                                    "lightness": 40
                                }
                            ]
                        },
                        {
                            "featureType": "all",
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "visibility": "on"
                                },
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 16
                                }
                            ]
                        },
                        {
                            "featureType": "all",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#fefefe"
                                },
                                {
                                    "lightness": 20
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#fefefe"
                                },
                                {
                                    "lightness": 17
                                },
                                {
                                    "weight": 1.2
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.country",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.province",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.locality",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.neighborhood",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f5f5f5"
                                },
                                {
                                    "lightness": 20
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#c1c1c1"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape.natural",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape.natural.landcover",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape.natural.terrain",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f5f5f5"
                                },
                                {
                                    "lightness": 21
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#dedede"
                                },
                                {
                                    "lightness": 21
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 17
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 29
                                },
                                {
                                    "weight": 0.2
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 18
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 16
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f2f2f2"
                                },
                                {
                                    "lightness": 19
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#e9e9e9"
                                },
                                {
                                    "lightness": 17
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#a4a4a4"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        }

                    ]

                });

            }

        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYeLfPHr4SEYg0sGxkP-3_xWF4FiD5vHI&callback=cartographer" async defer>
        </script>

        </body>

    </html>
