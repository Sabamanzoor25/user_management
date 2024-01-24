<?php

if (isset($_POST['GenerateEmail']))
{
    $invoiceID = $_POST['AC_ID'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    $date = date('Y-m-d');
    $startTimeStamp = strtotime($sdate);
    $endTimeStamp = strtotime($edate);
    $timeDiff = abs($endTimeStamp - $startTimeStamp);
    $numberDays = $timeDiff/86400;  // 86400 seconds in one day
    $numberDays = intval($numberDays);
    invoice_generate2($invoiceID,$sdate,$edate,$date,$numberDays+1);
}
function invoice_generate2($invoiceID,$sdate,$edate,$date,$numberDays)
{
    require('fpdf17/fpdf.php');
//db connection
    include("../DB/db.php");
    $code=null;

    $sql = "SELECT v.assigndate,v.duration,c.cid,c.username,
    c.email,c.organ,u.UserId,p.ptype,p.pname,p.cpu,p.gpu,p.ram,p.os,p.stype,p.ssize,p.pricingtype,p.price
FROM ((( vworlduser as v
INNER JOIN registeruser AS u ON u.uid = v.uid )
INNER JOIN registerclient AS c ON c.cid = v.cid)
INNER JOIN package AS p ON p.pid = v.pid)
WHERE v.vid='$invoiceID'";

    $result = $conn->query($sql);
    $invoice = $result->fetch_array();

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();
    $pdf->Image('logo1.png',10,6,30);
    // Logo2
     $pdf->Image('logo2.png',170,6,30);
     // // Line break
     $pdf->Ln(30);
 
     $pdf->Cell(70);
     $pdf->SetFont('Times','',30);
     $pdf->cell(70,10,'INVOICE',0,0);
     $pdf->Cell(59	,5,'',0,1);//end of line
     $pdf->Ln(20);
 
     $pdf->SetFont('Times','',13);
     $pdf->SetTextColor(107,107,107);
     
     $pdf->Cell(130,5,'Invoice ID: '.$invoiceID,0,0);
     $pdf->Cell(59	,5,'',0,1);//end of line


    
     $pdf->Cell(130	,7,'Invoice To: '. $invoice['username'],0,0);
     $pdf->Cell(59	,5,'',0,1);//end of line
     $pdf->Cell(145,10,'Invoice Email: '.$invoice['email'],0,0,'L');
     $pdf->Cell(40,10,'Date: '.$date,0,0, 'R');//date
     $pdf->Cell(59	,5,'',0,1);

     $am=$invoice['price']/30;
     $amount=floor($am*$numberDays);

     //table


      // Line(x1,y1,x2,y2);line 1
    $pdf->Line(10, 84, 200, 84);
    $pdf->Cell(59 ,5,'',0,1);//end of line
    
    $pdf->SetFont('Times','B',12);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFillColor(220,220,220);
    $pdf->Cell(75,10,'DESCRIPTION',0,0,'L',true);
    $pdf->Cell(35,10,'RATE',0,0,'C',true);
    $pdf->Cell(40,10,'QTY',0,0,'C',true);
    
    $pdf->Cell(40,10,'AMOUNT',0,0,'R',true);
    $pdf->Cell(59	,5,'',0,1);//end of line

    // Line(x1,y1,x2,y2); line 2
    $pdf->Line(10, 96 , 200, 96);
    $pdf->Cell(59	,5,'',0,1);//end of line


    $pdf->SetFont('Times','',12);
   $pdf->SetTextColor(140,140,140);
    //Cell( width, height ,string(tex), mixed border(0-none,1-framed), position(0,1,2), align(R,L,C), BACKGROUND(TRUE/FALSE), link)
    
    //ROW 1

    $pdf->Cell(75,10,'From '.$sdate. ' to ' .$edate,0,0,'L'); //decription (start date -end date)
    $pdf->Cell(35,10,'',0,0,'L');//rate
    $pdf->Cell(40,10,'',0,0,'L');//qty
    $pdf->Cell(40,10,'',0,0,'L');//amount
    $pdf->Cell(59	,5,'',0,1);//end of line

    //ROW 2
    
    $pdf->Cell(75,10,'No of Days : '. $numberDays,0,0,'L');  //decription
    $pdf->Cell(35,10,'',0,0,'L');//rate
    $pdf->Cell(40,10,'',0,0,'L');//qty
    $pdf->Cell(40,10,'',0,0,'L');//amount
    $pdf->Cell(59	,5,'',0,1);//end of line


  $pdf->ln(3);//line spacing

    //ROW 3

    $pdf->Cell(75,10,'Pakage Type: '.$invoice['ptype'],0,0,'L'); //decription
    $pdf->Cell(35,10,'',0,0,'C');//rate
    $pdf->Cell(40,10,'',0,0,'C');//qty
    $pdf->Cell(40,10,'',0,0,'R');//amount
    $pdf->Cell(59	,5,'',0,1);//end of line


    //ROW 4
    
    $pdf->Cell(75,10,'Pakage Name: '.$invoice['pname'],0,0,'L'); //decription
    $pdf->Cell(35,10,'',0,0,'C');//rate
    $pdf->Cell(40,10,'',0,0,'C');//qty
    $pdf->Cell(40,10,'',0,0,'R');//amount
    $pdf->Cell(59	,5,'',0,1);//end of line


    $pdf->ln(3);//line spacing
    
      //ROW 5
    $pdf->Cell(75,10,'Organziation: '. $invoice['organ'],0,0,'L'); //decription
    $pdf->Cell(35,10,'',0,0,'L');//rate
    $pdf->Cell(40,10,'',0,0,'L');//qty
    $pdf->Cell(40,10,'',0,0,'L');//amount
    $pdf->Cell(59	,5,'',0,1);//end of line

    //ROW 6
    $pdf->Cell(75,10,'RAM: '.$invoice['ram'],0,0,'L'); //decription
    $pdf->Cell(35,10,'',0,0,'R');//rate
    $pdf->Cell(40,10,'',0,0,'L');//qty
    $pdf->Cell(40,10,'',0,0,'R');//amount
    $pdf->Cell(59	,5,'',0,1);//end of line


      //ROW 7
    $pdf->Cell(75,10,'CPU: '.$invoice['cpu'],0,0,'L'); //decription
    $pdf->Cell(35,10,'',0,0,'L');//rate
    $pdf->Cell(40,10,'',0,0,'L');//qty
    $pdf->Cell(40,10,'',0,0,'L');//amount
    $pdf->Cell(59	,5,'',0,1);//end of line

     //ROW 8
     $pdf->Cell(75,10,'GPU: '. $invoice['gpu'],0,0,'L'); //decription
     $pdf->Cell(35,10,'',0,0,'L');//rate
     $pdf->Cell(40,10,'',0,0,'L');//qty
     $pdf->Cell(40,10,'',0,0,'L');//amount
     $pdf->Cell(59	,5,'',0,1);//end of line

      //ROW 9
   $pdf->Cell(75,10,'Storage: ' . $invoice['stype'],0,0,'L'); //decription
   $pdf->Cell(35,10,'',0,0,'L');//rate
   $pdf->Cell(40,10,'',0,0,'L');//qty
   $pdf->Cell(40,10,'',0,0,'L');//amount
   $pdf->Cell(59	,5,'',0,1);//end of line

   //ROW 10

   $pdf->Cell(75,10,'Price Per Month: ' .$invoice['price'],0,0,'L'); //decription
   $pdf->Cell(35,10,$amount.' PKR',0,0,'C');//rate
   $pdf->Cell(40,10,'',0,0,'C');//qty
   $pdf->Cell(40,10,$amount.' PKR',0,0,'R');//amount
   $pdf->Cell(59	,5,'',0,1);//end of line



   $pdf->ln(7);//line spacing

    // Line(x1,y1,x2,y2); line 3
    $pdf->SetDrawColor(200,200,200);// line color
    $pdf->Line(10, 163, 200, 163);
    $pdf->Cell(59	,5,'',0,1);//end of line


    $pdf->SetFont('Times','',14);   
    $pdf->SetTextColor(225,225,225);
    $pdf->SetFillColor(104,149,197);
    $pdf->Cell(75,10,'',0,0,'L');
    $pdf->Cell(35,10,'',0,0,'L');
    $pdf->Cell(40,10,'TOTAL',0,0,'L',true);
    $pdf->Cell(40,10,$amount.' PKR',0,0,'R',true);

     // Line(x1,y1,x2,y2); line 4
     $pdf->Line(10, 173, 200, 173);
     $pdf->Cell(59,5,'',0,1);//end of line
 
     $pdf->Ln(20);//line space

    
//FOOTER
$pdf->SetTextColor(120,120,120);
$pdf->SetFont('Times','',12); 
$pdf->Cell(130,10,'National Center for Big Data & Cloud Computing',0,0,'L');
$pdf->Cell(40,10,'',0,0,);
$pdf->Cell(59	,5,'',0,1);

$pdf->Cell(130,10,'NED University of Engineering & Technology',0,0,'L');
$pdf->Cell(40,10,'',0,0);
$pdf->Cell(59	,5,'',0,1);

$pdf->Cell(130,10,'University Road, Karachi Pakistan, 75330',0,0,'L');

// Line(x1,y1,x2,y2); line 5
$pdf->SetDrawColor(0,0,0);//line color
$pdf->Line(138, 199, 185, 199);
$pdf->Cell(59,5,'',0,1);//end of line


$pdf->Cell(130,10,'Contact No:(92-21) 99261261-7 Ext: 2372, 2571',0,0,'L');
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,'Mr. Uzair Abid',0,0,'C');
$pdf->Cell(59	,5,'',0,1);

$pdf->SetTextColor(120,120,120);
$pdf->Cell(130,10,'Email: ncbc@neduet.edu.pk',0,0,'L');
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,'Team Lead - NCBC',0,0,'C');
$pdf->Cell(59	,5,'',0,1);



   
    $filename=$invoice['username'];
  
    

    // $pdf->Cell(130, 5, '', 0, 0);
    // $pdf->Cell(25, 5, 'Taxable', 0, 0);
    // $pdf->Cell(4, 5, ' ', 1, 0);
    // $pdf->Cell(30	,5,0,1,1,'R');//end of line
    $pdf->Cell(25, 5, 'GENERATED ON : '.' '.strtoupper(date("l jS \of F Y h:i:s A")), 0, 0);
    //$pdf->Output("Bill.$filename.pdf","D");
    $pdfdoc = $pdf->Output("Bill.$filename.pdf", "S");

    emailbill($invoiceID,$pdfdoc);
  }
  function emailbill($email,$pdfdoc)
  {
      include("../DB/db.php");
     
  

      $attachment1 = chunk_split(base64_encode(($pdfdoc)));
      $query = "SELECT v.assigndate,v.duration,c.cid,c.username,c.email,c.organ,u.password,
      u.UserId,p.ptype,p.pname,p.cpu,p.gpu,p.ram,p.os,p.stype,p.ssize,p.pricingtype,p.price
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
              $subject = "VWORLD CLOUD BILL";
            

              $contents = 'Hello, ' . $row['username'] . '<br/>' . 'Welcome to VWorld-NEDUET' . '<br/>' . 'You are sucessfully registered to our system with the following package and credential' . '<br/>' .
                  '<br/>' . 'Package Details' . '<br/>' . 'Package Type = ' . $row['ptype'] . '<br/>' . 'Package Name = ' . $row['pname'] . '<br/>' . 'No of CPUs = ' . $row['cpu'] . '<br/>' . 'No of GPUs = ' . $row['gpu'] . '<br/>' . 'Memory = ' . $row['ram'] . '<br/>' . 'Operating System = ' . $row['os'] . '<br/>' . 'Storage Type = ' . $row['stype'] . '<br/>' . 'Storage = ' . $row['ssize'] . '<br/>' . 'Pricing Model= ' . $row['pricingtype'] . '<br/>' . 'Price = ' . $row['price'] .
                  '<br/><br/>' . ' Credential Details' . '<br/>' . 'User Id = ' . $row['UserId'] . '<br/>' . 'Password = ' . $row['password']  .
                  '<br/>' . '<br/>' . '<br/>' . 'Thank You for choosing Vworld Cloud' . '<br/>' . 'Regards' . '<br/>' . 'VWorld Management Team' .
                  '<br/>' . 'Contact No. (92-21) 99261261-7 Ext: 2372, 2571' . '<br/>' . 'Email: ncbc@neduet.edu.pk  ' . '<br/>' . 'Web: https://ncbc.neduet.edu.pk/';
           
        
                 
            
            //   $attachment = chunk_split(base64_encode($pdfdoc));
              sendemail($to, $toname, $subject, $contents);
              
          }
  
          $message = 'Email Sent';
          echo "<script>  alert('$message');window.location.href='../dasshboard/dashboardvm.php'; </script>";
          echo 1;
          exit;
      }
      else{
          $message='Email Not Sent';
          echo "<script>  alert('$message');window.location.href='../dasshboard/dashboardvm.php'; </script>";
          echo 0;
          exit;
      }
  
  }
  

if (isset($_POST['Generate']))
{
    $invoiceID = $_POST['AC_ID'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    $date = date('Y-m-d');
    $startTimeStamp = strtotime($sdate);
    $endTimeStamp = strtotime($edate);
    $timeDiff = abs($endTimeStamp - $startTimeStamp);
    $numberDays = $timeDiff/86400;  // 86400 seconds in one day
    $numberDays = intval($numberDays);
    invoice_generate($invoiceID,$sdate,$edate,$date,$numberDays+1);
}
function invoice_generate($invoiceID,$sdate,$edate,$date,$numberDays)
{
    require('fpdf17/fpdf.php');
//db connection
    include("../DB/db.php");
    $code=null;

    $sql = "SELECT v.assigndate,v.duration,c.cid,c.username,c.email,
    c.organ,u.UserId,p.ptype,p.pname,p.cpu,p.gpu,p.ram,p.os,p.stype,p.ssize,p.pricingtype,p.price
FROM ((( vworlduser as v
INNER JOIN registeruser AS u ON u.uid = v.uid )
INNER JOIN registerclient AS c ON c.cid = v.cid)
INNER JOIN package AS p ON p.pid = v.pid)
WHERE v.vid='$invoiceID'";

    $result = $conn->query($sql);
    $invoice = $result->fetch_array();

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();



    // HEADER

    // Logo
    $pdf->Image('logo1.png',10,6,30);
   // Logo2
    $pdf->Image('logo2.png',170,6,30);
    // // Line break
    $pdf->Ln(30);

    $pdf->Cell(70);
    $pdf->SetFont('Times','',30);
    $pdf->cell(70,10,'INVOICE',0,0);
    $pdf->Cell(59	,5,'',0,1);//end of line
    $pdf->Ln(20);

    $pdf->SetFont('Times','',13);
    $pdf->SetTextColor(107,107,107);
    
    $pdf->Cell(130,5,'Invoice ID: '.$invoiceID,0,0);
    $pdf->Cell(59	,5,'',0,1);//end of line

    $pdf->Cell(130	,7,'Invoice To: '. $invoice['username'],0,0);
    $pdf->Cell(59	,5,'',0,1);//end of line
    $pdf->Cell(145,10,'Invoice Email: '.$invoice['email'],0,0,'L');
    $pdf->Cell(40,10,'Date: '.$date,0,0, 'R');//date
    $pdf->Cell(59	,5,'',0,1);



    //table

    $am=$invoice['price']/30;
    $amount=floor($am*$numberDays);

     // Line(x1,y1,x2,y2); line 1
     $pdf->Line(10, 84, 200, 84);
     $pdf->Cell(59 ,5,'',0,1);//end of line
     
     $pdf->SetFont('Times','B',12);
     $pdf->SetTextColor(0,0,0);
     $pdf->SetFillColor(220,220,220);
     $pdf->Cell(75,10,'DESCRIPTION',0,0,'L',true);
     $pdf->Cell(35,10,'RATE',0,0,'C',true);
     $pdf->Cell(40,10,'QTY',0,0,'C',true);
     $pdf->Cell(40,10,'AMOUNT',0,0,'R',true);
     $pdf->Cell(59	,5,'',0,1);//end of line
 
     // Line(x1,y1,x2,y2); line 2
     $pdf->Line(10, 96 , 200, 96);
     $pdf->Cell(59	,5,'',0,1);//end of line
     

     $pdf->SetFont('Times','',12);
   $pdf->SetTextColor(140,140,140);

//Cell( width, height ,string(tex), mixed border(0-none,1-framed), position(0,1,2), align(R,L,C), BACKGROUND(TRUE/FALSE), link)
    
    //ROW 1

    $pdf->Cell(75,10,'From '.$sdate. ' to ' .$edate,0,0,'L'); //decription (start date -end date)
    $pdf->Cell(35,10,'',0,0,'L');//rate
    $pdf->Cell(40,10,'',0,0,'L');//qty
    $pdf->Cell(40,10,'',0,0,'L');//amount
    $pdf->Cell(59	,5,'',0,1);//end of line

    //ROW 2
    
    $pdf->Cell(75,10,'No of Days : '. $numberDays,0,0,'L');  //decription
    $pdf->Cell(35,10,'',0,0,'L');//rate
    $pdf->Cell(40,10,'',0,0,'L');//qty
    $pdf->Cell(40,10,'',0,0,'L');//amount
    $pdf->Cell(59	,5,'',0,1);//end of line


  $pdf->ln(3);//line spacing

    //ROW 3

    $pdf->Cell(75,10,'Pakage Type: '.$invoice['ptype'],0,0,'L'); //decription
    $pdf->Cell(35,10,'',0,0,'C');//rate
    $pdf->Cell(40,10,'',0,0,'C');//qty
    $pdf->Cell(40,10,'',0,0,'R');//amount
    $pdf->Cell(59	,5,'',0,1);//end of line


    //ROW 4
    
    $pdf->Cell(75,10,'Pakage Name: '.$invoice['pname'],0,0,'L'); //decription
    $pdf->Cell(35,10,'',0,0,'C');//rate
    $pdf->Cell(40,10,'',0,0,'C');//qty
    $pdf->Cell(40,10,'',0,0,'R');//amount
    $pdf->Cell(59	,5,'',0,1);//end of line

  

    $pdf->ln(3);//line spacing
    
      //ROW 5
    $pdf->Cell(75,10,'Organziation: '. $invoice['organ'],0,0,'L'); //decription
    $pdf->Cell(35,10,'',0,0,'L');//rate
    $pdf->Cell(40,10,'',0,0,'L');//qty
    $pdf->Cell(40,10,'',0,0,'L');//amount
    $pdf->Cell(59	,5,'',0,1);//end of line

    //ROW 6
    $pdf->Cell(75,10,'RAM: '.$invoice['ram'],0,0,'L'); //decription
    $pdf->Cell(35,10,'',0,0,'R');//rate
    $pdf->Cell(40,10,'',0,0,'L');//qty
    $pdf->Cell(40,10,'',0,0,'R');//amount
    $pdf->Cell(59	,5,'',0,1);//end of line


      //ROW 7
    $pdf->Cell(75,10,'CPU: '.$invoice['cpu'],0,0,'L'); //decription
    $pdf->Cell(35,10,'',0,0,'L');//rate
    $pdf->Cell(40,10,'',0,0,'L');//qty
    $pdf->Cell(40,10,'',0,0,'L');//amount
    $pdf->Cell(59	,5,'',0,1);//end of line

     //ROW 8
     $pdf->Cell(75,10,'GPU: '. $invoice['gpu'],0,0,'L'); //decription
     $pdf->Cell(35,10,'',0,0,'L');//rate
     $pdf->Cell(40,10,'',0,0,'L');//qty
     $pdf->Cell(40,10,'',0,0,'L');//amount
     $pdf->Cell(59	,5,'',0,1);//end of line

     //ROW 9
   $pdf->Cell(75,10,'Storage: ' . $invoice['stype'],0,0,'L'); //decription
   $pdf->Cell(35,10,'',0,0,'L');//rate
   $pdf->Cell(40,10,'',0,0,'L');//qty
   $pdf->Cell(40,10,'',0,0,'L');//amount
   $pdf->Cell(59	,5,'',0,1);//end of line

    //ROW 10

    $pdf->Cell(75,10,'Price Per Month: ' .$invoice['price'],0,0,'L'); //decription
    $pdf->Cell(35,10,$amount.' PKR',0,0,'C');//rate
    $pdf->Cell(40,10,'',0,0,'C');//qty
    $pdf->Cell(40,10,$amount.' PKR',0,0,'R');//amount
    $pdf->Cell(59	,5,'',0,1);//end of line








   $pdf->ln(7);//line spacing

    // Line(x1,y1,x2,y2); line 3
    $pdf->SetDrawColor(200,200,200);// line color
    $pdf->Line(10, 163, 200, 163);
    $pdf->Cell(59	,5,'',0,1);//end of line


    $pdf->SetFont('Times','',14);   
    $pdf->SetTextColor(225,225,225);
    $pdf->SetFillColor(104,149,197);
    $pdf->Cell(75,10,'',0,0,'L');
    $pdf->Cell(35,10,'',0,0,'L');
    $pdf->Cell(40,10,'TOTAL',0,0,'L',true);
    $pdf->Cell(40,10,$amount.' PKR',0,0,'R',true);

     // Line(x1,y1,x2,y2); line 4
     $pdf->Line(10, 173, 200, 173);
     $pdf->Cell(59,5,'',0,1);//end of line
 
     $pdf->Ln(20);//line space




//FOOTER
$pdf->SetTextColor(120,120,120);
$pdf->SetFont('Times','',12); 
$pdf->Cell(130,10,'National Center for Big Data & Cloud Computing',0,0,'L');
$pdf->Cell(40,10,'',0,0,);
$pdf->Cell(59	,5,'',0,1);

$pdf->Cell(130,10,'NED University of Engineering & Technology',0,0,'L');
$pdf->Cell(40,10,'',0,0);
$pdf->Cell(59	,5,'',0,1);

$pdf->Cell(130,10,'University Road, Karachi Pakistan, 75330',0,0,'L');

 // Line(x1,y1,x2,y2); line 5
 $pdf->SetDrawColor(0,0,0);//line color
$pdf->Line(138, 199, 185, 199);
$pdf->Cell(59,5,'',0,1);//end of line

$pdf->Cell(130,10,'Contact No:(92-21) 99261261-7 Ext: 2372, 2571',0,0,'L');
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,'Mr. Uzair Abid',0,0,'C');
$pdf->Cell(59	,5,'',0,1);

$pdf->SetTextColor(120,120,120);
$pdf->Cell(130,10,'Email: ncbc@neduet.edu.pk',0,0,'L');
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,'Team Lead - NCBC',0,0,'C');
$pdf->Cell(59	,5,'',0,1);//end of line

$filename=$invoice['username'];

    

    // $pdf->Cell(130, 5, '', 0, 0);
    // $pdf->Cell(25, 5, 'Taxable', 0, 0);
    // $pdf->Cell(4, 5, ' ', 1, 0);
    // $pdf->Cell(30	,5,0,1,1,'R');//end of line
$pdf->ln(30);
$pdf->SetTextColor(120,120,120);
    $pdf->Cell(25, 5, 'GENERATED ON : '.' '.strtoupper(date("l jS \of F Y h:i:s A")), 0, 0);
    $pdf->Output("Bill.$filename.pdf","I");
}
?>
