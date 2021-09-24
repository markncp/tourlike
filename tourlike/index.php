<?php
include 'layout/header.php';
include_once('database/function.php');
include_once('signin.php');
include_once('register.php');
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




  <main>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="imagehomepage/banner1.jpg" class="d-block w-100" height="600" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
          <img src="imagehomepage/banner2.jpg" class="d-block w-100" height="600" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
          <img src="imagehomepage/banner3.jpg" class="d-block w-100" height="600" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="carousel-caption text-end">
          <h1>Tour Like</h1>
          <p>ครึ่งหนึ่งของความสนุกในการเดินทาง คือความงดงามของการหลงทาง..</p>
          <p><a class="btn btn-lg btn-light" href="packagetour.php">เพิ่มเติม »</a></p>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
    </div>
  


    <!-- Marketing messaging and featurettes
  ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <hr class="featurette-divider">
    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="bd-placeholder-img rounded-circle" width="140" height="140" aria-label="Placeholder: 140x140" src="https://www.amarnathji.com/wp-content/uploads/2020/07/%E0%B8%97%E0%B8%B5%E0%B9%88%E0%B9%80%E0%B8%97%E0%B8%B5%E0%B9%88%E0%B8%A2%E0%B8%A7%E0%B8%81%E0%B8%A3%E0%B8%B8%E0%B8%87%E0%B9%80%E0%B8%97%E0%B8%9E%E0%B8%A2%E0%B8%AD%E0%B8%94%E0%B8%AE%E0%B8%B4%E0%B8%95.jpg">
          <h2>กรุงเทพ</h2>
          <p>บางกอก หรือที่รู้จักกันในชื่อ "กรุงเทพมหานคร หรือ กรุงเทพฯ" "Bangkok" มีความหมายว่า "พระนครอันยิ่งใหญ่ของเหล่าทวยเทพ" ได้รับการจัด อันดับให้เป็นเมืองที่ดีที่สุดในโลกในปี 2008 โดยนิตรสาร Travel and Leisure Magazine.</p>
          <p><a class="btn btn-secondary" href="#">เพิ่มเติม »</a></p>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4">
          <img class="bd-placeholder-img rounded-circle" width="140" height="140" aria-label="Placeholder: 140x140" src="https://www.atsiamtour.com/Upload/Gallery/135/e5e909de-0b3b-42ad-baaf-40964cc025d4-gallery.jpg">
          <h2>พัทยา</h2>
          <p>เป็นเมืองท่องเที่ยวที่ได้รับความนิยมอย่างมาก มีโรงแรมที่พักมากมายทั้งราคาถูกในหลักร้อย จนถึงระดับห้าดาว คึกคักไปด้วยสถานบันเทิงหลากหลายรูปแบบ ร้านอาหารอร่อยๆมากมายที่มีเกือบทุกมุมของพัทยา.</p>
          <p><a class="btn btn-secondary" href="#">เพิ่มเติม »</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="bd-placeholder-img rounded-circle" width="140" height="140" aria-label="Placeholder: 140x140" src="https://travel.mthai.com/app/uploads/2019/07/5a9098dec1699575008b4648-750-562.jpg">
          <h2>เชียงใหม่</h2>
          <p>ดินแดนที่อบอวลไปด้วยกลิ่นอายของศิลปะ สายหมอก และดอกไม้พอสายลมเย็นๆ โบกโบยมาทีไร เป็นต้องนึกถึงเชียงใหม่ขึ้นทุกทีนอกจากจะผสมผสานทั้งความเก่าและใหม่เข้าไว้ด้วยกันอย่างลงตัว เชียงใหม่ยังเป็นเมืองน่าอยู่ ผู้คนน่ารัก อาหารพื้นเมืองอร่อย.</p>
          <p><a class="btn btn-secondary" href="#">เพิ่มเติม »</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->



      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
          <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
        </div>
        <div class="col-md-5">
          <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" aria-label="Placeholder: 500x500" src="https://www.atsiamtour.com/Upload/Gallery/135/e5e909de-0b3b-42ad-baaf-40964cc025d4-gallery.jpg">

        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
          <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
        </div>
        <div class="col-md-5 order-md-1">
          <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" aria-label="Placeholder: 500x500" src="https://www.atsiamtour.com/Upload/Gallery/135/e5e909de-0b3b-42ad-baaf-40964cc025d4-gallery.jpg">

        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
          <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
        </div>
        <div class="col-md-5">
          <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" aria-label="Placeholder: 500x500" src="https://www.atsiamtour.com/Upload/Gallery/135/e5e909de-0b3b-42ad-baaf-40964cc025d4-gallery.jpg">

        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

      </><!-- /.container -->


      <!-- FOOTER -->
      <footer class="container">
        <p class="float-end"><a href="#">Back to top</a></p>
        <p>© 2021 TourLike Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
      </footer>
  </main>
</body>

</html>