<?php
include('./dbconnect.php');
session_start();

$email = "";
$password= "";
if(isset($_POST['btn_login'])) {
  $email = $_POST['txtemail'];
  $password = $_POST['txtpassword'];
   $sql = "select * from tbl_users where useremail='$email' and userpassword = '$password' ";  
  $data = $con->prepare($sql);
  $data->execute();
  

$x = false ;
foreach($data as $row){
  if ($row['useremail']==$email and $row['userrole']=="admin" AND $x == false) {
    $_SESSION['id']=$row['user_id'];
    $_SESSION['username']=$row['username'];
    $_SESSION['useremail']=$row['useremail'];
    $_SESSION['userrole']=$row['userrole'];
    $x = true ;
    header('location:./admin/dash.php');
  }else if ($row['useremail']==$email and $row['userrole']=="user" AND $x==false) {
    $_SESSION['id']=$row['user_id'];
    $_SESSION['username']=$row['username'];
    $_SESSION['useremail']=$row['useremail'];
    $_SESSION['userrole']=$row['userrole'];
    $x = true ;
    header('location:./index.php');
  
  }

}
 if ($x == false) {  

   $msg ="Login Failed !";
   header('location:./index.php') ;
 }
 
 
  
  
}


?>