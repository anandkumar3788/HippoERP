<?php session_start();
include_once('../../includes/config.php');

if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
//Code for Updation 
if(isset($_POST['comment_subject']))
{

$subject = $_POST['comment_subject'];

$comment = $_POST['comment_text'];



// Insert the feedback into the database

$sql =  "INSERT INTO comments (comment_subject,  comment_text, is_read, comment_status) VALUES ('$subject', '$comment', '0', '1')";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Message send successfully');</script>";
  //echo "<script type='text/javascript'> document.location = 'feedback-report.php'; </script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Message | Registration and Login</title>
        <link rel="shortcut icon" href="favicon.ico"/>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

</head>
<body class="sb-nav-fixed">

   <?php include_once('../../includes/navbar.php');?>
      
        <div id="layoutSidenav">
    

    <?php include_once('../../includes/sidebar.php');?>
          
          <div id="layoutSidenav_content"> 
                <main>
                    <div class="container-fluid px-4">

 <h4 class="modal-title" style="padding:0px;">Send Message</h4>
      <div class="card mb-4">

      

  <form action="notifications.php" method="POST" id="comment_form">
<div class="card-body">
  <div class="form-group">

  <label class="col-sm-2 control-label">Enter Subject<span style="color:red">*</span></label>
  <div class="col-sm-4">
  <input type="text" id="comment_subject" name="comment_subject" required><br />
</div>

  
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Enter Comment<span style="color:red">*</span></label>
  <div class="col-sm-10">
  <textarea class="form-control" rows="5" name="comment_text" id="comment_text" required></textarea>
  
</div>
</div>


                                              

<br />
<div class="form-group">
  <div class="col-sm-8 col-sm-offset-2">
  <button class="btn btn-primary" name="submit" id="post" type="submit" >Post</button>


</div>
</div>


</div>
</form>

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

<?php } ?>

