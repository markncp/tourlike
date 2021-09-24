<?php 


if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$comid = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$sesrole = isset($_SESSION['role']) ? $_SESSION['role'] : '';

$bid = isset($_GET['bid']) ? $_GET['bid'] : '';
include_once('database/function.php');
if ($sesrole == "บริษัท") {
        $del = new DB_con();
        $sql = $del->deleteblog($bid, $comid);

        if ($sql) {
            echo "<script>alert('ลบเสร็จสิ้น');</script>";
            echo "<script>window.location.href='company_blog.php'</script>";
        }
    

}elseif($sesrole == "ผู้ดูแลระบบ"){
    $del = new DB_con();
    $sql = $del->deleteblog($bid, $comid);

    if ($sql) {
        echo "<script>alert('ลบเสร็จสิ้น');</script>";
        echo "<script>window.location.href='crud_blog.php'</script>";
    }
}else{

}

?>