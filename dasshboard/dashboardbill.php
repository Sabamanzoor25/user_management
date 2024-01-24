<?php
include_once '../DB/db.php';
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

                  <li class="nav-item">
                  <a class="nav-link" href="customerinfo/customerinfo.php">
                      <i class="mdi mdi-home menu-icon"></i>
                      <span class="menu-title">Customer Info</span>
                  </a>
              </li>
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
                      <img src="../img/aurora-logo.png" alt="" class="profile-pic" />
                    </div>
                    <div class="preview-item-content">
                      <p class="mb-0"> Dany Miles <span class="text-small text-muted">commented on your photo</span>
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../img/aurora-logo.png" alt="" class="profile-pic" />
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
                  <h2> INVOICE GENERATION PANEL</h2>
                  <br/><br/>
                  <div class="form-group">
                      <form method="post" action="../invoice/invoice-db.php">
                          <div class="form-group">
                              <div class="fxt-transformY-50 fxt-transition-delay-2">
                                  <select id="type"  class="form-control" name="AC_ID"  required="required" style="">
                                      <option selected>Select Account ID</option>
                                      <?php
                                      $sql = "SELECT ac.vid,c.username,c.email FROM vworlduser as ac
                                        INNER JOIN registerclient AS c ON c.cid = ac.cid";
                                   //   $sql = "SELECT ac.vid AS a1 FROM vworlduser AS ac";
                                      $result = $conn->query($sql);
                                      if ($result->num_rows > 0)
                                      {
                                          while ($row = $result->fetch_assoc())
                                          {
                                              echo"<option value='". $row['vid']."'>". '< '.$row['username'].' >' .$a.'< '. $row['email'] .' >'."</option>";

                                             // echo"<option value='". $row['vid']."'>". $row['vid']  ."</option>";
                                          }
                                      }
                                      else
                                      {
                                          echo'ERROR FETCHING DATA';
                                      }
                                      ?>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="fxt-transformY-50 fxt-transition-delay-2">
                                  <input type="date" id="sdate" class="form-control" name="sdate" placeholder="Starting Date " required="required">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="fxt-transformY-50 fxt-transition-delay-2">
                                  <input type="date" id="edate" class="form-control" name="edate" placeholder="Ending Date " required="required">
                              </div>
                          </div>
                          <button type="submit" style="background-color: orange" class="btn btn-default" name="Generate">View Bill</button>
                          <button type="submit" style="background-color: #0ba1b5"class="btn btn-default" name="GenerateEmail">Email Bill</button>

                      </form>
                  </div>
              </div>
            <div class="row">
                <div class="col-xl-12 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body px-0 overflow-auto">
                            <h4 class="card-title pl-4">Registered Packages History</h4>
                            <div class="table-responsive">
                          <table class="table table-dark">
                              <thead>
                              <tr>
                                  <th>Pack Type</th>
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