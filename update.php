<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $role = $_POST['role'];

    // Perform the update query
    $updateQuery = "UPDATE admin SET role = '$role' WHERE id = '$id'";
    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        // Redirect to the users page after successful update
        header("Location: user.php");
        
        echo "<script>alert('Done');</script>";
        echo "<script>window.location.href='user.php';</script>";
        exit();
        
    } 

    mysqli_close($conn);
}

?>