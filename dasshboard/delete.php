<?php
$id = $_GET['id'];
$email = $_GET['email'];

//Connect DB
include_once '../DB/db.php';
if (isset($id)) {
// sql to delete a record
    $query = "DELETE FROM vworlduser WHERE vid='$id'";

    if (mysqli_query($conn, $query)) {
        mysqli_close($conn);
        $message = "User Deleted";
        echo "<script>  alert('$message');window.location.href='dashboardvm.php'; </script>";
        exit;
    } else {
        echo "Error deleting record";
    }
}

if (isset($email))
{
    $query = "SELECT v.assigndate,v.duration,c.cid,c.username,c.email,c.organ,u.UserId,p.ptype,p.pname,p.cpu,p.gpu,p.ram,p.os,p.stype,p.ssize,p.pricingtype,p.price
FROM ((( vworlduser as v
INNER JOIN registeruser AS u ON u.uid = v.uid )
INNER JOIN registerclient AS c ON c.cid = v.cid)
INNER JOIN package AS p ON p.pid = v.pid)
WHERE v.vid='$email'";

    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            require_once("../mailserver/2.php");
            $to = $row['email'];
            $toname = $row['username'];
            $subject = "VWORLD CLOUD REGISTRATION EMAIL";
            $contents = 'Hello, ' . $row['username'] . '<br/>' . 'Welcome to VWorld-NEDUET' . '<br/>' . 'You are sucessfully registered to our system with the following package and credential' . '<br/>' .
                '<br/>' . 'Package Details' . '<br/>' . 'Package Type = ' . $row['ptype'] . '<br/>' . 'Package Name = ' . $row['pname'] . '<br/>' . 'No of CPUs = ' . $row['cpu'] . '<br/>' . 'No of GPUs = ' . $row['gpu'] . '<br/>' . 'Memory = ' . $row['ram'] . '<br/>' . 'Operating System = ' . $row['os'] . '<br/>' . 'Storage Type = ' . $row['stype'] . '<br/>' . 'Storage = ' . $row['ssize'] . '<br/>' . 'Pricing Model= ' . $row['pricingtype'] . '<br/>' . 'Price = ' . $row['price'] .
                '<br/><br/>' . ' Credential Details' . '<br/>' . 'User Id = ' . $row['UserId'] . '<br/>' . 'Password = ' . $row['password'] .
                '<br/>' . '<br/>' . '<br/>' . 'Thank You for choosing Vworld Cloud' . '<br/>' . 'Regards' . '<br/>' . 'VWorld Management Team' .
                '<br/>' . 'Contact No. (92-21) 99261261-7 Ext: 2372, 2571' . '<br/>' . 'Email: ncbc@neduet.edu.pk  ' . '<br/>' . 'Web: https://ncbc.neduet.edu.pk/';
            sendemail($to, $toname, $subject, $contents);
        }

        $message = 'Email Sent';
        echo "<script>  alert('$message');window.location.href='dashboardvm.php'; </script>";
        echo 1;
        exit;
    }
else{
    $message='Email Not Sent';
    echo "<script>  alert('$message');window.location.href='dashboardvm.php'; </script>";
    echo 0;
    exit;
}

}
