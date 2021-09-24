<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Like</title>
    
</head>
<body>

<header class="p-3 bg-dark text-white sticky-top" id="header">
    <div class="container ">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 text-white">หน้าแรก</a></li>
          <li><a href="packagetour.php" class="nav-link px-2 text-white">แพ็คเกจทัวร์</a></li>
          <li><a href="blog.php" class="nav-link px-2 text-white">บล็อกท่องเที่ยว</a></li>
          <li><a href="about.php" class="nav-link px-2 text-white">เกี่ยวกับเรา</a></li>
        </ul>

        <?php
        session_start();
        if(!isset($_SESSION['name'])){
        ?>
        <button type="button" class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#exampleModalLogin">เข้าสู่ระบบ</button></a>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalLogin">สมัครสมาชิก</button></a>
        <?php
        }else{
        ?>

        <a class="nav-link dropdown-toggle text-white bg-dark" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php echo "{$_SESSION['name']} ({$_SESSION['role']})";?>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <?php
            if ($_SESSION['role'] == "บริษัท") {      
            ?>
            <li><a class="dropdown-item" href="account_company.php">ข้อมูลบริษัท</a></li>
            <?php
            }else{
            ?>
            <li><a class="dropdown-item" href="account_users.php">บัญชีของฉัน</a></li>
            <?php
            }
            ?>

            <?php
            if ($_SESSION['role'] == "สมาชิก") {      
            ?>
            <li><a class="dropdown-item" href="account_order.php">ประวัติการจอง</a></li>
            <?php
            }
            ?>

            <?php
            if ($_SESSION['role'] == "บริษัท") {      
            ?>
            <li><a class="dropdown-item" href="company_order.php">จัดการทัวร์</a></li>
            <?php
            }
            ?>            

            <?php
            if ($_SESSION['role'] == "ผู้ดูแลระบบ") {      
            ?>
            <li><a class="dropdown-item" href="dashboardadmin.php">จัดการระบบ</a></li>
            <?php
            }
            ?>

            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
        </ul>
        <?php
        }
        ?>
        
      </div>
    </div>
  </header>