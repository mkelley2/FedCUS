<?php

    class SellItem
    {
        private $name;
        private $count;
        private $player_id;
        private $id;

        function __construct($name, $count, $player_id, $id=null){
            $this->name=$name;
            $this->count=$count;
            $this->player_id=$player_id;
            $this->id=$id;
        }

        function setName($name){
            $this->name = $name;
        }

        function getName(){
            return $this->name;
        }
        
        function setCount($count){
            $this->count = $count;
        }

        function getCount(){
            return $this->count;
        }
        
        function setPlayerId($player_id){
            $this->player_id = $player_id;
        }

        function getPlayerId(){
            return $this->player_id;
        }

        function getId(){
            return $this->id;
        }

        function save(){
          $GLOBALS['DB']->exec("INSERT INTO sell_items (name, count, player_id) VALUES ('{$this->getName()}', {$this->getCount()}, {$this->getPlayerId()})");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll(){
            $found_items = $GLOBALS['DB']->query("SELECT * FROM sell_items ORDER BY name ASC;");
            $items = array();
            foreach ($found_items as $item) {
                $item_name = $item['name'];
                $item_count = $item['count'];
                $item_player_id = $item['player_id'];
                $item_id = $item['sell_item_id'];
                $new_item = new SellItem($item_name, $item_count, $item_player_id, $item_id);
                array_push($items, $new_item);
            }
            return $items;
        }
        
        static function getAllIncPlayer(){
            $found_items = $GLOBALS['DB']->query("SELECT * FROM sell_items ORDER BY name ASC;");
            $items = array();
            foreach ($found_items as $item) {
                $item_name = $item['name'];
                $item_count = $item['count'];
                $item_player_id = $item['player_id'];
                $player = Player::find($item_player_id);
                $new_item = array("name"=>$item_name, "count"=>$item_count, "player"=>$player->getName());
                array_push($items, $new_item);
            }
            return $items;
        }

        function delete(){
            $GLOBALS['DB']->exec("DELETE FROM sell_items WHERE sell_item_id = {$this->getId()};");
        }

        function update($name, $count, $player_id){
            $GLOBALS['DB']->exec("UPDATE sell_items SET name = '{$name}', count = {$count}, player_id = {$player_id} WHERE sell_item_id = {$this->getId()};");
            $this->setName($name);
            $this->setCount($count);
            $this->setPlayerId($player_id);
        }

        static function deleteAll(){
            $GLOBALS['DB']->exec("DELETE FROM sell_items;");
        }

        static function find($search_id)
        {
            $found_items = SellItem::getAll();
            $returned_item = null;

            foreach($found_items as $item)
            {
                $new_item = $item->getId();

                if($search_id == $new_item){
                    $returned_item = $item;
                }

            }
            return $returned_item;
        }

        function findByPlayer($search_name)
        {
            $found_items = SellItem::getAll();
            $returned_item = [];

            foreach($found_items as $item)
            {
                $new_item = $item->getPlayerId();

                if($search_name == $new_item){
                    array_push($returned_item, $item);
                }

            }
            return $returned_item;
        }

    }

?>
