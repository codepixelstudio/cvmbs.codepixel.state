<?php

    // base group
    $homepage_options = get_field( 'vth_homepage_options' );

    // get data
    $launchpads = $homepage_options[ 'launchpads' ];

    // count items
    $count = count( $launchpads );

    // set layout class
    switch ( true ) {

        case $count == 3 :

            $layout = 'three';
            break;

        case $count == 4 :

            $layout = 'four';
            break;

        case $count >= 4 :

            $layout = 'multiples';
            // break;

        case $count == 8 :

            $layout = 'eights';
            break;

        default :

            $layout = 'layout';

    }

?>

<!-- launchpads -->
<section id="vth-homepage-content" class="<?php echo $layout; ?>">

    <!-- pattern -->
    <div class="pattern-overlay">

        <!--  -->

    </div>
    <!-- END pattern -->

    <!-- launchpads -->
    <div class="launchpads <?php echo $layout; ?>">

    <?php foreach( $launchpads as $launchpad ) : ?>

        <?php if ( $launchpad[ 'sticky' ] ) {

            $stickiness = 'sticky';

        } else { $stickiness = 'default'; } ?>

        <?php

            echo '

                <a class="launchpad ' . $stickiness . ' lazyload" href="' . $launchpad[ 'link' ] . '" style="background-image:url(' . get_stylesheet_directory_uri() . '/dist/assets/img/utilities/pixel.gif);" data-src="' . $launchpad[ 'image' ] . '">

                    <span class="title">

                        ' . $launchpad[ 'title' ] . '

                    </span>

                </a>

            ';

        ?>

    <?php endforeach; ?>

    </div>
    <!-- END launchpads -->

</section>
<!-- END launchpads -->

<?php get_template_part( 'elements/homepage/vth/vth.homepage.news' ); ?>
