<?php
$servername="localhost";
$username="root";
$password="";
$dbname="achat";

//Create Connection
$conn= mysqli_connect($servername,$username,$password,$dbname);

//Check connection
if(!$conn)
{die("Echec de la connection:".mysqli_connect_error());}
echo "Connection réussite";
//Insertion des données
$sql="INSERT INTO `article`(`code`, `designation`, `prix_U`, `rayon`, `ss-rayon`)
 VALUES (`01`, `article 1`, `5450`, `2`, `3`)";
 if (mysqli_query($conn, $sql))
 
    {echo "Nouveau enregistrement créé avec succées";}
else
    {echo "Erreur:".$sql."<br>".mysqli_error($conn);}

    mysqli_close($conn);
?>
