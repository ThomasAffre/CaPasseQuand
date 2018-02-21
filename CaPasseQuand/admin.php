<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="Css/Admin.css" />
        <title>Ça passe quand</title>
        <script>
function changeSerie(str) {
    if (str.length == 0) { 
        document.getElementById("choixSaison").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("choixSaison").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "selectSaison.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
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
	$rqt_genre = "SELECT nomGenre FROM genre";
	$rqt_Acceuil = "SELECT idSerie as Id,message FROM accueil";
	
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
			<?php 
			if(isset($_GET["Erreur"])){
			    echo "<h1 style=\"color:red\">".$_GET["Erreur"]."</h2>";
			}
			
			?>	
			<div class="modifPageAccueil">
				<titreGroupe>Modification de la page d'accueil<br></titreGroupe>
				<titreEntete>Modification Carroussel</titreEntete>	
				<form action="ChangeAccueil.php" method="post">
				<?php 
				$result = mysqli_query($conn, $rqt_banniere) ;
				
	            if (mysqli_num_rows($result) > 0) {
	             // output data of each row
	                echo "<input type=\"hidden\" name=\"NbBandeau\" value=\"".mysqli_num_rows($result)."\"/> ";
                while($row = mysqli_fetch_assoc($result)) {
                    
                    echo "<select name=\"bandeau".$row["num"]."\">";
                    
                     
                    $result_serie = mysqli_query($conn, $rqt_serie);
                    
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
                    echo "</select>";
                }
               
	}
    
				
				
			$result_accueil = mysqli_query($conn, $rqt_Acceuil);
			if (mysqli_num_rows($result_accueil) > 0) {
			    $row =  mysqli_fetch_assoc($result_accueil);
			
			
					
	?>
					<br>

					<titreEntete>Modification message accueil<br>
					</titreEntete>
					<textarea name="descriptAccueil" class="textArea"><?php echo $row["message"]?></textarea>
					<br>

					<titreEntete>Modification Miniature et Synopsis Série du moment<br>
					</titreEntete>
					<select name="miniature">
                    
                     <?php 
                    $result_serie = mysqli_query($conn, $rqt_serie);
                    
                    if (mysqli_num_rows($result_serie) > 0) {
                        while($row_serie = mysqli_fetch_assoc($result_serie)) {
                                echo "<option value=\"".$row_serie["Id"]."\"";
                                if($row["Id"]==$row_serie["Id"]){
                                    echo "selected=\"selected\"";
                                }
                                echo">";
                                echo $row_serie["nom"]."</option>";
                        }
                    }
                   
                
					?>
					</select>
					<br>
			<?php 
			}
			?>
				<input type="submit" value="Valider">	
				</form>
				
				
            </div>
			
			<br>
			<div id="AjoutElement">
			<div class="ajoutSerie elementTableau" >
				<titreGroupe>Ajout Série<br></titreGroupe>
				
				<form action="AjoutElement.php" method="post">
					
					<titreEntete>Nom Série<br></titreEntete>
					<textarea name="NomSerie" class="textArea" placeholder="ex : Vikings"></textarea>
					<br>
					
					<titreEntete>Réalisateur<br></titreEntete>
					<textarea name="Realisateur" class="textArea" placeholder="Kurt Sutter"></textarea>
					<br>
					
					<titreEntete>Synopsis Série<br></titreEntete>
					<textarea name="SynopsisSerie" class="textArea" placeholder="Synopsis Série"></textarea>
					<br>
					
					<titreEntete>Genre :</titreEntete>
					<select name="Genre">
                    
                     <?php 
                     $result_genre = mysqli_query($conn, $rqt_genre);
                    
                     if (mysqli_num_rows($result_genre) > 0) {
                         while($row_genre = mysqli_fetch_assoc($result_genre)) {
                             echo "<option value=\"".$row_genre["nomGenre"]."\">".$row_genre["nomGenre"]."</option>";
                        }
                    }
                   
                
					?>
					</select>
					
					<input type="submit" value="Valider">	
				</form>
			</div>
			
			
			<div class="ajoutSaison elementTableau">
				<titreGroupe>Ajout Saison<br></titreGroupe>
				
				<form action="AjoutSaison.php" method="post">
					<select name="SaisonSerie">
				
				 	<?php 
                    $result_serie = mysqli_query($conn, $rqt_serie);
                    
                    if (mysqli_num_rows($result_serie) > 0) {
                        while($row_serie = mysqli_fetch_assoc($result_serie)) {
                                echo "<option value=\"".$row_serie["Id"]."\">";
                                echo $row_serie["nom"]."</option>";
                        }
                    }
                   
                
					?>
					</select>
					<br>
					
					<titreEntete>Synopsis Saison<br></titreEntete>
					<textarea name="SynopsisSaison" class="textArea" placeholder="Synopsis Saison"></textarea>
					<br>
					
					
					<input type="submit" value="Valider">	
				</form>
			</div>
			
			<div class="ajoutEpisode elementTableau">
				<titreGroupe>Ajout Episode<br></titreGroupe>
				
				<form action="AjoutEpisode.php" method="post">		
					<titreEntete>Série<br></titreEntete>
					<select name="SaisonSerie" onclick="changeSerie(this.value)">
				
				 	<?php 
                    $result_serie = mysqli_query($conn, $rqt_serie);
                    
                    if (mysqli_num_rows($result_serie) > 0) {
                        while($row_serie = mysqli_fetch_assoc($result_serie)) {
                                echo "<option value=\"".$row_serie["Id"]."\">";
                                echo $row_serie["nom"]."</option>";
                        }
                    }
                   
                
					?>
					</select>
					<br>
										
					<titreEntete>Numéro de saison<br></titreEntete>
					<select id="choixSaison" name="NumSaison"></select>
					<br>
					
					<titreEntete>Nom Episode<br></titreEntete>
					<textarea name="NomEpisode" class="textArea" placeholde="exemple: Winter is coming"></textarea>
					<br>
					
					<titreEntete>Synopsis Episode<br></titreEntete>
					<textarea name="SynopsisEpisode" class="textArea"  placeholder="Synopsis"></textarea>
					<br>
					
					<titreEntete>Date  Episode<br></titreEntete>
					<input type="date" name="DateEpisode" class="textArea" max="31/12/2100"></input>
					<br>
					
					<titreEntete>Heure Episode<br></titreEntete>
					<input type="time" name="HeureEpisode" class="textArea"></input>
					<br>
					
					<input type="submit" value="Valider">	
				</form>
			</div>
			
			<div class="ajoutActeurGenre elementTableau">
				<titreGroupe>Ajout Acteur & Genre<br></titreGroupe>
				
				<form action="AjoutActeur.php" method="post">				
					<titreEntete>Nom Acteur<br></titreEntete>
					<textarea name="NomActeur" class="textArea" placeholder="exemple: Clarke"></textarea>
					<br>
					
					<titreEntete>Prénom Acteur<br></titreEntete>
					<textarea name="PrenomActeur" class="textArea"placeholder="exemple: Emilia"></textarea>
					<br>
					
					<titreEntete>Date de naissance<br></titreEntete>
					<input type="date" name="DateNais" class="textArea" max="31/12/2009"></input>
					<br>
					
					<titreEntete>Série joué<br></titreEntete>
					<select name="RoleSerie">
				
				 	<?php 
                    $result_serie = mysqli_query($conn, $rqt_serie);
                    
                    if (mysqli_num_rows($result_serie) > 0) {
                        while($row_serie = mysqli_fetch_assoc($result_serie)) {
                                echo "<option value=\"".$row_serie["Id"]."\">";
                                echo $row_serie["nom"]."</option>";
                        }
                    }
                   
                
					?>
					</select>					
					<br>
					
					<input type="submit" value="Valider">	
				</form>
				<br/>
				
				<titreGroupe>Ajout Genre</titreGroupe>
				<br>
				<form action="AjoutGenre.php" method="post">				
					<input type="text" name="genre"/>
					<input type="submit" value="Valider">	
					
				</form>
			</div>
			</div>
			</div>
    </body>
</html>
