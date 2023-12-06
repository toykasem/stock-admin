<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landin Lognin page</title>
    <link rel="stylesheet" href="landing.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container"> <header>
                <div class="logo">
                    
                </div>

                <div class="header-info">
                    <h3>สำหรับผู้บริหารจัดการวัสดุ</h3>
                   
                    <a href="login-admin.php">
                        <button  class="button-43" role="button"> สำหรับ admin </button>
                    </a>
                </div>


                <div class="header-info">
                    <h3>สำหรับผู้ใช้งาน</h3>
                    <a href="login-user.php">
                    <button  class="button-43" role="button"> สำหรับเจ้าหน้าที่ </button>
                    </a>
                </div>

        </header>
    </div>
       
            
</body>
</html> -->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Llanding page</title>
		<link href="landing.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <!-- <div class="content-wrapper">
                <h1>ระบบเบิกสินค้า</h1>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="index.php?page=products">Products</a>
                </nav>
               
                <div class="link-icons">
                    <a href="index.php?page=cart">
						<i class="fas fa-shopping-cart"></i>
                        <span>xxx</span>
					</a>
                </div>
            </div> -->
        </header>
        <main>
        <div class="featured">
                
                    <p>เข้าระบบสำหรับผู้ดูแลระบบ</p>
                  
                    <button onclick="window.location.href='login-admin.php';"  class="button-43" role="button"> Admin Login </button>

                    
                    <p>เข้าระบบ สำหรับผู้ใช้งาน</p>
                  
                  <button onclick="window.location.href='login-user.php';"  class="button-43" role="button"> Use Login </button>

                    <!-- <h2>Gadgets</h2>
                    <p>Essential gadgets for everyday use</p> -->
                </div>
                
        </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy;2023 เทศบาลนครอุบลราชธานี </p>
            </div>
        </footer>
    </body>
</html>
