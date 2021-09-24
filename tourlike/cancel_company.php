<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if ($_SESSION['role'] == "ผู้ดูแลระบบ") {


include_once('database/function.php');

    if (isset($_GET['c4nstcn'])) {
        $comid = $_GET['c4nstcn'];
        $cancelcom = new DB_con();
        $sql = $cancelcom->cancelcompany($comid);

        if ($sql) {
            echo "<script>alert('ยกเลิกสถานะเสร็จสิ้น');</script>";
            echo "<script>window.location.href='crud_company.php'</script>";
        }
    }

}else{
    //echo "<script>window.location.href='index.php'</script>";
}
?>