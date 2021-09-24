<?php 

    include_once('database/function.php');

    $emailnamecheck = new DB_con();

    // Getting post value
    $emailregis = $_POST['emailregis'];

    $sql = $emailnamecheck->checkregister($emailregis);
    $num1 = mysqli_num_rows($sql);

    $sql2 = $emailnamecheck->checkregister2($emailregis);
    $num2 = mysqli_num_rows($sql2);

    if ($emailregis == "") {
        echo "<span style='color: red;'>กรุณากรอกอีเมล.</span>";
        echo "<script>$('#regis').prop('disabled', true);</script>";
    }elseif ($num1 > 0) {
        echo "<span style='color: red;'>อีเมลนี้มีผู้ใช้แล้ว.</span>";
        echo "<script>$('#regis').prop('disabled', true);</script>";
        
    }elseif ($num2 > 0) {
        echo "<span style='color: red;'>อีเมลนี้มีผู้ใช้แล้ว.</span>";
        echo "<script>$('#regis').prop('disabled', true);</script>";
        
    }else {
        echo "<span style='color: green;'></span>";
        //echo "<span style='color: green;'>สามารถใช้อีเมลนี้ได้</span>";
        //echo "<script>$('#regis').prop('disabled', false);</script>";
        
    }

?>