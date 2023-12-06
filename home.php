<?php require_once 'authen/check_session.php' ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<?php include_once 'views/layout/header.php' ?>

</head>


<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">


        <?php include_once 'views/layout/admin_topbar.php' ?>

        <?php include_once 'views/layout/admin_sidebar.php' ?>

          <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

        <?php include_once 'views/layout/content_header.php' ?>
                              
                          <!-- /.card -->

                    <section class="content">
                        <div class="card">
                                <div class="card-header">
                                  <h3 class="card-title"> <i class="fas fa-edit"></i><?php echo $title ?></h3>
                                </div>
                        
                                <div class="card-body">
                               

                                  <!-- #################### content-header #############################################  -->
                                        
                                  <?php include $src_page; ?>

                                  <!-- #################### content-header #############################################  -->
                                  </div>
                          </div>

                    </section>

    </div><!-- ./wrapper -->
    <?php include_once 'views/layout/footer.php' ?> 
</body>
</html>

<?php include_once 'views/layout/api_link.php' ?> 
