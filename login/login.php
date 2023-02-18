<?php 
session_start();

    include("connection.php");
    include("functions.php");
    
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        //something was posted
        $user_name=$_POST['user_name'];
        $password=$_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            //read from database
            $user_id=random_num(10);
            $query="select * from users where user_name='$user_name' limit 1";

            $result=mysqli_query($con,$query);

            if($result)
            {
                if($result && mysqli_num_rows($result)>0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password']=== $password)
                    {
                        $_SESSION['user_id']=$user_data['user_id'];
                        header("Location: index.php");
                        die;
                    }
                }
            }
            echo "Wrong username or password";
            
        }
        else{
            echo "Please enter a correct information";
        }

    }


?>



<!DOCTYPE html>
<html>
<head>

    <title>RAILWAY RESERVATION SYSTEM</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="w3.css"/>
    <style>
        body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
        .myLink {display: none}
    </style>

    <script type="text/javascript">
        function preventBack() {window.history.forward();}
        setTimeout("preventBack()",0);
        window.onunload = function () {null};
    </script>

</head>
<body class="w3-light-grey">
    <header class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
      <div class="w3-container w3-red w3-center w3-allerta">
        <p class="w3-xlarge">RAILWAY RESERVATION</p>
      </div>
      <img class="https://live.staticflickr.com/4455/37277898124_f43cff43d0_b.jpg" src="maharajaExpress.jpg" alt="London" width="1500" height="700">
      <div class="w3-display-middle" style="width:55%">
        <div class="w3-bar w3-black">
          
          <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Login');"><i class="fa fa-user w3-margin-right"></i>Login</button>
          <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Train');"><i class="fa fa-train w3-margin-right"></i>Train</button>
          <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'PNR');"><i class="fa fa-file w3-margin-right"></i>PNR Status</button>
          
        </div>
        <!-- Tabs -->
        <div id="Train" class="w3-container w3-white w3-padding-16 myLink">
        <div style="overflow-x:auto;">
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
        </div>

        <div id="Login" class="w3-container w3-white w3-padding-16 myLink">
          <form method="post">
            <h3>WELCOME BACK!</h3>
            <div class="w3-row-padding" style="margin:0 -16px;">
              <div class="w3-half">
                <label>USER_ID</label>
                <input id="text" class="w3-input w3-border" name="user_name" type="text" placeholder="your user id">
              </div>
              <div class="w3-half">
                <label>PASSWORD</label>
                <input class="w3-input w3-border" type="password" placeholder="password" id="text" name="password">
              </div>
            </div>
            <br>
	          <button class="w3-button w3-dark-grey" id="button" type="submit" name="Login">Login</button>
	          <p>Don't have an account? <a href="signup.php">Sign up</a>  </p>
        </div>
        
        <div id="PNR" class="w3-container w3-white w3-padding-16 myLink">
              <h3>Enter your pass_name and check your booking</h3>
            <p><span class="w3-tag w3-deep-orange">LOGIN</span> and book your train</p>
            <h3>BOOKINGS</h3>
            
            
            <div class="w3-container">
              <div style="overflow-x:auto;">
                <table class="w3-table-all w3-hoverable">
                  <tr class="center" class="w3-padding-small" class="w3-light-grey w3-hover-red">
                    <th>TICKET ID</th>
                    <th>TRAIN ID</th>
                    <th>USER NAME</th>
                    <th>PASSENGER NAME</th>
                    <th>SOURCE</th>
                    <th>DESTINATION</th>
                    <th>COACH NAME</th>
                    <th>FARE</th>
                    <th>ARRIVAL TIME</th>
                    <th>DEPARTURE TIME</th>
                    <th>TOTAL TIME</th>
                  </tr>
                  <form action="" method="GET">
                    <input class="w3-input w3-border" type="text" name="pass_name" placeholder="pass_name">
                    <br>
                    <button class="w3-button w3-dark-grey" id="button" type="submit" name="CHECK_btn">CHECK</button>
                  </form>
                  <br><br>
                  <?php
                    if(isset($_POST['CHECK_btn']))
                    {
                      $pass_name = $_POST['pass_name'];
                      $query = "SELECT * FROM books_ticket_for WHERE pass_name='$pass_name' ";
                      $query_run = mysqli_query($con, $query);
                      $yresult=mysqli_num_rows($query_run);
                      
                      if($yresult)
                      {
                        while($yrow=mysqli_fetch_array($query_run))
                        {
                  ?>
                      <tr>
                        <td>
                          <?php echo $yrow['ticket_id']?>
                        </td>
                        <td>
                          <?php echo $yrow['TRAIN_ID']?>
                        </td>
                        <td>
                          <?php echo $yrow['user_name']?>
                        </td>
                        <td>
                          <?php echo $yrow['pass_name']?>
                        </td>
                        <td>
                          <?php echo $yrow['SOURCE']?>
                        </td>
                        <td>
                          <?php echo $yrow['DESTINATION']?>
                        </td>
                        <td>
                          <?php echo $yrow['coach_name']?>
                        </td>
                        <td>
                          <?php echo $yrow['Fare']?>
                        </td>
                        <td>
                          <?php echo $yrow['arrival_time']?>
                        </td>
                        <td>
                          <?php echo $yrow['departure_time']?>
                        </td>
                        <td>
                          <?php echo $yrow['total_time']?>
                        </td> 
                      </tr>
                  <?php
                        }
                      }
                      else
                      {
                        ?><tr>
                            <td>no record found</td>
                          </tr>
                        <?php
                      }
                    }
                        ?>
                </table>   
              </div>  
            </div> 













    </header>
    <br>
    <div class="w3-container w3-red">
        <h1>Places to visit</h1>
    </div>
    <div class="w3-row-padding w3-theme">
      <div class="w3-third w3-section">
        <div class="w3-card-4">
          <img src="Bengaluru.jpg" style="width:100%">
          <div class="w3-container w3-white">
            <h4>BENGALURU</h4>
            <p>Bangalore, officially Bengaluru, is the capital and largest city of the Indian state of Karnataka. It has a population of more than 8 million and a metropolitan population of around 11 million, making it the third most populous city and fifth most populous urban agglomeration in India, as well as the largest city in South India, and the 27th largest city in the world.</p>
          </div>
        </div>
      </div>
      <div class="w3-third w3-section">
        <div class="w3-card-4">
          <img src="maharajaExpress.jpg" style="width:100%">
          <div class="w3-container w3-white">
            <h4><div class="w3-container w3-red"><h1>OUR RAILWAY</h1></div></h4>
            <p>Our railway reservation system provides reservation to 5 most important cities of of India.
                A super fast express containing 3 different coaches which includes GENERAL coach,PHYSICAL DISABILITY coach, and SENIOR CITIZEN coach.
            </p>
          </div>
        </div>
      </div>
      <div class="w3-third w3-section">
        <div class="w3-card-4">
          <img src="NewDelhi.jpg" style="width:100%">
          <div class="w3-container w3-white">
            <h4>NEW DELHI</h4>
            <p>New Delhi is the capital of India and a part of the National Capital Territory of Delhi . New Delhi is the seat of all three branches of the government of India, hosting the Rashtrapati Bhavan, Parliament House, and the Supreme Court of India.
          </div>
        </div>
      </div>
    </div>
    <div class="w3-row-padding w3-theme">
      <div class="w3-third w3-section">
        <div class="w3-card-4">
          <img src="Jaipur.jpg" style="width:100%">
          <div class="w3-container w3-white">
            <h4>JAIPUR</h4>
            <p>Jaipur, formerly Jeypore, is the capital and largest city of the Indian state of Rajasthan. As of 2011, the city had a population of 3.1 million, making it the tenth most populous city in the country. </p>
          </div>
        </div>
      </div>
      <div class="w3-third w3-section">
        <div class="w3-card-4">
          <img src="Mumbai.jpg" style="width:100%">
          <div class="w3-container w3-white">
            <h4>MUMBAI</h4>
            <p>Mumbai is the capital city of the Indian state of Maharashtra and the de facto financial centre of India.
          </div>
        </div>
      </div>
      <div class="w3-third w3-section">
        <div class="w3-card-4">
          <img src="Chennai.jpg" style="width:100%">
          <div class="w3-container w3-white">
            <h4>CHENNAI</h4>
            <p>Chennai, also known as Madras, is the capital city of the Indian state of Tamil Nadu. The state's largest city in area and population as well, Chennai is located on the Coromandel Coast of the Bay of Bengal, and is the most prominent cultural, economic and educational centre of South India.</p>
          </div>
        </div>
        <br>
        <br>
        <br>
      </div>
    </div> 
    <div class="w3-container w3-red"><h5>---</h5></div>
    
    <!-- End page content -->
    <script>
    // Tabs
    function openLink(evt, linkName) {
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
  </body>
</html>

