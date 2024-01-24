<?php
include_once '../../../DB/db.php';

if(isset($_POST['deletedata']))
{
    $uid = $_POST['delete_id'];

    $sql = "DELETE FROM `registeruser` WHERE  `uid` = $uid " ;
    $query_run = mysqli_query($conn, $sql);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:user.php");
    }
    else
    {
        // echo '<script> alert("Data Not Deleted"); </script>';
         echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
    }
}

?>