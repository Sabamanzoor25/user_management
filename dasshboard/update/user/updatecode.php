<?php
include_once '../../../DB/db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['updatedata']))
    {   
        $uid = $_POST['update_id'];
      
        $uname = $_POST['uname'];
        $password = $_POST['password'];

        $query = "UPDATE `registeruser` SET `UserId` = '$uname' , `password` = '$password'
        WHERE `registeruser`.`uid` = $uid";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:user.php");
        }
        else
        {
            echo '<script> alert("Data Not Saved"); </script>';
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
        }
        }

    }
?>