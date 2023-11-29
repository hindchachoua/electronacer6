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
    } else {
        echo "Invalid price range.";
    }

    // Display products based on the filtered price range
    
    $sql = "SELECT * FROM product $filter";
    $quy = mysqli_query($conn, $sql);

    // Display products in a table
    while ($row = mysqli_fetch_assoc($quy)) {

        echo "<div class='p-4 flex'>
        </div>
        <div class='px-3 py-4 flex justify-center'>
            <table id='productTable' class='w-full text-md bg-white shadow-md rounded mb-4'>
                <tr class='border-b'>
                    <th class='text-left p-3 px-5'>Etiquette</th>
                    <th class='text-left p-3 px-5'>Description</th>
                    <th class='text-left p-3 px-5'>Prix</th>
                    <th class='text-left p-3 px-5'>Image</th>
                    <th class='text-left p-3 px-5'>Delete</th>
                    <th class='text-left p-3 px-5'>Modify </th>
                    <th></th>
                </tr>
                <tr>
                <td class='p-3 px-5'>{$row['etiquette']}</td>
                <td class='p-3 px-5'>{$row['description']}</td>
                <td class='p-3 px-5'>{$row['prix']}</td>
                <td class='p-3 px-5'>{$row['image']}</td>
                <td class='p-3 px-5'><a href='deletpro.php?id={$row['id']}'>Delete</a></td>
                <td class='p-3 px-5'><a href='modify.php?id={$row['id']}'>Modify</a></td>
                </tr>
            </table>
            </div>
            </div>";
            

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
