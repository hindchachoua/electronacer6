
<?php 

require_once 'connection.php';
$query = "select * from admin";
$result = mysqli_query($conn,$query);

$mysqli = new mysqli("localhost", "root", "", "electronacer");
$res = $mysqli->query("SELECT * FROM categorie ORDER BY RAND()");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body style="overflow-x: hidden; ">

<?php include 'navbar2.php'; ?>
<?php include 'update.php'; ?>
<div class="text-gray-900 bg-gray-200">
    <div class="p-4 flex">
        <h1 class="text-5xl">
            Users
        </h1>
    </div>
    <div class="px-3 py-4 flex justify-center">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
            
            <tr  class="border-b">
                <th class="text-left p-3 px-5">Email</th>
                <th class="text-left p-3 px-5">Password</th>
                <th class="text-left p-3 px-5">Role</th>
                <th class="text-left p-3 px-5">Delet user</th>
                <th></th>
            </tr>
            <tr>
                <?php 
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>
                            <td class='p-3 px-5'>{$row['email']}</td>
                            <td class='p-3 px-5'>{$row['password']}</td>
                            <td class='p-3 px-5'>{$row['role']}</td>
                            <td class='p-3 px-5'><a href='delete.php?id={$row['id']}'>Delete</a></td>
                            <td class='p-3 px-5'>
                                <form action='user.php' method='post'>
                                    <input type='hidden' name='id' value='{$row['id']}'>
                                    <select name='role'>
                                    <option value='user'"; if($row['role'] == 'user') echo 'selected';
                                echo ">User</option>
                                    <option value='admin'"; if($row['role'] == 'admin') echo 'selected';
                                echo ">Admin</option>
                                    </select>
                                <button type='submit'>Change Role</button>
                            </form>
                            </td>

                            
                            
                            </tr>";
                    }
                    mysqli_close($conn);
                   



                
                
                ?>

            </tr>    
                
            
        </table>
    </div>
</div>
<div style="margin-left: 30%; margin-bottom: 10%; margin-top: 10%;">
<div class="w-full max-w-lg flex flex-wrap ml-20  justify-center items-center px-3 py-4 bg-white shadow-md rounded mb-4 ">
<form method="post" action="addproduct.php" enctype="multipart/form-data" >
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="etiquette">
        titre
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="etiquette" name="etiquette"  type="text" placeholder="title">
      
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
        description
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="description" name="description" type="text" placeholder="description">
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="ref_prod">
        ref_prod
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="ref_prod" name="ref_prod" type="text" placeholder="ref_prod">
    </div>

    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="qte_min">
        qte_min
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="qte_min" name="qte_min" type="text" placeholder="qte_min">
    </div>

    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="qte_stock">
        qte_stock
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="qte_stock" name="qte_stock" type="text" placeholder="qte_stock">
    </div>

  </div>
    <div style="margin-left: 20%;" class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="prix">
        prix
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="prix" name="prix" type="number" placeholder="price">
    </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div style="margin-left: 5%;" class=" px-3">
      <label class="block ml-20 uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image">
        uplaod image
      </label>
      <input  class="appearance-none block w-full ml-20 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="image" type="file" name="image">
    
    </div>

  </div>
  <label for="product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Select an option</label>
        <select id="products" name="product" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 
        block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>All</option>
        <?php if (isset( $res)) {   ?>
            <?php foreach ($res as $row) { ?>


            <option value="<?=   $row['id']?>"><?=   $row["nom"]?> </option>


            <?php   } } ?>
          
        </select>
  <button name="add_product" style="margin-left: 20%;" class="uppercase block  p-4 text-lg rounded-full bg-indigo-600 hover:bg-indigo-900 focus:outline-none" type="submit">add to product</button>
  </div>
</form>
</div>


<?php include 'addproduct.php'; ?>



<?php
require 'connection.php';

// Display existing products in a table
$sql = "SELECT * FROM product";
$quy = mysqli_query($conn, $sql);

echo "<table border='1'  class='w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400'>
    <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Description</th>
    <th>Price</th>
    <th>Image</th>
    <th>Delete</th>
    </tr>";

while ($row = mysqli_fetch_assoc($quy)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['etiquette'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['prix'] . "</td>";
    echo "<td><img src='" . $row['image'] . "' width='100' height='100'></td>";
    echo "<td><a class='inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800' href='deletpro.php?id=" . $row['id'] . "'>Delete</a></td>";
    echo "<td><a class='inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800' href='updatpro.php?id=" . $row['id'] . "'>update</a></td>";
    echo "</tr>";
}

echo "</table>";






// Delete a product
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_sql = "DELETE FROM product WHERE id = '$id'";
    if (mysqli_query($conn, $delete_sql)) {
        echo "Product deleted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>



<div>
    <button class="uppercase block ml-8  p-4 text-lg rounded-full bg-white-600 hover:bg-indigo-800 focus:outline-none" ><a href="accueil2.php">Back To Home</a></button>
</div>

<?php include 'js.php'; ?>

</body>
</html>