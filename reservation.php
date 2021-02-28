<?php
  session_start();
?>
<?php
   if (isset($_SESSION['email_user']))   {
    header('Location: http://localhost/Site_Coiffure/rdv.php');}
    else{
   ?>
<!DOCTYPE html>
<html>

<head>
	
	<link rel="stylesheet" href="assets/css/subscribe_reservation_css.css" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<title>Institut de beauté MARAM/Reservation</title>
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


        <div id="header">
              <div class="inner">
                <header>
                    <h1><a >Salon de beauté MARAM</a></h1>
                    <h2 >Coiffure - Esthétique </h2>
                    <hr />
                    <div class="wrapper fadeInDown">
                      <div id="formContent">
                            <!-- Lconnection Form -->
                            <form action="backend/connection_user_backend.php", method="POST" >
                                <h2 >Se connecter </h2>
                                <input type="text"  name="email" placeholder="email" required>
                                            <?php if(isset($_COOKIE['error_faux_mail'])){ 
                                            echo "<p style  ='color: red'> Cet email n'existe pas</p>";} 
                                                                                                       
                                                    ?>
                                <input type="password"   name="password" placeholder="Mot de passe" required>
                                            <?php if(isset($_COOKIE['error_faux_password'])){ 
                                            echo "<p style  ='color: red'> Mot de passe incorrecte </p>";} 
                                                                                                       
                                                    ?>
                                <input type="submit" value="Valider">
                          </form>

                    <!-- link subscribe -->
                    <div >
                      <a style="color: black;" href="subscribe.php">S'inscrire</a>
                    </div>     
                </header>
              </div>
        </div>
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
<?php
    }
   ?>