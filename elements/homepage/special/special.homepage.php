<?php

    // template path
    $template_path = 'elements/homepage/special/content/';

    // homepage alert
    $homepage_alert   = get_field( 'homepage_alert' );

    // option
    $alert_option = $homepage_alert[ 'alert_option' ];

    $billboard_config = get_field( 'college_homepage_options' );
    $post             = $billboard_config[ 'homepage_billboard' ];

?>

<!-- site.layout -->
<main id="site-layout" class="off-canvas-content special page-template-flexible-page" data-off-canvas-content>

    <?php if ( $alert_option ) : ?>

    <?php $alert_class = 'has_alert'; ?>

    <!-- emergency alert -->
    <div id="homepage_alert" class="ui_alert <?php echo $homepage_alert[ 'alert_type' ]; ?>">

        <!-- alert text -->
        <div class="alert_text">

            <?php if ( $homepage_alert[ 'alert_title' ] ) : ?>

            <!-- title -->
            <span class="alert_title">

                <?php echo $homepage_alert[ 'alert_title' ]; ?>

            </span>
            <!-- END title -->

            <?php endif; ?>

            <!-- message -->
            <span class="alert_message">

                <?php echo $homepage_alert[ 'alert_text' ]; ?>

            </span>
            <!-- END message -->

            <!-- link -->
            <a class="alert_link" href="<?php echo $homepage_alert[ 'alert_link' ][ 'url' ]; ?>">

                <?php echo $homepage_alert[ 'alert_link' ][ 'title' ]; ?>

            </a>
            <!-- END link -->

        </div>
        <!-- END alert text -->

        <!-- dismiss alert -->
        <button id="dismiss_alert">

            <!-- label -->
            <span>

                dismiss

            </span>
            <!-- END label -->

        </button>
        <!-- END dismiss alert -->

    </div>
    <!-- END emergency alert -->

    <?php endif; ?>

    <?php

        // options
        $unit_options = get_field( 'special_homepage_options' );

        // flexible content
        $unit_content = get_field( 'special_homepage_content' );

        // billboard
        $custom_billboard = $unit_options[ 'custom_homepage_billboard' ];

    ?>

    <?php if ( $custom_billboard ) : ?>

    <?php get_template_part( 'elements/homepage/special/content/special.billboard.custom' ); ?>

    <?php else : ?>

    <?php get_template_part( 'elements/homepage/special/content/special.billboard.default' ); ?>

    <?php endif; ?>

    <!-- special.content -->
    <div id="special-content" class="homepage-content special">

        <?php

            if ( have_rows( 'special_homepage_content' ) ) :

                while ( have_rows( 'special_homepage_content' ) ) : the_row();

                    if ( get_row_layout() == 'description' ) :

                        get_template_part( $template_path . 'special.description' );

                    elseif ( get_row_layout() == 'launchpad_section' ) :

                        get_template_part( $template_path . 'special.launchpads' );

                    elseif ( get_row_layout() == 'events' ) :

                        get_template_part( $template_path . 'special.events' );

                    elseif ( get_row_layout() == 'news' ) :

                        get_template_part( $template_path . 'special.news' );

                    elseif ( get_row_layout() == 'contact' ) :

                        // get_template_part( $template_path . 'special.contact' );
                        get_template_part( $template_path . 'special.contact.build' );

                    elseif ( get_row_layout() == 'giving' ) :

                        get_template_part( $template_path . 'special.giving' );

                    else :

                        // the emptiness

                    endif;

                endwhile;

            endif;

        ?>

    </div>
    <!-- END department.content -->

    <?php get_template_part( 'elements/layout/layout.footer' ); ?>

</main>
<!-- site.layout -->
