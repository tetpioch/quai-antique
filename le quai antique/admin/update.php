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


    if (!empty($_GET['id'])) {
        $id = checkInput($_GET['id']);
    }

    $midi_Error = $midi = $soir = "";

    if (!empty($_POST)) {
        $midi        = checkInput($_POST['midi']);
        $soir        = checkInput($_POST['soir']);
        $isSuccess    = true;
       
        if (empty($midi)) {
            $midi1_Error = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
       
        
         
        if ($isSuccess) { 
           
                $statement8 = $db->prepare("UPDATE horaires  set midi = ?, soir = ? WHERE id = ?");
                $statement8->execute(array($midi,$soir,$id));
                header("Location: admin.php");
           
        }
    } else {
        $statement9 = $db->prepare("SELECT * FROM horaires where id = ?");
        $statement9->execute(array($id));
        $horaires = $statement9->fetch();
        $midi    = $horaires['midi'];
        $soir    = $horaires['soir'];
        $jour     = $horaires['jour'];
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
    <title>changer horaires</title>
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
       
        <div class="container admin">
            <div class="row">
                <div class="col-md-6">
                    <h1><strong><?php echo $jour ?></strong></h1>
                    <br>
                    <form class="form" action="<?php echo 'update.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
                        <br>
                        <div>
                            <label class="form-label" for="midi">horaire 1</label>
                            <input type="text" class="form-control" id="midi" name="midi"  value="<?php echo $midi;?>">
                            <span class="help-inline"><?php echo $midi_Error;?></span>
                        </div>
                        <br>
                        <div>
                            <label class="form-label" for="soir">horaire 2</label>
                            <input type="text" class="form-control" id="soir" name="soir"  value="<?php echo $soir;?>">
                            
                        </div>
                        <br>
                        
                        <br>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><span class="bi-pencil"></span> Modifier</button>
                            <a class="btn btn-primary" href="admin.php"><span class="bi-arrow-left"></span> Retour</a>
                       </div>
                    </form>
                </div>
           
        </div>   
    </body>
</html>
