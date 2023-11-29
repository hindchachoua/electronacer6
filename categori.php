<?php 
    require_once 'connection.php';
    $mysqli = new mysqli("localhost", "root", "", "electronacer");
    $res = $mysqli->query("SELECT * FROM categorie ORDER BY RAND()");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'navbar2.php'?>
    <h1 class="text-center my-8 text-3xl font-bold text-gray-800  " >Ajouter categorie</h1>

<div style="margin-left: 30%; margin-top: 5%;">
<div class="w-full max-w-lg flex flex-wrap ml-20  justify-center items-center px-3 py-4 bg-white shadow-md rounded mb-4 " >
    <form method="post" enctype="multipart/form-data">
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nom">
        titre
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="nom" name="nom"  type="text" placeholder="title">
      
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
        description
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="description" name="description" type="text" placeholder="description">
    </div>
  </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div style="margin-left: 5%;" class=" px-3">
      <label class="block ml-20 uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image">
        uplaod image
      </label>
      <input  class="appearance-none block w-full ml-20 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="image" name="image" type="file">
    
    </div>

  </div>
    
  <button name="add_categorie" style="margin-left: 25%;" class="uppercase block  p-4 text-lg rounded-full bg-indigo-600 hover:bg-indigo-900 focus:outline-none" type="submit">ajouter</button>
  </div>
</form>
</div>
</div>

<?php 

if (isset($_POST['add_categorie'])) {
    $nom = $_POST['nom'];
    $description = $_POST['description'];  

       

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {    
         $uploadDir = "uploads/";             
           $fileExtension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);  

    $uniqueFilename = uniqid('image', true) . '.' . $fileExtension; 

    $uploadedFile = $uploadDir . $uniqueFilename;     
      
     if (!move_uploaded_file($_FILES["image"]["tmp_name"], $uploadedFile)) {         
        $error_file = "Error uploading the image.";$color = "danger";     
      }   
    
    }else {     $error_file = "Invalid file upload. Please select an image.";     
                $color = "danger";   
          }




    $insert_sql = "INSERT INTO `categorie`( `nom`, `description`, `image`) VALUES ('$nom','$description','$uploadedFile')";
    if ($conn->query($insert_sql) === TRUE) {
        echo "<script>alert('categorie ajoute');</script>";
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }

}
?>


<div style="display: flex; flex-wrap:wrap; justify-content:space-around; margin-top: 30px ">
    

    <div style="display: flex; flex-wrap: wrap; justify-content: space-around">
        <?php
            while ($row = $res->fetch_assoc()) {
               
        ?>
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" style="margin: 10px;">
                <a href="#">
                    <img src="<?= $row["image"] ?>" alt="">
                </a>
                <div class="px-5 pb-5">
                    <a href="#" class="text-gray-900 dark:text-gray-100">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100"><?php echo $row["description"]; ?></h2>
                    </a>
                    <p class="text-gray-500 dark:text-gray-400">
                        <?php echo $row["nom"]; ?>
                    </p>
                </div>

                <button><a class='inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800' href='deletcat.php?id=<?= $row["id"] ?>'>Delete</a></button>

                <button name="update"><a class='inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800' href='updatecat.php?id=<?= $row["id"] ?>'>update</a></button>

            </div>
        <?php
            }
        ?>
    </div>
    
    
    
    
    
        </div>



    <?php include 'js.php'?>
</body>
</html>