
<?php 
       if(isset($_POST['submit'])) {
        $selectedCategory = $_POST['product'];

    
        // Query based on selected category
        $Category = mysqli_real_escape_string($conn, $selectedCategory);
        $query = mysqli_query($conn, "SELECT * FROM product WHERE etiquette = '$Category'");
        if ($query) {
            // Loop through and display filtered products
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<div style='display: flex; flex-wrap:wrap; justify-content:space-around;'>
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
            </div> ";
                
            }
        } 
    }
?>
