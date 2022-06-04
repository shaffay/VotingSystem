<?php

include('../../db.php');

if(isset($_POST['partyreg'])){


    $PartyName = $_POST['PartyName'];
    $PartyChireman = $_POST['PartyChireman'];
    $PartyPriesdant = $_POST['PartyPriesdant'];
    $PartySize = $_POST['PartySize'];
   

    $img = $_FILES['PartyLogo']['name'];
    $img_tmp = $_FILES['PartyLogo']['tmp_name'];
    $targetfile= "../../uploads/$img";
    move_uploaded_file($img_tmp,$targetfile);



    $insert= $con->query("INSERT INTO `parties`(`PartyName`, `PartyLogo`, `PartyChireman`, `PartyPriesdant`, `PartySize`) VALUES ('$PartyName','$img','$PartyChireman','$PartyPriesdant','$PartySize')");

if($insert){

    header("location:../../?parties_reg=true");



}
    // echo $PartyName;


}


?>