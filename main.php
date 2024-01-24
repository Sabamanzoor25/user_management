<?php
include_once 'DB/db.php';
session_start();
if(isset($_POST['logout'])) {
    session_destroy();
    header('location:index.php');
}

//RegisterVworld User
if(isset($_POST['RegisterVworld']))
{
        $cid = $_POST['client'];
        $uid=$_POST["user"];
        $pid = $_POST['pack'];
        $assigndate	 =date('Y-m-d H:i:s');
        $duration= $_POST['duration'];
    $sql2 = "SELECT cid,uid,pid FROM vworlduser WHERE cid='$cid' AND uid='$uid' AND pid=' $pid '";
    $result = $conn->query($sql2);
    if ($result->num_rows > 0) {
        $message = "Already Registered Try Again";
        echo "<script>  alert('$message');window.location.href='dasshboard/dashboardvm.php'; </script>";
    }
    else
    {
        $sql = "INSERT INTO vworlduser (cid,uid,pid,duration,assigndate) VALUES ('$cid','$uid','$pid','$duration','$assigndate')";
        if ($conn->query($sql) === TRUE)
        {
            $message = "New vworld user created Successfully";
            echo "<script>  alert('$message');window.location.href='dasshboard/dashboardvm.php'; </script>";

        }
        else
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
                $message = "New vworld user created Unsuccessfully";
                echo "<script>  alert('$message');window.location.href='dasshboard/dashboardvm.php'; </script>";

            }
        $conn->close();

    }
}

//Register Package
if (isset($_POST['RegPack'])) {
    $pname = $_POST['pname'];
    $ptype=$_POST['ptype'];
    $cpu=$_POST['cpu'];
    $gpu=$_POST['gpu'];
    $ram=$_POST['ram'];
    $stype=$_POST['stype'];
    $ssize=$_POST['ssize'];
    $os=$_POST['os'];
    $pricingtype=$_POST['pricingtype'];
    $price=$_POST['price'];
    $vname=$_POST['vname'];
    $appname=$_POST['appname'];


    //INSERT INTO `patient`(LNAME,FNAME,DOB,CNIC, EMAIL,CELL,NATIONALITY,CITY,ADDRESS,SEX,BLOOD, P_FLAG, P_CHECK)
    $sql2 = "SELECT pname FROM package WHERE pname='$pname'";

    $result = $conn->query($sql2);
    if ($result->num_rows > 0)
    {
        $message = "Package already Registered Try Again";
        echo "<script>  alert('$message');window.location.href='pages/RegPack.php'; </script>";
    }
    else
    {
        $sql = "INSERT INTO package (pname,ptype,cpu,gpu,ram,stype,ssize,os,pricingtype,price,vname,appname) VALUES ('$pname','$ptype','$cpu','$gpu','$ram','$stype','$ssize','$os','$pricingtype','$price','$vname','$appname')";
        if ($conn->query($sql) === TRUE) {
            // Display the alert box
            $message = "New record created successfully";
            //header("Location:login/login.php");
            echo "<script>  alert('$message');window.location.href='pages/RegPack.php'; </script>";
            //        window.location.href='".site_url('home');
            //     die();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}
//Register Client
if (isset($_POST['RegClient'])) {

    $username = $_POST['username'];
    $organ=$_POST['organ'];
    $email=$_POST['email'];
    $cell=$_POST['cell'];
    $address=$_POST['address'];
    $type=$_POST['type'];
    $ctype=$_POST['ctype'];
    $regdate=date('Y-m-d');
    $year=date('Y');
    $month = date("F", strtotime(date('m')));
    $month = mb_substr($month, 0, 1);


    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    $regex2=' /^\d{11,11}$/';
    if (!preg_match($regex, $email))
    {
        $message = "Email Address not Correct eg:xyz@abc.xyz";
        echo "<script>  alert('$message');window.location.href='pages/RegClient.php'; </script>";
    }
    elseif (!preg_match($regex2, $cell))
    {
        $message = "Contact No  not Correct eg: 03331234567";
        echo "<script>  alert('$message');window.location.href='pages/RegClient.php'; </script>";
    }
    //INSERT INTO `patient`(LNAME,FNAME,DOB,CNIC, EMAIL,CELL,NATIONALITY,CITY,ADDRESS,SEX,BLOOD, P_FLAG, P_CHECK)
    $sql2 = "SELECT email FROM registerclient WHERE email='$email'";

    $result = $conn->query($sql2);
    if ($result->num_rows > 0)
    {
        $message = "User already Registered Try Again";
        echo "<script>  alert('$message');window.location.href='pages/RegClient.php'; </script>";
    }
    else
    {
        $sql3 = "SELECT cid FROM registerclient ORDER BY cid LIMIT 1 ";
        $result = $conn->query($sql3);
        $row = $result->fetch_assoc();
        $idd= $row['cid'];
        $idd=$idd+1;
        $year = mb_substr($year, 2, 2);

        $ids=$month.'-'.$year.'-'.'0'.$idd;

        $sql = "INSERT INTO registerclient (username,organ,email,cell,address,type,ctype,regdate,ids) VALUES ('$username','$organ','$email','$cell','$address','$type','$ctype','$regdate','$ids')";
         if ($conn->query($sql) === TRUE)
         {
                // Display the alert box
                $message = "New record created successfully";
                //header("Location:login/login.php");
                echo "<script>  alert('$message');window.location.href='pages/RegClient.php'; </script>";
                //        window.location.href='".site_url('home');
                //     die();
            }
         else
         {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        $conn->close();
    }
}

//Register User
if (isset($_POST['RegUser'])) {

    $userid = $_POST['userid'];
    $PASSWORD=$_POST['PASSWORD'];

    //INSERT INTO `patient`(LNAME,FNAME,DOB,CNIC, EMAIL,CELL,NATIONALITY,CITY,ADDRESS,SEX,BLOOD, P_FLAG, P_CHECK)
    $sql2 = "SELECT UserId FROM registeruser WHERE UserId='$userid'";

    $result = $conn->query($sql2);
    if ($result->num_rows > 0)
    {
        $message = "User already Registered Try Again";
        echo "<script>  alert('$message');window.location.href='pages/RegUser.php'; </script>";
    }
    else
    {
        $sql = "INSERT INTO registeruser (UserId,password) VALUES ('$userid','$PASSWORD')";
        if ($conn->query($sql) === TRUE) {
            // Display the alert box
            $message = "New record created successfully";
            //header("Location:login/login.php");
            echo "<script>  alert('$message');window.location.href='pages/RegUser.php'; </script>";
            //        window.location.href='".site_url('home');
            //     die();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}

//USER LOGIN BUTTON
if(isset($_POST['login']))
{
    //  $_SESSION["PatientLogin"] = "yellow";
    $username = $_POST['username'];
    $PASSWORD = $_POST['password'];
    //INSERT INTO `patient`(LNAME,FNAME,DOB,CNIC, EMAIL,CELL,NATIONALITY,CITY,ADDRESS,SEX,SPECIALIZATION, QUALIFICATION)

    $sql = "SELECT * FROM admin WHERE username='$username' AND PASSWORD='$PASSWORD'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            $_SESSION['Login'] = $row['a_id'];
        }
        echo "<script>window.location.href='dasshboard/dashboard.php'; </script>";
    }
    else
    {
        $_SESSION['PatientLogin']=[];
        $m = 'AUTHENTICATION FAILED TRY AGAIN';
        echo "<script>  alert('$m');window.location.href='index.php'; </script>";
    }
}

