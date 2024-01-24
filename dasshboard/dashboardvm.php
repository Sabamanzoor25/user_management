<?php

include_once '../DB/db.php';



function imagewrtie($txt1, $txt2, $txt3,$txt4,$txt5){
  if($txt4=='Platinum'){
  // open image    ------------ //for platinum card member
$img = imagecreatefrompng("../img/platinum-b.png");
$fontcolor = imagecolorallocate($img,0,0,0);
$angle=0;
$fontsize = 20; 
$fontFile = "C:\Windows\Fonts\arial.ttf";

  imagettftext($img, $fontsize, $angle,370,92, $fontcolor,$fontFile,$txt1);
  imagettftext($img, $fontsize, $angle,370,164, $fontcolor,$fontFile,$txt2.$txt5);
  imagettftext($img, $fontsize, $angle,370,235, $fontcolor,$fontFile,$txt3);




  
  $dst = imagecreatefrompng("../img/platinum-f.png");
  imagecopymerge($dst, $img, 1011, 0, 0, 0, 1011, 639, 100);


  if (!file_exists('../IDCard/')) {
    mkdir('../IDCard', 0777, true);
    $directory="../IDCard";
  }
  /* image save */
  $directory="../IDCard";
  imagepng($dst, $directory.'/'.$txt1.$txt4.'.png');


  


  // output image(directly show image)
// header("Content-Type: platinum-b.png");
// imagepng($dst);
imagedestroy($dst);
  }
  elseif($txt4=='Gold') {
          // open image   ------------ //for gold card member
$img = imagecreatefrompng("../img/gold-b.png");
$fontcolor = imagecolorallocate($img,0,0,0);
$angle=0;
$fontsize = 20; 
$fontFile = "C:\Windows\Fonts\arial.ttf";

  imagettftext($img, $fontsize, $angle,370,92, $fontcolor,$fontFile,$txt1);
  imagettftext($img, $fontsize, $angle,370,164, $fontcolor,$fontFile,$txt2.$txt5);
  imagettftext($img, $fontsize, $angle,370,235, $fontcolor,$fontFile,$txt3); 


  
  $dst = imagecreatefrompng("../img/gold-f.png");
  imagecopymerge($dst, $img, 1011, 0, 0, 0, 1011, 639, 100);

  if (!file_exists('../IDCard/')) {
    mkdir('../IDCard', 0777, true);
    $directory="../IDCard";
  }
  /* image save */
  $directory="../IDCard";
  imagepng($dst, $directory.'/'.$txt1.$txt4.'.png');


  // output image(directly show image)
// header("Content-Type:gold-b.png");
// imagepng($dst);
imagedestroy($dst);
}

elseif($txt4=='Silver') {
  // open image    ------------ //for silver card member
$img = imagecreatefrompng("../img/silver-b.png");
$fontcolor = imagecolorallocate($img,0,0,0);
$angle=0;
$fontsize = 20; 
$fontFile = "C:\Windows\Fonts\arial.ttf";

imagettftext($img, $fontsize, $angle,370,92, $fontcolor,$fontFile,$txt1);
imagettftext($img, $fontsize, $angle,370,164, $fontcolor,$fontFile,$txt2.$txt5);
imagettftext($img, $fontsize, $angle,370,235, $fontcolor,$fontFile,$txt3);





$dst = imagecreatefrompng("../img/silver-f.png");
imagecopymerge($dst, $img, 1011, 0, 0, 0, 1011, 639, 100);


if (!file_exists('../IDCard/')) {
  mkdir('../IDCard', 0777, true);
  $directory="../IDCard";
}
/* image save */
$directory="../IDCard";
imagepng($dst, $directory.'/'.$txt1.$txt4.'.png');
// output image(directly show image)
// header("Content-Type:../img/admin-b.png");
// imagepng($dst);


// output image(directly show image)
// header("Content-Type:silver-f.png");
// imagepng($dst);
imagedestroy($dst);
}
else {
  // open image    ------------ //for Admin card member
$img = imagecreatefrompng("../img/admin-b.png");
$fontcolor = imagecolorallocate($img,0,0,0);
$angle=0;
$fontsize = 20; 
$fontFile = "C:\Windows\Fonts\arial.ttf";

imagettftext($img, $fontsize, $angle,370,92, $fontcolor,$fontFile,$txt1);
imagettftext($img, $fontsize, $angle,370,164, $fontcolor,$fontFile,$txt2.$txt5);
imagettftext($img, $fontsize, $angle,370,235, $fontcolor,$fontFile,$txt3);





$dst = imagecreatefrompng("../img/admin-f.png");
imagecopymerge($dst, $img, 1011, 0, 0, 0, 1011, 639, 100);

 /* create directory */
 if (!file_exists('../IDCard/')) {
  mkdir('../IDCard', 0777, true);
  $directory="../IDCard";
}
/* image save */
$directory="../IDCard";
imagepng($dst, $directory.'/'.$txt1.$txt4.'.png');
// output image(directly show image)
// header("Content-Type:../img/admin-b.png");
// imagepng($dst);
imagedestroy($dst);
}
}


?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
  <head>

      <style>
          body {font-family: Arial, Helvetica, sans-serif;}

          #myImg {
              border-radius: 5px;
              cursor: pointer;
              transition: 0.3s;
          }

          #myImg:hover {opacity: 0.7;}

          /* The Modal (background) */
          .modal {
              display: none; /* Hidden by default */
              position: fixed; /* Stay in place */
              z-index: 1; /* Sit on top */
              padding-top: 100px; /* Location of the box */
              left: 0;
              top: 0;
              width: 100%; /* Full width */
              height: 100%; /* Full height */
              overflow: auto; /* Enable scroll if needed */
              background-color: rgb(0,0,0); /* Fallback color */
              background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
          }

          /* Modal Content (image) */
          .modal-content {
              margin: auto;
              display: block;
              width: 80%;
              max-width: 700px;
          }

          /* Caption of Modal Image */
          #caption {
              margin: auto;
              display: block;
              width: 80%;
              max-width: 700px;
              text-align: center;
              color: #ccc;
              padding: 10px 0;
              height: 150px;
          }

          /* Add Animation */
          .modal-content, #caption {
              -webkit-animation-name: zoom;
              -webkit-animation-duration: 0.6s;
              animation-name: zoom;
              animation-duration: 0.6s;
          }

          @-webkit-keyframes zoom {
              from {-webkit-transform:scale(0)}
              to {-webkit-transform:scale(1)}
          }

          @keyframes zoom {
              from {transform:scale(0)}
              to {transform:scale(1)}
          }

          /* The Close Button */
          .close {
              position: absolute;
              top: 15px;
              right: 35px;
              color: #f1f1f1;
              font-size: 40px;
              font-weight: bold;
              transition: 0.3s;
          }

          .close:hover,
          .close:focus {
              color: #bbb;
              text-decoration: none;
              cursor: pointer;
          }

          /* 100% Image Width on Smaller Screens */
          @media only screen and (max-width: 700px){
              .modal-content {
                  width: 100%;
              }
          }
      </style>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
          $(document).ready(function(){
              // Delete
              $('.delete').click(function(){
                  var el = this;
                  // Delete id
                  var deleteid = $(this).data('id');
                  var values = $(this).val();
                  var confirmalert = confirm("Are you sure you want to delete ?");
                  confirmalert=true;
                  var data = { id: deleteid };
                  if(values=='Delete')
                  {
                      if (confirmalert == true)
                      {
                          $.ajax({
                              url: 'modify.php',
                              type: 'POST',
                              data: { id:deleteid },
                              success: function(response){
                                  if(response == 1){
                                      // Remove row from HTML Table
                                      $(el).fadeOut().remove();
                                      $(this).remove();
                                  }
                                  else{
                                      alert('Invalid ID.');
                                  }
                              }
                          });
                      }
                      else
                      {
                          alert('Not Confirmed Try Again');

                      }}
              });

              $('.email').click(function(){
                  var el = this;
                  // Delete id
                  var deleteid = $(this).data('id1');
                  var values = $(this).val();
                  var confirmalert = confirm("Are you sure you want to send email ?");
                  confirmalert=true;
                  var data = { id1: deleteid };
                  if(values=='Email')
                  {
                      //alert(values);
                      if (confirmalert == true)
                      {
                          $.ajax({
                              url: 'modify.php',
                              type: 'POST',
                              data: { id1:deleteid },
                              success: function(response)
                              {
                                  if(response == 1)
                                  {
                                      buttonvalue=$(el).closest('input').val();
                                      if(buttonvalue=="Email")
                                      {
                                          $(el).closest('input').val("Email Send");
                                          $(el).closest('input').css('background','tomato');
                                      }
                                      else
                                      {
                                          $(el).closest('input').val("Email");
                                          $(el).closest('input').css('background','green');
                                      }
                                  }
                                  else
                                  {
                                      alert('Invalid ID.');
                                  }
                              }
                          });
                      }
                      else
                      {
                          alert('Not Confirmed Try Again');

                      }}
              });

          });
      </script>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>V-World Admin</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <a class="sidebar-brand brand-logo" href="dashboard.php" ><h2>V-WORLD</h2></a>
          <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="dashboard.php"><img src="../img/aurora-logo.png" alt="logo" /></a>
        </div>
          <ul class="nav">
              <li class="nav-item">
                  <a class="nav-link" href="dashboardvm.php">
                      <i class="mdi mdi-home menu-icon"></i>
                      <span class="menu-title">User Management</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="dashboardbill.php">
                      <i class="mdi mdi-home menu-icon"></i>
                      <span class="menu-title">Billing </span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="dashboard.php">
                      <i class="mdi mdi-home menu-icon"></i>
                      <span class="menu-title">Marketing </span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="customerinfo/customerinfo.php">
                      <i class="mdi mdi-home menu-icon"></i>
                      <span class="menu-title">Customer Info</span>
                  </a>
              </li>
              <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <i class="mdi mdi-home menu-icon"></i> <span class="menu-title">Edit Record </span>
                  </a></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="background-color:LightSkyBlue;">
                      <li><a class="dropdown-item" href="update/user/user.php">User Register</a></li>
                      <li><a class="dropdown-item" href="update/client/client.php">Client Register</a></li>
                      <li><a class="dropdown-item" href="update/packages/packages.php">Packages</a></li>
                    </ul>
          </li>
          </br></br></br></br>
        </ul>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles dark"></div>
          </div>
        </div>
        <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
            <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
              <i class="mdi mdi-menu"></i>
            </button>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell-outline"></i>
                  <span class="count count-varient1">7</span>
                </a>
                <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face4.jpg" alt="" class="profile-pic" />
                    </div>
                    <div class="preview-item-content">
                      <p class="mb-0"> Dany Miles <span class="text-small text-muted">commented on your photo</span>
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face3.jpg" alt="" class="profile-pic" />
                    </div>
                    <div class="preview-item-content">
                      <p class="mb-0"> James <span class="text-small text-muted">posted a photo on your wall</span>
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face2.jpg" alt="" class="profile-pic" />
                    </div>
                    <div class="preview-item-content">
                      <p class="mb-0"> Alex <span class="text-small text-muted">just mentioned you in his post</span>
                      </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0">View all activities</p>
                </div>
              </li>
              <li class="nav-item dropdown d-none d-sm-flex">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-email-outline"></i>
                  <span class="count count-varient2">5</span>
                </a>
                <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
                      <span class="badge badge-pill badge-success">Request</span>
                      <p class="text-small text-muted ellipsis mb-0"> Suport needed for user123 </p>
                    </div>
                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
                      <span class="badge badge-pill badge-warning">Invoices</span>
                      <p class="text-small text-muted ellipsis mb-0"> Invoice for order is mailed </p>
                    </div>
                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
                      <span class="badge badge-pill badge-danger">Projects</span>
                      <p class="text-small text-muted ellipsis mb-0"> New project will start tomorrow </p>
                    </div>
                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                  </a>
                  <h6 class="p-3 mb-0">See all activity</h6>
                </div>
              </li>
              <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                <form class="nav-link form-inline mt-2 mt-md-0">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                  </div>
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right ml-lg-auto">
              <li class="nav-item dropdown d-none d-xl-flex border-0">
                <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-earth"></i> English </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                  <a class="dropdown-item" href="#"> French </a>
                  <a class="dropdown-item" href="#"> Spain </a>
                  <a class="dropdown-item" href="#"> Latin </a>
                  <a class="dropdown-item" href="#"> Japanese </a>
                </div>
              </li>
              <li class="nav-item nav-profile dropdown border-0">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                  <img class="nav-profile-img mr-2" alt="" src="../img/aurora-logo.png" />
                  <span class="profile-name">V-World</span>
                </a>
                <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">

                  <a class="dropdown-item" href="#">
                      <form action="../main.php" method="post">
                          <input class="mdi mdi-logout mr-2 text-primary" type="submit" id="logout" value="logout" name="logout">
                      </form>
                    <i class="mdi mdi-logout mr-2 text-primary"></i>  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper pb-0">

            <div class="row">

                  <div class="col-xl-12 col-md-12 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-warning">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                              <h1 class="text-white" style="text-align: center">Register Client For VApp & VMs</h1>

                              <br><br><br>
                              <form method="post" action="../main.php">
                                  <br class="container">
                                  <div class="form-group">
                                      <select class="form-control" aria-label="Select Client Via Email" id="Client" name="client" required="required" style="">
                                          <?php
                                          include_once '../DB/db.php';

                                          $sql2 = "SELECT * FROM registerclient ";
                                          $result = $conn->query($sql2);
                                          if ($result->num_rows > 0)
                                          {
                                              echo"<option selected>Select Client</option>";
                                              $a=' ';
                                              while ($row = $result->fetch_assoc())
                                              {
                                                  echo"<option value='". $row['cid']."'>". '< '.$row['username'].' >' .$a.'< '. $row['email'] .' >'."</option>";

                                              }
                                          }
                                          ?>
                                      </select></br> </br></div>

                                  <div class="form-group">
                                      <select class="form-control" aria-label="Select User Via ID" id="user" name="user" required="required" style="">
                                          <?php
                                          include_once '../DB/db.php';
                                          echo"<option selected> Select User </option>";

                                          $sql2 = "SELECT * FROM registeruser ";
                                          $result = $conn->query($sql2);
                                          if ($result->num_rows > 0)
                                          {
                                              echo"<option selected>Select User Via ID</option>";
                                              $a=' ';
                                              while ($row = $result->fetch_assoc())
                                              {
                                                  echo"<option value='". $row['uid']."'>". '< '.$row['UserId'].'>'."</option>";

                                              }
                                          }
                                          ?>
                                      </select></br> </br></div>
                                  <div class="form-group">
                                      <select class="form-control" aria-label="Select Package Via Name" id="package" name="pack" required="required" style="">
                                          <?php
                                          include_once '../DB/db.php';

                                          $sql2 = "SELECT * FROM package ";
                                          $result = $conn->query($sql2);
                                          echo"<option selected>Select Package </option>";
                                          if ($result->num_rows > 0)
                                          {
                                              $a=' ';
                                              while ($row = $result->fetch_assoc())
                                              {
                                                  echo"<option value='". $row['pid']."'>". '< '.$row['pname'].'>'."</option>";

                                              }
                                          }
                                          ?>
                                      </select></br> </br></div>
                                  <div class="form-group">
                                      <input type="number" class="form-control" placeholder="Duration in Months" name="duration" >
                                  </div></br> </br>

                                  <div class="form-group">
                                      <button type="submit" style="width:auto; background-color:bisque" name="RegisterVworld">Register</button>
                                  </div>
                              </form>


                          </div>
                          <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                        </div>
                      </div>


                </div>
              </div>
            </div>
              <div class="row">
                  <div class="col-xl-12 col-sm-6 grid-margin stretch-card">
                      <div class="card">
                          <div class="card-body px-0 overflow-auto">
                              <h4 class="card-title pl-4">VWORLD Users Details</h4>
                              <div class="table-responsive">
                                  <table class="table table-striped mb-none">
                                      <thead>
                                      <tr>
                                          <th>USER NAME</th>
                                          <th>VMName</th>
                                          <th>AppName</th>
                                          <th>AD ID</th>
                                          <th>Pack Type</th>
                                          <th>Delete</th>
                                          <th>Email</th>
                                          <th>Email </th>
                                          <th>Card</th>
                                          <th>Pack Name</th>
                                          <th>CPU</th>
                                          <th>GPU</th>
                                          <th>RAM</th>
                                          <th>Operating Sys</th>
                                          <th>Storage Type </th>
                                          <th>Storage</th>
                                          <th>Pricing Model</th>
                                          <th>Price</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                      include_once '../DB/db.php';
                                      $x=' ';
                                      $sql2 = "SELECT c.ids,c.ctype,c.regdate,c.cell,p.vname,p.appname,v.vid,c.username,c.email,u.UserId,u.password,p.ptype,
                                      p.pname,p.cpu,p.gpu,p.ram,p.os,p.stype,p.ssize,p.pricingtype,p.price
                                      FROM ((( vworlduser as v
                                      INNER JOIN registeruser AS u ON u.uid = v.uid )
                                      INNER JOIN registerclient AS c ON c.cid = v.cid)
                                      INNER JOIN package AS p ON p.pid = v.pid) ";
                                      $result = $conn->query($sql2);
                                      if ($result->num_rows > 0)
                                      {
                                          while ($row = $result->fetch_assoc()) {
                                              $id = $row['vid'];
                                              echo "<tr>";
//                                                    echo "<td>" . $row['D_ID'] . "</td>";
                                              echo "<td>" . $row['username'] . "</td>";
                                              echo "<td>" . $row['vname'] . "</td>";
                                              echo "<td>" . $row['appname'] . "</td>";
                                              echo "<td>" . $row['UserId'] . "</td>";
                                              echo "<td>" . $row['ptype'] . "</td>";
                                              echo "<td><a href='delete.php?id=".$id."' style='color: red'>Delete</a></td>";
                                              echo "<td><a href='delete.php?email=".$id."' style='color: green'>Email</a></td>";
                                              $t1 = $row['ids'];
                                              $t2 = $row['username'];
                                              $date = new DateTime();
                                              $date->add(new DateInterval('P6M'));
                                              $t3 =$date->format('d M Y');
                                              echo "<td>" . $row['email'] . "</td>";
                                              $t4 = $row['ctype'];
                                              $t5=' / '.$row['UserId'];
                                              imagewrtie($t1, $t2, $t3,$t4,$t5);
//'.$txt1.$txt4.'.


                                              echo'<td> <img id="myImg" src="../IDCard/'.$t1.$t4.'.png" alt="IDcard" style="width:100%;max-width:300px">;
<!-- The Modal -->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="" src="../IDCard/';
    
                                              echo $t1.$t4.'.png';
                                              echo '"style="width: 2000px;height:400px">
<div id="caption"></div>
</div></td>';

                                              echo "<td>" . $row['pname'] . "</td>";
                                              echo "<td>" . $row['cpu'] . "</td>";
                                              echo "<td>" . $row['gpu'] . "</td>";
                                              echo "<td>" . $row['ram'] . "</td>";
                                              echo "<td>" . $row['os'] . "</td>";
                                              echo "<td>" . $row['stype'] . "</td>";
                                              echo "<td>" . $row['ssize'] . "</td>";
                                              echo "<td>" . $row['pricingtype'] . "</td>";
                                              echo "<td>" . $row['price'] . "</td>";
                                              echo "</tr>";
                                          }
                                          echo "</table>";
                                      } else {
                                          echo "<h2>no record </h2>";
                                      }

                                      ?>
                                      </tbody>
                                  </table>
                              </div>

                              <a class="text-black mt-3 d-block pl-4" href="#">
                                  <span class="font-weight-medium h6">View all order history</span>
                                  <i class="mdi mdi-chevron-right"></i></a>
                          </div>
                      </div>
                  </div>

              </div>

          </div>
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © ncbc@nedduet.edu.pk</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">  <a href="https://www.ncbcneduet.edu.pk" target="_blank">UMS dashboard </a> </span>
                </div>
            </footer>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("myImg");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/flot/jquery.flot.js"></script>
    <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="assets/vendors/flot/jquery.flot.pie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
  
</html>