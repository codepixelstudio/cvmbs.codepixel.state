<?php // homepage alert

    // homepage alert
    $homepage_alert   = get_field( 'homepage_alert' );

    // option
    $alert_option = $homepage_alert[ 'alert_option' ];

?>

<?php // if ( $alert_option ) : ?>

<!-- emergency alert -->
<div id="homepage_alert" class="ui_alert college <?php echo $homepage_alert[ 'alert_type' ]; ?>">

    <!-- UI contrast -->
    <div class="ui_contrast">

        <!--  -->

    </div>
    <!-- END UI contrast -->

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

<?php // endif; ?>
