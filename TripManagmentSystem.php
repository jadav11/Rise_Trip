<?php
session_start();
$dj = $_SESSION['display'] ? $_SESSION['display'] : array();
?>
<!DOCTYPE html>
<html>


    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">       

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>       

        <link rel="stylesheet" type="text/css" href="display.css">
    <CENTER><title>TRIP MANAGMANT SYSTEM</title></center>
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .bg {
            /* The image used */
            background-image: url('img/download.jfif');

            /* Full height */
            height: 100%; 

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .navbar {
            overflow: hidden;
            background-color: activeborder;
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 18px;    
            border: none;
            outline: none;
            color: purple;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .navbar a:hover, .dropdown:hover .dropbtn {
            background-color: burlywood;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #ddd;
            min-width: 160px;
            box-shadow: 0px 8px 16px 15px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
        .left
        {
            alignment-adjust: right;
        }
    </style>
</head>


<center>  <b> <h1> TRIP MANAGEMENT SYSTEM </h1> </b>
    <h1>Journey Begins</h1>


</center>


<div class="navbar" style="background: #ffcc00" >

    <div class="dropdown">
        <button class="dropbtn"> HOME
            <div class="dropdown-content">
                <i class="fa fa-caret-down"></i>
                <a href="registerform.php">ADD USER</a>

        </button>

    </div>

    <a href="tripcreationform.php"> ADD TRIP </a>
    <a href="ourtrip.php"> OUR TRIP </a>
    <a href="addtrip.php">  TRAVELER</a>
    <a href="expenceform.php" > EXPENES </a>


    <a href="loginform.html"  > LOG OUT </a>
    <h3 align ="right"> <?php
        echo $dj['Name'];
        ?>

</div>  
</div> 
</div>
<div class="container">

    <div class="col-md-12">

        <div class="">



            <?php
            include('dbconnect.php');

            $query = "select * from trip_list";



            $s = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($s)) {
                ?>
                <?php
                echo "<div class='row col-md-4'>";

                $image = $row['t_image'];

                echo "<img src=\"img/$image\" alt=\"Nature\" width=\"300px\" height=\"180px\">";



                echo "<br />name:" . $row['t_name'];
                ?> <br>

                <?php echo "start date:" . $row['t_start_date']; ?> <br>

                <?php echo "end date:" . $row['t_end_date']; ?> <br>

                <?php
                $trip_id = $row['t_id'];
                echo "user id:" . $row['t_creator_id'] . "<br />";
                echo "<a href='tripcreationform.php?t_id=$trip_id'><button type='button'>Edit</button></a>";
                ?>
                <?php
                echo "</div>";
            }
            ?>

        </div>       

    </div>




</body>
</html>
