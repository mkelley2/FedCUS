<?php

    class BuyItem
    {
        private $name;
        private $player_id;
        private $blueprint;
        private $chassis;
        private $systems;
        private $neuroptics;
        private $barrel;
        private $receiver;
        private $stock;
        private $link;
        private $lowerlimb;
        private $upperlimb;
        private $string;
        private $grip;
        private $blade;
        private $blade2;
        private $head;
        private $handle;
        private $handle2;
        private $gauntlet;
        private $gauntlet2;
        private $hilt;
        private $heatsink;
        private $disc;
        private $cerebrum;
        private $carapace;
        private $id;

        function __construct($name, $player_id, $blueprint, $chassis, $systems, $neuroptics, $barrel, $receiver, $stock, $link, $lowerlimb, $upperlimb, $string, $grip, $blade, $blade2, $head, $handle, $handle2, $gauntlet, $gauntlet2, $hilt, $heatsink, $disc, $cerebrum, $carapace, $id=null){
            $this->name=$name;
            $this->player_id=$player_id;
            $this->blueprint = $blueprint;
            $this->chassis = $chassis;
            $this->systems = $systems;
            $this->neuroptics = $neuroptics;
            $this->barrel = $barrel;
            $this->receiver = $receiver;
            $this->stock = $stock;
            $this->link = $link;
            $this->lowerlimb = $lowerlimb;
            $this->upperlimb = $upperlimb;
            $this->string = $string;
            $this->grip = $grip;
            $this->blade = $blade;
            $this->blade2 = $blade2;
            $this->head = $head;
            $this->handle = $handle;
            $this->handle2 = $handle2;
            $this->gauntlet = $gauntlet;
            $this->gauntlet2 = $gauntlet2;
            $this->hilt = $hilt;
            $this->heatsink = $heatsink;
            $this->disc = $disc;
            $this->cerebrum = $cerebrum;
            $this->carapace = $carapace;
            $this->id=$id;
        }

        function setName($name){
            $this->name = $name;
        }

        function getName(){
            return $this->name;
        }
        
        function setPlayerId($player_id){
            $this->player_id = $player_id;
        }

        function getPlayerId(){
            return $this->player_id;
        }
        
        function setBlueprint($blueprint){
            $this->blueprint = $blueprint;
        }

        function getBlueprint(){
            return $this->blueprint;
        }
        
        function setChassis($chassis){
            $this->chassis = $chassis;
        }

        function getChassis(){
            return $this->chassis;
        }
        
        function setSystems($systems){
            $this->systems = $systems;
        }

        function getSystems(){
            return $this->systems;
        }
        
        function setNeuroptics($neuroptics){
            $this->neuroptics = $neuroptics;
        }

        function getNeuroptics(){
            return $this->neuroptics;
        }
        
        function setBarrel($barrel){
            $this->barrel = $barrel;
        }

        function getBarrel(){
            return $this->barrel;
        }
        
        function setReceiver($receiver){
            $this->receiver = $receiver;
        }

        function getReceiver(){
            return $this->receiver;
        }
        
        function setStock($stock){
            $this->stock = $stock;
        }

        function getStock(){
            return $this->stock;
        }
        
        function setLink($link){
            $this->link = $link;
        }

        function getLink(){
            return $this->link;
        }
        
        function setLowerlimb($lowerlimb){
            $this->lowerlimb = $lowerlimb;
        }

        function getLowerlimb(){
            return $this->lowerlimb;
        }
        
        function setUpperlimb($upperlimb){
            $this->upperlimb = $upperlimb;
        }

        function getUpperlimb(){
            return $this->upperlimb;
        }
        
        function setString($string){
            $this->string = $string;
        }

        function getString(){
            return $this->string;
        }
        
        function setGrip($grip){
            $this->grip = $grip;
        }

        function getGrip(){
            return $this->grip;
        }
        
        function setBlade($blade){
            $this->blade = $blade;
        }

        function getBlade(){
            return $this->blade;
        }
        
        function setBlade2($blade2){
            $this->blade2 = $blade2;
        }

        function getBlade2(){
            return $this->blade2;
        }
        
        function setHead($head){
            $this->head = $head;
        }

        function getHead(){
            return $this->head;
        }
        
        function setHandle($handle){
            $this->handle = $handle;
        }

        function getHandle(){
            return $this->handle;
        }
        
        function setHandle2($handle2){
            $this->handle2 = $handle2;
        }

        function getHandle2(){
            return $this->handle2;
        }
        
        function setGauntlet($gauntlet){
            $this->gauntlet = $gauntlet;
        }

        function getGauntlet2(){
            return $this->gauntlet2;
        }
        
        function setGauntlet2($gauntlet2){
            $this->gauntlet2 = $gauntlet2;
        }

        function getGauntlet(){
            return $this->handle;
        }
        
        function setHilt($hilt){
            $this->hilt = $hilt;
        }

        function getHilt(){
            return $this->hilt;
        }
        
        function setHeatsink($heatsink){
            $this->heatsink = $heatsink;
        }

        function getHeatsink(){
            return $this->heatsink;
        }
        
        function setDisc($disc){
            $this->disc = $disc;
        }

        function getDisc(){
            return $this->disc;
        }
        
        function setCerebrum($cerebrum){
            $this->cerebrum = $cerebrum;
        }

        function getCerebrum(){
            return $this->cerebrum;
        }
        
        function setCarapace($carapace){
            $this->carapace = $carapace;
        }

        function getCarapace(){
            return $this->carapace;
        }

        function getId(){
            return $this->id;
        }

        function save(){
          $GLOBALS['DB']->exec("INSERT INTO buy_items (name, player_id, blueprint, chassis, systems, neuroptics, barrel, receiver, stock, link, lowerlimb, upperlimb, string, grip, blade, blade2, head, handle, handle2, gauntlet, gauntlet2, hilt, heatsink, disc, cerebrum, carapace) VALUES (
            '{$this->getName()}',
            {$this->getPlayerId()},
            '{$this->getBlueprint()}',
            '{$this->getChassis()}',
            '{$this->getSystems()}',
            '{$this->getNeuroptics()}',
            '{$this->getBarrel()}',
            '{$this->getReceiver()}',
            '{$this->getStock()}',
            '{$this->getLink()}',
            '{$this->getLowerlimb()}',
            '{$this->getUpperlimb()}',
            '{$this->getString()}',
            '{$this->getGrip()}',
            '{$this->getBlade()}',
            '{$this->getBlade2()}',
            '{$this->getHead()}',
            '{$this->getHandle()}',
            '{$this->getHandle2()}',
            '{$this->getGauntlet2()}',
            '{$this->getGauntlet()}',
            '{$this->getHilt()}',
            '{$this->getHeatsink()}',
            '{$this->getDisc()}',    
            '{$this->getCerebrum()}',
            '{$this->getCarapace()}'
          )");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll(){
            $found_items = $GLOBALS['DB']->query("SELECT * FROM buy_items ORDER BY name ASC;");
            $items = array();
            foreach ($found_items as $item) {
                $name = $item['name'];
                $player_id = $item['player_id'];
                $blueprint = $item['blueprint'];
                $chassis = $item['chassis'];
                $systems = $item['systems'];
                $neuroptics = $item['neuroptics'];
                $barrel = $item['barrel'];
                $receiver = $item['receiver'];
                $stock = $item['stock'];
                $link = $item['link'];
                $lowerlimb = $item['lowerlimb'];
                $upperlimb = $item['upperlimb'];
                $string = $item['string'];
                $grip = $item['grip'];
                $blade = $item['blade'];
                $blade2 = $item['blade2'];
                $head = $item['head'];
                $handle = $item['handle'];
                $handle2 = $item['handle2'];
                $gauntlet = $item['gauntlet'];
                $gauntlet2 = $item['gauntlet2'];
                $hilt = $item['hilt'];
                $heatsink = $item['heatsink'];
                $disc = $item['disc'];
                $cerebrum = $item['cerebrum'];
                $carapace = $item['carapace'];
                $id = $item['buy_item_id'];
                $new_item = new BuyItem($name, $player_id, $blueprint, $chassis, $systems, $neuroptics, $barrel, $receiver, $stock, $link, $lowerlimb, $upperlimb, $string, $grip, $blade, $blade2, $head, $handle, $handle2, $gauntlet, $gauntlet2, $hilt, $heatsink, $disc, $cerebrum, $carapace, $id);
                array_push($items, $new_item);
            }
            return $items;
        }
        
        static function getAllIncPlayer(){
            $found_items = $GLOBALS['DB']->query("SELECT * FROM buy_items ORDER BY name ASC;");
            $items = array();
            foreach ($found_items as $item) {
              $name = $item['name'];
              $player_id = $item['player_id'];
              $blueprint = $item['blueprint'];
              $chassis = $item['chassis'];
              $systems = $item['systems'];
              $neuroptics = $item['neuroptics'];
              $barrel = $item['barrel'];
              $receiver = $item['receiver'];
              $stock = $item['stock'];
              $link = $item['link'];
              $lowerlimb = $item['lowerlimb'];
              $upperlimb = $item['upperlimb'];
              $string = $item['string'];
              $grip = $item['grip'];
              $blade = $item['blade'];
              $blade2 = $item['blade2'];
              $head = $item['head'];
              $handle = $item['handle'];
              $handle2 = $item['handle2'];
              $gauntlet = $item['gauntlet'];
              $gauntlet2 = $item['gauntlet2'];
              $hilt = $item['hilt'];
              $heatsink = $item['heatsink'];
              $disc = $item['disc'];
              $cerebrum = $item['cerebrum'];
              $carapace = $item['carapace'];
              $id = $item['buy_item_id'];
              $new_item = new BuyItem($name, $player_id, $blueprint, $chassis, $systems, $neuroptics, $barrel, $receiver, $stock, $link, $lowerlimb, $upperlimb, $string, $grip, $blade, $blade2, $head, $handle, $handle2, $gauntlet, $gauntlet2, $hilt, $heatsink, $disc, $cerebrum, $carapace, $id);
              array_push($items, $new_item);
            }
            return $items;
        }

        function delete(){
            $GLOBALS['DB']->exec("DELETE FROM buy_items WHERE buy_item_id = {$this->id};");
        }

        // function update($name, $count, $player_id){
        //     $GLOBALS['DB']->exec("UPDATE buy_items SET name = '{$name}', count = {$count}, player_id = {$player_id} WHERE buy_item_id = {$this->getId()};");
        //     $this->setName($name);
        //     $this->setCount($count);
        //     $this->setPlayerId($player_id);
        // }

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
