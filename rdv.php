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
 
      <div >
            <div id="header">
              <div class="inner">
                <header>
                  <?php if (isset($_SESSION['name_user'])) {
                  $name = $_SESSION['name_user'];
                  echo "<h3>Bienvenue &#x269C <b>$name</b> &#x269C.</h3>";
                  }
                   ?>  
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


                                                     
              
    
 <?php
  if (isset($_POST['profil']) and isset($_SESSION['email_user'])) {
    $email_user = $_SESSION['email_user']; 
    #serch in bdd profil
    $query = $bdd->prepare('SELECT lastname_user,name_user,date_user,email_user,tel_user
                        FROM user where email_user=:email_user');
    $query->execute(['email_user'=>$email_user]);
    while ($res = $query->fetch()) {
         $last_name = $res['lastname_user'];
         $name = $res['name_user'];
         $email = $res['email_user'];
         $tel = $res['tel_user'];
         ?>
          <div class="wrapper fadeInDown">
              <div id="formContent"> 
                  <p ><b style="color: brown;">Nom:</b> <?php echo $last_name ?></p>
                  <p ><b style="color: brown;">Prénom:</b> <?php echo $name ?></p>              
                  <p ><b style="color: brown;">Email:</b> <?php echo $email ?></p>
                  <p ><b style="color: brown;">Téléphone:</b> <?php echo $tel ?></p>       
             </div>    
          </div>
        
       <?php 
   
      } 
}    
?>
<?php
if (isset($_POST['meets'])) { 
 $id_user =  $_SESSION['id_user'];    
    $query = $bdd->prepare('SELECT id_meet, name_profession ,name_pres ,date_meet ,hour_meet 
                        FROM meet M, profession P ,prestation PR  where M.id_profession = P.id_profession and  M.id_pres = PR.id_pres and M.id_user=:id_user ');
     $query->execute(['id_user'=>$id_user]);
    while ($res = $query->fetch()) {
      
        $id_meet = $res['id_meet'];
         $nameProfession = $res['name_profession'];
         $namePrestation = $res['name_pres'];
         $date_rdv = $res['date_meet'];
         $hour_meet = $res['hour_meet'];
         ?>
          <div class="wrapper fadeInDown">
              <div id="formContent"> 
                 
                <?php echo "<b style='color: brown;'>- Rendez_vous a: </b> $date_rdv - $hour_meet<b> avec</b> $nameProfession <b>pour faire un </b> $namePrestation . ";  ?>
                 
                
       
                                
             </div>    
          </div>
          
   

<?php
          
       } 
}    
?>
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