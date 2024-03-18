
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>musique</title>
</head>
<body>

<h1>Ma musique</h1>
<p>Venez découvrir ma musique</p>

<table border="1">
        <thead>
            <tr>
                <th>Chanteur</th>
                <th>Album</th>
                <th>Titre</th>
                <th>Année</th>
                <th>Durée</th>
                <th>URL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>chanteur</td>
                <td>album</td>
                <td>titre</td>
                <td>annee</td>
                <td>duree</td>
                <td>
                    <figure>
                        <figcaption>Listen to the T-Rex:</figcaption>
                        <audio controls src="/media/cc0-audio/t-rex-roar.mp3"></audio>
                        <a href="/media/cc0-audio/t-rex-roar.mp3"> Download audio </a>
                    </figure>
                </td>
            </tr>
        </tbody>
    </table>



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

        echo "Chanteur : " . $musique['chanteur'] . "<br>";
        echo "Album : " . $musique['album'] . "<br>";
        echo "Titre : " . $musique['titre'] . "<br>";
        echo "Année : " . $musique['annee'] . "<br>";
        echo "Durée : " . $musique['duree'] . "<br>";
        echo "URL : " . $musique['url'] . "<br>";
        echo "<br>";
    }
} else{
    echo "Erreur : " . mysqli_error($musique); 
    mysqli_close($connexion);
}


?>







</body>
</html>

 
 



