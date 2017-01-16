<?php

abstract class Bee{

  public function takeDamage(){
    $this->$hp -= $this->$damageTaken;
    if($this->$hp <= 0){
      endLife();
    }
  }

  public function endLife(){
    $this->$isAlive = false;
  }

  public function init(){
    $this->hp = $this->baseHp;
    $this->isAlive = true;
  }

  public function getHp(){
    return $this->baseHp;
  }

}

?>
