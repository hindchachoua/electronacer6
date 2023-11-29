<?php 
    require_once 'connection.php';
    $mysqli = new mysqli("localhost", "root", "", "electronacer");
    $res = $mysqli->query("SELECT * FROM product ORDER BY RAND()");
    function getAllProducts() {
        
        

    }


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
    
<?php include 'navbar.php'; ?>


<?php 
       if(isset($_POST['product'])) {
        $selectedCategory = $_POST['product'];
        // Query based on selected category
        $query = mysqli_query($conn, "SELECT * FROM product WHERE etiquette = '$selectedCategory'");
        if ($query) {
            // Loop through and display filtered products
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<div class='p-4 flex'>
                    <h1 class='text-5xl'>
                        {$row['etiquette']}
                    </h1>
                </div>
                <div class='px-3 py-4 flex justify-center'>
                    <table class='w-full text-md bg-white shadow-md rounded mb-4'>
                        <tr class='border-b'>
                            <th class='text-left p-3 px-5'>Etiquette</th>
                            <th class='text-left p-3 px-5'>Description</th>
                            <th class='text-left p-3 px-5'>Prix</th>
                            <th class='text-left p-3 px-5'>Image</th>
                            <th></th>
                        </tr>
                        <tr>
                        <td class='p-3 px-5'>{$row['etiquette']}</td>
                        <td class='p-3 px-5'>{$row['description']}</td>
                        <td class='p-3 px-5'>{$row['prix']}</td>
                        <td class='p-3 px-5'>{$row['image']}</td>
                        </tr>
                    </table>
                    </div>
                    </div>";
                
            }
        }
    }
        
    

?>
<div style="margin-top: 50px; margin-left:50px;">
<form  method="post">
    <label for="product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Select an option</label>
        <select id="products" name="product" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 
        block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Choose category</option>
            <option value="laptop">Laptop</option>
            <option value="phone">Phone</option>
            <option value="watsh">watch</option>
        </select>
<button type="submit"  class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-2 py-1.5 me-5 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">submit</a></button>
</form>
</div>

<?php include 'filterprice.php'; ?>
<form method="post">
    <!-- ... Autres champs de formulaire ... -->
    <label for="minPrice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Prix minimum</label>
    <input type="number" id="minPrice" name="minPrice" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

    <label for="maxPrice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Prix maximum</label>
    <input type="number" id="maxPrice" name="maxPrice" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

    <button type="submit">Filtrer par prix</button>
</form>
<!-- tailwind card -->
<!-- flex flex-wrap  gap-20 space-y-[100px] mx-20 -->
<div style="display: flex; flex-wrap:wrap; justify-content:space-around; margin-top: 30px ">
    

<div style="display: flex; flex-wrap: wrap; justify-content: space-around">
    <?php
        while ($row = $res->fetch_assoc()) {
    ?>
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" style="margin: 10px;">
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