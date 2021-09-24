<?php 

if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if ($_SESSION['role'] == "บริษัท") {


include_once('database/function.php');

        $img = isset($_GET['delimg']) ? $_GET['delimg'] : '';
        $tid = isset($_GET['tid']) ? $_GET['tid'] : '';
        $imgname = isset($_GET['imgname']) ? $_GET['imgname'] : '';
        $del = new DB_con();
        $sql = $del->deleteimage($img,$imgname);

        if ($sql) {
            //echo "<script>alert('ลบเสร็จสิ้น');</script>";
            echo "<script>window.location.href='edit_tour.php?tid=$tid'</script>";
        }
    

}else{
    //echo "<script>window.location.href='index.php'</script>";
}

?>