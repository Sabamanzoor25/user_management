<?php
include_once '../../../DB/db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['updatedata']))
    {   
        $pid = $_POST['update_id'];
      
        $ptype = $_POST['ptype'];
        $pname = $_POST['ptype'];
        $cpu = $_POST['cpu'];
        $gpu = $_POST['gpu'];
        $ram = $_POST['ram'];
        $os = $_POST['os'];
        $stype = $_POST['stype'];
        $ssize = $_POST['ssize'];
        $pricingtype = $_POST['pricingtype'];
        $price = $_POST['price'];

        $query = " UPDATE `package` SET `ptype`='$ptype',`pname`='$pname',`cpu`='$cpu',`gpu`='$gpu',`ram`='$ram ',`os`='$os',
        `stype`='$stype',`ssize`='$ssize',`pricingtype`='$pricingtype',`price`='$price' 
        WHERE `package`.`pid`=$pid";

       
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:packages.php");
        }
        else
        {
            echo '<script> alert("Data Not Saved"); </script>';
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
        }
        }}
?>