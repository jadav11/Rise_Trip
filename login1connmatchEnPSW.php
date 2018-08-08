
<?php include 'dbconnect.php';
    session_start();
    

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $response = array();
    
    $query = "select * from  trip_user where u_email = '$email' and u_password = '$password'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_num_rows($result);
    
    
    //$count = mysqli_num_fields($result);
    if($user==1)
    {
        while($user = mysqli_fetch_array($result))
            {
            $dj = array ('ID' => $user['u_id'],'Name' => $user['u_name']);
        }
        $_SESSION['display']=$dj;
       $response['status'] = 1;
       /* $response['message'] = "Registartion Successful";*/
       header("location: ./TripManagmentSystem.php");
       exit();
    }
    
    else {

        header("location: ./loginform.html?flag=false");
    }
    
}