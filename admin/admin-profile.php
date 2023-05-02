<?php session_start();
include_once('../../includes/config.php');


if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
}

$result=mysqli_query($conn,"SELECT * from user_form where user_role = 'admin'");
$row=mysqli_fetch_assoc($result);


?><!DOCTYPE html>
<html lang="en">
<head>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Active Users | Registration and Login</title>
        <link rel="shortcut icon" href="favicon.ico"/>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

</head>
    <body class="sb-nav-fixed">

     <?php include_once('../../includes/navbar.php');?>
      
        <div id="layoutSidenav">

        <div id="layoutSidenav_content">

        <?php include_once('../../includes/sidebar.php');?>
          
             
                <main>
                    <div class="container-fluid px-4">

 <h4 class="modal-title" style="padding:0px;">Admin's Profile</h4>
      
 <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Admin profile </li>
                        </ol>
                        <form>
              <div class="card-body">
        <table class="table table-bordered">
       
            <tr>
                 <th>First Name:</th>
                <td><?php echo $row['fname'];?></td>
            </tr>
            <tr>
            	 <th>Last Name:</th>
                <td><?php echo $row['lname'];?></td>
            </tr>
            <tr>
            	<th> Email/Username:</th>
                <td><?php echo $row['email'];?></td>
            </tr>
            <tr>
            	<th>Contact No:</th>
                <td><?php echo $row['contact'];?></td>
            </tr>
                <th>Date:</th>
                <td><?php echo $row['date'];?></td>
               
            </tr>
           
            
    </form>
        </table>
    </div>
    </div>
</div>
</main>
</div>
</div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>

    </body>
    </html>
     
