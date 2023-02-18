<!DOCTYPE html>
<html>
<head>
<title>PNR</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.myLink {display: none}
</style

</head>
<body class="w3-light-grey">



<!-- Header -->
<header class="w3-display-container w3-content w3-hide-small"  style="max-width:1500px">
  <img class="https://live.staticflickr.com/4455/37277898124_f43cff43d0_b.jpg" src="https://globalvoices.org/wp-content/uploads/2015/10/8715924-800x450.jpg" alt="London" width="1500" height="700">
  <div class="w3-display-middle">
    <div class="w3-bar w3-black">
      <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Hotel');"><i class="fa fa-file w3-margin-right"></i>PNR Status</button>
    </div>
    
    <div  class="w3-container w3-white w3-padding-16 ">
    
      <h3>Enter the pass_name for your booking below to get the current status.</h3>
      <p><span class="w3-tag w3-deep-orange">Book Train OR Go Back?</span><a href="login.php">CLICK HERE</a></p>
      <h3>BOOKINGS</h3>
      
        <table >
          <thead>
            <tr class="w3-light-grey w3-hover-red">
              <th>TICKET ID</th>
              <th>TRAIN ID</th>
              <th>USER NAME</th>
              <th>PASSENGER</th>
              <th>SOURCE</th>
              <th>DESTINATION</th>
              <th>DEPATURE TIME</th>
              <th>COACH</th>
             
              
            
            </tr>
          </thead>
          <form action="" method="GET">
            <div class="row" >
              <div class="col-md-8">
                <input class="w3-input w3-border" type="text" name="pass_name" placeholder="pass_name">
              </div>
              <br>
              <div class="col-md-4">
                <button class="w3-button w3-dark-grey" id="button" type="submit" name="Signup">CHECK</button>
                </div> 
          </form>
          <br>
          <div class="row">
            <div class="col-md-12">
              <?php 
                include("connection.php");
                if(isset($_GET['pass_name']))
                {
                  $pass_name = $_GET['pass_name'];
                  $query = "SELECT * FROM books_ticket_for WHERE pass_name='$pass_name' ";
                  $query_run = mysqli_query($con, $query);
                  if(mysqli_num_rows($query_run) > 0)
                  {
                    foreach($query_run as $row)
                    {
                      ?><tr class="w3-hover-red">
                          <td>
                            <div class="form-group mb-3" >
                              <input type="text" value="<?= $row['ticket_id']; ?>" class="form-control">
                            </div>
                          </td>
                          <td>
                            <div class="form-group mb-3">
                              <input type="text" value="<?= $row['TRAIN_ID']; ?>" class="form-control">
                            </div>
                          </td>
                          <td>
                            <div class="form-group mb-3">
                              <input type="text" value="<?= $row['user_name']; ?>" class="form-control">
                            </div>
                          </td>
                          <td>
                            <div class="form-group mb-3">
                              <input type="text" value="<?= $row['pass_name']; ?>" class="form-control">
                            </div>
                          </td>
                          <td>
                            <div class="form-group mb-3">
                              <input type="text" value="<?= $row['SOURCE']; ?>" class="form-control">
                            </div>
                          </td>
                          <td>
                            <div class="form-group mb-3">
                              <input type="text" value="<?= $row['DESTINATION']; ?>" class="form-control">
                            </div>
                          </td>
                          <td>
                            <div class="form-group mb-3">
                                <input type="text" value="<?= $row['departure_time']; ?>" class="form-control">
                            </div>
                          </td>
                          <td>
                            <div class="form-group mb-3">
                              <input type="text" value="<?= $row['coach_name']; ?>" class="form-control">
                            </div>
                          </td>
                         
                          
                        </tr>
                      <?php
                    }
                  }
                  else
                  {
                    echo "TICKET NOT BOOKED";
                  }
                }
                      ?>
              </div></div>
            </div>
          </div>
        </table>
      
    </div>
  </div>
  
</header>




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
