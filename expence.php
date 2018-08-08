<?php

include ('dbconnect.php');
session_start();
$dj = $_SESSION['display'];
if(isset($_SESSION))
{
    
    @$ecat = $_POST['e_category'];
    @$eamt = $_POST['e_amt'];
    @$expence_name = $_POST['e_name'];
    @$edate = $_POST['e_date'];
    @$tripid = mysqli_real_escape_string($conn,trim($_GET['t_id']));
    @$userid = $_SESSION['display']['ID'];



$response = array();
//$dj = $_SESSION['display'];

$query = "INSERT INTO exptrip(etripid, euserid, ename,eamount,ecategory,edate) 
        VALUES('$tripid', '$userid', '$expence_name','$eamt','$edate', '$ecat')";


echo $query;
    $result = mysqli_query($conn, $query);
    echo $result;
    if ($result ==1) {
        header("Location: ./TripManagmentSystem.php?tripid=$t_id&status=SUCCESS");
    } else {
        echo mysqli_error($conn);
        exit();
        echo "error";
    }
}
else{
    header("Location: ./login1connmatchEnPSW.php?flag=loginfirst");
}

    
