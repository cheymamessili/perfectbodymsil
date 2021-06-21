<?php

include('./dbconnect.php');
// Start Session
session_start();
header("localhost:login.php");
$username = "";
$lastname = "";
$email = "";
$password= "";

if(isset($_POST['btn_register'])) {
  $username = $_POST['txtusername'];
  $email = $_POST['txtemail'];
  $password = $_POST['txtpassword'];
  $telephone = $_POST['txtphone'];
  $sql = "SELECT * from tbl_users ";
  $data = $con->query($sql);

$x = false ;
foreach($data as $row)  {
  if ($row['useremail']==$email AND $x == false){
    echo "Already Registrated";
    $x = true ;
  }
}

 if ($x == false) {  
  $con->query("INSERT into tbl_users(username ,useremail , userpassword ,userphone,userrole) values ('$username', '$email','$password','$telephone' ,'user')"); 
  header('location: ./index.php');
}
 

  
  
}


?>




<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Perfect Body</title>
        <link rel="stylesheet" href="./css/aniimate.css">
	<link rel="stylesheet" type="text/css" href="./csss/style.css">
    
    

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- Styles -->
      
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .wow:first-child {
      visibility: hidden;
    }
        </style>
    </head>
    <body>
    <!-- Start Header  -->
 <header>
 	 <div class="container">
 	 	<div class="logo">
 	 		 <a href="index.php">Perfect <span>Body</span></a>
 	 	</div>
		  <?php  if(isset($_SESSION['useremail'])) {
                foreach($result as $row) {  ?>
		  <div>
			  <h2 style="color:#fff"><?php echo $row['username'] ?></h2>
		  </div>
		  <?php }}?>
 	 	<a href="javascript:void(0)" class="ham-burger">
 	       <span></span>	
 	       <span></span>
 	 	</a>
 	 	<div class="nav">
 	 		<ul>
 	 			<li><a href="#home">Accueil</a></li>
 	 			<li><a href="#about">Concept</a></li>
 	 			<li><a href="#service">Services</a></li>
 	 			<li><a href="#classes">Coachs</a></li>
			    <li><a href="#materiel">Matériel</a></li>
 	 			<li><a href="#schedule">Planning</a></li>
 	 			<li><a href="#price">Abonnements</a></li>
 	 			<li><a href="#contact">Contact</a></li>

 	 		</ul>
 	 	</div>
 	 </div>
 </header>
 <!-- End Header  -->

 <!-- Start Contact -->
  <section class="contact" id="contact">
     <div class="container">
        <div class="content">
            <div class="box form wow slideInLeft">
		<form action="" method="post">
  

  <div class="container">
  <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="txtusername" required>

    <label for="uname"><b>Email</b></label>
    <input type="email" placeholder="Enter email" name="txtemail" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="txtpassword" required>

    <label for="psw"><b>Telephone</b></label>
    <input type="text" placeholder="Enter telephone" name="txtphone" required>

    <button type="submit" name="btn_register">Register</button>
      <p>Already Registred?</p><a href="./index.php">Sign In</a>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    
  </div>
</form>
            </div>
            <div class="box text wow slideInRight">
                 <h2>Connectez-vous avec Perfect Body</h2>
                  <p class="title-p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                  <div class="info">
                      <ul>
                          <li><span class="fa fa-map-marker"></span> Route Hydraulique, M'sila</li>
                          <li><span class="fa fa-phone"></span> 0550 27 14 03</li>
                          <li><span class="fa fa-envelope"></span> perfectbody@gmail.com</li>
                      </ul>
                  </div>
                  
                  

                  
            </div>
        </div>
     </div>
  </section>
 <!-- End Contact -->



 <!-- jquery -->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){

      $(".ham-burger, .nav ul li a").click(function(){
       
        $(".nav").toggleClass("open")

        $(".ham-burger").toggleClass("active");
      })      
      $(".accordian-container").click(function(){
      	$(".accordian-container").children(".body").slideUp();
      	$(".accordian-container").removeClass("active")
      	$(".accordian-container").children(".head").children("span").removeClass("fa-angle-down").addClass("fa-angle-up")
      	$(this).children(".body").slideDown();
      	$(this).addClass("active")
      	$(this).children(".head").children("span").removeClass("fa-angle-up").addClass("fa-angle-down")
      })

       $(".nav ul li a, .go-down").click(function(event){
         if(this.hash !== ""){

              event.preventDefault();

              var hash=this.hash; 

              $('html,body').animate({
                scrollTop:$(hash).offset().top
              },800 , function(){
                 window.location.hash=hash;
              });

              // add active class in navigation
              $(".nav ul li a").removeClass("active")
              $(this).addClass("active")
         }
      })
})

</script>
<script src="./jss/appp.js"></script>
<script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       0,
      }
    );
    wow.init();
  </script>
    </body>
</html>
