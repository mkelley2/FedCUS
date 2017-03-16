<?php

    class Player
    {
        private $name;
        private $id;

        function __construct($name, $id=null){
            $this->name=$name;
            $this->id=$id;
        }

        function setName($name){
            $this->name = $name;
        }

        function getName(){
            return $this->name;
        }

        function getId(){
            return $this->id;
        }

        function save(){

            // $all_players = Player::getAll();
            // foreach ($all_players as $player) {
            //     if(strtolower($player->getName()) == strtolower($this->name)){
            //         return false;
            //     }
            // }
            $GLOBALS['DB']->exec("INSERT INTO players (name) VALUES ('{$this->name}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }
        
        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE players SET name = '{$new_name}' WHERE player_id = {$this->getId()};");
            $this->setName($new_name);
        }
        
        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM players WHERE player_id = {$this->id};");
        }
        
        static function getAll(){
            $found_players = $GLOBALS['DB']->query("SELECT * FROM players ORDER BY name ASC;");
            $players = array();
            foreach ($found_players as $player) {
                $player_name= $player['name'];
                $player_id = $player['player_id'];
                $new_player = new Player($player_name, $player_id);
                array_push($players, $new_player);
            }
            return $players;
        }
        
        static function find($search_id)
        {
            $found_players = Player::getAll();
            $returned_player = null;

            foreach($found_players as $player)
            {
                $new_player = $player->getId();

                if($search_id == $new_player){
                    $returned_player = $player;
                }

            }
            return $returned_player;
        }
        
        function findBuyItems()
        {
            $found_items = BuyItem::getAll();
            $returned_item = [];

            foreach($found_items as $item)
            {
                $new_item = $item->getPlayerId();

                if($this->getId() == $new_item){
                    array_push($returned_item, $item);
                }

            }
            return $returned_item;
        }
        
        function findSellItems()
        {
            $found_items = SellItem::getAll();
            $returned_item = [];

            foreach($found_items as $item)
            {
                $new_item = $item->getPlayerId();

                if($this->getId() == $new_item){
                    array_push($returned_item, $item);
                }

            }
            return $returned_item;
        }
        
        function findRivens()
        {
            $found_items = Riven::getAll();
            $returned_item = [];

            foreach($found_items as $item)
            {
                $new_item = $item->getPlayerId();

                if($this->getId() == $new_item){
                    array_push($returned_item, $item);
                }

            }
            return $returned_item;
        }
        
        static function deleteAll(){
            $GLOBALS['DB']->exec("DELETE FROM players;");
            $GLOBALS['DB']->exec("DELETE FROM rivens;");
            $GLOBALS['DB']->exec("DELETE FROM sell_items;");
            $GLOBALS['DB']->exec("DELETE FROM buy_items;");
        }


    }





?>
