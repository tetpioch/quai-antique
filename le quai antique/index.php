<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quai Antique</title>
        <link href="./css/style.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </head>



    <body class="bg1">

        <section class="background-image">
          
          <header>
            <nav class="navbar navbar-expand-lg navbar-light py-4 fs-2" >
                <div class="container-fluid">
                  <a class="navbar-brand  text-white" href="./admin/reservation.php">Le Quai Antique</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link nav-link-1 text-white" href="menu.php">La Carte</a>
                      </li>     
                      <li class="nav-item">
                        <?php if(ISSET($_SESSION["username"]))
                        {echo'<a class="nav-link nav-link-1 text-white" href="./admin/logout.php"><button type="submit" class="btn btn-primary">'.$_SESSION["username"].'</button></a>';} ;
                        if(!ISSET($_SESSION["username"]))
                        {echo'<a class="nav-link" href="./admin/login.php"><button type="submit" class="btn btn-primary">Connexion</button></a>';} ;
                        ?> 
                      </li>                  
                    </ul>
                  </div>
                </div>
            </nav>
          </header>

        </section>
        
          
        
        <section class="galerie-images">
          
            <div><h1 class="display-2">Un véritable voyage culinaire</h1></div><hr class="border border-1 border-dark opacity-50 separateur">
           
            <?php           

                  require './admin/db-config.php';


                          try
                          {
                              $db = new PDO($dsn,DBUSER,DBPASS);
                              $db->exec("SET NAMES UTF8");
                          }

                          catch(PDOException $pe)
                          {
                              die('ERREUR : '.$pe->getMessage());
                          }
                        
               
            
       echo ' <div class="container"> '."\n"."\t"."\t"."\t"."\t" ;
                   

                    $sql= "SELECT * FROM photos";

                   $requete = $db->query($sql);  
                   $requete->setFetchMode(PDO::FETCH_ASSOC);

                   $photos = $requete->fetchAll();
                    
                   foreach ($photos as $photo) {
              echo' <figure class="img"> ;' ;
              echo '<img src="./images/'.$photo['image'].'" alt="'.$photo['alt'].'">  ' ;
              echo' <figcaption>'.$photo['name'].'</figcaption>' ;
              echo'  </figure>'."\n"."\t"."\t"."\t"."\t" ; } ;   ?> 
                  
            </div>
            
            <div><h1 class="display-2">Une cuisine authentique et sans artifices</h1></div><hr class="border border-dark border-1 opacity-50 separateur">

            <div class="button-xxl-2">
                <a href="./admin/reservation.php"><button type="button" class="btn btn-xxl-2 btn-lg">Réserver une table</button></a>
            </div>
        
        </section>
        
        
          

          <section  class="section-horaires">
               <div  class="horaires">
                 <h2 class="display-3">Horaires d'ouverture</h2><hr class="border border-dark border-1 opacity-50 separateur2">
                        <div class="d-flex justify-content-center">
                          <table class="table_horaires table ">
                          <tbody>
                    <?php  $statement3 = $db->query('SELECT * FROM horaires');
                        while($horaire = $statement3->fetch()) {
                            echo '<tr>';
                            echo '<td><strong>'. $horaire['jour'] .'</strong></td>';
                            echo '<td>'. $horaire['midi'] .'<br>'. $horaire['soir'] . '</td>';
                            echo '</tr>';   } ?>
                            </tbody>
                          </table>
                        </div>
                </div>
            </section> 
        
        
        
        <footer>
          <h1>Le Quai Antique</h1>
          <div class="copyright">Copyright © Tous droits réservés.</div>
        </footer>
        
        
        <script>
          AOS.init({
            duration: 2000,
          });
        </script>


    </body>
</html>