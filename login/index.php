<?php 
session_start();
    $_SESSION;

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
    
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        //something was posted
        $user_name=$user_data['user_name'];
        $pass_name=$_POST['pass_name'];
        $TRAIN_ID=$_POST['TRAIN_ID'];
        if($pass_name)
        {
          $gen="select * from train,coach";
          $genresult=mysqli_query($con,$gen);
          $gendata = mysqli_fetch_assoc($genresult);
          $Fare=$gendata['coach_fare'];
                  $coach_name='General';
        }

        $query="select * from passengers where user_name='$user_name' and pass_name='$pass_name' limit 1 ";
        $result=mysqli_query($con,$query);

        if($result)
        {
          if($result && mysqli_num_rows($result)>0)
          {
            $passenger_data = mysqli_fetch_assoc($result);
           
            if($passenger_data['pass_name']=== $pass_name)
            {   
                if($pass_name)
                {
                  $gen="select * from coach where TRAIN_ID='$TRAIN_ID ' AND coach_name='General' ";
                  $genresult=mysqli_query($con,$gen);
                  $gendata = mysqli_fetch_assoc($genresult);
                  $Fare=$gendata['coach_fare'];
                  $coach_name='General';
                }
                if($passenger_data['PD']=== 'Y')
                {
                  $cquery="Select * from coach where TRAIN_ID='$TRAIN_ID' AND coach_name='PD'";
                  $cresult=mysqli_query($con,$cquery);
                  $cdata = mysqli_fetch_assoc($cresult);
                  $Fare=$cdata['coach_fare'];
                  $coach_name='PD';
                }
                if($passenger_data['pdob']<'1961-01-01')
                {
                  $cquery="Select * from coach where TRAIN_ID='$TRAIN_ID' AND coach_name='SEN'";
                  $cresult=mysqli_query($con,$cquery);
                  $cdata = mysqli_fetch_assoc($cresult);
                  $Fare=$cdata['coach_fare'];
                  $coach_name='SEN';
                }
                
                if($TRAIN_ID)
                {
                  $tquery="Select * from train where TRAIN_ID='$TRAIN_ID' ";
                  $tresult=mysqli_query($con,$tquery);
                  $tdata = mysqli_fetch_assoc($tresult);
                  $SOURCE=$tdata['SOURCE'];
                  $DESTINATION=$tdata['DESTINATION'];
                  $ARRIVAL_T=$tdata['ARRIVAL_T'];
                  $DEPART_T=$tdata['DEPART_T'];
                  $total_time=$tdata['TOTAL_TIME'];
                }
                  
                        if(!empty($user_name) && !empty($pass_name) && !empty($TRAIN_ID)&& !is_numeric($user_name))
                        {
                          $pid=$passenger_data['id'];
                        $queryF="insert into books_ticket_for(user_name,pass_name,TRAIN_ID,coach_name,SOURCE,DESTINATION,Fare,arrival_time,departure_time,TOTAL_TIME,pid) values ('$user_name','$pass_name','$TRAIN_ID','$coach_name','$SOURCE','$DESTINATION','$Fare','$ARRIVAL_T','$DEPART_T','$total_time','$pid')";
                        mysqli_query($con,$queryF);
                        header("Location: login.php");
                        die;
                        
                        
                        }
                  
                 
            }
            else{?>
              <script type="text/javascript">
                alert("Passenger not registered");
                </script>
              <?php
            }
          }
        }
        else{?>
          <script type="text/javascript">
            alert("Please register the passenger");
            </script>
          <?php

        }
      }
        
      

?>



<!DOCTYPE html>
<html>
<head>
<title>BOOK</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" type="text/css" href="w3.css"/>

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.myLink {display: none}
</style>


</head>
<body  class="w3-light-grey">
    <!-- Header -->
    <header class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
      <img class="https://live.staticflickr.com/4455/37277898124_f43cff43d0_b.jpg" src="maharajaExpress.jpg" alt="London" width="1500" height="700">
      <div class="w3-display-middle" style="width:75%">
        <div class="w3-bar w3-black">
          <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Book');"><i class="fa fa-train w3-margin-right"></i>Book</button>
        </div>
      

        <!-- Tabs -->
        <div id="Book" class="w3-container w3-white w3-padding-16 myLink">
          <div class="w3-container">
            <h3>HEllo <?php echo $user_data['user_name'];?> </h3>
            <p><button class="w3-button w3-dark-grey"><a href="Register.php">Register passenger</a></button>
            <button class="w3-button w3-dark-grey"><a href="view.php">Check Bookingsand Status</a></button></p>
          </div>

          <button onclick="myFunction('TrainTable')" class="w3-btn w3-block w3-black w3-left-align">Click here for Train Details</button>
          <div id="TrainTable" class="w3-container w3-hide">
            <table class="w3-table-all">
              <thead>
                <tr class="w3-light-grey w3-hover-red">
                  <th>Train_id</th>
                  <th>Train_name</th>
                  <th>From</th>
                  <th>total time</th>
                  <th>to</th>
                  <th>Arrival</th>
                  <th>Departure</th>
                  <th>Fare</th>
                  <th>PD</th>
                  <th>SEN</th>
                </tr>
              </thead>
              <tr class="w3-hover-red">
                <td>T-11302</td>
                <td>UDYAN_EXPRESS</td>
                <td>KSR_BENGALURU</td>
                <td>20:35</td>
                <td>MUMBAI_CENTRAL_MMCT</td>
                <td>20:40</td>
                <td>20:15</td>
                <td>530</td>
                <td>520</td>
                <td>520</td>

                <!--  <td><button class="w3-button w3-block w3-dark-grey">BOOK</button></td>-->
              </tr>
              <tr class="w3-hover-red">
                <td>T-12163</td>
                <td>LTI_MAS_EXPRESS</td>
                <td>MUMBAI_CENTRAL_MMCTC</td>
                <td>21:35</td>
                <td>CHENNAI_EGMORE</td>
                <td>18:45</td>
                <td>16:20</td>
                <td>590</td>
                <td>590</td>
                <td>590</td>

              </tr>
              <tr class="w3-hover-red">
                <td>T-12967</td>
                <td>MAS_JAIPUR_EXPRESS</td>
                <td>MUMBAI_CENTRAL_MMCTC</td>
                <td>37:05</td>
                <td>JAIPUR_JP</td>
                <td>17:40</td>
                <td>6:45</td>
                <td>1985</td>
                <td>1975</td>
                <td>1975</td>
              </tr>
              <tr class="w3-hover-red">
                <td>T-12985</td>
                <td>DOUBLE_DECKER_EXPRESS</td>
                <td>JAIPUR_JP</td>
                <td>04:25</td>
                <td>NEW_DELHI_NDLS</td>
                <td>06:00</td>
                <td>10:25</td>
                <td>250</td>
                <td>240</td>
                <td>240</td>
              </tr>
              <tr class="w3-hover-red">
                <td>T-22691</td>
                <td>RAJDHANI_EXPRESS</td>   
                <td>KSR_BENGALRU</td>
                <td>33:30</td>
                <td>NEW_DELHI_NDLS</td>
                <td>20:00</td>
                <td>05:30</td>
                <td>860</td>
                <td>850</td>
                <td>850</td>
              </tr>
            </table>
          </div>
           

       


          <div class="w3-panel w3-card">
            <h3><u>BOOK here</u></h3>
            <form  method="POST">
            <div class="w3-row-padding" style="margin:0 -16px;">
              <div class="w3-half">
                <label>PASSENGER Name</label>
                <input id="text" class="w3-input w3-border" name="pass_name" type="text" placeholder="PASS Name">
              </div>
              <div class="w3-half">
                <label>TRAIN</label>
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
              <button class="w3-button w3-dark-grey" id="button" type="submit" name="Signup">BOOK</button>
            </div>
            <br>
            <br>
            <!--<p>If you are not logged out automatically after booking then please register the passenger</p>-->
          </div>
          <button class="w3-button w3-block w3-dark-grey"><a href="logout.php">Log Out</a></button>
        </div>
      </div>    
      
      
      


    </header>

    <script>
      // Tabs
      function openLink(evt, linkName) 
      {
        var i, x, tablinks;
        x = document.getElementsByClassName("myLink");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
        }
        document.getElementById(linkName).style.display = "block";
        evt.currentTarget.className += " w3-red";
      }

      // Click on the first tablink on load
      document.getElementsByClassName("tablink")[0].click();
      </script>
      <script>
      function myFunction(id) 
      {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
        } else { 
          x.className = x.className.replace(" w3-show", "");
        }
      }
    </script>

</body>
</html>

<!---
<!DOCUMENT html>
<html>
    <head>
        <title>MY WEBSITE</title>
    </head>
    <body>
        <a href="logout.php">Logout</a>
        <h1>This is the index page</h1>
        <br>
        HEllo, <?php //echo $user_data['user_name']; ?>
    </body>
</html> */ -->