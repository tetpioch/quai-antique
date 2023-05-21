<!DOCTYPE html>

<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Réservation</title>
        <link href="../css/style.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    </head>


    <body class="bg3">  
        <header>
              
          <nav class="navbar navbar-reserv navbar-expand-lg navbar-light py-1 fs-3">
              <div class="container-fluid">
                <a class="navbar-brand fs-1 text-white" href="../index.php">Le Quai Antique</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                  <ul class="navbar-nav">
                    <!-- <li class="nav-item">
                      <a class="nav-link active nav-link-2 text-white" aria-current="page" href="index.html">Accueil</a>
                    </li> -->
                    <li class="nav-item">
                      <a class="nav-link nav-link-2 text-white" href="../menu.php">La carte</a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link nav-link-2 text-white" href="reservation.html">Réservation</a>
                    </li> -->
                    <li class="nav-item">
                      <a class="nav-link" href="login.php"><button type="submit" class="btn btn-primary ">Connexion</button></a>
                    </li>                  
                  </ul>
                </div>
              </div>
          </nav>
        
        </header>
          <div class="d-flex justify-content-center">
            <section class="reservation bg1"> 
          
                    <div><h1 class="display-2">Reservation</h1><hr class="border border-dark border-1 opacity-50 separateur"></div>
   
                          <form class="formulaire" name="form">                
                            <div class="d-flex flex-row date-couverts">
                              <div class="form-group">
                                <label for="date" >Date</label>
                                <input type="date" id="start" name="trip-start" >
                              </div>
                              <div class="form-group">
                                <label for="nbr-couverts" >Couverts</label>
                                <select id="nbr-couverts" >
                                  <option selected></option>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>                  
                                </select>                   
                              </div> 
                            </div>
                            <div class="form-group d-flex flex-row boite">
                              <div>
                                <div id="fieldsList-heure_midi" class="fieldsList ">
                                  <div class="fieldsListTitle">Au déjeuner </div>
                                  <div class="fields d-flex flex-wrap">
                                    <div class="radio-field" id="heure_midi-field-1">
                                    <label for="heure_midi-1" class="midi">
                                      <input type="radio" id="heure_midi-1" class="radioField" name="heure_midi" value="12:00" >
                                      <span>12h00</span>
                                    </label></div><div class="radio-field" id="heure_midi-field-2">
                                    <label for="heure_midi-2" class="midi">
                                      <input type="radio" id="heure_midi-2" class="radioField" name="heure_midi" value="12:15" >
                                      <span>12h15</span>
                                    </label></div><div class="radio-field" id="heure_midi-field-3">
                                    <label for="heure_midi-3" class="midi">
                                      <input type="radio" id="heure_midi-3" class="radioField" name="heure_midi" value="12:30" >
                                      <span>12h30</span>
                                    </label></div><div class="radio-field" id="heure_midi-field-4">
                                    <label for="heure_midi-4" class="midi">
                                      <input type="radio" id="heure_midi-4" class="radioField" name="heure_midi" value="12:45" >
                                      <span>12h45</span>
                                    </label></div><div class="radio-field" id="heure_midi-field-5">
                                    <label for="heure_midi-5" class="midi">
                                      <input type="radio" id="heure_midi-5" class="radioField" name="heure_midi" value="13:00" >
                                      <span>13h00</span>
                                    </label></div><div class="radio-field" id="heure_midi-field-6">
                                    <label for="heure_midi-6" class="midi">
                                      <input type="radio" id="heure_midi-6" class="radioField" name="heure_midi" value="13:15" >
                                      <span>13h15</span>
                                    </label></div><div class="radio-field" id="heure_midi-field-7">
                                    <label for="heure_midi-7" class="midi">
                                      <input type="radio" id="heure_midi-7" class="radioField" name="heure_midi" value="13:30" >
                                      <span>13h30</span>
                                    </label></div><div class="radio-field" id="heure_midi-field-8">
                                    <label for="heure_midi-8" class="midi">
                                      <input type="radio" id="heure_midi-8" class="radioField" name="heure_midi" value="13:45" >
                                      <span>13h45</span>
                                    </label></div><div class="radio-field" id="heure_midi-field-9">
                                    <label for="heure_midi-9" class="midi">
                                      <input type="radio" id="heure_midi-9" class="radioField" name="heure_midi" value="14h00" >
                                      <span>14h00</span>
                                    </label></div>
                                  </div>
                                </div>
                                      
                                <div id="fieldsList-heure_soir" class="fieldsList ">
                                  <div class="fieldsListTitle">Au dîner </div>
                                  <div class="fields d-flex flex-wrap">
                                    <div class="radio-field" id="heure_soir-field-1">
                                    <label for="heure_soir-1" class="soir">
                                      <input type="radio" id="heure_soir-1" class="radioField" name="heure_soir" value="19:00" checked="checked">
                                      <span>19h00</span>
                                    </label></div><div class="radio-field" id="heure_soir-field-2">
                                    <label for="heure_soir-2" class="soir">
                                      <input type="radio" id="heure_soir-2" class="radioField" name="heure_soir" value="19:15" >
                                      <span>19h15</span>
                                    </label></div><div class="radio-field" id="heure_soir-field-3">
                                    <label for="heure_soir-3" class="soir">
                                      <input type="radio" id="heure_soir-3" class="radioField" name="heure_soir" value="19:30" >
                                      <span>19h30</span>
                                    </label></div><div class="radio-field" id="heure_soir-field-4">
                                    <label for="heure_soir-4" class="soir">
                                      <input type="radio" id="heure_soir-4" class="radioField" name="heure_soir" value="19:45" >
                                      <span>19h45</span>
                                    </label></div><div class="radio-field" id="heure_soir-field-5">
                                    <label for="heure_soir-5" class="soir">
                                      <input type="radio" id="heure_soir-5" class="radioField" name="heure_soir" value="20:00" >
                                      <span>20h00</span>
                                    </label></div><div class="radio-field" id="heure_soir-field-6">
                                    <label for="heure_soir-6" class="soir">
                                      <input type="radio" id="heure_soir-6" class="radioField" name="heure_soir" value="20:15" >
                                      <span>20h15</span>
                                    </label></div><div class="radio-field" id="heure_soir-field-7">
                                    <label for="heure_soir-7" class="soir">
                                      <input type="radio" id="heure_soir-7" class="radioField" name="heure_soir" value="20:30" >
                                      <span>20h30</span>
                                    </label></div><div class="radio-field" id="heure_soir-field-8">
                                    <label for="heure_soir-8" class="soir">
                                      <input type="radio" id="heure_soir-8" class="radioField" name="heure_soir" value="20:45" >
                                      <span>20h45</span>
                                    </label></div><div class="radio-field" id="heure_soir-field-9">
                                    <label for="heure_soir-9" class="soir">
                                      <input type="radio" id="heure_soir-9" class="radioField" name="heure_soir" value="21:00" >
                                      <span>21h00</span>
                                    </label></div>

                                  </div><!-- eof fields -->
                                </div><!-- eof fieldsList heure_soir -->





                                <!-- <input type="radio" id="contactChoice1"
                                 name="contact" value="email">
                                <label for="contactChoice1">Midi</label>
                                <select id="hour" class="boite checked">
                                  <option >12:00</option>
                                  <option >12:15</option>
                                  <option >12:30</option>
                                  <option >12:45</option>
                                  <option >13:00</option>
                                  <option >13:15</option>
                                  <option >13:30</option>
                                </select> 
                                <input type="radio" id="contactChoice2"
                                 name="contact" value="telephone">
                                <label for="contactChoice2">Soir</label>
                                <select id="hour" class="boite checked">
                                  <option >19:30</option>
                                  <option >19:45</option>
                                  <option >20:00</option>
                                  <option >20:15</option>
                                  <option >20:30</option>
                                  <option >20:45</option>
                                  <option >21:00</option>
                                </select> -->
                              </div>
                                 
                            </div>
                          
                            <div class="form-group">
                                <label for="name" >Nom</label>
                                <input type="text" class="form-control" id="name" >   
                            </div>
                            
                            <div class="form-group">
                              <label for="allergie" >Demandes particulières ( intolérences, allergies, autre... )</label>
                              <textarea rows="4"  class="form-control" id="allergie" ></textarea>
                            </div>                        
                            <div class="form-group">
                              <label for="email" >Addresse email</label>
                              <input type="email" class="form-control" id="email" >
                            </div>
                            <div class="d-flex flex-row">   
                              <div class="form-group memorize">
                                <label for="memorize" >Se souvenir de moi</label>
                                <input type="checkbox" id="memorize" name="memorize"  >
                              </div>
                              <div class="form-group password checked">
                                <label for="password" >Password</label>
                                <input type="password" id="pass" name="password" minlength="8" required>
                              </div>
                            </div>
                            <div class="d-flex justify-content-center">
                              <button type="submit" class="btn btn-primary btn-form">Envoyer</button>
                            </div>
                          </form>
                       
            </section> 
          </div>
        
        
        
        
        
      
        <script>
           
           var checkbox = document.querySelector("input[type=checkbox]"),
           container = document.querySelector(".password");
           checkbox.addEventListener("change", () => {
                  if (checkbox.checked) {container.classList.remove("checked");}
                  else {container.classList.add("checked");} });
           
                  
                  
           
           var radios_midi = document.forms["form"].elements["heure_midi"];
           var x = document.getElementsByClassName('midi'); 
           midi_max = 9;

                for(var i=0; i<midi_max; i++) {
                    radios_midi[i].onclick =  function() {
                      if(this.parentElement.style.backgroundColor == 'white') 
                          {this.parentElement.style.backgroundColor = "rgb(197, 197, 197)"}
                      else
                          {for(var i=0; i<midi_max; i++) {x[i].style.backgroundColor = "rgb(197, 197, 197)";}
                      this.parentElement.style.backgroundColor = 'white';
                    } ; }
               } 

           var radios_soir = document.forms["form"].elements["heure_soir"];
           var y = document.getElementsByClassName('soir'); 
           soir_max = 9;
          
           for(var i=0; i<soir_max; i++) {
                    radios_soir[i].onclick =  function() {
                      if(this.parentElement.style.backgroundColor == 'white') 
                          {this.parentElement.style.backgroundColor = "rgb(197, 197, 197)"}
                      else
                          {for(var i=0; i<soir_max; i++) {y[i].style.backgroundColor = "rgb(197, 197, 197)";}
                      this.parentElement.style.backgroundColor = 'white';
                    } ; } 
              } 
        
        </script>


    </body>
</html>