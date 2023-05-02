<?php
//include('includes/config.php');
$servername = "localhost";
$username = "root";
$password = "mysql";
$database = "connect";
$conn = mysqli_connect($servername, $username, $password, $database);


//use PHPMailer\PHPMailer\PHPMailer; 
//use PHPMailer\PHPMailer\Exception; 
  
//require 'vendor/autoload.php';

//$mail = new PHPMailer;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Retrieve form data
	//$username = $_POST['username'];
	//$email = $_POST['email'];
	$email = isset($_POST['email']) ? $_POST['email']: "";

	// Prepare SQL statement
	$stmt = $conn->prepare("SELECT * FROM user_form WHERE email=?");
	$stmt->bind_param("ss",  $email);

	// Execute SQL statement
	$stmt->execute();

	// Get result set	
	$result = $stmt->get_result();


	// Check if user exists
	if ( isset($result->num_rows) && $result->num-rows >0) {
		// User exists, generate new password and update database
		$new_password = substr(md5(mt_rand()), 0, 8);
		$stmt = $conn->prepare("UPDATE	 user_form SET password=? WHERE email=?");
		$stmt->bind_param("sss", $new_password, $email);
		$stmt->execute();
		
		// Send email with new password
		$to = $email;
		$subject = "Password Reset";
		$message = "Your new password is: " . $new_password;
		$headers = "From: webmaster@example.com" . "\r\n" .
				   "Reply-To: webmaster@example.com" . "\r\n" .
				   "X-Mailer: PHP/" . phpversion();

		mail($to, $subject, $message, $headers);

		// Display success message to user
		echo "Your new password has been sent to your email address.";
	} else {
		// User does not exist, display error message
		echo "Invalid username or email.";
	}

	// Close statement and connection
	$stmt->close();
	$conn->close();
}
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Password Reset | Registration and Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
<h2 align="center">Registration and Login	</h2>
<hr />
<h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
<div class="card-body">

<div class="small mb-3 text-muted">Enter your email address and we will send you password on your email</div>


<form method="post">
                                           
<div class="form-floating mb-3">
<input class="form-control" name="femail" type="email" placeholder="name@example.com" required />
<label for="inputEmail">Email address</label>
</div>

<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
<a class="small" href="login.php">Return to login</a>
<button class="btn btn-primary" type="submit" name="send">Reset Password</button>
</div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="signup.php">Need an account? Sign up!</a></div>
                        <div class="small"><a href="index.php">Back to Home</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
       <!--<?php include('includes/footer.php');?>-->
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
