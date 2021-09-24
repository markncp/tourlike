<?php
include 'layout/header.php';
include_once('database/function.php');
$db_handle = new DB_con();

if(!isset($_SESSION)) 
{ 
session_start();

}
if(!isset($_SESSION['id'])){
echo "<script>alert('กรุณาเข้าสู่ระบบ');</script>";
echo "<script>window.history.go(-1);</script>";
}else{  
      
    $tid = $_GET['tid'];
    $amt = $_GET['amt'];
    $uid = $_SESSION['id'];
    $data = $db_handle->clickproduct($tid);
    $tour = mysqli_fetch_array($data);

    $dstart = $tour['date_start'];
    $dend = $tour['date_end'];
    $checkdate = $db_handle->checkbookingdate($dstart, $dend, $uid);
    $numdate = mysqli_fetch_array($checkdate);
    //$dstartcheck = $numdate['date_start'];
    //$dendcheck = $numdate['date_end'];
    $dstartcheck = isset($numdate['date_start']) ? $numdate['date_start'] : '';
    $dendcheck = isset($numdate['date_end']) ? $numdate['date_end'] : '';

    //$pricetour = $tour['tour_price'];
    $tourprice = $tour['tour_price'];
    $totalprice = ($tour['tour_price'] * $amt);

    if($numdate > 0){
      echo "<script>alert('ทัวร์วันที่: $dstartcheck ถึง $dendcheck ได้มีอยู่ในประวัติการจองแล้ว');</script>";
      echo "<script>window.history.go(-1);</script>";
      /*
        echo '<pre>';
        print_r($numdate);
        echo '</pre>';
        exit;
      */
    }else{
      //echo "<script>alert('ยังไม่เคยจองวันนี้');</script>";
      
    }
?>



<div class="container mt-4 mb-5">
      <div class="row">
        <div class="col-md-7">
        
        <h1 class="mb-3">รายละเอียดการจอง</h1>
        
          <div class="row">
            <div class="col-sm-6">
              <h5>ชื่อ</h5>
              <p><?php echo ($_SESSION['name']); ?></p>
            </div>
                  <div class="col-sm-6">
                    <h5>นามสกุล</h5>
                    <p><?php echo ($_SESSION['lname']); ?></p>
                  </div>
            <div class="col-sm-6">
              <h5>เบอร์ติดต่อ</h5>
              <p><?php echo ($_SESSION['tel']); ?></p>
            </div>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">รายการจอง</h4>

          <li class="list-group-item d-flex justify-content-between">
            <div>
              <h5 class="my-1"><?php echo $tour['tour_name'];?></h5>
              <small>เดินทางโดย: <?php echo $tour['trip_type'];?></small><br>
              <small>วันเดินทาง: <?php echo $tour['date_start'];?></small><br>
              <small><?php echo $tour['tour_price'];?> บาท</small>
            </div>
            <span class="text-muted">จำนวน: <?php echo ($amt); ?></span>
          </li>

          <hr class="my-4">
          <form method="post">
          <li class="list-group-item justify-content-between bg-light">
            <div>
              <h2 class="text-center">จำนวนเงินที่ต้องชำระ</h2>
              <p class="lead"><?php echo $tour['tour_name'];?></p>
              <p class="lead"><?php echo $tour['tour_price'];?> บาท</p>
              <p class="lead">จำนวน: <?php echo ($amt);?></p>
              <p class="lead">ราคารวม: <?php echo ($totalprice);?> บาท</p>
              <button class="w-100 btn btn-primary btn-lg" name="addorder" type="submit">ยืนยันการจอง</button>
            </div>
          </li>
          </form>
          
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
}
?>

<?php

if (isset($_POST['addorder'])) {
  
  $db_handle->addorder($uid, $tid, $tourprice, $amt);//insert order
  
}

?>