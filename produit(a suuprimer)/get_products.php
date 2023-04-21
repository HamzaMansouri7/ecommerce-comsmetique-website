<?php
$nom_serveur = "localhost";
$client = "root";
$mot_de_pass = "";
$nom_base_donnee = "ecommerce";
$con = mysqli_connect($nom_serveur, $client, $mot_de_pass, $nom_base_donnee);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL query to get the products
$sql = "SELECT * FROM products";

// Execute the query
$result = $conn->query($sql);

// Loop through the results and display them
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo '
    <div class="swiper-slide slide">
        <div class="image">
            <img src="'.$row['image'].'" alt="">
        </div>
        <div class="content">
            <p>'.$row['name'].'</p>
            <div class="price">'.$row['price'].' <span>'.$row['old_price'].'</span></div>
            <a href="panier/ajouter_au_panier.html" class="btn">Ajouter au panier</a>
        </div>
    </div>';
  }
} else {
  echo "No products found.";
}

// Close the database connection
$conn->close();
?>
