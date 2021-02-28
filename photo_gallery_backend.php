<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="assets/css/price.css" />
  <title>Institut de beauté MARAM/Tarifs</title>
</head>
 <body class="homepage">
      
               <nav id="nav">
	                <ul>
	                  <li ><a href="home.php">Accueil</a></li> 
	                  <li><a href="reservation.php">Réservation</a></li>
	                  <li><a href="photo_gallery_backend.php">Galerie prestation</a></li>
	                  <li><a href="contact.php">Contact</a></li>
	                </ul>
               </nav>
			    <div >
			        <div id="header">
			              <div class="inner">
				                <header>
				                  <h1><a >Salon de beauté MARAM</a></h1>
				                  <h2 >Coiffure - Esthétique </h2>
				                  <hr />
				                  <img src="assets/images/image.jpg" alt="" width="100" height="100">
				                  <p>Vous touverez ci_dessous tous nos pretations</p> 
				                </header>
			                </div>
			        </div>
			    </div>

 
 <?php
include("backend/loadbdd_backend.php");
$bdd = connect();
?>

  <div class="form"> 
	    <form action="photo_gallery_backend", method="POST" >
		      <input type="submit" value="Afficher tous les prestations" name="afficher">
		       <input type="text"  name="search" placeholder="search ">
		       <input type="submit" value="Filtrer" name="filtrer">
	    </form>
    
</div> 

<?php
if (isset($_POST['filtrer'])) {
	$search_text = $_POST['search'];
	$search_pres = '%'.$search_text.'%';

	#serch in bdd like serch input
	$query = $bdd->prepare('SELECT name_pres,price_pres,link_pres
	                      FROM prestation where name_pres like :search_pres');
	$query->execute(['search_pres'=>$search_pres]);
		while ($res = $query->fetch()) {
			   $name = $res['name_pres'];
			   $prix = $res['price_pres'];
			   $image = $res['link_pres'];
			   #afficher les prestations
			   ?>
				<div class="grid"  >
				      <img  src="<?php echo $image ;?>"/>
				      <h5 ><?php echo $name ?></h5>
				      <p ><?php echo $prix ?>€</p>
				      <form action="backend/deconnection.php", method="POST" >  
                          <input  type="submit" value="Se déconnecter" name="deconnection"  >
                        </form>
				      
			    </div>
			 <?php 
   
	    } 
}

if (isset($_POST['afficher'])) {
	$query = $bdd->query('SELECT name_pres,price_pres,link_pres
	                      FROM prestation ');
		while ($res = $query->fetch()) {
			   $name = $res['name_pres'];
			   $prix = $res['price_pres'];
			   $image = $res['link_pres'];
			   #afficher les prestations
			   ?>
					   
	            <div class="grid"  >
				      <img  src="<?php echo $image ;?>"/>
				      <h3 ><?php echo $name ?></h5>
				      <p ><?php echo $prix ?>€</p>
			       
			    </div>
			   <?php
			   	} 
}

?>
<center>
<b> <p style="font-size: 20px;font-style: italic; " >Nous localiser</p></b>

<iframe  width="80%" height="100%"   src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d2619.03360076389!2d2.3485482155592914!3d48.97188477929874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x47e6690c775c00df%3A0x8a513e46088dfc3e!2s23%20Rue%20des%20Carri%C3%A8res%2C%2095360%20Montmagny!3m2!1d48.9718848!2d2.3507369!5e0!3m2!1sfr!2sfr!4v1614374081969!5m2!1sfr!2sfr" width="600" height="450" style="border: thick double #32a1ce;" allowfullscreen="" ></iframe></center>
	       <footer id="footer">
	                <!-- Contact -->
	                  <section class="contact">
	                    <header>
	                      <h3>Salon MARAM Coiffure et Esthetique</h3>
	                    </header>
	                    <p>95 Rue Des Carrière , 95360 montmagny</p>
	                    <p>Téléphone: 09 49 19 60 60</p>
	                    <p>Portable:  09 49 19 60 55</p>
	                  </section>
	                <!-- Copyright -->
	                  <div class="copyright">
	                    <ul class="menu">
	                      <li>Institut de beauté Maram &copy; 2020 Tous droits réservés </li>
	                      <li>Réalisé par @Sarra</li>
	                    </ul>
	                  </div>
	         </footer>

</body>
</html>