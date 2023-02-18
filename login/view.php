<?php 
session_start();

include("connection.php");
include("functions.php");
if(isset($_GET['ticket_id']))
{
  $ticket_id=$_GET['ticket_id'];
  $delete=mysqli_query($con,"delete from books_ticket_for where ticket_id='$ticket_id' ");
}
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $delete=mysqli_query($con,"delete from passengers where id='$id' ");
}

?>
<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="w3.css"/>
</head>
<body class="w3-light-grey">
<div class="w3-container w3-red w3-center w3-allerta">
        <p class="w3-xlarge">RAILWAY RESERVATION</p>
      </div>
  
      <div class="w3-container w3-dark-grey w3-center w3-allerta">
        <p class="w3-xlarge">Hello <?php $user_data = check_login($con);
      echo $user_data['user_name'];?> </p><p>UPDATE/DELETE your bookings</p>
      </div>
<br>
 
<div class="w3-container">
    
      <table class="w3-table-all w3-hoverable">
      <tr class="center" class="w3-padding-small" class="w3-light-grey w3-hover-red">
          <th>TICKET ID</th>
          <th>TDATE</th>
          <th>USER NAME</th>
          <th>PASSENGER NAME</th>
          <th>TRAIN ID</th>
          <th>SOURCE</th>
          <th>DESTINATION</th>
          <th>COACH NAME</th>
          <th>FARE</th>
          <th>ARRIVAL TIME</th>
          <th>DEPARTURE TIME</th>
          <th colsapn="2">Actions</th>
          <th colsapn="2">Actions</th>
        </tr>
        <?php
      //where user_name='$user_name'
      $user_data = check_login($con);
      $user_name=$user_data['user_name'];
        $query="SELECT *FROM books_ticket_for where user_name='$user_name' " ;
        $data=mysqli_query($con,$query);
        $result=mysqli_num_rows($data);
        if($result)
        {
          while($row=mysqli_fetch_array($data))
          {
            ?>
            <tr>
              <td><?php echo $row['ticket_id']?></td>
              <td><?php echo $row['tdate']?></td>
              <td><?php echo $row['user_name']?></td>
              <td><?php echo $row['pass_name']?></td>
              <td><?php echo $row['TRAIN_ID']?></td>
              <td><?php echo $row['SOURCE']?></td>
              <td><?php echo $row['DESTINATION']?></td>
              <td><?php echo $row['coach_name']?></td>
              <td><?php echo $row['Fare']?></td>
              <td><?php echo $row['arrival_time']?></td>
              <td><?php echo $row['departure_time']?></td>
              <td><button class="w3-button w3-red"><a href="update.php?ticket_id=<?php echo 
                  $row['ticket_id']; ?>">EDIT</a></button></td>
              <td><button class="w3-button w3-red"><a onclick="return confirm('Are you sure? Do you want to cancel the ticket?')" 
                  href="view.php?ticket_id=<?php echo $row['ticket_id'] ?>">CANCEL</a></button></td>

                  
            </tr>

            <?php
          }
        }
        else{
          ?><tr>
            <td>no record found</td>
        </tr>
        <?php
          
        }
      ?>
        
      </table>
      
      <div class="w3-panel w3-dark-grey  w3-center w3-card-4">
        <p>---------------------------------------------------------------------------------------------TOTAL AMOUNT=Rs.<?php
                        $totalq="select sum(Fare),user_name from books_ticket_for where user_name='$user_name' group by(user_name)";
                        $totres=mysqli_query($con,$totalq);
                        $resulttot=mysqli_num_rows($totres);
                        $AMO=mysqli_fetch_array($totres);
                        if($resulttot)
                        {
                        echo $AMO['sum(Fare)'];
                        }
                      ?> /-      
                      <td>
                        <BUTTON ONCLICK="window.print();" class="btn btn-primary" id="print-btn">PRINT</button>
                      </td> </p>
      </div>



<div class="w3-container w3-red w3-center w3-allerta">
        <p class="w3-large">Passengers registered</p>
      </div>
<br>
      <table class="w3-table-all w3-hoverable">
      <tr class="center" class="w3-padding-small" class="w3-light-grey w3-hover-red">
          <th>PASSENGER ID</th>
          <th>PASSNAME</th>
          <th>FIRST NAME</th>
          <th>LAST NAME</th>
          <th>DATE OF BIRTH</th>
          <th>EMAIL-ID</th>
          <th>ADDRESS</th>
          <th>PHONE</th>
          <th>GENDER</th>
          <th>PHYSICAL DISABILITY</th>
          <th>REMOVE</th>
        </tr>
        <?php
      //where user_name='$user_name'
     
      $user_name=$user_data['user_name'];
        $queryshow="SELECT *FROM passengers where user_name='$user_name' " ;
        $datashow=mysqli_query($con,$queryshow);
        $resultshow=mysqli_num_rows($datashow);
        if($resultshow)
        {
          while($rowshow=mysqli_fetch_array($datashow))
          {
            ?>
            <tr>
              <td><?php echo $rowshow['id']?></td>
              <td><?php echo $rowshow['pass_name']?></td>
              <td><?php echo $rowshow['pfirst_name']?></td>
              <td><?php echo $rowshow['plast_name']?></td>
              <td><?php echo $rowshow['pdob']?></td>
              <td><?php echo $rowshow['pemail']?></td>
              <td><?php echo $rowshow['paddress']?></td>
              <td><?php echo $rowshow['pass_phone']?></td>
              <td><?php echo $rowshow['gender']?></td>
              <td><?php echo $rowshow['PD']?></td>
              
              
              <td><button class="w3-button w3-red"><a onclick="return confirm('Are you sure? Do you want to remove the passenger?')" 
                  href="view.php?id=<?php echo $rowshow['id'] ?>">REMOVE</a></button></td>

                  
            </tr>

            <?php
          }
        }
        else{
          ?><tr>
            <td>No passengers registered</td>
        </tr>
        <?php
          
        }
      ?>
        
      </table>
      <br>


      <div class="w3-container w3-red w3-center w3-allerta">
        <p class="w3-large">Total seats booked</p>
      </div>
      
          
      
          <table class="w3-table-all w3-hoverable">
            <tr class="center" class="w3-padding-small" class="w3-light-grey w3-hover-red">
              <th>TRAIN_ID</th>
              <th>SOURCE</th>
              <th>DESTINATION</th>
              <th>ARRIVAL TIME</th>
              <th>DEPARTURE TIME</th>
              <th>NO. OF TICKETS</th>
          </tr>
        <?php 
        $totticket="call total_seats_in()";
        $resticket=mysqli_query($con,$totticket);
        $resultticket=mysqli_num_rows($resticket);
        if($resultticket)
        {
          while($rowt=mysqli_fetch_array($resticket))
          {
            ?>
            <tr>
              <td><?php echo $rowt['TRAIN_ID']?></td>
              <td><?php echo $rowt['SOURCE']?></td>
              <td><?php echo $rowt['DESTINATION']?></td>
              <td><?php echo $rowt['arrival_time']?></td>
              <td><?php echo $rowt['departure_time']?></td>
              <td><?php echo $rowt['TOTAL_SEATS']?></td>             
            </tr>

            <?php
          }
        }?>
        
      </table>
      <br>    
</div>    
</body>
</html>
