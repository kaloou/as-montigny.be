<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>AS Montigny - Site officiel</title>
    <link rel="icon" type="image/png" href="../img/logo.png" />

    <!--javascript-->
    <script defer src="../javascript/script.js"></script>
    <!--css-->
    <link rel="stylesheet" href="../css/p-accueil.css" />
    <link rel="stylesheet" href="../css/base.css" />
    <link rel="stylesheet" href="../css/components.css" />
    <link rel="stylesheet" href="../css/layout.css" />
    <link rel="stylesheet" href="../css/responsive.css" />
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  </head>

<body class="body-boutique">

  <!-----Menu de Navigation----->
  <div class="background-header">

  <header>


    <!--top nav-->

    <div class="top">

      <div class="socialmedia">

        <a href="https://www.instagram.com/as_montigny/?hl=fr">
          <img src="img/logo-instagram2.png" class="icon" alt="instagram">
        </a>
        <a href="">
          <img src="img/logo-facebook.png" class="icon" alt="facebook">
        </a>
        <a
          href="https://goo.gl/maps/GkPM55x6QD1F4kCQ7">
          <img src="img/logo-google.png" class="icon" alt="google">
        </a>

      </div>

    </div>


    <!--logo nav-->

    <div class="logocontainer">

        <a href="asmontigny.html">
        <img src="img/logo.png" id="logo" alt="logo">
        </a>

    </div>

    <!-- barre de nav -->

    <nav class="navcontainer">

      <ul class="menu">
        <!-- Equipes -->
        <li>
          <a href="#" class="main-point">Equipes</a>

          <ul class="sub-menu">

            <li>
              <a href="kids.html" class="point">Kids</a>

              <ul class="second-sub-menu">

                <li><a href="kids.html#u6" class="second-point">U6</a></li>
                <li><a href="kids.html#u7" class="second-point">U7</a></li>
                <li><a href="kids.html#u9" class="second-point">U9</a></li>
                <li><a href="kids.html#u11" class="second-point">U11</a></li>
                <li><a href="kids.html#u12" class="second-point">U12</a></li>

              </ul>

            </li>

            <li>
              <a href="jeunes.html" class="point">Jeunes</a>

              <ul class="second-sub-menu">

                <li><a href="jeunes.html#u13" class="second-point">U13</a></li>
                <li><a href="jeunes.html#u14" class="second-point">U14</a></li>
                <li><a href="jeunes.html#u15" class="second-point">U15</a></li>
                <li><a href="jeunes.html#u16" class="second-point">U16</a></li>
                <li><a href="jeunes.html#u19" class="second-point">U19</a></li>

              </ul>

            </li>

            <li>
              <a href="premiere.html" class="point">Premiere</a>

              <ul class="second-sub-menu">

                <li><a href="premiere.html#p4" class="second-point">P4</a></li>
                <li><a href="premiere.html#p3" class="second-point">P3</a></li>
                <li><a href="premiere.html#senior" class="second-point">Senior</a></li>

              </ul>

            </li>

          </ul>
        </li>
        <!-- Evenements -->
        <li>
          <a href="event.html" class="main-point">Evénements</a>
        </li>
        <!-- Club -->
        <li>
          <a href="" class="main-point">Club</a>

          <ul class="sub-menu">

            <li>
              <a href="histoire.html" class="point">Histoire</a>
            </li>

            <li>
              <a href="Asmontigny.html#sponsor-container" class="point">Sponsor</a>
            </li>

            <li>
              <a href="projet.html" class="point">Projet</a>
            </li>

          </ul>

        </li>
        <!-- Contact -->
        <li>
          <a href="contact.html" class="main-point">Contact</a>
        </li>
      
        <!-- Boutique -->
        <li>
          <a href="boutique.php" class="main-point">Boutique</a>
        </li>

        <li>
          <i class='bx bxs-shopping-bag ' id="cart-icon"></i>
        </li>

        <li>
          <button class='loginbtn main-point'
           onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">
            <a class="maint-point">Se connecter</a>
          </button>
        </li>


      </ul>

    </nav>
 
  </header>
</div>


<!-- -------------------------------------- -->
           

           <!-- Cart -->
           <div class="cart">

            <h2 class="cart-title">Votre Panier</h2>

            <!-- Content -->
            <div class="cart-content">

          
            </div>

            <!-- Total -->
            <div class="total">
                <div class="total-title">Total</div>
                <div class="total-price">0€</div>
            </div>

            <!-- buy button -->
            <button type="button" class="btn-buy">Acheter mainteant</button>
              
            <!-- Cart Close -->
            <i class='bx bx-x' id="close-cart"></i>

        </div>
</div>


      
        <!-- login page -->
<div id='login-form' class='login-page'>

  <div class="form-box">

      <button class="hide-login-btn" onclick="hideLoginForm()"><i class='bx bx-x'></i></button>

      <div class='button-box'>
          <div id='btn'></div>
          <button type='button' onclick='login()' class='toggle-btn'>Login</button>
          <button type='button' onclick='register()' class='toggle-btn'>Inscription</button>
      </div>

      <form id='login' class='input-group-login' action="#" method="post">

          <input type='text'  name='email' class='input-field' placeholder='Email Id' required>
          <input type='password' name='mdp'class='input-field' placeholder='Enter Password'required>
          <input type='checkbox' class='check-box'><span>Remember Password</span>
          <button type='submit' class='submit-btn'>Se connecter</button>

      </form>

      <form id='register' class='input-group-register' action="inscription.php" method="post">

          <input type='text' name="prenom" class='input-field' placeholder='Prénom'  required>
          <input type='text' name="nom" class='input-field' placeholder='Nom'  required>
          <input type='email' name="email" class='input-field' placeholder="Email"  required>
          <input type='text' name='mdp' class='input-field' placeholder='mot de passe'  required>
          <input type='password' name='confirmPassword' class='input-field' placeholder='Confirmer mot de passe'  required>
          <input type='checkbox' class='check-box'><span>J'accepte les conditions d'utilisations</span>
          <button type='submit' class='submit-btn'>S'inscrire</button>

      </form>

  </div>

</div>

            <script>
                var x=document.getElementById('login');
                var y=document.getElementById('register');
                var z=document.getElementById('btn');
                function register()
                {
                x.style.left='-400px';
                y.style.left='50px';
                z.style.left='110px';
                }
                function login()
                {
                x.style.left='50px';
                y.style.left='450px';
                z.style.left='0px';
                }
                //------------------------
                var modal = document.getElementById('login-form');
                window.onclick = function(event) 
                {
                if (event.target == modal) 
                {
                    modal.style.display = "none";
                }
                }

                function hideLoginForm() {
                var loginForm = document.getElementById('login-form');
                loginForm.style.display = 'none';
                }
            </script>


<!-- shop -->
<div id="container-boutique">
<section class="shop container">
<h2 class="titre">Notre<span> Boutique</span></h2>

    <!-- content -->
        <div class="shop-content">
        <!-- Box 1 -->
        <div class="product-box">

            <img src="img/boutique-VESTE A CAPUCHON CHAMP.jpg" alt="" class="product-img">
            <h2 class="product-title">Veste à capuchon</h2>
            <span class="price">25€</span>
            <i class='bx bx-shopping-bag add-cart'></i>

         </div>
          <!-- Box 2 -->
          <div class="product-box">

            <img src="img/boutique-T-Shirt Champ.jpg" alt="" class="product-img">
            <h2 class="product-title">T-shirt champ</h2>
            <span class="price">15€</span>
            <i class='bx bx-shopping-bag add-cart'></i>

         </div>
            <!-- Box 3 -->
            <div class="product-box">

                <img src="img/boutique-POLO CHAMP 2.0.jpg" alt="" class="product-img">
                <h2 class="product-title">Polo champ</h2>
                <span class="price">17.5€</span>
                <i class='bx bx-shopping-bag add-cart'></i>

             </div>
          <!-- Box 4 -->
          <div class="product-box">

            <img src="img/boutique-PANTALON POLYESTER.jpg" alt="" class="product-img">
            <h2 class="product-title">Training</h2>
            <span class="price">25€</span>
            <i class='bx bx-shopping-bag add-cart'></i>

         </div>
            <!-- Box 5 -->
            <div class="product-box">

                <img src="img/boutique-JAKO Veste coach Team.png" class="product-img">
                <h2 class="product-title">Veste Coach Black</h2>
                <span class="price">60€</span>
                <i class='bx bx-shopping-bag add-cart'></i>

             </div>
          <!-- Box 6 -->
          <div class="product-box">

            <img src="img/maillot1.png" alt="img/boutique-SWEAT CHAMP 2.0.jpg" class="product-img">
            <h2 class="product-title">Maillot extérieur</h2>
            <span class="price">20€</span>
            <i class='bx bx-shopping-bag add-cart'></i>

         </div>
             <!-- Box 7 -->
             <div class="product-box">

                <img src="img/boutique-T-shirt Club-prenom.png"alt="" class="product-img">
                <h2 class="product-title">T-shirt prenom</h2>
                <span class="price">15€</span>
                <i class='bx bx-shopping-bag add-cart'></i>

             </div>
                 <!-- Box 8 -->
          <div class="product-box">

            <img src="img/boutique-T-shirt Club-maman.png" alt="" class="product-img">
            <h2 class="product-title">T-Shirt maman</h2>
            <span class="price">15€</span>
            <i class='bx bx-shopping-bag add-cart'></i>

         </div>
         <!-- Box 9 -->
         <div class="product-box">

          <img src="img/boutique-Kit Training.jpg" alt="" class="product-img">
          <h2 class="product-title">Kit Training</h2>
          <span class="price">45€</span>
          <i class='bx bx-shopping-bag add-cart'></i>

       </div>
<!-- Box 10-->
       <div class="product-box">

        <img src="img/boutique-Veste softshell light.jpg" alt="" class="product-img">
        <h2 class="product-title">Veste softshell</h2>
        <span class="price">39€</span>
        <i class='bx bx-shopping-bag add-cart'></i>

     </div>
<!-- Box 11 -->
     <div class="product-box">

      <img src="img/boutique-Kit Match2.png" alt="" class="product-img">
      <h2 class="product-title">kit Match</h2>
      <span class="price">45€</span>
      <i class='bx bx-shopping-bag add-cart'></i>

   </div>
<!-- Box 12 -->
   <div class="product-box">

    <img src="img/boutique-SWEAT CHAMP 2.0.jpg" alt="" class="product-img">
    <h2 class="product-title">Sweat Champ</h2>
    <span class="price">25€</span>
    <i class='bx bx-shopping-bag add-cart'></i>

 </div>

        </div>

</section>
</div>




<div class="body">

  <ul class="notifications"></ul>

  <div class="buttons" style="display:none;">
    <button class="btn" id="success">Success</button>
    <button class="btn" id="error">Error</button>
    <button class="btn" id="warning">Warning</button>
    <button class="btn" id="info">Info</button>
  </div>

</div>





<!--------Footer---------->

<footer>

  <div class="logocontainer-footer">

    <a href="asmontigny.html">
    <img src="img/logo.png" id="logo-footer" alt="logo">
    </a>

  </div>


  <div class="footer-container">

    <div class="footer-section">

      <h3>À Propos
        <hr class="hr-footer-1">
      </h3>

      <p>L'AS Montigny est un club de football
        amateur fondé en 1985 et situé à Montigny-le-tilleul,
        à Charleroi. Notre club a pour objectif
        de promouvoir le football amateur et de donner
        l'opportunité à tous les passionnés de ce sport de
        jouer dans un environnement convivial.
      </p>

    </div>

    <div class="footer-section-small">

      <h3>Equipes
        <hr class="hr-footer-2">
      </h3>

      <ul class="liens-footer">
        <li><a href="kids.html">Kids</a></li>
        <li><a href="jeunes.html">Jeunes</a></li>
        <li><a href="premiere.html">Premiere</a></li>
        <li><a href="senior.html">Senior</a></li>
      </ul>

  </div>

  <div class="footer-section-small">

      <h3>Club
        <hr class="hr-footer-3">
      </h3>

      <ul class="liens-footer">
        <li><a href="boutique.html">Boutique</a></li>
        <li><a href="histoire.html">Histoire</a></li>
        <li><a href="sponsor.html">Sponsor</a></li>
        <li><a href="projet.html">Projet</a></li>
      </ul>

  </div>

  


  <div class="footer-section">

      <h3>Contact
        <hr class="hr-footer-2">
      </h3>

      <p><img src="img/icon-localisation.png" class="icon-footer"> Rue Bois Frion 109, 6110 Montigny-le-Tilleul</p>
      <p><img src="img/icon-tel.png" class="icon-footer" alt=""> 0495/282992</p>
      <p><img src="img/icon-mail.png" class="icon-footer" alt=""> michael.dupont@outlook.com</p>
      <p><img src="img/icon-horraire.png" alt="" class="icon-footer"> 9H / 19H</p>


    </div>

  </div>

  <!-- Social icon -->

   <div class="social-icon-container">

    <a href="https://www.instagram.com/as_montigny/?hl=fr" class="social-icon">
      <img src="img/logo-instagram.png" class="icon-taille" alt="">
    </a>

    <a href="https://www.facebook.com/footmontigny" class="social-icon">
      <img src="img/logo-facebook.png" class="icon-taille" alt="">
    </a>

    <a href="https://goo.gl/maps/GkPM55x6QD1F4kCQ7" class="social-icon">
      <img src="img/logo-google.png" class="icon-taille" alt="">
    </a>

    <a href="https://youtube.com/@asmontigny2175" class="social-icon">
      <img src="img/logo-youtube.png" class="icon-taille" alt="">
    </a>

  </div>

  <!--bottom footer -->

  <div class="bottom-footer">

     <p class="copyright">Copyright &copy; 2023 Lucas Paludetto</p>
  </div>

</footer>


<!-- connexion -->
<?php
                
                $servername="localhost";            
                $username ="root";            
                $password = "Tigrou007";            
                $db="asmontigny";

                /*--------------------------*/
                if (isset($_POST['email']) && isset($_POST['mdp'])) {
                $email = $_POST['email'];
                $mdp = $_POST['mdp'];
                $mdpc = md5($mdp);
               

                //On établit la connexion         

                $conn= new mysqli($servername,$username,$password,$db);

                //On vérifie la connexion   

                if($conn->connect_error)                                
                    {                                  
                    echo('Erreur : ' .$conn->connect_error);  
                    echo '<script>
                       window.onload = function() {
                         document.getElementById("error").click();
                       }
                    </script>';                         
                    }                          
                else                                  
                    {                                        
                echo '-Connexion DATABASE OK <br>'; 
              
                 // Requête de recherche des clients avec l'email donné
                                                        
                $recherche ="Select * from client where email='".$email."';";                                        
                $result = $conn->query($recherche);  

                if(!$result)                                              
                    {                                                
                echo "-Echec de la requête sur la table client 1<br>"; 
                echo '<script>
                   window.onload = function() {
                     document.getElementById("error").click();
                   }
                </script>';                                               
                    }                                            
                else                                                
                    {                                                  
                echo "-Connexion table clients réussie";                                                  
                $nbrlignes= $result->num_rows;                                                  
                if($nbrlignes==0)                                                          
                    {                                                        
                echo "<br>-Compte inexistant !";
                echo '<script>
                   window.onload = function() {
                     document.getElementById("info").click();
                  }
                </script>';  
                                                   
                    }                                                      
                else                                                      
                    {
                  foreach($result as $enregistrement)                                                                  
                    {                                                                                                          
                  if($mdpc==$enregistrement["mdp"])                                                              
                    {                                                                  
                  echo "<br>Client connecté";
                  echo '<script>
                     window.onload = function() {
                       document.getElementById("success").click();
                     }
                  </script>';                      
                    }                                                              
                  else                                                              
                    {                                                                  
                  echo "<br>Mot de passe incorrect ";
                  echo '<script>
                     window.onload = function() {
                       document.getElementById("warning").click();
                     }
                  </script>';                                                                      
                    }     
                  }                                                   
                }                                                                  
              }   
                                         
            }
         
            $conn->close();   }

          
                                  
        
    

?>


</body>
</html>


                         
  

