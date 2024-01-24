<?php
include_once '../DB/db.php';

//notification

$find_notifications = "Select * from notification where status = 0";
$result = mysqli_query($conn,$find_notifications);
$count_active = '';
$notifications_data = array(); 
$deactive_notifications_dump = array();
 while($rows = mysqli_fetch_assoc($result)){
         $count_active = mysqli_num_rows($result);
         $notifications_data[] = array(
                     "vid" => $rows['vid'],
                     "notification"=>$rows['notification']
                     
         );
 }
 //only five specific posts
 $deactive_notifications = "Select * from notification where status = 0 ORDER BY vid DESC LIMIT 0,5";
 $result = mysqli_query($conn,$deactive_notifications);
 while($rows = mysqli_fetch_assoc($result)){
   $deactive_notifications_dump[] = array(
               "vid" => $rows['vid'],
               "notification"=>$rows['notification']
              
   );
 }



$query="SELECT sum(ram), sum(cpu),sum(ssize), sum(gpu)
FROM (( vworlduser as v

INNER JOIN package AS p ON p.pid = v.pid)
INNER JOIN registerclient AS c ON c.cid = v.cid)";

$resultset = mysqli_query($conn, $query);
while( $rows = mysqli_fetch_assoc($resultset) )
{
// $freeram=(32-($rows['SUM(ram)'])); //in gb
// $freestorage=(500-($rows['SUM(ssize)']));  //in gb
// $freecpu=(11-($rows['SUM(cpu)']));  //in gb


$ram=($rows['sum(ram)'])/100;
$cpu=($rows['sum(cpu)'])/100;

$ssize=($rows['sum(ssize)'])/100;
$gpu=($rows['sum(gpu)'])/100;

#Ram
$dataPoints = array( 
  // array("label"=>"Free", "y"=>$freeram),
  array("label"=>"RAM", "y"=>$ram),
   array("label"=>"HPC CLuster", "y"=>0.5),
   array("label"=>"VApps", "y"=>00.00),
   array("label"=>"VMs", "y"=>00.00),
);
#CPU
$dataPoints2 = array(
	// array("label"=>"Free", "y"=>$freecpu),
    array("label"=>"CPU", "y"=>$rows['sum(cpu)']),
    array("label"=>"HPC CLuster", "y"=>27.00),
    array("label"=>"VApps", "y"=>00.00),
    array("label"=>"VMs", "y"=>00.00)
);
#Storage
$dataPoints3 = array(
  // array("label"=>"Free", "y"=>$freestorage),
  array("label"=>"Storage", "y"=>$ssize),
    array("label"=>"HPC CLuster", "y"=>2.5),
    array("label"=>"VApps", "y"=>00.00),
    array("label"=>"VMs", "y"=>00.00)
);
#GPU
$dataPoints4 = array(
    array("label"=>"GPU", "y"=>$gpu),
    array("label"=>"HPC CLuster", "y"=>0.2),
    array("label"=>"VApps", "y"=>00.00),
    array("label"=>"VMs", "y"=>00.00)
);
}
?>



<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
  <head>
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
      <script>


          window.onload = function() {

              var chart = new CanvasJS.Chart("chartContainer", {
                  animationEnabled: true,
                  title: {
                      text: "Usage Share of RAM"
                  },
                  subtitles: [{
                      text: " 2022"
                  }],
                  data: [{
                      type: "pie",
                      yValueFormatString: "#,##0.00\"%\"",
                      indexLabel: "{label} ({y})",
                      dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                  }]
              });
              var chart1 = new CanvasJS.Chart("chartContainer2", {
                  animationEnabled: true,
                  title: {
                      text: "Usage Share of CPU"
                  },
                  subtitles: [{
                      text: "2022"
                  }],
                  data: [{
                      type: "pie",
                      yValueFormatString: "#,##0.00\"%\"",
                      indexLabel: "{label} ({y})",
                      dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                  }]
              });
              var chart3 = new CanvasJS.Chart("chartContainer3", {
                  animationEnabled: true,
                  title: {
                      text: "Usage Share of Storage"
                  },
                  subtitles: [{
                      text: " 2022"
                  }],
                  data: [{
                      type: "pie",
                      yValueFormatString: "#,##0.00\"%\"",
                      indexLabel: "{label} ({y})",
                      dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
                  }]
              });
              var chart4 = new CanvasJS.Chart("chartContainer4", {
                  animationEnabled: true,
                  title: {
                      text: "Usage Share of GPU"
                  },
                  subtitles: [{
                      text: " 2022"
                  }],
                  data: [{
                      type: "pie",
                      yValueFormatString: "#,##0.00\"%\"",
                      indexLabel: "{label} ({y})",
                      dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
                  }]
              });
              chart.render();
              chart1.render();
              chart3.render();
              chart4.render();
          }
      </script>
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
                  <i class="mdi mdi-bell-outline" id="over" data-value ="<?php echo $count_active;?>" ></i>
                  <?php if(!empty($count_active)){?>
                    <div class="round" id="bell-count" data-value ="<?php echo $count_active;?>"> <span class="count count-varient1"><?php echo $count_active; ?></span></div> <?php }?>
                </a>
                <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <a class="dropdown-item preview-item">
                  <?php if(!empty($count_active)){?>
                   
                    <div class="preview-thumbnail" >
                    <?php
                          foreach($notifications_data as $list_rows){?>
                          <span ><?php echo $list_rows['vid'];?></span>
                          
                    <div class="msg">
                      <p class="mb-0"> <?php 
                                  echo $list_rows['notification'];
                                ?>
                      </p>
                    </div>  
                    <?php }
                       ?> 
                    </div>
                    <?php }else{?>
                    <div id="list">
                       <!--old Messages-->
                        <?php
                          foreach($deactive_notifications_dump as $list_rows){?>
                            <li id="message_items">
                            <div class="message alert alert-danger" data-id=<?php echo $list_rows['vid'];?>>
                              <span><?php echo $list_rows['notification'];?></span>
                              <div class="msg">
                               
                              </div>
                            </div>
                            </li>
                         <?php }
                       ?>
                        <!--old Messages-->
                     
                     <?php } ?>
                     
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
                     </ul>

                     </ul>
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
                    <i class="mdi mdi-logout mr-2 text-primary" name="logout"></i>  </a>
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
              <div class="col-xl-6 col-lg-12 stretch-card grid-margin">
                <div class="row">
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-warning">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head" style="display: inline">No Of Clients:      </p>
                            <h2 class="text-white" >
                                <?php
                                $sql2 = "SELECT * FROM registerclient";
                                $result = $conn->query($sql2);
                                $rows=$result->num_rows;
                                if ($rows)
                                {
                                    echo $rows;
                                }
                                ?> <span class="h5"></span>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                        </div>
                        <h6 class="text-white">NED Researcher :  <?php
                            $sql2 = "SELECT * FROM registerclient WHERE type ='ned'";
                            $result = $conn->query($sql2);
                            $rows=$result->num_rows;
                            if ($rows)
                            {
                                echo $rows;
                            }
                            else
                            {
                                echo 0;
                            }
                            ?> </h6>
                          <h6 class="text-white">Other Universities Researcher :  <?php
                              $sql2 = "SELECT * FROM registerclient WHERE type ='other'";
                              $result = $conn->query($sql2);
                              $rows=$result->num_rows;
                              if ($rows)
                              {
                                  echo $rows;
                              }
                              else
                              {
                                  echo 0;
                              }
                              ?> </h6>
                          <h6 class="text-white">Professional :  <?php
                              $sql2 = "SELECT * FROM registerclient WHERE type ='pro'";
                              $result = $conn->query($sql2);
                              $rows=$result->num_rows;
                              if ($rows)
                              {
                                  echo $rows;
                              }
                              else
                              {
                                  echo 0;
                              }
                              ?> </h6>


                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-danger">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">No Of AD Users</p>
                            <h2 class="text-white">
                                <?php
                                $sql2 = "SELECT * FROM registeruser";
                                $result = $conn->query($sql2);
                                $rows=$result->num_rows;
                                if ($rows)
                                {
                                    echo $rows;
                                }
                                else
                                {
                                    echo 0;
                                }
                                ?>
                                <span class="h5"></span>
                            </h2>
                              <p class="mb-0 color-card-head">No Of Packages</p>
                              <h2 class="text-white">
                                  <?php
                                  $sql5= "SELECT * FROM package";
                                  $result = $conn->query($sql5);
                                  $rows=$result->num_rows;
                                  if ($rows)
                                  {
                                      echo $rows;
                                  }
                                  else
                                  {
                                      echo 0;
                                  }
                                  ?>
                                  <span class="h5"></span>
                              </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
                        </div>
<!--                        <h6 class="text-white">Linux Based Users : 1</h6>-->
<!--                        <h6 class="text-white">Windows Bassed Users : 1</h6>-->

                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                    <div class="card bg-primary">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Registered Clients For VMs</p>
                            <h2 class="text-white">
                                <?php
                                $sql2 = "SELECT p.ptype FROM vworlduser as v
                                        INNER JOIN package AS p ON p.pid = v.pid
                                        WHERE p.ptype='VM'";
                                $result = $conn->query($sql2);
                                $rows=$result->num_rows;
                                if ($rows)
                                {
                                    echo $rows;
                                }
                                else
                                {
                                    echo 0;
                                }
                                ?> <span class="h5"></span>
                                <span class="h5"></span>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                        </div>
                          <h6 class="text-white">Linux Based Users :
                              <?php
                              $sql2 = "SELECT p.os FROM vworlduser as v
                                        INNER JOIN package AS p ON p.pid = v.pid
                                        WHERE p.os='Linux' AND p.ptype='VM'";
                              $result = $conn->query($sql2);
                              $rows=$result->num_rows;
                              if ($rows)
                              {
                                  echo $rows;
                              }
                              else
                              {
                                  echo 0;
                              }
                              ?> </h6>
                        <h6 class="text-white">Windows Based Users :
                            <?php
                            $sql2 = "SELECT p.os FROM vworlduser as v
                                        INNER JOIN package AS p ON p.pid = v.pid
                                        WHERE p.os='Windows'AND p.ptype='VM'";
                            $result = $conn->query($sql2);
                            $rows=$result->num_rows;
                            if ($rows)
                            {
                                echo $rows;
                            }
                            else
                            {
                                echo 0;
                            }
                            ?> </h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card pb-sm-3 pb-lg-0">
                    <div class="card bg-success">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Registered Clients For VApps</p>
                            <h2 class="text-white">
                                <?php
                                $sql2 = "SELECT p.ptype FROM vworlduser as v
                                        INNER JOIN package AS p ON p.pid = v.pid
                                        WHERE p.ptype='VApps'";
                                $result = $conn->query($sql2);
                                $rows=$result->num_rows;
                                if ($rows)
                                {
                                    echo $rows;
                                }
                                else
                                {
                                    echo 0;
                                }
                                ?>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-success"></i>
                        </div>

                        <h6 class="text-white">
                            <?php
                            $sql2 = "SELECT p.appname FROM vworlduser as v
                                        INNER JOIN package AS p ON p.pid = v.pid
                                        WHERE p.ptype='VApps'";
                            $result = $conn->query($sql2);
                            while ($row = $result->fetch_assoc())
                            {
                                $appname=$row['appname'];
                            echo $row['appname'].': 1 <br/>';
//                                $sql3 = "SELECT p.appname FROM vworlduser as v
//                                        INNER JOIN package AS p ON p.pid = v.pid
//                                        WHERE p.appname='$appname'";
//                                $result = $conn->query($sql3);
//                                $rows=$result->num_rows;
//                                if ($rows)
//                                {
//                                    echo $rows;
//                                }
//                                else
//                                {
//                                    echo 0;
//                                }
                            } ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body px-0 overflow-auto">
                    <h2 class="card-title pl-4" style="color:white; background-color: #0ba1b5 ">APPs & VM Client Registration Panel</h2>
                    <div class="table-responsive">
                      <br><br><br>
                      <button type="button" onclick="window.location.href='../pages/RegClient.php'" class="btn btn-outline-secondary btn-lg btn-block" style="color:white; background-color: #0a1ede "> Register Client </button>
                      <br><br><br>
                      <button type="button" onclick="window.location.href='../pages/RegUser.php'" class="btn btn-outline-secondary btn-lg btn-block" style="color:white; background-color: blueviolet "> Register AD User  </button>
                      <br><br><br>
                        <button type="button" onclick="window.location.href='../pages/RegPack.php'" class="btn btn-outline-secondary btn-lg btn-block" style="color:white; background-color: darkgreen "> Register Package  </button>
                        <br><br><br>
                      <button type="button" onclick="window.location.href='dashboardvm.php'" class="btn btn-outline-secondary btn-lg btn-block" style="color:white; background-color: darkorange "> Link Client via Vm or VApps </button>

              </div>

                  </div>
                </div>
              </div>


            </div>
              <div class="row">
                  <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                      <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    </div>
                  <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                      <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
                  </div>
                  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                  </div>
              <div class="row">
                  <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                      <div id="chartContainer3" style="height: 370px; width: 100%;"></div>
                  </div>
                  <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                      <div id="chartContainer4" style="height: 370px; width: 100%;"></div>
                  </div>
                  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
              </div>
            <div class="row">
              <div class="col-xl-8 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body px-0 overflow-auto">
                    <h4 class="card-title pl-4">Registered Client History</h4>
                      <div class="table-responsive">
                          <table class="table table-dark">
                              <thead>
                              <tr>
                                  <!--                                                <th>DID #</th>-->
                                  <th>User Name</th>
                                  <th>Organization</th>
                                  <th>Email</th>
                                  <th>Cell</th>
                                  <th>Address</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              include_once '../DB/db.php';
                              $x=' ';
                              $sql2 = "SELECT * FROM registerclient";
                              $result = $conn->query($sql2);
                              if ($result->num_rows > 0)
                              {
                                  while ($row = $result->fetch_assoc()) {
                                     // $id = $row['D_ID'];
                                      echo "<tr>";
//                                                    echo "<td>" . $row['D_ID'] . "</td>";
                                      echo "<td>" . $row['username'] . "</td>";
                                      echo "<td>" . $row['organ'] . "</td>";
                                      echo "<td>" . $row['email'] . "</td>";
                                      echo "<td>" . $row['cell'] . "</td>";
                                      echo "<td>" . $row['address'] . "</td>";


                                      echo "</tr>";
                                  }
                                  echo "</table>";
                              } else {
                                  echo "<h2> Nothing</h2>";
                              }

                              ?>
                              </tbody>
                          </table>
                      </div>

                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body px-0 overflow-auto">
                    <h4 class="card-title pl-4">Registered AD Users</h4>
                      <div class="table-responsive">
                          <table class="table table-dark">
                              <thead>
                              <tr>
                                  <th>User Id</th>
                                  <th>Password</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              include_once '../DB/db.php';
                              $x=' ';
                              $sql2 = "SELECT * FROM registeruser";
                              $result = $conn->query($sql2);
                              if ($result->num_rows > 0)
                              {
                                  while ($row = $result->fetch_assoc()) {
                                      // $id = $row['D_ID'];
                                      echo "<tr>";
//                                                    echo "<td>" . $row['D_ID'] . "</td>";
                                      echo "<td>" . $row['UserId'] . "</td>";
                                      echo "<td> ******** </td>";
                                     // echo "<td>" . $row['password'] . "</td>";
                                      echo "</tr>";
                                  }
                                  echo "</table>";
                              } else {
                                  echo "<h2> Nothing</h2>";
                              }

                              ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-xl-12 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body px-0 overflow-auto">
                    <h4 class="card-title pl-4">Registered Packages History</h4>
                      <div class="table-responsive">
                          <table class="table table-striped mb-none">
                              <thead>
                              <tr>
                                  <th>Pack Type</th>
                                  <th>Type</th>
								  <th>Name</th>
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
                              $sql2 = "SELECT * FROM package";
                              $result = $conn->query($sql2);
                              if ($result->num_rows > 0)
                              {
                                  while ($row = $result->fetch_assoc()) {
                                      // $id = $row['D_ID'];
                                      echo "<tr>";
//                                                    echo "<td>" . $row['D_ID'] . "</td>";
                                      echo "<td>" . $row['pname'] . "</td>";
                                      echo "<td>" . $row['ptype'] . "</td>";
									  echo "<td>" . $row['vname'] . "</td>";
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
                                  echo "<h2> Nothing</h2>";
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


    <script type="text/javascript" src="../js/jquery.js"></script>
      <script type="text/javascript">
     
$(document).ready(function(){
    var vids = new Array();
    $('#over').on('click',function(){
           $('#list').toggle();  
       });

   //Message with Ellipsis
   $('div.msg').each(function(){
       var len =$(this).text().trim(" ").split(" ");
      if(len.length > 12){
         var add_elip =  $(this).text().trim().substring(0, 65) + "…";
         $(this).text(add_elip);
      }
     
}); 


   $("#bell-count").on('click',function(e){
        e.preventDefault();

        let belvalue = $('#bell-count').attr('data-value');
        
        if(belvalue == ''){
         
          console.log("inactive");
        }else{
          $(".round").css('display','none');
          $("#list").css('display','block');
          
          // $('.message').each(function(){
          // var i = $(this).attr("data-id");
          // ids.push(i);
          
          // });
          //Ajax
          $('.message').click(function(e){
            e.preventDefault();
              $.ajax({
                url:'deactive.php',
                type:'POST',
                data:{"id":$(this).attr('data-id')},
                success:function(data){
                 
                    console.log(data);
                    location.reload();
                }
            });
        });
     }
   });

  //  $('#notify').on('click',function(e){
  //       e.preventDefault();
  //       var name = $('#notification').val();
  //       var ins_msg = $('#message').val();
  //       if($.trim(name).length > 0 && $.trim(ins_msg).length > 0){
  //         var form_data = $('#frm_data').serialize();
  //       $.ajax({
  //         url:'./connection/insert.php',
  //               type:'POST',
  //               data:form_data,
  //               success:function(data){
  //                   location.reload();
  //               }
  //       });
  //       }else{
  //         alert("Please Fill All the fields");
  //       }
      
       
  //  });
});
</script>










    <!-- container-scroller -->
    <!-- plugins:js -->
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