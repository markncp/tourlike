<?php
include 'layout/header.php';
include_once('database/function.php');
$db_handle = new DB_con();
include 'nav_account.php';

if(!isset($_SESSION)) 
{ 
session_start(); 
}
if(!isset($_SESSION['id'])){
echo "<script>window.location.href='index.php'</script>";
}else{
?>


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="chartjs-size-monitor">
    <div class="chartjs-size-monitor-expand"></div>
    <div class="chartjs-size-monitor-shrink"></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="h2">ประวัติการจอง</h3>
      </div>
<?php
$uid = $_SESSION['id'];
$type='';
if (!empty($_GET['type'])) {
  $type = $_GET['type'];
}
?>
      <ul class="nav nav-pills nav-justified">
      <li class="nav-item">
        <a class="nav-link <?php if($type == ''){echo "active";} ?>" aria-current="page" href="account_order.php">ทั้งหมด</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($type == 1){echo "active";} ?>" href="?type=1">ที่ต้องชำระ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($type == 2){echo "active";} ?>" href="?type=2">รอการตรวจสอบ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($type == 3){echo "active";} ?>" href="?type=3">สำเร็จแล้ว</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($type == 4){echo "active";} ?>" href="?type=4">ยกเลิกแล้ว</a>
      </li>
    </ul>


    <div class="container">
            <hr>
            <table id="mytable" class="table table-bordered table-striped">
                <thead>
                    <th>รหัสการจอง</th>
                    <th>แพ็คเกจ</th>
                    <th>จำนวน</th>
                    <th>วันที่จอง</th>
                    <th>สถานะ</th>
                    
                </thead>

        <tbody>
                <?php
                $sql = $db_handle->usercheckorder($uid, $type);

                while($row = mysqli_fetch_array($sql)) {
                ?>

                <tr>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['tour_title']; ?></td>
                    <td><?php echo $row['order_amount']; ?></td>
                    <td><?php echo $row['order_date']; ?></td>
                    <td><?php 
                    if($row['order_status']== 1){
                      echo "รอการชำระเงินมัดจำ";
                    }elseif($row['order_status']== 2){
                      echo "กำลังตรวจสอบการชำระเงินมัดจำ";
                    }elseif($row['order_status']== 3){
                      echo "สำเร็จแล้ว";
                    }else{
                      echo "ยกเลิกการจอง";
                    }
                    ?>
                        <?php
                          if($row['order_status'] == 1){
                        ?>
                        <div class="" style="float: right;">
                        <a href="pay_deposit.php?oid=<?php echo $row['order_id']; ?>" class="btn btn-success btn-sm" >ชำระเงิน</a>
                        <a href="delete_order.php?delorder=<?php echo $row['order_id']; ?>" class="btn btn-danger btn-sm" >ลบ</a>
                        </div>
                
                        <?php 
                        }elseif($row['order_status'] == 2){
                        ?>
                          <button type="button" class="btn btn-primary btn-sm" style="float: right;" data-bs-toggle="modal" data-bs-target="#checkpay<?php echo $row['order_id']; ?>">ตรวจสอบ</button>

                        <?php 
                        }elseif($row['order_status'] == 3){
                          ?>
                        <a href="receipt.php?oid=<?php echo $row['order_id']; ?>" class="btn btn-info btn-sm" style="float: right;">ใบเสร็จ</a>
                        <?php
                        }else{

                        }
                        ?>
                    </td>
                </tr>

            <?php 
                }
            ?>
        </tbody>
            </table>

                
    </div>
<!-- โค้ดเริ่มตรวจสอบชำระเงิน -->
<?php
$check = $db_handle->checkorderstatus2($uid);
$data = mysqli_fetch_array($check);
?>
                <div class="modal fade" id="checkpay<?php echo $data['order_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ตรวจสอบการชำระเงิน</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>


                              <div class="modal-body">
                              <form method="post">

                            <div class="mb-3">
                                  <label for="mbid" class="form-label">รหัสการจอง</label>
                                  <input type="text" class="form-control" id="oid" name="oid" value="<?php echo $data['order_id']; ?>" readonly="">
                            </div>
                            <div class="mb-3">
                                  <label for="mbid" class="form-label">จำนวนที่จอง</label>
                                  <input type="text" class="form-control" name="amtdeposit" value="<?php echo $data['order_amount']; ?>" readonly="">
                            </div>
                            <div class="mb-3">
                                  <label for="mbid" class="form-label">ราคารวม</label>
                                  <input type="text" class="form-control" id="depositmoney" name="depositmoney" value="<?php echo $data['payment_totalprice']; ?>" readonly="">
                            </div>
                            <div class="mb-3">
                                  <label for="mbid" class="form-label">จำนวนเงินที่ต้องชำระ</label>
                                  <input type="text" class="form-control text-danger" id="depositmoney" name="depositmoney" value="<?php echo $data['payment_deposit']; ?>" readonly="">
                            </div>
                            <div class="mb-3">
                              <p class="fs-6">หลักฐานการชำระเงิน</p>
                              <img class="img-thumbnail rounded mx-auto d-block" width="500" height="400" 
                              src="images/payment/<?php echo $data['img_deposit']; ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            </div>
                              

                              </form>
                              </div>
                            </div>
                          </div>
                        </div>
<!-- สิ้นสุด -->
    
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
?>