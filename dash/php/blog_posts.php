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
		width: 60%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
	}
	
	/* Modal Content */
	.modal-content {
		background-color: #fefefe;
		margin: 0 auto;
		padding: 2em;
		border: 1px solid #888;
		width: 80%;
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
	
	body{
		background: #f4f4f4;
	}
	
	.nav.navbar-nav>li>a {
		color: #ffffff !important;
	}
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
				<button class="btn btn-primary" type="submit" name="submit" style="background-color:#33383b;border: 1px solid #a9a9a9">Dodaj post
				</button>
			</div>
		</div>
	</nav>
	
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
                                                    <input type="hidden" name="user_name"  value="' . $customer["id"] . '" required>
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


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>


</body>

</html>

