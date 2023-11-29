
<?php
// delet product from  database

include("connection.php");

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = "DELETE FROM `categorie` WHERE id = $id";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        header("location: categori.php");
    }
    else
    {
        die(mysqli_error($conn));
    }
    mysqli_close($conn);

}

?>