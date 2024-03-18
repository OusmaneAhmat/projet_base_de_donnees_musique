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
        print_r($musique);
    }
} else{
    echo "Erreur : " . mysqli_error($musique); 

    mysqli_close($connexion);

}

?>