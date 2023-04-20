<?php
// Database connection details
$nom_serveur = "localhost";
$client = "root";
$mot_de_pass = "";
$nom_base_donnee = "ecommerce";
$con = mysqli_connect($nom_serveur, $client, $mot_de_pass, $nom_base_donnee);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $adresse = $_POST['adresse'];
  $mdp = $_POST['mdp'];

  // Create and execute the SQL query to check if the user exists
  $sql_check = "SELECT * FROM client WHERE adresse='$adresse' AND mdp='$mdp'";
  $result = mysqli_query($con, $sql_check);

  if (mysqli_num_rows($result) > 0) {
    // If the user exists, redirect to the dashboard or home page
    header("Location: ../../index.html");
    exit();
  } else {
    // If the user does not exist, display an error message and redirect back to login.html
    echo "Invalid email or password. Please try again.";
    header("Refresh: 2; URL=login.html");
    exit();
  }

  // Close the database connection
  mysqli_close($con);
}
?>
