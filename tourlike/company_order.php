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
        <h1 class="h2">ยืนยันการชำระเงินมัดจำ</h1>


        <table id="mytable" class="table table-bordered table-striped">
        <thead>
            <th>รหัสทัวร์</th>
            <th>แพ็คเกจทัวร์</th>
            <th>จังหวัด</th>
            <th>วันเดินทาง</th>
            <th>วันกลับ</th>
            <th>ตรวจสอบ</th>
            
        </thead>

        <tbody>
<?php 
$sql = $db_handle->orderidtour($comid);

while($row = mysqli_fetch_array($sql)) {

        
?>


                <tr>
                    <td><?php echo $row['tour_id']; ?></td>
                    <td><?php echo $row['tour_title']; ?></td>
                    <td><?php echo $row['province_name']; ?></td>
                    <td><?php echo $row['date_start']; ?></td>
                    <td><?php echo $row['date_end']; ?></td>
                    <td><a href="check_deposit.php?tid=<?php echo $row['tour_id']; ?>" class="btn btn-info">View</a></td>
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