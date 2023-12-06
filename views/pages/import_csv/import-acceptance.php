<?php

// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Contractor data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>

<!-- Display status message -->
<?php if(!empty($statusMsg)){ ?>
<div class="col-xs-12">
    <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
</div>
<?php } ?>

         <button type="button" id="add_button" data-toggle="modal" data-target="#dataModal" class="btn btn-info btn-lg">Import</button> <br><br>

    

    <!-- Data list table --> 

            <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#ID</th>
                        <th>Contrac No.</th>
                        <th>user_upload</th>
                        <th>date_upload</th>
                        <th>file_name</th>
                    </tr>
                </thead>
            <tbody>
                <?php

                // Load the database configuration file
                 include 'connection_import.php';
                // Get member rows
                $result = $db->query("SELECT * FROM doc_acceptance ORDER BY id ASC");
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['contract_no']; ?></td>
                        <td><?php echo $row['user_upload']; ?></td>
                        <td><?php echo $row['date_upload']; ?></td>
                        <td><?php echo $row['file_name']; ?></td>
                    </tr>
                <?php } }else{ ?>
                    <tr><td colspan="5">No member(s) found...</td></tr>
                <?php } ?>
            </tbody>
        </table>
 

</body>

<!-- Show/hide CSV upload form -->
<script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>



 <!-- page script -->
 <script>
    $(function () {
       $("#example1").DataTable({
               "responsive": true,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          
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


<!-- Modal -->

<div id="dataModal" class="modal fade">
	<div class="modal-dialog modal-xl">

      <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">เพิ่มข้อมูล</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
      </div>
      <div class="modal-body">

          <!-- form -->
          <form action="views/pages/import_csv/api_import_acceptance.php" method="post" id="import_form" enctype="multipart/form-data">
            <input type="file" name="file" />
       
        <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input   type="submit" name="importSubmit"  class="btn btn-success"  value = "IMPORT" /> 
              
            </div>

      </form>  <!-- / form -->
	</div>
	
	</div>
</div>
<!-- / Modal -->


