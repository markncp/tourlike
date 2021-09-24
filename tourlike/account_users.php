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

<?php
if (isset($_POST['editaccount'])) {
  $uid = $_SESSION['id'];
  $fname = $_POST['acfname'];
  $lname = $_POST['aclname'];
  $tel = $_POST['actel'];

  $sql = $db_handle->editpromember($fname, $lname, $tel, $uid);

        /*
        echo '<pre>';
        print_r($uid);
        echo '</pre>';
        exit;
        */
        
  if ($sql) {
      echo "<script>alert('แก้ไขเรียบร้อย!');</script>";
      echo "<script>window.location.href='account_users.php'</script>";
  } else {
      echo "<script>alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
      echo "<script>window.location.href='account_users.php'</script>";
  }
  
}
?>

<?php
    $uid = $_SESSION['id'];
    $datau = $db_handle->accountuser($uid);
    $users = mysqli_fetch_array($datau);           
?>


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="h2">ข้อมูลของฉัน</h3>
      </div>

      

      <form method="post">
                <div class="form-group row">
                      <label for="staticAcEmail" class="col-sm-2 col-form-label">อีเมล</label>
                      <div class="col-sm-5">
                      <input type="text" class="form-control" id="acemail" name="acemail" value="<?php echo $users['email']; ?>" disabled>
                      </div>
                  </div>
                  
                  <div class="form-group row mt-3">
                      <label for="staticAcfname" class="col-sm-2 col-form-label">ชื่อ</label>
                      <div class="col-sm-5">
                      <input type="text" class="form-control" id="acfname" name="acfname" value="<?php echo $users['fname']; ?>">
                      </div>
                  </div>
                  
                  <div class="form-group row mt-3">
                      <label for="staticAclname" class="col-sm-2 col-form-label">นามสกุล</label>
                      <div class="col-sm-5">
                      <input type="text" class="form-control" id="aclname" name="aclname" value="<?php echo $users['lname']; ?>">
                      </div>
                  </div>

                  <div class="form-group row mt-3">
                      <label for="staticActel" class="col-sm-2 col-form-label">หมายเลขโทรศัพท์</label>
                      <div class="col-sm-5">
                      <input type="text" class="form-control" id="actel" name="actel" value="<?php echo $users['tel']; ?>">
                      </div>
                  </div>

                  <div class="form-group row mt-3">
                      <label for="staticbtu" class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-5">
                      <button type="submit" name="editaccount" id="editaccount" class="btn btn-warning">บันทึก</button>
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