
<!DOCTYPE html>
<html>
<head>
  <title>Notifications</title>

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
  <style>
    .accordion {
  margin: 10px;
}

.accordion-item {
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 10px;
}

.accordion-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px;
  cursor: pointer;
}

.accordion-header:hover {
  background-color: #f2f2f2;
}

.accordion-details {
  padding: 10px;
}
</style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
</head>
<body class="sb-nav-fixed">

   <?php include_once('../../includes/navbar.php');?>
      
        <div id="layoutSidenav">
    

    <?php include_once('../../includes/sidebar.php');?>
          
          <div id="layoutSidenav_content"> 
            <main>
 <div class="container-fluid px-4">
                          <h4 class="modal-title" style="padding:0px;">Notifications</h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Notifications </li>
                        </ol>
            
                        <div class="card mb-4">
                           

     <?php
// Connect to database
$conn = mysqli_connect('localhost', 'root', 'mysql', 'connect');

// Check connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Query to get notifications
$sql = "SELECT * FROM comments ORDER BY id DESC";

// Execute query
$result = mysqli_query($conn, $sql);

// Start the accordion container
echo '<div class="accordion">';

// Loop through notifications and display them as accordion items
while ($row = mysqli_fetch_assoc($result)) {
    $header_class = $row['is_read'] ? '' : 'font-weight-bold';
    $icon_class = $row['is_read'] ? 'fa-angle-right' : 'fa-angle-right';
     //$status = $row['status'] == 'read' ? '' : 'bold';
    $style= $row['is_read'] ? '' : 'font-weight:bold;';
    
    echo '<div class="accordion-item">';
    echo '<div class="accordion-header '.$header_class.'" data-id="'.$row['id'].'"style="' . $style . '">';
 // Add angle-down icon for unread notifications
echo '<i class="fas '.$icon_class.'"></i>';

// Display notification message
echo $row['comment_subject'];

// Close the header
echo '</div>';

// Display the notification details (hidden by default)
echo '<div class="accordion-details" style="display:none;">';
echo $row['comment_text'];
echo '</div>';

// Close the accordion item
echo '</div>';
}

// Close the accordion container
echo '</div>';

// Close database connection
mysqli_close($conn);
?>

  <script>
    $(document).ready(function() {
      // Handle accordion click events
      $('.accordion-header').click(function() {
        // Toggle the accordion details
        $(this).next('.accordion-details').slideToggle();
        
        // Change the icon
        var icon = $(this).find('i');
        icon.toggleClass('fa-angle-right fa-angle-down');
        
        // Mark notification as read
        var id = $(this).data('id');
        $.ajax({
          url: 'mark_as_read.php',
          type: 'POST',
          data: {id: id},
          success: function(response) {
            // Update the count in the bell alert
            $('#notification-count').text(response);
          }
        });
      });
    });

</script>
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



