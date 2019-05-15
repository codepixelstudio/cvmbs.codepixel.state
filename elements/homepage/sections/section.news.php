<?php

// setup REST API request
$requestURL  = wp_remote_get( 'https://cvmbs.source.colostate.edu/wp-json/wp/v2/posts/?&per_page=3' );
$data        = wp_remote_retrieve_body( $requestURL );
$articles    = json_decode( $data );

?>

<!-- container -->
<div class="article-container" tabindex="-1">

    <!-- title -->
    <a href="https://cvmbs.source.colostate.edu/" class="section-title" data-section="news">

        news and updates

        <!-- link -->
        <span class="title-link">

            view all

        </span>
        <!-- END link -->

    </a>
    <!-- END title -->

    <!-- feature + sidebar -->
    <div id="main-source-content">

        <!-- news.feed -->
        <section id="source-feed" class="article-cards ui-news">

            <?php

            foreach( $articles as $article ) {

                $permalink = $article->link;
                $thumbnail = $article->featured_image->source_url;
                $title     = $article->title->rendered;
                $excerpt   = $article->excerpt->rendered;

                $content .= '

                    <a href="' . $permalink . '" class="article card" data-url="' . $permalink . '">

                        <header class="header">

                            <span class="image" style="background-image:url( ' . $thumbnail . ' )"></span>

                        </header>

                        <section class="content">

                            <h2 class="title">' . $title . '</h2>

                            <span class="text">' . $excerpt . '</span>

                        </section>

                    </a>

                ';

            }

            echo $content;

            ?>

        </section>
        <!-- END news.feed -->

    </div>
    <!-- END feature + sidebar -->

</div>
<!-- END container -->
