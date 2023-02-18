<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);
  $user_name=$user_data['user_name'];
  $ticket_id=$_GET['ticket_id'];
    $query="SELECT *FROM books_ticket_for where ticket_id='$ticket_id' " ;
    $data=mysqli_query($con,$query);
    $result=mysqli_num_rows($data);
    $row=mysqli_fetch_array($data);
      
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="w3.css"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<header class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
      <img class="https://live.staticflickr.com/4455/37277898124_f43cff43d0_b.jpg" src="maharajaExpress.jpg" alt="London" width="1500" height="700">
      <div class="w3-display-middle" style="width:65%">
        <div class="w3-bar w3-black">
          <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Book');"><i class="fa fa-train w3-margin-right"></i>UPDATE</button>
        </div>

        <!-- Tabs -->
        <div id="Book" class="w3-container w3-white w3-padding-16 myLink">
          <div class="w3-container">
            <h3>HEllo <?php echo $user_data['user_name'];?> </h3>
           
            
            
          </div>
<div class="w3-panel w3-card">
            <h3><u>Update here</u></h3>
            <form  method="POST">
            <div class="w3-row-padding" style="margin:0 -16px;">
              <div class="w3-half">
                <label>PASSENGER Name</label>
                <input value="<?php echo $row['pass_name']?>"  class="w3-input w3-border" name="pass_name" type="text" >
              </div>
              <div class="w3-half">
                <label>TRAIN ID</label>
                <select name="TRAIN_ID" class="w3-input w3-border" class="form-control">
                  
                  <option value="T-11302">Bengaluru-Mumbai</option>
                  <option value="T-12163">Mumbai-Chennai</option>
                  <option value="T-12967">Mumbai-Jaipur</option>
                  <option value="T-12985">Jaipur-NewDelhi</option>
                  <option value="T-22691">Bengaluru-NewDelhi</option>
                </select>
                <br>
              </div> 
                       
              <br>
            </div>
            <br>
            <div class="w3-half">
              <button class="w3-button w3-dark-grey" id="button" type="submit" name="update_btn">UPDATE</button>
            </div>
            <br><br>
          </div>
          <?php
          if(isset($_POST['update_btn']))
          {
            $TRAIN_ID=$_POST['TRAIN_ID'];
            if($TRAIN_ID)
            {
              $tquery="select * from train where TRAIN_ID='$TRAIN_ID' ";
              
              //$Fare=$gendata['coach_fare'];                      $tquery="Select * from train where TRAIN_ID='$TRAIN_ID' ";
              $tresult=mysqli_query($con,$tquery);
              $tdata = mysqli_fetch_assoc($tresult);
              $SOURCE=$tdata['SOURCE'];
              $DESTINATION=$tdata['DESTINATION'];
              $ARRIVAL_T=$tdata['ARRIVAL_T'];
              $DEPART_T=$tdata['DEPART_T'];
              $total_time=$tdata['TOTAL_TIME'];
              $cquery="select * from books_ticket_for   where ticket_id='$ticket_id' ";
              $cresult=mysqli_query($con,$cquery);
              $cdata=mysqli_fetch_assoc($cresult);
              $trycoach_name=$cdata['coach_name'];
              $try="select * from coach where coach_name='$trycoach_name' AND TRAIN_ID='$TRAIN_ID' ";
              $try_result=mysqli_query($con,$try);
              $try_data=mysqli_fetch_assoc($try_result);
              $Fare=$try_data['coach_fare'];
            }

            $update="UPDATE books_ticket_for SET Fare='$Fare',TRAIN_ID='$TRAIN_ID' ,SOURCE='$SOURCE' ,DESTINATION='$DESTINATION', arrival_time='$ARRIVAL_T',departure_time='$DEPART_T',total_time='$total_time' where ticket_id='$ticket_id'";
            $data=mysqli_query($con,$update);
            if($data)
            {
              ?><script type="text/javascript">
                alert("data updated successfully");
                </script>
                <?php
            }
            else
            {
              ?><script type="text/javascript">
                alert("Please try again");
                </script>
                <?php
            }
          }
          ?>

          <button class="w3-button w3-block w3-dark-grey"><a href="logout.php">Log Out</a></button>
        </div>