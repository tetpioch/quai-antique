<?php
session_start();
if(!ISSET($_SESSION["username"]))
{
    header('location:login.php');
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    
    <body class="bg2">
    <h1><a href="logout.php">logout</a></h1>
        <div class="container admin">
            <div class="row">
                <h1 class="display-2" style="margin-top=1000px"><strong>Liste des photos  </strong></h1>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Photo</th>
                      <th>Nom</th>
                      <th>Legende</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php

require 'db-config.php';

try
{
    $db = new PDO($dsn,DBUSER,DBPASS);
    $db->exec("SET NAMES UTF8");
}

catch(PDOException $pe)
{
    die('ERREUR : '.$pe->getMessage());
}

                        
                       
                        $statement = $db->query('SELECT * FROM photos');
                        while($photo = $statement->fetch()) {
                            echo '<tr>';
                            echo '<td>'. $photo['image'] . '</td>';
                            echo '<td>'. $photo['name'] . '</td>';
                            echo '<td>'. $photo['alt'] . '</td>';
                            echo '<td width=240>';
                            echo '<a class="btn btn-success" href="insert_photo.php?id='.$photo['id'].'"><span class="bi-plus"></span> Ajouter</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$photo['id'].'&tab=photos&name='.$photo['name'].'"><span class="bi-x"></span> Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }

                        
                      ?>
                  </tbody>
                </table>
            </div>
        </div>
        <div class="container admin">
            <div class="row">
                <h1 class="display-2"><strong>Carte  </strong></h1>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>categorie</th>
                      <th>nom</th>
                      <th>description</th>
                      <th>Prix</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        
                       
                        $statement2 = $db->query('SELECT * FROM carte');
                        while($carte = $statement2->fetch()) {
                            echo '<tr>';
                            echo '<td>'. $carte['category'] . '</td>';
                            echo '<td>'. $carte['title'] . '</td>';
                            echo '<td>'. $carte['description'] . '</td>';
                            echo '<td>'. $carte['price'] . '</td>';
                            echo '<td width=240>';
                            echo '<a class="btn btn-success" href="insert_carte.php?id='.$carte['id'].'"><span class="bi-plus"></span> Ajouter</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$carte['id'].'&tab=carte&name='.$carte['title'].'"><span class="bi-x"></span> Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }

                        
                      ?>
                  </tbody>
                </table>
            </div>
        </div>
        <div class="container admin">
            <div class="row">
                <h1 class="display-2"><strong>Horaire d'ouverture  </strong></h1>
                <table class="table table-striped table-bordered">
                  <tbody>
                      <?php
                       
                        $statement3 = $db->query('SELECT * FROM horaires');
                        while($horaire = $statement3->fetch()) {
                            echo '<tr>';
                            echo '<td><strong>'. $horaire['jour'] . '</strong></td>';
                            echo '<td>'. $horaire['midi'] . '</td>';
                            echo '<td>'. $horaire['soir'] . '</td>';
                            echo '<td width=140>';
                            echo '<a class="btn btn-primary" href="update.php?id='.$horaire['id'].'"><span class="bi-pencil"></span> Modifier</a>';
                            
                            echo '</td>';
                            echo '</tr>';
                        }
                      ?>
                  </tbody>
                </table>
              </div>
        </div>
    
        <?php
        
        $email = $password = "";

        if (!empty($_POST)) {
          $email             = checkInput($_POST['email']);
          $password          = checkInput($_POST['password']);
          
          $statement4 = $db->prepare("UPDATE users  set email = ?, password = ? WHERE usertype = 'admin'");
          $statement4->execute(array($email,$password)); }
         
          
          function checkInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        
        ?>
        <section class="d-flex justify-content-center">        
            <div > 
                <h1 class="display-2">Nouvel Admin</h1>

                <div class="form-connection">    
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="email" class="h4">Addresse email</label>
                            <input type="email" class="form-control" name="email"  required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="h4">password</label>
                            <input type="password" class="form-control" name="password" required>   
                        </div>
                        <div class="d-flex justify-content-center"><button type="submit" class="btn btn-primary btn-form">Changer</button></div>
                    </form>
                </div>   
            </div> 
        </section>
    
    
      </body>
</html>
