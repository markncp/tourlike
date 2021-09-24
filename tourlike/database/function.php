<?php
    
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'tourlike');

    class DB_con {
        function __construct()
        {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if(mysqli_connect_errno()){
                echo "Failed to connect to MySQL:". mysqli_connect_error();
            }
        }
        
        public function register($fnameregis, $lnameregis, $emailregis, $passregis3, $phone){
            $reg = mysqli_query($this->dbcon, "INSERT INTO users(fname, lname, email, password, tel)
            VALUES('$emailregis', '$passregis3', '$fnameregis', '$lnameregis', '$phone')");
            return $reg;
        }
        
        public function registercompany($emailcom, $passcom3, $namecom, $telcom, $logocom_name, $detailcom, $banknamecom, $banknumcom, $licensecom_name){
            $regcom = mysqli_query($this->dbcon, "INSERT INTO company(company_email, company_password, company_name, company_tel, company_image, company_detail, bank_name, bank_number, company_license)
            VALUES('$emailcom', '$passcom3', '$namecom', '$telcom', '$logocom_name', '$detailcom', '$banknamecom', '$banknumcom', '$licensecom_name')");
            return $regcom;
        }
        
        public function checkregister($emailregis){
            $querycheck = mysqli_query($this->dbcon, "SELECT email FROM users WHERE email = '$emailregis'");
            return $querycheck; 

        }
        
        public function checkregister2($emailregis){
            $querycheck2 = mysqli_query($this->dbcon, "SELECT company_email FROM company WHERE company_email = '$emailregis'");
            return $querycheck2; 

        }
        
        public function signin($emaillogin, $passwordlogin){
            $signinquery = mysqli_query($this->dbcon, "SELECT id, fname, lname, tel, role_name FROM users JOIN role ON role.role_id = users.role_id WHERE email = '$emaillogin' AND password = '$passwordlogin' ");
            return $signinquery;
        }
        
        public function signincompany($emaillogin, $passwordlogin){
            //$signinquery = mysqli_query($this->dbcon, "SELECT company_id, company_name, role_name FROM company JOIN role ON role.role_id= company.role_id WHERE company_email = '$emaillogin' AND company_password = '$passwordlogin' ");
            $signinquery = mysqli_query($this->dbcon, "SELECT company_id, company_name, role_name FROM company JOIN role ON role.role_id= company.role_id WHERE company_email = '$emaillogin' AND company_password = '$passwordlogin' AND company_status = 1");
            return $signinquery;
        }

        public function signincompany2($emaillogin, $passwordlogin){
            //$signinquery = mysqli_query($this->dbcon, "SELECT company_id, company_name, role_name FROM company JOIN role ON role.role_id= company.role_id WHERE company_email = '$emaillogin' AND company_password = '$passwordlogin' ");
            $signinquery = mysqli_query($this->dbcon, "SELECT company_id, company_name, role_name FROM company JOIN role ON role.role_id= company.role_id WHERE company_email = '$emaillogin' AND company_password = '$passwordlogin' AND company_status = 0");
            return $signinquery;
        }
        
        public function showproduct(){
            //$showpro = mysqli_query($this->dbcon, "SELECT * FROM tour ORDER BY tour_id ASC ");
            $showpro = mysqli_query($this->dbcon, "SELECT * , province.province_name FROM tour JOIN province ON province.province_id=tour.province_id ORDER BY tour_id DESC");
            return $showpro;
        }
        
        public function clickproduct($id){
            $clickpro = mysqli_query($this->dbcon, "SELECT * , province.province_name FROM tour JOIN province ON province.province_id=tour.province_id WHERE tour_id = '$id'");
            return $clickpro;
        }
        
        public function showimagetour($id){
            $sqlimg = mysqli_query($this->dbcon, "SELECT * FROM imagetour WHERE tour_id = '$id' ORDER BY image_tour DESC");
            return $sqlimg;
        }
        
        public function usernameavailable($uname) {
            $checkuser = mysqli_query($this->dbcon, "SELECT email FROM users WHERE email = '$uname'");
            return $checkuser;
        }
        
        public function showcompany(){
            $showcom = mysqli_query($this->dbcon, "SELECT * FROM company WHERE company_status = 1");
            return $showcom;
        }
        
        public function showregistercompany(){
            $showregiscom = mysqli_query($this->dbcon, "SELECT * FROM company WHERE company_status = 0 ORDER BY company_id ASC");
            return $showregiscom;
        }
        
        public function upstatuscom($comid){
            $comstatus = mysqli_query($this->dbcon, "UPDATE company SET company_status=1 WHERE company_id = '$comid'");
            return $comstatus;
        }
        
        public function cancelcompany($comid){
            $comstatus = mysqli_query($this->dbcon, "UPDATE company SET company_status=0 WHERE company_id = '$comid'");
            return $comstatus;
        }
        
        public function deletecompany($comid){
            $comdel = mysqli_query($this->dbcon, "DELETE FROM company WHERE company_id = '$comid'");
            return $comdel;
        }
        
        public function deleteusers($uid){
            $udel = mysqli_query($this->dbcon, "DELETE FROM users WHERE id = '$uid'");
            return $udel;
        }

        public function deleteblog($bid, $comid){
            $bdel = mysqli_query($this->dbcon, "DELETE FROM blog WHERE blog_id = '$bid' AND company_id = '$comid' ");
            return $bdel;
        }

        public function deleteblog2($bid){
            $bdel = mysqli_query($this->dbcon, "DELETE FROM blog WHERE blog_id = '$bid' ");
            return $bdel;
        }
        
        public function showusers(){
            $showregiscom = mysqli_query($this->dbcon, "SELECT * ,role_name FROM users JOIN role ON role.role_id = users.role_id ORDER BY id ASC");
            return $showregiscom;
        }
        
        public function accountuser($uid){
            $accuser = mysqli_query($this->dbcon, "SELECT * FROM users WHERE id = '$uid'");
            return $accuser;
        }

        public function accountcompany($comid){
            $acccom = mysqli_query($this->dbcon, "SELECT * FROM company WHERE company_id = '$comid'");
            return $acccom;
        }
        
        public function updatecrudmember($mbemail, $mbfname, $mblname, $mbtel, $editmemrole, $id) {
            $result = mysqli_query($this->dbcon, "UPDATE users SET 
                fname = '$mbfname',
                lname = '$mblname',
                email = '$mbemail',
                tel = '$mbtel',
                role_id = '$editmemrole'
                WHERE id = '$id'
            ");
            return $result;
        }
        
        public function editpromember($fname, $lname, $tel, $uid) {
            $result = mysqli_query($this->dbcon, "UPDATE users SET 
                fname = '$fname',
                lname = '$lname',
                tel = '$tel'
                WHERE id = '$uid'
            ");
            return $result;
        }
        
        public function checkpassword($uid, $pass1){
            $passcheck = mysqli_query($this->dbcon, "SELECT password FROM users WHERE id = '$uid' AND password = '$pass1' ");
            return $passcheck; 
        }

        public function checkpasswordcompany($comid, $pass1){
            $passcheck = mysqli_query($this->dbcon, "SELECT company_password FROM company WHERE company_id = '$comid' AND company_password = '$pass1' ");
            return $passcheck; 
        }

        public function editaccountcompany($detail, $tel, $comid, $comlogo_name) {
            $img1update = "";

            if($comlogo_name) {
                $img1update .= "company_image = '$comlogo_name',";
            }else{
                unset($comlogo_name);
            }

            $result = mysqli_query($this->dbcon, "UPDATE company SET 
                company_tel = '$tel',
                {$img1update}
                company_detail = '$detail'
                WHERE company_id = '$comid'
            ");
            return $result;
        }
        
        public function changpassmember($passchange, $uid) {
            $result = mysqli_query($this->dbcon, "UPDATE users SET 
                password = '$passchange'
                WHERE id = '$uid'
            ");
            return $result;
        }

        public function changpasscompany($passchange, $comid) {
            $result = mysqli_query($this->dbcon, "UPDATE company SET 
                company_password = '$passchange'
                WHERE company_id  = '$comid'
            ");
            return $result;
        }

        public function usercheckorder($uid, $type){
            $where = "";

            if($type) {
                $where .= " AND order_status IN ('$type') ";
                
            }else{
                unset($type);
            }

            $showordermem = mysqli_query($this->dbcon, "SELECT a1.order_id, a1.order_date, a1.order_status, tour.tour_title, order_detail.order_amount
            FROM `order` AS a1
            INNER JOIN order_detail ON a1.order_id = order_detail.order_id
            INNER JOIN tour ON order_detail.tour_id=tour.tour_id 
            WHERE id = '$uid' {$where}
            ORDER BY order_id DESC ");
            return $showordermem;
        }

        public function checkorderstatus2($uid){
            $showordermem = mysqli_query($this->dbcon, 
            "SELECT a1.order_id, a1.order_date,a1.order_status, order_detail.order_amount, payment.payment_totalprice, payment.payment_deposit, payment.img_deposit 
            FROM payment
			INNER JOIN `order` AS a1 ON payment.order_id = a1.order_id
            INNER JOIN order_detail ON a1.order_id = order_detail.order_id
            INNER JOIN tour ON order_detail.tour_id=tour.tour_id 
            INNER JOIN province ON tour.province_id=province.province_id
            WHERE a1.id = '$uid' AND a1.order_status = 2
            ORDER BY order_id DESC ");
            return $showordermem;
        }

        public function orderstatus24($uid){
            $showordermem = mysqli_query($this->dbcon, "SELECT * FROM `order` 
            WHERE order_status IN (2,4) AND id = '$uid' 
            ORDER BY order_id DESC");
            return $showordermem;
        }

        public function orderstatus3($uid){
            $showordermem = mysqli_query($this->dbcon, "SELECT * FROM `order` 
            WHERE order_status = 3 AND id = '$uid' 
            ORDER BY order_id DESC");
            return $showordermem;
        }

        public function orderstatus5($uid){
            $showordermem = mysqli_query($this->dbcon, "SELECT * FROM `order` WHERE order_status = 5 AND id = '$uid' ORDER BY order_id DESC");
            return $showordermem;
        }
        
        public function orderstatus6($uid){
            $showordermem = mysqli_query($this->dbcon, "SELECT * FROM `order` WHERE order_status = 6 AND id = '$uid' ORDER BY order_id DESC");
            return $showordermem;
        }

        public function addorder($uid, $tid, $tourprice, $amt){
            $addorder1 = mysqli_query($this->dbcon, "INSERT INTO `order` (order_status,id) VALUES ('1','$uid')");
            $last_id = $this->dbcon->insert_id;
            if($addorder1){
                $addorder2 = mysqli_query($this->dbcon, 
                "INSERT INTO `order_detail` (order_id, tour_id, order_price, order_amount) VALUES ('$last_id', '$tid', '$tourprice', '$amt')");
            }else{
                echo "error :". mysqli_error();
            }
            echo "<script>window.location.href='pay_deposit.php?oid=$last_id'</script>";
        }

        public function paydeposit($oid){
            $pay1 = mysqli_query($this->dbcon, 
            "SELECT d2.tour_id, d2.tour_name, d1.order_id, d1.order_price, d1.order_amount, d3.bank_name,d3.bank_number FROM order_detail AS d1
            INNER JOIN tour AS d2
            ON  (d1.tour_id = d2.tour_id)
            INNER JOIN company AS d3
            ON (d2.company_id=d3.company_id)
            WHERE order_id = '$oid' ");
            return $pay1;
        }

        public function insertdeposit($total2, $imgdeposit_name, $comment1, $total1, $oid){
            $uppay1 = mysqli_query($this->dbcon, "INSERT INTO payment(payment_deposit, img_deposit, comment_deposit, payment_totalprice, order_id )
            VALUES('$total2', '$imgdeposit_name', '$comment1', '$total1', '$oid')");
            return $uppay1;
        }

        public function upstatus1($oid){
            $upstatus1 = mysqli_query($this->dbcon, "UPDATE `order` SET order_status = 1 WHERE order_id = '$oid'");
            return $upstatus1;
        }

        public function upstatus2($oid){
            $upstatus2 = mysqli_query($this->dbcon, "UPDATE `order` SET order_status = 2 WHERE order_id = '$oid'");
            return $upstatus2;
        }

        public function upstatus3($oid){
            $upstatus3 = mysqli_query($this->dbcon, "UPDATE `order` SET order_status = 3 WHERE order_id = '$oid'");
            return $upstatus3;
        }
        
        public function checkbookingdate($dstart, $dend, $uid){
            $check = mysqli_query($this->dbcon, " SELECT a1.order_id, a1.order_date, a1.id, a3.date_start, a3.date_end FROM `order` AS a1
            INNER JOIN order_detail AS a2
            ON  (a1.order_id = a2.order_id)
            INNER JOIN tour AS a3
            ON (a2.tour_id = a3.tour_id)
            WHERE( (a3.date_start BETWEEN '$dstart' AND '$dend') OR (a3.date_end BETWEEN '$dstart' AND '$dend') )
            AND a1.id = '$uid' ");
            return $check;
        }

        public function delstock($amt, $tid){
            $upstock1 = mysqli_query($this->dbcon, " UPDATE tour SET amount=amount - '$amt' WHERE tour_id = '$tid' ");
            return $upstock1;
        }

        public function returnstock($amt, $tid, $oid){
            $restock = mysqli_query($this->dbcon, " UPDATE tour SET amount=amount + '$amt' WHERE tour_id = '$tid' ");
            

            if($restock){
                $upstatus1 = mysqli_query($this->dbcon, "UPDATE `order` SET order_status = 1 WHERE order_id = '$oid'");
                if($upstatus1){
                    $deleteimg = mysqli_query($this->dbcon, "DELETE FROM payment WHERE order_id = '$oid'");
                }else{
                    echo "Error :" . mysqli_error($this->dbcon);
                }
            }else{
                echo "Error :" . mysqli_error($this->dbcon);
            }

        }

        public function filterprovince(){
            $filterpro = mysqli_query($this->dbcon, " SELECT tour.province_id, province.province_name 
            FROM tour 
            INNER JOIN province ON tour.province_id=province.province_id 
            WHERE tour.date_start >= curdate()
            GROUP BY tour.province_id ");
            return $filterpro;
        }

        public function selectprovince(){
            $selectpro = mysqli_query($this->dbcon, " SELECT * FROM province ");
            return $selectpro;
        }

        public function showtourcompany($comid){
            $crudtour = mysqli_query($this->dbcon, " SELECT * , province_name FROM tour INNER JOIN province ON tour.province_id=province.province_id WHERE company_id = '$comid' ");
            return $crudtour;
        }

        public function orderprovince($comid){
            $provineorder = mysqli_query($this->dbcon, "SELECT tour.tour_id, tour.tour_title, tour.date_start, tour.date_end, province.province_name FROM payment
			INNER JOIN `order` AS a1 ON payment.order_id = a1.order_id
            INNER JOIN order_detail ON a1.order_id = order_detail.order_id
            INNER JOIN tour ON order_detail.tour_id=tour.tour_id 
            INNER JOIN province ON tour.province_id=province.province_id
            WHERE tour.company_id = '$comid'
            GROUP BY province_name");
            return $provineorder;
        }

        public function orderidtour($comid){
            $idtourorder = mysqli_query($this->dbcon, "SELECT tour.tour_id, tour.tour_title, tour.date_start, tour.date_end, province.province_name FROM payment
			INNER JOIN `order` AS a1 ON payment.order_id = a1.order_id
            INNER JOIN order_detail ON a1.order_id = order_detail.order_id
            INNER JOIN tour ON order_detail.tour_id=tour.tour_id 
            INNER JOIN province ON tour.province_id=province.province_id
            WHERE tour.company_id = '$comid' AND a1.order_status = 2
            GROUP BY tour.tour_id");
            return $idtourorder;
        }

        public function orderdepositcom($comid){
            $idtourorder = mysqli_query($this->dbcon, "SELECT * FROM payment
			INNER JOIN `order` AS a1 ON payment.order_id = a1.order_id
            INNER JOIN order_detail ON a1.order_id = order_detail.order_id
            INNER JOIN tour ON order_detail.tour_id=tour.tour_id 
            INNER JOIN province ON tour.province_id=province.province_id
            WHERE tour.company_id = '$comid' ");
            return $idtourorder;
        }

        public function dataorder($comid, $tid){
            $tourdata = mysqli_query($this->dbcon, "SELECT * , order_detail.order_amount FROM payment
			INNER JOIN `order` AS a1 ON payment.order_id = a1.order_id
            INNER JOIN order_detail ON a1.order_id = order_detail.order_id
            INNER JOIN tour ON order_detail.tour_id=tour.tour_id 
            INNER JOIN province ON tour.province_id=province.province_id
            WHERE tour.company_id = '$comid' AND tour.tour_id = '$tid' AND a1.order_status = 2 ");
            return $tourdata;
        }

        public function showproduct2($proid,$price,$search){
            $where = "";
            $seprice= "";

            if($search) {
                $where .= " AND (tour.tour_title LIKE '%$search%' OR tour.tour_name LIKE '%$search%') ";
                
            }else{
                unset($search);
            }

            if($proid) {
                $where .= " AND tour.province_id  = '$proid' ";
            }else{
                unset($proid);
            }

            if($price) {
                $seprice .= " ORDER BY tour_price $price ";
            }else{
                $seprice .= " ORDER BY tour_id DESC ";
            }

            $showpro2 = mysqli_query($this->dbcon, "SELECT tour_id, tour_title, img_title, date_start, date_end, tour_price, amount, province.province_name FROM tour 
            JOIN province ON province.province_id=tour.province_id
            WHERE tour.date_start >= curdate()
            {$where} 
            {$seprice}
            ");
            return $showpro2;
        }
        
        public function addtour($title, $imgpacket_name, $tname, $dstart, $dend, $tdetail, $tprice, $ttype, $tamount, $acc, $imghotel_name, $proid, $comid, $newname2){
            $addtour = mysqli_query($this->dbcon, "INSERT INTO tour 
            (tour_title, img_title, tour_name, date_start, date_end, tour_detail, tour_price, trip_type, amount, accommodation, img_accommodation, province_id, company_id) 
            VALUES ('$title','$imgpacket_name', '$tname', '$dstart', '$dend', '$tdetail', '$tprice', '$ttype', '$tamount', '$acc', '$imghotel_name', '$proid', '$comid')");
            $last_id = $this->dbcon->insert_id;
            if($addtour){
                foreach($newname2 as $key) {
                    $addimage = mysqli_query($this->dbcon, "INSERT INTO `imagetour` (img_name, tour_id) VALUES ('$key', '$last_id')");
                }
            }else{
                echo "error :". mysqli_error();
            }

            echo "<script>window.location.href='company_tour.php'</script>";
        }

        public function editimgtour($newname2,$id){
            foreach($newname2 as $key) {
                $editimage = mysqli_query($this->dbcon, "INSERT INTO `imagetour` (img_name, tour_id) VALUES ('$key', '$id')");
            }
            echo "<script>window.location.href='edit_tour.php?tid=$id'</script>";
            return $editimage;
        }

        public function deleteimage($img,$imgname){
            $deleteimg = mysqli_query($this->dbcon, "DELETE FROM imagetour WHERE image_tour = '$img'");
            if($deleteimg){
                @unlink('images/tour/tour_image/'.$imgname);
            }else{
                echo "Error :" . mysqli_error($this->dbcon);
            }
            return $deleteimg;
        }

        public function deleteorder($oid, $uid){
            $deleteorder = mysqli_query($this->dbcon, "DELETE FROM `order` WHERE order_id = '$oid' AND id = '$uid' ");
            return $deleteorder;
        }

        public function edittour($id, $title, $imgpacket_name, $tname, $dstart, $dend, $tdetail, $tprice, $ttype, $tamount, $acc, $imghotel_name, $proid){
            $img1update = "";
            $img2update = "";

            if($imgpacket_name) {
                $img1update .= "img_title = '$imgpacket_name',";
            }else{
                unset($imgpacket_name);
            }

            if($imghotel_name) {
                $img2update .= "img_accommodation = '$imghotel_name',";
            }else{
                unset($imghotel_name);
            }
            
            $tour = mysqli_query($this->dbcon, "UPDATE tour SET 
            tour_title = '$title',
            {$img1update}
            tour_name = '$tname',
            date_start = '$dstart',
            date_end = '$dend',
            tour_detail = '$tdetail',
            tour_price = '$tprice',
            trip_type = '$ttype',
            amount = '$tamount',
            accommodation = '$acc',
            {$img2update}
            province_id  = '$proid'
            WHERE tour_id = '$id' ");

            echo "<script>window.location.href='company_tour.php'</script>";
            //echo "<script>alert('แก้ไขแล้ว');</script>";
            return $tour;      
        }
        
        public function reporttour($comid, $tid){
            $where = "";

            if($tid) {
                $where .= " AND tour.tour_id = '$tid' ";
                
            }else{
                unset($tid);
            }

            $report1 = mysqli_query($this->dbcon, "SELECT a1.order_id, tour.tour_title, a1.order_date, order_detail.order_amount, payment.payment_deposit FROM payment
			INNER JOIN `order` AS a1 ON payment.order_id = a1.order_id
            INNER JOIN order_detail ON a1.order_id = order_detail.order_id
            INNER JOIN tour ON order_detail.tour_id=tour.tour_id 
            INNER JOIN province ON tour.province_id=province.province_id
            WHERE tour.company_id = '$comid'
            {$where} ");
            return $report1;
        }

        public function selecttourreport($comid){
            $tour = mysqli_query($this->dbcon, " SELECT tour_id, tour_title FROM tour WHERE company_id = '$comid' ");
            return $tour;
        }

        public function chart1($comid){
            $chart = mysqli_query($this->dbcon, " SELECT order_detail.order_amount, tour.tour_title FROM order_detail
            INNER JOIN tour ON order_detail.tour_id=tour.tour_id
            WHERE tour.company_id = '$comid' ");
            return $chart;
        }

        public function chart2($comid){
        $arrayuse =array();
        $chart = mysqli_query($this->dbcon, " SELECT tour.tour_title, order_detail.order_amount FROM order_detail
        INNER JOIN tour ON order_detail.tour_id=tour.tour_id
        WHERE tour.company_id = '$comid' ");
        $data =DB::select($chart);
          foreach($data as $item){
          array_push($arrayuse,array("label"=> $item->order_amount, "y"=> $item->tour_title ));
        }	
            return $arrayuse;
        }

        public function chart3($comid, $year){
            $where = "";
            $y = date("Y");
            
            if($year) {
                $where .= " AND YEAR(a1.order_date)='$year' ";
                
            }else{
                $where .= " AND YEAR(a1.order_date)='$y' ";
                
            }
            $chart = mysqli_query($this->dbcon, " SELECT YEAR(a1.order_date) AS `year`,
            SUM(IF(MONTH(a1.order_date)=1,`payment_deposit`, NULL)) AS `1`,
            SUM(IF(MONTH(a1.order_date)=2,`payment_deposit`, NULL)) AS `2`,
            SUM(IF(MONTH(a1.order_date)=3,`payment_deposit`, NULL)) AS `3`,
            SUM(IF(MONTH(a1.order_date)=4,`payment_deposit`, NULL)) AS `4`,
            SUM(IF(MONTH(a1.order_date)=5,`payment_deposit`, NULL)) AS `5`,
            SUM(IF(MONTH(a1.order_date)=6,`payment_deposit`, NULL)) AS `6`,
            SUM(IF(MONTH(a1.order_date)=7,`payment_deposit`, NULL)) AS `7`,
            SUM(IF(MONTH(a1.order_date)=8,`payment_deposit`, NULL)) AS `8`,
            SUM(IF(MONTH(a1.order_date)=9,`payment_deposit`, NULL)) AS `9`,
            SUM(IF(MONTH(a1.order_date)=10,`payment_deposit`, NULL)) AS `10`,
            SUM(IF(MONTH(a1.order_date)=11,`payment_deposit`, NULL)) AS `11`,
            SUM(IF(MONTH(a1.order_date)=12,`payment_deposit`, NULL)) AS `12`
            FROM `payment`
            INNER JOIN `order` AS a1 
            ON payment.order_id = a1.order_id
            INNER JOIN order_detail AS a2 
            ON a2.order_id = a1.order_id
            INNER JOIN tour ON tour.tour_id = a2.tour_id
            WHERE tour.company_id = '$comid' AND a1.order_status = 3 
            {$where}");

            return $chart;
            }

        public function chart3selectyear($comid){
            $chart = mysqli_query($this->dbcon, " SELECT YEAR(a1.order_date) AS `year`
            FROM `payment`
            INNER JOIN `order` AS a1 
            ON payment.order_id = a1.order_id
            INNER JOIN order_detail AS a2 
            ON a2.order_id = a1.order_id
            INNER JOIN tour ON tour.tour_id = a2.tour_id
            WHERE tour.company_id = '$comid' AND a1.order_status = 3 
            GROUP BY `year` ");
    
            return $chart;
            }


        public function receipt($oid, $uid){
            $bill = mysqli_query($this->dbcon, " SELECT a1.order_id, tour.tour_id, tour.tour_title, tour.tour_price, tour.date_start, order_detail.order_amount, payment.payment_totalprice, payment.payment_deposit
            FROM `order` AS a1
            INNER JOIN payment ON a1.order_id = payment.order_id
            INNER JOIN order_detail ON a1.order_id = order_detail.order_id
            INNER JOIN tour ON order_detail.tour_id = tour.tour_id
            WHERE a1.order_id = '$oid' AND a1.id = '$uid' ");
            return $bill;
        }

        public function datareport1($comid,$year){
            $where = "";
            $y = date("Y");
            
            if($year) {
                $where .= " AND YEAR(a1.order_date)='$year' ";
                
            }else{
                $where .= " AND YEAR(a1.order_date)='$y' ";
                
            }
            $data = mysqli_query($this->dbcon, " SELECT tour.tour_title , SUM(a2.order_amount) AS total1,SUM( payment.payment_deposit) AS total2
            FROM `tour`
            INNER JOIN `order_detail` AS a2 ON tour.tour_id = a2.tour_id
            INNER JOIN `order` AS a1 ON a2.order_id = a1.order_id
            INNER JOIN `payment` ON a1.order_id = payment.order_id
            WHERE tour.company_id = '$comid' AND a1.order_status = 3
            {$where}
            GROUP BY tour.tour_id 
             ");
            return $data;
        }

        public function selectblog(){
            $blog = mysqli_query($this->dbcon, "SELECT * FROM blog");
            return $blog; 
        }

        public function showblog($blog_id){
            $blog = mysqli_query($this->dbcon, "SELECT * FROM blog WHERE blog_id = '$blog_id' ");
            return $blog; 
        }

        public function crudblog($comid){
            $blog = mysqli_query($this->dbcon, "SELECT * FROM blog WHERE company_id = '$comid' ");
            return $blog; 
        }

        public function clickblog($comid, $bid){
            $blog = mysqli_query($this->dbcon, "SELECT * FROM blog WHERE company_id = '$comid' AND blog_id = '$bid' ");
            return $blog; 
        }

        public function checkblog(){
            $blog = mysqli_query($this->dbcon, "SELECT b.blog_id, b.heading, b.imageblog, b.created_at, company.company_name 
            FROM blog as b
            INNER JOIN company ON b.company_id = company.company_id
            ORDER BY blog_id DESC");
            return $blog; 
        }

        public function editblog($bid, $heading, $content, $imgblog_name, $comid) {
            $img1update = "";

            if($imgblog_name) {
                $img1update .= "imageblog = '$imgblog_name',";
            }else{
                unset($imgblog_name);
            }

            $result = mysqli_query($this->dbcon, "UPDATE blog SET 
                heading = '$heading',
                {$img1update}
                content = '$content'
                WHERE blog_id = '$bid' AND company_id = '$comid'
            ");

            echo "<script>window.location.href='company_blog.php'</script>";
            return $result;
        }

        public function addblog($heading, $content, $imgblog_name, $comid){
            $addblog = mysqli_query($this->dbcon, "INSERT INTO blog(heading,imageblog,content,company_id) 
            VALUES ('$heading', '$imgblog_name', '$content', '$comid')");

            return $addblog;
        }

        
    }

?>