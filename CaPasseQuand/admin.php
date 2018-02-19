<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="Css/Admin.css" />
        <title>Ça passe quand</title>
    </head>
    <?php
    $database = "capassequand";
	$servername = "localhost";
	$username = "username";
	$password = "password";
	
	// Create connection
	$conn = mysqli_connect($servername, "root", "",$database);
	
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	
	$rqt_banniere = "SELECT num,nom,chemin FROM banniereinfo";
	$rqt_serie = "SELECT idSerie as Id,nom FROM serie";
	?>
    
    <body>
        <div id="bloc_page">
            <header>
                <div id="titre_principal">
                    <div id="logo">
                        <img src="images/logo.jpg" alt="Logo" />
                        <h1>Ça passe quand?</h1>    
                    </div>
                    <h2></h2>
                </div>
                
                <nav>
                    <ul>
                        <li><a href="#">Accueil</a></li>
                        <li><a href="calendrier.html">Calendrier</a></li>
                        <li><a href="#">Recherche</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </header>
			
			<div id="">
                
            <h1>Interface administrateur</h1>
						
			<div class="modifPageAccueil">
				<titreGroupe>Modification de la page d'accueil<br></titreGroupe>
				<titreEntete>Modification Carroussel</titreEntete>	
				<form action="">
				<?php 
				$result = mysqli_query($conn, $rqt_banniere) ;
				$result_serie = mysqli_query($conn, $rqt_serie);
				
	            if (mysqli_num_rows($result) > 0) {
	             // output data of each row
                $i = 1;
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <select name="bandeau<?php echo $i;?>">
                    
                    <?php 
                    
                    if (mysqli_num_rows($result_serie) > 0) {
                        while($row_serie = mysqli_fetch_assoc($result_serie)) {
                                echo "<option value=\"".$row_serie["Id"]."\"";
                                if($row["nom"]==$row_serie["nom"]){
                                    echo "selected=\"selected\"";
                                }
                                echo">";
                                echo $row_serie["nom"]."</option>";
                        }
                    }
                   $i++;
                }
	}
    ?>
				
				
				
					</select>
				
				<br>
				
				<titreEntete>Modification message accueil<br></titreEntete>
					<textarea name="descriptAccueil" class="textArea">Message Page d'accueil</textarea>
				<br>
				
				<titreEntete>Modification Miniature et Synopsis Série du moment<br></titreEntete>	
					<select name="miniature">
						<option value="" disabled selected="selected">Modification Miniature et Synopsis</option>
					</select>
				<br>	
				
				<input type="submit" value="Valider">	
				</form>
				
				
            </div>
			
			<br>
			<div id="AjoutElement">
			<div class="ajoutSerie elementTableau" >
				<titreGroupe>Ajout Série<br></titreGroupe>
				
				<form action="">
					<titreEntete>Identifiant série<br></titreEntete>
					<textarea name="AjoutIdSerie" class="textArea">exemple: Vikings VI</textarea>
					<br>
					
					<titreEntete>Nom Série<br></titreEntete>
					<textarea name="AjoutNomSerie" class="textArea">Vikings</textarea>
					<br>
					
					<titreEntete>Réalisateur<br></titreEntete>
					<textarea name="AjoutRealisateur" class="textArea">Kurt Sutter</textarea>
					<br>
					
					<titreEntete>Synopsis Série<br></titreEntete>
					<textarea name="AjoutSynopsisSerie" class="textArea">Synopsis Série</textarea>
					<br>
					
					
					<input type="submit" value="Valider">	
				</form>
			</div>
			
			
			<div class="ajoutSaison elementTableau">
				<titreGroupe>Ajout Saison<br></titreGroupe>
				
				<form action="">
					<titreEntete>Identifiant Saison<br></titreEntete>
					<textarea name="AjoutIdSerie" class="textArea">exemple: Vikings VI</textarea>
					<br>				
				
					<titreEntete>Numéro de saison<br></titreEntete>
					<textarea name="AjoutNumeroSaison" class="textArea">Kurt Sutter</textarea>
					<br>
					
					<titreEntete>Synopsis Saison<br></titreEntete>
					<textarea name="AjoutSynopsisSaison" class="textArea">Synopsis Série</textarea>
					<br>
					
					
					<input type="submit" value="Valider">	
				</form>
			</div>
			
			<div class="ajoutEpisode elementTableau">
				<titreGroupe>Ajout Episode<br></titreGroupe>
				
				<form action="">
					<titreEntete>Identifiant Episode<br></titreEntete>
					<textarea name="AjoutIdEpisode" class="textArea">exemple: GT01E01</textarea>
					<br>				
				
					<titreEntete>Numéro d'épisode<br></titreEntete>
					<textarea name="AjoutNumeroEpisode" class="textArea">exemple: 1</textarea>
					<br>
					
					<titreEntete>Numéro de saison<br></titreEntete>
					<textarea name="AjoutNumSaisonEpisode" class="textArea">exemple: GT01</textarea>
					<br>
					
					<titreEntete>Nom Episode<br></titreEntete>
					<textarea name="AjoutNomEpisode" class="textArea">exemple: Winter is coming</textarea>
					<br>
					
					<titreEntete>Synopsis Episode<br></titreEntete>
					<textarea name="AjoutSynopsisEpisode" class="textArea">Synopsis</textarea>
					<br>
					
					<titreEntete>Date  Episode<br></titreEntete>
					<textarea name="AjoutDateEpisode" class="textArea">2018-12-23</textarea>
					<br>
					
					<titreEntete>Heure Episode<br></titreEntete>
					<textarea name="AjoutHeureEpisode" class="textArea">exemple: 09:00:00</textarea>
					<br>
					
					<input type="submit" value="Valider">	
				</form>
			</div>
			
			<div class="ajoutActeurGenre elementTableau">
				<titreGroupe>Ajout Acteur & Genre<br></titreGroupe>
				
				<form action="">
					<titreEntete>Identifiant Acteur<br></titreEntete>
					<textarea name="AjoutIdEpisode" class="textArea">exemple: EC01</textarea>
					<br>				
				
					<titreEntete>Nom Acteur<br></titreEntete>
					<textarea name="AjoutNomActeur" class="textArea">exemple: Clarke</textarea>
					<br>
					
					<titreEntete>Prénom Acteur<br></titreEntete>
					<textarea name="AjoutPrénomActeur" class="textArea">exemple: Emilia</textarea>
					<br>
					
					<titreEntete>Date de naissance<br></titreEntete>
					<textarea name="AjoutDateActeur" class="textArea">exemple: 1986-10-23</textarea>
					<br>
					
					<titreEntete>Série joué<br></titreEntete>
					<textarea name="AjoutLienActeurSerie" class="textArea">exemple: GT(identifiant série)</textarea>
					<br>
					
					
					<input type="submit" value="Valider">	
				</form>
			</div>
			</div>
			</div>
    </body>
</html>
