<?php

require_once "connection.php";
// modify role from database with php 

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = "select * from admin where id = $id";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
}

if(isset($_POST['submit']))

{
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $query = " email = '$email', password = <PASSWORD>', role = '$role' where id = $id";

    $result = mysqli_query($conn,$query);
    if($result)
    {
        header("location: acceuil.php");
    }

}

?>