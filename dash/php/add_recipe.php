<?php
	
		if (isset($_POST['submit'])){
			define('DBHOST', 'localhost');
			define('DBUSER', 'root');
			define('DBPASS', '');
			define('DBNAME', 'rECEPISTa');
			
			$title = $_POST['title'];
			$short_description = $_POST['short_description'];
			$ingredients = $_POST['ingredients'];
			$description = $_POST['description'];
			$time = $_POST['time'];
			$toughnes = $_POST['toughnes'];
			$f_size = $_POST['f_size'];
			$category = $_POST['category'];
			$top = $_POST['top'];
			$img = $_POST['img_url'];
			$video = $_POST['video_url'];
			
			function save_recipe($title, $short_description, $ingredients, $description, $time, $toughnes, $f_size, $category, $top, $img, $video){
				$conn = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
				$saveRecipe = $conn->prepare("insert into recepti(title, short_details, ingredients, description, time, toughnes, f_size, category, top, img_url, video_url) values ('$title', '$short_description', '$ingredients', '$description', '$time','$toughnes', '$f_size', '$category', '$top', '$img', '$video')");
				$saveRecipe->execute();
				$recipe = $saveRecipe->fetchAll();
			}
			
			save_recipe($title,$short_description,$ingredients,$description,$time,$toughnes,$f_size,$category,$top, $img, $video);
			
		}
	
	
	?>