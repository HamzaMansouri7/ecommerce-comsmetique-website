<?php
// Connect to the database
$nom_serveur = "localhost";
$client = "root";
$mot_de_pass = "";
$nom_base_donnee = "achat";
$con = mysqli_connect($nom_serveur, $client, $mot_de_pass, $nom_base_donnee);

// Check the connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Retrieve the clientId parameter
$client_id = $_GET['clientId'];

// Prepare a select statement
$stmt = $con->prepare("SELECT * FROM commande WHERE clientId = $client_id");
$stmt->bind_param("i", $client_id); // i represents the data type of clientId parameter (integer)
$stmt->execute();

// Fetch the result set
$result_set = $stmt->get_result();
while ($row = $result_set->fetch_assoc()) {
    // Process each row of the result set
    // For example, you can output the values of each column using echo statement
    echo $row['commandeId'] . " " . $row['dateCommande'] . "<br>";
}

// Close the prepared statement and database connection
$stmt->close();
$con->close();
?>
