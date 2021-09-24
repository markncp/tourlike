<?php 

if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if ($_SESSION['role'] == "ผู้ดูแลระบบ") {


include_once('database/function.php');

    if (isset($_GET['delcpn'])) {
        $comid = $_GET['delcpn'];
        $subcom = new DB_con();
        $sql = $subcom->deletecompany($comid);

        if ($sql) {
            echo "<script>alert('ลบเสร็จสิ้น');</script>";
            echo "<script>window.location.href='dashboardadmin.php'</script>";
        }
    }

}else{
    //echo "<script>window.location.href='index.php'</script>";
}

?>