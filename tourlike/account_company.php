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
    $datau = $db_handle->accountcompany($comid);
    $com = mysqli_fetch_array($datau);           
?>


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="h2">ข้อมูลของบริษัท</h3>
      </div>

      

      <form method="post" enctype="multipart/form-data">
                <div class="form-group row">
                      <label for="staticAcEmail" class="col-sm-2 col-form-label">อีเมล</label>
                      <div class="col-sm-5">
                      <input type="text" class="form-control" id="comemail" name="comemail" value="<?php echo $com['company_email']; ?>" disabled>
                      </div>
                  </div>
                  
                  <div class="form-group row mt-3">
                      <label for="staticAcfname" class="col-sm-2 col-form-label">ชื่อบริษัท</label>
                      <div class="col-sm-5">
                      <input type="text" class="form-control" id="comename" name="comename" value="<?php echo $com['company_name']; ?>" disabled>
                      </div>
                  </div>

                  <div class="form-group row mt-3">
                      <label for="staticAcfname" class="col-sm-2 col-form-label">รูปโลโก้</label>
                      <div class="col-md-auto">
                      <input type="file" class="form-control-file" id="comlogo" name="comlogo">
                      </div>
                      <div class="col">
                        <p class="text-danger">*ไม่ต้องเลือกรูปถ้าไม่แก้ไข</p>
                      </div>
                  </div>

                  <div class="form-group row mt-3">
                      <label for="staticAcfname" class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-5">
                      <img class="bd-placeholder-img card-img-top" width="100%" height="100%" src="images/company/logo/<?php echo $com['company_image']; ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">            
                      </div>
                  </div>
                  
                  <div class="form-group row mt-3">
                      <label for="staticAclname" class="col-sm-2 col-form-label">รายละเอียดบริษัท</label>
                      <div class="col-sm-5">
                      <textarea class="form-control" id="detailcom" name="detailcom" rows="8" ><?php echo $com['company_detail']; ?></textarea>
                      </div>
                  </div>

                  <div class="form-group row mt-3">
                      <label for="staticActel" class="col-sm-2 col-form-label">หมายเลขโทรศัพท์</label>
                      <div class="col-sm-5">
                      <input type="text" class="form-control" id="comtel" name="comtel" value="<?php echo $com['company_tel']; ?>">
                      </div>
                  </div>

                  <div class="form-group row mt-3">
                      <label for="staticAcfname" class="col-sm-2 col-form-label">ธนาคาร</label>
                      <div class="col-sm-5">
                      <input type="text" class="form-control" id="bankname" name="bankname" value="<?php echo $com['bank_name']; ?>" disabled>
                      </div>
                  </div>

                  <div class="form-group row mt-3">
                      <label for="staticAcfname" class="col-sm-2 col-form-label">เลขบัญชีธนาคาร</label>
                      <div class="col-sm-5">
                      <input type="text" class="form-control" id="banknumber" name="banknumber" value="<?php echo $com['bank_number']; ?>" disabled>
                      </div>
                  </div>

                  <div class="form-group row mt-3 mb-5">
                      <label for="staticbtu" class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-5">
                      <button type="submit" name="editaccount" id="editaccount" class="btn btn-warning">บันทึก</button>
                      </div>
                  </div>

    </form>

<?php
if (isset($_POST['editaccount'])) {

    $detail = $_POST['detailcom'];
    $tel = $_POST['comtel'];


    $def_comlogo = $com['company_image'];
    if($_FILES["comlogo"]["name"] != "")
          {
            $comlogo_tmp = $_FILES['comlogo']['tmp_name'];
            $comlogo = $_FILES['comlogo']['name'];
            $comlogo_name = date("YmdHis").$comlogo;
            $comlogo_path = 'images/company/logo/' . $comlogo_name;

            move_uploaded_file($comlogo_tmp, $comlogo_path);
            @unlink('images/company/logo/'. $def_comlogo);
          }else{
            //ถ้าไม่มีไฟล์
            $comlogo_name = "";
          }

  
  
  $sql = $db_handle->editaccountcompany($detail, $tel, $comid, $comlogo_name);
        
  if ($sql) {
      echo "<script>alert('แก้ไขเรียบร้อย!');</script>";
      echo "<script>window.location.href='account_company.php'</script>";
  } else {
      echo "<script>alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
      echo "<script>window.location.href='account_company.php'</script>";
  }
  
}
?>

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