<?php

    class SellItem
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
          $GLOBALS['DB']->exec("INSERT INTO sell_items (sell_name, sell_player_id, sell_blueprint, sell_chassis, sell_systems, sell_neuroptics, sell_barrel, sell_receiver, sell_stock, sell_link, sell_lowerlimb, sell_upperlimb, sell_string, sell_grip, sell_blade, sell_blade2, sell_head, sell_handle, sell_handle2, sell_gauntlet, sell_gauntlet2, sell_hilt, sell_heatsink, sell_disc, sell_cerebrum, sell_carapace) VALUES (
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
            $found_items = $GLOBALS['DB']->query("SELECT * FROM sell_items ORDER BY sell_name ASC;");
            $items = array();
            foreach ($found_items as $item) {
                $name = $item['sell_name'];
                $player_id = $item['sell_player_id'];
                $blueprint = $item['sell_blueprint'];
                $chassis = $item['sell_chassis'];
                $systems = $item['sell_systems'];
                $neuroptics = $item['sell_neuroptics'];
                $barrel = $item['sell_barrel'];
                $receiver = $item['sell_receiver'];
                $stock = $item['sell_stock'];
                $link = $item['sell_link'];
                $lowerlimb = $item['sell_lowerlimb'];
                $upperlimb = $item['sell_upperlimb'];
                $string = $item['sell_string'];
                $grip = $item['sell_grip'];
                $blade = $item['sell_blade'];
                $blade2 = $item['sell_blade2'];
                $head = $item['sell_head'];
                $handle = $item['sell_handle'];
                $handle2 = $item['sell_handle2'];
                $gauntlet = $item['sell_gauntlet'];
                $gauntlet2 = $item['sell_gauntlet2'];
                $hilt = $item['sell_hilt'];
                $heatsink = $item['sell_heatsink'];
                $disc = $item['sell_disc'];
                $cerebrum = $item['sell_cerebrum'];
                $carapace = $item['sell_carapace'];
                $id = $item['sell_item_id'];
                $new_item = new SellItem($name, $player_id, $blueprint, $chassis, $systems, $neuroptics, $barrel, $receiver, $stock, $link, $lowerlimb, $upperlimb, $string, $grip, $blade, $blade2, $head, $handle, $handle2, $gauntlet, $gauntlet2, $hilt, $heatsink, $disc, $cerebrum, $carapace, $id);
                array_push($items, $new_item);
            }
            return $items;
        }
        
        static function getAllIncPlayer(){
            $found_items = $GLOBALS['DB']->query("SELECT * FROM sell_items ORDER BY sell_name ASC;");
            $items = array();
            foreach ($found_items as $item) {
              $name = $item['sell_name'];
              $player_id = $item['sell_player_id'];
              $blueprint = $item['sell_blueprint'];
              $chassis = $item['sell_chassis'];
              $systems = $item['sell_systems'];
              $neuroptics = $item['sell_neuroptics'];
              $barrel = $item['sell_barrel'];
              $receiver = $item['sell_receiver'];
              $stock = $item['sell_stock'];
              $link = $item['sell_link'];
              $lowerlimb = $item['sell_lowerlimb'];
              $upperlimb = $item['sell_upperlimb'];
              $string = $item['sell_string'];
              $grip = $item['sell_grip'];
              $blade = $item['sell_blade'];
              $blade2 = $item['sell_blade2'];
              $head = $item['sell_head'];
              $handle = $item['sell_handle'];
              $handle2 = $item['sell_handle2'];
              $gauntlet = $item['sell_gauntlet'];
              $gauntlet2 = $item['sell_gauntlet2'];
              $hilt = $item['sell_hilt'];
              $heatsink = $item['sell_heatsink'];
              $disc = $item['sell_disc'];
              $cerebrum = $item['sell_cerebrum'];
              $carapace = $item['sell_carapace'];
              $id = $item['sell_item_id'];
              $new_item = new SellItem($name, $player_id, $blueprint, $chassis, $systems, $neuroptics, $barrel, $receiver, $stock, $link, $lowerlimb, $upperlimb, $string, $grip, $blade, $blade2, $head, $handle, $handle2, $gauntlet, $gauntlet2, $hilt, $heatsink, $disc, $cerebrum, $carapace, $id);
              array_push($items, $new_item);
            }
            return $items;
        }

        function delete(){
            $GLOBALS['DB']->exec("DELETE FROM sell_items WHERE sell_item_id = {$this->id};");
        }

        // function update($name, $count, $player_id){
        //     $GLOBALS['DB']->exec("UPDATE sell_items SET name = '{$name}', count = {$count}, player_id = {$player_id} WHERE sell_item_id = {$this->getId()};");
        //     $this->setName($name);
        //     $this->setCount($count);
        //     $this->setPlayerId($player_id);
        // }

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
        
        static function findMatch(){
          $found_items = $GLOBALS['DB']->query("SELECT * from buy_items, sell_items where (buy_items.name = sell_items.sell_name) and (
            buy_items.blueprint = sell_items.sell_blueprint or 
            buy_items.chassis = sell_items.sell_chassis or 
            buy_items.systems = sell_items.sell_systems or
            buy_items.neuroptics = sell_items.sell_neuroptics or
            buy_items.barrel = sell_items.sell_barrel or
            buy_items.receiver = sell_items.sell_receiver or
            buy_items.stock = sell_items.sell_stock or
            buy_items.link = sell_items.sell_link or
            buy_items.lowerlimb = sell_items.sell_lowerlimb or
            buy_items.upperlimb = sell_items.sell_upperlimb or
            buy_items.string = sell_items.sell_string or
            buy_items.grip = sell_items.sell_grip or
            buy_items.blade = sell_items.sell_blade or
            buy_items.blade2 = sell_items.sell_blade2 or
            buy_items.head = sell_items.sell_head or
            buy_items.handle = sell_items.sell_handle or
            buy_items.handle2 = sell_items.sell_handle2 or
            buy_items.gauntlet = sell_items.sell_gauntlet or
            buy_items.gauntlet2 = sell_items.sell_gauntlet2 or
            buy_items.hilt = sell_items.sell_hilt or
            buy_items.disc = sell_items.sell_disc or
            buy_items.cerebrum = sell_items.sell_cerebrum or
            buy_items.carapace = sell_items.sell_carapace
          );");
          $finalArray = array();
          foreach ($found_items as $key) {
            $test = array();
            
            if($key['name']==$key['sell_name'] && $key['player_id']!==$key['sell_player_id']){
              $test['name']=$key['name'];
              $test['buy_player_name'] = Player::find($key['player_id'])->getName();
              $test['sell_player_name'] = Player::find($key['sell_player_id'])->getName();
              if($key['blueprint']!== "" && $key['blueprint']==$key['sell_blueprint']){
                $test['blueprint']=$key['blueprint'];  
              }
              if($key['chassis']!== "" && $key['chassis']==$key['sell_chassis']){
                $test['chassis']=$key['chassis'];  
              }
              if($key['systems']!== "" && $key['systems']==$key['sell_systems']){
                $test['systems']=$key['systems'];  
              }
              if($key['neuroptics']!== "" && $key['neuroptics']==$key['sell_neuroptics']){
                $test['neuroptics']=$key['neuroptics'];  
              }
              if($key['barrel']!== "" && $key['barrel']==$key['sell_barrel']){
                $test['barrel']=$key['barrel'];  
              }
              if($key['receiver']!== "" && $key['receiver']===$key['sell_receiver']){
                $test['receiver']=$key['receiver'];  
              }
              if($key['stock']!== "" && $key['stock']==$key['sell_stock']){
                $test['stock']=$key['stock'];  
              }
              if($key['link']!== "" && $key['link']==$key['sell_link']){
                $test['link']=$key['link'];  
              }
              if($key['lowerlimb']!== "" && $key['lowerlimb']==$key['sell_lowerlimb']){
                $test['lowerlimb']=$key['lowerlimb'];  
              }
              if($key['upperlimb']!== "" && $key['upperlimb']==$key['sell_upperlimb']){
                $test['upperlimb']=$key['upperlimb'];  
              }
              if($key['barrel']!== "" && $key['string']==$key['sell_string']){
                $test['string']=$key['string'];  
              }
              if($key['grip']!== "" && $key['grip']===$key['sell_grip']){
                $test['grip']=$key['grip'];  
              }
              if($key['blade']!== "" && $key['blade']==$key['sell_blade']){
                $test['blade']=$key['blade'];  
              }
              if($key['blade2']!== "" && $key['blade2']==$key['sell_blade2']){
                $test['blade2']=$key['blade2'];  
              }
              if($key['head']!== "" && $key['head']==$key['sell_head']){
                $test['head']=$key['head'];  
              }
              if($key['handle']!== "" && $key['handle']==$key['sell_handle']){
                $test['handle']=$key['handle'];  
              }
              if($key['handle2']!== "" && $key['handle2']==$key['sell_handle2']){
                $test['handle2']=$key['handle2'];  
              }
              if($key['gauntlet']!== "" && $key['gauntlet']===$key['sell_gauntlet']){
                $test['gauntlet']=$key['gauntlet'];  
              }
              if($key['gauntlet2']!== "" && $key['gauntlet2']==$key['sell_gauntlet2']){
                $test['gauntlet2']=$key['gauntlet2'];  
              }
              if($key['hilt']!== "" && $key['hilt']==$key['sell_hilt']){
                $test['hilt']=$key['hilt'];  
              }
              if($key['disc']!== "" && $key['disc']==$key['sell_disc']){
                $test['disc']=$key['disc'];  
              }
              if($key['cerebrum']!== "" && $key['cerebrum']==$key['sell_cerebrum']){
                $test['cerebrum']=$key['cerebrum'];  
              }
              if($key['carapace']!== "" && $key['carapace']==$key['sell_carapace']){
                $test['carapace']=$key['carapace'];  
              }
            }
            if(count($test)>3){
              array_push($finalArray, $test);
            }
          }
          return $finalArray;
        }

    }

?>
