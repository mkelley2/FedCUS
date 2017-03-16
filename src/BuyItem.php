<?php

    class BuyItem
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
            $all_items = BuyItem::getAll();
            foreach ($all_items as $item) {
                if(strtolower($item->getName()) == strtolower($this->name)){
                    return false;
                }
            }
            $GLOBALS['DB']->exec("INSERT INTO buy_items (name, count, player_id) VALUES ('{$this->getName()}', {$this->getCount()}, {$this->getPlayerId()})");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll(){
            $found_items = $GLOBALS['DB']->query("SELECT * FROM buy_items ORDER BY name ASC;");
            $items = array();
            foreach ($found_items as $item) {
                $item_name = $item['name'];
                $item_count = $item['count'];
                $item_player_id = $item['player_id'];
                $item_id = $item['buy_item_id'];
                $new_item = new BuyItem($item_name, $item_count, $item_player_id, $item_id);
                array_push($items, $new_item);
            }
            return $items;
        }

        function delete(){
            $GLOBALS['DB']->exec("DELETE FROM buy_items WHERE buy_item_id = {$this->id};");
        }

        function update($name, $count, $player_id){
            $GLOBALS['DB']->exec("UPDATE buy_items SET name = '{$name}', count = {$count}, player_id = {$player_id} WHERE buy_item_id = {$this->getId()};");
            $this->setName($name);
            $this->setCount($count);
            $this->setPlayerId($player_id);
        }

        static function deleteAll(){
            $GLOBALS['DB']->exec("DELETE FROM buy_items;");
        }

        static function find($search_id)
        {
            $found_items = BuyItem::getAll();
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
            $found_items = BuyItem::getAll();
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
