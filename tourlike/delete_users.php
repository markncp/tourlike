<?php 

if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if ($_SESSION['role'] == "ผู้ดูแลระบบ") {


include_once('database/function.php');

    if (isset($_GET['delu'])) {
        $uid = $_GET['delu'];
        $del = new DB_con();
        $sql = $del->deleteusers($uid);

        if ($sql) {
            echo "<script>alert('ลบเสร็จสิ้น');</script>";
            echo "<script>window.location.href='crud_user.php'</script>";
        }
    }

}else{
    //echo "<script>window.location.href='index.php'</script>";
}

?>