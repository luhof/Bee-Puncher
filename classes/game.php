<?php

require "bee.php";
require "DroneBee.php";
require "QueenBee.php";
require "WorkerBee.php";

class Game{

  private $bees = [];

  function Game(){
    $this->bees = [];
    $this->newGame();
  }

  public function newGame(){
    array_push($this->bees, new QueenBee());
    for($i = 0; $i<5; $i++){
      array_push($this->bees, new WorkerBee());
    }

    for($i = 0; $i<8; $i++){
      array_push($this->bees, new DroneBee());
    }
  }

  public function displayBees(){
    echo "There are still " . count($this->bees) . " bees left<br/>";
    foreach ($this->bees as $bee) {
      echo $bee->getHp()."<br/>";
    }

    echo '<input type="submit" name="hit" value="HIT A BEE!!1!" /><br/>';
    echo '<input type="submit" name="reset" value="reset" /><br/>';
  }

  function playGame($gamedata)
  {
    if (isset($gamedata['hit'])) {
      $this->hit($gamedata);
    }

//player pressed the button to start a new game
    if (isset($gamedata['newgame'])) {
      $this->newGame();
    }
    else if (isset($gamedata['reset'])) {
      $this->resetGame();
    }

    $this->displayBees();
  }

  function hit($gamedata){
    echo "AOUCHAOUCHAOUCH<br/>";
    array_pop($this->bees);
  }

  function resetGame(){
    session_destroy();
    $gamedata = null;
    $_POST = array();
    header('index.php');
  }

}



 ?>
