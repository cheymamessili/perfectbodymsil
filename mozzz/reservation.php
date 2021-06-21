<?php 
include('./dbconnect.php');
// Start Session
session_start();
header("localhost:login.php");
$nom = "";
$prenom = "";
$email = "";
$telephone= "";
$adresse= "";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from tbl_abn where abn_id='$id'";  
    $select = $con->prepare($sql);
    $select->execute();

}

if(isset($_POST['btn_reserver'])) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $telephone = $_POST['telephone'];
  $adresse = $_POST['adresse'];
  $planning = $_POST['planning'];

  $data =  $con->query("INSERT into tbl_reservation(nom ,prenom , email ,telephone,adresse,planning, stats) values ('$nom', '$prenom','$email','$telephone','$adresse','$planning','pending')"); 
  $msg='Merci !';
  header('refresh:3;url=index.php');
}

?>




<!DOCTYPE html>
<link rel="stylesheet" href="./csss/mstyle.css">
<html>
<body>
    <div class="reservation">
<div class="title">
  <?php foreach($select as $row) {  ?>
  <h2><?php echo  $row['titre'] ?></h2>
  <?php } ?>
</div>

<form action="" method="POST">
  <label for="fname">nom</label><br>
  <input type="text" id="fname" name="nom" placeholder="Entrer nom" ><br>
  <label for="lname">prénom</label><br>
  <input type="text" id="lname" name="prenom" placeholder="Entrer prénom"><br><br>
  <label for="lname">email</label><br>
  <input type="text" id="lname" name="email" placeholder="Entrer email" ><br><br>
  <label for="lname">telephone</label><br>
  <input type="text" id="lname" name="telephone" placeholder="Entrer telephone " ><br><br>
  <label for="lname">adresse</label><br>
  <input type="text" id="lname" name="adresse"  placeholder="Entrer adresse " ><br><br>
  <label for="lname">planning</label><br>
  <input type="date" id="lname" name="planning" ><br><br>
  
  <a href="./index.php"><input  value="Cancel" class="cancel" ></a>
  <input type="submit" value="Submit" name="btn_reserver">
  
</form> 
<?php if(isset($msg)) {  ?>
<p> <?php echo $msg ?> </p>
<?php } ?>
</div>
</body>
</html>