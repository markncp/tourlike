<?php
include 'layout/header.php';
include_once('database/function.php');
$db_handle = new DB_con();
?>

<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if ($_SESSION['role'] == "ผู้ดูแลระบบ") {
?>


<div class="container-fluid">
  <div class="row">
      
<?php
include 'navdashboard.php';
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      
      <div class="container">
        <h1 class="h2">จัดการบล็อก</h1>

        <!--
        <a href="#" class="btn btn-success">เพิ่มสมาชิก</a>
        -->
        <hr>
        <table id="mytable" class="table table-bordered table-striped">
        <thead>
            <th>id</th>
            <th>หัวเรื่อง</th>
            <th>รูป</th>
            <th>วันที่เพิ่ม</th>
            <th>ผู้เพิ่ม</th>
            <th>ตรวจสอบ</th>
            <th>ลบ</th>
            
        </thead>

        <tbody>
<?php 
$sql = $db_handle->checkblog();
while($row = mysqli_fetch_array($sql)) {
?>


                <tr>
                    <td><?php echo $row['blog_id']; ?></td>
                    <td><?php echo $row['heading']; ?></td>
                    <td><img class="img-thumbnail rounded mx-auto d-block" width="200" height="200" 
                    src="images/blog/<?php echo $row['imageblog']; ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td><?php echo $row['company_name']; ?></td>
                    <td>
                    <a href="showblog.php?blog=<?php echo $row['blog_id'];?>" class="btn btn-primary">View</a>
                    </td>
                    <td><a href="delete_blog.php?bid=<?php echo $row['blog_id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>


<?php 
}
?>
        </tbody>
    </table>

                
        </div>

      </div>
      
                
    </main>
  </div>
</div>


  
    
</body>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</html>


<?php
    }
    else{
      echo "<script>window.location.href='index.php'</script>";
    }
?>