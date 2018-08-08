<?php include ('dbconnect.php');
@$name = $_POST['name'];
@$email = $_POST['email'];
@$mobile = $_POST['mobile'];
@$password = $_POST['password'];
$active = 1;

$response = array();

$query = "INSERT INTO trip_user (u_name,u_email,u_mobile,u_password,u_status) 
  			  VALUES('$name', '$email', '$mobile','$password','$active')";

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
    echo mysqli_error($conn); 
    $response['status'] = 1;
    $response['message'] = "Registartion Successful";
    $response['message'] = "go to login";
    echo json_encode($response);
    header("Location:loginform.html");
    echo header;
    exit();
} else {
    echo mysqli_error($conn);
    $response['status'] = 0;
    $response['message'] = "Registartion Not successful";
    echo json_encode($response);
}

