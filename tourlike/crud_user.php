<?php
include 'layout/header.php';
include_once('database/function.php');
$db_handle = new DB_con();
?>

<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if ($_SESSION['role'] == "ผู้ดูแลระบบ") {
?>

<?php
if (isset($_POST['subedit'])) {

  $id = $_POST['mbid'];
  $mbemail = $_POST['mbemail'];
  $mbfname = $_POST['mbfname'];
  $mblname = $_POST['mblname'];
  $mbtel = $_POST['mbtel'];
  $editmemrole = $_POST['editmemrole'];

  $sql = $db_handle->updatecrudmember($mbemail, $mbfname, $mblname, $mbtel, $editmemrole, $id);
  if ($sql) {
      echo "<script>alert('แก้ไขเรียบร้อย!');</script>";
      //echo "<script>window.location.href='index.php'</script>";
  } else {
      echo "<script>alert('Something went wrong! Please try again!');</script>";
      //echo "<script>window.location.href='update.php'</script>";
  }
  
}
?>



<div class="container-fluid">
  <div class="row">
      
<?php
include 'navdashboard.php';
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      
      <div class="container">
        <h1 class="h2">จัดการข้อมูลสมาชิก</h1>

        <!--
        <a href="#" class="btn btn-success">เพิ่มสมาชิก</a>
        -->
        <hr>
        <table id="mytable" class="table table-bordered table-striped">
        <thead>
            <th>id</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>อีเมล</th>
            <th>หมายเลขโทรศัพท์</th>
            <th>ตำแหน่ง</th>
            <th>วันที่สมัคร</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
            
        </thead>

        <tbody>
<?php 
$sql = $db_handle->showusers();
while($row = mysqli_fetch_array($sql)) {
?>


                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['tel']; ?></td>
                    <td><?php echo $row['role_name']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edt<?php echo $row['id']; ?>">
                      Edit
                    </button>
                    </td>
                    <td><a href="delete_users.php?delu=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>

                      <div class="modal fade" id="edt<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">แก้ไขสมาชิก</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>


                              <div class="modal-body">
                              <form method="post">

                              <div class="mb-3">
                                  <label for="mbid" class="form-label">id</label>
                                  <input type="text" class="form-control" id="mbid" name="mbid" value="<?php echo $row['id']; ?>" readonly="">
                        
                              </div>

                              <div class="mb-3">
                                  <label for="mbemail" class="form-label">อีเมล</label>
                                  <input type="text" class="form-control" id="mbemail" name="mbemail" value="<?php echo $row['email']; ?>" readonly="">
                        
                              </div>

                              <div class="mb-3">
                                  <label for="mbfname" class="form-label">ชื่อ</label>
                                  <input type="text" class="form-control" id="mbfname" name="mbfname" value="<?php echo $row['fname']; ?>">
                        
                              </div>

                              <div class="mb-3">
                                  <label for="mblname" class="form-label">นามสกุล</label>
                                  <input type="text" class="form-control" id="mblname" name="mblname" value="<?php echo $row['lname']; ?>">
                                  
                              </div>

                              <div class="mb-3">
                                  <label for="mbtel" class="form-label">หมายเลขโทรศัพท์</label>
                                  <input type="text" class="form-control" id="mbtel" name="mbtel" value="<?php echo $row['tel']; ?>">
                                  
                              </div>

                              <div class="mb-3">
                              <label class="my-1 mr-2" for="banknameregiscom">ตำแหน่ง : </label>
                              <select class="custom-select my-1 mr-sm-2" id="editmemrole" name="editmemrole">
                                  <option value="<?php echo $row['role_id'];?>" selected><?php echo $row['role_name'];?></option>
                                  <option value="1">สมาชิก</option>
                                  <option value="3">ผู้ดูแลระบบ</option>             
                              </select>
                              </div>

                              <div class="d-flex flex-column bd-highlight mb-3">
                              <button type="submit" name="subedit" id="subedit" class="btn btn-success">ยืนยัน</button>
                              </div>
                              </form>
                              </div>
                            </div>
                          </div>
                        </div>

<?php 
}
?>
        </tbody>
    </table>

                
        </div>

      </div>
      
                
    </main>
  </div>
</div>


  
    
</body>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</html>


<?php
    }
    else{
      echo "<script>window.location.href='index.php'</script>";
    }
?>