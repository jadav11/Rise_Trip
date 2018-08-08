<?php 

session_start();

include ('dbconnect.php');

//$dj = $_SESSION['display'];

@$tname = $_POST['t_name'];
@$timage = $_POST['t_image'];
@$sd = $_POST['startdate'];
@$ed = $_POST['enddate'];


$response = array();
$dj = $_SESSION['display']['ID'];
$query = "INSERT INTO trip_list (t_name,t_image,t_start_date,t_end_date,t_creator_id) 
  			  VALUES('$tname','$timage', '$sd', '$ed','$dj')";
/* $query= 'SELECT userdata.u_email,userdata.u_id
  FROM trip
  INNER JOIN userdata  ON trip.t_creatorId = userdata.u_id'; */
/* $result =  mysqli_query($conn, $query);
  if($result == 1)

  {
  header("location:loginform.html");

  }
  else
  {
  echo "connection not valid";
  } */

$s = mysqli_query($conn, $query);

if ($s) {
    
     /*mysqli_close($conn);
      echo mysqli_error($conn);
      $response['status'] = 1;
      $response['message'] = "TRIP Successful Created";
      $response['message'] = "go to login";
      echo json_encode($response);
      header("location:./TripManagementSystem.php"); */
} else {
    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo mysqli_error($conn);
    $response['status'] = 0;
    $response['message'] = "Registartion Not successful";
    echo json_encode($response);
}



if (isset($_POST['member'])) {
    $last_id = mysqli_insert_id($conn);
    // echo "New record created successfully. Last inserted ID is: " . $last_id;
    foreach ($_POST['member'] as $select) {
            
        $member = "INSERT INTO trip_traveller(t_id,u_id) VALUES('$last_id','$select')";
        echo $member;
        
        if (mysqli_query($conn, $member)) {
            echo "added" . $select;
            //header("location:./TripManagementSystem.php");
        } else {
            mysqli_error($conn);
            echo"Travellers not added";
            exit();
        }
    }
    @$d = $_SESSION['display']['ID'];
    $members = "INSERT INTO trip_traveller(t_id,u_name) 
  			  VALUES('$last_id','$d')";
    if (mysqli_query($conn, $members)) {
        echo "added" . $select;
    }
    if (result) {
        header("location:./TripManagmentSystem.php");
    } else {
        echo "error of travellers";
        exit();
    }
}


    
