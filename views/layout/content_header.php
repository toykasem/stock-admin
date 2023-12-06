<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0 text-dark"> 
            <?php 
               if(!isset($_SESSION["Userlevel"])){ 
                  echo "กรุณาเข้าสู่ระบบ" ;
              } else{

                echo "ระบบจัดการข้อมูลวัสุคงคลัง" ;
              }
              ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?page=Home">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $title ?>   
             </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<!-- /.*****************************************************content-header -->