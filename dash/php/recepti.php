<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepist | Dashboard</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:300,400,500">
    <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
    <link rel="stylesheet"
          href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link rel="stylesheet" href="../../assets/css/Ladus-Nav-Bar.css">
    <link rel="stylesheet" href="../../assets/css/nav-logo-center-hamburger.css">
    <link rel="stylesheet" href="../../assets/css/News-Cards.css">
    <link rel="stylesheet" href="../../assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="../../assets/css/Projects-Clean.css">
    <link rel="stylesheet" href="../../assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="../../assets/css/Shop-item.css">
    <link rel="stylesheet" href="../../assets/css/Shop-item.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/Pretty-Search-Form.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../../assets/css/Pretty-Footer.css">
    <link href="css/custom.css" rel="stylesheet">
</head>

<style>
    #customer_table_length {
        display: none;
    }

    /* The Modal (background) */
    .modal {
        margin: 0 auto;
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 15%;
        width: 70%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: 0 auto;
        padding: 2em;
        border: 1px solid #888;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .nav-md .container.body .right_col {
        background: white;
    }

    .dataTables_length {
        display: none;
    }

    #locations_table_filter input {
        border: 1px solid black;
        border-radius: 28px;
        width: 300px;
        color: black;
    }

    body {
        background: #f4f4f4;
    }

    .nav.navbar-nav > li > a {
        color: #ffffff !important;
    }

    .form-group{width: auto}
</style>

<?php include "../../components/recipeList.php"; ?>

<body>
<div class="container-fluid d-flex flex-row justify-content-center" id="food_container"
     style="background:#fff;min-height:100vh;margin:0;">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark"
         style="background-size:auto;background-position:right;">
        <div class="container-fluid">

            <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                        class="navbar-toggler-icon text-monospace"></span></button>
            <div class="collapse navbar-collapse"
                 id="navcol-1">
                <ul class="nav navbar-nav mx-auto" style="font-size:1.4em;">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="dash.php">Pregled</a>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="recepti.php">Recepti</a>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="blog_posts.php">Blog</a>
                    </li>
                </ul>
                <button id="myBtn" class="btn btn-primary" type="submit" name="submit"
                        style="background-color:#33383b;border: 1px solid #a9a9a9">Dodaj recept
                </button>
            </div>
        </div>
    </nav>

    <!--MODAL-->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-xl-6 col-lg-6">
                        <div style="margin-bottom: 1em"><h1>Dodaj novi recept!</h1></div>
                        <div class="form-group "><label style="font-weight:500;">Naziv:</label><input class="form-control" type="text" name="title" placeholder="Omlet sa šunkom.."></div>
                        <div class="form-group"><label style="font-weight:500;">Kratki opis:</label><input class="form-control" type="text" name="short_description" placeholder="Ukusno, brzo i jednostavno..."></div>
                        <div class="form-group"><label style="font-weight:500;">ingredients:</label><textarea class="form-control" name="ingredients">*Mlijeko *Brašno</textarea></div>
                        <div class="form-group"><label style="font-weight:500;">Preperation:</label><textarea class="form-control" name="description" placeholder="Potrebno nam je..."></textarea></div>
                        <div class="d-flex">
                            <div class="form-group" style="width: 30%;padding: 0 4px"><label style="font-weight:500;">Vrijeme pripreme:</label>
                                <input class="form-control input-default" list="time"
                                       name="time" placeholder="Odaberite">
                                <br>
                                <datalist id="time" style="color: #fff">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                    <option value="60">60</option>
                                </datalist>
                            </div>
                            <div class="form-group" style="width: 30%;padding: 0 4px"><label style="font-weight:500;">Zahtjevno:</label>
                                <input class="form-control input-default" list="toughnes"
                                       name="toughnes" placeholder="Odaberite">
                                <br>
                                <datalist id="toughnes" style="color: #fff">
                                    <option value="easy"></option>
                                    <option value="Normalno"></option>
                                    <option value="Komplikovano"></option>
                                    <option value="Veoma zahtjevno"></option>
                                </datalist>
                            </div>
                            <div class="form-group" style="width: 30%;padding: 0 4px"><label style="font-weight:500;">Osoba:</label>
                                <input class="form-control input-default" list="f_size"
                                       name="f_size" placeholder="Odaberite">
                                <br>
                                <datalist id="f_size" style="color: #fff">
                                    <option value="2"></option>
                                    <option value="3"></option>
                                    <option value="4"></option>
                                    <option value="5"></option>
                                    <option value="6"></option>
                                </datalist></div>
                        </div><button class="btn btn-primary" type="submit" value="submit" name="submit" style="background-color:#dddddd;color:#4d4d4d;">Spremi</button></div>
                    <div class="col-xl-6 col-lg-6">
                        <div style="margin-bottom: 1em"><h1>Tim Recepista.<span class="close">&times;</span></h1></div>
                        <div class="d-flex">
                            <div class="form-group"><label style="font-weight:500;">Kategorija:</label>
                                <input class="form-control input-default" list="category"
                                       name="category" placeholder="Odaberite">
                                <datalist id="category" style="color: #fff">
                                    <option value="Breakfast"></option>
                                    <option value="Lunch"></option>
                                    <option value="Dinner"></option>
                                    <option value="Desert"></option>
                                    <option value="Brunch"></option>
                                </datalist></div>
                            <div class="form-group"><label style="font-weight:500;">Top:</label>
                                <input class="form-control input-default"  list="top"
                                       name="top" placeholder="Odaberite">
                                <datalist id="top" style="color: #fff">
                                    <option value="Yes"></option>
                                    <option value="No"></option>
                                </datalist></div>
                        </div>
                        <div class="form-group">
                            <label style="font-weight:500;">Dodaj sliku:</label><input class="form-control" type="url" name="img_url" placeholder="Unesite URL slike..."></div>
                        <div class="form-group">
                            <label>Dodaj video:</label><input class="form-control" type="url" name="video_url" placeholder="Unesite URL videa..."></div>
                        <div class="d-flex flex-column justify-content-center align-items-center" style="padding:4em;">
                            <h6>Želimo vam prijatno i ugodno kuhanje!</h6><img src="../../assets/img/1recepista.png"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--MODAL-->
	
	
	<?php
		
		
		if (isset($_POST['submit'])){
			
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

    <div class="container-fluid">
        <div class="row" style="margin:8em 0 0 0;">
            <div class="table-responsive">
                <table id="locations_table" class="table table-striped jambo_table table-bordered">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Naziv</th>
                        <th class="column-title">Opis</th>
                        <th class="column-title">Top</th>
                        <th class="column-title">Kategorija</th>
                        <th class="column-title">Kompleksnost</th>
                        <th class="column-title">Opcije</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php
						function display_customers_super()
						{
							$conn = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
							$getCustomers = $conn->prepare("select * from recepti");
							$getCustomers->execute();
							$customers = $getCustomers->fetchAll();
							foreach ($customers as $customer) {
								
								echo '
                                              <tr>
                                              <td>' . ucfirst($customer['title']) . '</td>
                                              <td>' . ucfirst($customer['short_details']) . '</td>
                                              <td>' . ucfirst($customer['top']) . '</td>
                                              <td>' . $customer['category'] . '</td>
                                              <td>' . $customer['toughnes'] . '</td>
                                              <td style="display: flex;flex-direction: row">' . '<form action="recipe_details_controller.php" method="post">
                                                    <input type="hidden" name="id"  value="' . $customer["id"] . '" required>
                                                    <input type="submit" name="change" class="btn btn-default btn-sm" value="Uredi">
                                                    </form>
                                              <form action="delete_customer.php" method="post">
                                              <input type="hidden" name="id"  value="' . $customer["id"] . '" required>
                                              <input type="submit" name="delete" class="btn btn-default btn-sm" value="Izbriši">
                                              </form> </td>
                                            </tr>';
							}
						}
						
						display_customers_super();
					?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


</div>

<!-- jQuery -->
<script src="js/jquery/dist/jquery.min.js"></script>

<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script
        src="https://code.jquery.com/jquery-1.12.4.js"
        integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
        crossorigin="anonymous"></script>
<script
        src="https://code.jquery.com/jquery-2.2.4.js"
        integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous"></script>
<!-- Bootstrap -->
<script> $(document).ready(function () {
        $('#locations_table').DataTable({
            "iDisplayLength": 13
        });
    });</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


</body>

</html>

