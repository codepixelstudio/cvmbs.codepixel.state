<?php

    $labs = get_sites();

    global $blog_id;

?>

<!-- site.layout -->
<main id="site-layout" class="off-canvas-content labs-archive default" data-off-canvas-content style="background-image:url(<?php echo $place_image; ?>);">

	<!-- content container -->
	<div class="content-container">

        <!-- pattern -->
        <div class="pattern-overlay">

            <!--  -->

        </div>
        <!-- END pattern -->

        <!-- heading -->
        <h2 class="index-title">

            Faculty Research Laboratory Index

        </h2>
        <!-- END heading -->

        <!-- index -->
        <div id="laboratory-index">

        <?php

            // define storage array
            $labs_list = array();

            // iterate
            foreach ( $labs as $lab ) {

                $lab_url  = $lab->path;
                $lab_name = $lab->blogname;

                $lab_site = array(

                    'name' => $lab->blogname,
                    'link' => $lab->path,
                    'ID'   => $lab->blog_id

                );

                array_push( $labs_list, $lab_site );

            }

            // alphabetize
            sort( $labs_list );

            foreach ( $labs_list as $site ) {

                $lab_ID   = $site[ 'ID' ];
                $lab_url  = $site[ 'link' ];
                $lab_name = $site[ 'name' ];

                // test for template site -> skip
                if ( $lab_ID == 2 ) {

                    continue;

                }

                $labs_index .= '

                    <a class="lab-link" href="' . $lab_url . '">

                        <span class="link-label">' . $lab_name . '</span>

                    </a>

                ';

            }

            echo $labs_index;

        ?>

        </div>
        <!-- END index -->

    </div>
    <!-- END content container -->

    <?php get_template_part( 'elements/layout/layout.footer' ); ?>

</main>
<!-- site.layout -->

<?php get_footer(); ?>
