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
      <div class="col-md-2 offset-md-2">
        <label for="titlename" class="form-label">ชื่อแพ็คเกจ</label>
      </div>
      <div class="col-5">
        <input type="text" class="form-control" id="titlename" name="titlename" aria-describedby="namelHelp" required>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="imgpacket" class="form-label">รูปหน้าแพ็คเกจ</label>
      </div>
      <div class="col-md-auto">
      <input type="file" class="form-control-file" id="imgpacket" name="imgpacket" required>
      </div>
      <div class="col">
      <p class="text-danger">*เลือกได้1รูป</p>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="tourname" class="form-label">ชื่อทัวร์</label>
      </div>
      <div class="col-5">
        <input type="text" class="form-control" id="tourname" name="tourname" aria-describedby="namelHelp" required>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="tourprice" class="form-label">ราคาทัวร์</label>
      </div>
      <div class="col-2">
        <input type="text" class="form-control" id="tourprice" name="tourprice" aria-describedby="namelHelp" required>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="touramount" class="form-label">จำนวน</label>
      </div>
      <div class="col-2">
        <input type="text" class="form-control" id="touramount" name="touramount" aria-describedby="namelHelp" required>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="detailtour" class="form-label">รายละเอียดทัวร์</label>
      </div>
      <div class="col-8">
        <textarea class="form-control" id="detailtour" name="detailtour" rows="5"></textarea>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="triptype" class="form-label">การเดินทาง</label>
      </div>
      <div class="col-5">
        <input type="text" class="form-control" id="triptype" name="triptype" aria-describedby="namelHelp" required>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="datestart" class="form-label">วันเริ่มทัวร์</label>
      </div>
      <div class="col-5">
        <input type="date" id="datestart" name="datestart" aria-describedby="namelHelp" required>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="dateend" class="form-label">วันกลับ</label>
      </div>
      <div class="col-5">
        <input type="date" id="dateend" name="dateend" aria-describedby="namelHelp" required>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="hotel" class="form-label">ที่พัก</label>
      </div>
      <div class="col-5">
        <input type="text" class="form-control" id="hotel" name="hotel" aria-describedby="namelHelp" required>
      </div>
      
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="imghotel" class="form-label">รูปที่พัก</label>
      </div>
      <div class="col-md-auto">
      <input type="file" class="form-control-file" id="imghotel" name="imghotel" required>
      </div>
      <div class="col">
      <p class="text-danger">*เลือกได้1รูป</p>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="province" class="form-label">จังหวัด</label>
      </div>
      <div class="col-5">
      <div class="col-auto">
    <label class="visually-hidden" for="autoSizingSelect">Preference</label>
    <select class="form-select" id="selectprovince" name="selectprovince" required>
      <option value="" selected>จังหวัด</option>
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

  <div class="row mt-3">
      <div class="col-md-2 offset-md-2">
        <label for="imgtour" class="form-label">รูปทัวร์ทั้งหมด</label>
      </div>
      <div class="col-md-auto">
      <input type="file" class="form-control-file" name="imgtour[]" multiple="true">
      </div>
      <div class="col">
      <p class="text-danger">*เลือกได้หลายรูป</p>
      </div>
    </div>




  <div class="d-flex justify-content-center mt-4 mb-5">
    <button type="submit" name="addtour" id="addtour" class="btn btn-primary">เพิ่มทัวร์</button>
  </div>
    </form>
</div>

<?php
if(isset($_POST['addtour'])){
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

        $imgpacket_tmp = $_FILES['imgpacket']['tmp_name'];
        $imgpacket = $_FILES['imgpacket']['name'];
        $imgpacket_name = date("YmdHis").$imgpacket;
        $imgpacket_path = 'images/tour/tour_title/' . $imgpacket_name;

        $imghotel_tmp = $_FILES['imghotel']['tmp_name'];
        $imghotel = $_FILES['imghotel']['name'];
        $imghotel_name = date("YmdHis").$imghotel;
        $imghotel_path = 'images/tour/tour_hotel/' . $imghotel_name;

        move_uploaded_file($imgpacket_tmp, $imgpacket_path);
        move_uploaded_file($imghotel_tmp, $imghotel_path);

        for($i=0;$i<count($_FILES["imgtour"]["name"]);$i++)
        {
        $Str_file = explode(".",$_FILES['imgtour']['name'][$i]);
        //echo $Str_file['0']."<br>";
        $newname = date("YmdHis").$Str_file['0'].".".$Str_file['1'];
        $newname2[] = date("YmdHis").$Str_file['0'].".".$Str_file['1'];
        //echo $newname."<br>";
          if($_FILES["imgtour"]["name"][$i] != "")
          {
            move_uploaded_file($_FILES["imgtour"]["tmp_name"][$i],"images/tour/tour_image/".$newname);
          }else{

          }
        }
        $db_handle->addtour($title, $imgpacket_name, $tname, $dstart, $dend, $tdetail, $tprice, $ttype, $tamount, $acc, $imghotel_name, $proid, $comid, $newname2);

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