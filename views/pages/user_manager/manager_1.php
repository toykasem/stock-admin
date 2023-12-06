    <?php
           $userlevel = $_SESSION["Userlevel"];
           if($userlevel=="a"){ ?>

      
            <input id="add_button" data-toggle="modal" data-target="#add_new_user" class="btn btn-info btn-lg" value="เพิ่มผู้ใช้งานใหม่" class="btn btn-info view_data"  />
            <br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>id</th>
                  <th>firstname</th>
                  <th>lastname</th>
                  <th>username</th>
                  <th>email</th>
                  <th>Telephone No.</th>
                  <th>user_level</th>
                  <th>จัดการข้อมูล</th>
                  
                </tr>

                </thead>
     <tbody>
                       <?php
                         include ('config/connect.php');
                         $sql = "SELECT * FROM user_login";
                         $result = $conn->query($sql);
                               //SELECT `id`, `firstname`, `lastname`, `username`, `password`, `email`, `tel`, `user_level` FROM `user_login` WHERE 1
                         if ($result->num_rows > 0) {
                            //echo "<table><tr><th>ID</th><th>Name</th></tr>";
                            // output data of each row
                              while($row = $result->fetch_assoc()) {
                                $id_edit = $row["id"];
                              echo "<tr><td>"
                              .$row["id"]."</td><td>"
                              .$row["firstname"]."</td><td>"
                              .$row["lastname"]."</td><td>"
                              .$row["username"]."</td><td>"
                              .$row["email"]."</td><td>"
                              .$row["tel"]."</td><td>"
                              .$row["user_level"]."</td><td>"
                             
                              ?>
                              <a data-placement="top" data-toggle="tooltip" title="ดูรายละเอียดข้อมูล" class="btn btn-info btn-sm view"><span class="fas fa-eye" aria-hidden="true"></span></a>
                              <a href="?page=editmacost&&id=<?php echo $id_edit ?>" data-placement="top" data-toggle="tooltip" title="แก้ไขข้อมูล" class="btn btn-primary btn-sm"><span class="fas fa-user-edit" aria-hidden="true"></span></a>
                              <button title="ลบ" id="<?=$row["id"];?>"  data-placement="top" data-toggle="tooltip" class="btn btn-danger btn-sm delete"><span class="fas fa-trash-alt" aria-hidden="true"></span></button>
                              <input onclick="window.location.href='?page=UserProfile&&user_id=<?php echo $id_edit ?>'" data-placement="top" data-toggle="tooltip" title="ดูรายละเอียดข้อมูล" type="button" name="view" value="VIEW Porfile" class="btn btn-info btn-sm" id="<?=$row["id"];?>" /></td>
                            </tr>
                         <?php  
                          } 
                          ?>
                               
                                 
</tbody>
                <tfoot>
                <tr>
                  <th>id</th>
                  <th>firstname</th>
                  <th>lastname</th>
                  <th>username</th>
                  <th>email</th>
                  <th>Telephone No.</th>
                  <th>user_level</th>
                 
                  <th>จัดการข้อมูล</th>
                </tr>
                </tfoot>

                
                <?php
                             echo "</table>";
                           } else {
                               echo "0 results";
                              }
                             $conn->close();
                             ?>
    
    <?php }else{  ?>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script>
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'User Level คุณไม่ใช้ Administrator',
              footer: '<a href>Why do I have this issue?</a>'
            })
            </script>
   <?php }  ?>


                                  

   
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>



<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Add User");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});
	
	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var first_name = $('#first_name').val();
		var last_name = $('#last_name').val();
		var etx = $('#img_user').val().split('.').pop().toLowerCase();
		if(etx != '')
		{
			if(jQuery.inArray(etx, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("รูปแบบ ของภาพ ไม่ถูกต้อง");
				$('#img_user').val('');
				return false;
			}
		}	
		if(first_name != '' && last_name != '')
		{
			$.ajax({
				url:"insert_change.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("first_name และ last_name, จำเป็นจะต้องใส่นะคะ");
		}
	});
	
	$(document).on('click', '.update', function(){
		var user_id = $(this).attr("id");
		$.ajax({
			url:"task_user_edit.php",
			method:"GET",
			// data:{user_id:user_id},
      data:"user_id=" + user_id,
			dataType:"json",
			success:function(data)
			{
				$('#edit_modal').modal('show');
				$('#edit_first_name').val(data.firstname);
       // console.log(data.firstname)
			 // $('#edit_last_name').val(data.lastname);
			//	$('.modal-title').text("Edit User");
			//	$('#user_id').val(id);
				// $('#user_uploaded_image').html(data.img_user);
			//	$('#action').val("Edit");
				//$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		if(confirm("แน่ใจไหมว่าต้องการลบผู้ใช้รายนี้?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	
});
</script>