<?php
             include_once '../../../DB/db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['updatedata']))
    {   
        $cid = $_POST['update_id'];
      
        $cname = $_POST['cname'];
        $organ_name = $_POST['organ_name'];
        $email = $_POST['email'];
        $cell = $_POST['cell'];
        $address = $_POST['address'];
        $ctype = $_POST['ctype'];

       

        $query = "UPDATE `registerclient` SET `username` = '$cname' , `organ` = '$organ_name', 
                        `email` = '$email', `cell` = '$cell', `address` = '$address',  `ctype` = '$ctype'
        WHERE `registerclient`.`cid` = $cid";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:client.php");
        }
        else
        {
            // echo '<script> alert("Data Not Saved"); </script>';
            echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
        }
        }}
?>