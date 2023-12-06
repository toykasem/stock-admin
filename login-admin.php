<html>
<head>
<title>เข้าสู่ระบบ - ระบบจัดการเอกสารอิเล็กทรอนิกส์ สำนักการช่าง</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--link href="style.css" rel="stylesheet" type="text/css"-->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<style>
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 420px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
</head>

<body>


    <div class="container" >
    <div class="image" align="center">
          <img src="dist/img/UB-LOGO-128x128.png" class="img-circle elevation-2" alt="User Image">
        </div>
      <form class="form-signin" action="authen/authen-admin.php" method="post">
        
      <h4 class="form-signin-heading" align="center">ระบบจัดการวัสดุคงคลัง</h4>
        <div class="form-group">
          <label>Username</label>
               <input type="text" name="Username" id="Username" required class="form-control" placeholder="ชื่อเข้าระบบ" autofocus required>
        </div>
        <div class="form-group">
          <label>Password</label>
        <input type="password" name="Password" id="passadmin" class="form-control" placeholder="รหัสผ่าน" autofocus required>
        </div>
        <div class="form-group" align="center">
        <label class="checkbox"><input type="checkbox" value="remember-me"> Remember me </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
      </form>
      <h4 onclick="history.back()" class="form-signin-heading" align="center"><a href="#" class="d-block">กลับหน้าหลัก</a></h4>
    </div> <!-- /container -->

<div align="center"><? echo "$footerweb"; ?></div>
</body>
</html>
