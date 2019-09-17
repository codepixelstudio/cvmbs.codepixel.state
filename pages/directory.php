<?php

    // template name: Directory

?>

<?php get_header(); ?>

<?php

    // determine directory data source
    $site_type = get_field( 'site_type', 'options' );

    // create json store
    $filestore = $_SERVER[ 'DOCUMENT_ROOT' ] . '/wp-content/themes/cvmbsPress/data/directory.json';

    // convert store to data
    $getdata     = file_get_contents( $filestore );
    $membersdata = json_decode( $getdata );

    // setup data object
    $members = $membersdata->members;

    // get site path
    $siteinfo = get_blog_details();

    // parse URL for site path
    $siteurl = str_replace( '/', '', $siteinfo->path );

    // set department ID for REST API tasks
    switch ( $siteurl ) {

        case 'cs' :

            $department_ID = 1002;
            break;

        case 'bms' :

            $department_ID = 1003;
            break;

        case 'mip' :

            $department_ID = 1004;
            break;

        case 'erhs' :

            $department_ID = 1005;
            break;

    }

?>

<!-- directory -->
<main id="site-layout" class="off-canvas-content <?php echo $site_type; ?>" data-off-canvas-content>

    <!-- directory -->
    <div id="directory" class="page-container">

        <!-- page header -->
        <header class="header">

            <h1>

                <?php

                    $directory_page = get_the_title();

                    if ( $site_type == 'department' ) {

                        $directory_type = 'department';

                    } elseif ( $site_type == 'college' ) {

                        $directory_type = 'college';

                    }

                    echo $directory_type . ' ' . $directory_page;

                ?>

            </h1>

            <?php if ( $site_type == 'college' ) : ?>

            <button id="directory-menu-button" class="open-modal-button" data-open="directory-menu">

                directory filters

            </button>

            <?php endif; ?>

        </header>
        <!-- END page header -->

        <!-- toolbar.DEV -->
        <div id="directory-toolbar" class="toolbar">

            <!-- alphabet -->
            <div id="directory-alphabet" class="toolbar-control-group">



            </div>
            <!-- END alphabet -->

            <!-- fiels -->
            <div id="directory-fields" class="toolbar-control-group">



            </div>
            <!-- END fiels -->

        </div>
        <!-- END toolbar.DEV -->

        <!-- table -->
        <table id="directory-records" class="directory">

            <!-- sortable header -->
            <thead>

                <tr>

                    <!-- <th width="180"> -->
                    <th>

                        Name

                    </th>

                    <th>

                        E-mail Address

                    </th>

                    <th width="180">
                    <!-- <th> -->

                        Phone

                    </th>

                    <th>

                        Department

                    </th>

                </tr>

            </thead>
            <!-- END sortable header -->

            <!-- data table -->
            <tbody>

                <?php

                    // college data
                    if ( $site_type == 'college' ) {

                        foreach ( $members as $member ) {

                            $query      = $member->memberID;
                            $ename      = $member->eName;
                            $lastName   = $member->lastName;
                            $firstName  = $member->firstName;
                            $tableName  = $lastName . ', ' . $firstName;
                            $eMail      = strtolower( $member->email );
                            $phone      = $member->phone;
                            $department = $member->directoryGroup;

                            $results .= '<tr class="record"><td class="link-column"><span class="mobile-toggle"></span><a class="member-link" href="' . esc_url( home_url() ) . '/directory/member/?id=' . $query . '">' . $tableName . '</a></td><td class="link-column"><a class="email-link" href="mailto:' . $eMail . '">' . $eMail . '</a></td><td>' . $phone . '</td><td>' . $department . '</td></tr>';

                        }

                        echo $results;

                    }

                    // department data
                    if ( $site_type == 'department' ) {

                        foreach ( $members as $member ) {

                            if ( $member->directoryGroupID == $department_ID ) {

                                $query      = $member->memberID;
                                $ename      = $member->eName;
                                $lastName   = $member->lastName;
                                $firstName  = $member->firstName;
                                $tableName  = $lastName . ', ' . $firstName;
                                $eMail      = strtolower( $member->email );
                                $phone      = $member->phone;
                                $department = $member->directoryGroup;

                                $results .= '<tr class="record"><td class="link-column"><span class="mobile-toggle"></span><a class="member-link" href="' . esc_url( home_url() ) . '/member/?id=' . $query . '">' . $tableName . '</a></td><td class="link-column"><a class="email-link" href="mailto:' . $eMail . '">' . $eMail . '</a></td><td>' . $phone . '</td><td>' . $department . '</td></tr>';

                            }

                        }

                        echo $results;

                    }

                ?>

            </tbody>
            <!-- END data table -->

        </table>
        <!-- END table -->

        <!-- pagination -->
        <div id="directory-controls" class="toolbar">



        </div>
        <!-- END pagination -->

        <!-- info -->
        <div id="directory-info" class="toolbar">



        </div>
        <!-- END info -->

        <?php if ( $site_type == 'college' ) : ?>

        <!-- directory filter menu -->
        <div id="directory-menu" class="reveal directory-filter-modal" data-reveal>

            <!-- header -->
            <header>

                college directory filters

            </header>
            <!-- END header -->

            <a class="filter-link main" href="/directory">all members</a>

            <a class="filter-link" href="/directory/group/faculty">faculty</a>

            <a class="filter-link" href="/directory/group/staff">staff</a>

            <a class="filter-link" href="/directory/group/graduate-students">graduate students</a>

            <a class="filter-link" href="/directory/group/residents-interns">residents/interns</a>

            <a class="filter-link" href="/directory/group/post-doctoral">post doctoral</a>

            <a class="filter-link" href="/directory/group/associates">associates</a>

        </div>
        <!-- END directory filter menu -->

        <?php endif; ?>

    </div>
    <!-- END directory -->

    <?php get_template_part( 'elements/layout/layout.footer' ); ?>

</main>
<!-- END directory -->

<?php get_footer(); ?>
