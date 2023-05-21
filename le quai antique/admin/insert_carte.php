<?php
     
     
    $categoryError = $nameError = $descriptionError = $priceError = $category = $name = $description = $price = "";

    if(!empty($_POST)) {
        $category             = checkInput($_POST['category']);
        $name                 = checkInput($_POST['name']);
        $description          = checkInput($_POST['description']);
        $price                = checkInput($_POST['price']);
        $isSuccess            = true;
       
        
        if(empty($category)) {
            $categoryError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($name)) {
            $nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($description)) {
            $descriptionError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($price)) {
            $priceError = 'Ce champ ne peut pas être vide';
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
   
 
            $statement5 = $db->prepare("INSERT INTO carte (category,title,description,price) values(?, ?, ?, ?)");
            $statement5->execute(array($category,$name,$description,$price));
            
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
        <title>Insert Carte</title>
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
                <h1><strong>Ajouter sur la Carte</strong></h1>
                <br>
                <form class="form" action="insert_carte.php" role="form" method="post" enctype="multipart/form-data">
                    <br>
                    <div>
                        <label class="form-label" for="category">Catégorie</label>
                        <select type="text" class="form-control" id="category" name="category"  value="<?php echo $category;?>">
                        <option value="">-- Choisir une option --</option>
                            <option value="dessert">Entrée</option>
                            <option value="plat">Plat</option>
                            <option value="dessert">Dessert</option>
                            <option value="menu">Menu</option>
                        </select>
                        <span class="help-inline"><?php echo $categoryError;?></span>
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name"  value="<?php echo $name;?>">
                        <span class="help-inline"><?php echo $nameError;?></span>
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description"  value="<?php echo $description;?>">
                        <span class="help-inline"><?php echo $descriptionError;?></span>
                    </div>
                    <div>
                        <label class="form-label" for="price">Prix</label>
                        <input type="text" class="form-control" id="price" name="price"  value="<?php echo $price;?>">
                        <span class="help-inline"><?php echo $priceError;?></span>
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