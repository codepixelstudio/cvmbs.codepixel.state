<?php

    // template path
    $template_path = 'elements/homepage/special/content/';

    $billboard_config = get_field( 'college_homepage_options' );
    $post             = $billboard_config[ 'homepage_billboard' ];

?>

<!-- site.layout -->
<main id="site-layout" class="off-canvas-content special page-template-flexible-page" data-off-canvas-content>

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
