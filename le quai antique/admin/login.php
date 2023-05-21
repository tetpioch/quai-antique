<?php
require 'db-config.php';

session_start();

try
{
    $db = new PDO($dsn,DBUSER,DBPASS);
    $db->exec("SET NAMES UTF8");
}

catch(PDOException $pe)
{
    die('ERREUR : '.$pe->getMessage());
}

$email = $_POST["email"]?? 0;
$password = $_POST["password"]?? 0;

$sql="SELECT * FROM users where email ='".$email."' AND password ='".$password."'"; 

$requete7 = $db->query($sql);  
$requete7->setFetchMode(PDO::FETCH_ASSOC);
$row = $requete7->fetch();

$name = $row["name"]?? 0;
 

if (isset($row["usertype"]) && $row["usertype"] == "user") {
        $_SESSION["username"] = $name; 
        header('location:../index.php');
}


if (isset($row["usertype"]) && $row["usertype"] == "admin") {
    $_SESSION["username"] = $name; 
    header('location:admin.php');
}





?>
<!DOCTYPE html>

<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="wnameth=device-wnameth, initial-scale=1.0">
        <title>Connection</title>
        <link href="../css/style.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    </head>


    <body class="bg3">
        
        
        <section class="d-flex justify-content-center">        
            <div class="cadre bg1"> 
            
                <a href="../index.php"><h1 class="display-2">Le Quai Antique</h1></a>

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
                        
                        <div class="d-flex justify-content-center"><button type="submit" class="btn btn-primary btn-form">Connexion</button></div>
                    </form>
                </div>   
                
            </div> 
        </section>
     
    </body>
</html>