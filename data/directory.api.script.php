<?php

    // hide a bunch of PHP error notices
    error_reporting( E_ERROR | E_WARNING | E_PARSE );

    // set file location
    // $filelocation = '/home/vetmedbiosci/public_html/wp-content/themes/cvmbsPress/data/';
    $filelocation = $_SERVER[ 'DOCUMENT_ROOT' ] . '/wp-content/themes/cvmbsPress/data/';

    // set WSDL service URL
    $member_list = 'https://webservicesdev.cvmbs.colostate.edu/pmiservice/api/directory/GetPublicDirectoryMemberList';

    try {

        // instantiate DirectoryService
        $members = json_decode( file_get_contents( $member_list ) );

        // create JSON store
        $filestore = $filelocation . 'directory.api.data.json';
        $tempfilestore = $filelocation . 'directory-temp.json';

        // code depends on this file existing
        if ( !file_exists( $filestore ) ) {

            touch( $filestore );

        }

        // create storage array
        $storage = array(

            'data'         => array(),
            'members'      => array(),
            'departments'  => array()

        );

        // iterate over data
        foreach( $members as $member ) {

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
                case 204 :
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

                    $directoryGroupId   = 1004;
                    $directoryGroupName = 'Microbiology, Immunology, and Pathology';
                    break;

                case 205 :

                    $directoryGroupId   = 1004;
                    $directoryGroupName = 'Cell and Molecular Biology';
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

                    // $directoryGroupId   = 1008;
                    $directoryGroupId   = 1005;
                    $directoryGroupName = 'Center for Environmental Medicine';
                    break;

                case 206 :

                    // $directoryGroupId   = 1009;
                    $directoryGroupId   = 1003;
                    $directoryGroupName = 'Molecular, Cellular, and Integrative Neurosciences';
                    break;

                default :

                    $directoryGroupId   = 1010;
                    $directoryGroupName = 'undefined';

            }

            // setup variables
            if ( strpos( $member->lastName, 'lhr' ) !== false || strpos( $member->lastName, 'aaaa' ) !== false ) {

                continue;

            } else {

                // push to members array
                $storage[ 'members' ][] = array(

                    'memberID'          => $member->memberId,
                    'eName'             => $member->eName,
                    'firstName'         => $member->firstName,
                    'otherName'         => $member->preferredFirstName,
                    'lastName'          => $member->lastName,
                    'fullName'          => $member->firstName . ' ' . $member->lastName,
                    'email'             => strtolower( $member->emailAddress ),
                    'title'             => $member->employeeType,
                    'memberType'        => $member->employeeCategory,
                    'directoryGroupID'  => $directoryGroupId,
                    'directoryGroup'    => $directoryGroupName,
                    'primaryGroupID'    => $primaryGroupId,
                    'multipleGroups'    => $multipleGroups,
                    'groups'            => $memberGroups,
                    'department'        => $department,
                    'phone'             => $phone,
                    'contactInfo'       => $memberContacts,
                    'addressInfo'       => $member->OfficeRoomName . ' ' . $member->OfficeBldgName,
                    // 'addressInfo'       => $member->BusinessAddress1,
                    'address'           => $memberAddress->BusinessAddress1,
                    'photo'             => 'https://www.cvmbs.colostate.edu/DirectorySearch/Search/MemberPhoto/' . $member->memberId

                );

            }

        }

        // filestore metadata
        $storage[ 'data' ] = array(

            'dataset'   => 'COLLEGE DIRECTORY',
            'filestore' => $filestore,
            'modified'  => date( 'Y m d H:i:s', filemtime( $filestore ) ),
            'records'   => count( $members )

        );

        // departments array
        $storage[ 'departments' ] = array(

            '134' => 'Veterinary Diagnostic Lab',
            '135' => 'Clinical Sciences Department',
            '136' => 'Veterinary Teaching Hospital',
            '138' => 'Veterinary Diagnostic Lab',
            '139' => 'Veterinary Teaching Hospital Working Group',
            '140' => 'Clinical Sciences Department Working Group',
            '170' => 'Clinical Pathology',
            '172' => 'Clinicians',
            '176' => 'VTH Interns All',
            '178' => 'Faculty',
            '182' => 'VTH Medical Records',
            '188' => 'VTH Veterinary Technicians',
            '193' => 'VTH Medical Records - Read Only',
            '203' => 'CVMBS College Office',
            '204' => 'CVMBS Finance & Strategic Services',
            '205' => 'Cellular & Molecular Biology',
            '206' => 'CVMBS Molecular, Cellular & Integrative Neurosciences',
            '207' => 'CVMBS Biomedical Sciences Dept',
            '208' => 'CVMBS Environmental & Radiological Health Sciences Dept',
            '209' => 'CVMBS Microbiology, Immunology & Pathology Dept',
            '210' => 'College Office',
            '215' => 'CVMBS Environmental & Radiological Health Sciences Dept  Working Group',
            '539' => 'Center for Environmental Medicine',
            '626' => 'Orthopaedic Research Center',
            '674' => 'Center for Environmental Medicine Department',

        );

        // prettify
        $data = json_encode( $storage, JSON_PRETTY_PRINT );

        // send data to json store
        file_put_contents( $tempfilestore, $data );

        // overwrite JSON file
        rename( $tempfilestore, $filestore );

    }

    catch ( Exception $e ) {

        echo 'Caught exception: ',  $e->getMessage(), "\n";

    }
