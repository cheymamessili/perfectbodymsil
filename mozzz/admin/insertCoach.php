<?php 
 include('../dbconnect.php');
 session_start();

$username = "";
$email = "";
$password="";


if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_coach WHERE coach_id=$id";
    $delete = $con->query($sql); 
    header('location:./coach.php');
}

if(isset($_POST['btn_add'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $data =  $con->query("INSERT into tbl_coach(coachname , coachemail ,coachpassword) values ('$username', '$email','$password')"); 
  $msg='Done !';
  header('refresh:3;url=./coach.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="./css/adminStyle.css">
     <script src="https://kit.fontawesome.com/9bb6ccdf9b.js"  
 crossorigin="anonymous">
</script>
    <title>Admin Pannel | Dashboard</title>
</head>
<body >
    <div class="app">
    <header>
        <div class="title">
           <div class="menu"> <i class="fas fa-bars t" onclick="test()"></i></div>
           <h2>Perfect<span>Body</span></h2>
        </div>
        <div class="search">
            <input type="text" placeholder="Search">
            <i class="fas fa-search"></i>
        </div>
        <div class="admin">
            <h3>admin</h3>
            <i class="fas fa-user-circle"></i>
        </div>
    </header>

    <main>
        <div class="row">
            <div class="col-1">
                <div class="col-1-top">
                    <ul>
                       <li ><a href="./dash.php"><i class="far fa-flag"></i>Dashboard</a></li>
                        <li class="current"><a href="./coach.php"><i class="far fa-list-alt"></i>Caoch</a></li>
                        <li ><a href="./orders.php"><i class="fas fa-file-invoice"></i>Orders</a></li>
                        <li><a href="./users.php"><i class="fas fa-code"></i>Users</a></li>
                        <li><a href="./profile.php"><i class="far fa-user-circle"></i>Profile</a></li>
                    </ul>
                </div>
                <div class="col-1-bottom">
                    <ul>
                    <li><a href="./logout.php"><i class="far fa-comment"></i>Logout </a></li>
                       
                    </ul>
                </div>
            </div>
            <div class="col-2">
                 <h1>Insert Coach</h1>
                
 <table class="table-content">
       <div class="form">
          <form action="" method="POST">
            <input type="text" name="username" placeholder="username" required> 
            <input type="email" name="email" placeholder="email" required>
            <input type="password" name="password" placeholder="password" required>
             <a href="./coach.php"><button class="btn btn-cancel">Cancel</button></a>
            <button type="submit" name="btn_add" class="btn btn-add">Add</button>
          </form>
          </div>
</table> 
            </div>
        </div>
    </main>
</div>






<script src="./js/index.js"></script>
</body>
</html>