<?php 
include_once('database/function.php');

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

if ($_SESSION['role'] == "สมาชิก") {
        $uid = isset($_SESSION['id']) ? $_SESSION['id'] : '';
        $oid = isset($_GET['delorder']) ? $_GET['delorder'] : '';

        $del = new DB_con();
        $sql = $del->deleteorder($oid, $uid);

        if ($sql) {
            echo "<script>alert('ลบเสร็จสิ้น');</script>";
            echo "<script>window.location.href='account_order.php'</script>";
        }
    

}else{
    //echo "<script>window.location.href='index.php'</script>";
}

?>