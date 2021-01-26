<?php

    $homepage_options = get_field( 'dvm_homepage_options' );

    $billboard_content = $homepage_options[ 'billboard_content' ];

    $billboard_config = get_field( 'college_homepage_options' );
    $post             = $billboard_config[ 'homepage_billboard' ];

?>

<!-- special.billboard -->
<section id="special-billboard" class="ui-billboard pattern" tabindex="-1" style="background-image:url(<?php echo $billboard_content[ 'image' ]; ?>);">

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
