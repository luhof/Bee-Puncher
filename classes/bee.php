<?php

abstract class Bee{

 private $isAlive = true;

  public function takeDamage(){
    $this->hp -= $this->damageTaken;
    if($this->hp <= 0){
      $this->endLife();
    }
  }

  public function endLife(){
    $this->isAlive = false;
  }

  public function init(){
    $this->hp = $this->baseHp;
    $this->isAlive = true;
  }

  public function getHp(){
    return $this->hp;
  }

  public function getBaseHp(){
    return $this->baseHp;
  }

  public function isAlive(){
    return $this->isAlive;
  }

  public function getName(){
    return $this->name;
  }

  public function getDamageTaken(){
    return $this->damageTaken;
  }

}

?>
