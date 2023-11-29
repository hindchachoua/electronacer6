<?php
	require_once 'connection.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$inter = "INSERT INTO admin (`email` , `password`) VALUES ('$email','$password')";
		$result = mysqli_query($conn,$inter);
	if(isset($result)){
    	header("location: accueil.php");
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

<div class="h-screen md:flex">
<div class="lg:flex w-1/2 hidden bg-gray-500 bg-no-repeat bg-cover relative items-center" style="background-image: url(img/electroimage.png);">
<div class="absolute bg-black opacity-60 inset-0 z-0"></div>

	</div>
	<div style="background-color: #161616;" class="flex md:w-1/2 justify-center py-10 items-center ">
		<form method="POST" style="background-color: #161616;">
			<h1 class="text-indigo-800 font-bold text-2xl mb-8 ">Hello Again!</h1>
			
					<div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
							viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
						</svg>
						<input class="pl-2 outline-none border-none" style="background-color: #161616; color: white" type="text" name="email" id="email" placeholder="Email Address" />
      				</div>
						<div class="flex items-center border-2 py-2 px-3 rounded-2xl">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
								fill="currentColor">
								<path fill-rule="evenodd"
									d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
									clip-rule="evenodd" />
							</svg>
							<input class="pl-2 outline-none border-none" style="background-color: #161616; color: white" type="text" name="password" id="password" placeholder="Password" />
     					</div>
							<button type="submit" class="block w-full bg-indigo-600 hover:bg-indigo-800 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Login</button>
							
		</form> 
        <div style="margin-top: 60%;" class="text-right text-gray-400 hover:underline hover:text-gray-100">
                        <a href="index.php">back</a>
                    </div>
</div>
<script src="./Layout/js/script.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
</body>
</html>