<?php

    $homepage_options = get_field( 'dvm_homepage_options' );

    $billboard_content = $homepage_options[ 'billboard_content' ];

    // homepage alert
    $homepage_alert   = get_field( 'homepage_alert' );

    // option
    $alert_option = $homepage_alert[ 'alert_option' ];

    $billboard_config = get_field( 'college_homepage_options' );
    $post             = $billboard_config[ 'homepage_billboard' ];

?>

<!-- special.billboard -->
<section id="special-billboard" class="ui-billboard pattern" tabindex="-1" style="background-image:url(<?php echo $billboard_content[ 'image' ]; ?>);">

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

    <!-- overlay -->
    <div class="billboard-overlay">

        <!--  -->

    </div>
    <!-- END overlay -->

    <!-- content -->
    <div id="billboard-container">

        <!-- content -->
        <div id="billboard-content">

            <!-- headline -->
            <span class="headline">

                <?php echo $billboard_content[ 'headline' ]; ?>

            </span>
            <!-- END headline -->

            <!-- text -->
            <span class="text">

                <?php echo $billboard_content[ 'subheadline' ]; ?>

            </span>
            <!-- END text -->

        </div>
        <!-- END content -->

        <!-- buttons -->
        <div id="billboard-buttons">

            <?php $homepage_links = $billboard_content[ 'links' ]; ?>

            <?php foreach( $homepage_links as $homepage_link ) : ?>

            <!-- link -->
            <a id="button-explore" class="button-link" href="<?php echo $homepage_link[ 'link' ]; ?>">

                <!-- title -->
                <span class="button-title">

                    <?php echo $homepage_link[ 'title' ]; ?>

                </span>
                <!-- END title -->

                <!-- text -->
                <span class="button-text">

                    <?php echo $homepage_link[ 'text' ]; ?>

                </span>
                <!-- END text -->

            </a>
            <!-- END link -->

            <?php endforeach; ?>

        </div>
        <!-- END buttons -->

    </div>
    <!-- END content -->

</section>
<!-- END special.billboard -->
