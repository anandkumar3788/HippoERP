<?php session_start();
include_once('../../includes/config.php');

if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .accordion-header {
    cursor: pointer;
    background-color: #eee;
    padding: 10px;

    position: relative;
}

.accordion-icon {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
}

.accordion-body {
    display: none;
    padding: 10px;

}
</style>
  <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Notifications | Registration and Login</title>
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
                          <h4 class="modal-title" style="padding:0px;">Notifications</h4>
                           <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        
                            <li class="breadcrumb-item active">Notifications </li>
                        </ol>
<div class="accordion">
     <?php
    $notifications = mysqli_query($conn, "SELECT * FROM comments ORDER BY date_created DESC");
    while ($row = mysqli_fetch_assoc($notifications)) {
      $class = $row['is_read'] ? 'read' : 'unread';
      $icon = $row['is_read'] ? '&#9650' : '&#9660';
       $style = $row['is_read'] ? '' : 'font-weight:bold;';

      echo '<div class="accordion-header ' . $class . '" onclick="toggleAccordion(this)" style="' . $style . '">' . $row['comment_subject'] . '<span class="accordion-icon">' . $icon . '</span></div>';
      echo '<div class="accordion-body ' . $class . '">' . $row['comment_text'] . '</div>';

    }
  ?>
</div>

<script>
function toggleAccordion(header) {
  var body = header.nextElementSibling;
  var icon = header.querySelector('.accordion-icon');
  if (body.style.display === "block") {
    body.style.display = "none";
    icon.innerHTML = '&#9660;';
  } else {
    body.style.display = "block";
    icon.innerHTML = '&#9650;';
    header.classList.remove('unread');
    header.classList.add('read');
    header.style.fontWeight = 'normal';
    var id = header.getAttribute('data-id');
    updateStatus(id);
    
  }
}

function updateStatus(id) {
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'mark_as_read.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      console.log(xhr.responseText);
    }
  };
  xhr.send('id=' + id);
}


$(document).ready(function() {
    $("#bell-icon").click(function() {
        $.ajax({
            type: "POST",
            url: "mark_as_read.php",
            success: function() {
                // Update notification count to 0
                $("#count").text("0");
            }
        });
    });
});


</script>

</div>
</main>
</div>
</div>
</div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
</body>
</html>

