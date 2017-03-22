<?php
    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Player.php";
    require_once __DIR__."/../src/Riven.php";
    require_once __DIR__."/../src/BuyItem.php";
    require_once __DIR__."/../src/SellItem.php";

    $app = new Silex\Application();

    $app['debug']=true;

    if($_SERVER['SERVER_NAME'] == "localhost"){
      $server = 'mysql:host=localhost:8889;dbname=fedcus';
      $username = 'root';
      $password = 'root';
      $DB = new PDO($server, $username, $password);
    }else{
      // for postgres
      $dbopts = parse_url(getenv('DATABASE_URL'));
      $app->register(new Herrera\Pdo\PdoServiceProvider(),
      array(
        'pdo.dsn' => 'pgsql:dbname='.ltrim($dbopts["path"],'/').';host='.$dbopts["host"] . ';port=' . $dbopts["port"],
        'pdo.username' => $dbopts["user"],
        'pdo.password' => $dbopts["pass"]
        )
      );
      $DB = $app['pdo'];
    }
    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();
    
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/" , function() use ($app)
    {
      var_dump(SellItem::findMatch());
        return $app['twig']->render("index.html.twig", array("players" => Player::getAll()));
    });
    
    $app->get("/player/{id}", function($id) use ($app){
        $player = Player::findByName($id);

        return $app['twig']->render("player.html.twig", array("players" => Player::getAll(), "player" => $player));
    });
    
    $app->get("/looking" , function() use ($app)
    {
        return $app['twig']->render("buy.html.twig", array("players" => Player::getAll(), "buy_items" => BuyItem::getAllIncPlayer()));
    });
    
    $app->get("/ditching" , function() use ($app)
    {
        return $app['twig']->render("sell.html.twig", array("players" => Player::getAll() , "sell_items" => SellItem::getAllIncPlayer()));
    });
    
    $app->get("/rivens" , function() use ($app)
    {
        return $app['twig']->render("rivens.html.twig", array("players" => Player::getAll() , "all_rivens" => Riven::getAllIncPlayer()));
    });

    $app->post("/", function() use ($app)
    {
        $new_player = new Player(filter_var($_POST['player_name'], FILTER_SANITIZE_MAGIC_QUOTES));
        $new_player->save();

        return $app->redirect("/");
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
    
    $app->post("/add-item", function() use ($app)
    {
        $owner = Player::find($_POST['item_owner']);
        $type = $_POST['modal_type'];
        $blueprint = $_POST['item_blueprint'];
        if ($blueprint == "") {
          $blueprint = null;
        }
        $chassis = $_POST['item_chassis'];
        if ($chassis == "") {
          $chassis = null;
        }
        $systems = $_POST['item_systems'];
        if ($systems == "") {
          $systems = null;
        }
        $neuroptics = $_POST['item_neuroptics'];
        if ($neuroptics == "") {
          $neuroptics = null;
        }
        $barrel = $_POST['item_barrel'];
        if ($barrel == "") {
          $barrel = null;
        }
        $receiver = $_POST['item_receiver'];
        if ($receiver == "") {
          $receiver = null;
        }
        $stock = $_POST['item_stock'];
        if ($stock == "") {
          $stock = null;
        }
        $link = $_POST['item_link'];
        if ($link == "") {
          $link = null;
        }
        $lowerlimb = $_POST['item_lowerlimb'];
        if ($lowerlimb == "") {
          $lowerlimb = null;
        }
        $upperlimb = $_POST['item_upperlimb'];
        if ($upperlimb == "") {
          $upperlimb = null;
        }
        $string = $_POST['item_string'];
        if ($string == "") {
          $string = null;
        }
        $grip = $_POST['item_grip'];
        if ($grip == "") {
          $grip = null;
        }
        $blade = $_POST['item_blade'];
        if ($blade == "") {
          $blade = null;
        }
        $blade2 = $_POST['item_blade2'];
        if ($blade2 == "") {
          $blade2 = null;
        }
        $head = $_POST['item_head'];
        if ($head == "") {
          $head = null;
        }
        $handle = $_POST['item_handle'];
        if ($handle == "") {
          $handle = null;
        }
        $handle2 = $_POST['item_handle2'];
        if ($handle2 == "") {
          $handle2 = null;
        }
        $gauntlet = $_POST['item_gauntlet'];
        if ($gauntlet == "") {
          $gauntlet = null;
        }
        $gauntlet2 = $_POST['item_gauntlet2'];
        if ($gauntlet2 == "") {
          $gauntlet2 = null;
        }
        $hilt = $_POST['item_hilt'];
        if ($hilt == "") {
          $hilt = null;
        }
        $heatsink = $_POST['item_heatsink'];
        if ($heatsink == "") {
          $heatsink = null;
        }
        $disc = $_POST['item_disc'];
        if ($disc == "") {
          $disc = null;
        }
        $cerebrum = $_POST['item_cerebrum'];
        if ($cerebrum == "") {
          $cerebrum = null;
        }
        $carapace = $_POST['item_carapace'];
        if ($carapace == "") {
          $carapace = null;
        }
        $name = $owner->getName();
        
        if($type == "buy"){
          $new_item = new BuyItem(filter_var($_POST['item_name'], FILTER_SANITIZE_MAGIC_QUOTES), $owner->getId(), $blueprint, $chassis, $systems, $neuroptics, $barrel, $receiver, $stock, $link, $lowerlimb, $upperlimb, $string, $grip, $blade, $blade2, $head, $handle, $handle2, $gauntlet, $gauntlet2, $hilt, $heatsink, $disc, $cerebrum, $carapace);
          $new_item->save();
        }else if($type == "sell"){
          $new_item = new SellItem(filter_var($_POST['item_name'], FILTER_SANITIZE_MAGIC_QUOTES), $owner->getId(), $blueprint, $chassis, $systems, $neuroptics, $barrel, $receiver, $stock, $link, $lowerlimb, $upperlimb, $string, $grip, $blade, $blade2, $head, $handle, $handle2, $gauntlet, $gauntlet2, $hilt, $heatsink, $disc, $cerebrum, $carapace);
          $new_item->save();
        }

        return $app->redirect("/player/$name");
    });
    
    $app->delete("/delete-sell-item/{id}", function($id) use ($app){
        $item = SellItem::find($id);
        $ownerID = $item->getPlayerId();
        $owner = Player::find($ownerID);
        $name = $owner->getName();
        $item->delete();
        
        return $app->redirect("/player/$name");
    });
    
    $app->delete("/delete-buy-item/{id}", function($id) use ($app){
        $item = BuyItem::find($id);
        $ownerID = $item->getPlayerId();
        $owner = Player::find($ownerID);
        $name = $owner->getName();
        $item->delete();

        return $app->redirect("/player/$name");
    });
    
    $app->post("/add-riven", function() use ($app)
    {
        // var_dump($_POST['url']);
        $owner = Player::find($_POST['item_owner']);
        $stat1 = $_POST['item_stat1'];
        $stat2 = $_POST['item_stat2'];
        $stat3 = $_POST['item_stat3'];
        $stat4 = $_POST['item_stat4'];
        $mr = $_POST['item_mr'];
        $reroll = $_POST['item_reroll'];
        if($stat1 === ""){
          $stat1 = "N/A";
        }
        if($stat2 === ""){
          $stat2 = "N/A";
        }
        if($stat3 === ""){
          $stat3 = "N/A";
        }
        if($stat4 === ""){
          $stat4 = "N/A";
        }
        if($mr === ""){
          $mr = "N/A";
        }
        if($reroll === ""){
          $reroll = "N/A";
        }
        $name = $owner->getName();
        $new_riven = new Riven(filter_var($_POST['riven_name'], FILTER_SANITIZE_MAGIC_QUOTES), $stat1, $stat2, $stat3, $stat4, $owner->getId(), $mr, $reroll);
        $new_riven->save();
        

        return $app->redirect("/player/$name");
    });
    
    $app->delete("/delete-riven/{id}", function($id) use ($app){
        $item = Riven::find($id);
        $ownerID = $item->getPlayerId();
        $owner = Player::find($ownerID);
        $name = $owner->getName();
        $item->delete();

        return $app->redirect("/player/$name");
    });
    
    $app->get("/delete-all", function() use ($app){
        Player::deleteAll();

        return $app->redirect("/");
    });

    return $app;
?>
