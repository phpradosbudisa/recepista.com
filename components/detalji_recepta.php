
<?php
	include 'config.php';
	
	
	function displayDailyRecipes($limit)
	{
		$conn = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$get = $conn->prepare("select * from recepti  LIMIT $limit");
		$get->execute();
		$data = $get->fetchAll();
		foreach ($data as $recipe) {
			echo '<div class="col-xs-2 col-12 col-sm-6 col-lg-4 col-xl-3 offset-xl-0 d-flex flex-row justify-content-center item"
                 style="padding:1.5em 15px;">
                <div class="block span3">
                    <div class="product">
                        <img style="height:15em" class="img-fluid" src="' . $recipe["img_url"] . '" alt="' . $recipe["title"] . '">
                    </div>
                    
                    <div class="info">
                        <h4>' . $recipe["title"] . '</h4>
                        <span class="description">
                            ' . substr($recipe["short_details"], 0, 45) . '...
                         </span>
                        <span class="price">' . $recipe["category"] . '</span>
                        <div class="pull-right" href="#"><i class="icon-shopping-cart"></i>
                          <form action="detalji_recepta.php" method="get">
                                                    <input type="hidden" name="id"  value="' . $recipe["id"] . '" required>
                                                    <input type="submit" name="priprema" class="btn btn-info pull-right" value="Priprema"><i class="icon-shopping-cart"></i>
                                                    </form>
                        </div>
                    </div>
                    <div class="details">
                        <span class="time"><i class="icon-time"></i>' . $recipe["toughnes"] . '</span>
                        <span class="rating pull-right">';
			
			switch ($recipe["toughnes"]) {
				case 'Lagano':
					echo '<span class="star"></span>';
					break;
				case 'Normalno':
					echo '<span class="star"></span>
                                          <span class="star"></span>';
					break;
				case 'Komplikovano':
					echo '<span class="star"></span>
                                          <span class="star"></span>
                                          <span class="star"></span>';
					break;
				case 'Veoma zahtjevno':
					echo '<span class="star"></span>
                                          <span class="star"></span>
                                          <span class="star"></span>
                                          <span class="star"></span>';
					break;
				default:
					echo '<span class="star"></span>
                                          <span class="star"></span>
                                          <span class="star"></span>
                                          <span class="star"></span>
                                          <span class="star"></span>';
			}
			
			echo '
                         </span>
                    </div>
                </div>
            </div>';
		}
	}
	
	if (isset($_GET['priprema'])) {
		$recipe_id = $_GET['id'];
		
		$conn = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$get = $conn->prepare("SELECT * FROM recepti WHERE id = $recipe_id");
		$get->execute();
		$data = $get->fetchAll();
		foreach ($data as $recipe) {
		}
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Recepista, rECEPISTa, kuhanje, recepti, hrana, kolaci, desert, rucak, pile, ukusno, spremanje, priprema, kulinarstvo, gurman, majka, otac, recepista, obrok, spremanje, kuhanje, pecenje">
    <meta name="description" content="<?= $recipe["short_details"] ?> ">
    <meta property="og:title" content="<?= $recipe["title"] ?>" />
    <meta property="og:url" content="http://www.recepista.com/components/detalji_recepta.php?id=<?= $recipe["id"] ?>&priprema=Priprema" />
    <meta property="og:type" content="food" />
    <meta property="og:description" content="<?= $recipe["short_details"] ?>" /
    <meta property="og:image" content="<?= $recipe["img_url"] ?>" />
    <title>Recepista | <?= $recipe["title"] ?> </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:300,400,500">
    <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link rel="stylesheet" href="../assets/css/styles.min.css">
    
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131497720-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-131497720-1');
</script>


    <script id="mcjs">!function (c, h, i, m, p) {
            m = c.createElement(h), p = c.getElementsByTagName(h)[0], m.async = 1, m.src = i, p.parentNode.insertBefore(m, p)
        }(document, "script", "https://chimpstatic.com/mcjs-connected/js/users/a0c234ec7924b4a412284f9a5/3c3cb6c36d45138826aec88a8.js");</script>
</head>

<body>
<nav class="navbar navbar-light navbar-expand-md">
    <div class="container-fluid"><a class="navbar-brand" href="#" style="background-image:url(&quot;../assets/img/1recepista.png&quot;);"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div
                class="collapse navbar-collapse" id="navcol-1" style="font-size:13px;">
            <ul class="nav navbar-nav mx-auto">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="../index.php">Početna</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="../recepti.php">Recepti</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="../o-nama.php">O nama</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <div>
                    <form class="form-inline" method="get" action="../recepti.php">
                        <div class="form-group d-flex" style="width:100%;"><input class="form-control" type="querry"
                                                                                  style="border-radius: 28px;text-align: center"
                                                                                  name="querry"
                                                                                  placeholder="Pretrazi recepte:"
                                                                                  autocomplete="off">
                        </div>
                    </form>
                </div>
                <li class="nav-item" role="presentation"><a class="nav-link active" href="../dash/">Uloguj se</a></li>
            </ul>
        </div>
    </div>
</nav>
<section class="d-flex justify-content-center align-items-center" style="margin:2em 0;">
    <div class="container-fluid">
        <div class="row">
	        <?php
		
		        $img = $recipe['img_url'];
		        $video = $recipe['video_url'];
		
		        if ($recipe['video'] == 'true'){
			        echo '
                        <div class="col-sm-12 col-md-12 col-lg-6">
                        <h3>'. $recipe['title'] .'</h3>
                        <video controls><source src="'. $recipe['video_url'] .'" type="video/mp4"></source>Your browser does not support HTML5 video.</video>
                        </div>';
		        } else{
			        echo '<div class="col-sm-12 col-md-12 col-lg-6" style="margin: 0 auto;text-align: center; ">
                    <img class="img-fluid" style="max-height: 30em" src="'. $recipe['img_url'] .'" alt="' . $recipe["title"] . '">
                    </br>
                    </br>
                    			        <h1>'. $recipe['title'] .'</h1>
                    </br>
                    <hr>
                    </br>
                    <h5>Datum objave:  '. substr($recipe['date_published'], 0, 10) .'</h5>
                    </div>';
                    }
	
	        ?>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <h3>Priprema:</h3>
                <p><?php
		                //List generator
		                foreach ($data as $recipe) {
								$list =  $recipe['description'];
								$list = str_replace(',,','<br>', $list);
		                        echo $list;
		                    }
		                    //List generator end
		                //List generator end
	                ?></p>
                <div>
                    <h3 class="text-left">Sastojci:</h3>
                    <ul class="list-inline">
	                    <?php
		                    //List generator
		                   foreach ($data as $recipe) {
								$list =  $recipe['ingredients'];
								$list = str_replace(',,','<br>', $list);
		                        echo $list;
		                    }
		                    //List generator end
	                    ?>
                    </ul>
                </div>
                <div>
                    <h3 class="text-left">Kratki opis:</h3>
                    <ul class="list-inline">
	                    <?php
		                    //List generator
		                   foreach ($data as $recipe) {
								$list =  $recipe['short_details'];
								$list = str_replace(',,','<br>', $list);
		                        echo $list;
		                    }
		                    //List generator end
	                    ?>
                    </ul>
                </div>
                <div>
                    <div class="d-flex flex-row" style="font-size:18px;">
                        <div class="d-flex flex-row align-items-center" style="margin:0 3px;"><i class="fa fa-clock-o"></i>
                            <p style="margin:0;line-height:0px;height:0;padding:0;">&nbsp;<?=$recipe['time']?> min.</p>
                        </div>
                        <div class="d-flex flex-row align-items-center" style="margin:0 3px;"><i class="fa fa-dashboard"></i>
                            <p style="margin:0;line-height:0px;height:0;padding:0;">&nbsp;<?=$recipe['toughnes']?></p>
                        </div>
                        <div class="d-flex flex-row align-items-center" style="margin:0 3px;"><i class="fa fa-users"></i>
                            <p style="margin:0;line-height:0px;height:0;padding:0;">&nbsp;<?=$recipe['f_size']?> osobe</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="d-flex flex-row justify-content-center align-items-center" style="background-color:#000000;height:10em;color:rgb(255,255,255);">
    <div class="container" style="margin:0;">
        <h1 class="text-center">Mjesto za Vašu reklamu!</h1>
    </div>
</section>
<section class="d-flex flex-row justify-content-center align-items-center align-content-center" id="recepti">
    <div class="container-fluid d-flex flex-row justify-content-center" id="food_container"
         style="background-image:url(&quot;assets/img/dark-wood-black-grey-background-vertical-md-roofs-dfw.jpg&quot;);background-repeat:no-repeat;background-size:cover;margin:0;">
        <div class="row projects" style="width:80%;">
            <!--DNEVNI RECEPTI-->
			<?php displayDailyRecipes(4) ?>
            <!--DNEVNI RECEPTI-->
        </div>
    </div>
</section>
<section class="d-flex flex-row justify-content-center align-items-center align-content-center"
         style="background-image:url(&quot;../assets/img/f2d8350ce4a7d8b773064d40be3b447a.jpg&quot;);height:10em;background-repeat:repeat-x;background-size:auto;background-position:bottom;">
    <div class="container" style="margin-top:0;">
        <div class="row">
            <div class="col-12 align-self-center">
                <form class="form-inline d-flex flex-row justify-content-center" method="post">
                    <div class="form-group d-flex flex-row justify-content-center" style="width:100%;">
                        <button class="btn btn-primary" type="submit"
                                style="background:#ffffff00;border: 1.5px solid #a9a9a9"><a
                                    style="background:#ffffff00!important;color: white;text-decoration: none"
                                    href="recepti.php">Pretraži sve recepte!</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
<script src="../assets/js/script.min.js"></script>
</body>

</html>