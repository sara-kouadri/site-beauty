<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  
  <link rel="stylesheet" href="assets/css/subscribe_reservation_css.css" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <title>Institut de beauté MARAM/Tarifs</title>
</head>
 <body class="homepage">
<?php
# CONNEXION BDD
include("backend/loadbdd_backend.php");
$bdd = connect();

?>
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
                  <?php if (isset($_SESSION['name_user'])) {
                  $name = $_SESSION['name_user'];
                  echo "<h3>Bienvenue &#x269C <b>$name</b> &#x269C.</h3>";
                  }?>
                  <div id="myform">
                        <!--  Forms -->
                        <form action="rdv.php", method="POST" >  
                          <input  type="submit"   value=" Mes rendez_vous" name="meets" >
                        </form>  
                       <form action="rdv.php", method="POST" >  
                          <input  type="submit" value="Mon profil" name="profil"  >
                        </form>    
                         <form action="choose_meet.php", method="POST" >  
                          <input  type="submit" value="Prendre un rendez_vous" name="rdv" >
                        </form>
                        <form action="backend/deconnection.php", method="POST" >  
                          <input  type="submit" value="Se déconnecter" name="deconnection"  >
                        </form>
                    </div>
                  <div class="wrapper fadeInDown">
                      <div id="formContent">
                        <form action="backend/rdv_backend.php", method="POST" required>
                            <h2 >Choisir un rendez_vous </h2>
                             <h5 style="color: brown"> Choisissez votre coiffeuse ,préstation et date/heure*  </h5>
                            <select name="profession">
                              
                            <?php
                               $query = $bdd->query('SELECT name_profession
                                FROM profession  ');
                                    while ($res = $query->fetch()) {
                                      $profession = $res['name_profession'];
                                      echo "<option id='$profession'> $profession </option>";
                                    }
                             ?>
                            </select><br>
                            <select name="prestation">  
                            <?php
                               $query = $bdd->query('SELECT name_pres
                                FROM prestation  ');
                                    while ($res = $query->fetch()) {
                                      $pres = $res['name_pres'];
                                      echo "<option id='$pres'> $pres </option>";
                                    }
                             ?>
                            </select><br>
                            <input  type="date"  name="date" min="2021-03-01" max="2021-12-31"required>
                            <input  type="time"   name="time" min="09:00" max="18:00" required> <br>
                            <input  type="submit" value="Valider" name="Submit">
                                 <?php if(isset($_COOKIE['affecter_rdv'])){ 
                                  echo "<p style  ='color: green'> votre rendez_vous a été bien enregistré  </p>";} ?>
                                  <?php if(isset($_COOKIE['rdv_existant'])){ 
                                  echo "<p style  ='color: green'>rendez_vous existe deja vouillez  choisir un autre rendez_vous </p>";}
                                 
                               

                                  ?>
                          </form>
                      </div>    
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