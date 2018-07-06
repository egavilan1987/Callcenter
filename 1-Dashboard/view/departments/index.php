<?php
  //invoice.php  
  include('database_connection.php');

  $statement = $connect->prepare("SELECT * FROM departments ORDER BY id_department ASC");

  $statement->execute();

  $all_result = $statement->fetchAll();

  $total_rows = $statement->rowCount();
?>

<html>
 <head>
    <title>Datatables Individual column searching using PHP Ajax Jquery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
 </head>
 <body>
  <div class="container">
   <h1 align="center">Departments</h1>
   <br />
   
   <div class="table-responsive">
    <table id="departmentsData" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>Departments</th>
       <th>Created By</th>
       <th>Created Date</th>
       <th>Last Update By</th>
       <th>Updated Date</th>
       <th>Show</th>
       <th>Update</th>
       <th>Delete</th>
      </tr>
     </thead>
        <?php
        if($total_rows > 0)
        {
          foreach($all_result as $row)
          {
            echo '
              <tr>
                <td>'.$row["id_department"].'</td>
                <td>'.$row["name_department"].'</td>
                <td>'.$row["created_by_user"].'</td>
                <td>'.$row["created_date"].'</td>
                <td>'.$row["updated_by_user"].'</td>
                <td>'.$row["updated_date"].'</td>
                <td><a class="btn btn btn-success" href="invoice.php?update=1&id='.$row["id_department"].'"><span class="glyphicon glyphicon-eye-open"></span></a></td>


                <td><a class="btn btn btn-warning" data-toggle="modal" data-target="#updateDepartmentModal" onclick="addDepartment('.$row["id_department"].')"><span class="glyphicon glyphicon-edit"></span></a></td>


                <td><a class="btn btn btn-danger" class="delete"><span class="glyphicon glyphicon-remove" onclick="deleteDepartment('.$row["id_department"].')"></span></a></td>
              </tr>
            ';
          }
        }
        ?>
    </table>
   </div>
  </div>

    <div id="loadDepartmentsTable"></div>

    <!-- Modal -->
    <div class="modal fade" id="updateDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Update Department</h4>
          </div>
         <div class="modal-body">

    <div class="container">
      <div class="row">
        <form id="frmUpdateDepartment">
        <div class="col-sm-8">
            <div class="form-group col-sm-8" >
              <input type="text" hidden="" id="idDepartment" name="idDepartment">
              <label>Department</label>
              <input type="text" class="form-control input-sm" name="departmentUpdate" id="departmentUpdate">
            </div>
        </div>   
        </form>
      </div>
     </div>
   </div>
          <div class="modal-footer">
            <button id="updateDepartmentBtn" type="button" class="btn btn-warning" data-dismiss="modal">Save changes</button>
          </div>
        </div>
      </div>
    </div>
 </body>
</html>



<script type="text/javascript" language="javascript" >
$(document).ready(function(){
  var dataTable = $('#departmentsData').DataTable({
    "columnDefs":[
    {
     "orderable":false,
    },
   ],
  });
  });
</script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#updateDepartmentBtn').click(function(){
        data=$('#frmUpdateDepartment').serialize();
        $.ajax({
          type:"POST",
          data:data,
          url:"../process/departments/updateDepartments.php",
          success:function(r){
            alert (r);
          }
        });
      });
    });
  </script>


