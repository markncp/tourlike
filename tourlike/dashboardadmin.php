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
        <h1 class="h2">ยืนยันการลงทะเบียนบริษัท</h1>
        <!--
        <a href="#" class="btn btn-success">Go to Insert</a>
        -->
        <hr>
        <table id="mytable" class="table table-bordered table-striped">
        <thead>
            <th>#</th>
            <th>ชื่อบริษัท</th>
            <th>เบอร์ติดต่อ</th>
            
            <th>ใบอนุญาติ</th>
            <th>วันที่ลงทะเบียน</th>
            <th></th>
            <th></th>
            <th></th>
        </thead>

        <tbody>
            <?php 
                $sql = $db_handle->showregistercompany();
                while($row = mysqli_fetch_array($sql)) {
                
            ?>

                <tr>
                    <td><?php echo $row['company_id']; ?></td>
                    <td><?php echo $row['company_name']; ?></td>
                    <td><?php echo $row['company_tel']; ?></td>
                    
                    <td>
                    
                    <img class="img-thumbnail rounded mx-auto d-block" width="200" height="200" 
                    src="images/company/license/<?php echo $row['company_license']; ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </td>

                    <td><?php echo $row['created_at']; ?></td>

                    <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#submitcom<?php echo $row['company_id']; ?>">
                      รายละเอียด
                    </button>
                    </td>
                    
                    <td><a href="delete_regiscom.php?delcpn=<?php echo $row['company_id']; ?>" class="btn btn-danger">ลบ</a></td>
                    <td><a href="submitcom.php?S0ub1J=<?php echo $row['company_id']; ?>" class="btn btn-success">ยืนยันสถานะ</a></td>

                </tr>


                      <div class="modal fade" id="submitcom<?php echo $row['company_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              

                              <p class="fs-6">ชื่อบริษัท: <?php echo $row['company_name'];?></p>
                              <p class="fs-6">อีเมลบริษัท: <?php echo $row['company_email'];?></p>
                              <p class="fs-6">เบอร์ติดต่อ: <?php echo $row['company_tel'];?></p>
                              <p class="text-break">รายละเอียด: <?php echo $row['company_detail'];?></p>
                              <p class="fs-6">วันที่ลงทะเบียน: <?php echo $row['created_at'];?></p>
                              
                              
                              <hr class="featurette-divider">
                              <p class="fs-6">ใบอนุญาติ</p>
                              <img class="img-thumbnail rounded mx-auto d-block" width="500" height="400" 
                              src="images/company/license/<?php echo $row['company_license']; ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                              
                              
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