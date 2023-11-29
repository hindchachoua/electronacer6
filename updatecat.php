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
$produit_result = $conn->query("SELECT * FROM categorie WHERE id = $id");
$produitData = $produit_result->fetch(PDO::FETCH_ASSOC);












if (isset($_POST['update'])) {
    $nom = $_POST['nom'];
    $description = $_POST['description'];  

    $stmt = $conn->prepare("UPDATE categorie SET nom=?, description=? WHERE id = ?");
   if ( $stmt->execute([$nom, $description, $id])) {
    header("Location: categori.php");
   }



}
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
<div class="w-full max-w-lg flex flex-wrap ml-20  justify-center items-center px-3 py-4 bg-white shadow-md rounded mb-4 " >
<form method="post" enctype="multipart/form-data">
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nom">
        titre
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="nom" name="nom" value="<?php echo $produitData["nom"] ?>"  type="text" placeholder="title">
      
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
        description
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="description" name="description" value="<?php echo $produitData["description"] ?>"  type="text" placeholder="description">
    </div>
    </div>
   
  </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
    

  </div>
    
  <button name="update" style="margin-left: 25%;" class="uppercase block  p-4 text-lg rounded-full bg-indigo-600 hover:bg-indigo-900 focus:outline-none" type="submit">update</button>
  </div>
</form>
</div>

<?php include 'js.php'?>
</body>
</html>