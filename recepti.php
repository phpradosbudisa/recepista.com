<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Recepista, rECEPISTa, kuhanje, recepti, hrana, kolaci, desert, rucak, pile, ukusno, spremanje, priprema, kulinarstvo, gurman, majka, otac, recepista, obrok, spremanje, kuhanje, pecenje">
    <meta name="description" content="Mi smo informativni portal za gurmane. Ovim portalom želimo da pojednostavimo i olakšamo svakondevnu borbu s pitanjem 'Šta danas da skuhavmo?'. Nadamo se da će Vam naši recepti pomoći i da će biti korisni kada ih zatrebate.">
    <title>Recepist</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:300,400,500">
    <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
    <link rel="stylesheet"
          href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link rel="stylesheet" href="assets/css/Ladus-Nav-Bar.css">
    <link rel="stylesheet" href="assets/css/nav-logo-center-hamburger.css">
    <link rel="stylesheet" href="assets/css/News-Cards.css">
    <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="assets/css/Projects-Clean.css">
    <link rel="stylesheet" href="assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="assets/css/Shop-item.css">
    <link rel="stylesheet" href="assets/css/Shop-item.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Pretty-Search-Form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-4460030785211180",
            enable_page_level_ads: true
        });
    </script><!-- Global site tag (gtag.js) - Google Analytics -->
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

<style>
    body {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        height: 100%;
        background: #e5e5e5;
    }

    .form-group {
        margin: 0;
    }
    .bg-bijela{
        background: #FFFFFF;
    }
</style>

<body>

<section>

    <nav class="navbar navbar-light navbar-expand-md bg-bijela">
        <div class="container-fluid"><a href="#" class="navbar-brand" style="background-image:url(assets/img/1recepista.png);"></a><button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                    class="collapse navbar-collapse" id="navcol-1" style="font-size:13px;">
                <ul class="nav navbar-nav mx-auto">
                    <li role="presentation" class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
                    <li role="presentation" class="nav-item"><a href="recepti.php" class="nav-link">Recipes</a></li>
                    <li role="presentation" class="nav-item"><a href="o-nama.php" class="nav-link">About us</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <div>
                        <form class="form-inline" method="get">
                            <div class="form-group d-flex" style="width:100%;"><input class="form-control" type="querry"
                                                                                      style="border-radius: 28px;text-align: center"
                                                                                      name="querry"
                                                                                      placeholder="Search recipes:"
                                                                                      autocomplete="off">
                            </div>
                        </form>
                    </div>
                    <li role="presentation" class="nav-item"><a href="#" class="nav-link active">Log in</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid d-flex flex-row justify-content-center" id="food_container"
         style="margin:0;">

        <div class="row projects" style="margin:0 0 0 0;width:80%;">
            <?php
                include 'components/config.php';
                function displayDailyRecipes($limit, $cat)
                {
                    $conn = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
                    $get = $conn->prepare("select * from recepti WHERE category = '$cat'  ORDER BY date_published DESC LIMIT $limit" );
                    $get->execute();
                    $data = $get->fetchAll();
                    echo '<div class="col-12">
                <h1>'.$cat.'</h1>
                </div>';
                    foreach ($data as $recipe) {
                        echo '
                <div class="col-xs-2 col-12 col-sm-6 col-lg-4 col-xl-3 offset-xl-0 d-flex flex-row justify-content-center item"
                 style="padding:1.5em 15px;">
                <div class="block span3">
                    <div class="product">
                        <img style="height:15em" class="img-fluid" src="' . $recipe["img_url"] . '">
                    </div>
                    
                    <div class="info">
                        <h4>' . $recipe["title"] . '</h4>
                        <p>'. substr($recipe['date_published'], 0, 10) .'</p>
                        <span class="description">
                            ' . substr($recipe["short_details"], 0, 45) . '...
                         </span>
                        <span class="price">' . $recipe["category"] . '</span>
  <div class="pull-right" href="#"><i class="icon-shopping-cart"></i>
                          <form action="components/detalji_recepta.php" method="get">
                                                    <input type="hidden" name="id"  value="' . $recipe["id"] . '" required>
                                                    <input type="submit" name="priprema" class="btn btn-info pull-right" value="Preperation"><i class="icon-shopping-cart"></i>
                                                    </form>
                        </div>                    </div>
                    <div class="details">
                        <span class="time"><i class="icon-time"></i>' . $recipe["toughnes"] . '</span>
                        <span class="rating pull-right">';
                        
                        switch ($recipe["toughnes"]) {
                            case 'Easy':
                                echo '<span class="star"></span>';
                                break;
                            case 'Normal':
                                echo '<span class="star"></span>
                                          <span class="star"></span>';
                                break;
                            case 'Complicated':
                                echo '<span class="star"></span>
                                          <span class="star"></span>
                                          <span class="star"></span>';
                                break;
                            case 'Very hard':
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
                    echo '
<div class="col-xs-2 col-12 col-sm-6 col-lg-4 col-xl-3 offset-xl-0 d-flex flex-row justify-content-center align-items-center align-content-center"
                 style="padding:1.5em 15px;">
    <form action="category_recepti.php" method="get">
    <input type="hidden" name="category" value="'. $recipe['category'] .'">
    <button class="btn btn-primary" type="submit" style="background-color:rgba(0,0,0,0);border:none;"><img src="assets/img/arrow.png" /></button>
</form>
</div>';
                }
                
                
                
                if (!isset($_GET['querry'])) {
                    displayDailyRecipes(3, 'Dorucak');
                    displayDailyRecipes(3, 'Rucak');
                    displayDailyRecipes(3, 'Vecera');
                    displayDailyRecipes(3, 'Desert');
                    displayDailyRecipes(3, 'Uzina');
                } else {
                    $querry = $_GET['querry'];
                    $min_lenght = 3;
                    
                    if (strlen($querry) >= $min_lenght) {
                        $conn = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
                        $get = $conn->prepare("SELECT * FROM recepti WHERE (`category` LIKE '%" . $querry . "%') OR (`title` LIKE '%" . $querry . "%') OR (`short_details` LIKE '%" . $querry . "%') OR (`title` LIKE '%" . $querry . "%') ORDER BY `recepti`.`date_published` DESC");
                        $get->execute();
                        $data = $get->fetchAll();
                        if (!empty($data)) {
                            foreach ($data as $recipe) {
                                echo '<div class="col-xs-2 col-12 col-sm-6 col-lg-4 col-xl-3 offset-xl-0 d-flex flex-row justify-content-center item"
                 style="padding:1.5em 15px;">
                <div class="block span3">
                    <div class="product">
                        <img style="height:15em" class="img-fluid" src="' . $recipe["img_url"] . '">
                    </div>
                    
                    <div class="info">
                        <h4>' . $recipe["title"] . '</h4>
                        <span class="description">
                            ' . substr($recipe["short_details"], 0, 45) . '...
                         </span>
                        <span class="price">' . $recipe["category"] . '</span>
 <div class="pull-right" href="#"><i class="icon-shopping-cart"></i>
                          <form action="components/detalji_recepta.php" method="get">
                                                    <input type="hidden" name="id"  value="' . $recipe["id"] . '" required>
                                                    <input type="submit" name="priprema" class="btn btn-info pull-right" value="Preperation"><i class="icon-shopping-cart"></i>
                                                    </form>
                        </div>                     </div>
                    <div class="details">
                        <span class="time"><i class="icon-time"></i>' . $recipe["toughnes"] . '</span>
                        <span class="rating pull-right">';
                                
                        switch ($recipe["toughnes"]) {
                            case 'Easy':
                                echo '<span class="star"></span>';
                                break;
                            case 'Normal':
                                echo '<span class="star"></span>
                                          <span class="star"></span>';
                                break;
                            case 'Complicated':
                                echo '<span class="star"></span>
                                          <span class="star"></span>
                                          <span class="star"></span>';
                                break;
                            case 'Very hard':
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
                        } elseif (empty($data)) {
                            echo '<div class="container-fluid">
                                <div class="row">
                                    <div class="col-12" style="text-align: center">
                                        <h4>Your search is either empty or we do not have that result.</h4>
                                        <h6>We suggeste the following recipes or you can <br> repeat your search.</h6>
                                    </div>
                                </div>
                              </div>';
                            displayDailyRecipes(4, 'Uzina');
                            displayDailyRecipes(4, 'Dorucak');
                        }
                    }  else {
                        echo '<div class="container-fluid">
                                <div class="row">
                                <div class="col-12" style="text-align: center">
                                <h3>We did not find any results.</h3>
                                Minimal characters to search must be ' . $min_lenght . ' .
                            </div>
                            </div>
                            </div>';
                        displayDailyRecipes(4, 'Rucak');
                        displayDailyRecipes(4, 'Desert');
                    }
                }
            
            ?>
        </div>
    </div>
</section>
<?php include 'components/footer.php' ?>


<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
</body>
</html>