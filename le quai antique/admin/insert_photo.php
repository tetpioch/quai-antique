<?php
     
     
    $imageError = $nameError = $altError = $image = $name = $alt = "";

    if(!empty($_POST)) {
        $image               = checkInput($_POST['image']);
        $name       = checkInput($_POST['name']);
        $alt              = checkInput($_POST['alt']);
        $isSuccess          = true;
       
        
        if(empty($image)) {
            $imageError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($name)) {
            $nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($alt)) {
            $altError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
       
        
        if($isSuccess) {
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
   
 
            $statement6 = $db->prepare("INSERT INTO photos (image,name,alt) values(?, ?, ?)");
            $statement6->execute(array($image,$name,$alt));
            
            header("Location: admin.php");
        }
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
        <title>Insert Photo</title>
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
        
        <div class="container">
            <div class="row">
                <h1><strong>Ajouter une photo</strong></h1>
                <br>
                <form class="form" action="insert_photo.php" role="form" method="post" enctype="multipart/form-data">
                    <br>
                    <div>
                        <label class="form-label" for="image">Image</label>
                        <input type="text" class="form-control" id="image" name="image"  value="<?php echo $image;?>">
                        <span class="help-inline"><?php echo $imageError;?></span>
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="name">Description:</label>
                        <input type="text" class="form-control" id="name" name="name"  value="<?php echo $name;?>">
                        <span class="help-inline"><?php echo $nameError;?></span>
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="alt">Légende</label>
                        <input type="text" class="form-control" id="alt" name="alt"  value="<?php echo $alt;?>">
                        <span class="help-inline"><?php echo $altError;?></span>
                    </div>
                    <br>
                    
                    <br>
                    
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="bi-pencil"></span> Ajouter</button>
                        <a class="btn btn-primary" href="admin.php"><span class="bi-arrow-left"></span> Retour</a>
                   </div>
                </form>
            </div>
        </div>   
    </body>
</html>