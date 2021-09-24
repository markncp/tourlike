<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if ($_SESSION['role'] == "ผู้ดูแลระบบ") {
    

include_once('database/function.php');

    if (isset($_GET['S0ub1J'])) {
        $comid = $_GET['S0ub1J'];
        $subcom = new DB_con();
        $sql = $subcom->upstatuscom($comid);

        if ($sql) {
            echo "<script>alert('ยืนยันเสร็จสิ้น');</script>";
            echo "<script>window.location.href='dashboardadmin.php'</script>";
        }
    }

}else{
    //echo "<script>window.location.href='index.php'</script>";
}

?>