<link href="../assets/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="../assets/bootstrap.min.js"></script>
<script src="../assets/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function (){
            $("#ptype").change(function() {
                // foo is the id of the other select box
                if ($(this).val() != "VM") {
                    $("#appname").show();
                }else{
                    $("#appname").hide();
                }
            });
        });
    </script>

  <title>Register Package</title>
 

  <!--Bootsrap 4 CDN-->
  
  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!--Custom styles-->
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<div class="container" >
  <div class="d-flex justify-content-center h-100">
    <div class="card" style="height: 60%; width: 40%; position: relative; margin-left: 30%;">
      <div class="card-header">
        <h4 style="color: white;">Register VWorld Package</h4>

      </div>
      <div class="card-body" >
          <form method="POST" action="../main.php">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><img src="../img/package.png" style="position: relative; margin-left: -10%; height: 70%; width: 100%;"><!--<i class="fas fa-user"></i>--></span>
            </div>
            <input type="text" class="form-control" placeholder="Package Name" name="pname" Required>
          </div>
              <div class="input-group form-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><img src="../img/vm.png" style="position: relative; margin-left: -10%; height: 70%; width: 100%;"><!--<i class="fas fa-user"></i>--></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Virtual Machine Name" name="vname" Required>
              </div>
              <div class="input-group form-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><img src="../img/ptype.png" style="position: relative; margin-left: -10%; height: 70%; width: 100%;"><!--<i class="fas fa-user"></i>--></span>
                  </div>
                  <select class="custom-select" id="ptype" name="ptype" Required>
                    <option value="VM" >VM</option>
                    <option value="VApps" selected>VApps</option>
                  </select>
              </div>
              <div id="appname">
              <div class="input-group form-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><img src="../img/app.png" style="position: relative; margin-left: -10%; height: 70%; width: 100%;"><!--<i class="fas fa-user"></i>--></span>
                  </div>
                  <input  type="text" class="form-control" placeholder="Application Name" name="appname" >
              </div>
              </div>
              <div class="input-group form-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><img src="../img/cpuCount.png" style="position: relative; margin-left: -10%; height: 70%; width: 100%;"><!--<i class="fas fa-user"></i>--></span>
                  </div>
                  <input type="number" class="form-control" placeholder="No of CPU" name="cpu" Required >
              </div>
              <div class="input-group form-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><img src="../img/gpu.png" style="position: relative; margin-left: -10%; height: 70%; width: 100%;"><!--<i class="fas fa-user"></i>--></span>
                  </div>
                  <input type="number" class="form-control" placeholder="GPU (GBs)" name="gpu" Required >
              </div>
              <div class="input-group form-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><img src="../img/ram.png" style="position: relative; margin-left: -10%; height: 70%; width: 100%;"><!--<i class="fas fa-user"></i>--></span>
                  </div>
                  <input type="number" class="form-control" placeholder="RAM (GBs)" name="ram" Required >
              </div>
              <div class="input-group form-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><img src="../img/os.png" style="position: relative; margin-left: -10%; height: 70%; width: 100%;"><!--<i class="fas fa-user"></i>--></span>
                  </div>
                  <!--<input type="text" class="form-control" placeholder="Operating System" name="os" > -->
                  <select class="custom-select" id="inputGroupSelect02" name="os" Required>
                    <option value="Windows" selected>WINDOWS</option>
                    <option value="Linux">LINUX</option>
                  </select>
              </div>
              <div class="input-group form-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><img src="../img/hdd.png" style="position: relative; margin-left: -10%; height: 70%; width: 100%;"><!--<i class="fas fa-user"></i>--></span>
                      
                  </div>
                  <!--<input type="text" class="form-control" placeholder="Storage Type" name="stype" >-->
                  <select class="custom-select" id="inputGroupSelect03" name="stype" Required>
                      
                    <option value="SSD" >SSD</option>
                    <option value="HDD" selected>HDD</option>
                    
                  </select>
                   
                  </div>
              <div class="input-group form-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><img src="../img/ram.png" style="position: relative; margin-left: -10%; height: 70%; width: 100%;"><!--<i class="fas fa-user"></i>--></span>
                  </div>
                  <input type="number" class="form-control" placeholder="Storage (GBs)" name="ssize" Required >
              </div>
              <div class="input-group form-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><img src="../img/hdd.png" style="position: relative; margin-left: -10%; height: 70%; width: 100%;"><!--<i class="fas fa-user"></i>--></span>

                  </div>
                  <!--<input type="text" class="form-control" placeholder="Storage Type" name="stype" >-->
                  <select class="custom-select" id="inputGroupSelect03" name="pricingtype" Required>

                      <option value="D" >Daily</option>
                      <option value="M" selected>Monthly</option>

                  </select>

              </div>
              <div class="input-group form-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><img src="../img/cpuCount.png" style="position: relative; margin-left: -10%; height: 70%; width: 100%;"><!--<i class="fas fa-user"></i>--></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Price" name="price" Required >
              </div>
              </div>
          <div class="form-group">
            <input style="width: 50%;" type="submit" value="Register Package" class="btn float-right login_btn" name="RegPack">
              <input style="width: 30%;" onclick="window.location='../dasshboard/dashboard.php';" type="submit" value="Back" class="btn float-left back_btn" name="RegClientBack">
          </div>
        </form>
      </div>
      <div class="card-footer" style="margin-top: 70%; margin-left: -35%;">
        <div class="d-flex justify-content-center links">
          <h6>Copyright Reserved NCBC- NEDUET</h6>
        </div>

      </div>
    </div>
  </div>
</div>
</body>
</html>