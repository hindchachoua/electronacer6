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
    <title>Categories</title>
</head>
<body>
    <?php include 'navbar.php'?>

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


            </div>
        <?php
            }
        ?>
    </div>
    
    
    
    
    
        </div>



    <?php include 'js.php'?>
</body>
</html>