<!DOCTYPE html>
<html lang="en">
      
      <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Carte du Restaurant</title>
          <link href="./css/style.css" rel="stylesheet" />
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
          <link rel="preconnect" href="https://fonts.googleapis.com">
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
          <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
      </head>

      <body class="bg2">
          
          <header>
            <nav class="navbar navbar-2 navbar-expand-lg navbar-dark py-3 fs-3">
              <div class="container-fluid">
                <a class="navbar-brand fs-1 text-white" href="index.php">Le Quai Antique</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                  <ul class="navbar-nav">
                   
                    <li class="nav-item">
                      <a class="nav-link nav-link-2 text-white" href="./admin/reservation.php">Réservation</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./admin/login.php"><button type="submit" class="btn btn-primary">Connexion</button></a>
                    </li>                  
                  </ul>
                </div>
              </div>
            </nav>
          </header>

          <section class="carte">
            <div class="items-carte"> 
              <div>
                  <h1 class="display-1">Carte du Restaurant</h1><hr class="border border-dark border-1 opacity-50 separateur">
              </div>
              <div>
                  
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
              
  echo'            <h4 class="display-4">Les Entrées</h4><hr class="border border-dark border-1 opacity-50 separateur2">'."\n";
        
        
        $sql3= "SELECT * FROM carte WHERE category = 'entrée'";

        $requete3 = $db->query($sql3);  
        $requete3->setFetchMode(PDO::FETCH_ASSOC);

        $entrées = $requete3->fetchAll();
         
        foreach ($entrées as $entrée) {
        
        
      
      echo'                <p class="display-6 ">'.$entrée['title'].'</p>'."\n";
      echo'                <p >'.$entrée['description'].'</p>'."\n";
      echo'                <p >'.$entrée['price'].'</p>'."\n"; }
                     
        
  echo'             <h4 class="display-4">Les Plats</h4><hr class="border border-dark border-1 opacity-50 separateur2">'."\n";
      
        $sql4= "SELECT * FROM carte WHERE category = 'plat'";

        $requete4 = $db->query($sql4);  
        $requete4->setFetchMode(PDO::FETCH_ASSOC);

        $plats = $requete4->fetchAll();
        
        foreach ($plats as $plat) {
                      

                  
      echo'                <p class="display-6 ">'.$plat['title'].'</p>'."\n";
      echo'                <p >'.$plat['description'].'</p>'."\n";
      echo'                <p >'.$plat['price'].'</p>'."\n"; } 
                      
                      
                      
  echo'              <h4 class="display-4">Les Desserts</h4><hr class="border border-dark border-1 opacity-50 separateur2">'."\n";
                      
        $sql5= "SELECT * FROM carte WHERE category = 'dessert'";

        $requete5 = $db->query($sql5);  
        $requete5->setFetchMode(PDO::FETCH_ASSOC);

        $desserts = $requete5->fetchAll();

        foreach ($desserts as $dessert) {       
          
          
      echo'                <p class="display-6 ">'.$dessert['title'].'</p>'."\n";
      echo'                <p >'.$dessert['description'].'</p>'."\n";
      echo'                <p >'.$dessert['price'].'</p>'."\n"; } 
                      
                     
                   
  echo'             <h4 class="display-4">Les Menus</h4><hr class="border border-dark border-1 opacity-50 separateur2">'."\n";

        $sql6= "SELECT * FROM carte WHERE category = 'menu'";

        $requete6 = $db->query($sql6);  
        $requete6->setFetchMode(PDO::FETCH_ASSOC);

        $menus = $requete6->fetchAll();

        foreach ($menus as $menu) {  


      echo'                 <p class="display-6 ">'.$menu['title'].'</p>'."\n";
      echo'                 <p >'.$menu['description'].'</p>'."\n";
      echo'                 <p >'.$menu['price'].'</p>'."\n"; }  ?>
                            
                      

              </div>
            </div>   
          </section>
        
<section class="bg">
          <div class="button-xxl-2">
            <a href="./admin/reservation.php"><button type="button" class="btn btn-xxl-2 btn-lg">Réserver une table</button></a>
          </div>
        </section>
        
        
        <section  class="section-horaires bg">
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

      </body>
</html>