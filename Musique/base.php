<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>musique</title>
    <style>
        body{
            background-color: olivedrab;
        }
        .navigation{
            background-color: #8ed1fc;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            padding: 30px;
            font-weight: 800;
            font-family: 'Times New Roman', Times, serif;
        }
        .navigation :hover {
            color: white;
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
    
    <h1>Ma musique</h1>
    <p>Venez découvrir ma musique</p>

    <?php
        $serveur = "localhost";
        $utilisateur = "root"; 
        $mot_de_passe = ""; 
        $base_de_donnees = "base";
        // connexion avec la base de donnée
        $connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

        // verifie la connexion
        if (!$connexion) { die("Échec de la connexion : " . mysqli_connect_error()); 
        } else
    { echo "Connexion réussie à la base de données.";

    }
        $sql = "SELECT * FROM musique" ;
        $resultat = mysqli_query($connexion, $sql) ;

        if ($resultat) { 
            foreach ($resultat as $musique) {
                echo "Chanteur: " . $musique['chanteur'] . "<br>";
                echo "Album: " . $musique['album'] . "<br>";
                echo "Titre: " . $musique['titre'] . "<br>";
                echo "Année: " . $musique['annee'] . "<br>";
                echo "Durée: " . $musique['duree'] . "<br>";
                echo "<audio controls src='" . $musique['url'] . "'></audio><br>";
                echo "<a href='" . $musique['url'] . "'>Télécharger</a><br>";
                echo "<br>";
            }
        } else {
            echo "Erreur : " . mysqli_error($connexion); 
        }
        

        mysqli_close($connexion);
    ?>


       
    <ul>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="Rechercher.html">Rechercher</a></li>
        <li><a href="accueil.html">Accueil</a></li>
    
    
    
    
    
    </ul>
    </body>



    </html>

    
 





  
