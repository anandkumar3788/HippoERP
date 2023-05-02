<?php session_start();

include_once('../../includes/config.php');
error_reporting(0);
// $servername = "localhost";
// $username = "root";
// $password = "mysql";
// $database = "connect";
// $conn = mysqli_connect($servername, $username, $password, $database);
//Code for Registration 
if(isset($_POST['submit']))
{
	
	
	//echo "<pre>";
	//print_r($_POST);
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
    $contact=$_POST['contact'];
	  $user_role=$_POST['user_role'];
    $status= $_POST['status'];
    $date=$_POST['date'];
   
    
    
$sql=mysqli_query($conn,"select id from user_form where email='$email'");
$row=mysqli_num_rows($sql);
if($row>0) 
{
    echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
} else{
	//echo "insert into user_form(fname,lname,email,password,contact) values('$fname','$lname','$email','$password','$contact')"; exit;
    $msg=mysqli_query($conn,"INSERT INTO user_form(fname,lname,email,password,contact,user_role,status) VALUES('$fname','$lname','$email','$password','$contact','$user_role','Inactive')");
     //echo "<pre>";
	// print_r($_POST);EXIT;

if($msg)
{	
    echo "<script>alert('Registered successfully');</script>";
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}	
}

//$getUsers = function() use($conn) {
  //  $getAllUsers = mysqli_query($conn,"SELECT * FROM user_form");

    //if($getAllUsers === FALSE)
      //  return FALSE;X-UA-Compatible

    //return mysqli_fetch_all($getAllUsers);
};

//print_r($getUsers());
//}
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Signup | Registration and Login</title>
        <link rel="shortcut icon" href="favicon.ico"/>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.confirmpassword.value)
{
alert(' Password and Confirm Password field does not match');
document.signup.confirmpassword.focus();
return false;
}
return true;
} 

</script>

    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                   
                                   <center><div class="logo">
                <img src="HIPPOERP Final Png.png">
            </div></center>
            <div class="card-header">
<hr />
                                      
                                      <!--<h2 align="center" >User Registration</h2>-->

                                        <h3 class="text-center font-weight-light my-4">User Registration</h3>
                                        </div>
                                    <div class="card-body">
<form method="post" name="signup" onsubmit="return checkpass();">

<div class="row mb-3">
<div class="col-md-6">
<div class="form-floating mb-3 mb-md-0">
<input class="form-control" id="fname" name="fname" type="text" placeholder="Enter your first name" required />
<label for="inputFirstName">First name</label>
</div>
</div>
                                                
<div class="col-md-6">
<div class="form-floating">
<input class="form-control" id="lname" name="lname" type="text" placeholder="Enter your last name" required />
 <label for="inputLastName">Last name</label>
</div>
</div>
</div>


<div class="form-floating mb-3">
<input class="form-control" id="email" name="email" type="email" placeholder="email" required />
<label for="inputEmail">Email address</label>
</div>
 

<div class="form-floating mb-3">
<input class="form-control" id="contact" name="contact" type="text" placeholder="1234567890" required pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10" required />
<label for="inputcontact">Contact Number</label>
</div>


                                   <div class="form-floating mb-3">
                                    <select class="form-control"  name="user_role"  value="<?php echo $result['user_role'];?> "  id="user_role" required />
                                      <option >Select</option>
                                   <option value="user">User</option>
                                   <option value="Front Office">Front Office</option>
                                   <option value="Manager">Manager</option>
                               </select>
                               <label for="inputrole">Role</label>
                           </div>
        


<div class="row mb-3">
<div class="col-md-6">
 <div class="form-floating mb-3 mb-md-0">
<input class="form-control" id="password" name="password" type="password" placeholder="Create a password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required/>
<label for="inputPassword">Password</label>
</div>
</div>
                                                

<div class="col-md-6">
<div class="form-floating mb-3 mb-md-0">
<input class="form-control" id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required />
<label for="inputPasswordConfirm">Confirm Password</label>
</div>
</div>
</div>
                                            

<div class="mt-4 mb-0">
<div class="d-grid"><button type="submit" class="btn btn-primary btn-block" name="submit">Create Account</button></div>
</div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
 <div class="small"><a href="index.php">Have an account? Go to login</a></div>
  <div class="small"><a href="index.php">Back to Home</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
         <!--<?php include_once('includes/footer.php');?>-->
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
