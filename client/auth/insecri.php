<?php
// Database connection details
$nom_serveur = "localhost";
$client = "root";
$mot_de_pass = "";
$nom_base_donnee = "ecommerce";
$con = mysqli_connect($nom_serveur, $client, $mot_de_pass, $nom_base_donnee);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $adresse = $_POST['adresse'];
  $mdp = $_POST['mdp'];
  $telephone = $_POST['telephone'];
  $code_postal = $_POST['code_postal'];

  // Create and execute the SQL query to check if the address already exists
  $sql_check = "SELECT * FROM client WHERE adresse='$adresse'";
  $result = mysqli_query($con, $sql_check);

  if (mysqli_num_rows($result) > 0) {
    // If the address already exists, display an error message
    echo "This address is already in use!";
    header("Location: login.html");
    exit();
  } else {
    // If the address does not exist, create a new user
    $sql_insert = "INSERT INTO client (nom, prenom, adresse, telephone, code_postal, mdp) VALUES ('$nom', '$prenom', '$adresse', '$telephone', '$code_postal', '$mdp')";
    if (mysqli_query($con, $sql_insert)) {
      echo "User created successfully!";
    } else {
      echo "Error creating user: " . mysqli_error($con);
    }
  }

  // Close the database connection
  mysqli_close($con);
}

?>
