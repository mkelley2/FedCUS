<?php
    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Player.php";
    require_once __DIR__."/../src/Riven.php";
    require_once __DIR__."/../src/Item.php";

    $server = 'mysql:host=localhost:8889;dbname=fedcus';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app['debug'] = true;

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get("/" , function() use ($app)
    {
        return $app['twig']->render("index.html.twig", array("players" => Player::getAll()));
    });

    $app->post("/", function() use ($app)
    {
        $new_player = new Player(filter_var($_POST['player_name'], FILTER_SANITIZE_MAGIC_QUOTES));
        $new_player->save();

        return $app['twig']->render("index.html.twig", array("players" => Player::getAll()));
    });
    
    $app->post("/deleteAll", function() use ($app)
    {
        Player::deleteAll();

        return $app['twig']->render("index.html.twig", array("players" => Player::getAll()));
    });
    
    $app->delete("/delete-player/{id}", function($id) use ($app){
        $player = Player::find($id);

        $player->delete();

        return $app->redirect("/");
    });
    
    $app->patch("/edit-player/{id}", function($id) use ($app){
      $player = Player::find($id);
      $player->update(filter_var($_POST['player_name'], FILTER_SANITIZE_MAGIC_QUOTES));
      
      return $app->redirect("/");
    });

    return $app;
?>
