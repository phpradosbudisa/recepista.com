<?php
/**
 * Created by PhpStorm.
 * User: Rados
 * Date: 12/22/2018
 * Time: 10:55 PM
 */

include 'config.php';

function displayTopRecepies($limit)
{
    $conn = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
    $get = $conn->prepare("select * from recepti where top = 'Yes' ORDER BY date_published DESC LIMIT $limit");
    $get->execute();
    $data = $get->fetchAll();
    foreach ($data as $recipe) {
        echo '
              <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 d-flex flex-row justify-content-center">
                <figure class="snip1527">
                    <div class="image">
                    <img src="' . $recipe["img_url"] . '"  alt="' . $recipe["title"] . '"/>
                    </div>
                    <figcaption>
                        <div class="date"><span class="day">#1</span><span class="month">hot</span></div>
                        <h3>' . $recipe["title"] . '</h3>
                        <p>' . substr($recipe["short_details"], 0, 40) . '...</p>
                    </figcaption>
                    <a href="#"></a>
                </figure>
            </div>';
    }
}

function displayDailyRecipes($limit)
{
    $conn = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
    $get = $conn->prepare("select * from recepti ORDER BY date_published DESC LIMIT $limit");
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
                        <p>' . substr($recipe['date_published'], 0, 10) . '</p>
                        <span class="description">
                            ' . substr($recipe["short_details"], 0, 45) . '...
                         </span>
                        <span class="price">' . $recipe["category"] . '</span>
                        <div class="pull-right" href="#"><i class="icon-shopping-cart"></i>
                          <form action="components/detalji_recepta.php" method="get">
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

function displayRecipes($limit)
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
                          <form action="components/detalji_recepta.php" method="get">
                                                    <input type="hidden" name="id"  value="' . $recipe["id"] . '" required>
                                                    <input type="submit" name="priprema" class="btn btn-info pull-right" value="Priprema"><i class="icon-shopping-cart"></i>
                                                    </form>
                        </div>                    </div>
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