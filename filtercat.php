<?php 
       if(isset($_POST['submit'])) {
        $selectedCategory = $_POST['product'];
        // Query based on selected category
        $sanitizedCategory = mysqli_real_escape_string($conn, $selectedCategory);
        $query = mysqli_query($conn, "SELECT * FROM product WHERE etiquette = '$sanitizedCategory'");
        if ($query) {
            // Loop through and display filtered products
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<div class='p-4 flex'>
                </div>
                <div class='px-3 py-4 flex justify-center'>
                    <table class='w-full text-md bg-white shadow-md rounded mb-4'>
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
    }
        
    

?>