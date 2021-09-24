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
$bid = isset($_GET['bid']) ? $_GET['bid'] : '';


$data = $db_handle->clickblog($comid, $bid);
$blog = mysqli_fetch_array($data);
$blogdetail = str_replace('<br>',"", $blog['content']);

if ($sesrole == "บริษัท") {
?>







<div class="container mt-5">
  <form method="post" enctype="multipart/form-data">
  <div class="row">
      <div class="col-md-2 offset-md-2">
        <label for="bid" class="form-label">รหัสบล็อก</label>
      </div>
      <div class="col-2">
        <input type="text" class="form-control" id="bid" name="bid" aria-describedby="namelHelp" readonly="" value="<?php echo $blog['blog_id']; ?>">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="headingblog" class="form-label">เรื่อง</label>
      </div>
      <div class="col-5">
        <input type="text" class="form-control" id="headingblog" name="headingblog" aria-describedby="namelHelp" value="<?php echo $blog['heading']; ?>">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="imgblog" class="form-label">รูป</label>
      </div>
      <div class="col-md-auto">
      <input type="file" class="form-control-file" id="imgblog" name="imgblog">
      </div>
      <div class="col">
      <p class="text-danger">*ไม่ต้องเลือกรูปถ้าไม่แก้ไข</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2 offset-md-2">
        
      </div>
      <div class="col-5">
      <img class="bd-placeholder-img card-img-top" width="100%" height="100%" src="images/blog/<?php echo $blog['imageblog']; ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">            
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="date_create" class="form-label">วันที่เพิ่มทัวร์</label>
      </div>
      <div class="col-2">
        <input type="text" class="form-control" id="date_create" name="date_create" aria-describedby="namelHelp" value="<?php echo $blog['created_at']; ?>" readonly="">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="detailblog" class="form-label">รายละเอียดทัวร์</label>
      </div>
      <div class="col-8">
        <textarea class="form-control" id="detailblog" name="detailblog" rows="8" ><?php echo $blogdetail ?></textarea>
      </div>
    </div>


    

    


  <div class="row mt-4 mb-5">
      <div class="col-md-2 offset-md-2">
      </div>
      <div class="col-5">
      <div class="d-flex flex-column bd-highlight">
        <button type="submit" name="btnedit" id="btnedit" class="btn btn-primary">บันทึก</button>
        </div>      
      </div>
    </div>

  



        
    </div>
</div>


  
    </form>
</div>

<?php
if(isset($_POST['btnedit'])){
        $heading = $_POST['headingblog'];  
        $content = str_replace("\n", "<br>\n", $_POST['detailblog']);

        $def_imgblog = $blog['imageblog'];

        if($_FILES["imgblog"]["name"] != "")
          {
            $imgblog_tmp = $_FILES['imgblog']['tmp_name'];
            $imgblog = $_FILES['imgblog']['name'];
            $imgblog_name = date("YmdHis").$imgblog;
            $imgblog_path = 'images/blog/' . $imgblog_name;

            move_uploaded_file($imgblog_tmp, $imgblog_path);
            @unlink('images/blog/'. $def_imgblog);
          }else{
            //ถ้าไม่มีไฟล์
            $imgblog_name = "";
          }

          $db_handle->editblog($bid, $heading, $content, $imgblog_name, $comid);
          
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