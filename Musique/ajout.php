<?php
    $serveur = "localhost";
    $utilisateur = "root"; 
    $mot_de_passe = ""; 
    $base_de_donnees = "base";
    $connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
    if (!$connexion) { 
        die("Échec de la connexion : " . mysqli_connect_error()); 
    } 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // print_r($_POST);
        $chanteur = $_POST['chanteur'];
        $titre = $_POST['titre'];
        $album = $_POST['album'];
        $annee = $_POST['annee'];
        $sql = "INSERT INTO musique (chanteur, titre, album, annee)
        VALUES('$chanteur','$titre', '$album', '$annee')" ;
        mysqli_query($connexion, $sql) ;
    }

   


?>
