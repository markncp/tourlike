<?php
include 'layout/header.php';
include_once('database/function.php');
$oid = $_GET['oid'];
$db_handle = new DB_con();
$data = $db_handle->paydeposit($oid);
$deposit = mysqli_fetch_array($data);
$total1 = ($deposit['order_price'] * $deposit['order_amount']);
$total2 = (($total1 / 100) * 80);

$tid = $deposit['tour_id'];
$amt = $deposit['order_amount'];
?>





<div class="container mt-4 mb-5 text-center">
<form method="post" enctype="multipart/form-data"> 
        <h1>รายละเอียด</h1>
        <hr class="my-4">
        <div class="row">
            <div class="col-lg-4">
                <h5>รหัสการจอง: <?php echo $deposit['order_id'];?></h5>
            </div>
            <div class="col-lg-4">
                <h5><?php echo $deposit['tour_name'];?></h5>
            </div>
            <div class="col-lg-4">
                <h5>จำนวนที่จอง: <?php echo $deposit['order_amount'];?></h5>
            </div>
        <hr class="my-4">
    
        
        <div class="col-md-7">
            <h1>ชำระเงินค่ามัดจำ</h1>
            <h2 class="text-success">ธนาคาร <?php echo $deposit['bank_name'];?></h2>
            <h2 class="text-success">เลขบัญชี <?php echo $deposit['bank_number'];?></h2><br>

            
                <label for="licenseregiscom" class="form-label text-danger">**อัพโหลดหลักฐานการชำระเงิน**  </label>
                
                <input type="file" class="form-control-file" name="imagedeposit" required>
                <span id="depositavailable"></span>

                <div class="mb-3">
                <label for="comment1" class="form-label">-*-</label>
                <textarea class="form-control" id="comment1" name="comment1" rows="2"></textarea>
                </div>

                <hr class="my-4">
                <button class="w-100 btn btn-primary btn-lg" name="subdeposit" type="submit">ยืนยันการชำระเงิน</button>
            
        </div>
        
        

        



    <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">ชำระเงิน</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">ราคาต่อหน่วย</h6>
            </div>
            <strong><?php echo $deposit['order_price'];?> บาท</strong>
          </li>

          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">จำนวน</h6>
            </div>
            <strong><?php echo $deposit['order_amount'];?></strong>
          </li>

          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">ราคารวม</h6>
            </div>
            <strong><?php echo ($total1);?> บาท</strong>
          </li>

          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-danger">
              <h6 class="my-0">จำนวนเงินที่ต้องมัดจำ (80%)</h6>
            </div>
            <strong class="text-danger"><?php echo ($total2);?> บาท</strong>
          </li>
        </ul>
      </div>

      </div>
</form>
</div>
<?php
if(isset($_POST['subdeposit'])){
    $comment1 = $_POST['comment1'];
    $imgdeposit_tmp = $_FILES['imagedeposit']['tmp_name'];
    $imgdeposit = $_FILES['imagedeposit']['name'];
    $imgdeposit_name = date("YmdHis").$imgdeposit;
    $imgdeposit_path = 'images/payment/' . $imgdeposit_name;

    move_uploaded_file($imgdeposit_tmp, $imgdeposit_path);
    $db_handle->insertdeposit($total2, $imgdeposit_name, $comment1, $total1, $oid);
    $db_handle->upstatus2($oid);

    $db_handle->delstock($amt, $tid);//ตัดstock
    echo "<script>window.location.href='account_order.php'</script>";
}
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>  
</html>