<?php 
include 'layout/header.php';
include_once('database/function.php');
include_once('signin.php');
include_once('register.php');

if(!isset($_SESSION)) 
{ 
session_start(); 

}
?>
<?php
$db_handle = new DB_con();
if (isset($_GET['show'])) {
    $id = $_GET['show'];
    $db_handle = new DB_con();
    $data = $db_handle->clickproduct($id);
    $tour = mysqli_fetch_array($data);

    $sqlimg = $db_handle->showimagetour($id);
    
                /*
                echo '<pre>';
                print_r($img);
                echo '<pre>';
                exit();
                */
                
}

?>




<div class="container mt-4">
                            <h3><?php echo $tour['tour_name'];?></h3>
    

        <div class="row">
            <div class="col-md-8 mt-2 ">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">

                        <?php
                        $qt=1;
                        $i=0;
                        foreach($sqlimg as $row){
                        $actives='';
                        if($i==0){
                        $actives='active';
                        }
                        ?>

                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $i;?>" class="<?php echo $actives;?>" aria-current="true" aria-label="Slide 1"></button>
                            
                            <?php $i++;} ?>

                        </div>
                        <div class="carousel-inner">

                            <?php
                            $i=0;
                            foreach($sqlimg as $row){
                            $actives='';
                            if($i==0){
                            $actives='active';
                            }
                            ?>

                            <div class="carousel-item <?php echo $actives;?>">
                                <img src="images/tour/tour_image/<?php echo $row['img_name'];?>" class="d-block w-100" alt="..." height="450">
                            </div>

                            <?php 
                            $i++;}
                            ?>

                        </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                </div>
            </div>

                            <div class="col-md-4 mt-2">
                                <div class="h-100 p-4 bg-light border rounded-3">
                                    <h1><?php echo $tour['tour_title'];?></h1>
                                    <p><?php echo $tour['province_name'];?></p>
                                    <p>เริ่ม: <?php echo $tour['date_start']?></p>
                                    <p>กลับ: <?php echo $tour['date_end']?></p>
                                    
                                    <p>การเดินทาง: <?php echo $tour['trip_type']?></p>
                                    <h4 class="text-danger">฿ <?php echo $tour['tour_price']?></h4>
                                    <hr class="featurette-divider">



                             <?php  
                                    $sesrole = isset($_SESSION['role']) ? $_SESSION['role'] : '';

                                    if($tour['amount'] < 1){
                                    ?>
                                    <h3 class="text-danger text-center">จองเต็มแล้ว!!</h3>
                                    <?php  
                                    }elseif($sesrole == "บริษัท"){
                                    ?>
                                    <h5 class="text-danger text-center">กรุณาใช้บัญชีสมาชิก!!</h5>


                                    <?php    
                                    }else{
                                    ?>
                                    <div class="mb-3">
                                    คงเหลือ: <?php echo $tour['amount']?>
                                    
                                    <input type='button' value='-' class='qtyminus' field='quantity'>
                                    <input type='text' name='quantity' value='1' size="1" readonly="" id="amt">
                                    <input type='button' value='+' class='qtyplus' field='quantity'><br />
                                        
                                    </div>
                                    <div class="d-flex flex-column bd-highlight">
                                    <button class="btn btn-danger" onclick="myFunction()">จอง</button>
                                    </div>

                            </div>
<?php
}
?>
                                    </div>

                                    </div>

                                    
                                    






                            <div class="container mt-4">
                            <h3>รายละเอียดทัวร์</h3>
                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <div class="h-100 p-3 bg-light border rounded-3">
                                        <p><?php echo $tour['tour_detail']; ?></p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                
                                </div>

                            </div>

                            <h3>โรมแรมและที่พัก</h3>
                            <div class="row">
                                <div class="col-md-8 mb-5">
                                    <div class="h-100 p-2 bg-light border rounded-3">
                                    <div class="row">
                                        <div class="col">
                                            <img src="images/tour/tour_hotel/<?php echo $tour['img_accommodation'];?>" class="img-thumbnail" alt="Cinque Terre" width="400" height="320">
                                        </div>
                                        <div class="col mt-2">
                                            <h5 class="">โรมแรม Sea garden Hotel or Bien Vang Hotel </h5>
                                        </div>

                                    </div>
                                    </div>
                                </div>

                            <div class="col-md-4 mt-2">
                                
                            </div>

                            </div>
                            </div>
                        

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.qtyplus').click(function(e){
        e.preventDefault();
        var fieldName = $(this).prev();
        var currentVal = parseInt(fieldName.val());
        if (!isNaN(currentVal )&& currentVal < <?php echo $tour['amount']?>) {
            fieldName.val(currentVal + 1);
        } else {
            fieldName.val(<?php echo $tour['amount']?>);
        }
    });
    $(".qtyminus").click(function(e) {
        e.preventDefault();
        var fieldName = $(this).next();
        var currentVal = parseInt(fieldName.val());
        if (!isNaN(currentVal) && currentVal > 1) {
            fieldName.val(currentVal - 1);
        } else {
            fieldName.val(1);
        }
    });
});
</script>

<script>
    $("#detailtour").on("keyup input", function()
    {
        $(this).css('height','auto').css('height',this.scrollHeight+(this.offsetHeight - this.clientHeight));
    });
</script>

<script>
function myFunction() {

    location.href = 'detail_booking.php?tid=' + <?php echo $tour['tour_id'];?> + '&amt=' + document.getElementById("amt").value;;
}
</script>


</body>
</html>
