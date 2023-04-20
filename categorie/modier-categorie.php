<?php
$servername="localhost";
$username="root";
$password="";
$dbname="project";

//create connection 
$conn=mysqli_connect($servername,$username,$password,$dbname);

//check connection 
if (!$conn){
    die("Connection failed: "mysqli_connect_error());
}

$sql="UPDATE categorie SET libelle='cvbnj' where code=456";

if (mysqli_query($conn,$sql)){
echo "Record update successfully";
}
else{
    echo "Error updating record: ".mysqli_error($conn);
}

mysqli_close($conn);
?>