<?php 
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        //something was posted
        
        $pass_name=$_POST['pass_name'];
        $pfirst_name=$_POST['pfirst_name'];
        $plast_name=$_POST['plast_name'];
        $pdob=$_POST['pdob'];
        $pemail=$_POST['pemail'];
        $paddress=$_POST['paddress'];
        $pass_phone=$_POST['pass_phone'];
        $gender=$_POST['gender'];
        $user_name=$user_data['user_name'];
        $PD=$_POST['PD'];


        if(!empty($pass_name)   &&  !is_numeric($pass_name))
        {
            //save to database              
            $pass_id=random_num(20);             
            $queryb="insert into passengers (pass_name,pfirst_name,plast_name,pdob,pemail,paddress,pass_phone,gender,pass_id,user_name,PD) values ('$pass_name','$pfirst_name','$plast_name','$pdob','$pemail','$paddress','$pass_phone','$gender','$pass_id','$user_name','$PD')";

            mysqli_query($con,$queryb);

            header("Location: index.php");
            die;
        }
        else{
            echo "Please enter a correct information";
        }

    }

?>

<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
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



<!-- Header -->
<header class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
  <div class="w3-container w3-dark-grey w3-center w3-allerta">
 
  
</div>
  <img class="https://live.staticflickr.com/4455/37277898124_f43cff43d0_b.jpg" src="maharajaExpress.jpg" alt="London" width="1500" height="700">
  <div class="w3-display-middle" style="width:65%">

  


    <div class="w3-bar w3-black">
      
       
      <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Hotel');"><i class="fa fa-user w3-margin-right"></i>Register</button>
      
  </div>

    <!-- Tabs -->
    

    <div id="Hotel" class="w3-container w3-white w3-padding-16 myLink">
    <form method="post">
      <h3>WELCOME</h3>
      
<div class="w3-row-padding" style="margin:0 -16px;">
        <div class="w3-half">
          <label>PASS NAME</label>
          <input  id="text" class="w3-input w3-border" name="pass_name" type="text" placeholder="PASSENGER NAME">
        </div>
     
        <div class="w3-half">
          <label>First Name</label>
          <input id="text" class="w3-input w3-border" name="pfirst_name" type="text" placeholder="First Name">
        </div>
        
	<div class="w3-half">
          <label>Last Name</label>
          <input id="text" class="w3-input w3-border" name="plast_name" type="text" placeholder="Last Name">
        </div>
	<div class="w3-half">
          <label>Date of Birth</label>
          <input id="text" class="w3-input w3-border" name="pdob" type="text" placeholder="yyyy-mm-dd">
        </div>
	  <div class="w3-half">
          <label>E-mail ID</label>
          <input id="text" class="w3-input w3-border" name="pemail" type="text" placeholder="E-mail ID">
        </div>
	
	
	<div class="w3-half">
          <label>Address</label>
          <input class="w3-input w3-border" name="paddress" type="text" placeholder="Address">
        </div>
	<div class="w3-half">
          <label>Phone number</label>
          <input class="w3-input w3-border" type="text" name="pass_phone" placeholder="Phone number">
        </div>



        <div class="w3-half">
          <label>ID proof</label>
          
          <input class="w3-input w3-border" name="pid_proof"  type="text" placeholder="ID proof">
        </div>
	  <div class="w3-half">
          <label>Gender</label><br>
          <input type="radio" id="html" name="gender" value="M">
          <label for="html">Male</label>
          <input type="radio" id="html" name="gender" value="F">
          <label for="html">Female</label>
          
        </div>
        <div class="w3-half">
          <label>Physically Disable?</label><br>
          <input type="radio" id="html" name="PD" value="Y">
          <label for="html">YES</label>
          <input type="radio" id="html" name="PD" value="N">
          <label for="html">NO</label>
          
        </div>
	  
   
        <div class="w3-half">
        <br>

      <button class="w3-button w3-dark-grey" id="button" type="submit" name="Register">Register</button>
      <a href="index.php">OR BOOK</a><br><br>
    </div>
            
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


<!--
<!DOCUMENT html>
<html>
    <head>
        <title>Signup</title>
    </head>
    <body>
        <style type="text/css">
            #text{
                height: 25px;
                border-radius: 5px;
                padding:4px;
                border: solid thin #aaa;
                width: 100%;
            }
            #button{
                padding: 10px;
                width: 100px;
                color:white;
                background-color: lightblue;
                border: none;
            }
            #box{
                background-color: grey;
                margin: auto;
                width: 300px;
                padding: 20px;
            }
            </style>
    </body>
    <div id="box">
        <form method="post">
            <div style="font-size: 20px;margin: 10px;">Signup</div>
           
            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" name="Signup"><br><br>
            <a href="login.php">Login</a><br><br>
</html>-->