<?php
include 'layout/header.php';
include_once('signin.php');
include_once('register.php');
include_once('database/function.php');
$cpndata = new DB_con();


if(isset($_POST['regiscom'])){
    
    $namecom = $_POST['nameregiscom'];
    $emailcom = $_POST['emailregiscom'];
    $passcom1 = $_POST['password1regiscom'];
    $passcom2 = $_POST['password2regiscom'];
    $passcom3 = hash( 'sha256',$passcom2."13ABcd#$");
    $telcom = $_POST['telregiscom'];

    $logocom_tmp = $_FILES['imagelogo']['tmp_name'];
    $logocom = $_FILES['imagelogo']['name'];
    $logocom_name = date("YmdHis").$logocom;
    $logocom_path = 'images/company/logo/' . $logocom_name;

    $detailcom = $_POST['detailregiscom'];
    $banknamecom = $_POST['banknameregiscom'];
    $banknumcom = $_POST['numbankregiscom'];

    $licensecom_tmp = $_FILES['imagelicense']['tmp_name'];
    $licensecom = $_FILES['imagelicense']['name'];
    $licensecom_name = date("YmdHis").$licensecom;
    //$licensecom_name = "licen_".$licensecom;
    $licensecom_path = 'images/company/license/' . $licensecom_name;

    $checkemailcom1 = $cpndata->checkregister($emailcom);
    $checkemailcom2 = $cpndata->checkregister2($emailcom);

    if(mysqli_num_rows($checkemailcom1)>0){
        echo "<script>alert('อีเมลนี้มีผู้ใช้แล้ว');</script>";
      }elseif(mysqli_num_rows($checkemailcom2)>0){
        echo "<script>alert('อีเมลนี้มีผู้ใช้แล้ว');</script>";

      }elseif(empty($namecom) OR empty($emailcom) OR empty($telcom) OR empty($passcom1) OR empty($passcom2)){
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบ');</script>";

      }else if(empty($licensecom)){
        echo "<script>alert('กรุณาอัพโหลดรูปใบอนุญาติ');</script>";

      }elseif($passcom2 != $passcom1){
        echo "<script>alert('รหัสผ่านไม่ตรงกัน');</script>";

      }else{
            if(empty($logocom)){
                //move_file ของ license
                move_uploaded_file($licensecom_tmp, $licensecom_path);
                $cpndata->registercompany($emailcom, $passcom3, $namecom, $telcom, $logocom, $detailcom, $banknamecom, $banknumcom, $licensecom_name);
                echo "<script>alert('ลงทะเบียนเสร็จสิ้น.. รอการตรวจสอบข้อมูล');</script>";
                echo "<script>window.location.href='index.php'</script>";

            }else{
                //move_file ของ logo
                move_uploaded_file($logocom_tmp, $logocom_path);
                //move_file ของ license
                move_uploaded_file($licensecom_tmp, $licensecom_path);
                $cpndata->registercompany($emailcom, $passcom3, $namecom, $telcom, $logocom_name, $detailcom, $banknamecom, $banknumcom, $licensecom_name);
                echo "<script>alert('ลงทะเบียนเสร็จสิ้น.. รอการตรวจสอบข้อมูล');</script>";
                echo "<script>window.location.href='index.php'</script>";
                
            }
    }


    /*
    echo '<pre>';
    print_r($_FILES['imagelogo']);
    echo '<pre>';
    */

    
}
?>


<div class="container">
    <div class="container">
        <h1 class="mt-5">ลงทะเบียนบริษัท</h1>
        <hr>

       


        <div class="col-md-6">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nameregiscom" class="form-label">ชื่อบริษัท</label>
                <input type="text" class="form-control" id="nameregiscom" name="nameregiscom" aria-describedby="namelHelp">
                <div id="namelHelp" class="form-text">Company Name.</div>
                <span class="text-danger" id="namecomavailable">กรอกชื่อบริษัท</span>
            </div>

            <div class="mb-3">
                <label for="emailregiscom" class="form-label">อีเมล</label>
                <input type="email" class="form-control" id="emailregiscom" name="emailregiscom" aria-describedby="emailHelp" onblur="checkemailcom(this.value) ">
                <div id="emailHelp" class="form-text">Email Address.</div>
                <span class="text-danger" id="emailcomavailable">กรอกอีเมล</span>
            </div>

            <div class="mb-3">
                <label for="password1regiscom" class="form-label">รหัสผ่าน</label>
                <input type="password" class="form-control" id="password1regiscom" name="password1regiscom" aria-describedby="password1Help">
                <div id="password1Help" class="form-text">Password.</div>
            </div>

            <div class="mb-3">
                <label for="password2regiscom" class="form-label">ยืนยันรหัสผ่าน</label>
                <input type="password" class="form-control" id="password2regiscom" name="password2regiscom" aria-describedby="password2Help">
                <div id="password2Help" class="form-text">Confirm password.</div>
                <span class="text-danger" id="passcomavailable">กรอกรหัสผ่าน</span>
            </div>

            <div class="mb-3">
                <label for="telregiscom" class="form-label">เบอร์ติดต่อ</label>
                <input type="text" class="form-control" id="telregiscom" name="telregiscom" aria-describedby="tellHelp">
                <div id="tellHelp" class="form-text">Phone number</div>
                <span class="text-danger" id="telcomavailable">กรอกเบอร์ติดต่อ</span>
            </div>

            <hr class="featurette-divider">

            <div class="mb-1">
                <label for="logoregiscom" class="form-label">โลโก้บริษัท</label>
            </div>
            <div class="mb-3">
                <input type="file" class="form-control-file" name="imagelogo">
            </div>
            
            <hr class="featurette-divider">

            <div class="mb-3">
                <label for="detailregiscom" class="form-label">รายละเอียดบริษัท</label>
                <textarea class="form-control" id="detailregiscom" name="detailregiscom" rows="3"></textarea>
            </div>

            <hr class="featurette-divider">

            <div class="mb-3">
            <label class="my-1 mr-2" for="banknameregiscom">ธนาคาร</label>
            <select class="custom-select my-1 mr-sm-2" id="banknameregiscom" name="banknameregiscom">
                <option value="" selected>---กรุณาเลือก---</option>
                <option value="กสิกร">กสิกร</option>
                <option value="ไทยพาณิชย์">ไทยพาณิชย์</option>
                <option value="กรุงไทย">กรุงไทย</option>
            </select>
            </div>

            <div class="mb-3">
                <label for="numbankregiscom" class="form-label">เลขบัญชีธนาคาร</label>
                <input type="text" class="form-control" id="numbankregiscom" name="numbankregiscom" aria-describedby="banklHelp">
                <div id="banklHelp" class="form-text">Bank account number.</div>
            </div>

            <hr class="featurette-divider">
            
            <div class="mb-1">
                <label for="licenseregiscom" class="form-label">รูปใบอนุญาติบริษัท</label>
                <label for="licenseregiscom" class="form-label text-danger ">**สำคัญ**</label>
            </div>
            <div class="mb-3">
                <input type="file" class="form-control-file" id="imagelicense" name="imagelicense">
                <span id="licensecomavailable"></span>
            </div>
           
            <hr class="featurette-divider">

            <button type="submit" name="regiscom" id="regiscom" class="btn btn-primary">ลงทะเบียน</button>

        </form>
        </div>

        <div class="col-md-6">
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function checkemailcom(val) {
            $.ajax({
                type: 'POST',
                url: 'checkcompany_available.php',
                data: 'emailregiscom='+val,
                success: function(data) {
                    $('#emailcomavailable').html(data);
                }
            });
        }
</script>
    <script>
            $('#nameregiscom, #password1regiscom, #password2regiscom, #telregiscom').on('keyup', function () {

                //เช็คชื่อบริษัท
                if($('#nameregiscom').val() != ""){
                    $('#namecomavailable').html('').css('color', 'red');
                }else{
                    $('#namecomavailable').html('กรอกชื่อบริษัท').css('color', 'red');

                }

                //เช็ครหัสผ่าน
                if($('#password2regiscom').val() != $('#password1regiscom').val()){
                    $('#passcomavailable').html('รหัสผ่านไม่ตรงกัน').css('color', 'red');
                        //$('#regis').prop('disabled', true);

                }else if($('#password1regiscom').val() == ""){
                    $('#passcomavailable').html('กรอกรหัสผ่าน').css('color', 'red');

                }else{
                    $('#passcomavailable').html('').css('color', 'green');
                }

                //เช็คเบอร์โทร
                if($('#telregiscom').val() != ""){
                    $('#telcomavailable').html('').css('color', 'red');

                }else{
                    $('#telcomavailable').html('กรอกเบอร์ติดต่อ').css('color', 'red');

                }   
                
            });        
    </script>

</body>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</html>