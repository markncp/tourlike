<?php
include 'layout/header.php';
include_once('database/function.php');
$db_handle = new DB_con();
include 'nav_company.php';
?>

<?php
if(!isset($_SESSION)) 
{ 
session_start(); 
}

$comid = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$sesrole = isset($_SESSION['role']) ? $_SESSION['role'] : '';


if ($sesrole == "บริษัท") {
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      
      <div class="container">
        <h1 class="h2">จัดการบล็อกท่องเที่ยว</h1>
        <a href="add_blog.php" class="btn btn-success">เพิ่มบล็อก</a>
        <hr>
        
        <table id="mytable" class="table table-bordered table-striped">
        <thead>
            <th>รหัสบล็อก</th>
            <th>เรื่อง</th>
            <th>วันที่เพิ่มบล็อก</th>
            <th>ตรวจสอบ</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
            
        </thead>

        <tbody>
<?php 
$sql = $db_handle->crudblog($comid);

while($row = mysqli_fetch_array($sql)) {

        
?>


                <tr>
                    <td><?php echo $row['blog_id']; ?></td>
                    <td><?php echo $row['heading']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td><a href="showblog.php?blog=<?php echo $row['blog_id']; ?>" class="btn btn-info">View</a></td>
                    <td><a href="edit_blog.php?bid=<?php echo $row['blog_id']; ?>" class="btn btn-primary">Edit</a></td>
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