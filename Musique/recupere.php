<?php
$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';
$objet = isset($_POST['objet']) ? $_POST['objet'] : '';
if (empty($_POST)) {
    echo 'le formulaire n\'a pas été soumis correctement';
}
if (!empty($_POST)) {
    echo "Formulaire soumis avec succès !";
} else {
    echo "Erreur.";
}

?>
