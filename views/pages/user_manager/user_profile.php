<?php
    if(isset($_GET["user_id"]))  {
                        $profile_id = $_GET["user_id"];      
                        echo  $profile_id ;
                         include ('config/connect.php');
                                $sql = "SELECT * FROM user_login 
                                JOIN tbl_division ON user_login.division = tbl_division.division_code
                                JOIN tbl_part ON user_login.part = tbl_part.part_code
                                JOIN tbl_subdivision ON user_login.subdivision = tbl_subdivision.subdivision_code
                                WHERE user_id=$profile_id";
                                $result = $conn->query($sql);

                         if ($result->num_rows > 0) { 
                                while($row = $result->fetch_assoc()) {
                                    $id_edit = $row["id"];
 ?>
<!-- /.card -->
<section class="content">
<div class="row">
    <div class="col-md-4">
        <div class="card bg-light">
            <div class="card-header text-muted border-bottom-0">
                System Participants
            </div>
            <div class="card-body pt-0">
                <div class="row">
                <div class="col-7">
                    <h2 class="lead"><b></b></h2>
                    <p class="text-muted text-sm"><b>ตำแหน่ง : <?php echo $row["position"]; ?> </b>  </p>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-envelope"></i></span> Email : <?php echo $row["email"]; ?></li>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : <?php echo $row["tel"]; ?> </li>
                    </ul>
                </div>
                <div class="col-5 text-center">
                      <img src="profile_img/<?php echo $row['img']?>" alt="" class="img-circle img-fluid">
                </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                <a href="#" class="btn btn-sm bg-teal">
                    <i class="fas fa-comments"></i>
                </a>
               
                <a href="?page=ProfileEdit&&user_id=<?php echo $row["id"] ?>" class="btn btn-sm btn-primary">
                    <i class="fas fa-user"></i> Edit Profile
                </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">ข้อมูลผู้เข้าใช้ระบบ</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive" style="height: 530px;">
                <table class="table table-head-fixed text-nowrap">
                <div class="row">
                    <div class="col-md-4">
                        <label>ชื่อ-นามสกุล</label>
                    </div>
                    <div class="col-md-8">
                        <p> <?php echo $row["id"]; ?> </p>
                        <p> <?php  echo $row["firstname"]. " ". $row["lastname"];?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>ตำแหน่ง</label>
                    </div>
                    <div class="col-md-8">
                        <p><?php echo $row["position"]; ?></p>
                    </div>
                </div>
                <br>
                <h6 class="mgbt-xs-15">สังกัดหน่วยงาน</h6>
                <hr>
                
                
                <div class="row">
                    <div class="col-md-4">
                        <label>กอง/สำนัก</label>
                    </div>
                    <div class="col-md-8">
                        <p><?=$row["division_name"];?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>ส่วน</label>
                    </div>
                    <div class="col-md-8">
                        <p><?=$row["part_name"];?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>ฝ่าย</label>
                    </div>
                    <div class="col-md-8">
                    <p><?=$row["subdivision_name"];?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label>งาน</label>
                    </div>
                    <div class="col-md-8">
                        <p><?=$row["section"];?></p>
                    </div>
                </div>


                <br>
                <h6 class="mgbt-xs-15">ติดต่อผู้เข้าใช้งานระบบ</h6>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label>เบอร์โทรศัพท์</label> 
                    </div>
                    <div class="col-md-8">
                        <p><?php echo $row["tel"]; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Email address</label>
                    </div>
                    <div class="col-md-8">
                        <p><?php echo $row["email"]; ?></p>
                    </div>
                </div>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>




<?php  
        } 
                          
    } else {
        echo "0 results";
    }
  $conn->close();

}
?>










<script type="text/javascript" language="javascript" >

          $(document).on('submit', '#img_form', function(event){
            event.preventDefault();
       
              $.ajax({
                url:"database/api_user_img.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                  //alert(data);
                  $('#img_form')[0].reset();
                  Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'เพิ่มข้อมูล'+ data +'สำเร็จ',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  //UserProfile&&user_id=10
                  window.location.replace("?page=UserProfile&&user_id==<?php echo $profile_id; ?>");
                }
              });
          
         });

</script>
