<?php
include 'layout/header.php';
include_once('database/function.php');
$db_handle = new DB_con();
?>
<style type="text/css">
			@media print{
				#hid{
					display: none; /* ซ่อน  */
				}
                #header{
					display: none; /* ซ่อน  */
				}
            
			}
		</style>
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$oid = isset($_GET['oid']) ? $_GET['oid'] : '';
$uid = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$fname = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$lname = isset($_SESSION['lname']) ? $_SESSION['lname'] : '';
$tel = isset($_SESSION['tel']) ? $_SESSION['tel'] : '';
$sesrole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesrole == "สมาชิก") {
?>
<div class="container mt-5">
<div class="row" id="hid">
    <div class="col-md-auto">
        <button type="button" class="btn btn-info" onclick="window.print()">ปริ้น</button> 
    </div>
    <div class="col-md-2">
        <!--
        <button type="button" class="btn btn-warning">ดาวน์โหลด</button> 
        -->
    </div>
</div>
<?php 
$bill = $db_handle->receipt($oid, $uid);
$receipt = mysqli_fetch_array($bill);
?>
<div class="mt-4" style="background-color:#f5f5f5;">
               <div class="p-4">
                  <div class="text-center">
                     <h3>ใบเสร็จ</h3>
                  </div>
                  <span class="mt-4"> ชื่อ : <?php echo $fname .' '. $lname; ?></span><span  class="mt-4" id="time"></span>
                  <div class="row">
                     <div class="col-xs-6 col-sm-6 col-md-6 ">
                        <span id="day"></span> เบอร์ : <?php echo $tel; ?><span id="year"></span>
                     </div>
                     <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <p>รหัสการจอง : <?php echo $receipt['order_id']; ?></p>
                     </div>
                  </div>
                  <div class="row">
                     </span>
                     <table id="receipt_bill" class="table">
                        
                        <thead>
                           <tr>
                              <th>รหัสทัวร์</th>
                              <th>แพ็คเกจทัวร์</th>
                              <th>ราคา</th>
                              <th>จำนวน</th>
                              <th class="text-center">การชำระเงิน</th>
                              <th></th>
                           </tr>
                        </thead>

                        <tbody id="new" >
                          
                        </tbody>
                        <tr>
                           <td><?php echo $receipt['tour_id']; ?></td>
                           <td>
                              <?php echo $receipt['tour_title']; ?><br>
                              วันเดินทาง: <?php echo $receipt['date_start']; ?>
                           </td>
                           <td><?php echo $receipt['tour_price']; ?></td>
                           <td><?php echo $receipt['order_amount']; ?></td>
                           <td class="text-right text-dark" >
                                <h5><strong>ราคาเต็ม:</strong></h5>
                                <h5><strong>มัดจำแล้ว(80%) : </strong></้>
                           </td>
                           <td class="text-center text-dark" >
                              <h5> <strong><span id="subTotal"><?php echo $receipt['payment_totalprice']; ?> บาท</strong></h5>
                              <h5> <strong><span id="taxAmount"><?php echo $receipt['payment_deposit']; ?> บาท</strong></h5>
                           </td>
                        </tr>
                        <tr>
                            
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td> </td>

                           <td class="text-right text-dark">
                              <h5><strong>จ่ายวันที่เดินทาง</strong></h5>
                           </td>
                           <td class="text-center">
                              <h5 id="totalPayment"><strong><?php echo $receipt['payment_totalprice'] - $receipt['payment_deposit']; ?> บาท</strong></h5>
                               
                           </td>
                        </tr>
                     </table>
                  </div>
               </div>
            </div>
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