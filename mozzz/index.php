<?php  include('./dbconnect.php');
session_start();

// echo $_SESSION['id'];
if(isset($_SESSION['useremail'])) {
    $user_id = $_SESSION['id'];
    $profile = "SELECT * from tbl_users where (user_id='$user_id') AND (userrole='user') ";
    $result = $con->prepare($profile);
    $result->execute();  
	echo "session start() ";
}

$sql = "SELECT * from tbl_abn";
$data = $con->prepare($sql);
$data->execute();

$sql2 = "SELECT * from tbl_reservation r,tbl_users u where (r.telephone=u.userphone) AND (r.stats='success') AND (u.user_id='$user_id')";
$find = $con->prepare($sql2);
$find->execute();


?>



<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Perfect Body</title>
        <link rel="stylesheet" href="./css/aniimate.css">
    

	<link rel="stylesheet" type="text/css" href="./csss/style.css">
    
    
	<script src="https://kit.fontawesome.com/9bb6ccdf9b.js"  
 crossorigin="anonymous">
</script>
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
 	 		 <a href="">Perfect <span>Body</span></a>
 	 	</div>
		  <?php  if(isset($_SESSION['useremail'])) {
			    
                foreach($result as $row) {  $lougout = true; ?>
		  <div class="notif-container">
			  <div class="notif-box-1">
			   <h2 style="color:#fff"><?php echo $row['username'] ?></h2>
			   <i class="fas fa-bell notif" > <?php foreach($find as $row) { if($row['stats'] =='success') {   ?> <span class="span">1</span> <?php }} ?> </i>
				</div>
			  <div class="cancelContainer">
			    <p style="color:#fff">votre demande à été approuvé</p>
			  </div>
		  </div>
		  <?php }}?>
 	 	<a href="javascript:void(0)" class="ham-burger">
 	       <span></span>	
 	       <span></span>
 	 	</a>
 	 	<div class="nav">
 	 		<ul>
 	 			<li><a href="#home">Accueil</a></li>
 	 			<li><a href="#service">Services</a></li>
				<li><a href="#materiel">Matériel</a></li>
                <li><a href="#classes">Coachs</a></li>
 	 			<li><a href="#schedule">Planning</a></li>
 	 			<li><a href="#price">Abonnements</a></li>
 	 			<li><a href="#contact">Contact</a></li>
				  <?php if(isset($lougout)) {  ?>
 	 			<li><a href="./logout.php">Logout</a></li>
				  <?php }?>
               
 	 		</ul>
 	 	</div>
 	 </div>
 </header>
 <!-- End Header  -->

  <!-- Start Home -->
  <section class="home wow flash" id="home">
  	 <div class="container">
  	 	  <h1 align="center" class="wow slideInLeft" data-wow-delay="1s">C'EST L'HEURE DU <span>gym</span>.ALLONS-Y NOUS SOMMES PRÊTS  </h1>
  	 	  <h1 align="center" class="wow slideInRight" data-wow-delay="1s"><span>À VOUS ADAPTER</span> </h1>
		<h1 class="wow slideInRight" data-wow-delay="1s"> </h1>
  	 </div>
  	  <!-- go down -->
  	      <a href="#about" class="go-down">
  	      	  <i class="fa fa-angle-down" aria-hidden="true"></i>
  	      </a>
  	  <!-- go down -->

  </section>
  <!-- End Home -->


 <!-- Start About -->
  <section class="about" id="about">
  <h4 class="texte-align">Avec Perfect Body, améliore ta condition physique, tonifie ton corps et développe ta masse musculaire. Grâce à des espaces adaptés sur plus de 1000m², façonne tes entraînements à la perfection :</h4>
  	  <div class="container">
  	  	  <div class="content">
  	  	  	   <div class="box wow bounceInUp">
  	  	  	   	   <div class="inner">
  	  	  	   	   	   <div class="img">
  	  	  	   	   	   	  <img src="images/space3.jpg" alt="about" />
  	  	  	   	   	   </div>
                       <div class="text">
                       	   <h4>UN ESPACE SPACIEUX ET LUMINEUX POUR LES COURS COLLECTIFS </h4>
							  <p>Les cours collectifs de Perfect Body regroupent plusieurs formats d’activités et différentes méthodes d’exercices.</p>
                       	   <p> Zumba, Yoga </p>
                       </div>
  	  	  	   	   </div>
  	  	  	   </div>
  	  	  	   	<div class="box wow bounceInUp" data-wow-delay="0.2s">
  	  	  	   	   <div class="inner">
  	  	  	   	   	   <div class="img">
  	  	  	   	   	   	  <img src="images/materiel.jpg" alt="about" />
  	  	  	   	   	   </div>
                       <div class="text">
                       	   <h4>L'ESPACE MUSCULATION ET CARDIO TRAINING</h4>
                       	   <p>Chez Perfect Body, tes entraînements sont notre priorité quel que soit ton niveau. Nous proposons les meilleures solutions et produits du marché </p>
                           <p> (tapis de course, rameur, vélos elliptiques, etc.).</p>
					   </div>

  	  	  	   	   </div>
  	  	  	   </div>

					 <div class="box wow bounceInUp" data-wow-delay="0.4s">
  	  	  	   	   <div class="inner">
  	  	  	   	   	   <div class="img">
  	  	  	   	   	   	  <img src="images/nut.jpg" alt="about" />
  	  	  	   	   	   </div>
                       <div class="text">
                       	   <h4>DIÉTÉTICIENS-NUTRITIONNISTES</h4>
                       	   <p>Le nutritionniste sportif a pour mission principale de suivre l'alimentation d'athlètes de tous niveaux. Son rôle est de s'assurer que le sportif ait une hygiène alimentaire saine et suive le régime le plus adapté à son activité physique et ses objectifs. Quantité d'aliments par repas, choix de produits...</p>
							  

                       </div>
  	  	  	   	   </div>
  	  	  	   </div>	 
		    </div>	 
  	  	  </div>
  	  </div>
		<div class="container">
  	  	  <div class="content">
  	  	  	   <div class="box wow bounceInUp">
  	  	  	   	   <div class="inner">
  	  	  	   	   	   <div class="img">
  	  	  	   	   	   	  <img src="images/parcking.jpg" alt="about" />
  	  	  	   	   	   </div>
                       <div class="text">
                       	   <h4>UN PARCKING </h4>
						 <p> Un parking couvert et gardé est mis à votre disposition gratuitement.</p>
						   
                       </div>
  	  	  	   	   </div>
  	  	  	   </div>
  	  	  	   	<div class="box wow bounceInUp" data-wow-delay="0.2s">
  	  	  	   	   <div class="inner">
  	  	  	   	   	   <div class="img">
  	  	  	   	   	   	  <img src="images/halt.jpg" alt="about" />
  	  	  	   	   	   </div>
                       <div class="text">
                       	   <h4>HALTE-GARDERIE ET UNE CAFÉTÉRIA</h4>
                       	   <p>Chez Perfect Body, nous savons que la famille est importante. Nous offrons donc un service de garderie GRATUIT pour vous permettre de prendre du temps pour vous au gym tout en offrant un espace sécuritaire et amusant pour vos enfants et une cafétéria.</p>
                       </div>
  	  	  	   	   </div>
  	  	  	   </div>
  	  	  	
				<div class="box wow bounceInUp" data-wow-delay="0.4s">
  	  	  	   	   <div class="inner">
  	  	  	   	   	   <div class="img">
  	  	  	   	   	   	  <img src="images/piscin.jpg" alt="about" />
  	  	  	   	   	   </div>
                       <div class="text">
                       	   <h4>PISCINE</h4>
                       	   <p>Faire de l’exercice dans l’eau est idéal pour entretenir votre forme physique et se maintenir en bonne santé.</p>
							  

                       </div>
  	  	  	   	   </div>
  	  	  	   </div> 	 
		    </div>	 
  	  	  </div>
		</div>
  </section>
 <!-- End About -->


 <!-- Start Service -->
 <section class="service" id="service">
 	<div class="container">
 		 <div class="content">
 		 	  <div class="text box wow slideInLeft">
                  <h2>Services</h2>
                  <p>Les activités sportives apportent beaucoup de bienfaits pour l’organisme. Pratiquer un exercice physique quotidien permet de rallonger l’espérance de vie, sans oublier l’effet immédiat du sport qui permet de libérer de l’endorphine dans le corps et procure la sensation de bien-être. Outre la santé, les motivations qui nous poussent à s’inscrire dans un club de sport sont multiples et peuvent évoluer au fur et à mesure de notre implication dans les programmes d’entrainement : remise en forme, prise de masse, perte de poids, endurance, rééducation…</p>
                 
                  <!-- go down -->
  	      <a  class="go-down">
  	      	  <i class="fa fa-angle-down" aria-hidden="true"></i>
  	      </a>
  	  <!-- go down -->
 		 	  </div>
 		 	  <div class="accordian box wow slideInRight">
 		 	  	    <div class="accordian-container active">
 		 	  	    	<div class="head">
 		 	  	    		<h4>MUSCULATION</h4>
 		 	  	    		<span class="fa fa-angle-down"></span>
 		 	  	    	</div>
 		 	  	    	<div class="body">
 		 	  	    		<p>La musculation est une discipline qui vise à développer et à entretenir la masse musculaire des pratiquants par le biais d’exercices physiques. Elle permet d’accroitre le volume musculaire, la force, l’endurance, la puissance, l’explosivité et la résistance du corps. La musculation est l’élément central de plusieurs sports comme le culturisme ou l’haltérophilie par exemple. Elle constitue également une part de la préparation physique pour les athlètes, notamment de haut niveau, qui ont besoin d’une solide condition physique pour maximiser leurs performances. La musculation peut être également utilisée par des méthodes plus douces comme le fitness, le stretching ou dans le cas de soins médicaux comme la kinésithérapie ou la rééducation.</p>
 		 	  	    	</div>
 		 	  	    </div>
 		 	  	    <div class="accordian-container">
 		 	  	    	<div class="head">
 		 	  	    		<h4>CARDIO TRAINING</h4>
 		 	  	    		<span class="fa fa-angle-up"></span>
 		 	  	    	</div>
 		 	  	    	<div class="body">
 		 	  	    		<p>L’entraînement cardio vasculaire est une discipline qui permet aux pratiquants de travailler leur endurance et d’améliorer leurs performances cardiaques. Pour y parvenir, il est nécessaire de répartir l’effort physique sur la durée et d’opter pour une intensité d’exercice plutôt moyenne afin d’être capable de tenir le rythme. Tapis, vélos, elliptiques, rameurs, corde à sauter… Fitness Park met à la disposition de ses adhérents tout le matériel nécessaire pour les exercices cardio vasculaires. Le cardio training est également intéressant pour les sportifs qui sont en période de sèche ou les personnes désirant perdre du poids car il permet d’augmenter les dépenses caloriques journalières.</p>
 		 	  	    	</div>
 		 	  	    </div>
 		 	  	    <div class="accordian-container">
 		 	  	    	<div class="head">
 		 	  	    		<h4>LA NATATION</h4>
 		 	  	    		<span class="fa fa-angle-up"></span>
 		 	  	    	</div>
 		 	  	    	<div class="body">
 		 	  	    		<p>Nage sportive, aquagym, jeux collectifs, nombreuses sont les activités sportives que nous pouvons pratiquer dans une piscine. Faire de l’exercice dans l’eau est idéal pour entretenir votre forme physique et se maintenir en bonne santé. Vous tonifiez l’ensemble de votre corps, améliorez vos capacités cardiovasculaires et respiratoires, ceci en limitant l’impact sur les articulations.

La piscine est aussi une solution ludique pour inciter les enfants à pratiquer une activité sportive régulière : aqua-volley, polo course contre la montre, etc. Autant d'occasions de passer des moments inoubliables en famille tout en se dépensant !</p>
 		 	  	    	</div>
 		 	  	    </div>
 		 	  	    <div class="accordian-container">
 		 	  	    	<div class="head">
 		 	  	    		<h4>COURS COLLECTIFS</h4>
 		 	  	    		<span class="fa fa-angle-up"></span>
 		 	  	    	</div>
 		 	  	    	<div class="body">
 		 	  	    		<p>Les cours collectifs de Fitness Park regroupent plusieurs formats d’activités et différentes méthodes d’exercices. Chacun d’entre eux permet d’atteindre des objectifs différents. Dépense calorique, perte de poids, musculation, force, endurance, tonicité du corps… Tu trouveras toujours un cours qui permet de répondre à ton besoin(zumba, yoga..).</p>
 		 	  	    	</div>
 		 	  	    </div>
 		 	  </div>
 		 </div>
 	</div>
 </section>
 <!-- End Service -->
 <!-- Start Gallery -->
 <section class="gallery" id="gallery">
  	 <h2>Galerie d'entraînement</h2>
  	<div class="content">
  		 <div class="box wow slideInLeft">
  		 	 <img src="images/musculation.jpeg" alt="gallery" />
  		 </div>
  		 <div class="box wow slideInRight">
  		 	 <img src="images/cardio1.jpg" alt="gallery" />
  		 </div>
  		 <div class="box wow slideInLeft">
  		 	 <img src="images/natation.jpg" alt="gallery" />
  		 </div>
  		 <div class="box wow slideInRight">
  		 	 <img src="images/zumba.jpg" alt="gallery" />
  		 </div>
		   <div class="box wow slideInRight">
  		 	 <img src="images/yoga1.jpg" alt="gallery" />
  		 </div>
		   <div class="box wow slideInRight">
  		 	 <img src="images/yoga2.jpeg" alt="gallery" />
  		 </div>
  	</div>
  </section>
<!-- End Gallery -->
<!--Matériel-->
<section class="materiel-package" id="materiel">
  	 <div class="container">
  	 	  <h2>MATÉRIEL</h2>
  	 	  <p class="title-p"> Chez Perfect Body, tes entraînements sont notre priorité quel que soit ton niveau.

Pour te permettre de te surpasser à chaque séance, notre salle équipée de matériel et équipements sportifs de qualité dernière génération sur l’ensemble des espaces.

Nous proposons les meilleures solutions et produits du marché grâce à nos partenaires machines tels que Technogym ou Hammer Strenght, ainsi que nos partenaires fitness comme la boisson sportive Yanga Sports Water ou les cours créés par LesMills et Radical Fitness, pour que chacun de tes passages Perfect Body soit la meilleure expérience fitness qui soit.</p>
  	 	  <div class="content">
  	 	  	  <div class="box wow bounceInUp">
  	 	  	  	  <div class="inner">
  	 	  	  	  	   
  	 	  	  	  	   <div class="img">
  	 	  	  	  	   	 <img src="images/machine1.png" alt="price" />
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="text">
  	 	  	  	  	   	  <h3>Cage a squat - Body Solid Full options GPR400FO</h3>
  	 	  	  	  	   	  <p>Cage à squat et tractions de qualité supérieure avec toutes les options. Jusqu'à 20 exercices de bases et 50 avec les diverses versions</p>
  	 	  	  	  	   	  
  	 	  	  	  	   </div>
  	 	  	  	  </div>
  	 	  	  </div>
  	 	  	  <div class="box wow bounceInUp" data-wow-delay="0.2s">
  	 	  	  	  <div class="inner">
  	 	  	  	  	  
  	 	  	  	  	   <div class="img">
  	 	  	  	  	   	 <img src="images/machine2.png" alt="price" />
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="text">
  	 	  	  	  	   	  <h3>Station musculation - Kettler - Multigym plus</h3>
  	 	  	  	  	   	  <p>Modèle économique non adapté à une utilisation intensive en collectivités. Une utilisation sous la surveillance des enseignats est nécessaire.</p>
  	 	  	  	  	   	  
  	 	  	  	  	   </div>
  	 	  	  	  </div>
  	 	  	  </div>
  	 	  	  <div class="box wow bounceInUp" data-wow-delay="0.4s">
  	 	  	  	  <div class="inner">
  	 	  	  	  	   
  	 	  	  	  	   <div class="img">
  	 	  	  	  	   	 <img src="images/machine3.png" alt="price" />
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="text">
  	 	  	  	  	   	  <h3>Tour 4 postes LAROQ Tannac</h3>
  	 	  	  	  	   	  <p>Station 4 postes de gamme professionnelle où 4 personnes peuvent travailler en même temps les membres supérieurs (dorsaux, biceps, triceps) et les membres inférieurs (adducteurs, abducteurs, fessiers) dans différentes postures.</p>
  	 	  	  	  	   	  
  	 	  	  	  	   </div>
  	 	  	  	  </div>
  	 	  	  </div>
  	 	  </div>
			 <div class="content">
  	 	  	  <div class="box wow bounceInUp">
  	 	  	  	  <div class="inner">
  	 	  	  	  	   
  	 	  	  	  	   <div class="img">
  	 	  	  	  	   	 <img src="images/machine4.png" alt="price" />
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="text">
  	 	  	  	  	   	  <h3>Vélo semi-allongé - Kettler Tour 600R</h3>
  	 	  	  	  	   	  <p>Vélo semi-allongé pour avoir le dos calé, permettant un travail de régularité sans sollicitation particulière du dos.</p>
  	 	  	  	  	   	  
  	 	  	  	  	   </div>
  	 	  	  	  </div>
  	 	  	  </div>
  	 	  	  <div class="box wow bounceInUp" data-wow-delay="0.2s">
  	 	  	  	  <div class="inner">
  	 	  	  	  	  
  	 	  	  	  	   <div class="img">
  	 	  	  	  	   	 <img src="images/m5.png" alt="price" />
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="text">
  	 	  	  	  	   	  <h3>Tapis de course BH LK 6000 Hi Power Gamme pro</h3>
  	 	  	  	  	   	  <p>Tapis de course LK6000 de chez BH Fitness Hi-Power avec moteur de 4.0 CV silencieux et fiable.Vitesse réglable de 0,8 à 22 km/h dans un grand silence.</p>
  	 	  	  	  	   	  
  	 	  	  	  	   </div>
  	 	  	  	  </div>
  	 	  	  </div>
  	 	  	  <div class="box wow bounceInUp" data-wow-delay="0.4s">
  	 	  	  	  <div class="inner">
  	 	  	  	  	   
  	 	  	  	  	   <div class="img">
  	 	  	  	  	   	 <img src="images/m6.png" alt="price" />
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="text">
  	 	  	  	  	   	  <h3>Rameur RW1000 Movemia by - BH Hi-Power - Gamme Pro</h3>
  	 	  	  	  	   	  <p>Rameur proche du mouvement en aviron. Sans alimentation, autogénéré. 20 niveaux de résistance.</p>
  	 	  	  	  	   	  
  	 	  	  	  	   </div>
  	 	  	  	  </div>
  	 	  	  </div>
  	 	  </div>
			 <div class="content">
  	 	  	  <div class="box wow bounceInUp">
  	 	  	  	  <div class="inner">
  	 	  	  	  	   
  	 	  	  	  	   <div class="img">
  	 	  	  	  	   	 <img src="images/m7.png" alt="price" />
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="text">
  	 	  	  	  	   	  <h3>Rack haltères - Sveltus</h3>
  	 	  	  	  	   	  <p>Rack de rangement pour haltères Sveltus, pratique pour les salles ou clubs de fitness, il peut accueillir plus de 30 paires d'haltères.</p>
  	 	  	  	  	   	  
  	 	  	  	  	   </div>
  	 	  	  	  </div>
  	 	  	  </div>
  	 	  	  <div class="box wow bounceInUp" data-wow-delay="0.2s">
  	 	  	  	  <div class="inner">
  	 	  	  	  	  
  	 	  	  	  	   <div class="img">
  	 	  	  	  	   	 <img src="images/m8.png" alt="price" />
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="text">
  	 	  	  	  	   	  <h3>Balle fitball antiburst Casal Sport</h3>
  	 	  	  	  	   	  <p>Permet de réaliser de nombreux exercices, aussi bien des exercices d'équilibre, de renforcement, d'étirement. 3 diamètres : 55 cm, 65 cm, 75 cm.</p>
  	 	  	  	  	   	  
  	 	  	  	  	   </div>
  	 	  	  	  </div>
  	 	  	  </div>
  	 	  	  <div class="box wow bounceInUp" data-wow-delay="0.4s">
  	 	  	  	  <div class="inner">
  	 	  	  	  	   
  	 	  	  	  	   <div class="img">
  	 	  	  	  	   	 <img src="images/m9.png" alt="price" />
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="text">
  	 	  	  	  	   	  <h3>Natte pliable fitness ou yoga Sveltus</h3>
  	 	  	  	  	   	  <p>Natte pliable et confortable poignée intégrée, pliable en 4.</p>
  	 	  	  	  	   	  
  	 	  	  	  	   </div>
  	 	  	  	  </div>
  	 	  	  </div>
  	 	  </div>
  	 </div>
  </section>

<!-- Start Classes -->
<section class="classes" id="classes">
	<div class="container">
     
		 <div class="content">
		      <div class="box img wow slideInLeft">
		 	  	 <img src="images/coachs.jpeg" alt="classes" />
					<img src="images/coachs3.jpg" alt="classes" />
					<img src="images/coachs4.jpg" alt="classes" />
					<img src="images/coachs5.jpg" alt="classes" />

		 	  </div>
		 	  <div class="box text wow slideInRight">
		 	  	 <h2>COACHS</h2>
		 	  	 <p>Que tu cherches à gagner du muscle, à améliorer ton cardio, ou simplement à reprendre le sport, nos équipes ont plus d'un tour dans leurs sacs pour te faire transpirer et progresser !</p>
		 	  	<div class="class-items">
				 <div class="item wow bounceInUp">
				   <div class="item-text">
                     	  <h4>Stephen Foster</h4>
                     	  <p>coach sportif et educateur physiquep très professionnel,diplomé d'état j'ai un master domain ( staps) je propose mes services pour ceux qui sont aimé ameliorer leur physique ( préparation du système cardio-vasculaire ), leur corps par differentes</p>
      <p> Coach de musculation et cardio </p>
	                       </div>
                     <div class="item-img">
                     	 <img src="images/coach1.jpg" alt="classes" />
                     	 
                     </div>
</div>
		 	  	 
					<div class="item wow bounceInUp">
                     <div class="item-img">
                     	 <img src="images/coach4.jpg" alt="classes" />
                     	 
                     </div>
                     <div class="item-text">
                     	  <h4>Aurora Sekine</h4>
                     	  <p>coach sportive cardio fitness musculation diplomé d'un diplome international en aerofitness et combat fitness, self defense spécialement pour femmes</p>
						   <p> Coach de musculation et cardio </p>
                     </div>
		 	  	 </div> 
         
		 	  	 <div class="item wow bounceInUp">
                     <div class="item-img">
                     	 <img src="images/coach3.jpg" alt="classes" />
                     	 
                     </div>
                     <div class="item-text">
                     	  <h4>Ben Palocko</h4>
                     	  <p>Entraineur de natation diplômé ;plus de 10 ans d expérience,champion d'algerie comme  entraineur en nage avec palmes"mostaganem2019" donne cour de natation  et la nage avec palmes pour débutant ou performance</p>
						   <p> Coach de natation </p>
                     </div>
		 	  	 </div>
		 	  	 <div class="item wow bounceInUp">
                     <div class="item-text">
                     	  <h4>Andi Nguyen</h4>
                     	  <p>jeune femme d alger diplômée en sciences sportives comme coach de fintess. aerobic et zumba</p>
						   <p> Coach de yoga et zumba </p>
                     </div>
                     <div class="item-img">
                     	 <img src="images/coach2.jpg" alt="classes" />
                     	 
						  
                     </div>
					 
		 	  	 </div>
		 	  	</div>
				   

	</div>
</section>
<!-- End Classes -->



<!-- Start Schedule -->
  <section class="schedule" id="schedule">
  	 <div class="container">
  	 	  <div class="content">
  	 	  	   <div class="box text wow slideInLeft">
  	 	  	   	   <h2>Planning</h2>
  	 	  	   	   <p> Découvrez le planning des cours collectifs de fitness  	 	  	   	   </p>
  	 	  	   	   <img src="images/planning.png" alt="schedule" />
  	 	  	   </div>
  	 	  	   <div class="box timing wow slideInRight">
                   <table class="table">
                   	 <tbody>
						<tr >
                   	 		<td  class="day">Dimanche</td>
                   	 		<td><strong>9:00 h</strong></td>
                   	 		<td>Natation<br/> 9:00 à 10:30 h</td>
                   	 		<td>num salle:1</td>
                   	 		<td>Musculation <br/> 10:30 à 12 h</td>
                   	 		<td>num salle:2</td>
								<td><strong>13 h</strong></td>
                   	 		<td>Yoga <br/> 13 à 14:30 h</td>
                   	 		<td>num salle:3</td>
								<td>Cardio <br/> 14:30 à 15 h</td>
                   	 		<td>num salle:4</td>
								
                   	 	</tr>
                   	 	<tr >
                   	 		<td  class="day">Lundi</td>
                   	 		<td><strong>9:00 h</strong></td>
                   	 		<td>Cardio<br/> 9:00 à 10:30 h</td>
                   	 		<td>num salle:4</td>
                   	 		<td>Zumba <br/> 10:30 à 12 h</td>
                   	 		<td>num salle:2</td>
								<td><strong>13 h</strong></td>
                   	 		<td>Natation <br/> 13 à 14:30 h</td>
                   	 		<td>num salle:1</td>
								<td>Cardio <br/> 14:30 à 15 h</td>
                   	 		<td>num salle:4</td>
								
                   	 	</tr>
                   	 	<tr >
                   	 		<td class="day">Mardi</td>
                   	 		<td><strong>9:00 h</strong></td>
                   	 		<td>Piscine<br/> 9:00 à 10:30 h</td>
                   	 		<td>num salle:1</td>
                   	 		<td>Musculation <br/> 10:30 à 12 h</td>
                   	 		<td>num salle:2</td>
								<td><strong>13 h</strong></td>
                   	 		<td>Yoga <br/> 13 à 14:30 h</td>
                   	 		<td>num salle:3</td>
								<td>Cardio <br/> 14:30 à 15 h</td>
                   	 		<td>num salle:4</td>
								
                   	 	</tr>
                   	 		<td class="day">Mercredi</td>
                   	 		<td><strong>9:00 h</strong></td>
                   	 		<td>Piscine<br/> 9:00 à 10:30 h</td>
                   	 		<td>num salle:1</td>
                   	 		<td>Musculation <br/> 10:30 à 12 h</td>
                   	 		<td>num salle:2</td>
								<td><strong>13 h</strong></td>
                   	 		<td>Yoga <br/> 13 à 14:30 h</td>
                   	 		<td>num salle:3</td>
								<td>Cardio <br/> 14:30 à 15 h</td>
                   	 		<td>num salle:4</td>
								
                   	 	</tr>
                   	 	<tr>
                   	 		<td class="day">jeudi</td>
                   	 		<td><strong>9:00 h</strong></td>
                   	 		<td>Piscine<br/> 9:00 à 10:30 h</td>
                   	 		<td>num salle:1</td>
                   	 		<td>Musculation <br/> 10:30 à 12 h</td>
                   	 		<td>num salle:2</td>
								<td><strong>13 h</strong></td>
                   	 		<td>Yoga <br/> 13 à 14:30 h</td>
                   	 		<td>num salle:3</td>
								<td>Cardio <br/> 14:30 à 15 h</td>
                   	 		<td>num salle:4</td>
								
                   	 	</tr>
                   	 	<tr>
                   	 		<td class="day">Vendredi</td>
                   	 		<td><strong>9:00 h</strong></td>
                   	 		<td>Piscine<br/> 9:00 à 10:30 h</td>
                   	 		<td>num salle:1</td>
                   	 		<td>Musculation <br/> 10:30 à 12 h</td>
                   	 		<td>num salle:2</td>
								<td><strong>13 h</strong></td>
                   	 		<td>Yoga <br/> 13 à 14:30 h</td>
                   	 		<td>num salle:3</td>
								<td>Cardio <br/> 14:30 à 15 h</td>
                   	 		<td>num salle:4</td>
								
                   	 	</tr>
                   	 	<tr>
                   	 		<td class="day">Samedi</td>
                   	 		<td><strong>9:00 h</strong></td>
                   	 		<td>Piscine<br/> 9:00 à 10:30 h</td>
                   	 		<td>num salle:1</td>
                   	 		<td>Musculation <br/> 10:30 à 12 h</td>
                   	 		<td>num salle:2</td>
								<td><strong>13 h</strong></td>
                   	 		<td>Yoga <br/> 13 à 14:30 h</td>
                   	 		<td>num salle:3</td>
								<td>Cardio <br/> 14:30 à 15 h</td>
                   	 		<td>num salle:4</td>
								
                   	 	</tr>
                   	 </tbody>
                   </table>
  	 	  	   </div>
  	 	  </div>
  	 </div>
  </section>
<!-- End Schedule -->



 <!-- Start Price -->
  <section class="price-package" id="price">
  	 <div class="container">
	   <h2> Faire Votre Réservation </h2>
  	 	<p class="title-p">Trouve facilement l'abonnement qui te convient !! N'attends pas demain pour profiter de la meilleure offre, pour faire une réservation vous voulez juste cliquez sur la photo de l'offre et remplir le formulaire ! </p>
  	 	  <div class="content" >
				 <?php foreach($data as $row)  { ?>
  	 	  	 <div class="box wow bounceInUp" >
  	 	  	  	  <div class="inner">
  	 	  	  	  	   <div class="price-tag">
  	 	  	  	  	   	 <?php echo $row['prix'] ?>
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="img">
  	 	  	  	  	   <a href="./reservation.php?id=<?php echo $row['abn_id'] ?> "><img src="images/price1.jpg" alt="price" /></a>
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="text">
							<h3><?php echo $row['titre'] ?> </h3>
  	 	  	  	  	   	  <p><?php echo $row['description'] ?></p>
  	 	  	  	  	   </div>
  	 	  	  	  </div>
  	 	  	  </div>
				   <?php } ?>
  	 	  
  	 	  
  	 	  </div>
  	 </div>
  </section>
 <!-- End Price -->

 <!-- Start Contact -->
  <section class="contact" id="contact">
     <div class="container">
        <div class="content">
            <div class="box form wow slideInLeft">
		<form action="login.php" method="post">
  

  <div class="container">
    <label for="uname"><b>Email</b></label>
    <input type="email" placeholder="Enter email" name="txtemail" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="txtpassword" required>

    <button type="submit" name="btn_login">Login</button>
      <p>not Registred?</p><a href="./registration.php">Sign In</a>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    
  </div>
</form>
            </div>
            <div class="box text wow slideInRight">
                 <h2>Connectez-vous avec Perfect Body</h2>
				 <p class="title-p">Si vous souhaitez contacter le service client de Perfect Body par téléphone pour obtenir des informations, appelez le numéro ci-dessous ou envoyez une question par e-mail.</p>
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
