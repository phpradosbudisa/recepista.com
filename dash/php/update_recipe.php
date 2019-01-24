<?php
	include 'config.php';
	
	
	if (isset($_POST['submit'])){
	
        	$id = $_POST['id'];
        	
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
	
	        function save_recipe($id, $title, $short_description, $ingredients, $description, $time, $toughnes, $f_size, $category, $top, $img, $video){
		        $conn = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		        $saveRecipe = $conn->prepare("UPDATE recepti SET title = '$title', short_details = '$short_description', ingredients = '$ingredients', description = '$description', time = '$time', toughnes = '$toughnes', f_size = '$f_size', category = '$category', top = '$top', img_url = '$img', video_url = '$video' WHERE id = '$id' ");
		        $saveRecipe->execute();
		       
	        }
	
	        save_recipe($id, $title,$short_description,$ingredients,$description,$time,$toughnes,$f_size,$category,$top, $img, $video);
			header('Location: recepti.php');
        }
        
        
    ?>