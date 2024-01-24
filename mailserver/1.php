<?php
require_once("2.php");
$to="uzair2014@gmail.com";
$toname="Uzair Abid";
$subject = "Test Email sent via Gmail SMTP Server using PHP Mailer";
$contents = "This is a Test Email sent via Gmail SMTP Server using PHP mailer class.";
sendemail($to,$toname,$subject,$contents);

//$sql3="SELECT c.username,c.email,u.UserId,u.password,p.ptype,p.pname,p.cpu,p.gpu,p.ram,p.os,p.stype,p.ssize,p.pricingtype,p.price
//FROM (
  //    ( vworlduser as v
    //    INNER JOIN registeruser AS u
      //  ON v.uid=u.uid)
      //(
        //INNER JOIN registerclient AS c
        //ON v.cid=c.cid)
          // (
        //INNER JOIN package AS p
        //ON v.pid=p.pid))";


//$sql3 = "SELECT c.username,c.email FROM registerclient AS c WHERE c.cid='$cid'
  //                  UNION
    //                SELECT u.UserId,u.password FROM  registeruser  AS u WHERE u.uid='$uid'
      //              UNION
        //            SELECT p.ptype,p.pname,p.cpu,p.gpu,p.ram,p.os,p.stype,p.ssize,p.pricingtype,p.price  FROM  package AS p  WHERE p.pid='$pid' ";
