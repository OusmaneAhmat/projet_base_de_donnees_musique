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

$nom = isset($_POST['nom']) ? $_POST['nom'] : ''; 
$prenom = isset($_POST['prenom']) ? $_POST['nom'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';
$objet = isset($_POST['objet']) ? $_POST['objet'] : '';
if (empty($_POST)) {
    echo 'le formulaire n\'a pas été soumis correctement';
}
if (!empty($_POST)) {
    echo "Formulaire soumis avec succès !"; 
    $sql = "INSERT INTO message (prenom, nom, email, telephone, message, objet)
    VALUES('$prenom','$nom', '$email', '$telephone', '$message', '$objet')" ;
    mysqli_query($connexion, $sql) ;
    
    
   
} else {
    echo "Erreur.";
}

?>
