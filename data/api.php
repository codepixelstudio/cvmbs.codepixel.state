<?php

    // configurable ID
    $memberID   = 40133;

    $api_list   = 'https://webservicesdev.cvmbs.colostate.edu/pmiservice/api/directory/GetPublicDirectoryMemberList';
    $api_detail = 'https://webservicesdev.cvmbs.colostate.edu/pmiservice/api/directory/GetPublicDirectoryMemberDetail?memberId=' . $memberID;
    $api_photo  = 'https://webservicesdev.cvmbs.colostate.edu/pmiservice/api/directory/GetPublicDirectoryMemberPhoto?memberId=' . $memberID;

    $member_list = file_get_contents( $api_list );

?>

<p>Member List</p>
<pre>

    <?php print_r( $member_list ); ?>

</pre>

<p>Member Detail - <?php echo $memberID; ?></p>
<pre>

    <?php print_r( $api_detail ); ?>

</pre>
