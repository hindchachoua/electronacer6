<?php 
 include 'connection.php';
// add product to the database
if (isset($_POST['add_product'])) {
    $etiquette = $_POST['etiquette'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $ref_prod = $_POST['ref_prod'];
    $qte_min = $_POST['qte_min'];
    $qte_stock = $_POST['qte_stock'];
    $product = $_POST['product'];

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {    
        $uploadDir = "uploadproduct/";             
          $fileExtension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);  

   $uniqueFilename = uniqid('image', true) . '.' . $fileExtension; 

   $uploadpic = $uploadDir . $uniqueFilename;     
     
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $uploadpic)) {         
       $error_file = "Error uploading the image.";$color = "danger";     
     }   
   
   }else {     $error_file = "Invalid file upload. Please select an image.";     
               $color = "danger";   
         }



    $sql = "INSERT INTO `product`( `ref_prod`, `etiquette`, `prix`, `image`, `description`, `qte_min`, `qte_stock`, `categorie_fk`) VALUES ('$ref_prod','$etiquette','$prix','$uploadpic','$description','$qte_min','$qte_stock','$product')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product added');</script>";
        header("location: user.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>