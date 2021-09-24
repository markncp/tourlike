<?php

include 'layout/header.php';
include_once('database/function.php');
$db_handle = new DB_con();
include_once('signin.php');
include_once('register.php');
?>

<form class="row bg-secondary justify-content-md-center" method="get">
  <div class="col-auto">
    <label class="visually-hidden" for="autoSizingSelect">Preference</label>
    <select class="form-select" id="selectprovince" name="selectprovince">
      <option value="" selected>จังหวัด</option>
<?php
  $selectpro = $db_handle->filterprovince();
  while($filpro = mysqli_fetch_array($selectpro)){
?>
      <option value="<?php echo $filpro['province_id']; ?>"><?php echo $filpro['province_name']; ?></option>
<?php
}
?>
    </select>
  </div>
  

  
  <div class="col-auto">
    <label class="visually-hidden" for="autoSizingSelect">Preference</label>
    <select class="form-select" id="selectprice" name="selectprice">
      <option value="" selected>ราคา...</option>
      <option value="ASC">ราคา: น้อย -> มาก</option>
      <option value="DESC">ราคา: มาก -> น้อย</option>
    </select>
  </div>

  <div class="col-auto">
    <input type="text" class="form-control" name="search" id="autoSizingInput" placeholder="ค้นหา...">
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary" name="filterssubmit">ค้นหา</button>
  </div>
</form>



  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      <?php
        $proid = isset($_GET['selectprovince']) ? $_GET['selectprovince'] : '';
        $price = isset($_GET['selectprice']) ? $_GET['selectprice'] : '';
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        $result = $db_handle->showproduct2($proid,$price,$search);
        
        while($data = mysqli_fetch_array($result)){

           
      ?>
        <div class="col">
          <div class="card shadow-sm">
            <img class="bd-placeholder-img card-img-top" width="100%" height="225" 
            src="images/tour/tour_title/<?php echo $data['img_title']?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">

            <div class="card-body">
            <p class="h3 text-success"><?php echo $data['tour_title']?></p>
              <p class="card-text"><?php echo $data['province_name']?>
              <br/>วันเดินทาง <?php echo $data['date_start']?>
              <br/>วันกลับ <?php echo $data['date_end']?>
              <p class="h5 text-danger">฿ <?php echo $data['tour_price']?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a class="btn btn-sm btn-outline-secondary" href="showtour.php?show=<?php echo $data['tour_id']; ?>" >View</a>

                </div>
                <!-- สามารถคลิกตรงไหนก็ได้
                <a href="index.php" class="stretched-link"></a>
                -->

                <?php 
                if($data['amount'] < 1){
                ?>
                <p class="h6 text-danger">จองเต็มแล้ว</p>
                <?php    
                }else{
                ?>
                <small class="text-muted">คงเหลือ : <?php echo $data['amount']?></small>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>         
        <?php } ?>
      </div>
    </div>
  </div>


</body>
<link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</html>