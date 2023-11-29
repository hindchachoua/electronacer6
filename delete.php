<?php
require_once 'connection.php';
// delet a user from data base

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = "delete from admin where id = $id";
    $result = mysqli_query($conn,$query);

    if($result)
    {

        echo "<script>alert('User Deleted');</script>";
        echo "<script>window.location.href='user.php';</script>";
    }
}




?>