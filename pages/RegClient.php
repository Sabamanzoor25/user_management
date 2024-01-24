
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
  <title>Register Client</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="../assets/bootstrap.min.js"></script>
    <script src="../assets/jquery.min.js"></script>
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
    <div class="card" style="height: 50%;">
      <div class="card-header">
        <h3>Register Client</h3>

      </div>
      <div class="card-body">
          <form method="POST" action="../main.php">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><img style="height: 100%; width: 100%;"src="../img/uname.png"><!--<i class="fas fa-user"></i>--></span>
            </div>
            <input type="text" class="form-control" placeholder="username" name="username" required>
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><img style="height: 100%; width: 100%;" src="../img/email.png"><!--<i class="fas fa-user"></i>--></span>
            </div>
            <input type="Email" class="form-control" placeholder="email" name="email" required>
          </div>
              <div class="input-group form-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><img src="../img/os.png" style="position: relative; margin-left: -10%; height: 70%; width: 100%;"><!--<i class="fas fa-user"></i>--></span>
                  </div>
                  <!--<input type="text" class="form-control" placeholder="Operating System" name="os" > -->
                  <select class="custom-select" id="inputGroupSelect02" name="type" Required>
                      <option value="ned" selected>Ned Researcher</option>
                      <option value="other" >Other Uni Researcher</option>
                      <option value="pro" >Professional</option>
                  </select>
              </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><img style="height: 100%; width: 100%;" src="../img/organ.png"><!--<i class="fas fa-user"></i>--></span>
            </div>
            <input type="text" class="form-control" placeholder="organization name" name="organ" required>
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><img style="height: 100%; width: 100%;" src="../img/address.png"><!--<i class="fas fa-user"></i>--></span>
            </div>
            <input type="text" class="form-control" placeholder="Address" name="address" required>
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><img style="height: 100%; width: 100%;" src="../img/contact.png"><!--<i class="fas fa-user"></i>--></span>
            </div>
            <input type="text" class="form-control" placeholder="Contact No" name="cell" required>
          </div>
              <div class="input-group form-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><img src="../img/os.png" style="position: relative; margin-left: -10%; height: 70%; width: 100%;"><!--<i class="fas fa-user"></i>--></span>
                  </div>
                  <!--<input type="text" class="form-control" placeholder="Operating System" name="os" > -->
                  <select class="custom-select" id="inputGroupSelect02" name="ctype" Required>
                      <option value="Platinum" selected>Platinum</option>
                      <option value="Gold" >Gold</option>
                      <option value="Silver" >Silver</option>
                  </select>
              </div>

          <div class="form-group">
            <input style="width: 50%;"type="submit" value="Register Client" class="btn float-right login_btn" name="RegClient">
          </div>
        </form>
          <div class="form-group">
              <input style="width: 30%;" onclick="window.location='../dasshboard/dashboard.php';" type="submit" value="Back" class="btn float-left back_btn" name="RegClientBack">
          </div>
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