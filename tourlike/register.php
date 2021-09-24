<?php
    include_once('database/function.php');
    $userdata = new DB_con();
    
    if(isset($_POST['regis'])){
        $emailregis = $_POST['emailregis'];
        $passregis1 = $_POST['passregis1'];
        $passregis2 = $_POST['passregis2'];
        $passregis3 = hash( 'sha256',$_POST['passregis2']."13ABcd#$");
        $fnameregis = $_POST['fnameregis'];
        $lnameregis = $_POST['lnameregis'];
        $phone = $_POST['phone'];

        $check1 = $userdata->checkregister($emailregis);
        $check2 = $userdata->checkregister2($emailregis);

        if(mysqli_num_rows($check1)>0){
          echo "<script>alert('อีเมลนี้มีผู้ใช้แล้ว');</script>";
        }elseif(mysqli_num_rows($check2)>0){
          echo "<script>alert('อีเมลนี้มีผู้ใช้แล้ว');</script>";

        }elseif(empty($emailregis) OR empty($passregis1) OR empty($passregis2) OR empty($fnameregis) OR empty($lnameregis) OR empty($phone)){
          echo "<script>alert('กรุณากรอกข้อมูลให้ครบ');</script>";

        }elseif($passregis2 != $passregis1){
          echo "<script>alert('รหัสผ่านไม่ตรงกัน');</script>";
        }else{
          $userdata->register($emailregis, $passregis3, $fnameregis, $lnameregis, $phone);
          echo "<script>alert('สมัครสมาชิกสำเร็จ');</script>";
          header("Refresh:0");
          //echo "<script>window.location.href='index.php'</script>";
        }
        
        /*
        echo '<pre>';
        print_r($check1);
        echo '</pre>';
        exit;
        */
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>  
    <link rel="stylesheet" href="css/bootstrap.min.css">

    
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>

        

<!-- Modal -->
<div class="modal fade" id="ModalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">สมัครสมาชิก</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="d-grid gap-2">
</div>


      <div id="member" class="modal-body">
      <form method="post">
      <!--<form method="post" action="register_checkadd.php">-->
        <div class="mb-3">
            <label for="emailregis" class="form-label">อีเมล</label>
            <input type="email" class="form-control" id="emailregis" name="emailregis" onblur="checkemail(this.value)">
            <span id="emailavailable"></span>
        </div>

        <div class="mb-3">
            <label for="passregis1" class="form-label">รหัสผ่าน</label>
            <input type="password" class="form-control" id="passregis1" name="passregis1">
        </div>

        <div class="mb-3">
            <label for="passregis2" class="form-label">ยืนยันรหัสผ่าน</label>
            <input type="password" class="form-control" id="passregis2" name="passregis2">
            <span id="passwordcheck"></span>
        </div>

        <div class="mb-3">
            <label for="fnameregis" class="form-label">ชื่อ</label>
            <input type="text" class="form-control" id="fnameregis" name="fnameregis">
            <span id="fnamecheck"></span>
        </div>

        <div class="mb-3">
            <label for="lnameregis" class="form-label">นามสกุล</label>
            <input type="text" class="form-control" id="lnameregis" name="lnameregis">
            <span id="lnamecheck"></span>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">เบอร์โทร</label>
            <input type="text" class="form-control" id="phone" name="phone">
            <span id="phonecheck"></span>
        </div>


        <div class="d-flex flex-column bd-highlight mb-3">
        <button type="submit" name="regis" id="regis" class="btn btn-primary" disabled="true">สมัครสมาชิก</button>
        </div>

        <hr class="featurette-divider">

        <div class="d-flex flex-column bd-highlight mb-3">
        <a class="btn btn-danger" href="registercompany.php" role="button">สมัครบัญชีบริษัท คลิกเลย!!</a>
        </div>
      </form>
      </div>




    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function checkemail(val) {
            $.ajax({
                type: 'POST',
                url: 'checkuser_available.php',
                data: 'emailregis='+val,
                success: function(data) {
                    $('#emailavailable').html(data);
                }
            });
        }
    </script>
<script>
        $('#emailregis, #passregis1, #passregis2, #fnameregis, #lnameregis, #phone').on('keyup', function () {

          
          if($('#passregis1').val() == ""){
            $('#passwordcheck').html('กรอกรหัสผ่าน').css('color', 'red');
            $('#regis').prop('disabled', true);

          }else if($('#passregis2').val() != $('#passregis1').val()){
              $('#passwordcheck').html('รหัสผ่านไม่ตรงกัน').css('color', 'red');
              $('#regis').prop('disabled', true);

          }else{
              $('#passwordcheck').html('').css('color', 'green');

              if($('#fnameregis').val() == ""){
                $('#fnamecheck').html('กรอกชื่อ').css('color', 'red');
                $('#regis').prop('disabled', true);

              }else{
                  $('#fnamecheck').html('').css('color', 'green');


                  if($('#lnameregis').val() == ""){
                    $('#lnamecheck').html('กรอกนามสกุล').css('color', 'red');
                    $('#regis').prop('disabled', true);

                  }else{
                    $('#lnamecheck').html('').css('color', 'green');
                    $('#regis').prop('disabled', false);

                    if($('#phone').val() == ""){
                      $('#phonecheck').html('กรอกเบอร์โทร').css('color', 'red');
                      $('#regis').prop('disabled', true);

                    }else{
                      $('#phonecheck').html('').css('color', 'green');
                      $('#regis').prop('disabled', false);

                    }
                  }
              }

            }
        });        
</script>
</body>
</html>
