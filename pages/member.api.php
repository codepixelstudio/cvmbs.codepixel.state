<?php

    // template name: Directory Member View [new API]

?>

<?php get_header(); ?>

<?php

    // set static query
    $query = $_GET[ 'id' ];

    // construct member detail query
    $member_api = 'https://webservices.cvmbs.colostate.edu/pmiservice/api/directory/GetPublicDirectoryMemberDetail?memberId=' . $query;

    // construct member photo query
    $member_photo  = 'https://webservices.cvmbs.colostate.edu/pmiservice/api/directory/GetPublicDirectoryMemberPhoto?memberId=' . $query;

    // debug output
    $member_detail = json_decode( file_get_contents( $member_api ) );

?>

<!-- directory -->
<main id="site-layout" class="off-canvas-content <?php echo $site_type; ?>" data-off-canvas-content>

    <!-- directory -->
    <div id="directory-member" class="page-container">

        <?php

            // get returned data object(s)
            $member_groups = $member_detail->groupList;

            // test for department group data type
            if ( is_array( $member_groups ) ) {

                $multipleGroups = true;

                foreach ( $member_groups as $member_group ) {

                    $departmentID = $member_group->isPrimary;

                    if ( $departmentID ) {

                        $department    = $member_group->groupFriendlyName;
                        $primary_group = $member_group->groupId;

                    }

                }

            }

            // setup department sorting
            switch ( $primary_group ) {

                case 203 :
                case 210 :

                    $department = 'College Office';
                    break;

                case 135 :
                case 140 :
                case 177 :

                    $department = 'Clinical Sciences';
                    break;

                case 207 :

                    $department = 'Biomedical Sciences';
                    break;

                case 209 :

                    $department = 'Microbiology, Immunology, and Pathology';
                    break;

                case 205 :

                    $department = 'Cell and Molecular Biology';
                    break;

                case 208 :
                case 215 :

                    $department = 'Environmental and Radiological Health Sciences';
                    break;

                case 134 :

                    $department = 'Veterinary Diagnostic Laboratory';
                    break;

                case 136 :
                case 139 :
                case 176 :
                case 182 :
                case 188 :
                case 193 :

                    $department = 'Veterinary Teaching Hospital';
                    break;

                case 674 :
                case 539 :

                    $department = 'Center for Environmental Medicine';
                    break;

                case 206 :

                    $department = 'Molecular, Cellular, and Integrative Neurosciences';
                    break;

                default :

                    $department = 'undefined';

            }

            // get phone number
            if ( is_array( $member_detail->publicContactList ) ) {

                $phone = $member_detail->publicContactList[0]->phoneNumber;

                $newPhone = preg_replace( '/\D+/', '', $phone );

            } else {

                $phone = $member_detail->publicContactList->phoneNumber;

                $newPhone = preg_replace( '/\D+/', '', $phone );

            }

            // configure member detail bio objects
            $degrees          = $member_detail->memberDirectoryDegreeList;
            $certifications   = $member_detail->memberDirectoryCertificationList;
            $publications     = $member_detail->memberDirectoryPublicationList;
            $species_interest = $member_detail->memberDirectorySpeciesInterestList;
            $links            = $member_detail->memberDirectoryLinkList;

        ?>

        <!-- listing -->
        <div class="directory-listing">

            <!-- profile -->
            <div class="listing-profile">

                <!-- photo -->
                <div class="profile-photo" style="background-image:url(<?php echo $member_photo; ?>);">

                    <!--  -->

                </div>
                <!-- END photo -->

                <!-- name/title -->
                <div class="profile-name">

                    <!-- name -->
                    <h1 class="name">

                        <?php echo $member_detail->preferredFirstName . ' ' . $member_detail->lastName; ?>

                    </h1>
                    <!-- END name -->

                    <!-- title -->
                    <span class="title">

                        <?php echo $member_detail->workingTitle; ?>

                    </span>
                    <!-- END title -->

                    <!-- department -->
                    <span class="department">

                        <?php echo $department; ?>

                    </span>
                    <!-- END department -->

                </div>
                <!-- END name/title -->

                <!-- contact -->
                <div class="profile-contact">

                    <!-- office -->
                    <p>

                        <?php echo $member_detail->officeRoomName . ' ' . $member_detail->officeBldgName; ?>

                    </p>
                    <!-- END office -->

                    <!-- email -->
                    <a href="mailto:<?php echo $member_detail->emailAddress; ?>" class="email">

                        <?php echo strtolower( $member_detail->emailAddress ); ?>

                    </a>
                    <!-- END email -->

                    <?php if ( $phone ) : ?>

                    <!-- phone -->
                    <span class="phone">

                        <?php echo '(' . substr( $newPhone, 0, 3 ) . ') ' . substr( $newPhone, 3, 3 ) . '-' . substr( $newPhone, 6 ); ?>

                    </span>
                    <!-- END phone -->

                    <?php endif; ?>

                    <?php $website = $member_detail->website; ?>

                    <?php if ( $website ) : ?>

                    <!-- website link -->
                    <a href="<?php echo $website ?>" class="website">

                        view faculty website

                    </a>
                    <!-- END website link -->

                    <?php endif; ?>

                </div>
                <!-- END contact -->

            </div>
            <!-- END profile -->

            <!-- info -->
            <div class="listing-info">

                <!-- listing group -->
                <div class="listing-group bio">

                    <h3 class="listing-heading">About <?php echo $member_detail->preferredFirstName; ?></h3>

                    <!-- listing -->
                    <div class="listing">

                        <p><?php echo $member_detail->memberDirectoryProfileList[ 0 ]->profileText; ?></p>

                    </div>
                    <!-- END listing group -->

                </div>
                <!-- END listing -->

                <?php if ( count( $degrees ) > 0 ) : ?>

                <!-- education -->
                <div class="listing-group cv">

                    <h4>Education</h4>

                    <?php foreach ( $degrees as $degree ) {

                        $school  = $degree->degreeSchool;
                        $year    = $degree->degreeYear;
                        $level   = $degree->degreeType;

                        echo '<span class="entry">' . $level . ', ' . $school . ', ' . $year . '</span>';

                    } ?>

                </div>
                <!-- END education -->

                <?php endif; ?>

                <?php if ( count( $certifications ) > 0 ) : ?>

                <!-- certifications -->
                <div class="listing-group cv">

                    <h4>Certifications</h4>

                    <?php foreach ( $certifications as $certification ) {

                        $title       = $certification->certificationType;
                        $description = $certification->certificationDescription;

                        echo '<span class="entry">' . $title . '<br />' . $description . '</span>';

                    } ?>

                </div>
                <!-- END certifications -->

                <?php endif; ?>

                <?php if ( count( $publications ) > 0 ) : ?>

                <!-- publications -->
                <div class="listing-group cv">

                    <h4>Publications</h4>

                    <?php foreach ( $publications as $publication ) {

                        $entry  = $publication->citation;

                        echo '<span class="entry">' . $entry . '</span>';

                    } ?>

                </div>
                <!-- END publications -->

                <?php endif; ?>

                <?php if ( count( $species_interest ) > 0 ) : ?>

                <!-- species interest -->
                <div class="listing-group interests">

                    <h4>Research Specialty</h4>

                    <?php foreach ( $species_interest as $interest ) {

                        $title = $interest->species;
                        $notes = $interest->speciesNotes;

                        echo '<span class="interest title">' . $title . '</span><span class="interest notes">' . $notes . '</span>';

                    } ?>

                </div>
                <!-- END species interest -->

                <?php endif; ?>

                <?php if ( count( $links ) > 0 ) : ?>

                <!-- links -->
                <div class="listing-group cv">

                    <h4>Links</h4>

                    <?php foreach ( $links as $link ) {

                        $title  = $link->linkName;
                        $url    = $link->linkUrl;

                        echo '<a href="' . $url . '" class="entry stuff">' . $title . '</a>';

                    } ?>

                </div>
                <!-- END links -->

                <?php endif; ?>

            </div>
            <!-- END info -->

        </div>
        <!-- END listing -->

        <!-- output -->
        <div class="developer hide">

            <pre class="developer">

                <?php print_r( $member_detail )?>

            </pre>

        </div>
        <!-- END output -->

    </div>
    <!-- END directory -->

    <?php get_template_part( 'elements/layout/layout.footer' ); ?>

</main>
<!-- END directory -->

<?php get_footer(); ?>
