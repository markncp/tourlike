<?php
include 'layout/header.php';
include_once('database/function.php');
$db_handle = new DB_con();
include 'nav_account2.php';

if(!isset($_SESSION)) 
{ 
session_start(); 
}
$comid = isset($_SESSION['id']) ? $_SESSION['id'] : '';

if(!isset($_SESSION['id'])){
echo "<script>window.location.href='index.php'</script>";
}else{
?>

<?php
if (isset($_POST['changepass'])) {
  $pass1 = hash( 'sha256',$_POST['changepass1']."13ABcd#$");
  $pass2 = $_POST['changepass2'];
  $pass3 = $_POST['changepass3'];
  $passchange = hash( 'sha256', $pass2."13ABcd#$");

  $checkpass = $db_handle->checkpasswordcompany($comid, $pass1);
    
  if(empty($pass1) OR empty($pass2) OR empty($pass3)){
    echo "<script>alert('กรุณากรอกข้อมูลให้ครบ');</script>";
  }elseif(mysqli_num_rows($checkpass)<1){
    echo "<script>alert('รหัสผ่านปัจจุบันผิด');</script>";
  }elseif($pass3 != $pass2){
    echo "<script>alert('ยืนยันรหัสผ่านไม่ตรงกัน');</script>";
  }elseif(mysqli_num_rows($checkpass)>0){
    $db_handle->changpasscompany($passchange, $comid);
    echo "<script>alert('เปลี่ยนรหัสผ่านเรียบร้อย!');</script>";
  }else{
    echo "<script>alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
  }
}
?>



    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"></div><div class="chartjs-size-monitor-shrink"></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="h2">เปลี่ยนรหัสผ่าน</h3>
      </div>

      <form method="post">

                <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">รหัสผ่านปัจจุบัน</label>
                      <div class="col-sm-5">
                      <input type="password" class="form-control" id="changepass1" name="changepass1" >
                      </div>
                  </div>
                  
                  <div class="form-group row mt-3">
                      <label for="staticfname" class="col-sm-2 col-form-label">รหัสผ่านใหม่</label>
                      <div class="col-sm-5">
                      <input type="password" class="form-control" id="changepass2" name="changepass2" >
                      </div>
                  </div>
                  
                  <div class="form-group row mt-3">
                      <label for="statictel" class="col-sm-2 col-form-label">ยืนยันรหัสผ่าน</label>
                      <div class="col-sm-5">
                      <input type="password" class="form-control" id="changepass3" name="changepass3" >
                      <span class="text-danger" id="checkchangepass"></span>
                      </div>
                  </div>

                  <div class="form-group row mt-3">
                      <label for="statictel" class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-5">
                      <button type="submit" name="changepass" class="btn btn-warning">ยืนยัน</button>
                      </div>
                  </div>
                  
   
    </form>

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