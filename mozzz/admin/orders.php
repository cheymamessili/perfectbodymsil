<?php 
 include('../dbconnect.php');
 session_start();

 $sql = "SELECT * from tbl_reservation order by reserv_id DESC";
$data = $con->prepare($sql);
$data->execute(); 

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * from tbl_reservation where reserv_id='$id'";
    $select = $con->prepare($sql);
    $select->execute(); 
    foreach($select as $row) {
         if($row['stats']=='pending') {
            $sql = "UPDATE  tbl_reservation SET  stats='success' WHERE reserv_id='$id'";
            $update = $con->prepare($sql);
            $update->execute();
           header('location:./orders.php');
         }else {
            $sql = "UPDATE  tbl_reservation SET  stats='pending' WHERE reserv_id='$id'";
            $update = $con->prepare($sql);
            $update->execute();
           header('location:./orders.php');
         }
    
    }

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
                        <li ><a href="./coach.php"><i class="far fa-list-alt"></i>Caoch</a></li>
                        <li class="current" ><a href="./orders.php"><i class="fas fa-file-invoice"></i>Orders</a></li>
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
                 <h1>Orders</h1>
                
 <table class="table-content">
    <thead>
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>prénom</th>
            <th>telephone</th>
            <th>adresse</th>
            <th>planning</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $row) {  ?>
        <tr>
            <td><?php echo $row['reserv_id'] ?></td>
            <td style="color: #7c7989;"><?php echo $row['nom'] ?></td>
            <td> <?php echo $row['prenom'] ?></td>
            <td><?php echo $row['telephone'] ?></td>
            <td><?php echo $row['adresse'] ?></td>
            <td style="color: #6d68ab;"><?php echo $row['planning'] ?></td>
              <?php if($row['stats']=='pending') {  ?>
            <td ><a href="?id=<?php echo $row['reserv_id'] ?>" style="color: orange"><?php echo $row['stats'] ?></a></td>
            <?php }else{  ?>
                <td ><a href="?id=<?php echo $row['reserv_id'] ?>" style="color: green"><?php echo $row['stats'] ?></a></td>
                <?php } ?>
        </tr>
        <?php } ?>
    </tbody>
</table> 
            </div>
        </div>
    </main>
</div>






<script src="./js/index.js"></script>
</body>
</html>