<?php

    // homepage alert
    $homepage_alert   = get_field( 'homepage_alert' );

    // option
    $alert_option = $homepage_alert[ 'alert_option' ];

    $billboard_config = get_field( 'college_homepage_options' );
    $post             = $billboard_config[ 'homepage_billboard' ];

?>

<!-- billboard.slides -->
<section id="billboard-slides" class="billboard-slides ui-slides">

    <?php if ( $alert_option ) : ?>

    <!-- emergency alert -->
    <div id="homepage_alert" class="ui_alert college <?php echo $homepage_alert[ 'alert_type' ]; ?>">

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

        // while ( $homepage_billboards->have_posts() ) : $homepage_billboards->the_post();

        $slide_name      = $post->post_name;
        $slide_image     = get_field( 'billboard_image' );
        $slide_image_url = $slide_image[ 'url' ];
        $subheadline     = get_field( 'subheadline_text' );
        $headline        = get_field( 'headline_text' );
        $description     = get_field( 'description_text' );
        $button_link     = get_field( 'button_url' );
        $button_text     = get_field( 'button_text' );

    ?>

    <!-- slide -->
    <article class="ui-slide-article" data-slide="marketing" data-index="1" data-theme="academics" data-load="false">

        <!-- container -->
        <div class="slide-container">

            <!-- slide.billboard -->
            <div class="slide-artwork">

                <!-- billboard -->
                <div class="slide-billboard" style="background-image:url(<?php echo $slide_image_url; ?>);">

                    <!--  -->

                </div>
                <!-- END billboard -->

                <!-- color.dark -->
                <div class="slide-color dark layer">

                    <!--  -->

                </div>
                <!-- END color.dark -->

                <!-- color.lite -->
                <div class="slide-color lite layer">

                    <!--  -->

                </div>
                <!-- END color.lite -->

            </div>
            <!-- END slide.billboard -->

            <!-- slide.content.container -->
            <div class="slide-content-container">

                <!-- slide.content -->
                <div class="slide-content">

                    <!-- subheadline -->
                    <span class="line subheadline">

                        <?php echo $subheadline; ?>

                    </span>
                    <!-- END subheadline -->

                    <!-- headline -->
                    <span class="line headline">

                        <?php echo $headline; ?>

                    </span>
                    <!-- END headline -->

                    <!-- description -->
                    <span class="line description">

                        <?php echo $description; ?>

                    </span>
                    <!-- END description -->

                    <!-- headline -->
                    <a href="<?php echo $button_link; ?>" class="button-link">

                        <?php echo $button_text; ?>

                    </a>
                    <!-- END headline -->

                </div>
                <!-- END slide.content -->

            </div>
            <!-- END slide.content.container -->

        </div>
        <!-- END container -->

    </article>
    <!-- END slide -->

    <?php // wp_reset_postdata(); ?>

</section>
<!-- END billboard.slides -->
