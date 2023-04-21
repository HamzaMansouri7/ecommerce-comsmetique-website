<?php
$servername="localhost";
$username="root";
$password="";
$dbname="project";

//create connection 
$conn=mysqli_connect($servername,$username,$password,$dbname);

//check connection 
if(!$conn){
    die("connection failed: ".mysqli_connect_error());
}

$sql="SELECT CODE ,LIBELLE FROM categorie";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    //output data of each row
    while($row=mysqli_fetch_assoc($result))
    {
        echo "Code:".$row["CODE"]."Libelle:".$row["LIBELLE"]."<br>";
    }
}
else{
    echo"0 results";
}
mysqli_close($conn);
?>