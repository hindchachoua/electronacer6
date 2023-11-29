<?php 
    require_once 'connection.php';
    $mysqli = new mysqli("localhost", "root", "", "electronacer");
    $res = $mysqli->query("SELECT * FROM product ORDER BY RAND()");
    function getAllProducts() {

    }

  $categorie = $conn->query("SELECT * FROM categorie");
  $categorie_data = $categorie->fetch_all(PDO::FETCH_ASSOC);

  $mysqli = new mysqli("localhost", "root", "", "electronacer");
    $res = $mysqli->query("SELECT * FROM categorie");

    


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body style="overflow-x: hidden;" class="bg-gray-200">
    
<?php include 'navbar2.php'; ?>



<div style="margin-top: 50px; margin-left:50px;">
<form  method="post">
    <label for="product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Select an option</label>
        <select id="products" name="product" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 
        block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>All</option>
        <?php if (isset( $res)) {   ?>
            <?php foreach ($res as $row) { ?>


            <option value="<?=   $row['id']?>"><?=   $row["nom"]?> </option>


            <?php   } } ?>
          
        </select>
<button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-2 py-1.5 me-5 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" name="submit" >submit</a></button>
</form>
</div>

<?php include 'filtercat.php'; ?>



<form method="post" class="flex flex-col items-center gap-4 mb-5 w-1/2 mx-auto bg-white p-4 rounded-lg">
    <!-- ... Autres champs de formulaire ... -->
    <label for="min_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Prix minimum</label>
    <input type="number" id="min_price" name="min_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

    <label for="max_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Prix maximum</label>
    <input type="number" id="max_price" name="max_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

    <button type="submit" name="filter" class="ml-2 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-2 py-1.5">Filtrer par prix</button>
    <button type="submit" name="vider" class="ml-2 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-2 py-1.5">Vider les filtres</button>
</form>

<?php include 'filterprice.php'; ?>

<!-- tailwind card -->
<!-- flex flex-wrap  gap-20 space-y-[100px] mx-20 -->
<div style="display: flex; flex-wrap:wrap; justify-content:space-around; margin-top: 30px ">
    

<div style="display: flex; flex-wrap: wrap; justify-content: space-around">
    <?php
        while ($row = $res->fetch_assoc()) {
    ?>
        <div class="w-full ml-20 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" style="margin: 10px;">
            <a href="#">
                <img class="p-8 rounded-t-lg" src="<?php echo $row["image"]; ?>" alt="product image" />
            </a>
            <div class="px-5 pb-5">
                <a href="#" class="text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100"><?php echo $row["description"]; ?></h2>
                </a>
                <p class="text-gray-500 dark:text-gray-400">
                    <?php echo $row["etiquette"]; ?>
                </p>
                <div class="flex items-center justify-between mt-5">
                    <div class="flex items-center">
                        <span class="text-sm font-medium text-gray-900 dark:text-gray-100">
                            <?php echo $row["prix"]; ?> $
                        </span>
                    </div>
                </div>
                <div style="margin-left: 60%;">
                <button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Add to cart</button>
                </div>
            </div>
        </div>
    <?php
        }    
    ?>
</div>





    </div>

<?php include 'js.php'; ?>
<body>
    
</body>
</html>