<link href="../assets/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="../assets/bootstrap.min.js"></script>
<script src="../assets/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
  <title>Register User</title>
  <!--Made with love by Mutiullah Samim -->

  <!--Bootsrap 4 CDN-->
  

  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!--Custom styles-->
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card" style="width: 40%;">
      <div class="card-header">
        <h3>Register V-World User</h3>

      </div>
      <div class="card-body">
        <form method="POST" action="../main.php">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="userid" name="userid" required >
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" class="form-control" placeholder="password" name="PASSWORD" required>
          </div>

          <div class="form-group">
            <input style="width: 40%;" type="submit" value="Register V-World User" class="btn float-right login_btn" name="RegUser">
          </div>
        </form>
         <input style="width: 30%;" onclick="window.location='../dasshboard/dashboard.php';" type="submit" value="Back" class="btn float-left back_btn" >
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-center links">
          Copyright Reserved NCBC- NEDUET
        </div>

      </div>
    </div>
  </div>
</div>
</body>
</html>