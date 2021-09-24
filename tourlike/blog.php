<?php
include 'layout/header.php';
include_once('database/function.php');
include_once('signin.php');
include_once('register.php');
$db_handle = new DB_con();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Like</title>
    
</head>
<body>

<?php

?>


<div class="container">
  <main>
    <div class="container mt-5">
      <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 fst-italic">แชร์ข้อมูลเกี่ยวกับการท่องเที่ยวในสถานที่ต่าง ๆ</h1>
          <p class="lead my-3">อัปเดตแนะนำข่าวสารเกี่ยวกับการท่องเที่ยวรวบรวมข้อมูลท่องเที่ยว.</p>
          <!--
          <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
          -->
        </div>
      </div>
    </div>

    <div class="row mb-2">
      
<?php
$datablog = $db_handle->selectblog();
while($blog = mysqli_fetch_array($datablog)){

$str = $blog['content'];
$new_content = iconv_substr($str,0,90,'UTF-8');
?>

      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <h4 class="mb-0"><?php echo $blog['heading']?></h4>
            <div class="mb-1 text-muted"><?php echo $blog['created_at']?></div>
            <p class="mb-auto"><?php echo $new_content."..."; ?></p>
            <a href="showblog.php?blog=<?php echo $blog['blog_id']; ?>" class="stretched-link">อ่านเพิ่มเติม...</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img" width="250" height="250" src="images/blog/<?php echo $blog['imageblog']?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
            </img>
          </div>
        </div>
      </div>

<?php } ?>

    </div>

  </main>
</div>
</body>


</html>