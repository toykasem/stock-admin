<?php session_start();
  $id = $_POST['id'];
  $contract_id = $_POST['contract_id'];
  $date_regis = $_POST['date_regis'];
  $contract_start = $_POST['contract_start'];
  $contract_end = $_POST['contract_end'];
  $owner = $_POST['owner'];
  $budget_type = $_POST['budget_type'];
  $contractor = $_POST['contractor'];
  $process = $_POST['process'];
  $job_detail = $_POST['job_detail'];
  $project_value= $_POST['project_value'];
  $guarantee_value = $_POST['guarantee_value'];
  $guarantee_type = $_POST['guarantee_type'];
  $date_accept= $_POST['date_accept'];
  $conditions = $_POST['conditions'];
  $due_date= $_POST['due_date'];
  $status= $_POST['status'];
  $remark= $_POST['remark'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>สำนักการช่าง | UPDATE data</title>
  <script src="../module/sweetalert2@10.js"></script>
  </head>
<body>
  
              <!-- --------------------------------------- PHP CODE START ----------------------------------------------------------- -->
<?php
                                     
include('pdo_function/db.php');
include('pdo_function/function.php');
$statement = $connection->prepare(
	"UPDATE service_contract SET 
	contract_id = :contract_id, 
	date_regis = :date_regis, 
	contract_start = :contract_start, 
	contract_end = :contract_end,
	owner = :owner, 
	budget_type = :budget_type, 
	contractor = :contractor,
	process =:process, 
	job_detail = :job_detail,
	project_value = :project_value,
	date_accept = :date_accept,
  conditions = :conditions,
  due_date = :due_date,
  status = :status,
  remark = :remark
	WHERE id = :id"
	);
		
		$result = $statement->execute(
			array(
        ':id'                       =>	$id,
				':contract_id'              =>	$contract_id,
				':date_regis'	              =>	$date_regis,
				':contract_start'           =>	$contract_start,
				':contract_end'             =>	$contract_end,
				':owner'                    =>	$owner,
				':budget_type'              =>	$budget_type,
				':contractor'               =>	$contractor,
				':process'                  =>	$process,
				':job_detail'               =>  $job_detail,
				':project_value'            =>	$project_value,
				':date_accept'              =>	$date_accept,
        ':conditions'               =>	$conditions,
        ':due_date'                 =>	$due_date,
        ':status'                   =>	$status,
        ':remark'                   =>	$remark
			)
		);
		if($result===TRUE){ ?>

					<script type="text/javascript">

					window.onload = function(e){ 
						update_success();
						}
						
					</script>
		<?php
        }else{
        ?>
		          
				  <script type="text/javascript">

					window.onload = function(e){ 
						update_error();
						}
						
					</script>

<?php		}

?>


</body>
</html>

<script type="text/javascript">
function update_success(){
	Swal.fire({
            title: 'Update Success?',
            text: "แก้ไขข้อมูล สำเร็จ!",
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
            }).then((result) => {
            
                window.location.replace("../?page=CheckContractList");
            
            })
}

function update_error(){
            Swal.fire({
            title: 'ERROR',
            text: "UPDATE ERROR!",
            icon: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.replace("../?page=CheckContractList");
            }
            })
}
</script>