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

$tid = isset($_GET['tid']) ? $_GET['tid'] : '';
if ($sesrole == "บริษัท") {
?>
<?php
if(isset($_POST['okpay'])){
  $oid = $_POST['oid'];
  
  $db_handle->upstatus3($oid);
  echo "<script>alert('ยืนยันการชำระเงินมัดจำ');</script>";
  echo "<script>window.location.href='check_deposit.php?tid=$tid'</script>";
}
?>

<?php
if(isset($_POST['notpay'])){
  $amt = $_POST['amtdeposit'];
  $oid = $_POST['oid'];

  $db_handle->returnstock($amt, $tid, $oid);

  echo "<script>alert('ยกเลิกการชำระแล้ว!');</script>";
  echo "<script>window.location.href='check_deposit.php?tid=$tid'</script>";  
}
?>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      
      <div class="container">
        <h1 class="h2">ยืนยันการชำระเงินมัดจำ</h1>


        <table id="mytable" class="table table-bordered table-striped">
        <thead>
            <th>รหัสการจอง</th>
            <th>แพ็คเกจทัวร์</th>
            <th>วันที่จอง</th>
            <th>จำนวน</th>
            <th>ราคารวม</th>
            <th>จำนวนเงินที่ต้องชำระ</th>
            <th>ตรวจสอบสลิป</th>
            
        </thead>

        <tbody>
<?php 
$sql = $db_handle->dataorder($comid, $tid);

while($row = mysqli_fetch_array($sql)) {

        
?>


                <tr>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['tour_title']; ?></td>
                    <td><?php echo $row['order_date']; ?></td>
                    <td><?php echo $row['order_amount']; ?></td>
                    <td><?php echo $row['payment_totalprice']; ?></td>
                    <td class="text-danger"><?php echo $row['payment_deposit']; ?></td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirm<?php echo $row['payment_id']; ?>">ตรวจสอบ</button></td>
                    

                </tr>



                <div class="modal fade" id="confirm<?php echo $row['payment_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ตรวจสอบสลิป</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>


                              <div class="modal-body">
                              <form method="post">

                            <div class="mb-3">
                                  <label for="mbid" class="form-label">รหัสการจอง</label>
                                  <input type="text" class="form-control" id="oid" name="oid" value="<?php echo $row['order_id']; ?>" readonly="">
                            </div>
                            <div class="mb-3">
                                  <label for="mbid" class="form-label">จำนวนที่จอง</label>
                                  <input type="text" class="form-control" name="amtdeposit" value="<?php echo $row['order_amount']; ?>" readonly="">
                            </div>
                            <div class="mb-3">
                                  <label for="mbid" class="form-label">จำนวนเงินที่ต้องชำระ</label>
                                  <input type="text" class="form-control text-danger" id="depositmoney" name="depositmoney" value="<?php echo $row['payment_deposit']; ?>" readonly="">
                            </div>
                            <div class="mb-3">
                              <p class="fs-6">หลักฐานการชำระเงิน</p>
                              <img class="img-thumbnail rounded mx-auto d-block" width="500" height="400" 
                              src="images/payment/<?php echo $row['img_deposit']; ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            </div>

                            <div class="mb-3">
                              <p class="fs-6">comment</p>
                              <textarea class="form-control" rows="5" readonly=""><?php echo $row['comment_deposit']; ?></textarea>
                            </div>
                              


                              <div class="d-flex flex-column bd-highlight mb-3">
                              <button type="submit" name="okpay" id="okpay" class="btn btn-success">ยืนยันการชำระเงิน</button>
                              </div>

                              <hr class="featurette-divider">

                              <div class="d-flex flex-column bd-highlight mb-3">
                              <button type="submit" name="notpay" id="notpay" class="btn btn-secondary">ไม่ผ่านการชำระเงิน</button>
                              </div>

                              </form>
                              </div>
                            </div>
                          </div>
                        </div>

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