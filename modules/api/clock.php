<?php
$NewAccount = false;
include( "config.php" );
$uuid = $_REQUEST['uuid'];
$name = $_REQUEST['name'];

$ERROR = "\n\nFailed to update Users Time Card.\nContact Ensign Cody Cooper, SS Astraios Enginnering with the provided Error Message";

// SQL statments
// Insert UUID Username and Email address (AvatarName@Starfleet Delta.co)
$NEW_AVY_SQL = "INSERT INTO `accounts` (`UUID`, `username`, `email`) VALUES ('$uuid', '$name', CONCAT(REPLACE('$name',' ',''),'@ufstarfleet.org'))";
$SelectAV = "SELECT ID FROM `accounts` WHERE `UUID` = '$uuid'";
$OnFileInsert = "SELECT `ClockUpdate`('$uuid') AS `status`"; //Run the Update function and return a status code

function UserClock( $db,$sql )
{
    if( !$result = mysqli_query( $db,$sql ) )
    {
        die( "ERROR|UserClock|".mysqli_error( $db ) );
    }
    while( $row = mysqli_fetch_array( $result ) )
    {
        echo $row['status'];
        return TRUE;
    }
}

if ( 0 == mysqli_num_rows( mysqli_query( $db,$SelectAV ) ) ) // Is there a record already?
{
    if( !mysqli_query( $db,$NEW_AVY_SQL ) ) // Create a new entry in the accoutns table
    {
        echo "ERROR: " . $NEW_AVY_SQL . "\n" . mysqli_error( $db );
        die( $ERROR );
    }
    mysqli_commit();
    $NewAccount = true;
}
else // Record exists NewAccount is false
{
    $NewAccount = false;
}

// Once the Account is on file we can just log the user right in
if( UserClock( $db,$OnFileInsert ) )
{
    mysqli_commit();
}
else // If error kill the script and post the error.
{
    echo "Error: " . $OnFileInsert . "\n\n" . mysqli_error( $db );
    echo "\nNewAccount: " . $NewAccount;
    die( $ERROR );
}

mysqli_close( $db );
?>
