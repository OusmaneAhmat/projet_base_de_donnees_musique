<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>musique</title>
    <style>
        body{
            background-color: #d3f8dc;
        }
        .navigation{
            background-color:#ffc87a;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            padding: 50px;
            font-weight: 800;
            font-family: 'Times New Roman', Times, serif;
            color: white;
            font-size: 30px;
        }
        .navigation :hover {
            color: white;
        }
    
        h1{
            text-align: center;
            font-weight: bold;
        }
        p{
            text-align: center;
            font-weight: bold;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
        
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
            
        }
        th {
            background-color: #f2f2f2;
        }
        audio {
            margin-top: 10px;
        }

        div{
            padding:7px;
         text-align: center;
        }
    div:hover{
        color:chartreuse
    }

        h2{
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <div class="navigation">
            <nav><a href="accueil.html">Accueil</a></nav>
            <nav><a href="base.php">Musique</nav></a>
            <nav><a href="rechercher.html">Rechercher</a></nav>
            <nav><a href="contact.html">Contact</a></nav>
        </div>
    </header>
    <h1>Mes musiques préferées🎵🎵🎵</h1>
   
    <h2>Ajouter une musique</h2>
 
 <form action="ajout.php" method="POST">
     <div>
         <label for="chanteur">artiste* : </label>
         <input type="text" name="chanteur" value="chanteur" required>
     </div>
     <br>
     <div>
         <label for="titre">Titre* :</label>
         <input type="text" name="titre" value="titre" required>
     </div>
     <br>
     <div>
         <label for="album"><strong>Album* :</strong></label>
         <input type="" name="album" value="album" required>
     </div>
     <br>
     <div>
         <label for="annee">annee* :</label>
         <input type="text" name="annee" value="annee" required>
     </div>
     <br>
        <div>
            <input type="submit" value="Soumettre">
        </div>
 </form>
       <?php 
        $serveur = "localhost";
        $utilisateur = "root"; 
        $mot_de_passe = ""; 
        $base_de_donnees = "base";
        $connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
            if (!$connexion) { 
                die("Échec de la connexion : " . mysqli_connect_error()); 
            } else { 
                // echo "Connexion réussie à la base de données.";
            }
            echo "<table>";
                    echo "<tr>";
                    echo "<th>Chanteur</th>";
                    echo "<th>Album</th>";
                    echo "<th>Titre</th>";
                    echo "<th>Année</th>";
                    echo "<th>Durée</th>";
                    echo "<th>Lecture</th>";
                    echo "<th>Télécharger</th>";
                    echo "</tr>";
            if (isset($_POST['Rechercher'])) {
                $Rechercher = $_POST['Rechercher'];

                $sql = "SELECT * FROM musique WHERE titre LIKE '%$Rechercher%'";
                $resultats = mysqli_query($connexion, $sql);
                    if($resultats){
                        foreach ($resultats as $musique) {
                            echo "<tr>";
                            echo "<td>" . $musique['chanteur'] . "</td>";
                            echo "<td>" . $musique['album'] . "</td>";
                            echo "<td>" . $musique['titre'] . "</td>";
                            echo "<td>" . $musique['annee'] . "</td>";
                            echo "<td>" . $musique['duree'] . "</td>";
                            echo "<td><audio controls src='" . $musique['url'] . "'></audio></td>";
                            echo "<td><a href='" . $musique['url'] . "'>Télécharger</a></td>";
                            echo "</tr>";
                        }
                        
                    } else{
                        echo "Aucun résultat trouvé";
                    }
            }
            else {
                $sql = "SELECT * FROM musique";
            
                $resultats = mysqli_query($connexion, $sql);
                if ($resultats) { 
                
                    foreach ($resultats as $musique) {
                        echo "<tr>";
                        echo "<td>" . $musique['chanteur'] . "</td>";
                        echo "<td>" . $musique['album'] . "</td>";
                        echo "<td>" . $musique['titre'] . "</td>";
                        echo "<td>" . $musique['annee'] . "</td>";
                        echo "<td>" . $musique['duree'] . "</td>";
                        echo "<td><audio controls src='" . $musique['url'] . "'></audio></td>";
                        echo "<td><a href='" . $musique['url'] . "'>Télécharger</a></td>";
                        echo "</tr>";
                       
                    }
                  
                    echo "</table>";
                } else {
                    echo "Erreur : " . mysqli_error($connexion); 
                }
            }
           
           ?>
    </body>

    </html>














