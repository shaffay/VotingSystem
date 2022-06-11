<?php

include('../../db.php');

if(isset($_POST['seatreg'])){


    $seat = $_POST['seat'];
    $seat_type = $_POST['seat_type'];
    $province = $_POST['province'];
    $city = $_POST['city'];
   

    // $img = $_FILES['PartyLogo']['name'];
    // $img_tmp = $_FILES['PartyLogo']['tmp_name'];
    // $targetfile= "../../uploads/$img";
    // move_uploaded_file($img_tmp,$targetfile);



    $insert= $con->query("INSERT INTO `areas`(`seat`, `seat_type`, `province`, `city`) VALUES ('$seat','$seat_type','$province','$city')");

if($insert){

    header("location:../../?voting_area=true");



}
    // echo $PartyName;


}


?>