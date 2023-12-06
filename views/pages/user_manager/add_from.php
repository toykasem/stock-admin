<form id="form_user" class="form" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-9">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-address-card"> ฟอร์มเพิ่มข้อมูลผู้ใช้งานระบบ</i></h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="row">
                                <div class="mx-auto">
                                    <div class="d-flex justify-content-center align-items-center rounded">
                                        <img src="../dist/img/avatar0.png" class="avatar img-thumbnail" alt="avatar">
                                    </div>
                                </div>
                                <div class="mx-auto mt-2">
                                    <div class="d-flex justify-content-center align-items-center rounded">
                                        <label class="btn btn-primary btn-block">
                                            <i class="fa fa-fw fa-camera"></i>
                                            <span>Change Photo</span>
                                            <input type="file" name="image_profile" id="image_profile" class="file-upload-personnel" style="display: none;">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <h3 class="mgbt-xs-15">ข้อมูลผู้เข้าใช้ระบบ</h3>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="user_prefix">คำนำหน้า</label>
                                                    <select name="user_prefix" id="user_prefix" class="custom-select" required/>
                                                        <option value="นาย">นาย</option>
                                                        <option value="นาง">นาง</option>
                                                        <option value="นางสาว">นางสาว</option>
                                                        <option value="ว่าที่ ร้อยตรี">ว่าที่ ร้อยตรี</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="user_fname">ชื่อ</label>
                                                <input type="text" name="user_fname" id="user_fname" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="user_lname">นามสกุล</label>
                                                <input type="text" name="user_lname" id="user_lname" class="form-control" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="user_position_id">ตำแหน่ง</label>
                                                <input type="text" name="user_position" id="user_position" class="form-control" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <?php
                                    include 'config/connect.php';
                                    $sql_division = "SELECT * FROM tbl_division";
                                    $query = mysqli_query($conn, $sql_division);
                                ?>
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="user_division_id">กอง/สำนัก</label>
                                                    <select class="form-control" name="user_division_id" id="division">
                                                            <option value="" selected disabled>-กรุณาเลือกกองสำนัก/งาน-</option>
                                                            <?php foreach ($query as $value) { ?>
                                                            <option value="<?=$value['division_id']?>"><?=$value['division_name']?></option>
                                                            <?php } ?>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="user_subdivision_id">ฝ่าย</label>
                                                    <select class="form-control" name="user_subdivision_id" id="subdivision">
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="user_section_id">งาน</label>
                                                    <select class="form-control" name="user_section_id" id="section">
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">เบอร์โทรศัพท์</label>
                                                <input type="text" name="user_tel" class="form-control" required >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h3 class="mgbt-xs-15">บัญชีผู้เข้าใช้งานระบบ</h3>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="user_email">Email address</label>
                                                <input type="text" name="user_email" id="user_email" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="user_code">Username</label>
                                                <input type="text" name="user_code" id="user_code" class="form-control" required/>
                                                <span style="font-size:12px; color: red;" id="error_user"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-9">
                                    <div class="row"> 
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="user_pass">รหัสผ่าน</label>
                                                <input id="user_pass" name="user_pass" type="password" class="form-control" required/>
                                                <span id="error_password"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="re_user_pass">Confirm <span class="d-none d-xl-inline">รหัสผ่าน(อีกครั้ง)</span></label>
                                                <input class="form-control" id="re_user_pass" name="re_user_pass" type="password" placeholder="********" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                <button id="save_user" class="btn btn-success" type="submit"><i class="fa fa-save fa-fw"></i>  บันทึกข้อมูล</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-address-card"> การกำหนดสิทธิ์</i></h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <div class="row">
                                <div class="col-md">
                                    <div class="row">
                                        <div class="col-md">
                                            <label for="user_stat">ระดับสิทธิ์ผู้ใช้งาน</label>
                                            <div class="input-group mb-3">
                                                <select  name="user_stat"  class="custom-select" required >
                                                    <option value="ADMIN"value="ADMIN">Admin</option>
                                                    <option value="BOSS">Boss</option>
                                                    <option value="EWPLOYES">Ewployes</option>
                                                    <option value="STAFF">Staff</option>
                                                </select>
                                                <span class="input-group-append">
                                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-permissions"><i class="far fa-question-circle"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">สถานะผู้ใช้งาน</label><p>
                                                    <select class="custom-select">
                                                        <option value="Y">อนุมัติเข้าใช้ระบบ</option>
                                                        <option value="N">ไม่อนุมัติเข้าใช้ระบบ</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-address-card"> หน่วยงานที่กำกับดูแล</i></h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 636px;">
                    <div class="row">
                        <div class="col-md">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            <select id="skill_val" required class="form-control">
                                                <option value="-">-เลือก-</option>
                                                    <?php
                                                        $sql = "select * from tbl_section";
                                                        $query = mysqli_query($conn, $sql);
                                                        while ($rows = mysqli_fetch_object($query)){
                                                        ?>
                                                        <option value="<?=$rows->section_code . "," . $rows->section_name?>"> <?=$rows->section_name?></option>
                                                        <?php
                                                        }
                                                    ?>
                                            </select>
                                        </th>
                                        <th style="width: 40px">
                                            <button title="เพิ่มหน้าที่" type="button" id="add_skill" class="btn btn-warning btn-flat"><span class="fas fa-plus" aria-hidden="true"></span></button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="more_skill"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="modal-permissions">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><i class="far fa-address-card"> การกำหนดสิทธิ์การเข้าใช้งานระบบ</i></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <dl class="row">
                <dt class="col-sm-4">Admin</dt>
                <dd class="col-sm-8">ผู้ดูและระบบ ควบคุมกำกับกดูแลระบบ สามารถบริหารจัดการข้อมูลต่างๆ ในระบบได้</dd>
                <dt class="col-sm-4">Boss</dt>
                <dd class="col-sm-8">ผู้บริหาร สถานะผู้ใช้งานระดับหัวหน้าหน่วยงาน องค์กร สามารถดูสถานะข้อมูล รายงานส่วนอื่นๆ ในระบบ แต่ไม่สามารถแก้ไขหรือจัดการข้อมูลได้</dd>
                <dd class="col-sm-8 offset-sm-4">*หมายเหตุ การจัดการข้อมูลบางส่วนที่ได้รับอนุญาติ ตามระดับสิทธิ์การใช้งาน</dd>
                <dt class="col-sm-4">Ewployes</dt>
                <dd class="col-sm-8">บุคลากร/เจ้าหน้าที่ ที่เกียวข้องสามารถบริหารจัดการข้อมูลต่างๆ ในระบบได้ ดูสถานะข้อมูล รายงานส่วนอื่นๆ ในระบบ</dd>
                <dt class="col-sm-4">Staff</dt>
                <dd class="col-sm-8">พนักงาน ที่มีหน้าที่ได้รับมอบหมายจากผู้บริหาร สามารถบริหารจัดการข้อมูลต่างๆ ในระบบได้ ดูสถานะข้อมูล รายงานส่วนอื่นๆ ในระบบตามระดับสิทธิ์การใช้งาน </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        var count_skill = 1;
        
        $("#add_skill").click(function () {
            var skill_val = $("#skill_val").val().split(",")[1];
            var skill_id = $("#skill_val").val().split(",")[0];
            
            if($("#skill_val").val() === "-"){
                alert("กรุณาเลือกหน่วยงาน!");
            }else {
                var html_skill = '<tr id="row' + count_skill + '">\n\
                                <td><input type="hidden" value="'+ skill_id +'" name="user_skill[]">'+ skill_val +'</td>\n\
                                <td  style="width: 40px">\n\
                                    <button title="ลบ" id="'+ count_skill +'" class="btn btn-danger btn-flat del_skill">\n\
                                        <span class="fas fa-times" aria-hidden="true"></span>\n\
                                    </button>\n\
                                </td>\n\
                              </tr>';
                                            
            $("#more_skill").append(html_skill);
             $("#skill_val option[value='" + $("#skill_val").val() + "']").remove();
            count_skill++;
            }
        });
        
        $(document).on('click', '.del_skill', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

        $("#user_code").change(function() {

            var user_code = $("#user_code").val();
            // console.log(user_code);
            $.ajax({
                url: "../../api/user/check_exist_user.php",
                method: "POST",
                data: {user_code: user_code},
                success: function (res) {
                    if(!res.err) {
                        // alert("user can use.");
                        $("#error_user").html('<label class="text-primary">ชื่อผู้เข้าใช้งานสามารถใช้ได้</label>');
                        $('#save_user').prop('disabled', false);
                    } else {
                        // alert("user cannot use.");
                        $("#error_user").html('<label class="text-danger">ชื่อผู้เข้าใช้งานไม่สามารถใช้ได้</label>');
                        $('#save_user').attr('disabled', 'disabled');
                        return false;
                    }
                }
            })


        })
        
        $('#form_user').on('submit', function (event) {
            event.preventDefault();
                if ($('#user_pass').val() != $('#re_user_pass').val()) {
                    $('#error_password').html('<label class="text-danger">รหัสผ่านไม่ตรงกัน กรุณาตรวจสอบ และลองอีกครั้ง</label>');
                    return false;
                } else {
                    $('#error_password').html('');
                }
                

            $('#save_user').attr('disabled', 'disabled');
            $.ajax({
                url: "../../controllers/addmin_add_user.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#save_user').attr('disabled', 'false');
                    console.log(data);
                    //    $('#message').html(data);
                    $('#form_user').each(function () {
                        this.reset();
                    });
                    $("html, body").animate({scrollTop: 0}, "slow");
                    if (data.error) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: data.msg,
                            showConfirmButton: true,
                            timer: 2000
                        }).then((result) => {
                        });
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: data.msg,
                            showConfirmButton: true,
                            timer: 2000
                        }).then((result) => {
                            window.location.assign("?menu=accessor-view&user_id=" + data.last_id);
                        });
                    }

                }, error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                    $('#message').html(errorThrown);
                }
            });
        });
        var readURL = function (input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload-personnel").on('change', function () {
            readURL(this);
        });
    });
</script>