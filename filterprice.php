<?php
// if(isset($_POST['minPrice'], $_POST['maxPrice'])) {
//     $minPrice = $_POST['minPrice'];
//     $maxPrice = $_POST['maxPrice'];
//     $filpix =  "SELECT * FROM product WHERE prix >= $minPrice AND prix <= $maxPrice";
//     $query = mysqli_query($conn,$filpix);
//     while ($row = $res->fetch_assoc()) {
        
//     }
// }


if (isset($_POST['filter'])) {
    $filter = "";
    $min_price = $_POST['min_price'];
    $max_price = $_POST['max_price'];

    // Validate the price range
    if ($min_price >= 0 && $max_price >= 0 && $max_price >= $min_price) {
        $filter = "WHERE prix BETWEEN $min_price AND $max_price";
    

    // Display products based on the filtered price range
    
    $sql = "SELECT * FROM product $filter";
    $quy = mysqli_query($conn, $sql);


    // Display products in a table
    while ($row = mysqli_fetch_assoc($quy)) {

        echo "
        <div style='display: flex; flex-wrap:wrap; justify-content:space-around;'>
            <div class='w-full mx-2 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700'>
            <a href='#'>
            <img class='p-8 rounded-t-lg' src='$row[image]' alt='product image' />
            </a>
                <div class='px-5 pb-5'>
                    <a href='#' class='text-gray-900 dark:text-gray-100'>
                    <h2 class='text-xl font-bold text-gray-900 dark:text-gray-100'>$row[description]</h2>
                    </a>
                    <span class='text-3xl font-bold text-gray-900 dark:text-gray-100'>$row[prix]</span>
                    <p class='text-gray-500 dark:text-gray-400'>$row[etiquette]</p>
                    <div class='flex items-center justify-between mt-5'>
                        <div class='flex items-center'>
                        <span class='text-sm font-medium text-gray-900 dark:text-gray-100'>$row[prix]</span>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ";
        
    }}else {
        echo "<script>alert('Invalid price range');</script>";
    }

}

if (isset($_POST['vider'])) {
    echo "<script>
    
            var table = document.getElementById('productTable');
            
            // Vérifie si la table existe avant de supprimer son contenu
            if (table) {
                // Efface le contenu de la table (sauf la première ligne)
                while (table.rows.length > 1) {
                    table.deleteRow(1);
                }
            }
          </script>";
}

?>
