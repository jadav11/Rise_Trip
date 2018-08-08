<?php
    session_start();
    include 'dbconnect.php';
?>
<!DOCTYPE html>
<html>

    <body>
    <center>
        <form action='tripcreation.php'method='post'>
            <h1> TRIP CREATION </h1>
            <p>Please fill in this form to create a trip.</p>
            <hr>

            <label name="t_name"><b> TRIPNAME </b></label>
            <input type="text" class="form-control" placeholder="TRIPNAME" name="t_name"required /> <br><br>
            <label name ='t_image'> <b> TRIP IMAGE </b> </label>
            <input type="file"  name="t_image"/> <br><br>
            <label name="startdate"><b> STARTDATE </b></label>
            <input type="date" placeholder="date" name="startdate"required /> <br><br>
            <label name="enddate"><b> ENDDATE </b></label>
            <input type="date" placeholder="date" name="enddate"  required /> <br><br>
            <select id ="member" name="member[]" multiple class="form control">
                <?php
                       include('dbconnect.php');
          $query = "SELECT u_id,u_email FROM trip_user";
            // @var $mysqli_query type 
            $result = mysqli_query($conn,$query);
            
          //echo"<select multiple name='u_name' >";
            while ($row = mysqli_fetch_array($result)) {
               ?>
                
                    
                <option value="<?php echo $row['u_id']; ?>"> <?php echo $row['u_email'];  ?> </option>
            <?php    
            }
            ?>
            
            
        
            </select>
            <br><br><br>
         
            <input type="submit" href="ourtrip.php" value="Submit">

        </form> 
    </center>
</body>
</html>