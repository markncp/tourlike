<?php
include 'layout/header.php';
include_once('database/function.php');
$db_handle = new DB_con();
include 'nav_company.php';
?>
<?php
$comid = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$tid = isset($_GET['selecttour']) ? $_GET['selecttour'] : '';
$year = isset($_GET['year']) ? $_GET['year'] : date("Y") ;
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
<form method="GET">
<div class="row mt-3">
    <div class="col">
      <h3>รายงานการจองทัวร์</h3>
    </div>
    <div class="col-md-auto">
        <p>เลือกปี :</p>
    </div>

    <div class="col-md-auto">
        <select class="form-select form-select-sm" id="year" name="year">
        <option value="<?php echo date("Y"); ?>" selected>--</option>
<?php
$dataselect = $db_handle->chart3selectyear($comid);
while($selectyear = mysqli_fetch_array($dataselect)){
?>
        <option value="<?php echo $selectyear['year']?>"><?php echo $selectyear['year']?></option>
<?php } ?>       
        </select>
    </div>
    <div class="col col-lg-2">
    <button type="submit" class="btn btn-secondary btn-sm" >เลือก</button>
    </div>

  </div>
  </form>
  <?php

$mount=["","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"];
  
$dataPoints =array();
$datachart1 = $db_handle->chart3($comid,$year);
$p = mysqli_fetch_array($datachart1);

for($i = 1; $i<=12; $i++) {
    array_push($dataPoints,array("label"=> $mount[$i], "y"=> $p[$i] ));
}
/*
foreach($datachart1 as $item){
    array_push($dataPoints,array("label"=> $item["tour_title"], "y"=> $item["order_amount"] ));
}	
*/
 ?>


    <!--
      <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="843" height="356" style="display: block; height: 285px; width: 675px;"></canvas>
-->
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
      <h4>ข้อมูลการจอง</h4>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">แพ็คเกจทัวร์</th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col">จำนวน</th>
              <th scope="col">จำนวนเงิน</th>
            </tr>
          </thead>
          <tbody>
<?php
$sum_amount = 0;
$sum_price = 0;
$result = $db_handle->datareport1($comid,$year);
while($data = mysqli_fetch_array($result)){
$sum_amount = $sum_amount + $data['total1'];
$sum_price = $sum_price + $data['total2'];
?>
            <tr>
              <td><?php echo $data['tour_title']?></td>
              <td></td>
              <td></td>
              <td><?php echo $data['total1']?></td>
              <td><?php echo $data['total2']?></td>
            </tr>
            
<?php 
}
?>
            <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col">รวม</th>
              <th scope="col"><?php echo $sum_amount; ?></th>
              <th scope="col"><?php echo $sum_price; ?></th>
            </tr>
          </thead>
          </tbody>
        </table>
      </div>
    </main>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "รายได้ปี<?php echo $year;?> ในแต่ละเดือน"
	},
	axisY: {
		title: "รายได้"
	},
	data: [{
		type: "column",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

</body>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
    
</html>