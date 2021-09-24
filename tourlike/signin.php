<?php
include_once('database/function.php');
$userdata = new DB_con();

if (isset($_POST['login'])) {
  $emaillogin = $_POST['emaillogin'];
  $passwordlogin = hash( 'sha256',$_POST['passwordlogin']."13ABcd#$");
  $result = $userdata->signin($emaillogin, $passwordlogin);
  $num = mysqli_fetch_array($result);
  $result2 = $userdata->signincompany($emaillogin, $passwordlogin);
  $num2 = mysqli_fetch_array($result2);
  $result3 = $userdata->signincompany2($emaillogin, $passwordlogin);
  $num3 = mysqli_fetch_array($result3);
        /*
        echo '<pre>';
        print_r($num);
        echo '</pre>';
        exit;
        */

  if ($num > 0) {
    if (!isset($_SESSION)) {
      session_start();
    }
    $_SESSION['id'] = $num['id'];
    $_SESSION['name'] = $num['fname'];
    $_SESSION['lname'] = $num['lname'];
    $_SESSION['tel'] = $num['tel'];
    $_SESSION['role'] = $num['role_name'];
    echo "<script>alert('เข้าสู่ระบบสำเร็จ');</script>";
    header("Refresh:0");
  } else {
    if ($num2 > 0) {
      $_SESSION['id'] = $num2['company_id'];
      $_SESSION['name'] = $num2['company_name'];
      $_SESSION['role'] = $num2['role_name'];
      echo "<script>alert('เข้าสู่ระบบสำเร็จ');</script>";
      //header("Refresh:0");
      echo "<script>window.location.href='company_order.php'</script>";
    }elseif($num3 > 0){
      echo "<script>alert('อยู่ระหว่างการตรวจสอบบัญชีบริษัท');</script>";
    } else {
      echo "<script>alert('อีเมลหรือรหัสผ่านผิด!');</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  
</head>

<body>



  <!-- Modal -->
  <div class="modal fade" id="exampleModalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">เข้าสู่ระบบ</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="login" class="modal-body">
          <form method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">อีเมล</label>
              <input type="email" class="form-control" id="emaillogin" name="emaillogin" aria-describedby="emailHelp" required>
              <div id="emailHelp" class="form-text">Email Address.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">รหัสผ่าน</label>
              <input type="password" class="form-control" id="passwordlogin" name="passwordlogin" required>
              <div id="emailHelp" class="form-text">Password.</div>
            </div>

            <div class="d-flex flex-column bd-highlight mb-3">
              <button type="submit" name="login" class="btn btn-primary">เข้าสู่ระบบ</button>
            </div>
          </form>


        </div>

      </div>
    </div>
  </div>


</body>
<link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</html>