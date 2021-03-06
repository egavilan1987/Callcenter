	<!DOCTYPE html>
	<html>
	<head>
		<title>Departments</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>

		<div class="container">
			<h1>Departments</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmDepartments">
						<label>Department</label>
						<input type="text" class="form-control input-sm" name="department" id="department">
						<p></p>
						<span class="btn btn-primary" id="btnAddDepartments">Add</span>
					</form>
				</div>
				<div class="col-sm-6">
					<div id="loadDepartmentsTable"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="updateDepartment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Update Department</h4>
					</div>
					<div class="modal-body">
						<form id="frmDepartmentUpdate">
							<input type="text" hidden="" id="idDepartment" name="idDepartment">
							<label>Department</label>
							<input type="text" id="departmentUpdate" name="departmentUpdate" class="form-control input-sm">
						</form>


					</div>
					<div class="modal-footer">
						<button type="button" id="btnUpdateDepartment" class="btn btn-warning" data-dismiss="modal">Update Changes</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#loadDepartmentsTable').load("Departments/departmentsTable.php");
			$('#btnAddDepartments').click(function(){
				Empties=validateEmptyForm('frmDepartments');
				if(Empties > 0){
					alertify.alert("You must fill all of the fields!");
					return false;
				}
				data=$('#frmDepartments').serialize();
				$.ajax({
					type:"POST",
					data:data,
					url:"../process/departments/addDepartments.php",
					success:function(r){
						if(r==1){
						//clear the form
						$('#frmDepartments')[0].reset();
						$('#loadDepartmentsTable').load("Departments/departmentsTable.php");
						alertify.success("Department successfuly added.");
					}else{
						alertify.error("Could not add Department.");
					}
				}
			});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnUpdateCategory').click(function(){
				datos=$('#frmCategoryUpdate').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../process/categories/updateCategory.php",
					success:function(r){
						if(r==1){
							$('#loadCategoriesTable').load("categories/categoriesTable.php");
							alertify.success("Category updated!");
						}else{
							alertify.error("Could not update the category");
						}
					}
				});
			});
		});
	</script>
