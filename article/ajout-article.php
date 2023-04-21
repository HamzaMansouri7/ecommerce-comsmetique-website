<?php
// Connexion à la base de données
$dbh = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');

// Récupération des données soumises par le formulaire
$code = $_POST['code'];
$designation = $_POST['designation'];
$prix = $_POST['prix'];
$rayon = $_POST['rayon'];
$n_rayon = $_POST['n_rayon'];

// Préparation et exécution de la requête SQL pour insérer les données dans la table "article"
$stmt = $dbh->prepare("INSERT INTO article (code, designation, prix_U, rayon, n_rayon) VALUES (:code, :designation, :prix, :rayon, :n_rayon)");
$stmt->bindParam(':code', $code);
$stmt->bindParam(':designation', $designation);
$stmt->bindParam(':prix', $prix);
$stmt->bindParam(':rayon', $rayon);
$stmt->bindParam(':n_rayon', $n_rayon);
$stmt->execute();

// Redirection vers la page d'accueil ou une page de confirmation d'ajout
header('Location: ../index.html');
exit();
?>
