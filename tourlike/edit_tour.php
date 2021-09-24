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
$id = isset($_GET['tid']) ? $_GET['tid'] : '';

$data = $db_handle->clickproduct($id);
$tour = mysqli_fetch_array($data);

$tourdetail = str_replace('<br>',"", $tour['tour_detail']);

if ($sesrole == "บริษัท") {
?>







<div class="container mt-5">
  <form method="post" enctype="multipart/form-data">
  <div class="row">
      <div class="col-md-2 offset-md-2">
        <label for="tid" class="form-label">รหัสทัวร์</label>
      </div>
      <div class="col-2">
        <input type="text" class="form-control" id="tid" name="tid" aria-describedby="namelHelp" readonly="" value="<?php echo $tour['tour_id']; ?>">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="titlename" class="form-label">ชื่อแพ็คเกจ</label>
      </div>
      <div class="col-5">
        <input type="text" class="form-control" id="titlename" name="titlename" aria-describedby="namelHelp" value="<?php echo $tour['tour_title']; ?>">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="imgpacket" class="form-label">รูปหน้าแพ็คเกจ</label>
      </div>
      <div class="col-md-auto">
      <input type="file" class="form-control-file" id="imgpacket" name="imgpacket">
      </div>
      <div class="col">
      <p class="text-danger">*ไม่ต้องเลือกรูปถ้าไม่แก้ไข</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2 offset-md-2">
        
      </div>
      <div class="col-5">
      <img class="bd-placeholder-img card-img-top" width="100%" height="100%" src="images/tour/tour_title/<?php echo $tour['img_title']; ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">            
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="tourname" class="form-label">ชื่อทัวร์</label>
      </div>
      <div class="col-5">
        <input type="text" class="form-control" id="tourname" name="tourname" aria-describedby="namelHelp" value="<?php echo $tour['tour_name']; ?>">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="tourprice" class="form-label">ราคาทัวร์</label>
      </div>
      <div class="col-2">
        <input type="text" class="form-control" id="tourprice" name="tourprice" aria-describedby="namelHelp" value="<?php echo $tour['tour_price']; ?>">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="touramount" class="form-label">จำนวน</label>
      </div>
      <div class="col-2">
        <input type="text" class="form-control" id="touramount" name="touramount" aria-describedby="namelHelp" value="<?php echo $tour['amount']; ?>">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="detailtour" class="form-label">รายละเอียดทัวร์</label>
      </div>
      <div class="col-8">
        <textarea class="form-control" id="detailtour" name="detailtour" rows="8" ><?php echo $tourdetail ?></textarea>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="triptype" class="form-label">การเดินทาง</label>
      </div>
      <div class="col-5">
        <input type="text" class="form-control" id="triptype" name="triptype" aria-describedby="namelHelp" value="<?php echo $tour['trip_type']; ?>">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="datestart" class="form-label">วันเริ่มทัวร์</label>
      </div>
      <div class="col-5">
        <input type="date" id="datestart" name="datestart" aria-describedby="namelHelp" value="<?php echo $tour['date_start']; ?>">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="dateend" class="form-label">วันกลับ</label>
      </div>
      <div class="col-5">
        <input type="date" id="dateend" name="dateend" aria-describedby="namelHelp" value="<?php echo $tour['date_end']; ?>">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="hotel" class="form-label">ที่พัก</label>
      </div>
      <div class="col-5">
        <input type="text" class="form-control" id="hotel" name="hotel" aria-describedby="namelHelp" value="<?php echo $tour['accommodation']; ?>">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="imghotel" class="form-label">รูปที่พัก</label>
      </div>
      <div class="col-md-auto">
      <input type="file" class="form-control-file" id="imghotel" name="imghotel">
      </div>
      <div class="col">
      <p class="text-danger">*ไม่ต้องเลือกรูปถ้าไม่แก้ไข</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2 offset-md-2">
      </div>
      <div class="col-5">
      <img class="bd-placeholder-img card-img-top" width="100%" height="100%" src="images/tour/tour_hotel/<?php echo $tour['img_accommodation']; ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">            
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="province" class="form-label">จังหวัด</label>
      </div>
      <div class="col-5">
      <div class="col-auto">
    <label class="visually-hidden" for="autoSizingSelect">Preference</label>
    <select class="form-select" id="selectprovince" name="selectprovince">
      <option value="<?php echo $tour['province_id']; ?>" selected><?php echo $tour['province_name']; ?></option>
<?php
$selectpro = $db_handle->selectprovince();
while($filpro = mysqli_fetch_array($selectpro)){
?>
      <option value="<?php echo $filpro['province_id']; ?>"><?php echo $filpro['province_name']; ?></option>
<?php
}
?>
    </select>
    </div>
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

  <hr class="my-4">

  <div class="row mt-3 mb-3">
      <div class="col-md-2 offset-md-2">
        <label for="addimgtour" class="form-label">รูปทัวร์ทั้งหมด</label>
      </div>
      <div class="col-md-auto">
      <input type="file" class="form-control-file" name="addimgtour[]" multiple="true">
      </div>
      <div class="col">
      <button type="submit" name="uploadimg" id="uploadimg" class="btn btn-warning">อัพโหลดรูป</button>
      </div>
    </div>
    


<style>
.imageedit {
margin: auto;
width: 100%;
padding-left: 15%;
padding-right: 15%;
}
</style>

    <div class="imageedit">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-2 mb-5">

<?php
$sqlimg = $db_handle->showimagetour($id);
while($img = mysqli_fetch_array($sqlimg)){  
?>

        <div class="col">
          <div class="card shadow-sm">
          <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="images/tour/tour_image/<?php echo $img['img_name']; ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">            
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <a href="delete_imgtour.php?delimg=<?php echo $img['image_tour']; ?>&tid=<?php echo $tour['tour_id']; ?>&imgname=<?php echo $img['img_name']; ?>" class="btn btn-sm btn-outline-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg> ลบ
                </a>
              </div>
            </div>
          </div>
        </div>

<?php }?>



        
    </div>
</div>


  
    </form>
</div>
<?php
if(isset($_POST['uploadimg'])){

    for($i=0;$i<count($_FILES["addimgtour"]["name"]);$i++)
        {
        $Str_file = explode(".",$_FILES['addimgtour']['name'][$i]);
        $newname = date("YmdHis").$Str_file['0'].".".$Str_file['1'];
        $newname2[] = date("YmdHis").$Str_file['0'].".".$Str_file['1'];
          if($_FILES["addimgtour"]["name"][$i] != "")
          {
            move_uploaded_file($_FILES["addimgtour"]["tmp_name"][$i],"images/tour/tour_image/".$newname);
          }else{

          }
        }
        $db_handle->editimgtour($newname2,$id);
}
?>

<?php
if(isset($_POST['btnedit'])){
        $title = $_POST['titlename'];
        $tname = $_POST['tourname'];
        $dstart = $_POST['datestart'];
        $dend = $_POST['dateend'];
        //$tdetail = $_POST['detailtour'];
        $tdetail = str_replace("\n", "<br>\n", $_POST['detailtour']);
        $tprice = $_POST['tourprice'];
        $ttype = $_POST['triptype'];
        $tamount = $_POST['touramount'];
        $acc = $_POST['hotel'];
        $proid = $_POST['selectprovince'];

        $def_imgtitle = $tour['img_title'];
        $def_imgacc = $tour['img_accommodation'];

        if($_FILES["imgpacket"]["name"] != "")
          {
            $imgpacket_tmp = $_FILES['imgpacket']['tmp_name'];
            $imgpacket = $_FILES['imgpacket']['name'];
            $imgpacket_name = date("YmdHis").$imgpacket;
            $imgpacket_path = 'images/tour/tour_title/' . $imgpacket_name;

            move_uploaded_file($imgpacket_tmp, $imgpacket_path);
            @unlink('images/tour/tour_title/'. $def_imgtitle);
          }else{
            //ถ้าไม่มีไฟล์
            $imgpacket_name = "";
          }

        if($_FILES["imghotel"]["name"] != "")
          {
            $imghotel_tmp = $_FILES['imghotel']['tmp_name'];
            $imghotel = $_FILES['imghotel']['name'];
            $imghotel_name = date("YmdHis").$imghotel;
            $imghotel_path = 'images/tour/tour_hotel/' . $imghotel_name;

            move_uploaded_file($imghotel_tmp, $imghotel_path);
            @unlink('images/tour/tour_hotel/'. $def_imgacc);
          }else{
            //ถ้าไม่มีไฟล์
            $imghotel_name = "";
          }

          $db_handle->edittour($id, $title, $imgpacket_name, $tname, $dstart, $dend, $tdetail, $tprice, $ttype, $tamount, $acc, $imghotel_name, $proid);
          
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $("#detailtour").on("keyup input", function()
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