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

$comid = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$sesrole = isset($_SESSION['role']) ? $_SESSION['role'] : '';

if ($sesrole == "บริษัท") {
?>


<div class="container mt-5">
  <form method="post" enctype="multipart/form-data">
  <div class="row">
      <div class="col-md-2 offset-md-1">
        <label for="heading" class="form-label">หัวเรื่อง</label>
      </div>
      <div class="col-8">
        <input type="text" class="form-control" id="heading" name="heading" aria-describedby="namelHelp" required>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-1">
        <label for="imgblog" class="form-label">รูป</label>
      </div>
      <div class="col-md-auto">
      <input type="file" class="form-control-file" id="imgblog" name="imgblog" required>
      </div>
      <div class="col">
      <p class="text-danger">*เลือกได้1รูป</p>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-1">
        <label for="detailblog" class="form-label">รายละเอียด</label>
      </div>
      <div class="col-8">
        <textarea class="form-control" id="detailblog" name="detailblog" rows="5"></textarea>
      </div>
    </div>


  <div class="d-flex justify-content-center mt-4 mb-5">
    <button type="submit" name="addblog" id="addblog" class="btn btn-primary">เพิ่มบล็อกท่องเที่ยว</button>
  </div>
    </form>
</div>

<?php
if(isset($_POST['addblog'])){
        $heading = $_POST['heading'];
        $content = str_replace("\n", "<br>\n", $_POST['detailblog']);

        $imgblog_tmp = $_FILES['imgblog']['tmp_name'];
        $imgblog = $_FILES['imgblog']['name'];
        $imgblog_name = date("YmdHis").$imgblog;
        $imgblog_path = 'images/blog/' . $imgblog_name;

        move_uploaded_file($imgblog_tmp, $imgblog_path);

        $db_handle->addblog($heading, $content, $imgblog_name, $comid);
        echo "<script>alert('เพิ่มบล็อกเสร็จสิ้น');</script>";
        echo "<script>window.location.href='company_blog.php'</script>";

      }
?>
    
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $("#detailblog").on("keyup input", function()
    {
        $(this).css('height','auto').css('height',this.scrollHeight+(this.offsetHeight - this.clientHeight));
    });
</script>


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