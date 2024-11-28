<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Inscription</title>  <link rel="icon" type="image/png" href="img/logo.png">
  
  <!--style pages-->
  <link rel="stylesheet" href="css.css">
  <!-- LINK -->
  <script src="notifications.js" defer></script>


</head>


          <?php

                $email=$_POST["email"];
                $prenom=$_POST["prenom"];
                $nom=$_POST["nom"];
                $mdp=$_POST["mdp"];

                /*--------------------------*/

                $servername="localhost";
                $username="root";
                $password="Tigrou007";
                $db="asmontigny";

                $conn = new mysqli($servername, $username, $password, $db);

                // Vérification de la connexion à la base de données
                if ($conn->connect_error) {
                  echo "erreur de connexion à la base de données"; 

                    echo '<script>
                    window.onload = function() {
                      document.getElementById("error").click();
                    }
                  </script>'; 

                } else {
                    echo('-Connexion à la base de données réussie<br>');
                
                    // Requête pour vérifier les doublons dans la table "clients" en utilisant la vale0ur de la variable $email
                    $testdoublon = "SELECT * FROM client WHERE email='" . $email . "';";
                    $result = $conn->query($testdoublon);
                
                    if (!$result) {
                        echo "Échec de l'envoi de la requête de vérification des doublons<br>";
                        echo '<script>
                        window.onload = function() {
                          document.getElementById("error").click();
                        }
                      </script>'; 
                    } else {
                        echo "-Envoi de la requête de vérification des doublons réussi<br>";
                        
                        $nbrlignes = $result->num_rows;
                
                        // Si aucun doublon n'est trouvé, effectuer l'ajout du client
                        if ($nbrlignes == 0) {
                          $ajout = "INSERT INTO client(email, prenom, nom, mdp)
                          VALUES('" . $email . "','" . $prenom . "','" . $nom . "','" . md5($mdp) . "');";
                
                
                            $result = $conn->query($ajout);
                            if (!$result) {
                                echo "-Échec de la requête d'ajout dans la table clients<br>";
                                echo '<script>
                                window.onload = function() {
                                  document.getElementById("error").click();
                                }
                              </script>'; 
                            } else {
                                echo "Ajout réussi dans la table clients<br>";
                                echo '<script>
                                window.onload = function() {
                                  document.getElementById("success").click();
                                }
                              </script>'; 
                              header("location:boutique.php");// Redirection vers la page "boutique.html"
                            }
                        } else {
                            echo "<h1>- Client déjà existant</h1>";
                            echo '<script>
                            window.onload = function() {
                              document.getElementById("error").click();
                            }
                          </script>'; 
                            
                             // Redirection vers la page "boutique.html"
                        }
                    }
                }
                
                $conn->close(); // Fermeture de la connexion à la base de données

       
        
          ?>

<ul class="notifications"></ul>

<div class="buttons" style="display:none;">
  <button class="btn" id="success">Success</button>
  <button class="btn" id="error">Error</button>
  <button class="btn" id="warning">Warning</button>
  <button class="btn" id="info">Info</button>
</div>


</body>
</html>

