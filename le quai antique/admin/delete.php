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
   

 
    if (!empty($_GET['id']) && !empty($_GET['tab']) && !empty($_GET['name'])) {
        $id = checkInput($_GET['id']);
        $tab = checkInput($_GET['tab']);
        $name = checkInput($_GET['name']);
    }

    if (!empty($_POST)) {
        $id = checkInput($_POST['id']);
        $tab = checkInput($_POST['tab']);
        $statement7 = $db->prepare("DELETE FROM $tab WHERE id = $id");
        $statement7->execute();
        header("Location: admin.php"); 
    }

    function checkInput($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Burger Code</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    
    <body class="bg">
      
        <div class="container">
            <div class="row">
                <h1><strong>Supprimer un item</strong></h1>
                <br>
                <form class="form" action="delete.php" role="form" method="post">
                    <br>
                    <input type="hidden" name="id" value="<?php echo $id;?>"/>
                    <input type="hidden" name="tab" value="<?php echo $tab;?>"/>
                    <p class="alert alert-warning">Etes vous sur de vouloir supprimer <?php echo $name ?> ? </p>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-warning">Oui</button>
                      <a class="btn btn-secondary" href="admin.php">Non</a>
                    </div>
                </form>
            </div>
        </div>   
    </body>
</html>

