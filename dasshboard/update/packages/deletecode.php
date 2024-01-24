<?php
include_once '../../../DB/db.php';

if(isset($_POST['deletedata']))
{
    $pid = $_POST['delete_id'];

    $sql = "DELETE FROM `package` WHERE  `pid` = $pid " ;
    $query_run = mysqli_query($conn, $sql);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:package.php");
    }
    else
    {
        // echo '<script> alert("Data Not Deleted"); </script>';
         echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
    }
}

?>