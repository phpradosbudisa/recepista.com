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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:300,400,500">
    <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
    <link rel="stylesheet"
          href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
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


<!--INLCUDES-->

<?php include 'components/recipeList.php' ?>

<!--INLCUDES-->


<body style="font-family:'Montserrat Alternates', sans-serif !important;font-weight:100;">
<nav class="navbar navbar-light navbar-expand-md">
    <div class="container-fluid"><a href="#" class="navbar-brand"
                                    style="background-image:url(assets/img/1recepista.png);"></a>
        <button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
        <div
                class="collapse navbar-collapse" id="navcol-1" style="font-size:13px;">
            <ul class="nav navbar-nav mx-auto">
                <li role="presentation" class="nav-item"><a href="index.php" class="nav-link active">Početna</a></li>
                <li role="presentation" class="nav-item"><a href="recepti.php" class="nav-link">Recepti</a></li>
                <li role="presentation" class="nav-item"><a href="o-nama.php" class="nav-link">O nama</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li role="presentation" class="nav-item"><a href="dash/" class="nav-link active">Uloguj se</a></li>
            </ul>
        </div>
    </div>
</nav>
<section class="d-flex flex-column justify-content-center align-items-center" id="home">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 d-flex flex-row justify-content-center align-items-center align-content-center"
                 style="padding:0 90px 0 ;"><img src="assets/img/2recepista.png" class="img-fluid"/></div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <h2 class="text-center" style="color:rgb(255,255,255);font-weight:100;font-size:2em;">Brzo vam treba
                    recept?<br></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <h3 class="text-center" style="color:rgb(255,255,255);font-weight:100;font-size:1.4em;">Ne znate šta
                    danas da spremite? Mi cemo vam predložiti!</h3>
            </div>
        </div>
        <div id="head-divider" class="divider"></div>
        <div class="row">
            <div id="form"
                 class="col-12 col-xl-6 d-flex flex-column justify-content-center align-items-center align-content-center align-self-center">
                <form class="form-inline d-flex flex-row justify-content-center" method="post"
                      action="components/subscribe.php">
                    <div class="form-group d-flex" style="width:100%;"><input class="form-control" type="email"
                                                                              name="email"
                                                                              placeholder="Vaša email adresa:"
                                                                              autocomplete="off">
                        <button class="btn btn-primary" type="submit" name="submit"
                                style="background:#ffffff00;border: 1.5px solid #a9a9a9">Pretplati me!
                        </button>
                    </div>
                </form>
                <p class="text-truncate text-center" style="color:rgb(255,255,255);font-size:0.9rem;">Pretplatite se na
                    dnevne sugestije za kuhanje!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3">
                <div></div>
            </div>
        </div>
    </div>
</section>

<!--NAJBOLJI RECEPTI-->
<div class="caption v-middle text-center">
    <h1 class="cd-headline clip">
        <span class="blc">Ja sam | </span>
        <span class="cd-words-wrapper">
			              <b class="is-visible">Majka.</b>
			              <b>Otac.</b>
			              <b>Gurman.</b>
                          <b>Kuhar.</b>
                          <b>Recepist-a!</b>
			            </span>
    </h1>
</div>

<div class="d-flex flex-column justify-content-center align-items-center align-content-center projects-clean"
     style="background-color:#f4f4f4;">
    <div class="intro">
        <h2 class="text-center"
            style="font-family:'Montserrat Alternates', sans-serif;font-weight:200;margin-bottom:10px;">Najbolji
            recepti</h2>
        <p class="text-center" style="margin-bottom:25px;">Dnevna doza recepta za vas dom!</p>
    </div>
    <div class="container-fluid" id="top_container">
        <div class="row projects">
			<?php displayTopRecepies(3) ?>
        </div>
    </div>
    <div class="intro">
        <h2 class="text-center"
            style="font-family:'Montserrat Alternates', sans-serif;font-weight:200;margin-bottom:10px;">Niste
            zadovoljni? Ima toga još!</h2>
        <p class="text-center" style="margin-bottom:25px;">Pronađite stare ili nove recepte na našoj stranici
            korištenjem pretraživača!</p>
    </div>
</div>


<!--NAJBOLJI RECEPTI-->

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
         style="background-image:url(&quot;assets/img/f2d8350ce4a7d8b773064d40be3b447a.jpg&quot;);height:10em;background-repeat:repeat-x;background-size:auto;background-position:bottom;">
    <div class="container" style="margin-top:0;">
        <div class="row">
            <div class="col-12 align-self-center">
                <form class="form-inline d-flex flex-row justify-content-center" method="post">
                    <div class="form-group d-flex flex-row justify-content-center" style="width:100%;">
                        <a class="btn btn-primary" type="link" href="recepti.php"
                                style="background:#ffffff00;border: 1.5px solid #a9a9a9">Pretraži sve recepte!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'components/footer.php' ?>


<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
<script src="assets/js/script.min.js"></script>
</body>

</html>