<?php

require "bee.php";
require "droneBee.php";
require "queenBee.php";
require "workerBee.php";


class Game{

  private $bees = [];
  private $isOver = false;
  private $console = "Welcome to the Bee game ! Punch Bees in the face to win";

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

    foreach ($this->bees as $bee) {
      $bee->init();
    }
  }

  public function displayBees(){

    echo "<p>".$this->console."</p>";

    if(!$this->isOver){

      echo '<input type="submit" name="hit" value="Punch a bee in the face" /><br/>';

      echo "<p>There are still " . count($this->bees) . " bees left</p>";
      echo "<div id='beesWrapper'>";
      foreach ($this->bees as $bee) {
        echo "<div class='bee'><img src='assets/bee.png' alt='bee'/><br/>";
        echo "<div class='healthContainer'><div class='healthBar' style='width:".$bee->getHp() * 100 / $bee->getBaseHp()."%'></div></div>";
        echo $bee->getHp()."/".$bee->getBaseHp()."<br/></div>";
      }
      echo "</div>";

    }
    else{
      echo '<input type="submit" name="reset" value="reset" /><br/>';
    }
  }

  function playGame($gamedata)
  {
    if (!$this->isOver && isset($gamedata['hit'])) {
      $this->hit($gamedata);
    }

    else if (isset($gamedata['reset'])) {
      $this->resetGame();
      $this->newGame();
    }

    $this->displayBees();
  }

  function hit($gamedata){
    $index = rand(0, count($this->bees)-1);
    $targetBee = $this->bees[$index];
    $targetBee->takeDamage();
    $this->console = "You punched a ".$targetBee->getName()." bee in the face and she lost ".$targetBee->getDamageTaken()."HP !";
    if(!$targetBee->isAlive()){
      if($targetBee->getName()=="queen"){
        $this->console = "You killed the queen. There won't be any bee left in this world. You win.";
        $this->bees = [];
        $this->isOver = true;
        return;
      }
      else{
        $this->console .= " That was too much pain for this bee. She died.";
        array_splice($this->bees, $index, 1);
      }
    }
    if(empty($this->bees)){
      $this->isOver = true;
    }
  }

  function resetGame(){
    $this->console = "So you want to revive these bees just to punch them to death again. Great. Have fun.";
    session_destroy();
    $this->bees = [];
    $this->isOver = false;
    $_POST = array();
  }

}



 ?>
