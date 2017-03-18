<?php

    class Riven
    {
        private $name;
        private $player_id;
        private $stat1;
        private $stat2;
        private $stat3;
        private $stat4;
        private $MR;
        private $reroll;
        private $id;

        function __construct($name, $stat1, $stat2, $stat3, $stat4, $player_id, $MR, $reroll, $id=null){
            $this->name=$name;
            $this->stat1=$stat1;
            $this->stat2=$stat2;
            $this->stat3=$stat3;
            $this->stat4=$stat4;
            $this->MR=$MR;
            $this->reroll=$reroll;
            $this->player_id = $player_id;
            $this->id=$id;
        }

        function setName($name){
            $this->name = $name;
        }

        function getName(){
            return $this->name;
        }
        
        function setStat1($stat1){
            $this->stat1 = $stat1;
        }

        function getStat1(){
            return $this->stat1;
        }
        
        function setStat2($stat2){
            $this->stat2 = $stat2;
        }

        function getStat2(){
            return $this->stat2;
        }
        
        function setStat3($stat3){
            $this->stat3 = $stat3;
        }

        function getStat3(){
            return $this->stat3;
        }
        
        function setStat4($stat4){
            $this->stat4 = $stat4;
        }

        function getStat4(){
            return $this->stat4;
        }
        
        function setMR($MR){
            $this->MR = $MR;
        }

        function getMR(){
            return $this->MR;
        }
        
        function setReroll($reroll){
            $this->reroll = $reroll;
        }

        function getReroll(){
            return $this->reroll;
        }

        function getPlayerId(){
            return $this->player_id;
        }

        function getId(){
            return $this->id;
        }

        function save(){
            $GLOBALS['DB']->exec("INSERT INTO rivens (name, stat1, stat2, stat3, stat4, mr, reroll, player_id) VALUES ('{$this->name}', '{$this->stat1}', '{$this->stat2}', '{$this->stat3}', '{$this->stat4}', '{$this->MR}', '{$this->reroll}', {$this->player_id})");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }
        
        function update($new_name, $new_stat1, $new_stat2, $new_stat3, $new_stat4, $new_MR, $new_reroll)
        {
            $GLOBALS['DB']->exec("UPDATE rivens SET name = '{$new_name}', stat1 = '{$new_stat1}', stat2 = '{$new_stat2}', stat3 = '{$new_stat3}', stat4 = '{$new_stat4}', mr = '{$new_MR}', reroll = '{$new_reroll}' WHERE riven_id = {$this->getId()};");
            $this->setName($new_name);
            $this->setStat1($new_stat1);
            $this->setStat2($new_stat2);
            $this->setStat3($new_stat3);
            $this->setStat4($new_stat4);
            $this->setMR($new_MR);
            $this->setReroll($new_reroll);
        }
        
        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM rivens WHERE riven_id = {$this->id};");
        }
        
        static function getAll(){
            $found_rivens = $GLOBALS['DB']->query("SELECT * FROM rivens ORDER BY name ASC;");
            $rivens = array();
            foreach ($found_rivens as $riven) {
                $riven_name= $riven['name'];
                $riven_stat1= $riven['stat1'];
                $riven_stat2= $riven['stat2'];
                $riven_stat3= $riven['stat3'];
                $riven_stat4= $riven['stat4'];
                $riven_MR= $riven['mr'];
                $riven_reroll= $riven['reroll'];
                $riven_player = $riven['player_id'];
                $riven_id = $riven['riven_id'];
                $new_riven = new Riven($riven_name, $riven_stat1, $riven_stat2, $riven_stat3, $riven_stat4, $riven_player, $riven_MR, $riven_reroll, $riven_id);
                array_push($rivens, $new_riven);
            }
            return $rivens;
        }
        
        static function getAllIncPlayer(){
            $found_rivens = $GLOBALS['DB']->query("SELECT * FROM rivens ORDER BY name ASC;");
            $rivens = array();
            foreach ($found_rivens as $riven) {
              $riven_name= $riven['name'];
              $riven_stat1= $riven['stat1'];
              $riven_stat2= $riven['stat2'];
              $riven_stat3= $riven['stat3'];
              $riven_stat4= $riven['stat4'];
              $riven_MR= $riven['mr'];
              $riven_reroll= $riven['reroll'];
              $riven_player = $riven['player_id'];
              $player = Player::find($riven_player);
              
              $riven_id = $riven['riven_id'];
                $new_riven = array("name"=>$riven_name, "stat1"=>$riven_stat1, "stat2"=>$riven_stat2, "stat3"=>$riven_stat3, "stat4"=>$riven_stat4, "mr"=>$riven_MR, "reroll"=>$riven_reroll, "player"=>$player->getName());
                array_push($rivens, $new_riven);
            }
            return $rivens;
        }
        
        static function find($search_id)
        {
            $found_rivens = Riven::getAll();
            $returned_riven = null;

            foreach($found_rivens as $riven)
            {
                $new_riven = $riven->getId();

                if($search_id == $new_riven){
                    $returned_riven = $riven;
                }

            }
            return $returned_riven;
        }
        
        static function findByPlayer($search_id)
        {
            $found_rivens = Riven::getAll();
            $returned_riven = array();

            foreach($found_rivens as $riven)
            {
                $new_riven = $riven->getPlayerId();

                if($search_id == $new_riven){
                    array_push($returned_riven, $riven);
                }

            }
            return $returned_riven;
        }
        
        static function deleteAll(){
            $GLOBALS['DB']->exec("DELETE FROM rivens;");
        }
        
        static function deleteAllByPlayer($search_id){
            $GLOBALS['DB']->exec("DELETE FROM rivens WHERE player_id = {$search_id};");
        }


    }





?>
