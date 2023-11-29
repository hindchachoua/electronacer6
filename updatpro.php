
<?php 

$host = 'localhost';
$dbname = 'electronacer';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}




$id = $_GET['id'];

$produit_result = $conn->query("SELECT * FROM product WHERE id = $id");
$produitData = $produit_result->fetch(PDO::FETCH_ASSOC);

$produit_rzsult = $conn->query("SELECT * FROM categorie ");
$categorieData = $produit_rzsult->fetchAll(PDO::FETCH_ASSOC);


if (isset($_POST['update'])) {
    $etiquette = $_POST['etiquette'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $ref_prod = $_POST['ref_prod'];
    $qte_min = $_POST['qte_min'];
    $qte_stock = $_POST['qte_stock'];
    $cate = $_POST['cate'];
   

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

         if (!empty($uploadpic)) {
            $stmt = $conn->prepare("UPDATE product SET ref_prod=?, etiquette=?, prix=?, image=?, description=?, qte_min=?, qte_stock=?, categorie_fk=? WHERE id = ?");
                  $stmt->execute([ $ref_prod,$etiquette, $prix, $uploadpic, $description, $qte_min, $qte_stock, $cate, $id]);
      
      
      
            header("Location: user.php");
            exit; 
      
      
       
          }


    $stmt = $conn->prepare("UPDATE `product` SET `ref_prod`='$ref_prod',`etiquette`='$etiquette',`prix`='$prix',`image`='$uploadpic',`description`='$description',`qte_min`='$qte_min',`qte_stock`='$qte_stock',`categorie_fk`='$cate' WHERE id = $id");
   if ( $stmt->execute()) {
    header("Location: user.php");
   
   }



}
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

<div style="margin-left: 30%; margin-bottom: 10%; margin-top: 10%;">
<div class="w-full max-w-lg flex flex-wrap ml-20  justify-center items-center px-3 py-4 bg-white shadow-md rounded mb-4 ">
<form method="post"  enctype="multipart/form-data" >
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="etiquette">
        titre
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="etiquette" name="etiquette" value="<?= $produitData['etiquette'] ?>"  type="text" placeholder="title">
      
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
        description
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="description" name="description" value="<?= $produitData['description'] ?>" type="text" placeholder="description">
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="ref_prod">
        ref_prod
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="ref_prod" name="ref_prod" value="<?= $produitData['ref_prod'] ?>" type="text" placeholder="ref_prod">
    </div>

    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="qte_min">
        qte_min
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="qte_min" name="qte_min" value="<?= $produitData['qte_min'] ?>" type="text" placeholder="qte_min">
    </div>

    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="qte_stock">
        qte_stock
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="qte_stock" name="qte_stock" value="<?= $produitData['qte_stock'] ?>" type="text" placeholder="qte_stock">
    </div>

  </div>
    <div style="margin-left: 20%;" class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="prix">
        prix
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="prix" name="prix" value="<?= $produitData['prix'] ?>" type="number" placeholder="price">
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
        <select id="products" name="cate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 
        block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>All</option>
        <?php if (isset( $categorieData)) {   ?>
            <?php foreach ($categorieData as $row) { ?>


            <option value="<?=   $row['id']?>"><?=   $row["nom"]?> </option>


            <?php   } } ?>
          
        </select>
  <button name="update_product" style="margin-left: 20%;" class="uppercase block  p-4 text-lg rounded-full bg-indigo-600 hover:bg-indigo-900 focus:outline-none" type="submit" >update to product</button>
  </div>
</form>
</div>


<?php include 'js.php'; ?>

</body>
</html>