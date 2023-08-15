
<?php 
// this code is for redirecting to different pages if the credentials are correct.
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
         //admin
      	if ($_SESSION['role'] == 'admin'){
			header("Location: admin/admin.php");
      	 }
		 //teacher
		 else if ($_SESSION['role'] == 'employee'){ 
			header("Location: employee/home.php");
      	} 
		//student
		  else if ($_SESSION['role'] == 'HR'){ 
			header("Location: HR/student.php");	
		}
		//parent
		else if ($_SESSION['role'] == 'customer'){ 
			header("Location: customer/home.php");
		}
 }
else{
	header("Location:login-index.php");
} ?>
