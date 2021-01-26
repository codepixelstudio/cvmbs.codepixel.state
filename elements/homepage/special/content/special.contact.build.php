<?php

    $title     = get_sub_field( 'title' );
    $location  = get_sub_field( 'location' );
    $phones    = get_sub_field( 'phone_numbers' );
    $legacy    = get_sub_field( 'phone' );
    $email     = get_sub_field( 'email' );
    $social    = get_sub_field( 'social_media_option' );
    $platforms = get_sub_field( 'social_media_links' );

?>

<!-- contact -->
<section class="contact-information special">

    <!-- content -->
    <div class="content-wrapper">

        <!-- title -->
        <h2>

            <?php echo $title; ?>

        </h2>
        <!-- END title -->

        <!-- text -->
        <p>

            <?php echo $location; ?>

        </p>
        <!-- END text -->

        <?php if ( $phones ) : ?>

        <!-- phone -->
        <div class="contact phone">

            <?php foreach ( $phones as $phone ) :

                $label = $phone[ 'label' ];
                $digits = $phone[ 'phone' ];

            ?>

            <!-- number wrap -->
            <div class="number_wrap">

                <!-- label -->
                <span class="phone_label">

                    <?php echo $label; ?>:&nbsp;

                </span>
                <!-- END label -->

                <!-- text -->
                <p>

                    <?php echo $digits; ?>

                </p>
                <!-- END text -->

            </div>
            <!-- END number wrap -->

            <?php endforeach; ?>

        </div>
        <!-- END phone -->

        <?php elseif ( $legacy ) : ?>

        <!-- phone -->
        <div class="contact phone">

            <!-- label -->
            <span class="phone_label">

                Phone:&nbsp;

            </span>
            <!-- END label -->

            <!-- text -->
            <p>

                <?php echo $legacy; ?>

            </p>
            <!-- END text -->

        </div>
        <!-- END phone -->

        <?php endif; ?>

        <?php if ( $email ) : ?>

        <!-- email -->
        <div class="contact email">

            <!-- label -->
            <span class="email_label">

                E-mail:&nbsp;

            </span>
            <!-- END label -->

            <!-- text -->
            <a class="email_link" href="mailto:<?php echo $email; ?>">

                <?php echo $email; ?>

            </a>
            <!-- END text -->

        </div>
        <!-- END email -->

        <?php endif; ?>

        <?php if ( $social ) : ?>

        <div class="social-media-links">

            <?php foreach ( $platforms as $platform ) :

                $icon_class  = $platform[ 'platform' ];
                $social_link = $platform[ 'link_url' ];

                $social_media_links = '<a class="social-link ' . $icon_class . '" href="' . $social_link . '"><span class="link-label">' . $icon_class . '</span></a>';

                echo $social_media_links;

            endforeach; ?>

        </div>

        <?php endif; ?>

    </div>
    <!-- END content -->

</section>
<!-- END contact -->
