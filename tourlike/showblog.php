<?php
include 'layout/header.php';
include_once('database/function.php');
include_once('signin.php');
include_once('register.php');
$db_handle = new DB_con();

$blog_id = isset($_GET['blog']) ? $_GET['blog'] : '';

$data = $db_handle->showblog($blog_id);
$blog = mysqli_fetch_array($data);
?>

<div class="container">
    <div class="row mt-4">
        <div class="col">

        </div>
        <div class="col-10 mb-4">
        <h3><?php echo $blog['heading'];?></h3>
        <img src="images/blog/<?php echo $blog['imageblog'];?>" class="d-block" height="500" width="100%" alt="...">
        </div>
        <div class="col">
        
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col">

    </div>
    <div class="col-9">
    
    <div class="mb-1 text-muted">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock" viewBox="0 0 20 20">
    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
    </svg>
        <?php echo $blog['created_at']?>
    </div>

    <p><?php echo $blog['content'];?></p>
    </div>
    <div class="col">
    
    </div>
  </div>




</div>


                        

</body>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</html>