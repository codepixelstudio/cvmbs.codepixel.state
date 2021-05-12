<?php

    // template name: Research Topic Directory [new API]

?>

<?php get_header(); ?>

<?php

    // get topic ID
    $topic_ID = get_field( 'research_topic_id' );

    // construct member detail query
    $group_api = 'https://webservices.cvmbs.colostate.edu/pmiservice/api/directory/GetPublicDirectoryMemberList?groupId=' . $topic_ID;

    // debug output
    $group_members = json_decode( file_get_contents( $group_api ) );

    // set global post object
    global $post;

    // get site path
    $siteinfo = get_blog_details();

    // parse URL for site path
    $siteurl = str_replace( '/', '', $siteinfo->path );

    // set member bio link URL
    if ( $siteurl === 'dvm' ) {

        $directoryURL = '//vetmedbiosci.colostate.edu';

    } else {

        $directoryURL = esc_url( home_url() );

    }

?>

<!-- directory -->
<main id="site-layout" class="off-canvas-content <?php echo $site_type; ?>" data-off-canvas-content>

    <!-- directory -->
    <div id="directory" class="page-container">

        <?php if ( is_page() && $post->post_parent ) : ?>

        <!-- page header -->
        <header class="header">

            <h1>

                <span>

                    <?php echo get_the_title( $post->post_parent ); ?>

                </span>

                <?php echo the_title(); ?>

            </h1>

            <button id="research-topic-menu-button" class="open-modal-button" data-open="directory-menu">

                research topics

            </button>

        </header>
        <!-- END page header -->

        <?php else : ?>

        <!-- page header -->
        <header class="header">

            <h1>

                <?php echo the_title(); ?>

            </h1>

        </header>
        <!-- END page header -->

        <?php endif; ?>

        <?php if ( is_page() && $post->post_parent ) : ?>

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
                    <th data-priority="1">

                        Name

                    </th>

                    <th data-priority="10000">

                        E-mail Address

                    </th>

                    <th width="180" align="right" data-priority="1">
                    <!-- <th data-priority="2"> -->

                        Phone

                    </th>

                    <th data-priority="10000">

                        Department

                    </th>

                </tr>

            </thead>
            <!-- END sortable header -->

            <!-- data table -->
            <tbody>

                <?php

                    foreach ( $group_members as $member ) {

                        // get returned data object(s)
                        $memberGroups   = $member->groupList;
                        $memberContacts = $member->publicContactList;

                        // test for department group data type
                        if ( is_array( $memberGroups ) ) {

                            $multipleGroups = true;

                            foreach ( $memberGroups as $memberGroup ) {

                                $departmentID = $memberGroup->isPrimary;

                                if ( $departmentID ) {

                                    $department     = $memberGroup->groupFriendlyName;
                                    $primaryGroupId = $memberGroup->groupId;

                                }

                            }

                        } else {

                            $multipleGroups = false;

                            $department     = $memberGroups->groupFriendlyName;
                            $primaryGroupId = $memberGroups->groupId;

                        }

                        // test for contact info data type
                        if ( is_array( $memberContacts ) ) {

                            $phone = $memberContacts[0]->phoneNumber;

                        } else {

                            $phone = $memberContacts->phoneNumber;

                        }

                        // setup department sorting
                        switch ( $primaryGroupId ) {

                            case 203 :
                            case 210 :

                                $directoryGroupId   = 1001;
                                $directoryGroupName = 'College Office';
                                break;

                            case 135 :
                            case 140 :
                            case 177 :

                                $directoryGroupId   = 1002;
                                $directoryGroupName = 'Clinical Sciences';
                                break;

                            case 207 :

                                $directoryGroupId   = 1003;
                                $directoryGroupName = 'Biomedical Sciences';
                                break;

                            case 209 :
                            case 205 :

                                $directoryGroupId   = 1004;
                                $directoryGroupName = 'Microbiology, Immunology, and Pathology';
                                break;

                            case 208 :
                            case 215 :

                                $directoryGroupId   = 1005;
                                $directoryGroupName = 'Environmental and Radiological Health Sciences';
                                break;

                            case 134 :

                                $directoryGroupId   = 1006;
                                $directoryGroupName = 'Veterinary Diagnostic Laboratory';
                                break;

                            case 136 :
                            case 139 :
                            case 176 :
                            case 182 :
                            case 188 :
                            case 193 :

                                $directoryGroupId   = 1007;
                                $directoryGroupName = 'Veterinary Teaching Hospital';
                                break;

                            case 674 :
                            case 539 :

                                $directoryGroupId   = 1008;
                                $directoryGroupName = 'Center for Environmental Medicine';
                                break;

                            case 206 :

                                $directoryGroupId   = 1009;
                                $directoryGroupName = 'Molecular, Cellular, and Integrative Neurosciences';
                                break;

                            default :

                                $directoryGroupId   = 1010;
                                $directoryGroupName = 'undefined';

                        }

                        // setup variables
                        $LastName   = $member->lastName;
                        $FirstName  = $member->preferredFirstName;
                        $tableName  = $LastName . ', ' . $FirstName;
                        $eMail      = strtolower( $member->emailAddress );
                        // $phone      = $member->publicContactList[ 0 ]->phoneNumber;
                        $department = $directoryGroupName;

                        $records .= '<tr class="record"><td class="link-column"><span class="mobile-toggle"></span><a class="member-link" href="' . $directoryURL . '/directory-api/member/?id=' . $member->memberId . '">' . $tableName . '</a></td><td class="link-column"><a class="email-link" href="mailto:' . $eMail . '">' . $eMail . '</a></td><td>' . $phone . '</td><td>' . $department . '</td></tr>';

                    }

                    echo $records;

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

        <pre class="developer">

            <br />
            Research Topic Directory Group Query : <?php echo $topic_ID; ?>
            <br />
            <?php print_r( $group_members ); ?>

        </pre>

        <?php else : ?>

        <?php the_content(); ?>

        <!-- menu container -->
        <div class="research-topic-menu-wrapper">

            <?php research_topic_menu(); ?>

        </div>
        <!-- END menu container -->

        <?php endif; ?>

        <!-- topics menu -->
        <div id="directory-menu" class="reveal research-topic-modal" data-reveal>

            <!-- header -->
            <header>

                faculty research topics

            </header>
            <!-- END header -->

            <?php research_topic_menu(); ?>

        </div>
        <!-- END topics menu -->

    </div>
    <!-- END directory -->

    <?php get_template_part( 'elements/layout/layout.footer' ); ?>

</main>
<!-- END directory -->

<?php get_footer(); ?>
