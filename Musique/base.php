<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>musique</title>






    <style>
        body{
            background-color: #3498db;
        }
        .navigation{
            background-color: gainsboro;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            padding: 30px;
            font-weight: 800;
            font-family: 'Times New Roman', Times, serif;
        }
        .navigation :hover {
            color: white;
        }
        li:hover{
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
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        audio {
            margin-top: 10px;
        }
    </style>

</head>
<body>
    <header>
        <div class="navigation">
            <nav><a href="accueil.html">Accueil</a></nav>
            <nav><a href="rechercher.html">Rechercher</a></nav>
            <nav><a href="contact.html">Contact</a></nav>
        </div>
    </header>
    <h1>Mes musiques</h1>
    <p>Venez découvrir ma musique préferées</p>

     <?php
        $serveur = "localhost";
        $utilisateur = "root"; 
        $mot_de_passe = ""; 
        $base_de_donnees = "base";
        $connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
        if (!$connexion) { 
            die("Échec de la connexion : " . mysqli_connect_error()); 
        } 
        else
        { 
            echo "Connexion réussie à la base de données.";
        }

            if (isset($_POST['Rechercher'])) {
                $Rechercher = $_POST['Rechercher'];
                $sql = "SELECT * FROM musique WHERE titre LIKE '%$Rechercher%'";
                $resultats = mysqli_query($connexion, $sql) ;
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
                    echo "Aucun resultat trouvé";
                }
            }
            else {
                $sql = "SELECT * FROM musique" ;
        $resultat = mysqli_query($connexion, $sql) ;

     if ($resultat) { 
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
        
        foreach ($resultat as $musique) {
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
                
            mysqli_close($connexion);
                
    ?>
    <ul class "lien">
        <li><a href="contact.html">Contact</a></li>
        <li><a href="Rechercher.html">Rechercher</a></li>
        <li><a href="accueil.html">Accueil</a></li>
    </ul>
    </body>
    </html>

    
 

