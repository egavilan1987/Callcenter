<?php 

	class departments{

		public function addDepartment($data){
			$c=new Connect();
			$connection=$c->connection();

			$sql="INSERT INTO departments(id_user,
							name_department,
							created_date)
						VALUES ('$data[0]',
							'$data[1]',
							'$data[2]')";

			return mysqli_query($connection,$sql);
		}

		public function updateDepartment($data){
			$c=new Connect();
			$connection=$c->connection();

			$sql="UPDATE departments SET name_category='$data[1]'
								WHERE id_category='$data[0]'";
			return mysqli_query($connection,$sql);
		}
	}

 ?>
